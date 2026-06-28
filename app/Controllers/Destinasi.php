<?php

namespace App\Controllers;

use App\Models\M_Destinasi;
use App\Models\M_Kategori;

class Destinasi extends BaseController
{
    protected $modelDestinasi;
    protected $modelKategori;

    public function __construct()
    {
        $this->modelDestinasi = new M_Destinasi();
        $this->modelKategori  = new M_Kategori();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $where = ['tbl_destinasi.is_delete' => '0'];
        if ($kategori) {
            $where['tbl_destinasi.id_kategori'] = $kategori;
        }

        $query = $this->modelDestinasi->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_destinasi.id_kategori')
                                      ->where($where);

        if ($keyword) {
            $query = $query->like('nama_destinasi', $keyword);
        }

        $data = [
            'destinasi' => $query->paginate(6, 'destinasi'),
            'pager'     => $this->modelDestinasi->pager,
            'kategori'  => $this->modelKategori->where('is_delete', '0')->findAll(),
            'keyword'   => $keyword,
            'current_kategori' => $kategori
        ];

        return view('visitor/destinasi/index', $data);
    }

    public function detail($id)
    {
        $destinasi = $this->modelDestinasi->getDestinasiById($id);
        if (!$destinasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'destinasi' => $destinasi,
            'kategori'  => $this->modelKategori->where('id_kategori', $destinasi['id_kategori'])->first()
        ];

        return view('detail_wisata', $data);
    }

    public function detailCustomer($id)
    {
        $destinasi = $this->modelDestinasi->getDestinasiById($id);
        if (!$destinasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'destinasi' => $destinasi,
            'kategori'  => $this->modelKategori->where('id_kategori', $destinasi['id_kategori'])->first()
        ];

        return view('visitor/destinasi/detail', $data);
    }
}
