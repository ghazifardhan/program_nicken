-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Mar 2017 pada 16.08
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nicken_litan_m`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `Id_Barang` varchar(15) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Id_Category` varchar(20) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Komisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`Id_Barang`, `Nama_Barang`, `Id_Category`, `Qty`, `Stok`, `Komisi`) VALUES
('001', 'baju', 'pakaian', 10, 20, 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `Id_Category` varchar(10) NOT NULL,
  `Nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `Id_Customer` varchar(10) NOT NULL,
  `Nama_Customer` char(50) NOT NULL,
  `Alamat_Customer` char(250) NOT NULL,
  `No_Telepon` int(15) NOT NULL,
  `Keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`Id_Customer`, `Nama_Customer`, `Alamat_Customer`, `No_Telepon`, `Keterangan`) VALUES
('KL0001', 'PT. ABC', 'JL. Imam Bonjol No. 51 , Karawaci - Tangerang', 999, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qty`
--

CREATE TABLE `qty` (
  `Harga` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `qty`
--

INSERT INTO `qty` (`Harga`, `Total`) VALUES
(20, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesman`
--

CREATE TABLE `salesman` (
  `Id_Salesman` varchar(10) NOT NULL,
  `Nama_Salesman` varchar(25) NOT NULL,
  `No_Telepon` int(11) NOT NULL,
  `Id_Target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `salesman`
--

INSERT INTO `salesman` (`Id_Salesman`, `Nama_Salesman`, `No_Telepon`, `Id_Target`) VALUES
('KL001', 'nicken', 90909, 1),
('kl11', '', 0, 0),
('Kl111', 'aa', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_salesman`
--

CREATE TABLE `target_salesman` (
  `Id_Target` varchar(12) NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target_salesman`
--

INSERT INTO `target_salesman` (`Id_Target`, `Keterangan`) VALUES
('T002', 'target bulanan01'),
('01', 'target ban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_Transaksi` varchar(10) NOT NULL,
  `Id_Salesman` varchar(10) NOT NULL,
  `Id_Barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`Id_Transaksi`, `Id_Salesman`, `Id_Barang`) VALUES
('sssc   ', 'KL001', '001'),
('T001', 'KL001', '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id_Barang`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id_Category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Customer`);

--
-- Indexes for table `qty`
--
ALTER TABLE `qty`
  ADD PRIMARY KEY (`Harga`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`Id_Salesman`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_Transaksi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
