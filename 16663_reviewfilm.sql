-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 06:10 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `16663_reviewfilm`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `thriller` text NOT NULL,
  `gambar_film` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_genre` int UNSIGNED NOT NULL,
  `id_tahun` int UNSIGNED NOT NULL,
  `id_negara` int UNSIGNED NOT NULL,
  `id_rating` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `durasi` time NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `nama_film`, `thriller`, `gambar_film`, `deskripsi`, `id_genre`, `id_tahun`, `id_negara`, `id_rating`, `id_user`, `durasi`, `created_at`, `updated_at`) VALUES
(1, 'Inside out 2', 'https://youtu.be/LEjhY15eCx0?si=mT98VRvLOdHCLHkX', 'https://i.pinimg.com/736x/c7/97/2a/c7972aa922783a249e238f1fb002947d.jpg', '\"Inside Out 2\" melanjutkan kisah Riley yang kini berusia 13 tahun dan menghadapi perubahan emosional akibat pubertas. Emosi baru seperti Cemas, Iri, Malu, dan Bosan bergabung dengan emosi lama, menyebabkan konflik dalam dirinya. Saat Riley mengikuti kamp hoki dan menghadapi perubahan dalam persahabatan, ia belajar memahami dan menerima kompleksitas emosinya.', 2, 2, 2, 0, 0, '02:10:41', '2025-03-11 12:37:21', '2025-03-17 02:27:27'),
(2, 'The Wild Robot', 'https://youtu.be/67vbA5ZJdKQ?si=_OPhQoQ20cuzRKKc', 'https://i.pinimg.com/736x/ee/4d/65/ee4d65f0f106ec210ff933e96ce3a7a4.jpg', '\"The Wild Robot\" mengisahkan Roz, sebuah robot yang terdampar di pulau terpencil dan harus belajar bertahan hidup di alam liar. Ia beradaptasi dengan lingkungan, berteman dengan hewan, dan menjadi ibu angkat bagi seekor angsa yatim piatu, menemukan arti keluarga dan kasih sayang di tempat yang tak terduga.', 3, 1, 2, 0, 0, '01:42:41', '2025-03-15 02:04:32', '2025-03-15 02:04:32'),
(3, 'Elemental', 'https://youtu.be/hXzcyx9V0xw?si=lVrwLsaQNnsC9GyN', 'https://i.pinimg.com/736x/f3/4c/4a/f34c4a0ae6791a1d64eb552c85cb9603.jpg', 'Elemental (2023) adalah film animasi Pixar yang berlatar di Element City, di mana elemen api, air, tanah, dan udara hidup berdampingan. Kisahnya mengikuti Ember (api) dan Wade (air) yang bertolak belakang namun saling memahami. Dengan visual memukau dan pesan tentang identitas serta menerima perbedaan, film ini menghadirkan kisah yang hangat dan menyentuh.', 1, 1, 2, 0, 0, '01:42:38', '2025-03-15 03:24:52', '2025-03-15 03:24:52'),
(4, 'Coco', 'https://youtu.be/xlnPHQ3TLX8?si=nYQpQ4HYeAVGmhum', 'https://i.pinimg.com/736x/29/db/0c/29db0c0a687e36fd8a03f01d367fb14c.jpg', 'Miguel, seorang bocah yang bercita-cita menjadi musisi, secara tak sengaja masuk ke Dunia Arwah saat mencoba mencari kebenaran tentang leluhurnya. Dalam petualangannya, ia bertemu dengan Hector, seorang pria misterius yang membantunya mengungkap rahasia keluarga dan memahami pentingnya mengingat serta menghormati leluhur.', 5, 7, 2, 0, 0, '01:56:24', '2025-03-24 04:00:33', '2025-03-17 20:49:28'),
(5, 'CocoTess', 'https://youtu.be/xlnPHQ3TLX8?si=nYQpQ4HYeAVGmhum', 'https://i.pinimg.com/736x/29/db/0c/29db0c0a687e36fd8a03f01d367fb14c.jpg', 'tesssss', 8, 1, 1, 0, 0, '00:00:24', '2025-03-11 04:00:28', '2025-03-19 22:35:41'),
(8, 'tess', 'https://youtu.be/xlnPHQ3TLX8?si=nYQpQ4HYeAVGmhum', 'https://i.pinimg.com/736x/29/db/0c/29db0c0a687e36fd8a03f01d367fb14c.jpg', 'tesss', 2, 3, 2, 0, 0, '01:40:04', '2025-03-11 04:00:10', '2025-03-11 04:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int UNSIGNED NOT NULL,
  `nama_genre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `created_at`, `updated_at`) VALUES
