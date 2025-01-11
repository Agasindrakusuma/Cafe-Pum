-- Revisi Database SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Set karakter default
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table: `antrian`
-- --------------------------------------------------------

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL AUTO_INCREMENT, -- Tambahkan AUTO_INCREMENT
  `nama` varchar(32) NOT NULL,
  `noMeja` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0, -- Gunakan TINYINT untuk status boolean
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`), -- Tambahkan PRIMARY KEY
  KEY `idUser` (`idUser`), -- Index untuk foreign key
  CONSTRAINT `fk_antrian_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON UPDATE CASCADE -- Nama constraint diperjelas
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `menu`
-- --------------------------------------------------------

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `jenis` tinyint(1) NOT NULL, -- Gunakan TINYINT untuk jenis kategori
  `harga` int(11) NOT NULL CHECK (`harga` >= 0), -- Tambahkan CHECK untuk harga tidak negatif
  `foto` varchar(256) NOT NULL, -- Ubah panjang untuk mengakomodasi path file yang lebih panjang
  `status` tinyint(1) NOT NULL DEFAULT 1, -- Tambahkan default untuk status aktif
  `hapus` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `transaksi`
-- --------------------------------------------------------

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL CHECK (`jumlah` > 0), -- Tambahkan CHECK untuk jumlah minimal 1
  `idAntrian` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMenu` (`idMenu`),
  KEY `idAntrian` (`idAntrian`),
  CONSTRAINT `fk_transaksi_menu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_antrian` FOREIGN KEY (`idAntrian`) REFERENCES `antrian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `user`
-- --------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rule` tinyint(1) NOT NULL, -- Gunakan TINYINT untuk jenis peran
  `hapus` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- View: `pembelian`
-- --------------------------------------------------------

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian` AS
SELECT 
  `a`.`id` AS `idAntrian`,
  `a`.`nama` AS `namaAntrian`,
  `a`.`noMeja` AS `noMeja`,
  `a`.`status` AS `statusAntrian`,
  `a`.`tanggal` AS `tanggal`,
  `m`.`id` AS `idMenu`,
  `m`.`nama` AS `namaMenu`,
  `m`.`jenis` AS `jenis`,
  `m`.`harga` AS `harga`,
  `m`.`foto` AS `foto`,
  `m`.`status` AS `statusMenu`,
  `m`.`hapus` AS `hapus`,
  `t`.`id` AS `idTransaksi`,
  `t`.`jumlah` AS `jumlah`,
  `u`.`id` AS `idUser`,
  `u`.`nama` AS `namaUser`,
  `u`.`rule` AS `rule`
FROM 
  `transaksi` `t`
JOIN 
  `antrian` `a` ON (`t`.`idAntrian` = `a`.`id`)
JOIN 
  `menu` `m` ON (`t`.`idMenu` = `m`.`id`)
JOIN 
  `user` `u` ON (`a`.`idUser` = `u`.`id`);

COMMIT;
