-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 03:49 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_barang`, `nama_barang`, `stok`) VALUES
(1, 'B001', 'PULPEN', 30),
(2, 'B002', 'BUKU', 10),
(3, 'B003', 'PENGHAPUS', 20),
(4, 'B004', 'PENGGARIS', 15),
(5, 'B005', 'SPIDOL', 25);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `tanggal`, `id_barang`, `jumlah`) VALUES
(12, '2019-07-24 00:13:36', 1, 10),
(13, '2019-07-24 00:13:36', 1, 10),
(14, '2019-07-24 00:15:05', 1, 10),
(15, '2019-07-24 00:15:05', 1, 10),
(16, '2019-07-24 00:15:51', 1, 10),
(17, '2019-07-24 00:15:51', 1, 10),
(18, '2019-07-24 00:17:25', 1, 10),
(19, '2019-07-24 00:17:25', 1, 10),
(20, '2019-07-24 00:19:27', 1, 10),
(21, '2019-07-24 00:19:27', 1, 10),
(22, '2019-07-24 00:21:09', 1, 10),
(23, '2019-07-24 00:21:09', 1, 10),
(24, '2019-07-24 00:27:35', 1, 10),
(25, '2019-07-24 00:27:35', 1, 10),
(26, '2019-07-24 00:27:52', 1, 10),
(27, '2019-07-24 00:27:53', 1, 10),
(28, '2019-07-24 00:28:15', 1, 10),
(29, '2019-07-24 00:28:15', 1, 10),
(30, '2019-07-24 00:32:09', 1, 10),
(31, '2019-07-24 01:07:30', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idBarang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `FK_idBarang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
