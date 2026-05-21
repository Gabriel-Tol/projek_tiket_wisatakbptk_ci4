<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Destinasi extends Model
{
    protected $table = 'tbl_destinasi';

    public function getDataDestinasi($where = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tbl_destinasi.*, tbl_kategori.nama_kategori');
        $builder->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_destinasi.id_kategori', 'LEFT');
        $builder->where('tbl_destinasi.is_delete', '0');
        if ($where) {
            $builder->where($where);
        }
        $builder->orderBy('nama_destinasi', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function getDestinasiById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_destinasi', $id);
        $builder->where('is_delete', '0');
        return $builder->get()->getRowArray();
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_destinasi');
        $builder->orderBy('id_destinasi', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();
            $lastId = substr($row['id_destinasi'], 3);
            $newId = 'DST' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'DST001';
        }
        return $newId;
    }

    public function saveDataDestinasi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataDestinasi($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataDestinasi($where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update(['is_delete' => '1', 'updated_at' => date('Y-m-d H:i:s')]);
    }
}