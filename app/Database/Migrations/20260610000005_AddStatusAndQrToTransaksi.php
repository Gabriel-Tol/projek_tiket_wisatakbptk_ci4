<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusAndQrToTransaksi extends Migration
{
    public function up()
    {
        $fields = [];

        if (!$this->db->fieldExists('status', 'tbl_transaksi')) {
            $fields['status'] = [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Menunggu Konfirmasi',
                'after'      => 'total_bayar',
            ];
        }

        if (!$this->db->fieldExists('qr_code', 'tbl_transaksi')) {
            $fields['qr_code'] = [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'status',
            ];
        }

        if (!$this->db->fieldExists('id_admin', 'tbl_transaksi')) {
            $fields['id_admin'] = [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
                'after'      => 'qr_code',
            ];
        }

        if (!empty($fields)) {
            $this->forge->addColumn('tbl_transaksi', $fields);
        }

        // Backfill existing rows to have a default status
        $this->db->table('tbl_transaksi')
            ->where('status IS NULL')
            ->orWhere("status = ''")
            ->update(['status' => 'Menunggu Konfirmasi']);
    }

    public function down()
    {
        $columns = [];
        if ($this->db->fieldExists('status', 'tbl_transaksi')) {
            $columns[] = 'status';
        }
        if ($this->db->fieldExists('qr_code', 'tbl_transaksi')) {
            $columns[] = 'qr_code';
        }
        if ($this->db->fieldExists('id_admin', 'tbl_transaksi')) {
            $columns[] = 'id_admin';
        }
        if (!empty($columns)) {
            $this->forge->dropColumn('tbl_transaksi', $columns);
        }
    }
}
