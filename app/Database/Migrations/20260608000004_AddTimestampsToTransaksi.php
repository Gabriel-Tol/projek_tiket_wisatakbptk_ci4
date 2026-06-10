<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToTransaksi extends Migration
{
    public function up()
    {
        $fields = [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];
        $this->forge->addColumn('tbl_transaksi', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_transaksi', ['created_at', 'updated_at']);
    }
}
