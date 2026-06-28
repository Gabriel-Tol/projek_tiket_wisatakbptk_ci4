<?php

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\M_Availability;

final class AvailabilityModelTest extends CIUnitTestCase
{
    protected $db;
    protected ?M_Availability $model = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = \Config\Database::connect();

        // Ensure a clean test table (works with sqlite/mysql)
        $driver = $this->db->DBDriver;
        if ($driver === 'SQLite3' || strpos($driver, 'SQLite') !== false) {
            $this->db->query("CREATE TABLE IF NOT EXISTS tbl_availability (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                destinasi_kode VARCHAR(50),
                date DATE,
                capacity INTEGER DEFAULT 0,
                booked INTEGER DEFAULT 0,
                is_delete CHAR(1) DEFAULT '0',
                created_at DATETIME,
                updated_at DATETIME
            );");
        } else {
            // MySQL/Postgres compatible create
            $this->db->query("CREATE TABLE IF NOT EXISTS tbl_availability (
                id INT AUTO_INCREMENT PRIMARY KEY,
                destinasi_kode VARCHAR(50),
                date DATE,
                capacity INT DEFAULT 0,
                booked INT DEFAULT 0,
                is_delete CHAR(1) DEFAULT '0',
                created_at DATETIME,
                updated_at DATETIME
            );");
        }

        $this->model = new M_Availability();
    }

    protected function tearDown(): void
    {
        // Drop test table cleanup
        $this->db->query('DROP TABLE IF EXISTS tbl_availability;');
        parent::tearDown();
    }

    public function testEnsureRowCreatesRow()
    {
        $date = date('Y-m-d', strtotime('+1 day'));
        $row = $this->model->ensureRow('TEST_DST', $date, 10);

        $this->assertIsArray($row);
        $this->assertArrayHasKey('destinasi_kode', $row);
        $this->assertEquals('TEST_DST', $row['destinasi_kode']);
        $this->assertEquals(10, (int)$row['capacity']);
        $this->assertEquals(0, (int)$row['booked']);
    }

    public function testCanBookAndAdjustBooked()
    {
        $date = date('Y-m-d', strtotime('+2 days'));
        $this->model->ensureRow('TEST_DST2', $date, 5);

        // initially can book 1
        $this->assertTrue($this->model->canBook('TEST_DST2', $date, 1));

        // adjust booked +2
        $ok = $this->model->adjustBooked('TEST_DST2', $date, 2);
        $this->assertTrue($ok);

        $row = $this->model->getAvailability('TEST_DST2', $date);
        $this->assertEquals(2, (int)$row['booked']);

        // cannot book more than remaining
        $this->assertFalse($this->model->canBook('TEST_DST2', $date, 10));
    }
}
