<?php

namespace App\Controllers;

use App\Models\M_Pengunjung;
use App\Models\M_Kategori;
use App\Models\M_Destinasi;
use App\Models\M_Transaksi;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class Admin extends BaseController
{
    protected $modelPengunjung;
    protected $modelKategori;
    protected $modelDestinasi;
    protected $modelTransaksi;

    public function __construct()
    {
        $this->modelPengunjung = new M_Pengunjung();
        $this->modelKategori   = new M_Kategori();
        $this->modelDestinasi   = new M_Destinasi();
        $this->modelTransaksi  = new M_Transaksi();
    }

    private function generateTransaksiQrCode(string $noTransaksi): ?string
    {
        $qrText = 'Transaksi:' . $noTransaksi;
        $directory = FCPATH . 'Assets/qrcode/';
        $fileName = sprintf('qr_%s.png', strtolower($noTransaksi));
        $filePath = $directory . $fileName;
        $relativePath = 'Assets/qrcode/' . $fileName;

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        try {
            $result = Builder::create()
                ->writer(new PngWriter())
                ->data($qrText)
                ->size(300)
                ->margin(10)
                ->build();

            $result->saveToFile($filePath);
            return $relativePath;
        } catch (\Throwable $e) {
            log_message('error', 'QR code generation failed for ' . $noTransaksi . ': ' . $e->getMessage());
            return null;
        }
    }

    public function login()
    {
        // Jika sudah login, arahkan ke dashboard
        if (session()->get('is_login')) {
            return redirect()->to('/dashboard');
        }
        return view('backend/login');
    }
    public function autentikasi()
    {
        $email    = $_POST['email']    ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            session()->setFlashdata('error', 'Email dan Password wajib diisi!');
            return redirect()->to('/');
        }

        $pengunjung = $this->modelPengunjung->getDataPengunjung([
            'email'     => $email,
            'is_delete' => '0'
        ]);

        // DEBUG
        if (!$pengunjung) {
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->to('/');
        }

        if (!password_verify($password, $pengunjung['password'])) {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/');
        }

        // Jika cocok
        $sessionData = [
            'id_pengunjung'   => $pengunjung['id_pengunjung'],
            'nama_pengunjung' => $pengunjung['nama_pengunjung'],
            'email'           => $pengunjung['email'],
            'is_login'        => TRUE
        ];
        session()->set($sessionData);
        return redirect()->to('/dashboard');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        // Hitung total data yang belum dihapus
        $db = \Config\Database::connect();

        $totalKategori = $db->table('tbl_kategori')
            ->where('is_delete', '0')
            ->countAllResults();

        $totalDestinasi = $db->table('tbl_destinasi')
            ->where('is_delete', '0')
            ->countAllResults();

        $totalPengunjung = $db->table('tbl_pengunjung')
            ->where('is_delete', '0')
            ->countAllResults();

        $totalTransaksi = $db->table('tbl_transaksi')
            ->countAllResults();  // transaksi biasanya tidak dihapus

        $data = [
            'totalKategori'   => $totalKategori,
            'totalDestinasi'  => $totalDestinasi,
            'totalPengunjung' => $totalPengunjung,
            'totalTransaksi'  => $totalTransaksi
        ];

        return view('backend/dashboard_admin', $data);
    }
    public function master_kategori()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $data['dataKategori'] = $this->modelKategori->getDataKategori();
        return view('backend/master_kategori/master_data_kategori', $data);
    }
    public function input_kategori()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        return view('backend/master_kategori/input_kategori');
    }
    public function simpan_kategori()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $idKategori = $this->modelKategori->autoNumber();
        $namaKategori = $this->request->getPost('nama_kategori');

        $data = [
            'id_kategori'    => $idKategori,
            'nama_kategori'  => $namaKategori,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s')
        ];

        $this->modelKategori->saveDataKategori($data);
        session()->setFlashdata('success', 'Data kategori berhasil disimpan!');
        return redirect()->to('/admin/master-kategori');
    }
    public function edit_kategori($id)
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $data['kategori'] = $this->modelKategori->getKategoriById($id);

        if (empty($data['kategori'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('backend/master_kategori/edit_kategori', $data);
    }
    public function update_kategori()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $idKategori = $this->request->getPost('id_kategori');
        $namaKategori = $this->request->getPost('nama_kategori');

        $data = [
            'nama_kategori' => $namaKategori,
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        $this->modelKategori->updateDataKategori($data, ['id_kategori' => $idKategori]);
        session()->setFlashdata('success', 'Data kategori berhasil diupdate!');
        return redirect()->to('/admin/master-kategori');
    }
    public function hapus_kategori($id)
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        // Panggil model untuk soft delete
        $this->modelKategori->hapusDataKategori(['id_kategori' => $id]);
        session()->setFlashdata('success', 'Data kategori berhasil dihapus!');
        return redirect()->to('/admin/master-kategori');
    }
    public function master_destinasi()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $data['dataDestinasi'] = $this->modelDestinasi->getDataDestinasi();
        return view('backend/master_destinasi/master_data_destinasi', $data);
    }
    public function input_destinasi()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        // Ambil data kategori untuk dropdown
        $data['dataKategori'] = $this->modelKategori->getDataKategori();
        return view('backend/master_destinasi/input_destinasi', $data);
    }
    public function simpan_destinasi()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        // Validasi file foto
        if (!$this->validate([
            'foto' => 'uploaded[foto]|max_size[foto, 1024]|ext_in[foto,jpg,jpeg,png]',
        ])) {
            session()->setFlashdata('error', 'Format foto harus JPG/PNG dan ukuran maksimal 1 MB!');
            return redirect()->to('/admin/input-destinasi')->withInput();
        }

        // Upload foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();   // Nama acak unik
        $fileFoto->move('Assets/foto_destinasi', $namaFoto);

        // Auto number ID
        $idDestinasi = $this->modelDestinasi->autoNumber();

        // Data simpan
        $data = [
            'id_destinasi'  => $idDestinasi,
            'nama_destinasi' => $this->request->getPost('nama_destinasi'),
            'id_kategori'   => $this->request->getPost('id_kategori'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'foto'          => $namaFoto,
            'harga_tiket'   => $this->request->getPost('harga_tiket'),
            'stok_tiket'    => $this->request->getPost('stok_tiket'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        $this->modelDestinasi->saveDataDestinasi($data);
        session()->setFlashdata('success', 'Data destinasi berhasil disimpan!');
        return redirect()->to('/admin/master-destinasi');
    }
    public function edit_destinasi($id)
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $data['destinasi'] = $this->modelDestinasi->getDestinasiById($id);
        if (empty($data['destinasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Destinasi tidak ditemukan');
        }

        $data['dataKategori'] = $this->modelKategori->getDataKategori();
        return view('backend/master_destinasi/edit_destinasi', $data);
    }
    public function update_destinasi()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        $idDestinasi = $this->request->getPost('id_destinasi');

        // Siapkan data yang akan diupdate
        $dataUpdate = [
            'nama_destinasi' => $this->request->getPost('nama_destinasi'),
            'id_kategori'   => $this->request->getPost('id_kategori'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'harga_tiket'   => $this->request->getPost('harga_tiket'),
            'stok_tiket'    => $this->request->getPost('stok_tiket'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        // Cek apakah ada file foto baru yang diupload
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Validasi
            if (!$this->validate([
                'foto' => 'max_size[foto, 1024]|ext_in[foto,jpg,jpeg,png]',
            ])) {
                session()->setFlashdata('error', 'Format foto harus JPG/PNG dan ukuran maksimal 1 MB!');
                return redirect()->to('/admin/edit-destinasi/' . $idDestinasi)->withInput();
            }

            // Hapus foto lama
            $destinasiLama = $this->modelDestinasi->getDestinasiById($idDestinasi);
            if ($destinasiLama['foto'] && file_exists('Assets/foto_destinasi/' . $destinasiLama['foto'])) {
                unlink('Assets/foto_destinasi/' . $destinasiLama['foto']);
            }

            // Upload baru
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('Assets/foto_destinasi', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
        }

        $this->modelDestinasi->updateDataDestinasi($dataUpdate, ['id_destinasi' => $idDestinasi]);
        session()->setFlashdata('success', 'Data destinasi berhasil diupdate!');
        return redirect()->to('/admin/master-destinasi');
    }
    public function hapus_destinasi($id)
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/');
        }

        // Hapus file foto dari folder
        $destinasi = $this->modelDestinasi->getDestinasiById($id);
        if ($destinasi['foto'] && file_exists('Assets/foto_destinasi/' . $destinasi['foto'])) {
            unlink('Assets/foto_destinasi/' . $destinasi['foto']);
        }

        // Soft delete
        $this->modelDestinasi->hapusDataDestinasi(['id_destinasi' => $id]);
        session()->setFlashdata('success', 'Data destinasi berhasil dihapus!');
        return redirect()->to('/admin/master-destinasi');
    }
    public function master_pengunjung()
    {
        if (!session()->get('is_login')) return redirect()->to('/');
        $data['dataPengunjung'] = $this->modelPengunjung->getAllPengunjung();
        return view('backend/master_pengunjung/master_data_pengunjung', $data);
    }

    // INPUT FORM
    public function input_pengunjung()
    {
        if (!session()->get('is_login')) return redirect()->to('/');
        return view('backend/master_pengunjung/input_pengunjung');
    }

    // SIMPAN
    public function simpan_pengunjung()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $data = [
            'id_pengunjung'   => $this->modelPengunjung->autoNumber(),
            'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
            'email'           => $this->request->getPost('email'),
            'password'        => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat'),
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $this->modelPengunjung->saveDataPengunjung($data);
        session()->setFlashdata('success', 'Pengunjung berhasil ditambahkan!');
        return redirect()->to('/admin/master-pengunjung');
    }

    // EDIT FORM
    public function edit_pengunjung($id)
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $data['pengunjung'] = $this->modelPengunjung->getPengunjungById($id);

        if (empty($data['pengunjung'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengunjung tidak ditemukan');
        }

        return view('backend/master_pengunjung/edit_pengunjung', $data);
    }
    // UPDATE
    public function update_pengunjung()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $id = $this->request->getPost('id_pengunjung');
        $data = [
            'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
            'email'           => $this->request->getPost('email'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        // Jika password diisi, update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        $this->modelPengunjung->updateDataPengunjung($data, ['id_pengunjung' => $id]);
        session()->setFlashdata('success', 'Pengunjung berhasil diupdate!');
        return redirect()->to('/admin/master-pengunjung');
    }

    // DELETE
    public function hapus_pengunjung($id)
    {
        if (!session()->get('is_login')) return redirect()->to('/');
        $this->modelPengunjung->hapusDataPengunjung(['id_pengunjung' => $id]);
        session()->setFlashdata('success', 'Pengunjung berhasil dihapus!');
        return redirect()->to('/admin/master-pengunjung');
    }

    public function master_transaksi()
    {
        if (!session()->get('is_login')) return redirect()->to('/');
        $data['dataTransaksi'] = $this->modelTransaksi->getDataTransaksi();
        return view('backend/transaksi/master_data_transaksi', $data);
    }

    public function transaksi_step1()
    {
        if (!session()->get('is_login')) return redirect()->to('/');
        $data['dataPengunjung'] = $this->modelPengunjung->getAllPengunjung();
        return view('backend/transaksi/transaksi_step1', $data);
    }

    public function proses_step1()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $idPengunjung = $this->request->getPost('id_pengunjung');
        session()->set('idPengunjungTransaksi', $idPengunjung);
        return redirect()->to('/admin/transaksi-step2');
    }

    public function transaksi_step2()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $idPengunjung = session()->get('idPengunjungTransaksi');
        $data['dataTemp'] = $this->modelTransaksi->getDataTemp(['tbl_temp_transaksi.id_pengunjung' => $idPengunjung]);
        $data['dataDestinasi'] = $this->modelDestinasi->getDataDestinasi();
        return view('backend/transaksi/transaksi_step2', $data);
    }

    public function tambah_temp()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $idPengunjung = session()->get('idPengunjungTransaksi');
        $idDestinasi = $this->request->getPost('id_destinasi');
        $jumlah = $this->request->getPost('jumlah_tiket');
        $tglKunjungan = $this->request->getPost('tgl_kunjungan');

        // Validasi stok
        $destinasi = $this->modelDestinasi->getDestinasiById($idDestinasi);
        if ($destinasi['stok_tiket'] < $jumlah) {
            session()->setFlashdata('error', 'Stok tiket tidak mencukupi!');
            return redirect()->to('/admin/transaksi-step2');
        }

        // Kurangi stok
        $this->modelDestinasi->updateDataDestinasi(
            ['stok_tiket' => $destinasi['stok_tiket'] - $jumlah],
            ['id_destinasi' => $idDestinasi]
        );

        $data = [
            'id_pengunjung' => $idPengunjung,
            'id_destinasi'  => $idDestinasi,
            'jumlah_tiket'  => $jumlah,
            'tgl_kunjungan' => $tglKunjungan
        ];
        $this->modelTransaksi->saveDataTemp($data);

        session()->setFlashdata('success', 'Tiket ditambahkan ke keranjang!');
        return redirect()->to('/admin/transaksi-step2');
    }

    public function hapus_temp($idTemp)
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        // Kembalikan stok
        $temp = $this->modelTransaksi->getDataTemp(['id_temp' => $idTemp])[0] ?? null;
        if ($temp) {
            $destinasi = $this->modelDestinasi->getDestinasiById($temp['id_destinasi']);
            $this->modelDestinasi->updateDataDestinasi(
                ['stok_tiket' => $destinasi['stok_tiket'] + $temp['jumlah_tiket']],
                ['id_destinasi' => $temp['id_destinasi']]
            );
        }

        $this->modelTransaksi->hapusDataTemp(['id_temp' => $idTemp]);
        session()->setFlashdata('success', 'Item dihapus dari keranjang!');
        return redirect()->to('/admin/transaksi-step2');
    }

    public function simpan_transaksi()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $idPengunjung = session()->get('idPengunjungTransaksi');
        $dataTemp = $this->modelTransaksi->getDataTemp(['tbl_temp_transaksi.id_pengunjung' => $idPengunjung]);

        if (empty($dataTemp)) {
            session()->setFlashdata('error', 'Keranjang kosong!');
            return redirect()->to('/admin/transaksi-step2');
        }

        $noTransaksi = $this->modelTransaksi->autoNumber();
        $totalBayar = 0;

        // Hitung total
        foreach ($dataTemp as $item) {
            $totalBayar += $item['harga_tiket'] * $item['jumlah_tiket'];
        }

        // Simpan transaksi utama
        $this->modelTransaksi->saveDataTransaksi([
            'no_transaksi'  => $noTransaksi,
            'id_pengunjung' => $idPengunjung,
            'tgl_transaksi' => date('Y-m-d'),
            'total_bayar'   => $totalBayar,
            'status'        => 'Sukses',
            'id_admin'      => session()->get('id_pengunjung') // admin yang login
        ]);

        // Simpan detail & hapus temp
        foreach ($dataTemp as $item) {
            $this->modelTransaksi->saveDataDetail([
                'no_transaksi'  => $noTransaksi,
                'id_destinasi'  => $item['id_destinasi'],
                'jumlah_tiket'  => $item['jumlah_tiket'],
                'subtotal'      => $item['harga_tiket'] * $item['jumlah_tiket'],
                'tgl_kunjungan' => $item['tgl_kunjungan']
            ]);
        }

        // Hapus keranjang
        $this->modelTransaksi->hapusDataTemp(['id_pengunjung' => $idPengunjung]);
        session()->remove('idPengunjungTransaksi');

        $qrCodePath = $this->generateTransaksiQrCode($noTransaksi);

        if ($qrCodePath) {
            $this->modelTransaksi->updateStatusTransaksi(['qr_code' => $qrCodePath], ['no_transaksi' => $noTransaksi]);
            session()->setFlashdata('success', 'Transaksi berhasil! QR Code telah dibuat.');
        } else {
            session()->setFlashdata('success', 'Transaksi berhasil, tetapi QR Code gagal dibuat.');
        }

        return redirect()->to('/admin/master-transaksi');
    }

    public function laporan_pemesanan()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $data['dataLaporan'] = [];
        $data['tgl_awal']    = '';
        $data['tgl_akhir']   = '';

        return view('backend/laporan/laporan_pemesanan', $data);
    }

    // Memproses filter tanggal dan menampilkan hasil
    public function filter_laporan()
    {
        if (!session()->get('is_login')) return redirect()->to('/');

        $tglAwal  = $this->request->getVar('tgl_awal');
        $tglAkhir = $this->request->getVar('tgl_akhir');

        // Validasi input
        if (empty($tglAwal) || empty($tglAkhir)) {
            session()->setFlashdata('error', 'Tanggal awal dan akhir harus diisi!');
            return redirect()->to('/admin/laporan-pemesanan');
        }

        // Ambil data transaksi sesuai rentang tanggal
        $data['dataLaporan'] = $this->modelTransaksi->getDataTransaksi([
            'tbl_transaksi.tgl_transaksi >=' => $tglAwal,
            'tbl_transaksi.tgl_transaksi <=' => $tglAkhir,
        ]);

        $data['tgl_awal']  = $tglAwal;
        $data['tgl_akhir'] = $tglAkhir;

        return view('backend/laporan/laporan_pemesanan', $data);
    }
}
