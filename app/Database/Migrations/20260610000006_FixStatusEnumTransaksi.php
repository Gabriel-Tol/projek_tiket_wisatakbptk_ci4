<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixStatusEnumTransaksi extends Migration
{
    public function up()
    {
        // Change ENUM to include 'Berhasil' and 'Menunggu Konfirmasi'
        $this->db->query("ALTER TABLE tbl_transaksi MODIFY COLUMN `status` ENUM('Pending','Sukses','Batal','Berhasil','Menunggu Konfirmasi') NOT NULL DEFAULT 'Menunggu Konfirmasi'");

        // Backfill empty status to 'Menunggu Konfirmasi' for customer bookings
        $this->db->table('tbl_transaksi')
            ->where("status = '' OR status IS NULL")
            ->update(['status' => 'Menunggu Konfirmasi']);
    }

    public function down()
    {
        $this->db->query("ALTER TABLE tbl_transaksi MODIFY COLUMN `status` ENUM('Pending','Sukses','Batal') NOT NULL DEFAULT 'Pending'");
    }
}
