<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblPengaturan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_setting' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_setting' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nilai' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_setting', true);
        $this->forge->addUniqueKey('nama_setting');
        $this->forge->createTable('tbl_pengaturan');

        $this->db->table('tbl_pengaturan')->insertBatch([
            [
                'nama_setting' => 'nama_aplikasi',
                'nilai' => 'Sistem Informasi Pemesanan Tiket Wisata',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_setting' => 'alamat',
                'nilai' => 'Kalimantan Barat, Indonesia',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_setting' => 'telepon',
                'nilai' => '(0561) 123456',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_setting' => 'email_kontak',
                'nilai' => 'info@wisatakalbar.com',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_setting' => 'deskripsi_aplikasi',
                'nilai' => 'Platform pemesanan tiket wisata untuk destinasi terbaik di Kalimantan Barat.',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pengaturan');
    }
}
