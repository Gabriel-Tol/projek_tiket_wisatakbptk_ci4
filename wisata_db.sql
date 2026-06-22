-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2026 at 11:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '20260608000001', 'App\\Database\\Migrations\\UpdateTblPengunjung', 'default', 'App', 1780961108, 1),
(2, '20260608000002', 'App\\Database\\Migrations\\UpdateTblTransaksi', 'default', 'App', 1781000993, 2),
(3, '20260608000003', 'App\\Database\\Migrations\\AddJumlahTiket', 'default', 'App', 1781001456, 3),
(4, '20260608000004', 'App\\Database\\Migrations\\AddTimestampsToTransaksi', 'default', 'App', 1781001503, 4),
(5, '20260610000005', 'App\\Database\\Migrations\\AddStatusAndQrToTransaksi', 'default', 'App', 1781090055, 5),
(6, '20260622000001', 'App\\Database\\Migrations\\CreateTblAdmin', 'default', 'App', 1782124800, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinasi`
--

CREATE TABLE `tbl_destinasi` (
  `id_destinasi` varchar(6) NOT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `id_kategori` varchar(6) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text,
  `foto` varchar(50) NOT NULL,
  `harga_tiket` int NOT NULL,
  `stok_tiket` int NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_destinasi`
--

INSERT INTO `tbl_destinasi` (`id_destinasi`, `nama_destinasi`, `id_kategori`, `lokasi`, `deskripsi`, `foto`, `harga_tiket`, `stok_tiket`, `is_delete`, `created_at`, `updated_at`) VALUES
('DST001', 'Pantai Pasir Panjang', 'K00001', 'Singkawang', 'Pantai Pasir Panjang Singkawang adalah destinasi wisata alam ikonik di Kalimantan Barat dengan garis pantai berpasir putih yang membentang sepanjang 3 km. Berlokasi di Kecamatan Singkawang Selatan (sekitar 20 menit/17 km dari pusat kota), kawasan ini buka 24 jam dengan fasilitas rekreasi lengkap dan pemandangan matahari terbenam yang memukau.', '1779264659_ef2a77e9a90c3bb5e66c.jpg', 20000, 5, '1', '2026-05-18 11:53:35', '2026-05-20 10:50:07'),
('DST002', 'Pantai Pasir Panjang', 'K00002', 'Singkawang', 'Pantai Pasir Panjang adalah destinasi wisata alam unggulan di Kota Singkawang, Kalimantan Barat, yang terkenal dengan garis pantainya yang membentang sepanjang 3 kilometer. Menghadap langsung ke Laut Natuna, pantai ini memiliki hamparan pasir putih yang landai serta ombak yang tenang.', '1779275638_c12e9570e3f4b595619d.jpg', 50000, 99997, '0', '2026-05-20 11:13:58', '2026-05-25 07:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_detail` int NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `id_destinasi` varchar(6) NOT NULL,
  `jumlah_tiket` int NOT NULL,
  `subtotal` int NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_detail`, `no_transaksi`, `id_destinasi`, `jumlah_tiket`, `subtotal`, `tgl_kunjungan`) VALUES
(1, 'TR0001', 'DST001', 1, 20000, '2026-05-19'),
(2, 'TR0002', 'DST001', 1, 20000, '2026-05-19'),
(3, 'TR0003', 'DST001', 1, 20000, '2026-05-20'),
(4, 'TR0001', 'DST001', 1, 20000, '2026-05-30'),
(5, 'TR0002', 'DST002', 10, 200000, '2026-05-20'),
(6, 'TR0003', 'DST002', 12, 240000, '2026-05-20'),
(7, 'TR0004', 'DST002', 11, 220000, '2026-05-20'),
(8, 'TR0005', 'DST002', 10, 200000, '2026-05-20'),
(9, 'TR0006', 'DST002', 1, 20000, '2026-05-20'),
(10, 'TR0007', 'DST002', 1, 20000, '2026-05-20'),
(11, 'TR0008', 'DST002', 2, 40000, '2026-05-22'),
(12, 'TR0009', 'DST002', 4, 80000, '2026-05-23'),
(13, 'TR0010', 'DST002', 30, 600000, '2026-06-01'),
(14, 'TR0011', 'DST002', 2, 40000, '2026-05-26'),
(15, 'TR0012', 'DST002', 2, 40000, '2026-05-25'),
(16, 'TR0014', 'DST002', 1, 50000, '2026-06-09'),
(17, 'TR0018', 'DST002', 2, 100000, '2026-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(6) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `is_delete`, `created_at`, `updated_at`) VALUES
('K00001', 'Wisata Alam', '0', '2026-05-18 10:17:52', '2026-05-18 10:17:52'),
('K00002', 'Wisata Bahari / Pantai', '0', '2026-05-18 11:32:30', '2026-05-18 11:32:30'),
('K00003', 'Wisata Budaya & Sejarah', '0', '2026-05-18 11:32:43', '2026-05-18 11:32:43'),
('K00004', 'Wisata Edukasi / Buatan', '1', '2026-05-18 11:34:19', '2026-05-18 11:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id_pengunjung` varchar(6) NOT NULL,
  `nama_pengunjung` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `email`, `password`, `no_hp`, `alamat`, `foto`, `is_delete`, `created_at`, `updated_at`) VALUES
('P00001', 'Dimas', 'admin@wisata.com', '$2y$12$W6KGo.mhRF7LOKkcxQT/vuv6BUPixut.lRjt.zmWCYt218ZSizOLS', '08123456789', 'Pontianak', NULL, '0', '2026-05-05 20:23:50', '2026-06-09 10:49:44'),
('P00002', 'Feliks', 'ambawang555@gmail.com', '$2y$12$jyvB6d1Wxx/Kvz7cDwhZdOq9uXag63UR.ZfAg5bvhGXL5h6j8rvQO', '081277889900', 'Lingga', NULL, '1', '2026-05-19 10:59:42', '2026-05-19 10:59:42'),
('P00003', 'Habibi', 'habibi@wisata.com', '$2y$12$oWjVZdo0Mr3oXe28CtXwr.4boEJnrEkrcqn92Gyme/e02hWX8xffO', '', '', NULL, '1', '2026-06-08 09:17:56', '2026-06-08 09:17:56'),
('P00004', 'Habibi', 'habibi555@wisata.com', '$2y$12$EIR2sC8fYjZPYxiag17gbOD8c4pAK7RhtWDku14wZPZGJzzawDUrW', '189281928', '1212', '1781003246_7bb384b6b979200af750.jpeg', '0', '2026-06-09 11:05:54', '2026-06-09 11:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `email`, `password`, `no_hp`, `alamat`, `foto`, `is_delete`, `created_at`, `updated_at`) VALUES
('A00001', 'Dimas', 'admin@wisata.com', '$2y$12$W6KGo.mhRF7LOKkcxQT/vuv6BUPixut.lRjt.zmWCYt218ZSizOLS', '08123456789', 'Pontianak', NULL, '0', '2026-05-05 20:23:50', '2026-06-09 10:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_transaksi`
--

CREATE TABLE `tbl_temp_transaksi` (
  `id_temp` int NOT NULL,
  `id_pengunjung` varchar(6) NOT NULL,
  `id_destinasi` varchar(6) NOT NULL,
  `jumlah_tiket` int NOT NULL DEFAULT '1',
  `subtotal` int NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `no_transaksi` varchar(15) NOT NULL,
  `id_pengunjung` varchar(6) NOT NULL,
  `id_destinasi` varchar(10) DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `jumlah_tiket` int DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_bayar` int NOT NULL,
  `status` enum('Pending','Sukses','Batal') NOT NULL DEFAULT 'Pending',
  `qr_code` varchar(50) DEFAULT NULL,
  `id_admin` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`no_transaksi`, `id_pengunjung`, `id_destinasi`, `tanggal_kunjungan`, `jumlah_tiket`, `tgl_transaksi`, `total_bayar`, `status`, `qr_code`, `id_admin`, `created_at`, `updated_at`) VALUES
('TR0008', 'P00001', NULL, NULL, NULL, '2026-05-22', 40000, 'Sukses', 'Assets/qrcode/qr_tr0008.png', 'P00001', NULL, NULL),
('TR0009', 'P00001', NULL, NULL, NULL, '2026-05-23', 80000, 'Sukses', 'Assets/qrcode/qr_tr0009.png', 'P00001', NULL, NULL),
('TR0010', 'P00001', NULL, NULL, NULL, '2026-05-23', 600000, 'Sukses', 'Assets/qrcode/qr_tr0010.png', 'P00001', NULL, NULL),
('TR0011', 'P00001', NULL, NULL, NULL, '2026-05-23', 40000, 'Sukses', 'Assets/qrcode/qr_tr0011.png', 'P00001', NULL, NULL),
('TR0012', 'P00001', NULL, NULL, NULL, '2026-05-25', 40000, 'Sukses', 'Assets/qrcode/qr_tr0012.png', 'P00001', NULL, NULL),
('TR0013', 'P00001', 'DST002', '2026-06-09', 1, '2026-06-09', 50000, '', 'qr_TR0013.png', NULL, '2026-06-09 10:38:35', NULL),
('TR0014', 'P00002', NULL, NULL, NULL, '2026-06-09', 50000, 'Sukses', 'Assets/qrcode/qr_tr0014.png', 'P00001', NULL, NULL),
('TR0015', 'P00004', 'DST002', '2026-06-10', 1, '2026-06-10', 50000, '', 'qr_TR0015.png', NULL, '2026-06-10 10:19:24', NULL),
('TR0016', 'P00004', 'DST002', '2026-06-10', 1, '2026-06-10', 50000, '', 'Assets/qrcode/qr_TR0016.png', NULL, '2026-06-10 10:56:30', NULL),
('TR0017', 'P00004', 'DST002', '2026-06-10', 1, '2026-06-10', 50000, '', 'Assets/qrcode/qr_TR0017.png', NULL, '2026-06-10 11:01:01', NULL),
('TR0018', 'P00004', NULL, NULL, NULL, '2026-06-10', 100000, 'Sukses', 'Assets/qrcode/qr_tr0018.png', 'P00001', NULL, NULL),
('TR0019', 'P00004', 'DST002', '2026-06-10', 1, '2026-06-10', 50000, '', 'Assets/qrcode/qr_TR0019.png', NULL, '2026-06-10 11:15:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_destinasi`
--
ALTER TABLE `tbl_destinasi`
  ADD PRIMARY KEY (`id_destinasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `id_destinasi` (`id_destinasi`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_temp_transaksi`
--
ALTER TABLE `tbl_temp_transaksi`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_temp_transaksi`
--
ALTER TABLE `tbl_temp_transaksi`
  MODIFY `id_temp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
