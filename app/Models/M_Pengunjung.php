<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pengunjung extends Model
{
    protected $table = 'tbl_pengunjung';

    // Method untuk login (mengambil satu baris, termasuk password)
    public function getDataPengunjung($where = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');                         // ambil semua kolom
        $builder->where('is_delete', '0');

        if ($where) {
            $builder->where($where);
        }

        return $builder->get()->getRowArray();         // <-- satu baris
    }

    // Method untuk daftar pengunjung (tanpa password)
    public function getAllPengunjung()
    {
    $builder = $this->db->table($this->table);
    $builder->select('id_pengunjung, nama_pengunjung, email, no_hp, alamat, foto, role, is_delete, created_at, updated_at');
    $builder->where('is_delete', '0');
    $builder->orderBy('nama_pengunjung', 'ASC');
    return $builder->get()->getResultArray(); // array of array
    }
    public function getPengunjungById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_pengunjung', $id);
        $builder->where('is_delete', '0');
        return $builder->get()->getRowArray();
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_pengunjung');
        $builder->orderBy('id_pengunjung', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();
            $lastId = substr($row['id_pengunjung'], 1); // ambil angka setelah 'P'
            $newId = 'P' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newId = 'P00001';
        }
        return $newId;
    }

    public function saveDataPengunjung($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataPengunjung($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataPengunjung($where)
    {
    $builder = $this->db->table($this->table);
    $builder->where($where);
    return $builder->update(['is_delete' => '1']);
    }
}