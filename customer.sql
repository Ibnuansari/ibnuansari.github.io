-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 01:48 AM
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
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `ponsel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `gambar`, `nama`, `tanggal`, `ponsel`, `email`, `perihal`, `pesan`) VALUES
(13, '', 'Budi Setiawan', '2024-10-06', '087654321098', 'budi.setiawan@outlook.com', 'Info Rumah', 'Saya ingin tahu apakah tersedia rumah dengan tipe 60 di lokasi dekat fasilitas umum seperti sekolah dan supermarket.'),
(14, '', 'Dewi Lestari', '2024-10-06', '082233445566', 'dewi.lestari@gmail.com', 'Info Rumah', 'Saya sedang mencari rumah dengan 3 kamar tidur dan taman kecil. Mohon kirimkan informasi tentang pilihan yang tersedia.'),
(15, '2024-10-20 11.47.16.jpg', 'Fajar Nugroho', '2024-10-06', '081345678912', 'fajar.nugroho@hotmail.com', 'Jadwal Kunjungan', 'Bisakah saya mendapatkan jadwal untuk melihat langsung rumah tipe 50? Saya ingin melakukan survei lapangan terlebih dahulu sebelum memutuskan pembelian.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(13, 'ibnu', '$2y$10$o2LYw1NcOEDU/.gci7Yd5.ul9Zt0x7El32kVlmUoT3MK.bZx1M2jq', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
