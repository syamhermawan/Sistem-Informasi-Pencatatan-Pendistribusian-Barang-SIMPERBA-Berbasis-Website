-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 19.51
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_cvlc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_brg` char(5) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `hrgjual` int(11) NOT NULL,
  `hrgbeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `ukuran`, `id_kategori`, `id_satuan`, `hrgjual`, `hrgbeli`) VALUES
('K0091', 'Minyak Goreng M&M', '1 Liter', 1, 5, 200000, 188000),
('K0092', 'Lark Prima', '90gr', 3, 5, 150000, 138000),
('K0093', 'Champion', '60gr', 3, 5, 180000, 156000),
('K0094', 'OK Super', '300gr', 4, 2, 150000, 188000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `katid` int(11) NOT NULL,
  `katnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`katid`, `katnama`) VALUES
(1, 'Migor'),
(3, 'Sabun Mandi'),
(4, 'Sabun Cuci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `konkode` char(5) NOT NULL,
  `konnama` varchar(100) DEFAULT NULL,
  `konalamat` varchar(200) DEFAULT NULL,
  `konnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`konkode`, `konnama`, `konalamat`, `konnotelp`) VALUES
('K0001', 'Syam', 'M. Ali', '085348480686'),
('K0002', 'Wahyu', 'kartini', '99988887777'),
('K0003', 'Heru', 'Jl.Kopi', '7786544');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nrp` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`) VALUES
(1, 'Ridho Surya', 876765456, 'ridho@gmail.com', 'Teknik Informatika'),
(2, 'Marini Alsa Khairana', 876765456, 'rana@gmail.com', 'Teknik Informatika'),
(3, 'Harun aw', 11111101, 'harun@gmail.com', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `pemkode` char(5) NOT NULL,
  `pemnama` varchar(100) DEFAULT NULL,
  `pemalamat` varchar(200) DEFAULT NULL,
  `pemnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`pemkode`, `pemnama`, `pemalamat`, `pemnotelp`) VALUES
('P0001', 'PT. SSM', 'Bagendang', '0876765654'),
('P0002', 'Sumber Jaya Makmur', 'Kapuas', '123335677878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` char(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `jumlah` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `nama`, `alamat`, `telp`, `jumlah`, `tanggal`) VALUES
('P0001', 'Syam', 'M. Ali', '085348480686', 2000000, '2022-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peoples`
--

CREATE TABLE `peoples` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `address`, `email`) VALUES
(1, 'Abdiel Gutkowski', '0757 Quigley Shores', 'alysha.greenfelder@example.org'),
(2, 'Prof. Meaghan Weissnat DVM', '7708 Toy Rapid Apt. 590', 'jaylan.gleichner@example.net'),
(3, 'Dustin Ward', '765 Sterling Track', 'ryley02@example.org'),
(4, 'Alfredo Veum', '3102 Marlen Circles Apt. 356', 'jorn@example.net'),
(5, 'Gertrude Hickle', '7021 Effertz Pike Apt. 883', 'windler.nora@example.org'),
(6, 'Ms. Pattie Vandervort II', '2228 Gregoria Crest', 'else54@example.com'),
(7, 'Delmer Hauck', '59543 Olson Ridges', 'lhalvorson@example.net'),
(8, 'Mr. Layne Goldner I', '81179 Gislason Fords', 'torphy.maya@example.org'),
(9, 'Victoria Kozey', '08091 Roberts Canyon Apt. 449', 'jazmyne.ritchie@example.net'),
(10, 'Royal Bins', '827 Monahan Creek Suite 557', 'sauer.bonnie@example.net'),
(11, 'Cayla Kris', '899 Leonel Haven Apt. 314', 'qsmith@example.com'),
(12, 'Will Walsh', '302 Effertz Neck Apt. 376', 'emerson56@example.net'),
(13, 'Lafayette Ankunding', '36851 Camila Island Suite 091', 'plockman@example.com'),
(14, 'Brett Gusikowski Sr.', '69928 Kelvin Estates', 'thoeger@example.org'),
(15, 'Marco Mosciski DDS', '36772 Estel Rue', 'mbecker@example.net'),
(16, 'Jacklyn Reinger', '953 Llewellyn Walks', 'qlindgren@example.com'),
(17, 'Prof. Domenico Harvey Jr.', '023 Bode Pike Suite 782', 'russel.ana@example.com'),
(18, 'Mr. Donny Howell IV', '226 Gutkowski Park', 'do\'reilly@example.net'),
(19, 'Dr. Coy Auer V', '37493 Zulauf Mount', 'jschowalter@example.org'),
(20, 'Mr. Elwin Pagac', '861 Dach Flat Suite 567', 'mariah94@example.net'),
(21, 'Miss Margot Barrows', '503 Jayde Cove Suite 645', 'frami.pascale@example.net'),
(22, 'Prof. Nya Torphy DVM', '4340 Nolan Glen Suite 858', 'jakayla.jones@example.net'),
(23, 'Chaim Koss', '0579 Buckridge Throughway Apt. 210', 'heidenreich.karina@example.com'),
(24, 'Conrad Buckridge', '9654 Ebert Villages Apt. 514', 'shahn@example.net'),
(25, 'Allie Witting', '286 Sporer Bridge', 'shemar.spinka@example.org'),
(26, 'Jaron Quigley', '30773 Kuhlman Valleys', 'stehr.zelma@example.com'),
(27, 'Dr. Augusta McGlynn', '9869 Christiansen Locks Suite 909', 'hilbert42@example.net'),
(28, 'Dr. Rudolph Romaguera III', '0395 Zemlak Shores', 'rabshire@example.com'),
(29, 'Thalia Anderson', '729 Halle Field', 'kris.juliana@example.org'),
(30, 'Jennie Langosh Sr.', '783 Osinski Light Suite 478', 'bergnaum.dulce@example.org'),
(31, 'Ismael Block', '80904 Gerhard Light Apt. 275', 'lonie.vonrueden@example.net'),
(32, 'Georgiana Kerluke', '763 McClure Junction', 'vincent33@example.org'),
(33, 'Carolyne Auer', '0940 Orn Spring Apt. 033', 'hhahn@example.com'),
(34, 'Mr. August Boyle', '20485 Franecki Field', 'feil.johathan@example.org'),
(35, 'Prof. Shana Carter', '60367 Lon Trail', 'fbeer@example.com'),
(36, 'Remington Conn', '2473 Kassulke Manors', 'kilback.marta@example.com'),
(37, 'Mr. Murray Heller', '824 Witting Path', 'fgreenholt@example.org'),
(38, 'Dr. Terrence Macejkovic I', '2515 Hammes Roads', 'lonzo.nolan@example.org'),
(39, 'Dr. Blake Stiedemann', '398 McDermott Plaza Suite 503', 'willy.carter@example.org'),
(40, 'Dr. Mara Jacobs MD', '45056 Erdman Springs', 'bbarrows@example.com'),
(41, 'Dr. Jammie Breitenberg', '8682 Sophie Center', 'desmond.murphy@example.org'),
(42, 'Marty Prosacco', '573 Wolf Ford Suite 205', 'jake.nienow@example.com'),
(43, 'Emil Russel', '630 Coty Fields Suite 421', 'roberts.rahsaan@example.com'),
(44, 'Gene Kessler DDS', '844 Lebsack Plaza Suite 609', 'chanel.lockman@example.net'),
(45, 'Oleta Connelly DVM', '030 Arianna Spring', 'florine.hauck@example.net'),
(46, 'Justen Wilkinson', '2821 Hagenes Villages', 'janessa95@example.com'),
(47, 'Jarrod Schmitt', '002 Magdalen Plain', 'rogahn.haley@example.net'),
(48, 'Velva Berge', '5295 Mayer Route Suite 200', 'kchamplin@example.net'),
(49, 'Enola Senger Sr.', '244 Schultz Fall Suite 475', 'cremin.ava@example.net'),
(50, 'Otto Cartwright', '86081 Effertz Pass', 'hills.marlen@example.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `satid` int(11) NOT NULL,
  `satnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`satid`, `satnama`) VALUES
(1, 'PCS'),
(2, 'PAK'),
(3, 'LUSIN'),
(5, 'KTN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` enum('1','2') NOT NULL,
  `is_active` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama`, `password`, `role_id`, `is_active`, `foto`) VALUES
(9, 'harun@gmail.com', 'Harun Saputra', '$2y$10$y4b6ZBgTISXQgPIGTMWeQuBCrp8Q05wZctfM.Tq7V2BuUTi4sQMSe', '2', 1, '25591856_1675144532551692_416306291824335043_n.jpg'),
(10, 'ridhosurya71@gmail.com', 'Ridho Surya', '$2y$10$v9AMBDfE1hXjsNP1xQkC9e6smDqK47VodroKnVH2GBhRPNNCIlsx2', '1', 1, '1132617_1.jpg'),
(11, 'syambitcoin1@gmail.com', 'Syam', '$2y$10$RduIGwuwl2lD8rWIHQ/1o.QC9yym9eOwnlIzToHYvkJp9Mb4crCMW', '1', 1, 'photo6226510262375132273.jpg'),
(12, 'syamdeathmonster@gmail.com', 'sales', '$2y$10$fykdG6oBJpkajYg.ReY/feZUQAL69uTxobA1vOGxYCXf5C3AK67FG', '2', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 3, 'Menu Management', 'menu', 'fa fa-user', 1),
(3, 3, 'SubMenu Management', 'menu/submenu', 'fa fa-users', 1),
(6, 2, 'My Profile', 'user', 'fa fa-trash', 0),
(7, 1, 'Role', 'admin/role', 'fas fa-user-tie', 1),
(8, 2, 'Edit Profile', 'user/edit', 'fa fa-user-edit', 0),
(9, 2, 'Ganti Password', 'user/changepassword', 'fa fa-key', 0),
(10, 7, 'Konsumen', 'konsumen', 'fa fa-user-circle-o', 1),
(11, 1, 'Konsumen', 'konsumen', 'fa fa-user-circle', 1),
(12, 1, 'Pemasok', 'pemasok', 'fa fa-car', 0),
(13, 1, 'Kategori', 'kategori', 'fa fa-tag', 1),
(14, 1, 'Satuan', 'satuan', 'fa fa-archive', 1),
(15, 0, 'Barang', 'barang', 'fa fa-bars', 1),
(16, 1, 'Barang', 'barang', 'fa fa-bars', 1),
(17, 1, 'Penjualan', 'penjualan/daftar_penjualan', 'fa fa-address-card', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`konkode`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`pemkode`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indeks untuk tabel `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satid`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
