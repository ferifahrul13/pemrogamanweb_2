-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(3,	'sembakos',	'2021-01-16 13:29:20',	'2021-01-16 06:29:20'),
(4,	'sepeda',	'2021-01-16 05:17:12',	NULL);

DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_header_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_header_id` (`penjualan_header_id`),
  KEY `produk_id` (`produk_id`),
  CONSTRAINT `penjualan_detail_ibfk_1` FOREIGN KEY (`penjualan_header_id`) REFERENCES `penjualan_header` (`id`),
  CONSTRAINT `penjualan_detail_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `penjualan_detail` (`id`, `penjualan_header_id`, `produk_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(1,	4,	3,	12,	2000,	'2021-01-16 09:11:42',	NULL),
(2,	5,	3,	456,	2000,	'2021-01-16 09:13:23',	NULL),
(3,	6,	3,	23,	2000,	'2021-01-16 09:23:31',	NULL),
(4,	7,	3,	50,	2000,	'2021-01-16 09:42:43',	NULL);

DROP TABLE IF EXISTS `penjualan_header`;
CREATE TABLE `penjualan_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `no_nota` varchar(191) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `penjualan_header_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `penjualan_header` (`id`, `user_id`, `no_nota`, `tanggal`, `total_bayar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1,	5,	'70958157',	'2021-01-16 00:00:00',	0,	'242',	'2021-01-16 09:10:19',	NULL),
(2,	5,	'48007690',	'2021-01-16 00:00:00',	0,	'242',	'2021-01-16 09:10:33',	NULL),
(3,	5,	'32577502',	'2021-01-16 00:00:00',	0,	'242',	'2021-01-16 09:11:28',	NULL),
(4,	5,	'55736171',	'2021-01-16 00:00:00',	0,	'242',	'2021-01-16 09:11:42',	NULL),
(5,	5,	'87667506',	'2021-01-16 00:00:00',	0,	'23',	'2021-01-16 09:13:23',	NULL),
(6,	5,	'34368452',	'2021-01-16 00:00:00',	0,	'awdwad',	'2021-01-16 09:23:31',	NULL),
(7,	5,	'33301805',	'2021-01-16 00:00:00',	0,	'keterangan',	'2021-01-16 09:42:43',	NULL);

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(191) NOT NULL,
  `nama_produk` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto_produk` longtext DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `satuan`, `qty`, `deskripsi`, `status`, `harga`, `foto_produk`, `kategori_id`, `created_at`, `updated_at`) VALUES
(3,	'a1002s',	'feri ganteng',	'karung',	50,	'w3232',	1,	2000,	NULL,	3,	'2021-01-16 16:42:43',	'2021-01-16 09:42:43'),
(4,	'a1002sqs',	'beras',	'karung',	12,	'awdwadaw',	0,	2000,	NULL,	3,	'2021-01-16 05:31:26',	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `nama_user`, `username`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(4,	'tes admin',	'admin',	'ferifahrul1@gmail.com',	'5f4dcc3b5aa765d61d8327deb882cf99',	'admin',	'2021-01-16 14:14:58',	'2021-01-16 14:14:58'),
(5,	'user',	'user',	'user@gmail.com',	'ee11cbb19052e40b07aac0ca060c23ee',	'user',	'2021-01-16 07:34:21',	NULL),
(6,	'sempak',	'sempak',	'sempak@gmail.com',	'7d3854b88d78d3e1d614b57762a71cb6',	'admin',	'2021-01-16 09:29:02',	NULL),
(7,	'sempak',	'sempako',	'sempako2@gmail.com',	'3459c409c63057d74c85e80026b7d9f9',	'admin',	'2021-01-16 09:32:47',	NULL),
(9,	'x',	'x',	'x@x.com',	'9dd4e461268c8034f5c8564e155c67a6',	'admin',	'2021-01-16 09:34:10',	NULL);

-- 2021-01-16 09:45:52
