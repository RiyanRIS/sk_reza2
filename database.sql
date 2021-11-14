-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2021 at 12:57 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

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
)  ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `sistem`, `lembaga`, `kabinet`, `kampus`,`penjelasan` , `logo_lembaga`, `logo_kampus`, `updated_at`) VALUES
(1, 'E-Arsip BEM Akakom', 'Badan Eksekutif Mahasiswa', 'Pena Karya Bersama', 'STMIK AKAKOM YOGYAKARTA', 'Penjelasan seputar BEM kabinet dan hal lainyaa', '1628667602-smpnegeri3tulungagung.png', '1628667602-logo-stmik-akakom.jpg', 1628831134);

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
)    ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `username`, `password`) VALUES
(1, 'Fhareza Alvindo', 'admin', 'fhareza', '$2y$10$e9NekwNcVbfpVRnhPTySvedPDgckyKvuwbVIERVTcFlOsZjL3UPJW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `arsip` CHANGE `id_users` `id_users` INT NULL;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `arsip` ADD CONSTRAINT `arsip_users` FOREIGN KEY (`id_users`) REFERENCES `users`(`id`) ON DELETE SET NULL ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
