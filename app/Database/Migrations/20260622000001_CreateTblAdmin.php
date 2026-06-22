<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin'      => ['type' => 'VARCHAR', 'constraint' => 6, 'null' => false],
            'nama_admin'    => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => false],
            'password'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'no_hp'         => ['type' => 'VARCHAR', 'constraint' => 15, 'null' => true],
            'alamat'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'foto'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_delete'     => ['type' => "ENUM('0','1')", 'default' => '0', 'null' => false],
            'created_at'    => ['type' => 'DATETIME', 'null' => false],
            'updated_at'    => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('tbl_admin');

        // Pindahkan data admin dari tbl_pengunjung ke tbl_admin
        $db = \Config\Database::connect();
        $admins = $db->table('tbl_pengunjung')
            ->where('role', 'admin')
            ->where('is_delete', '0')
            ->get()
            ->getResultArray();

        foreach ($admins as $admin) {
            $db->table('tbl_admin')->insert([
                'id_admin'    => 'A' . substr($admin['id_pengunjung'], 1),
                'nama_admin'  => $admin['nama_pengunjung'],
                'email'       => $admin['email'],
                'password'    => $admin['password'],
                'no_hp'       => $admin['no_hp'],
                'alamat'      => $admin['alamat'],
                'foto'        => $admin['foto'],
                'is_delete'   => '0',
                'created_at'  => $admin['created_at'],
                'updated_at'  => $admin['updated_at'],
            ]);
        }

        // Hapus kolom role dari tbl_pengunjung
        if ($this->db->DBDriver !== 'SQLite3') {
            $this->forge->dropColumn('tbl_pengunjung', ['role']);
        }
    }

    public function down()
    {
        // Kembalikan kolom role ke tbl_pengunjung
        if ($this->db->DBDriver !== 'SQLite3') {
            $this->forge->addField([
                'role' => ['type' => "ENUM('admin','pengunjung')", 'default' => 'pengunjung', 'null' => true],
            ]);
            $this->forge->addColumn('tbl_pengunjung', $fields = ['role']);
        }

        $this->forge->dropTable('tbl_admin');
    }
}
