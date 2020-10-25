-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 03:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `judul_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `mahasiswa_id`, `dosen_id`, `judul_ta`, `semester`, `fakultas`, `tanggal_mulai`, `tanggal_akhir`, `status`, `created_at`, `updated_at`) VALUES
(11, 3, 4, 'Sistem Informasi Pengadaan Obat Pada Apotik PT. Kimia Farma Maluku Utara', 'Semester VIII', 'Teknik Informatika', '2020-11-18', '2020-10-28', 0, '2020-10-22 03:32:11', '2020-10-22 21:49:00'),
(12, 3, 5, 'Sistem Informasi Pengadaan Obat Pada Apotik PT. Kimia Farma Maluku Utara', 'Semester VIII', 'Teknik Informatika', '2020-11-18', '2020-10-28', 0, '2020-10-22 03:32:11', '2020-10-22 21:49:00'),
(13, 1, 5, 'Membangun Web Framework dengan menggunakan bahasa pemrograman Python', 'Semester VII', 'Teknik Informatika', '2020-10-01', '2020-10-29', 0, '2020-10-22 21:51:00', '2020-10-22 21:51:00'),
(14, 1, 4, 'Membangun Web Framework dengan menggunakan bahasa pemrograman Python', 'Semester VII', 'Teknik Informatika', '2020-10-01', '2020-10-29', 0, '2020-10-22 21:51:00', '2020-10-22 21:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `password`, `nama_lengkap`, `foto`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(4, '123456', '$2y$10$9FJOKfhCmQX7krHrNt1ZEeLPRd1SOUmJ.zwzeGpMNhUklHHx1ihxG', 'Sigit Permono', '1603635981.jpg', '085229392882', 1, '2020-10-22 00:32:04', '2020-10-25 07:26:21'),
(5, '12131415', '$2y$10$W0B0VZGGvXIA7yOJWmT26u54jAttCbVMD1Ze7raGsDfSpUEpqL7jW', 'Anwar', '1603357326.png', '085229392885', 1, '2020-10-22 02:02:06', '2020-10-22 12:55:53');

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
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Pelaksanaan Udisium Terakhir', 'Kepada seluruh mahasiswa yang telah melaksanakan proses Ujian Skripsi dan Tugas Akhir. Batas pelaksanaan Ujian adalah pada tanggal 25 November 2020. Tidak ada toleransi untuk penundaan pelaksanaan udisium.\r\nDemikian Informasi yang disampaikan. Terima kasih', '2020-10-22 10:47:19', '2020-10-22 11:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sesi_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `sesi_id`, `deskripsi`, `lampiran`, `msg_status`, `created_at`, `updated_at`) VALUES
(1, 19, 'comas', '1603589304.pdf, 1603589304.jpg', 2, '2020-10-24 18:28:24', '2020-10-24 18:28:24'),
(2, 19, 'opo iki', '1603589933.jpg', 2, '2020-10-24 18:38:53', '2020-10-24 18:38:53'),
(3, 19, 'rapopo', '1603589959.pdf, 1603589959.jpg', 1, '2020-10-24 18:39:19', '2020-10-24 18:39:19'),
(4, 19, 'Selamat pagi pak, berikut terlampir BAB I, II dan III. Mohon bimbingannya. Terima kasih', '1603590451.pdf, 1603590452.pdf, 1603590453.jpg', 2, '2020-10-24 18:47:31', '2020-10-24 18:47:31'),
(5, 19, 'mkas', NULL, 2, '2020-10-24 18:58:56', '2020-10-24 18:58:56'),
(6, 19, 'cobaxxxx', NULL, 2, '2020-10-24 18:59:09', '2020-10-24 18:59:09'),
(7, 19, 'poaspd', '1603591168.jpg', 2, '2020-10-24 18:59:28', '2020-10-24 18:59:28'),
(8, 19, 'ada', '1603591251.jpg', 2, '2020-10-24 19:00:51', '2020-10-24 19:00:51'),
(9, 19, 'tarada', NULL, 2, '2020-10-24 19:00:59', '2020-10-24 19:00:59'),
(10, 19, 'aa', NULL, 2, '2020-10-24 20:35:15', '2020-10-24 20:35:15'),
(11, 19, 'ocoasoc', '1603628629.jpg, 1603628629.jpg, 1603628629.jpg, 1603628629.jpg', 2, '2020-10-25 05:23:49', '2020-10-25 05:23:49'),
(12, 19, 'asndj', '586243079-free-solid-wallpaper.jpg.jpg, 586243536-free-solid-wallpaper (1).jpg.jpg, 586243536-free-solid-wallpaper.jpg.jpg', 2, '2020-10-25 05:27:31', '2020-10-25 05:27:31'),
(13, 19, 'rorpo', 'beach_drone_photography-wallpaper-1366x768.jpg, black_background_leather-wallpaper-1366x768.jpg, Blue-solid-color-wallpaper-hd-wallpapers.jpg, blue-solid-color-wallpaper-hd-wallpapers-1024x640.jpg', 2, '2020-10-25 05:28:07', '2020-10-25 05:28:07'),
(14, 19, 'haha', NULL, 1, '2020-10-25 05:57:45', '2020-10-25 05:57:45'),
(15, 19, 'wkwkwkwk', 'sidebar5.jpg, 25231.png, struktur.jpg', 1, '2020-10-25 05:58:29', '2020-10-25 05:58:29'),
(16, 19, 'cob', 'ttd.jpg', 1, '2020-10-25 05:59:50', '2020-10-25 05:59:50'),
(17, 20, 'coba', NULL, 1, '2020-10-25 06:25:49', '2020-10-25 06:25:49'),
(18, 20, 'sss', 'sidebar1.jpg', 1, '2020-10-25 06:26:15', '2020-10-25 06:26:15'),
(19, 20, 'oooo', '172.png', 2, '2020-10-25 06:26:41', '2020-10-25 06:26:41'),
(20, 20, 'asas', NULL, 1, '2020-10-25 06:28:52', '2020-10-25 06:28:52'),
(21, 20, 'bvbobo', 'mads.jpg', 1, '2020-10-25 06:29:00', '2020-10-25 06:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `password`, `nama_lengkap`, `foto`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(1, '7891011', '$2y$10$IfDoIFU7OUjGS.IeWAmr/.LxM.8pgDla8kdfZmcqHFz0X/yp08yQK', 'Rahman Sugiono', '1603635992.jpg', '085282378821', 2, '2020-10-22 00:36:13', '2020-10-25 07:26:32'),
(3, '12345', '$2y$10$3g1pLdYVLTZbAw/WLIJLGO3UBKDE/RGkc/51FgzkL2fBDC.55/PHy', 'Asrian Akbar Kulaba', '1603386094.jpg', '082347673384', 2, '2020-10-22 10:01:34', '2020-10-22 12:55:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_22_042318_create_informasi_table', 2),
(5, '2020_10_22_042512_create_dosen_table', 3),
(7, '2020_10_22_042647_create_mahasiswa_table', 4),
(8, '2020_10_22_043130_create_bimbingan_table', 5),
(9, '2020_10_22_043501_create_sesi_table', 6),
(10, '2020_10_22_043719_create_konsultasi_table', 7),
(11, '2020_10_23_042208_create_dosen_in_on_sesi_table', 8),
(12, '2020_10_24_113209_create_mahasiswa_id_on_sesi_table', 9);

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
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bimbingan_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `sesi_konsultasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id`, `bimbingan_id`, `dosen_id`, `mahasiswa_id`, `sesi_konsultasi`, `status`, `created_at`, `updated_at`) VALUES
(19, 14, 4, 1, 'BAB I - III (Tolong di percepat)', 1, '2020-10-24 04:48:12', '2020-10-25 06:21:11'),
(20, 14, 4, 1, 'IV - Daftar Pustaka', 0, '2020-10-24 04:48:31', '2020-10-24 04:48:31'),
(21, 14, 4, 1, 'Demo Aplikasi', 0, '2020-10-24 04:48:52', '2020-10-24 04:48:52'),
(22, 14, 4, 1, 'Susunan Laporan Standar sesuai panduan lengkap denga cover dan daftar isi (Word & PDF)', 0, '2020-10-24 07:04:54', '2020-10-24 07:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 'admin', 'admin@localhost', '2020-10-22 05:46:27', '$2y$10$OETVGiw1divWWBE0ARYHt.uhhKZ8MI9RVL7XUD0GNSPHa/g0N4Np6', NULL, '2020-10-22 05:46:30', '2020-10-22 05:46:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bimbingan_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `bimbingan_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsultasi_sesi_id_foreign` (`sesi_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesi_bimbingan_id_foreign` (`bimbingan_id`),
  ADD KEY `sesi_dosen_id_foreign` (`dosen_id`),
  ADD KEY `sesi_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bimbingan_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_sesi_id_foreign` FOREIGN KEY (`sesi_id`) REFERENCES `sesi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sesi`
--
ALTER TABLE `sesi`
  ADD CONSTRAINT `sesi_bimbingan_id_foreign` FOREIGN KEY (`bimbingan_id`) REFERENCES `bimbingan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sesi_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
