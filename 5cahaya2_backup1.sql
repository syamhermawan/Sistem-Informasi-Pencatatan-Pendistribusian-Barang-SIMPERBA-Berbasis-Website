-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 06:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5cahaya2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` char(5) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `hrgjual` int(11) NOT NULL,
  `hrgbeli` int(11) NOT NULL,
  `pemkode` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `ukuran`, `stok`, `id_kategori`, `id_satuan`, `hrgjual`, `hrgbeli`, `pemkode`) VALUES
('K0091', 'MINYAKITA 1L Pilow Pack', '1 Liter', 65, 1, 5, 200000, 188000, 'D0001'),
('K0094', 'OK Super', '300gr', 15, 4, 5, 150000, 188000, 'D0001');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `konkode` char(5) CHARACTER SET utf8mb4 NOT NULL,
  `id_penjualan` char(6) CHARACTER SET utf8mb4 NOT NULL,
  `kode_brg` char(5) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `hrgjual` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `konkode`, `id_penjualan`, `kode_brg`, `nama_brg`, `ukuran`, `id_kategori`, `id_satuan`, `hrgjual`, `disc`, `qty`, `total`) VALUES
(177, 'K0002', 'P0001', 'K0091', 'MINYAKITA 1L Pilow Pack', '1 Liter', 1, 5, 200000, 0, 10, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `katid` int(11) NOT NULL,
  `katnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`katid`, `katnama`) VALUES
(1, 'Migor'),
(3, 'Sabun Mandi'),
(4, 'Sabun Cuci');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `konkode` char(5) NOT NULL,
  `konnama` varchar(100) DEFAULT NULL,
  `konalamat` varchar(200) DEFAULT NULL,
  `konnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`konkode`, `konnama`, `konalamat`, `konnotelp`) VALUES
('K0001', 'Syam', 'M. Ali', '085348480686'),
('K0002', 'Wahyu', 'kartini', '085345678895'),
('K0004', 'Nadia', 'Jl.Waluh gg', '085467747734'),
('K0005', 'Toko Sembako', 'Jl. Baamang Hulu 1', '085323458899');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `pemkode` char(5) NOT NULL,
  `pemnama` varchar(100) DEFAULT NULL,
  `pemalamat` varchar(200) DEFAULT NULL,
  `pemnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`pemkode`, `pemnama`, `pemalamat`, `pemnotelp`) VALUES
('D0001', 'PT. SSM', 'Bagendang', '085388563422'),
('D0002', 'Sumber Jaya Makmur', 'Kapuas', '081234552130');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan2`
--

CREATE TABLE `penjualan2` (
  `kode_penjualan` char(6) NOT NULL,
  `id_konsumen` char(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `jumlah` double NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sts` int(11) NOT NULL,
  `tempo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan2`
--

INSERT INTO `penjualan2` (`kode_penjualan`, `id_konsumen`, `nama`, `alamat`, `telp`, `jumlah`, `bayar`, `tanggal`, `sts`, `tempo`) VALUES
('P0001', 'K0002', 'Wahyu', 'kartini', '085345678895', 2000000, 1, '2024-02-01', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `satid` int(11) NOT NULL,
  `satnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`satid`, `satnama`) VALUES
(5, 'KTN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` enum('1','2','3') NOT NULL,
  `is_active` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama`, `password`, `role_id`, `is_active`, `foto`) VALUES
(11, 'admin', 'Admin', '$2y$10$RduIGwuwl2lD8rWIHQ/1o.QC9yym9eOwnlIzToHYvkJp9Mb4crCMW', '1', 1, 'photo6226510262375132273.jpg'),
(15, 'sales', 'Sales', '$2y$10$/yHh8mZPnbeHNIc.q/SIZeqCBmiQ1X/0yJNo9qsh1/NxdRPb1fiJa', '2', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Sales'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 3, 'Menu Management', 'menu', 'fa fa-user', 1),
(3, 3, 'SubMenu Management', 'menu/submenu', 'fa fa-users', 1),
(6, 2, 'My Profile', 'user', 'fa fa-trash', 0),
(7, 1, 'Role', 'admin/role', 'fas fa-user-tie', 0),
(8, 2, 'Edit Profile', 'user/edit', 'fa fa-user-edit', 0),
(9, 2, 'Ganti Password', 'user/changepassword', 'fa fa-key', 0),
(10, 7, 'Konsumen', 'konsumen', 'fa fa-user-circle-o', 1),
(11, 1, 'Outlet', 'konsumen', 'fa fa-user-circle', 1),
(13, 1, 'Kategori', 'kategori', 'fa fa-tag', 1),
(14, 1, 'Satuan', 'satuan', 'fa fa-archive', 1),
(15, 0, 'Barang', 'barang', 'fa fa-bars', 1),
(16, 1, 'Barang', 'barang', 'fa fa-bars', 1),
(17, 1, 'Daftar Pendistribusian', 'penjualan/daftar_penjualan', 'fa fa-address-card', 1),
(19, 1, 'Pemasok', 'pemasok', 'fa fa-car', 0),
(20, 2, 'Distribusi', 'penjualan/order', 'fa fa-car', 0),
(21, 2, 'Dashboard', 'sales', 'fas fa-tachometer-alt', 1),
(22, 1, 'Registrasi Sales', 'admin/daftar', 'fa fa-car', 1),
(23, 2, 'Order', 'konsumen', 'fas fa-tachometer-alt', 1),
(24, 2, 'Daftar Pendistribusian', 'penjualan/daftar_penjualan', 'fa fa-car', 1),
(25, 2, 'Daftar Barang', 'barang', 'fa fa-car', 1),
(26, 2, 'Registrasi Outlet', 'konsumen/tambahkonsumen', 'fas fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`id_kategori`),
  ADD KEY `satuan` (`id_satuan`),
  ADD KEY `konsumen2` (`konkode`),
  ADD KEY `idPejualan` (`id_penjualan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`konkode`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`pemkode`);

--
-- Indexes for table `penjualan2`
--
ALTER TABLE `penjualan2`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD KEY `konsumen` (`id_konsumen`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
