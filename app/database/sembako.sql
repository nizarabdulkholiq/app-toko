-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 03:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `jk`, `email`, `no_hp`) VALUES
('admin', 'admin', 'si mimin', 'Perempuan', 'adminmimin@gmail.com', '081212121212'),
('ninizar', '121212', 'Nizar Abdul Kholiq', 'Laki-laki', 'kholizar@gmail.com', '081234567899'),
('Nissin', 'nissin', 'Nissin Company', 'Laki-laki', 'nissincomkw@gmail.com', '083819888781');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pokok`
--

CREATE TABLE `bahan_pokok` (
  `id_sembako` varchar(11) CHARACTER SET latin1 NOT NULL,
  `nama_sembako` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` text CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_pokok`
--

INSERT INTO `bahan_pokok` (`id_sembako`, `nama_sembako`, `harga`, `deskripsi`, `gambar`) VALUES
('1', 'Nissin Crispy Cracker 225 g', 12000, 'Sertifikat: Halal,\r\nKondisi: Baru,\r\nBerat Satuan: 275 g,\r\nKategori: Biskuit & Wafer,\r\nEtalase: NISSIN,\r\nKatalog: Nissin Crispy Crackers,\r\nNissin Crispy Crackers dengan kemasan plastik yang dapat menemani aktifitas kamu dimana saja', 'cracker.jpg'),
('121002', 'Gula Pasir', 12000, 'Harga Gula Pasir : \r\n\r\n- Rp. 13.000,00 / Kg', 'gula1.jpg'),
('121003', 'Garam', 5000, 'Harga Garam : \r\n\r\n- Rp. 5.000,00 / bungkus', 'garam1.jpg'),
('121004', 'Minyak Goreng', 20000, 'Harga Minyak Goreng : \r\n\r\n- Rp. 20.000,00 / Liter', 'minyak1.jpg'),
('121005', 'Mentega ', 6000, 'Harga Mentega : \r\n\r\n- Rp. 6.000,00 / pcs', 'mentega1.jpg'),
('121006', 'Daging Sapi', 120000, 'Harga Daging Sapi : \r\n\r\n- Rp. 120.000,00 / Kg', 'sapi1.jpg'),
('121007', 'Daging Ayam', 25000, 'Harga Daging Ayam : \r\n\r\n- Rp. 25.000,00 / Kg', 'ayam1.jpg'),
('121008', 'Telur Ayam', 30000, 'Harga Telur Ayam : \r\n\r\n- Rp. 30.000,00 / Kg', 'telur.jpg'),
('121010', 'Bawang Merah ', 20000, 'Harga Bawang Merah : \r\n\r\n- Rp. 20.000,00 / Kg', 'bawangmerah1.jpg'),
('121011', 'Bawang Putih', 25000, 'Harga Bawang Putih : \r\n\r\n- Rp. 25.000,00 / Kg', 'bawangputih1.jpg'),
('121012', 'Gas LPG - 3 Kg', 20000, 'Harga Isi Ulang Gas LPG - 3 Kg : \r\n\r\n- Rp. 20.000,00 / gas', 'gas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `nama`, `jk`, `email`, `alamat`, `no_hp`) VALUES
('farhan', '12345', 'Farhan Rizki M', 'Laki-laki', 'akuganteng@gmail.com', 'Bogor', '081222112221'),
('NI-NIZAR', '121212', 'Nizar Abdul Kholiq', 'Laki-laki', '', '', '081234567898'),
('zayu', '00000', 'zayu', 'Laki-laki', 'nenet@gmail.com', 'Bandung', '081752637286'),
('zazay', '12345', 'zazay', 'Laki-laki', 'zazay@gmail.com', 'purwakarta pride', '083817672627');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_sembako` varchar(11) NOT NULL,
  `nama_sembako` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `tgl_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(60) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(13) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `jasa_kirim` varchar(11) CHARACTER SET latin1 NOT NULL,
  `total_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_beli`, `tgl_beli`, `nama`, `no_hp`, `alamat`, `jasa_kirim`, `total_pesanan`) VALUES
(11, '2HJ20X78XSB', '19-08-22', 'zazay', '08717171', 'purwakarta pride', 'PENGANTAR 3', 144000),
(12, '9H7WW3SXN38', '30-08-22', 'zazay', '00838177792', 'purwakarta pride', 'PENGANTAR 2', 69000),
(13, 'D5J1Q6WTOG7', '01-09-22', 'zazay', '083817672627', 'purwakarta ', 'PENGANTAR 2', 31000),
(15, '3OKDFUI2ROT', '16-01-23', 'zayu', '081752637286', 'Bandung kp indah no.4', 'PENGANTAR 2', 162000),
(16, 'M28E7LFEF60', '16-01-23', 'zayu', '081752637286', 'Bandung', 'PENGANTAR 2', 57000),
(17, 'SUTTMTJJ15L', '16-01-23', 'zayu', '081752637286', 'Bandung gg.manuk no21', 'PENGANTAR 2', 36000),
(18, '5W7R3FAKJ5E', '16-01-23', 'zayu', '081752637286', 'Bandung', 'PENGANTAR 2', 300132000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_sembako` varchar(11) CHARACTER SET latin1 NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_beli`, `id_sembako`, `harga`, `jumlah`, `subtotal`) VALUES
(5, 'A2LGXM154D1', '121001', 10000, 1, 10000),
(6, 'A2LGXM154D1', '121002', 13000, 1, 13000),
(7, 'A2LGXM154D1', '121003', 5000, 1, 5000),
(8, 'QUUOXABWD70', '121001', 10000, 1, 10000),
(9, 'QUUOXABWD70', '121002', 13000, 1, 13000),
(10, 'QUUOXABWD70', '121003', 5000, 1, 5000),
(11, 'BZN4YWH2QWV', '121002', 13000, 1, 13000),
(12, 'BZN4YWH2QWV', '121003', 5000, 1, 5000),
(13, 'BZN4YWH2QWV', '121004', 20000, 1, 20000),
(14, 'R3J50QE73GB', '121002', 13000, 1, 13000),
(15, 'R3J50QE73GB', '121003', 5000, 1, 5000),
(16, 'R3J50QE73GB', '121006', 120000, 1, 120000),
(17, 'A3TQQ259YVX', '121002', 13000, 1, 13000),
(18, 'A3TQQ259YVX', '121003', 5000, 1, 5000),
(19, 'A3TQQ259YVX', '121010', 20000, 1, 20000),
(20, '2HJ20X78XSB', '121002', 13000, 1, 13000),
(21, '2HJ20X78XSB', '121003', 5000, 1, 5000),
(22, '2HJ20X78XSB', '121006', 120000, 1, 120000),
(23, '9H7WW3SXN38', '121002', 13000, 1, 13000),
(24, '9H7WW3SXN38', '121003', 5000, 1, 5000),
(25, '9H7WW3SXN38', '121004', 20000, 1, 20000),
(26, '9H7WW3SXN38', '121007', 25000, 1, 25000),
(27, 'D5J1Q6WTOG7', '121003', 5000, 1, 5000),
(28, 'D5J1Q6WTOG7', '121004', 20000, 1, 20000),
(29, 'UL67HJ0X2ZK', '121002', 12000, 1, 12000),
(30, 'UL67HJ0X2ZK', '121004', 20000, 1, 20000),
(31, '3OKDFUI2ROT', '121003', 5000, 1, 5000),
(32, '3OKDFUI2ROT', '121005', 6000, 1, 6000),
(33, '3OKDFUI2ROT', '121006', 120000, 1, 120000),
(34, '3OKDFUI2ROT', '121007', 25000, 1, 25000),
(35, 'M28E7LFEF60', '121005', 6000, 1, 6000),
(36, 'M28E7LFEF60', '121007', 25000, 1, 25000),
(37, 'M28E7LFEF60', '121010', 20000, 1, 20000),
(38, 'SUTTMTJJ15L', '121008', 30000, 1, 30000),
(39, '5W7R3FAKJ5E', '121005', 6000, 1, 6000),
(40, '5W7R3FAKJ5E', '121006', 120000, 1, 120000),
(41, '5W7R3FAKJ5E', '12131415', 300000000, 1, 300000000);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `nama`, `comment`, `gambar`) VALUES
(1, 'Nizar Abdul Kholiq', 'mantap', 'keranjang.png'),
(2, 'dasuki', 'mantap pengiriman cepat', 'cart.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bahan_pokok`
--
ALTER TABLE `bahan_pokok`
  ADD PRIMARY KEY (`id_sembako`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_sembako`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
