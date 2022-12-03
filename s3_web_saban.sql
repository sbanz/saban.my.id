-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 05:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s3_web_saban`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `id_klub` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `tanggal_tambah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `id_klub`, `id_pengguna`, `tanggal_tambah`) VALUES
(1, 2, 1, '2022-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `liga` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id`, `nama`, `liga`, `foto`) VALUES
(1, 'Manchester United', 'Eropa', 'https://resources.premierleague.com/premierleague/badges/t1.svg'),
(2, 'Manchester City', 'Eropa', 'https://resources.premierleague.com/premierleague/badges/t43.svg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', '$2y$10$UXIXni8jovK11SYLfH0VC.nw1f7n8UfhDVkDP65NGtfkhbUElEDMO', 2),
(2, 'admin', '$2y$10$bLvJswXbSkrZSkllrDbRRORjsNfufTQ1o4gPScx5Yq.ACJSw6qJoG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id` int(11) NOT NULL,
  `id_klub_pertama` int(11) DEFAULT NULL,
  `id_klub_kedua` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `id_klub_pemenang` int(11) DEFAULT NULL,
  `skor_klub_pertama` int(11) DEFAULT NULL,
  `skor_klub_kedua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`id`, `id_klub_pertama`, `id_klub_kedua`, `tanggal`, `lokasi`, `komentar`, `id_klub_pemenang`, `skor_klub_pertama`, `skor_klub_kedua`) VALUES
(1, 2, 1, '2022-12-16 00:00:00', 'dwadw', 'dwadwa', 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_klub` (`id_klub`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klub_pertama` (`id_klub_pertama`),
  ADD KEY `id_klub_kedua` (`id_klub_kedua`),
  ADD KEY `id_klub_pemenang` (`id_klub_pemenang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_klub`) REFERENCES `klub` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_klub_pertama`) REFERENCES `klub` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pertandingan_ibfk_2` FOREIGN KEY (`id_klub_kedua`) REFERENCES `klub` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pertandingan_ibfk_3` FOREIGN KEY (`id_klub_pemenang`) REFERENCES `klub` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
