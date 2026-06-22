<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Admin extends Model
{
    protected $table = 'tbl_admin';

    public function getDataAdmin($where = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('is_delete', '0');

        if ($where) {
            $builder->where($where);
        }

        return $builder->get()->getRowArray();
    }

    public function getAllAdmin()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_admin, nama_admin, email, no_hp, alamat, foto, is_delete, created_at, updated_at');
        $builder->where('is_delete', '0');
        $builder->orderBy('nama_admin', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function getAdminById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_admin', $id);
        $builder->where('is_delete', '0');
        return $builder->get()->getRowArray();
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_admin');
        $builder->orderBy('id_admin', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();
            $lastId = substr($row['id_admin'], 1);
            $newId = 'A' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newId = 'A00001';
        }
        return $newId;
    }

    public function saveDataAdmin($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataAdmin($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataAdmin($where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update(['is_delete' => '1']);
    }
}
