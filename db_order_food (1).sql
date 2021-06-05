-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 03:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_order_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE `tb_food` (
  `id_food` int(11) NOT NULL,
  `id_restoran` int(11) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`id_food`, `id_restoran`, `nama_makanan`, `harga`) VALUES
(1, 1, 'Paket nasi tempe orek, kentang balado, oseng-oseng, tongkol', 30000),
(2, 2, 'Paket nasi sate padang', 40000),
(3, 3, 'Paket nasi soto ayam plus mendoan', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_restoran` int(11) NOT NULL,
  `id_food` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `alamat_pemesanan` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_restoran`, `id_food`, `harga`, `alamat_pemesanan`, `nama_lengkap`, `no_hp`, `email`) VALUES
(6, 3, 'Paket nasi soto ayam plus mendoan', 35000, 'Balaraja city', 'Lena', '0856223817361', 'lena11@gmail.com'),
(7, 1, 'Paket nasi tempe orek, kentang balado, oseng-oseng, tongkol', 30000, 'Pamulang City ', 'Daffa', '0892716528267', 'daffa345@gmail.com'),
(9, 2, 'Paket nasi sate padang', 40000, 'Cikupa City', 'Raffi', '0895331673780', 'raffiardiansyah77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restoran`
--

CREATE TABLE `tb_restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_restoran`
--

INSERT INTO `tb_restoran` (`id_restoran`, `nama_restoran`) VALUES
(1, 'Warteg Kharisma'),
(2, 'Restoran Padang Sederhana'),
(3, 'Soto Ayam Ndelik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_pengguna` int(5) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `status`) VALUES
(0, 'Raffi', 'raffi', '21232f297a57a5a743894a0e4a801fc3', 'Y'),
(1, 'Dimas', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD PRIMARY KEY (`id_food`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_food`
--
ALTER TABLE `tb_food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
