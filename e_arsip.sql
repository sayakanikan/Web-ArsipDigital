-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 01:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `rule_aktor`
--

CREATE TABLE `rule_aktor` (
  `id_rule` int(11) NOT NULL,
  `nama_aktor` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule_aktor`
--

INSERT INTO `rule_aktor` (`id_rule`, `nama_aktor`, `role_id`) VALUES
(1, 'Admin', 1),
(2, 'User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `ttl` varchar(130) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telpon` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `foto_profil` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `nip`, `agama`, `ttl`, `gender`, `alamat`, `telpon`, `email`, `username`, `password`, `foto_profil`, `role_id`) VALUES
(1, 'Bagas Sakti', '201911796800', 'Islam', 'Semarang, 02 Desember 2001', 'L', 'Semarang', '082183049582', 'irfansyahavatar1@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '', 1),
(2, 'Ilham Pratama', '201911769700', 'Katolik', 'Semarang, 03 Desember 2000', 'L', 'Semarang', '081273840184', 'artama@g.com', 'admin2', 'd41d8cd98f00b204e980', '', 1),
(4, 'Cung Sei Teng', '20192371825', 'Kong Hu Cu', 'Semarang, 08 Desember 2001', 'L', 'Jakarta Selatan, DKI Jakarta', '08231746212', 'y@g.com', 'admin3', '202cb962ac59075b964b', '', 1),
(6, 'Ghozali', '20181728374', 'Islam', 'Semarang, 14 Desember 2000', 'L', 'Jakarta Utara, DKI Jakarta', '081627313151', 'sandihuda27@gmail.com', 'admin33', '81dc9bdb52d04dc20036dbd8313ed055', 'zalli.jpg', 1),
(8, 'Sandi Huda Jamal', '20201938194851', 'Hindu', 'Semarang, 19 Desember 2000', 'L', 'Perum Maju Mundur Raya III no. 32, Tandang, Semarang Tengah, Semarang', '0827129371921141', 'coba@g.com', 'admin0', '202cb962ac59075b964b07152d234b70', 'DSC09300.JPG', 1),
(9, 'Ilham God', '2019182716251', 'Islam', 'Semarang, 28 Desember 2000', 'L', 'Jakarta Barat, DKI Jakarta', '0823746175123', 'viaakartikaa@gmail.com', 'admin123', '202cb962ac59075b964b07152d234b70', 'Watch_Dogs_2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dok` int(11) NOT NULL,
  `nama_dok` varchar(120) NOT NULL,
  `kode_jenis` varchar(15) NOT NULL,
  `kode_dok` varchar(120) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dok`, `nama_dok`, `kode_jenis`, `kode_dok`, `tanggal_input`, `tahun`, `keterangan`, `file`) VALUES
(3, 'Sertifikat Hasil Inspeksi', 'SER', 'SRWB-02-2022', '2022-06-08', '2022', 'SERTIFIKAT webinar hari bumi sedunia tahun 2022', 'Sertifkat_Seminar_Hari_Bumi_STMKG1.pdf'),
(5, 'Surat Keluar Lapangan', 'SM', 'SK-01-2022-SK0294', '2022-06-08', '2020', 'Surat Keluar Kampus tahun 2022', ''),
(7, 'Sertifikat', 'SER', 'SER-03', '2022-06-10', '2022', 'Sertifikat tahun 2022', 'materiBrsInd-20220301112612_(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(30) NOT NULL,
  `jenis_dok` varchar(120) NOT NULL,
  `kode_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis_dok`, `kode_jenis`) VALUES
(1, 'Sertifikat', 'SER'),
(2, 'Surat Keluar', 'SK'),
(3, 'Surat Masuk', 'SM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nip` varchar(120) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `ttl` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `alamat` varchar(160) NOT NULL,
  `telpon` varchar(30) NOT NULL,
  `bagian` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `foto_profil` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `nip`, `agama`, `ttl`, `gender`, `alamat`, `telpon`, `bagian`, `email`, `username`, `password`, `foto_profil`, `role_id`) VALUES
(1, 'Andhika Pratama', '20182131751', 'Katolik', 'Semarang, 13 Desember 2000', 'L', 'Jl. Imam Bonjol no.2', '081273840193', 'Keuangan', 'irfansyahavatar0@gmail.com', 'user', '202cb962ac59075b964b07152d234b70', '', 2),
(2, 'Irfansyah', '2019202211796', 'Islam', 'Semarang, 24 Desember 2000', 'L', 'Klipang Permai blok H/316, Tembalang, Semarang', '081627313142', 'Keuangan', 's@g.com', 'user2', '202cb962ac59075b964b', 'profil.jpg', 2),
(3, 'sandi huda arkanata', '20174918385712', 'Kong Hu Cu', 'Semarang, 22 Desember 2001', 'L', 'Jakarta Selatan, DKI Jakarta', '0816273131499', 'Keuangan', 'halo2@gmail.com', 'user33', '202cb962ac59075b964b', '', 2),
(4, 'Huda arkanata', '20174918385711', 'Buddha', 'Semarang, 22 Desember 2001', 'L', 'Jakarta Selatan, DKI Jakarta', '0816273131498', 'Keuangan', 'tolong@yahoo.com', 'user46', '202cb962ac59075b964b07152d234b70', '20170627_160759.jpg', 2),
(5, 'Ghozaly', '20182719283911', 'Kong Hu Cu', 'Semarang, 09 Desember 2000', 'P', 'Jalan Beruang no. 12A', '081627313142', 'Keuangan', 'pes@g.com', 'user0', '202cb962ac59075b964b07152d234b70', 'DSC09578.JPG', 2),
(6, 'Ilham Everyday', '201928137192', 'Islam', 'Semarang, 31 Desember 2000', 'P', 'Klipang Permai blok H/317, Tembalang, Semarang', '081927171178', 'Keuangan', 'mimin@everyday.com', 'userrr', '202cb962ac59075b964b07152d234b70', '20170627_155709.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `token` varchar(120) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_token`
--

INSERT INTO `tb_user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'irfansyahavatar0@gmail.com', 'nkBeBeyHP4joOZBTENRomuXjNLq6jkMwHaye9Q0K4Bk=', 1646724450),
(2, 'irfansyahavatar0@gmail.com', 'u6lgxOI9PvxwZ3IA5FwrRrEn6KL3fGnduU7pzAAT1UM=', 1646725062),
(3, 'irfansyahavatar0@gmail.com', 'x2J+846pnHcZf93nMMBEwsKjW62RnrlvX1uJkSFRgto=', 1646726927),
(4, 'irfansyahavatar1@gmail.com', 'z2IUSz+vpC7YxmGwKWjApZyQQ4DtKO3oVk/h1MNI+FI=', 1647235249),
(5, 'irfansyahavatar0@gmail.com', 'nIWr/faDCvv1lD3nDsfWv6cLq1bPFofuONJ58Cp0z34=', 1652756571),
(6, 'irfansyahavatar1@gmail.com', 'TufyLHV1tgHypsCoQGBYr+EB9JeQn7yOZKp0PDERupE=', 1652756597),
(7, 'irfansyahavatar0@gmail.com', '65em7ctALy5NVqDLlS7WSQ1WjJxyWX8PgGbzVt6aZqI=', 1652757865),
(8, 'irfansyahavatar0@gmail.com', '2iz+iwIKOon7qHm0Sk1wh2P9R2Tk1bzV2TtVrM4TXK0=', 1652758153),
(9, 'irfansyahavatar0@gmail.com', 'dMGFsOfIpxOPHzgd/7kkEnqNqlTNjgtIeApwo6bqFfs=', 1652758353),
(10, 'irfansyahavatar1@gmail.com', '7eJVBnAepKBq1j+Wn6amTpYh+/hoGcfyEAkveN7hJqg=', 1654961702),
(11, 'irfansyahavatar1@gmail.com', '4T0dhMYZnhqLNqbO++VG4x/5kXVnWWZL+lu/NhMCfos=', 1654961918);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rule_aktor`
--
ALTER TABLE `rule_aktor`
  ADD PRIMARY KEY (`id_rule`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dok`),
  ADD UNIQUE KEY `kode_dok` (`kode_dok`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rule_aktor`
--
ALTER TABLE `rule_aktor`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rule_aktor` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD CONSTRAINT `tb_dokumen_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `tb_jenis` (`kode_jenis`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rule_aktor` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
