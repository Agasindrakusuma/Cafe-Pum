-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2025 at 03:41 PM
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
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = belum selesai, 1 = selesai',
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `nama`, `noMeja`, `tanggal`, `status`, `idUser`) VALUES
(49, 'Agas Indra', 1, '2025-01-15 12:01:00', 1, 1),
(50, 'Ari', 1, '2025-01-16 00:51:48', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis` tinyint(1) NOT NULL COMMENT '1 = makanan, 2 = minuman',
  `harga` int(11) NOT NULL CHECK (`harga` >= 0),
  `foto` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = tersedia, 0 = tidak tersedia',
  `hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `jenis`, `harga`, `foto`, `status`, `hapus`) VALUES
(26, 'Kopi Americano', 4, 8000, 'kopiamericano.jpg', 1, '2024-10-29 12:10:00'),
(27, 'Kopi Susu', 4, 8000, 'kopisusu.jpg', 1, '2024-10-29 12:10:00'),
(28, 'ayam bakar', 1, 20000, 'default.jpg', 0, '2022-01-20 12:01:00'),
(29, 'Kopi Tubruk', 4, 8000, 'default.jpg', 0, '2022-01-20 12:01:00'),
(30, 'matcha', 2, 10000, 'matcha.jpg', 1, '2025-01-14 12:01:00'),
(31, 'cappucino', 1, 12000, 'cappucino.jpg', 1, '2025-01-14 12:01:00'),
(32, 'espresso', 1, 12000, 'espresso.jpg', 1, '2025-01-14 12:01:00'),
(33, 'matcha presso', 1, 12000, 'matchapresso.jpg', 1, '2025-01-14 12:01:00'),
(34, 'dimsum', 3, 10000, 'dimsum.jpg', 1, '2025-01-14 12:01:00'),
(35, 'pempek', 3, 12000, 'pempek.jpg', 1, '2025-01-14 12:01:00'),
(36, 'gorengan', 2, 100, 'gorengan.png', 1, '2025-01-14 12:01:00'),
(37, 'kofi', 1, 1, 'default.jpg', 1, '2025-01-14 12:01:00'),
(38, 'Brown Sugar Pandan ', 1, 17000, 'brownsugarpandan.jpg', 1, NULL),
(39, 'Brown Sugar', 1, 12000, 'brownsugar.jpg', 1, NULL),
(40, 'Matcha Presso', 1, 13000, 'matchapresso.jpg', 1, NULL),
(41, 'V60 Coffee', 1, 12000, 'v60coffee.jpg', 1, NULL),
(42, 'Americano', 1, 10000, 'americano.jpg', 1, NULL),
(43, 'Capucino', 1, 10000, 'capucino.jpeg', 1, NULL),
(44, 'Matcha Lattee', 2, 10000, 'matchalattee.jpeg', 1, NULL),
(45, 'Choco Milo Latte', 2, 10000, 'chocomilolatte.jpeg', 1, NULL),
(46, 'Dimsum', 3, 1000, 'dimsum.jpg', 1, NULL),
(47, 'Pempek', 3, 5000, 'pempek.jpeg', 1, NULL),
(48, 'Pangsit', 3, 15000, 'pangsit.jpg', 1, NULL),
(49, 'aaa', 1, 1, 'default.jpg', 1, '2025-01-15 12:01:00'),
(50, 'tes', 1, 1, 'default.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembelian`
-- (See below for the actual view)
--
CREATE TABLE `pembelian` (
`idAntrian` int(11)
,`namaAntrian` varchar(32)
,`noMeja` int(11)
,`statusAntrian` tinyint(1)
,`tanggal` datetime
,`idMenu` int(11)
,`namaMenu` varchar(32)
,`jenis` tinyint(1)
,`harga` int(11)
,`foto` varchar(256)
,`statusMenu` tinyint(1)
,`hapus` datetime
,`idTransaksi` int(11)
,`jumlah` int(11)
,`idUser` int(11)
,`namaUser` varchar(32)
,`rule` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL CHECK (`jumlah` > 0),
  `idAntrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `idMenu`, `jumlah`, `idAntrian`) VALUES
(22, 43, 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rule` tinyint(1) NOT NULL,
  `hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `rule`, `hapus`) VALUES
(1, 'muchsinku', '$2y$10$ymNyWoKQkkDNtkolUDT1pOYFkNcOv2lo.YHUW.AtnkniiBZ1xNdlW', 1, NULL),
(2, 'agas', '$2y$10$IeFjUvAwekzcdlKQDBYHDORHAJ6kOok9fs4Yq5H19k1k9eSIt.YjK', 0, NULL),
(3, 'nisa', '$2y$10$K0XzrLer5xBKzJohnDJ5Sue9izzynwxNk1rXCOQIu8fqGk7Cd3K36', 0, NULL),
(4, 'indra', '$2y$10$6f5dD6y7xVct6qEDE9yc.OiiCPvyBJXzbw13NTFv57gsibwFBVisi', 0, NULL),
(5, 'To One', '$2y$10$ssO/I1aZZo2/OQUL/yimwezQC6x8x/rVijwm4KJHJ2A9B98MFNG1S', 1, NULL);

-- --------------------------------------------------------

--
-- Structure for view `pembelian`
--
DROP TABLE IF EXISTS `pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian`  AS SELECT `a`.`id` AS `idAntrian`, `a`.`nama` AS `namaAntrian`, `a`.`noMeja` AS `noMeja`, `a`.`status` AS `statusAntrian`, `a`.`tanggal` AS `tanggal`, `m`.`id` AS `idMenu`, `m`.`nama` AS `namaMenu`, `m`.`jenis` AS `jenis`, `m`.`harga` AS `harga`, `m`.`foto` AS `foto`, `m`.`status` AS `statusMenu`, `m`.`hapus` AS `hapus`, `t`.`id` AS `idTransaksi`, `t`.`jumlah` AS `jumlah`, `u`.`id` AS `idUser`, `u`.`nama` AS `namaUser`, `u`.`rule` AS `rule` FROM (((`transaksi` `t` join `antrian` `a` on(`t`.`idAntrian` = `a`.`id`)) join `menu` `m` on(`t`.`idMenu` = `m`.`id`)) join `user` `u` on(`a`.`idUser` = `u`.`id`)) ;

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
  ADD KEY `idMenu` (`idMenu`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `fk_antrian_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_antrian` FOREIGN KEY (`idAntrian`) REFERENCES `antrian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_menu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
