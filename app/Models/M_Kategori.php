<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kategori extends Model
{
    protected $table = 'tbl_kategori';

    public function getDataKategori($where = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where) {
            $builder->where($where);
        }
        $builder->where('is_delete', '0');
        $builder->orderBy('nama_kategori', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_kategori');
        $builder->orderBy('id_kategori', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();
            $lastId = substr($row['id_kategori'], 1); // ambil angka setelah 'K'
            $newId = 'K' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newId = 'K00001';
        }
        return $newId;
    }
    public function getKategoriById($id)
{
    $builder = $this->db->table($this->table);
    $builder->select('*');
    $builder->where('id_kategori', $id);
    $builder->where('is_delete', '0');
    return $builder->get()->getRowArray();  // satu baris saja
}

    public function saveDataKategori($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataKategori($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    // Soft delete
    public function hapusDataKategori($where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update(['is_delete' => '1']);
    }
}