(1, 'Fantasy', '2025-03-11 06:11:10', '2025-03-11 06:11:10'),
(2, 'Comedy', '2025-03-11 06:11:10', '2025-03-11 06:11:10'),
(3, 'Action', '2025-03-11 06:11:31', '2025-03-11 06:11:31'),
(4, 'Drama', '2025-03-11 06:11:31', '2025-03-11 14:36:22'),
(5, 'Animation ', '2025-03-11 06:18:16', '2025-03-11 06:18:16'),
(6, 'Adventure', '2025-03-11 06:18:16', '2025-03-17 02:14:18'),
(8, 'Family', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int UNSIGNED NOT NULL,
  `id_film` int NOT NULL,
  `id_user` int NOT NULL,
  `id_rating` int NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_film`, `id_user`, `id_rating`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 0, 'tess\r\n', '2025-03-15 00:59:02', '2025-03-15 00:59:02'),
(2, 1, 4, 0, 'bagus cik', '2025-03-15 00:59:36', '2025-03-15 00:59:36'),
(3, 1, 6, 0, 'bagus', '2025-03-15 01:24:34', '2025-03-15 01:24:34'),
(4, 1, 6, 0, 'bagus', '2025-03-15 01:25:09', '2025-03-15 01:25:09'),
(5, 2, 6, 0, 'bgus cik', '2025-03-15 01:26:53', '2025-03-15 01:26:53'),
(6, 1, 4, 0, 'tes', '2025-03-16 01:31:18', '2025-03-16 01:31:18'),
(7, 3, 4, 0, 'tes', '2025-03-16 02:41:05', '2025-03-16 02:41:05'),
(8, 3, 7, 0, 'nice', '2025-03-16 03:19:39', '2025-03-16 03:19:39'),
(9, 3, 8, 0, 'tes', '2025-03-18 18:29:41', '2025-03-18 18:29:41'),
(10, 2, 4, 0, 'tes\r\n', '2025-03-18 21:24:05', '2025-03-18 21:24:05'),
(11, 2, 11, 0, 'tes', '2025-03-19 21:13:36', '2025-03-19 21:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id_negara` int UNSIGNED NOT NULL,
  `nama_negara` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`, `created_at`, `update_at`) VALUES
(1, 'Indonesia', '2025-03-11 06:13:24', '2025-03-11 06:13:24'),
(2, 'USA', '2025-03-11 06:37:03', '2025-03-11 06:37:03'),
(3, 'Jepang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Cina', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int UNSIGNED NOT NULL,
  `id_film` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `jumlah_rating` int NOT NULL,
  `rating` int DEFAULT NULL
) ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_film`, `id_user`, `jumlah_rating`, `rating`) VALUES
(5, 3, 4, 0, 4),
(6, 1, 4, 0, 3),
(7, 1, 6, 0, 5),
(8, 2, 6, 0, 5),
(9, 2, 4, 0, 4),
(10, 3, 7, 0, 5),
(11, 3, 8, 0, 5),
(12, 2, 11, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int UNSIGNED NOT NULL,
  `tahun_rilis` year NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun_rilis`, `created_at`, `updated_at`) VALUES
(1, '2019', '2025-03-11 06:08:11', '2025-03-11 06:08:11'),
(2, '2020', '2025-03-11 06:08:11', '2025-03-11 06:08:11'),
(3, '2021', '2025-03-15 05:31:01', '2025-03-15 05:31:01'),
(4, '2023', '2025-03-15 05:31:14', '2025-03-15 05:31:14'),
(5, '2025', '2025-03-15 05:31:22', '2025-03-15 05:31:22'),
(6, '2018', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '2017', '2025-03-18 22:50:50', '2025-03-18 22:50:50'),
(8, '2016', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_tlp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','autor','admin') NOT NULL,
  `profile` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `usia`, `email`, `nomor_tlp`, `password`, `role`, `profile`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '20', 'admin@gmail.com', '089567854328', '$2y$10$TFA0jyoylN1OZ6eoTQBflO53p7eELx..WmU88nPBlQkix4/0ifWG2', 'admin', 'asya.jpg', '2025-03-03 01:09:05', '2025-03-18 23:37:53'),
(4, 'Asya', '20', 'asya@gmail.com', '089675432345', '$2y$10$bAA1s9ZC00yG65C.s8MHtufUcObW1.IKxlwwOHsrOMHfAqUxCsro6', 'user', '1741310118-default.jpg', '2025-03-06 18:15:18', '0000-00-00 00:00:00'),
(5, 'autor', '25', 'autor@gmail.com', '089765432345', '$2y$10$axkR3s/K0Kv.38I7khfaIOqPxWcezIxXlhQULYJfmWv4UWuQv3GtW', 'autor', '1741640978-default.jpg', '2025-03-10 14:09:38', '2025-03-10 22:31:10'),
(6, 'Linda cihuy', '19', 'linda@gmail.com', '089545678765', '$2y$10$Zcr4W289Vjn6qI4Y6aIYXe.MXdvqkqFz.A.XiARw3oSwoQcB4h9Hy', 'user', '1742027054-default.jpg', '2025-03-15 01:24:15', '0000-00-00 00:00:00'),
(7, 'Mark lee', '25', 'mark@gmail.com', '089768567887', '$2y$10$Sjzdtfs0iwy8FGKvdiKvfenOVGaS8Q1JXBnqAEcbt7L88pdv5iM0O', 'user', '1742120347-default.jpg', '2025-03-16 03:19:07', '2025-03-18 19:05:44'),
(8, 'Rahma', '23', 'rahma@gmail.com', '08956776667', '$2y$10$xj5jSYMaJcRo639qbfzvO.soK8jZdV0yPeg2ggR99MzZGtFBfQ8a.', 'user', '1742347738-default.jpg', '2025-03-18 18:28:58', '0000-00-00 00:00:00'),
(11, 'ww', '29', 'ww@gmail.com', '089567854320', '$2y$10$nt.awbBTT7o/f7hcVMl4Ee3OQ8fbxfLJwPWa9FNjtcaY6pCLBpt2.', 'user', '1742444001-default.jpg', '2025-03-19 21:13:21', '2025-03-19 22:33:11'),
(12, 'tes3', '18', 'tes3@gmail.com', '089567856322', '$2y$10$x/RzxBuiJ7BaYjW2ibzr2uddvAvolEE4tDhJ/s9jKmBgQIKi7PWgW', 'user', '1742449028-default.jpg', '2025-03-19 22:37:08', '2025-03-19 22:38:19'),
(13, 'tes4', '18', 'tes4@gmail.com', '089567856328', '$2y$10$jyWuNId5CGmhcyupEEShmOkIhsItaQDz33CIDZZltO/xbG9s7D.aW', 'user', '1742449129-default.jpg', '2025-03-19 22:38:50', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_genre` (`id_genre`,`id_tahun`,`id_negara`),
  ADD KEY `id_rating` (`id_rating`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_film` (`id_film`,`id_user`),
  ADD KEY `id_rating` (`id_rating`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id_negara` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
