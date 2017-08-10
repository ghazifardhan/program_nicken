-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `Id_Barang` varchar(15) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Id_Category` varchar(20) NOT NULL,
  `stok_awal` int(50) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Satuan_Barang` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_Barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barang` (`Id_Barang`, `Nama_Barang`, `Id_Category`, `stok_awal`, `Stok`, `Satuan_Barang`) VALUES
('000002',	'cucur',	'003',	1000,	10,	'PCS'),
('001',	'Kaos v-neck',	'03',	1000,	10,	'PCS'),
('212',	'OKC',	'003',	1000,	10,	'KARTON'),
('B003',	'500-12',	'03',	1000,	10,	'KARTON'),
('kl1',	'celana pendek',	'02',	1000,	10,	'PCS');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Id_Category` varchar(10) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  PRIMARY KEY (`Id_Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`Id_Category`, `Nama`) VALUES
('003',	'ban luar'),
('01',	'Baju'),
('02',	'Celanaw'),
('03',	'Ban Dalam');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Id_Customer` varchar(10) NOT NULL,
  `Nama_Customer` char(50) NOT NULL,
  `Id_Wilayah` int(10) NOT NULL,
  `Alamat_Customer` char(250) NOT NULL,
  `No_Telepon` int(15) NOT NULL,
  `Keterangan` varchar(500) NOT NULL,
  `Limit_Kredit` int(11) NOT NULL,
  `Status` char(20) NOT NULL,
  PRIMARY KEY (`Id_Customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`Id_Customer`, `Nama_Customer`, `Id_Wilayah`, `Alamat_Customer`, `No_Telepon`, `Keterangan`, `Limit_Kredit`, `Status`) VALUES
('CS001',	'Indofood',	1,	'JAKARTA',	7711913,	'ok',	100000,	'Lancar'),
('CS002',	'Indomie',	3,	'Cihuy',	7890,	'okoko',	200000,	'Lancar');

DROP TABLE IF EXISTS `salesman`;
CREATE TABLE `salesman` (
  `Id_Salesman` varchar(10) NOT NULL,
  `Nama_Salesman` varchar(25) NOT NULL,
  `No_Telepon` int(11) NOT NULL,
  `Id_Target` int(11) NOT NULL,
  PRIMARY KEY (`Id_Salesman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `salesman` (`Id_Salesman`, `Nama_Salesman`, `No_Telepon`, `Id_Target`) VALUES
('SL001',	'Cicit',	2323,	1),
('SL002',	'Koko',	2323,	0);

DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `Id_Tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `No_Tagihan` int(11) NOT NULL,
  `Id_Transaksi` int(11) NOT NULL,
  `Tgl` varchar(20) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Id_Customer` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Tagihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tagihan` (`Id_Tagihan`, `No_Tagihan`, `Id_Transaksi`, `Tgl`, `Jumlah`, `Id_Customer`) VALUES
(1,	1,	1,	'02/08/2017',	50000,	'CS001');

DROP TABLE IF EXISTS `target_salesman`;
CREATE TABLE `target_salesman` (
  `Id_Target` varchar(12) NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `target_salesman` (`Id_Target`, `Keterangan`) VALUES
('T002',	'500'),
('01',	'5000000');

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_login` (`id_user`, `username`, `password`, `level`, `status`) VALUES
('A001',	'admin',	'123',	'admin',	1),
('A002',	'nicken',	'123',	'spv',	1),
('A003',	'litan',	'123',	'direktur',	1),
('A004',	'fahmi',	'123',	'manager',	1);

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `Id_Transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `Tgl` varchar(10) NOT NULL,
  `Tgl_Tempo` varchar(10) NOT NULL,
  `No_transaksi` varchar(10) NOT NULL,
  `Id_Salesman` varchar(10) NOT NULL,
  `Id_Customer` varchar(10) NOT NULL,
  `Jumlah` int(15) NOT NULL,
  `Sudah_Dibayar` int(15) NOT NULL,
  `Status` char(20) NOT NULL,
  PRIMARY KEY (`Id_Transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi` (`Id_Transaksi`, `Tgl`, `Tgl_Tempo`, `No_transaksi`, `Id_Salesman`, `Id_Customer`, `Jumlah`, `Sudah_Dibayar`, `Status`) VALUES
(1,	'17/07/2017',	'27/07/2017',	'001',	'SL001',	'CS001',	50000,	50000,	'BELUM LUNAS');

DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail` (
  `Id_Transaksi_Detail` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Transaksi` int(11) NOT NULL,
  `Id_Barang` varchar(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Sales` varchar(11) NOT NULL,
  `Customer` varchar(11) NOT NULL,
  `Tgl` varchar(15) NOT NULL,
  `Wilayah` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Transaksi_Detail`),
  KEY `Harga` (`Harga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_detail` (`Id_Transaksi_Detail`, `Id_Transaksi`, `Id_Barang`, `Harga`, `Qty`, `Sales`, `Customer`, `Tgl`, `Wilayah`) VALUES
(1,	1,	'000002',	1000,	10,	'SL001',	'CS001',	'17/07/2017',	'1'),
(2,	1,	'001',	1000,	10,	'SL001',	'CS001',	'17/07/2017',	'1'),
(3,	1,	'212',	1000,	10,	'SL001',	'CS001',	'17/07/2017',	'1'),
(4,	1,	'kl1',	1000,	10,	'SL001',	'CS001',	'17/07/2017',	'1'),
(5,	1,	'B003',	1000,	10,	'SL001',	'CS001',	'17/07/2017',	'1');

DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `Id_Wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wilayah` (`Id_Wilayah`, `Nama`) VALUES
(1,	'Jakarta'),
(3,	'Tangerang');

-- 2017-07-26 22:14:26
