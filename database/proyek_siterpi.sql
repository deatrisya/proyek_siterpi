-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 11:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_siterpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auto_numbers`
--

INSERT INTO `auto_numbers` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, '05787fbe90f71b5400acb64db87c3902', 2, '2022-10-29 22:53:59', '2022-10-29 22:54:52'),
(2, '09321ebd1f0d797c698b041539a9a4e6', 1, '2022-10-29 22:57:17', '2022-10-29 22:57:17'),
(3, 'ba502e2b81a271cf1529c44ebba52e48', 1, '2022-10-29 22:59:42', '2022-10-29 22:59:42'),
(4, '8280b56c0ac89cc0c3806f854678bb4b', 6, '2022-10-31 14:25:58', '2022-11-07 12:57:23'),
(5, '07164cefb137bbd94f6e60ffcbf367e9', 1, '2022-11-09 04:21:46', '2022-11-09 04:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `cow_health_histories`
--

CREATE TABLE `cow_health_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cow_health_histories`
--

INSERT INTO `cow_health_histories` (`id`, `farm_id`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 2, '2022-11-02', 'Panu', '2022-11-13 04:45:41', '2022-11-13 04:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `drughistories`
--

CREATE TABLE `drughistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `drug_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `cowhealth_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drughistories`
--

INSERT INTO `drughistories` (`id`, `user_id`, `drug_id`, `tanggal`, `masuk`, `keluar`, `cowhealth_id`, `created_at`, `updated_at`) VALUES
(7, 5, 1, '2022-11-02', 10, 0, 8, '2022-11-13 04:45:41', '2022-11-13 04:54:24'),
(11, 5, 2, '2022-11-07', 10, 0, 8, '2022-11-13 04:53:10', '2022-11-13 04:53:10'),
(12, 5, 1, '2022-11-13', 10, 0, 8, '2022-11-13 04:56:34', '2022-11-13 04:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `nama_obat`, `stok_akhir`, `created_at`, `updated_at`) VALUES
(1, 'Gusanex', 25, '2022-11-12 09:57:00', '2022-11-13 04:56:59'),
(2, 'Paratusin', 39, '2022-11-13 04:31:49', '2022-11-13 04:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nip`, `foto`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(1, 'PGW00002', 'foto_pegawai/XeF1rhJK3rTBuyVsUedFHyhuNH3iDKqfBFS9P61B.jpg', 'Deatrisya mirela harahap', 'L', 'Pasuruan', '2022-10-01', '2022-10-31 14:44:00', '2022-11-02 01:02:38'),
(3, 'PGW00004', 'foto_pegawai/zcUbl91I9qwIcSffFzzPq493GFv9WYsTfk8vn4OQ.jpg', 'Deatrisya', 'P', 'Pasuruan', '2022-11-11', '2022-11-01 08:52:35', '2022-11-01 14:47:28'),
(4, 'PGW00005', 'foto_pegawai/fVLrEAqXUzo5PB2vWTiG031F3N7RtQDbYVsOmPAP.jpg', 'Dea', 'P', 'Malang', '2022-11-03', '2022-11-01 14:27:07', '2022-11-01 14:35:31'),
(5, 'PGW00006', 'foto_pegawai/Gpufer4K23ygXeIDkv3OJu1UcURy3bQGBpo3f1sz.jpg', 'Deatrisya', 'P', 'Pasuruan', '2022-11-03', '2022-11-07 12:57:23', '2022-11-07 12:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jk` enum('Jantan','Betina') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terjual','Belum Terjual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Sehat','Sakit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `nis`, `tanggal_masuk`, `jk`, `status`, `kondisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'S0001', '2022-11-03', 'Jantan', 'Belum Terjual', 'Sakit', NULL, NULL, '2022-11-13 04:05:19'),
(2, 'S0002', '2022-11-04', 'Jantan', 'Belum Terjual', 'Sakit', NULL, NULL, '2022-11-13 04:32:46'),
(10, '123', '2022-11-12', 'Betina', 'Belum Terjual', 'Sehat', NULL, '2022-11-12 14:35:06', '2022-11-12 14:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `feedhistories`
--

CREATE TABLE `feedhistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `feed_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedhistories`
--

INSERT INTO `feedhistories` (`id`, `user_id`, `feed_id`, `tanggal`, `masuk`, `keluar`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2022-11-01', 10, 0, NULL, NULL),
(6, 5, 2, '2022-11-04', 10, 0, '2022-11-08 08:50:28', '2022-11-08 08:50:28'),
(12, 5, 2, '2022-11-06', 5, 0, '2022-11-08 14:16:54', '2022-11-08 14:16:54'),
(14, 5, 2, '2022-11-06', 5, 3, '2022-11-08 14:20:55', '2022-11-08 14:22:49'),
(17, 5, 1, '2022-11-09', 0, 2, '2022-11-09 04:53:36', '2022-11-09 04:53:36'),
(19, 5, 3, '2022-11-13', 1500, 0, '2022-11-13 08:39:33', '2022-11-13 08:39:33'),
(20, 5, 3, '2022-11-13', 0, 100, '2022-11-13 08:40:25', '2022-11-13 08:40:25'),
(21, 5, 4, '2022-11-13', 100, 0, '2022-11-13 08:53:16', '2022-11-13 08:53:16'),
(22, 5, 4, '2022-11-13', 0, 30, '2022-11-13 08:53:30', '2022-11-13 09:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `nama_pakan`, `stok_akhir`, `created_at`, `updated_at`) VALUES
(1, 'Pakan Serat1', 8, '2022-11-02 05:11:49', '2022-11-09 04:53:36'),
(2, 'Pakan Serat2', 27, '2022-11-08 05:44:34', '2022-11-08 14:52:30'),
(3, 'Dedek Gunung', 1400, '2022-11-09 04:53:00', '2022-11-13 08:40:24'),
(4, 'Tahu', 70, '2022-11-13 08:51:46', '2022-11-13 09:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_10_29_040514_create_employees_table', 1),
(16, '2022_10_29_041054_create_farms_table', 1),
(17, '2022_10_29_041359_create_drugs_table', 1),
(18, '2022_10_29_041545_create_drughistories_table', 1),
(19, '2022_10_29_042006_create_feeds_table', 1),
(20, '2022_10_29_042056_create_feedhistories_table', 1),
(21, '2017_08_03_055212_create_auto_numbers', 2),
(22, '2022_11_12_142800_create_cow_health_histories_table', 3),
(23, '2022_11_12_171146_add_descdrugout_to_table_drughistories', 4),
(24, '2022_11_12_205213_add_date_to_farms_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'foto_user/WD34sjoa0Kr7pzewYUHXyxZfBJ2IWVxmxMpKipZT.jpg', 'deatrisya', 'admin1', NULL, '$2y$10$Cx2tvusJu76w342iXEXC.epZ0S6jFQ6KIpvP256QOkqem6hkC3kwS', NULL, '2022-11-02 03:23:56', '2022-11-02 03:23:56'),
(5, 'jpg', 'Admin', 'admin', NULL, '$2y$10$B/9cwNj76WN5BDY/h2FpdOHPNUJw1eHVDEa5RG/dCnbuHUEYshd1.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cow_health_histories`
--
ALTER TABLE `cow_health_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cow_health_histories_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `drughistories`
--
ALTER TABLE `drughistories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drughistories_user_id_foreign` (`user_id`),
  ADD KEY `drughistories_drug_id_foreign` (`drug_id`),
  ADD KEY `drughistories_cowhealth_id_foreign` (`cowhealth_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedhistories`
--
ALTER TABLE `feedhistories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedhistories_user_id_foreign` (`user_id`),
  ADD KEY `feedhistories_feed_id_foreign` (`feed_id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cow_health_histories`
--
ALTER TABLE `cow_health_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drughistories`
--
ALTER TABLE `drughistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedhistories`
--
ALTER TABLE `feedhistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cow_health_histories`
--
ALTER TABLE `cow_health_histories`
  ADD CONSTRAINT `cow_health_histories_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `drughistories`
--
ALTER TABLE `drughistories`
  ADD CONSTRAINT `drughistories_cowhealth_id_foreign` FOREIGN KEY (`cowhealth_id`) REFERENCES `cow_health_histories` (`id`),
  ADD CONSTRAINT `drughistories_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`),
  ADD CONSTRAINT `drughistories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedhistories`
--
ALTER TABLE `feedhistories`
  ADD CONSTRAINT `feedhistories_feed_id_foreign` FOREIGN KEY (`feed_id`) REFERENCES `feeds` (`id`),
  ADD CONSTRAINT `feedhistories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
