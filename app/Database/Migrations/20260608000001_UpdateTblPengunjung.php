<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTblPengunjung extends Migration
{
    public function up()
    {
        $fields = [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'alamat',
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'pengunjung'],
                'default'    => 'pengunjung',
                'after'      => 'foto',
            ],
        ];
        $this->forge->addColumn('tbl_pengunjung', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_pengunjung', ['foto', 'role']);
    }
}
