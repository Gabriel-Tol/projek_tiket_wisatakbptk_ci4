<?php

namespace App\Controllers;

use App\Models\M_Transaksi;
use App\Models\M_Pengunjung;

class Dashboard extends BaseController
{
    protected $modelTransaksi;
    protected $modelPengunjung;

    public function __construct()
    {
        $this->modelTransaksi  = new M_Transaksi();
        $this->modelPengunjung = new M_Pengunjung();
    }

    public function index()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/auth/login');
        }

        $idUser = session()->get('id_pengunjung');
        $allTransaksi = $this->modelTransaksi->getDataTransaksi(['tbl_transaksi.id_pengunjung' => $idUser]);
        
        $totalTiket = 0;
        $totalBerhasil = 0;
        foreach ($allTransaksi as $tr) {
            $totalTiket += $tr['jumlah_tiket'] ?? 0;
            if ($tr['status'] === 'Berhasil') {
                $totalBerhasil++;
            }
        }

        $db = \Config\Database::connect();

        // low availability in next 7 days (remaining <= 5)
        $lowBuilder = $db->table('tbl_availability a')
            ->select('a.*, d.nama_destinasi, (a.capacity - a.booked) AS remaining')
            ->join('tbl_destinasi d', "d.id_destinasi COLLATE utf8mb4_general_ci = a.destinasi_kode COLLATE utf8mb4_general_ci", 'LEFT', false)
            ->where('a.is_delete', '0')
            ->where('a.date >=', date('Y-m-d'))
            ->where("(a.capacity - a.booked) <= 5", null, false)
            ->orderBy('a.date', 'ASC')
            ->limit(5);

        $lowAvailability = $lowBuilder->get()->getResultArray();

        $data = [
            'title'         => 'Dashboard',
            'totalTiket'    => $totalTiket,
            'totalBerhasil' => $totalBerhasil,
            'recentHistory' => array_slice($allTransaksi, 0, 5),
            'user'          => $this->modelPengunjung->getPengunjungById($idUser),
            'lowAvailability' => $lowAvailability
        ];

        return view('visitor/dashboard/index', $data);
    }

    public function riwayat()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/auth/login');
        }

        $idUser = session()->get('id_pengunjung');
        $data = [
            'title'     => 'Riwayat Pemesanan',
            'riwayat'   => $this->modelTransaksi->getDataTransaksi(['tbl_transaksi.id_pengunjung' => $idUser])
        ];

        return view('visitor/dashboard/riwayat', $data);
    }

    public function profile()
    {
        if (!session()->get('is_login')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Akun Saya',
            'user'  => $this->modelPengunjung->getPengunjungById(session()->get('id_pengunjung'))
        ];

        return view('visitor/dashboard/profile', $data);
    }

    public function update_profile()
    {
        $idUser = session()->get('id_pengunjung');
        $data = [
            'nama_pengunjung' => $this->request->getPost('nama'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat'),
            'updated_at'      => date('Y-m-d H:i:s')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/profile/', $newName);
            $data['foto'] = $newName;
            session()->set('foto', $newName);
        }

        $this->modelPengunjung->updateDataPengunjung($data, ['id_pengunjung' => $idUser]);
        session()->set('nama_pengunjung', $data['nama_pengunjung']);

        return redirect()->to('/user/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function ganti_password()
    {
        $idUser = session()->get('id_pengunjung');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasi = $this->request->getPost('konfirmasi_password');

        if ($passwordBaru !== $konfirmasi) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok.');
        }

        $data = [
            'password'   => password_hash($passwordBaru, PASSWORD_BCRYPT),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->modelPengunjung->updateDataPengunjung($data, ['id_pengunjung' => $idUser]);

        return redirect()->to('/user/profile')->with('success', 'Password berhasil diganti.');
    }
}
