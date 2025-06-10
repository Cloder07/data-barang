-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jumlah`, `kategori`) VALUES
(3, 'Nasi Putih 1kg', 50, 'Makanan'),
(4, 'Mie Instan Indomie', 100, 'Makanan'),
(5, 'Susu UHT 1L', 75, 'Minuman'),
(6, 'Teh Botol Sosro 350ml', 150, 'Minuman'),
(7, 'Roti Tawar 500g', 30, 'Makanan'),
(8, 'Sereal Kellogg\'s 300g', 40, 'Makanan'),
(9, 'Sabun Mandi Lifebuoy 200g', 60, 'Kebutuhan Rumah'),
(10, 'Sikat Gigi Pepsodent 100g', 120, 'Kebutuhan Rumah'),
(11, 'Pembersih Lantai Mama Lemon', 80, 'Kebutuhan Rumah'),
(12, 'Deterjen Rinso 1kg', 150, 'Kebutuhan Rumah'),
(13, 'Tisu Toilet 10 Rol', 200, 'Kebutuhan Rumah'),
(14, 'Lipstik Maybelline', 50, 'Kecantikan'),
(15, 'Shampo Pantene 400ml', 90, 'Kecantikan'),
(16, 'Krim Pelembab Olay', 45, 'Kecantikan'),
(17, 'Bedak Johnson\'s', 60, 'Kecantikan'),
(18, 'Deodorant Rexona 150ml', 100, 'Kecantikan'),
(19, 'Popok Bayi Merries', 200, 'Perlengkapan Anak'),
(20, 'Susu Formula S-26 900g', 50, 'Perlengkapan Anak'),
(21, 'Mainan Mobil-mobilan', 80, 'Perlengkapan Anak'),
(22, 'Botol Susu Pigeon 250ml', 120, 'Perlengkapan Anak'),
(23, 'Oli Mesin 1L', 25, 'Otomotif'),
(24, 'Ban Mobil Bridgestone 175/70 R13', 10, 'Otomotif'),
(25, 'Pembersih Kaca Wiper', 50, 'Otomotif'),
(26, 'Cakram Rem Mobil', 15, 'Otomotif'),
(27, 'Kompor Gas Mini', 40, 'Peralatan Dapur'),
(28, 'Panci Teflon 24cm', 70, 'Peralatan Dapur'),
(29, 'Wajan Penggorengan 30cm', 60, 'Peralatan Dapur'),
(30, 'Blender Philips 500W', 30, 'Peralatan Dapur'),
(31, 'Poco M3', 50, 'Elektronik'),
(32, 'Oppo Find N5', 50, 'Elektronik'),
(33, 'Oppo Find X8 Pro', 50, 'Elektronik'),
(36, 'Oppo Reno13 5G	', 50, 'Elektronik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
