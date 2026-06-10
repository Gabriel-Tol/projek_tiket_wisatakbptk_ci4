<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTblTransaksi extends Migration
{
    public function up()
    {
        $fields = [
            'id_destinasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
                'after'      => 'id_pengunjung',
            ],
            'tanggal_kunjungan' => [
                'type'  => 'DATE',
                'null'  => true,
                'after' => 'id_destinasi',
            ],
            'jumlah_tiket' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'tanggal_kunjungan',
            ],
        ];
        $this->forge->addColumn('tbl_transaksi', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_transaksi', ['id_destinasi', 'tanggal_kunjungan', 'jumlah_tiket']);
    }
}
