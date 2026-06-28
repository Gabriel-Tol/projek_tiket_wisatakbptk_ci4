<?php

namespace App\Controllers;

use App\Models\M_Destinasi;
use App\Models\M_Kategori;

class Home extends BaseController
{
    public function index()
    {
        $modelDestinasi = new M_Destinasi();
        $modelKategori = new M_Kategori();

        $data = [
            'destinasi' => $modelDestinasi->where('is_delete', '0')->limit(6)->orderBy('nama_destinasi', 'ASC')->findAll(),
            'kategori'  => $modelKategori->where('is_delete', '0')->findAll()
        ];

        return view('landing_page', $data);
    }

    public function galeri()
    {
        return view('galeri_keindahan');
    }

    public function coba()
    {
        echo 'Hello World!';
    }
}
