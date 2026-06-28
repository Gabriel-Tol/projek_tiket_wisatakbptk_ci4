<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAvailability extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'destinasi_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'capacity' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'booked' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'is_delete' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => '0',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['destinasi_kode', 'date']);
        $this->forge->createTable('tbl_availability', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_availability', true);
    }
}
