-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2021 at 09:59 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_reza`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int NOT NULL,
  `kode` varchar(64)  NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `file` varchar(255) NOT NULL,
  `catatan` varchar(500)  DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `created_at` int NOT NULL
)   ;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `kode`, `nama`, `jenis`, `tanggal`, `jam`, `file`, `catatan`, `id_users`, `created_at`) VALUES
(2, '001/SURATKELUAR/BEM/2021', 'SURAT KELUAR DPM', 'Surat', '2021-02-28', '16:15:00', '1637158664-001 SKELUAR_DPM.jpeg', 'Surat keluar dari BEM untuk DPM dalam kegiatan pelantikan Anggota BEM Periode 2020/2021', NULL, 1628835472),
(3, '002/SURATMASUK/BEM/2021', 'SURAT MASUK HMJ TK', 'Surat', '2021-12-24', '15:00:00', '1637158583-002 SMASUK_BEM.jpeg', 'Surat masuk ini diberikan oleh HMJ TK dalam hal kegiatan Basic Training Leadership HMJ TK', NULL, 1630826722),
(4, '003/LPJ/BEM/2021', 'LPL PELANTIKAN BEM', 'Laporan', '2021-03-02', '14:12:00', '1637158911-003 LPJ_PELANTIKAN.pdf', 'Laporan Pertanggungjawaban Pelantikan BEM Periode 2020/2021', NULL, 1636031894),
(5, '004/PROPOSAL/BEM/2021', 'PROPOSAL FBB 2021', 'Laporan', '2021-07-12', '13:21:00', '1637159286-004 PROPOSAL_FBB.pdf', 'Proposal Forum Belajar BEM (FBB) ini merupakan proposal kegiatan yang dilaksanakan oleh BEM', NULL, 1636190606);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int NOT NULL,
  `tahun` varchar(16)  NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sk` varchar(255) NOT NULL
)   ;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `tahun`, `nama`, `sk`) VALUES
(4, '2020/2021', 'PENA KARYA BERSAMA', '1637160257-BEM P 2020-2021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `sistem` varchar(64) NOT NULL,
  `lembaga` varchar(64) NOT NULL,
  `kabinet` varchar(64) NOT NULL,
  `kampus` varchar(64) NOT NULL,
  `penjelasan` varchar(300) NOT NULL,
  `logo_lembaga` varchar(255) NOT NULL,
  `logo_kampus` varchar(255) NOT NULL,
  `updated_at` int NOT NULL
)   ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `sistem`, `lembaga`, `kabinet`, `kampus`, `penjelasan`, `logo_lembaga`, `logo_kampus`, `updated_at`) VALUES
(1, 'E-Arsip BEM Akakom', 'Badan Eksekutif Mahasiswa', 'Pena Karya Bersama', 'STMIK AKAKOM YOGYAKARTA', 'Badan Eksekutif Mahasiswa STMIK Akakom Yogyakarta merupakan organisasi intra kampus yang berwenang untuk menyerap aspirasi dan melaksanakan segala bentuk tugas pokok dan fungsi yang melekat pada tubuh BEM Itu sendiri.', '1636902008-BEM.png', '1628667602-logo-stmik-akakom.jpg', 1637159941);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(64) NOT NULL,
  `role` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
)   ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `username`, `password`) VALUES
(7, 'Fhareza Alvindo', 'admin', 'reza', '$2y$10$2zxhlhDzstkU5VQnSLtex.WkKsSh8NhpTSHJu805095QkKSKnoDKq'),
(8, 'Melisa Andriani', 'anggota', 'melisa', '$2y$10$fOQ6KkaJR1bYvJmropqYSOsJt04JwQ7Th/AZyA2u3i8sP3u.2AZA.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arsip_users` (`id_users`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip`
--
ALTER TABLE `arsip`
  ADD CONSTRAINT `arsip_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
