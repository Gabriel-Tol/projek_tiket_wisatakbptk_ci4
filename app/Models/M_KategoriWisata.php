<?php namespace App\Models;
use CodeIgniter\Model;

class M_KategoriWisata extends Model {
    protected $table = 'tbl_kategori';

    public function getData($where = false) {
        $builder = $this->db->table($this->table)->select('*');
        if ($where === false) $builder->where('is_delete', '0');
        else $builder->where($where);
        return $builder->orderBy('id_kategori', 'DESC')->get();
    }

    public function insertData($data) {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateData($data, $where) {
        return $this->db->table($this->table)->where($where)->update($data);
    }

    public function autoNumber() {
        return $this->db->table($this->table)->select('id_kategori')->orderBy('id_kategori','DESC')->limit(1)->get();
    }
}