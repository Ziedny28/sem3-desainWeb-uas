-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 07:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_fixed`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `penjelasan_singkat` varchar(100) NOT NULL,
  `penjelasan_detail` varchar(500) NOT NULL,
  `gambar_1` varchar(100) NOT NULL,
  `gambar_2` varchar(100) NOT NULL,
  `gambar_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `nama_destinasi`, `penjelasan_singkat`, `penjelasan_detail`, `gambar_1`, `gambar_2`, `gambar_3`) VALUES
(9, 'Malang, bromo', 'ini penjelasan singkat', 'ini penjelasan detail', 'malang-1.jpg', 'malang-2.jpg', 'malang-3.jpg'),
(10, 'Bali', 'ini penjelasan singkat', 'ini penjelasan detail', 'bali-1.jpg', 'bali-2.jpg', 'bali-3.jpg'),
(12, 'sumatra utara', 'ini penjelasan singkat', 'ini penjelasan detail', 'sumatra utara-1.jpg', 'sumatra utara-2.jpg', 'sumatra utara-3.jpg'),
(14, 'Manado', 'ini penjelasan singkat', 'ini penjelasan detail manado', 'manado-1.jpg', 'manado-2.jpg', 'manado-3.jpg'),
(15, 'yogya', 'ini penjelasan singkat', 'ini penjelasan detail', 'yogya-1.jpg', 'yogya-2.jpg', 'yogya-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket_service`
--

CREATE TABLE `paket_service` (
  `id_paket_service` int(11) NOT NULL,
  `nama_paket_service` varchar(100) NOT NULL,
  `penjelasan_singkat_paket_service` varchar(100) NOT NULL,
  `penjelasan_detail_paket_service` varchar(500) NOT NULL,
  `gambar_1_paket_service` varchar(100) DEFAULT NULL,
  `gambar_2_paket_service` varchar(100) DEFAULT NULL,
  `gambar_3_paket_service` varchar(100) DEFAULT NULL,
  `harga_paket_service` int(11) NOT NULL,
  `rating_paket_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_service`
--

INSERT INTO `paket_service` (`id_paket_service`, `nama_paket_service`, `penjelasan_singkat_paket_service`, `penjelasan_detail_paket_service`, `gambar_1_paket_service`, `gambar_2_paket_service`, `gambar_3_paket_service`, `harga_paket_service`, `rating_paket_service`) VALUES
(1, 'paket Malang', 'paket murah tour malang', 'paket ini akan membawa anda ke beberapa lokasi seperti bromo, masjid ikonik di Turen', 'malang-destinasi.jpg', 'malang-penginapan.jpg', 'malang-transportation.jpg', 3000000, 7),
(2, 'paket sumatra utara', 'sumut travel, akan membawa anda ber healing ria di sumut', 'Sumut travel, akan membawa anda ke beberapa tempat untuk ber healing ria, pulau samosir, danau toba, dengan kuliner yang menjamin healing anda, anda butuh healing, jangan bingung, langsung order service kami!', 'sumatra utara-destinasi.jpg', 'sumatra utara-penginapan.jpg', 'sumatra utara-transportation.jpg', 5000000, 8),
(3, 'paket manado', 'penjelasan singkat paket manado murah', 'penjelasan detail paket manado murah', 'manado-penginapan.jpg', 'manado-destinasi.jpg', 'Manado-transportation.jpg', 10000000, 7),
(4, 'paket yogya', 'penjelasan paket yogya', 'penjelasan detail paket yogya', 'yogya-destinasi.jpg', 'yogya-penginapan.jpg', 'yogya-transportasi.jpg', 2000000, 7),
(5, 'paket  bali', 'ini penjelasan singkat', 'penjelasan detail', 'bali-destinasi.jpg', 'bali-penginapan.jpg', 'bali-transportasi.jpg', 8000000, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indexes for table `paket_service`
--
ALTER TABLE `paket_service`
  ADD PRIMARY KEY (`id_paket_service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paket_service`
--
ALTER TABLE `paket_service`
  MODIFY `id_paket_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
