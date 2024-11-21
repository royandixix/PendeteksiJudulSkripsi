-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 04:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_221177`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `level` enum('admin','mahasiswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin12', 'Rahmawati', 'admin'),
(3, 'shee', 'shee12', 'Sheezy', 'mahasiswa'),
(15, 'gggg', '$2y$10$Iqh6pv7szmqbm6WYDV', 'iiiii', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `hasilkemiripan`
--

CREATE TABLE `hasilkemiripan` (
  `id` int(11) NOT NULL,
  `Judul_1` varchar(100) NOT NULL,
  `Judul_2` varchar(100) NOT NULL,
  `Persentase` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasilkemiripan`
--

INSERT INTO `hasilkemiripan` (`id`, `Judul_1`, `Judul_2`, `Persentase`) VALUES
(8, 'SISTEM INFORMASI PENJUALAN PADA APOTEKSAKTI BANDA ACEH BERBASIS WEB', '	SISTEM INFORMASI PENJUALAN PADA APOTEKSAKTI BANDA ACEH BERBASIS WEB', '100.00%'),
(14, 'Perancangan Aplikasi Perpustakaan Berbasis Web pada SMA Negeri 20 Pangkep', 'Perancangan Aplikasi Penjualan Berbasis Web pada Toko Mikayla Kidsswear', '55.38%'),
(17, 'SISTEM INFORMASI BIMBINGAN SKRIPSI BERBASIS WEB DI UNIVERSITAS PELITA HARAPAN', 'SISTEM INFORMASI BIMBINGAN SKRIPSI BERBASIS WEB DI UNIVERSITAS PELITA HARAPAN', '100.00%'),
(18, 'Aplikasi Informasi Imunisasi Anak dan Bayi Berbasis Website pada Posyandu Matahari', 'Aplikasi Informasi Imunisasi Anak dan Bayi Berbasis Website pada Posyandu Bimta', '95.89%');

-- --------------------------------------------------------

--
-- Table structure for table `judul_mahasiswa`
--

CREATE TABLE `judul_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judul_mahasiswa`
--

INSERT INTO `judul_mahasiswa` (`id_mhs`, `nim`, `nama`, `judul`) VALUES
(8, 221177, 'Rahmawati', 'Aplikasi Pendeteksi Kemiripan Judul Skripsi Berbasis Web');

-- --------------------------------------------------------

--
-- Table structure for table `judul_skripsi`
--

CREATE TABLE `judul_skripsi` (
  `id_judul` int(11) NOT NULL,
  `Judul` varchar(200) NOT NULL,
  `Penulis` varchar(50) NOT NULL,
  `Tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judul_skripsi`
--

INSERT INTO `judul_skripsi` (`id_judul`, `Judul`, `Penulis`, `Tahun`) VALUES
(1, 'SISTEM INFORMASI BIMBINGAN SKRIPSI BERBASIS WEB DI UNIVERSITAS PELITA HARAPAN', 'Benz Edy Kusuma', '2018'),
(2, 'SISTEM INFORMASI PENJUALAN PADA APOTEKSAKTI BANDA ACEH BERBASIS WEB', 'Abdul Afis Siregar', '2016'),
(6, 'PERANCANGAN SISTEM INFORMASI PENJUALAN BERBASIS WEBSITE (WEB) PADA UD. BERKAH', 'HEMA SYAFITRI', '2023'),
(8, 'Aplikasi Informasi Imunisasi Anak dan Bayi Berbasis Website pada Posyandu Matahari', 'Hana', '2024'),
(9, 'Aplikasi Penjualan Online pada UMKM Rezky Berbasis Web', 'Ulryke Eka Aprillia Anggeilina', '2024'),
(10, 'Perancangan Sistem Informasi Penjualan pada Toko Syifa Cosmetics', 'Noprianto', '2024'),
(11, 'Perancangan Aplikasi Perpustakaan Berbasis Web pada SMA Negeri 20 Pangkep', 'Erika', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `username` int(100) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `user_agent` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Nim` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `hasilkemiripan`
--
ALTER TABLE `hasilkemiripan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judul_mahasiswa`
--
ALTER TABLE `judul_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hasilkemiripan`
--
ALTER TABLE `hasilkemiripan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `judul_mahasiswa`
--
ALTER TABLE `judul_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
