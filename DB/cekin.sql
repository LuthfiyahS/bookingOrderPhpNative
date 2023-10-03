-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 10:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekin`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `merek` varchar(250) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `merek`, `nama_barang`, `foto_barang`, `harga`, `stok`, `deskripsi`, `nama_kategori`) VALUES
('BRG0001', '', 'Bunga Kipas 200 ribu', 'foto produk/WhatsApp Image 2023-09-05 at 15.04.49.jpeg', 250000, 3, '[INFO PENTING] \r\nSemua barang dikita Made by order ya kakak. Jadi tidak bisa menjamin kemiripan 100% dengan request kamu sebelumnya, karena kemungkinan bisa terjadi perubahan material serta pengerjaannya dan Hanya di @cekin.shop kamu bisa dapetin harga mu', 'Buket Bunga');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_barang`, `kuantitas`, `sub_total`) VALUES
('ORD0001', 'BRG0001', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `info_pesanan`
--

CREATE TABLE `info_pesanan` (
  `id_pengiriman` varchar(10) NOT NULL,
  `status_pengiriman` varchar(100) NOT NULL,
  `lokasi_pengiriman` varchar(100) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `id_pesanan` varchar(10) NOT NULL,
  `jasa_kirim` varchar(50) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_pesanan`
--

INSERT INTO `info_pesanan` (`id_pengiriman`, `status_pengiriman`, `lokasi_pengiriman`, `tgl_update`, `id_pesanan`, `jasa_kirim`, `no_resi`, `lokasi`) VALUES
('SHP0001', 'Penjual Menyerahkan paket anda', '', '0000-00-00 00:00:00', 'ORD0001', '0', '0', 'Purwakarta');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` varchar(10) NOT NULL,
  `nama_katalog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`) VALUES
('CTL0001', 'Buket Bunga'),
('CTL0002', 'Buket Uang');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_cart` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `nama_pembayaran` varchar(50) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `metode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `nama_akun`, `no_akun`, `metode`) VALUES
('PAY0001', 'Bank BRI', 'Cekin Shop', 2147483647, 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tgl_pesanan` datetime NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `email_penerima` varchar(100) NOT NULL,
  `telepon_penerima` varchar(20) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `id_pembayaran` varchar(10) NOT NULL,
  `negara` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `tgl_pesanan`, `nama_penerima`, `email_penerima`, `telepon_penerima`, `alamat_penerima`, `id_pembayaran`, `negara`, `kota`, `kode_pos`, `status`) VALUES
('ORD0001', 'USR0002', '0000-00-00 00:00:00', 'Andrew Cash', 'luthfiyah.sakinah19@gmail.com', '081282497545', 'In quo est ratione ', 'PAY0001', 'ID', 'Kabupaten Purwakarta', 53981, 'Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `level_user` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `telepon`, `passwd`, `foto_profil`, `level_user`, `status`, `tgl_daftar`) VALUES
('USR0001', 'Luthfiyah Sakinah', 'luthfiyah.sakinah19@gmail.com', '081282497545', 'P1asanW41927', 'localhost', 'Administrator', 'Aktif', '0000-00-00 00:00:00'),
('USR0002', 'Pia', 'piaaasan@gmail.com', '03629498234', 'P1asanW41927', '../inputan/foto profil/usr.png', 'User', 'Aktif', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `info_pesanan`
--
ALTER TABLE `info_pesanan`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
