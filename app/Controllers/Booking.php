<?php

namespace App\Controllers;

use App\Models\M_Transaksi;
use App\Models\M_Destinasi;
use App\Models\M_Pengunjung;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\M_Availability;

class Booking extends BaseController
{
    protected $modelTransaksi;
    protected $modelDestinasi;
    protected $modelPengunjung;
    protected $modelAvailability;

    public function __construct()
    {
        $this->modelTransaksi  = new M_Transaksi();
        $this->modelDestinasi   = new M_Destinasi();
        $this->modelPengunjung = new M_Pengunjung();
        $this->modelAvailability = new M_Availability();
    }

    public function form($idDestinasi)
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $destinasi = $this->modelDestinasi->getDestinasiById($idDestinasi);
        if (!$destinasi) {
            return redirect()->to('/destinasi')->with('error', 'Destinasi tidak ditemukan.');
        }

        $data = [
            'title'     => 'Pemesanan Tiket',
            'destinasi' => $destinasi,
            'user'      => $this->modelPengunjung->getPengunjungById(session()->get('id_pengunjung'))
        ];

        return view('visitor/booking/form', $data);
    }

    public function proses()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/auth/login');
        }

        $rules = [
            'id_destinasi'      => 'required',
            'tanggal_kunjungan' => 'required|valid_date',
            'jumlah_tiket'      => 'required|numeric|greater_than[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $idDestinasi = $this->request->getPost('id_destinasi');
        $destinasi   = $this->modelDestinasi->getDestinasiById($idDestinasi);
        $tanggal     = $this->request->getPost('tanggal_kunjungan');
        $jumlahTiket = (int) $this->request->getPost('jumlah_tiket');

        // Ensure availability row exists for this date (uses id_destinasi as destinasi_kode)
        $this->modelAvailability->ensureRow((string) $idDestinasi, $tanggal, (int) ($destinasi['stok_tiket'] ?? 0));

        // Attempt atomic increment on tbl_availability (fails if not enough capacity)
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_availability');
        $builder->set('booked', "booked + {$jumlahTiket}", false)
                ->where('destinasi_kode', (string) $idDestinasi)
                ->where('date', $tanggal)
                ->where('is_delete', '0')
                ->where("capacity - booked >= {$jumlahTiket}", null, false)
                ->update();

        if ($db->affectedRows() == 0) {
            return redirect()->back()->withInput()->with('error', 'Stok pada tanggal tersebut tidak mencukupi atau sudah habis.');
        }

        // Prepare transaksi data
        $totalBayar  = $destinasi['harga_tiket'] * $jumlahTiket;
        $noTransaksi = $this->modelTransaksi->autoNumber();

        $data = [
            'no_transaksi'      => $noTransaksi,
            'tgl_transaksi'     => date('Y-m-d H:i:s'),
            'id_pengunjung'     => session()->get('id_pengunjung'),
            'id_destinasi'      => $idDestinasi,
            'tanggal_kunjungan' => $tanggal,
            'jumlah_tiket'      => $jumlahTiket,
            'total_bayar'       => $totalBayar,
            'status'            => 'Menunggu Konfirmasi',
            'created_at'        => date('Y-m-d H:i:s'),
        ];

        // Generate QR Code
        $qrPath = $this->generateQr($noTransaksi);
        $data['qr_code'] = $qrPath;

        // Save transaksi and update global stok inside DB transaction
        $db->transStart();
        try {
            $this->modelTransaksi->saveDataTransaksi($data);

            // Update global stok_tiket to reflect overall remaining stock
            $this->modelDestinasi->updateDataDestinasi(
                ['stok_tiket' => $destinasi['stok_tiket'] - $jumlahTiket],
                ['id_destinasi' => $idDestinasi]
            );

            $db->transComplete();
        } catch (\Exception $e) {
            $db->transRollback();

            // Revert availability booked count if transaction fails
            $builder->set('booked', "booked - {$jumlahTiket}", false)
                    ->where('destinasi_kode', (string) $idDestinasi)
                    ->where('date', $tanggal)
                    ->where('is_delete', '0')
                    ->update();

            return redirect()->back()->withInput()->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
        }

        return redirect()->to('/booking/success/' . $noTransaksi)->with('success', 'Pemesanan tiket berhasil!');
    }

    public function success($noTransaksi)
    {
        $transaksi = $this->modelTransaksi->getDataTransaksi(['no_transaksi' => $noTransaksi]);
        if (empty($transaksi)) {
            return redirect()->to('/user/dashboard');
        }

        $data = [
            'title'     => 'Pemesanan Berhasil',
            'transaksi' => $transaksi[0]
        ];

        return view('visitor/booking/success', $data);
    }

    private function generateQr($noTransaksi)
    {
        $directory = FCPATH . 'Assets/qrcode/';
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = 'qr_' . $noTransaksi . '.png';
        $filePath = $directory . $fileName;

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($noTransaksi)
            ->size(300)
            ->margin(10)
            ->build();

        $result->saveToFile($filePath);

        return 'Assets/qrcode/' . $fileName;
    }

    public function download_pdf($noTransaksi)
    {
        $transaksi = $this->modelTransaksi->getDataTransaksi(['no_transaksi' => $noTransaksi]);
        if (empty($transaksi)) {
            return redirect()->to('/user/dashboard');
        }

        $data = ['transaksi' => $transaksi[0]];
        $html = view('visitor/booking/ticket_pdf', $data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('Tiket_' . $noTransaksi . '.pdf', ['Attachment' => 1]);
    }
}
