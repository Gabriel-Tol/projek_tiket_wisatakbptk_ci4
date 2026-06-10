<?php

namespace App\Controllers;

use App\Models\M_Pengunjung;

class Auth extends BaseController
{
    protected $modelPengunjung;

    public function __construct()
    {
        $this->modelPengunjung = new M_Pengunjung();
    }

    public function login()
    {
        if (session()->get('is_login')) {
            return redirect()->to('/user/dashboard');
        }
        return view('visitor/auth/login');
    }

    public function register()
    {
        if (session()->get('is_login')) {
            return redirect()->to('/user/dashboard');
        }
        return view('visitor/auth/register');
    }

    public function simpan_registrasi()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[tbl_pengunjung.email]',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|min_length[6]',
            'konfirmasi_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_pengunjung'   => $this->modelPengunjung->autoNumber(),
            'nama_pengunjung' => $this->request->getPost('nama'),
            'email'           => $this->request->getPost('email'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat'),
            'password'        => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'            => 'pengunjung',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
            'is_delete'       => '0'
        ];

        $this->modelPengunjung->saveDataPengunjung($data);

        // Auto login
        $sessionData = [
            'id_pengunjung'   => $data['id_pengunjung'],
            'nama_pengunjung' => $data['nama_pengunjung'],
            'email'           => $data['email'],
            'role'            => $data['role'],
            'is_login'        => TRUE
        ];
        session()->set($sessionData);

        return redirect()->to('/user/dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    public function autentikasi()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $pengunjung = $this->modelPengunjung->getDataPengunjung([
            'email'     => $email,
            'is_delete' => '0'
        ]);

        if ($pengunjung && password_verify($password, $pengunjung['password'])) {
            $sessionData = [
                'id_pengunjung'   => $pengunjung['id_pengunjung'],
                'nama_pengunjung' => $pengunjung['nama_pengunjung'],
                'email'           => $pengunjung['email'],
                'role'            => $pengunjung['role'],
                'foto'            => $pengunjung['foto'],
                'is_login'        => TRUE
            ];
            session()->set($sessionData);

            if ($pengunjung['role'] === 'admin') {
                return redirect()->to('/dashboard');
            }
            return redirect()->to('/user/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
