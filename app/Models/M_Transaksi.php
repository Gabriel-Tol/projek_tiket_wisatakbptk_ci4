<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksi extends Model
{
    protected $table = 'tbl_transaksi';
    protected $tableTemp = 'tbl_temp_transaksi'; // Kita akan buat tabel temporari
    protected $tableDetail = 'tbl_detail_transaksi';

    // Ambil data transaksi (join pengunjung)
    public function getDataTransaksi($where = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tbl_transaksi.*, tbl_pengunjung.nama_pengunjung');
        $builder->join('tbl_pengunjung', 'tbl_pengunjung.id_pengunjung = tbl_transaksi.id_pengunjung', 'LEFT');
        if ($where) {
            $builder->where($where);
        }
        $builder->orderBy('no_transaksi', 'DESC');
        return $builder->get()->getResultArray();
    }

    // Ambil data detail transaksi (join destinasi)
    public function getDetailTransaksi($noTransaksi)
    {
        $builder = $this->db->table($this->tableDetail);
        $builder->select('tbl_detail_transaksi.*, tbl_destinasi.nama_destinasi');
        $builder->join('tbl_destinasi', 'tbl_destinasi.id_destinasi = tbl_detail_transaksi.id_destinasi', 'LEFT');
        $builder->where('no_transaksi', $noTransaksi);
        return $builder->get()->getResultArray();
    }

    // Auto number transaksi
    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select('no_transaksi');
        $builder->orderBy('no_transaksi', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();
            $lastId = substr($row['no_transaksi'], 2);
            $newId = 'TR' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newId = 'TR0001';
        }
        return $newId;
    }

    // Data temporari (keranjang)
    public function getDataTemp($where = false)
    {
        $builder = $this->db->table($this->tableTemp);
        $builder->select('tbl_temp_transaksi.*, tbl_destinasi.nama_destinasi, tbl_destinasi.harga_tiket');
        $builder->join('tbl_destinasi', 'tbl_destinasi.id_destinasi = tbl_temp_transaksi.id_destinasi', 'LEFT');
        if ($where) {
            $builder->where($where);
        }
        return $builder->get()->getResultArray();
    }

    public function saveDataTransaksi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function saveDataDetail($data)
    {
        $builder = $this->db->table($this->tableDetail);
        return $builder->insert($data);
    }

    public function saveDataTemp($data)
    {
        $builder = $this->db->table($this->tableTemp);
        return $builder->insert($data);
    }

    public function hapusDataTemp($where)
    {
        $builder = $this->db->table($this->tableTemp);
        return $builder->delete($where);
    }

    public function updateStatusTransaksi($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }
}