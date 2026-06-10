<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJumlahTiket extends Migration
{
    public function up()
    {
        $fields = [
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
        $this->forge->dropColumn('tbl_transaksi', 'jumlah_tiket');
    }
}
