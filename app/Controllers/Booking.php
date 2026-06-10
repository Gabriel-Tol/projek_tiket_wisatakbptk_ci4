<?php

namespace App\Controllers;

use App\Models\M_Transaksi;
use App\Models\M_Destinasi;
use App\Models\M_Pengunjung;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Dompdf\Dompdf;
use Dompdf\Options;

class Booking extends BaseController
{
    protected $modelTransaksi;
    protected $modelDestinasi;
    protected $modelPengunjung;

    public function __construct()
    {
        $this->modelTransaksi  = new M_Transaksi();
        $this->modelDestinasi   = new M_Destinasi();
        $this->modelPengunjung = new M_Pengunjung();
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
        $destinasi = $this->modelDestinasi->getDestinasiById($idDestinasi);
        
        $jumlahTiket = $this->request->getPost('jumlah_tiket');
        $totalBayar  = $destinasi['harga_tiket'] * $jumlahTiket;
        $noTransaksi = $this->modelTransaksi->autoNumber();

        $data = [
            'no_transaksi'      => $noTransaksi,
            'tgl_transaksi'     => date('Y-m-d H:i:s'),
            'id_pengunjung'     => session()->get('id_pengunjung'),
            'id_destinasi'      => $idDestinasi,
            'tanggal_kunjungan' => $this->request->getPost('tanggal_kunjungan'),
            'jumlah_tiket'      => $jumlahTiket,
            'total_bayar'       => $totalBayar,
            'status'            => 'Menunggu Konfirmasi',
            'created_at'        => date('Y-m-d H:i:s'),
        ];

        // Generate QR Code
        $qrPath = $this->generateQr($noTransaksi);
        $data['qr_code'] = $qrPath;

        $this->modelTransaksi->saveDataTransaksi($data);

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
