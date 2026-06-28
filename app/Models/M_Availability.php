<?php

namespace App\Models;

class M_Availability
{
    protected $db;
    protected $table = 'tbl_availability';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getAvailability(string $destinasi_kode, string $date)
    {
        return $this->db->table($this->table)
            ->where('destinasi_kode', $destinasi_kode)
            ->where('date', $date)
            ->where('is_delete', '0')
            ->get()
            ->getRowArray();
    }

    public function ensureRow(string $destinasi_kode, string $date, int $capacity = 0)
    {
        $row = $this->getAvailability($destinasi_kode, $date);
        if (!$row) {
            $this->db->table($this->table)->insert([
                'destinasi_kode' => $destinasi_kode,
                'date' => $date,
                'capacity' => $capacity,
                'booked' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return $this->getAvailability($destinasi_kode, $date);
        }
        return $row;
    }

    public function canBook(string $destinasi_kode, string $date, int $quantity = 1): bool
    {
        $row = $this->getAvailability($destinasi_kode, $date);
        if (!$row) {
            return false;
        }
        return (($row['capacity'] - $row['booked']) >= $quantity);
    }

    public function adjustBooked(string $destinasi_kode, string $date, int $delta): bool
    {
        $db = $this->db;
        $builder = $db->table($this->table);

        $db->transStart();

        // Atomic increment/decrement of "booked"
        $builder->where('destinasi_kode', $destinasi_kode)
                ->where('date', $date)
                ->where('is_delete', '0')
                ->set('booked', "booked + ($delta)", false)
                ->update();

        if ($db->transStatus() === false) {
            $db->transRollback();
            return false;
        }

        $db->transComplete();
        return true;
    }
}
