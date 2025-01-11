-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2025 at 07:11 AM
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
-- Database: `pum`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `noMeja` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `nama`, `noMeja`, `tanggal`, `status`, `idUser`) VALUES
(35, 'a', 1, '2024-12-22 12:12:00', 2, 7),
(36, 'fwb', 1, '2024-12-22 12:12:00', 2, 7),
(37, 'Agas Indra Kusuma ', 1, '2025-01-05 12:01:00', 2, 7),
(38, 'Agas Indra Kusuma ', 1, '2025-01-05 12:01:00', 2, 7),
(39, 'agas', 1, '2025-01-05 12:01:00', 2, 7),
(40, 'Agas Indra Kusuma ', 2, '2025-01-05 12:01:00', 2, 7),
(41, 'fix', 4, '2025-01-05 12:01:00', 2, 7),
(42, 'Agas Indra Kusuma aka', 1, '2025-01-04 23:57:03', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis` int(1) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `jenis`, `harga`, `foto`, `status`, `hapus`) VALUES
(1, 'Chiken Katsu', 1, 20000, 'chickenkatsu1.jpg', 1, '2024-10-29 12:10:00'),
(2, 'Kentang Goreng', 2, 12000, 'kentanggoreng.jpg', 1, '2024-10-29 12:10:00'),
(3, 'Chesee Tea', 3, 10000, 'cheseetea.jpg', 1, '2024-10-29 12:10:00'),
(4, 'Espresso', 4, 10000, 'espresso.jpg', 1, '2024-10-29 12:10:00'),
(5, 'Mie Goreng Telur', 1, 8000, 'miegorengtelur.jpg', 1, '2024-10-29 12:10:00'),
(6, 'Nasi Goreng Keju', 1, 12000, 'nasigorengkeju.jpg', 1, '2024-10-29 12:10:00'),
(7, 'Ayam Goreng Tepung', 1, 20000, 'ayamgorengtepung.jpg', 1, '2024-10-29 12:10:00'),
(8, 'Sate Ayam', 1, 15000, 'sateayam.jpg', 1, '2024-10-29 12:10:00'),
(9, 'Tahu Bakso', 2, 10000, 'tahubakso.jpg', 1, '2024-10-29 12:10:00'),
(10, 'Kulit Ayam', 2, 10000, 'kulitayam.jpg', 1, '2024-10-29 12:10:00'),
(11, 'Banana Roll', 2, 10000, 'bananaroll.jpg', 0, '2024-10-29 12:10:00'),
(12, 'Sosis Bakar', 2, 10000, 'sosisbakar.jpg', 0, '2024-10-29 12:10:00'),
(13, 'Martabak Ayam', 2, 15000, 'martabakayam.jpg', 1, '2024-10-29 12:10:00'),
(14, 'Pisang Keju', 2, 12000, 'pisangkeju.jpg', 0, '2024-10-29 12:10:00'),
(15, 'Coklat Keju', 3, 12000, 'coklatkeju.jpg', 0, '2024-10-29 12:10:00'),
(16, 'Greentea keju', 3, 10000, 'greenteakeju.jpg', 1, '2024-10-29 12:10:00'),
(17, 'Milk Tea', 3, 10000, 'milktea.jpg', 1, '2024-10-29 12:10:00'),
(18, 'Cappucino Cincau', 3, 10000, 'cappucinocincau.jpg', 1, '2024-10-29 12:10:00'),
(19, 'Teh Keju Susu', 3, 12000, 'tehkejususu.jpg', 0, '2024-10-29 12:10:00'),
(20, 'Jus Melon', 3, 10000, 'jusmelon.jpg', 0, '2024-10-29 12:10:00'),
(21, 'Jus Semangka', 3, 10000, 'jussemangka.jpg', 0, '2024-10-29 12:10:00'),
(22, 'Jus Buah Naga', 3, 10000, 'jusbuahnaga.jpg', 1, '2024-10-29 12:10:00'),
(23, 'Jus Sirsak', 3, 10000, 'jussirsak.jpg', 1, '2024-10-29 12:10:00'),
(24, 'Cappucino Latte', 4, 10000, 'cappucinolatte.jpg', 1, '2024-10-29 12:10:00'),
(25, 'Green tea latte', 4, 10000, 'greentealatte.jpg', 1, '2024-10-29 12:10:00'),
(26, 'Kopi Americano', 4, 8000, 'kopiamericano.jpg', 1, '2024-10-29 12:10:00'),
(27, 'Kopi Susu', 4, 8000, 'kopisusu.jpg', 1, '2024-10-29 12:10:00'),
(28, 'ayam bakar', 1, 20000, 'default.jpg', 0, '2022-01-20 12:01:00'),
(29, 'Kopi Tubruk', 4, 8000, 'default.jpg', 0, '2022-01-20 12:01:00'),
(30, 'matcha', 2, 10000, 'matcha.jpg', 1, NULL),
(31, 'cappucino', 1, 12000, 'cappucino.jpg', 1, NULL),
(32, 'espresso', 1, 12000, 'espresso.jpg', 1, NULL),
(33, 'matcha presso', 1, 12000, 'matchapresso.jpg', 1, NULL),
(34, 'dimsum', 3, 10000, 'dimsum.jpg', 1, NULL),
(35, 'pempek', 3, 12000, 'pempek.jpg', 1, NULL),
(36, 'gorengan', 2, 100, 'gorengan.png', 1, NULL),
(37, 'kofi', 1, 1, 'default.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembelian`
-- (See below for the actual view)
--
CREATE TABLE `pembelian` (
`idAntrian` int(11)
,`namaAntrian` varchar(32)
,`noMeja` int(11)
,`statusAntrian` int(1)
,`tanggal` datetime
,`idMenu` int(11)
,`foto` varchar(32)
,`hapus` datetime
,`harga` int(11)
,`jenis` int(1)
,`namaMenu` varchar(32)
,`statusMenu` int(1)
,`idTransaksi` int(11)
,`jumlah` int(11)
,`idUser` int(11)
,`namaUser` varchar(32)
,`rule` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idAntrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `idMenu`, `jumlah`, `idAntrian`) VALUES
(27, 37, 1, 38),
(28, 32, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rule` int(1) NOT NULL,
  `hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `rule`, `hapus`) VALUES
(1, 'Moham', '$2y$10$MuR.3IpT.1xLJbeUYs6V6.KcCw0A6OO3Vv6K4L9dCuXgDum1eBf/G', 1, '2024-10-29 12:10:00'),
(2, 'findri', '$2y$10$tNdOYtHXIcaDMaG9F74E9ucomT55HJQh49A/hc9NCosDXTPp4EX0O', 0, '2024-10-29 12:10:00'),
(3, 'Moh. Nikmat', '123', 1, '2024-10-29 12:10:00'),
(4, 'Krocket ayam', '$2y$10$qC5Xlz80E7BuC/1cfkI5KOeyi/BQ9lw4nvmtYMmAUb0ijhq2NwMDi', 0, '2022-01-20 12:01:00'),
(6, 'muchsin', 'muchsinku', 1, '2024-09-19 12:09:00'),
(7, 'muchsinku', '$2y$10$ymNyWoKQkkDNtkolUDT1pOYFkNcOv2lo.YHUW.AtnkniiBZ1xNdlW', 1, NULL),
(8, 'agas', '$2y$10$IeFjUvAwekzcdlKQDBYHDORHAJ6kOok9fs4Yq5H19k1k9eSIt.YjK', 0, NULL),
(9, 'nisa', '$2y$10$K0XzrLer5xBKzJohnDJ5Sue9izzynwxNk1rXCOQIu8fqGk7Cd3K36', 0, NULL),
(10, 'indra', '$2y$10$6f5dD6y7xVct6qEDE9yc.OiiCPvyBJXzbw13NTFv57gsibwFBVisi', 0, NULL);

-- --------------------------------------------------------

--
-- Structure for view `pembelian`
--
DROP TABLE IF EXISTS `pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian`  AS SELECT `antrian`.`id` AS `idAntrian`, `antrian`.`nama` AS `namaAntrian`, `antrian`.`noMeja` AS `noMeja`, `antrian`.`status` AS `statusAntrian`, `antrian`.`tanggal` AS `tanggal`, `menu`.`id` AS `idMenu`, `menu`.`foto` AS `foto`, `menu`.`hapus` AS `hapus`, `menu`.`harga` AS `harga`, `menu`.`jenis` AS `jenis`, `menu`.`nama` AS `namaMenu`, `menu`.`status` AS `statusMenu`, `transaksi`.`id` AS `idTransaksi`, `transaksi`.`jumlah` AS `jumlah`, `user`.`id` AS `idUser`, `user`.`nama` AS `namaUser`, `user`.`rule` AS `rule` FROM (((`antrian` join `transaksi` on(`antrian`.`id` = `transaksi`.`idAntrian`)) join `menu` on(`transaksi`.`idMenu` = `menu`.`id`)) join `user` on(`antrian`.`idUser` = `user`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMenu` (`idMenu`) USING BTREE,
  ADD KEY `idAntrian` (`idAntrian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idAntrian`) REFERENCES `antrian` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
