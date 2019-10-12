-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2019 at 12:42 PM
-- Server version: 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.3.9-1+0~20190902.44+debian9~1.gbpf8534c

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strategis`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_07_073105_create_variables_table', 1),
(6, '2019_10_12_031929_create_topses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topses`
--

CREATE TABLE `topses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepadatan_penduduk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aksebilitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha_sama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topses`
--

INSERT INTO `topses` (`id`, `nama`, `kepadatan_penduduk`, `aksebilitas`, `lokasi`, `jenis_usaha_sama`, `created_at`, `updated_at`) VALUES
(3, 'C', '1', '1', '1', '1', '2019-10-11 22:25:27', '2019-10-11 22:25:27'),
(5, 'A', '6', '2', '3', '3', '2019-10-11 22:34:04', '2019-10-11 22:34:04'),
(6, 'B', '4', '2', '2', '2', '2019-10-11 22:38:23', '2019-10-11 22:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin AGJ', 'admin@agj.com', NULL, '$2y$10$2bp.acRrmqEHVZpx5aqbV.FtmAvzQxT6KlJrCHHvSbk95eMtY9JLC', NULL, '2019-09-09 11:12:27', '2019-09-13 04:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_kota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lintang` double(8,2) DEFAULT NULL,
  `bujur` double(8,2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `kabupaten_kota`, `kecamatan`, `nama`, `kategori`, `alamat`, `lintang`, `bujur`, `jumlah`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Kota Banjar', 'Kec. Banjar', 'STISIP BINA PUTERA BANJAR', 'sekolah', 'Mekarsari, Kec. Banjar, Kota Banjar, Jawa Barat 46321', -7.38, 108.51, 600000, 1, '2019-09-09 10:26:22', '2019-09-13 01:39:53'),
(3, 'Kota Banjar', 'Kec. Banjar', 'STT IT', 'sekolah', 'Jl. Dr. Husein Kartasasmita No.217, Banjar, Ciamis, Kota Banjar, Jawa Barat 46311', -7.37, 108.51, 22222, 1, '2019-09-09 10:36:00', '2019-09-13 02:52:26'),
(4, 'Kota Banjar', 'Kec. Banjar', 'SMA Negeri 1 Banjar', 'sekolah', 'Jl. K.H. Mustofa No.1, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.51, 8000, 1, '2019-09-09 10:37:28', '2019-09-09 10:42:38'),
(5, 'Kota Banjar', 'Kec. Banjar', 'SMAN 3 BANJAR', 'sekolah', 'Jl. K.H. Mustofa No.117, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.52, 8000, 1, '2019-09-09 10:43:23', '2019-09-13 01:39:56'),
(6, 'Kota Banjar', 'Kec. Banjar', 'Kantor Walikota Banjar', 'kantor', 'Jl. Raya Siliwangi Km. 3, Purwaharja, Karangpanimbal, Kec. Banjar, Kota Banjar, Jawa Barat 46332', -7.36, 108.55, 800, 1, '2019-09-09 10:44:42', '2019-09-09 10:46:19'),
(7, 'Kota Banjar', 'Kec. Banjar', 'Alun-Alun Kota Banjar', 'lainnya', 'Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.54, 9000, 1, '2019-09-09 10:45:53', '2019-09-09 10:46:13'),
(8, 'Kota Banjar', 'Kec. Banjar', 'Kantor BAPPEDA Pemerintah Kota Banjar', 'kantor', 'Jl. Batulawang No.24, Hegarsari, Kec. Pataruman, Kota Banjar, Jawa Barat 46322', -7.37, 108.49, 342342, 1, '2019-09-09 11:45:55', '2019-09-09 11:45:55'),
(9, 'Kota Banjar', 'Kec. Banjar', 'BPJS Kesehatan Kantor Cabang Banjar', 'kantor', 'Jl. Dr. Husein Kartasasmita, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.49, 677, 1, '2019-09-09 11:47:07', '2019-09-09 11:47:07'),
(10, 'Kota Banjar', 'Kec. Banjar', 'Kantor KPU Kota Banjar', 'kantor', 'Jl. Dr. Husein Kartasasmita No.15, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.49, 5435, 1, '2019-09-09 11:49:25', '2019-09-09 11:49:25'),
(11, 'Kota Banjar', 'Kec. Banjar', 'Taman Kota Lapang Bhakti', 'lainnya', 'Jl. Mayjen Didi Kartasasmita, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311', -7.37, 108.51, 342423, 1, '2019-09-09 11:50:34', '2019-09-09 11:50:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `topses`
--
ALTER TABLE `topses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topses`
--
ALTER TABLE `topses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
