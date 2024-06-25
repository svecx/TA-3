-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2024 at 01:55 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` int(11) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi_dokumen` text NOT NULL,
  `kategori_dokumen` varchar(255) NOT NULL,
  `validasi_dokumen` varchar(255) NOT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `dokumen_file` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `created_by`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `view`, `status`, `created_at`, `updated_at`) VALUES
(102, 'super user', 'Perbaikkan', 'Deskripsi Dokumen tujuan', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen tujuan.pdf', 'dokumen tujuan', '', 'active', '2024-06-19 01:29:10', '2024-06-19 01:29:54'),
(106, 'dosen1', 'Kurikulum TEKKOM', 'Deskripsi kurikulum', 'Dokumen Pendidikan', 'Ketua Jurusan', 2024, 'Dokumen Materi.pdf', 'kurikulum, Tekkom', '', 'active', '2024-06-19 02:34:50', '2024-06-19 02:43:36'),
(108, 'dosen1', 'Materi TRPL', 'Dokumen materi', 'Dokumen Pendidikan', 'Ketua Program Studi', 2023, 'Dokumen Materi.pdf', 'materi, TRPL', '', 'active', '2024-06-19 02:43:22', '2024-06-19 02:43:22'),
(110, 'mhs1', 'sertifikat penghargaan', 'sertifikat nasional', 'Dokumen Pendidikan', 'Lainnya', 2021, 'Dokumen sertifikat.pdf', 'sertifikat, dokumen', '', 'active', '2024-06-19 02:51:02', '2024-06-19 02:51:02'),
(112, 'adm1', 'absensi mahasiswa', 'absensi mahasiswa jurusan', 'Dokumen Pendidikan', 'Ketua Jurusan', 2022, 'Dokumen absensi.pdf', 'absensi, jurusan,absensi', '', 'active', '2024-06-19 03:14:11', '2024-06-19 03:14:11'),
(113, 'Kaprodi2', 'pembangunan kelas', 'deskripsi', 'Dokumen Sarana Prasarana', 'Lainnya', 2024, 'Dokumen_mahasiswa.pdf', 'pembangunan, kelas', '', 'active', '2024-06-19 03:17:16', '2024-06-24 10:39:42'),
(115, 'admin', 'Tujuan dokumen', 'Deskripsi Dokumen', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen sertifikat.pdf', 'tag, dokumen', '', 'active', '2024-06-19 03:47:45', '2024-06-19 03:58:29'),
(116, 'super user', 'Dokumen testing', 'Ini adalah deskripsi dokumen testing', 'Dokumen Tata Pamong', 'Ketua Jurusan', 2023, 'Kartu Pendaftaran DTS.pdf', 'testing, satu, dua', '', 'active', '2024-06-19 05:07:59', '2024-06-19 05:07:59'),
(117, 'Kaprodi1', 'Dokumen Keuangan', 'Deskripsi Dokumen', 'Dokumen Keuangan', 'Ketua Jurusan', 2025, 'Dokumen absensi.pdf', 'keuangan jurusan', '', 'active', '2024-06-19 21:41:50', '2024-06-19 22:11:29'),
(120, 'super user', 'Dokumen testing', 'Ini adalah deskripsi dokumen testing', 'Dokumen Tata Pamong', 'Ketua Jurusan', 2023, 'Kartu Pendaftaran DTS.pdf', 'testing, satu, dua', '', 'active', '2024-06-20 06:21:52', '2024-06-20 06:21:52'),
(121, 'super user', 'Dokumen Keuangan edit', 'Dokumen berisi keuangan', 'Dokumen Keuangan', 'Direktur', 2023, 'Dokumen pembangunan.pdf', 'Keuangan', '', 'active', '2024-06-20 07:43:08', '2024-06-20 07:43:08'),
(123, 'super user', 'visi misi jurusan', 'Deksripsi Dokumen', 'Dokumen Visi Misi', 'Ketua Jurusan', 2023, 'Dokumen tujuan.pdf', 'visi misi', '', 'active', '2024-06-20 08:06:33', '2024-06-20 08:06:33'),
(124, 'super user', 'Dokumen Penelitian', 'Dokumen berisi penelitian', 'Dokumen Penelitian', 'Direktur', 2023, 'Dokumen Internal.pdf', 'Penelitian', '', 'active', '2024-06-20 08:22:36', '2024-06-20 08:22:36'),
(125, 'super user', 'Dokumen testing', 'Ini adalah deskripsi dokumen testing', 'Dokumen Tata Pamong', 'Ketua Jurusan', 2023, 'Kartu Pendaftaran DTS.pdf', 'testing, satu, dua', '', 'active', '2024-06-20 12:11:12', '2024-06-20 12:11:12'),
(126, 'super user', 'Dokumen Edit', 'Dokumen berisi laporan', 'Dokumen Mahasiswa', 'Direktur', 2023, 'Dokumen pembangunan.pdf', 'dokumen', '', 'active', '2024-06-20 12:23:46', '2024-06-20 12:23:46'),
(127, 'mahasiswa2', 'Sertifikat', 'berisi sertifikat', 'Dokumen Pendidikan', 'Lainnya', 2020, 'Dokumen mahasiswa.pdf', 'sertifikat', '', 'active', '2024-06-22 03:13:31', '2024-06-22 03:13:31'),
(129, 'Kaprodi1', 'dokumen private', 'deskripsi', 'Dokumen Tujuan', 'Ketua Program Studi', 2023, 'Dokumen Internal.pdf', 'private', '', 'active', '2024-06-24 01:56:51', '2024-06-24 01:56:51'),
(131, 'Kaprodi2', 'Kurikulum MI update file', 'Deskripsi kurikulum', 'Dokumen Visi Misi', 'Direktur', 2024, 'Dokumen_Kurikulum.pdf', 'kurikulum, dokumen, mi', '', 'active', '2024-06-24 09:28:07', '2024-06-25 09:56:00'),
(137, 'Kaprodi2', 'Dokumen Absen', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_mahasiswa.pdf', 'sertifikat, mahasiswa', NULL, 'active', '2024-06-25 03:54:14', '2024-06-25 03:54:35'),
(138, 'Kaprodi2', 'Sertifikat', 'deskripsi dokumen sertifikat', 'Dokumen Pendidikan', 'Ketua Program Studi', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', '', 'active', '2024-06-25 04:02:32', '2024-06-25 05:35:46'),
(141, 'Kaprodi2', 'Dokumen Mahasiswa', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', 'sekjur,kaprodi', 'active', '2024-06-25 05:50:05', '2024-06-25 05:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `id` int(11) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `judul_dokumen` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `deskripsi_dokumen` text CHARACTER SET utf8mb4 NOT NULL,
  `kategori_dokumen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `validasi_dokumen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `dokumen_file` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`id`, `created_by`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `status`, `updated_at`, `created_at`) VALUES
(31, 'Ketua Jurusan', 'Dokumen Contoh', 'Contoh', 'Dokumen Keuangan', 'Kelompok Bidang Keahlian', 2022, 'DAFTAR PUSTAKA.pdf', 'Contoh', 'draft', '2024-06-16 20:44:30', '2024-06-16 20:44:30'),
(37, 'Ketua Jurusan', 'Dokumen Mahasiswa', 'Dokumen berisi mahasiswa', 'Dokumen Mahasiswa', 'Ketua Jurusan', 2023, 'Dokumen Mahasiswa.pdf', 'Mahasiswa', 'draft', '2024-06-19 01:36:25', '2024-06-19 01:36:25'),
(38, 'Sekjur1', 'Mahasiswa Jurusan TI', 'Deksripsi Dokumen', 'Dokumen Mahasiswa', 'Ketua Jurusan', 2020, 'Dokumen mahasiswa.pdf', 'mahasiswa, dokumen', 'draft', '2024-06-19 01:39:46', '2024-06-19 01:39:46'),
(47, 'Adm', 'Dokumen Tata Pamong', 'Dokumen berisi tata pamong', 'Dokumen Tata Pamong', 'Adm', 2023, 'Dokumen Tata Pamong.pdf', 'Tata Pamong', 'draft', '2024-06-19 07:29:19', '2024-06-19 07:29:19'),
(55, 'Mahasiswa', 'Dokumen Pengabdian Kepada Masyarakat', 'Dokumen berisi pengabdian kepada masyarakat', 'Dokumen Pengabdian Kepada Masyarakat', 'Mahasiswa', 2023, 'Dokumen Pengabdian Kepada Masyarakat.pdf', 'Pengabdian Kepada Masyarakat', 'draft', '2024-06-20 08:04:57', '2024-06-20 08:04:57'),
(57, 'Enji', 'Dokumen Pendidikan', 'Dokumen berisi pendidikan', 'Dokumen Pendidikan', 'Ketua Jurusan', 2023, 'Dokumen Pendidikan.pdf', 'Pendidikan', 'draft', '2024-06-20 12:21:02', '2024-06-20 12:21:02'),
(59, 'super user', 'Dokumen Visi Misi', 'Dokumen berisi visi dan misi', 'Dokumen Visi Misi', 'Direktur', 2023, 'Dokumen tujuan.pdf', 'Visi Misi', 'draft', '2024-06-20 13:08:23', '2024-06-20 13:08:23'),
(60, 'Kaprodi1', 'Dokumen Internal', 'Deskripsi Internal', 'Dokumen Tata Kelola', 'Direktur', 2024, 'Kartu Pendaftaran DTS.pdf', 'edited_tag', 'draft', '2024-06-22 04:45:55', '2024-06-22 04:45:55'),
(61, 'Ketua Jurusan1', 'Dokumen SDM Update', 'Deskripsi Dokumen', 'Dokumen Sumber Daya Manusia', 'Direktur', 2023, 'Dokumen Internal.pdf', 'Dokumen, SDM', 'draft', '2024-06-24 01:54:42', '2024-06-24 01:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `dokumen_id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi_dokumen` text NOT NULL,
  `kategori_dokumen` varchar(255) NOT NULL,
  `validasi_dokumen` varchar(255) NOT NULL,
  `tahun_dokumen` int(11) NOT NULL,
  `dokumen_file` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `created_by`, `dokumen_id`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `view`, `created_at`, `updated_at`) VALUES
(23, NULL, 102, 'Perbaikkan', 'Deskripsi Dokumen tujuan', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen tujuan.pdf', 'dokumen tujuan', NULL, '2024-06-19 01:29:34', '2024-06-19 01:29:34'),
(24, NULL, 102, 'Perbaikkan', 'Deskripsi Dokumen tujuan', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen Internal.pdf', 'dokumen tujuan', NULL, '2024-06-19 01:29:54', '2024-06-19 01:29:54'),
(30, NULL, 106, 'Kurikulum TEKKOM', 'Deskripsi kurikulum', 'Dokumen Pendidikan', 'Ketua Jurusan', 2024, 'Dokumen Kurikulum.pdf', 'kurikulum, Tekkom', NULL, '2024-06-19 02:43:36', '2024-06-19 02:43:36'),
(33, NULL, 113, 'pembangunan kelas', 'deskripsi', 'Dokumen Sarana Prasarana', 'Lainnya', 2024, 'Dokumen pembangunan.pdf', 'pembangunan, kelas', NULL, '2024-06-19 03:18:00', '2024-06-19 03:18:00'),
(44, NULL, 115, 'Tujuan Test dokumen', 'Deskripsi Dokumen', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen sertifikat.pdf', 'tag', NULL, '2024-06-19 03:50:40', '2024-06-19 03:50:40'),
(45, NULL, 115, 'Tujuan Test dokumen', 'Deskripsi Dokumen', 'Dokumen Tujuan', 'Ketua Jurusan', 2024, 'Dokumen sertifikat.pdf', 'tag, dokumen', NULL, '2024-06-19 03:58:29', '2024-06-19 03:58:29'),
(46, NULL, 117, 'Dokumen Keuangan Tahunan', 'Deskripsi Dokumen', 'Dokumen Keuangan', 'Ketua Jurusan', 2024, 'Dokumen pembangunan.pdf', 'keuangan', NULL, '2024-06-19 21:42:11', '2024-06-19 21:42:11'),
(47, 'admin', 117, 'Dokumen Keuangan', 'Deskripsi Dokumen', 'Dokumen Keuangan', 'Ketua Jurusan', 2024, 'Dokumen absensi.pdf', 'keuangan', NULL, '2024-06-19 22:10:58', '2024-06-19 22:10:58'),
(48, 'Kaprodi1', 117, 'Dokumen Keuangan', 'Deskripsi Dokumen', 'Dokumen Keuangan', 'Ketua Jurusan', 2024, 'Dokumen absensi.pdf', 'keuangan jurusan', NULL, '2024-06-19 22:11:29', '2024-06-19 22:11:29'),
(71, 'mahasiswa2', 127, 'Sertifikat', 'berisi sertifikat', 'Dokumen Pendidikan', 'Lainnya', 2020, 'Dokumen mahasiswa.pdf', 'sertifikat', NULL, '2024-06-22 03:16:28', '2024-06-22 03:16:28'),
(84, 'admin', 113, 'pembangunan kelas', 'deskripsi', 'Dokumen Sarana Prasarana', 'Lainnya', 2024, 'Dokumen Internal.pdf', 'pembangunan, kelas', NULL, '2024-06-24 10:39:42', '2024-06-24 10:39:42'),
(93, 'Kaprodi2', 131, 'Kurikulum MI update file', 'Deskripsi kurikulum', 'Dokumen Visi Misi', 'Direktur', 2024, 'Dokumen tujuan.pdf', 'kurikulum, dokumen, mi', NULL, '2024-06-25 09:56:00', '2024-06-25 09:56:00'),
(97, NULL, 137, 'Dokumen Absen', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', NULL, '2024-06-25 03:54:35', '2024-06-25 03:54:35'),
(114, 'Kaprodi2', 138, 'Sertifikat', 'deskripsi dokumen sertifikat', 'Dokumen Pendidikan', 'Ketua Program Studi', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', NULL, '2024-06-25 05:35:46', '2024-06-25 05:35:46'),
(119, 'Kaprodi2', 141, 'Dokumen Mahasiswa', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', NULL, '2024-06-25 05:50:18', '2024-06-25 05:50:18'),
(120, 'Kaprodi2', 141, 'Dokumen Mahasiswa', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', 'sekjur,kaprodi,dosen', '2024-06-25 05:51:45', '2024-06-25 05:51:45'),
(121, 'Kaprodi2', 141, 'Dokumen Mahasiswa', 'Deskripsi Dokumen', 'Dokumen Visi Misi', 'Direktur', 2022, 'Dokumen_baru.pdf', 'sertifikat, mahasiswa', 'sekjur,kaprodi', '2024-06-25 05:55:12', '2024-06-25 05:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `approved`, `password`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'super user', 'superuser@example.com', 1, '$2y$12$3U52mGDwQa42EB7wGtvEoev4OG3WqRFwtggZ1ynhrcg8OVNQfoNQO', 'Admin', '2024-05-08 17:52:21', '2024-06-13 10:56:47'),
(9, 'Ketua Jurusan', 'kajur@example.com', 0, '$2y$12$MDzlIpHrNa/Vx347IPO6ROJJybcRXb5xyiGDN6tcrbcpmCbrSMS3q', 'Kajur', '2024-06-14 07:52:09', '2024-06-14 07:52:09'),
(10, 'Sekretaris Jurusan', 'sekjur@example.com', 0, '$2y$12$EXIc0IEb8MP4dY.YFcAbDO8uxs9DwzoYf31sQQu./hYZQUsYBWYqO', 'Sekjur', '2024-06-14 07:53:19', '2024-06-14 07:53:19'),
(11, 'Kaprodi', 'kaprodi@example.com', 1, '$2y$12$weC3nWpMLcMtrEXTj/mTr.TbvYKS3.Gnc6ZwzFt50ek/ED1Xop1q2', 'Kaprodi', '2024-06-14 07:55:14', '2024-06-19 02:44:47'),
(12, 'Dosen', 'dosen@example.com', 0, '$2y$12$da22xoMe/yEQdtymlouW7OXaQ/Iqw7NQyfNECnyGC3m7NGyGhuzBC', 'Dosen', '2024-06-14 08:00:20', '2024-06-14 08:00:20'),
(13, 'Adm', 'adm@example.com', 0, '$2y$12$DaVdHSAzSxjYs1F1z.JdWOUwRWMTipe2UvXg5myiZm2FMFU86x9ge', 'Adm', '2024-06-14 08:01:14', '2024-06-14 08:01:14'),
(14, 'Mahasiswa2', 'mahasiswa_diedit@gmail.com', 1, '$2y$12$f4qq6Eym2PEL5ujNGjNHhODxikukUuR4ybOSP49jPAixaR88CE.2u', 'Mahasiswa', '2024-06-14 08:02:06', '2024-06-22 04:43:03'),
(15, 'Admin', 'admin@example.com', 1, '$2y$12$UWVkYaZzPqs5FEOETedIK.gAULspUIrtq23Bkqqdaksp4EZLzY.ia', 'Admin', '2024-06-14 08:02:41', '2024-06-16 11:14:36'),
(19, 'Ketua Jurusan1', 'ketuajurusan@gmail.com', 0, '$2y$12$dUBwfRKdQHH2stLv.akqJuEaUTSbh4zMPWHmdQ/fRe9pQXyxgJqI2', 'Kajur', '2024-06-19 01:31:58', '2024-06-19 01:31:58'),
(20, 'Sekjur1', 'sekjur1@gmail.com', 0, '$2y$12$yBGfUzwTGsmd8avem3w10uH2HDddiU7sJIw7RS5CsMXTSAuJv/XfO', 'Sekjur', '2024-06-19 01:35:59', '2024-06-19 01:35:59'),
(21, 'Kaprodi1', 'kaprodi@gmail.com', 1, '$2y$12$qmweKnimoRuUvr9UjYwdGekv3DND39VPLyplIK2v7ymmnZWgkMW0a', 'Kaprodi', '2024-06-19 02:29:03', '2024-06-19 21:51:55'),
(22, 'dosen1', 'dosen@gmail.com', 1, '$2y$12$7SWXO/yYkBBYKt7XW7kUv.FRHfVRqbO7DcoNqJFv.t0TccIgQYIqm', 'Dosen', '2024-06-19 02:36:22', '2024-06-22 04:47:44'),
(23, 'Nama Mahasiswa', 'mahasiswa_edit@gmail.com', 1, '$2y$12$s2iKYkGdD.IulM1WOx5PFOIJHp21DZw23Uw/uoqn0LuiIn6gxGFze', 'Mahasiswa', '2024-06-19 02:47:38', '2024-06-22 04:43:05'),
(24, 'adm1', 'admjurusan@gmail.com', 0, '$2y$12$PDOKuWQQg28b4BRZtxLlJ.YXxJP6ILSqbXYhjmvOYtERwvbbCJ5FC', 'Adm', '2024-06-19 03:11:30', '2024-06-19 03:11:30'),
(26, 'admin', 'admin@gmail.com', 1, '$2y$12$RTdR4PgGDF.l24MrlhHRl.Q1N5ri8kAqdwaTUjjOCS2l8C81UmqWy', 'Admin', '2024-06-19 21:41:05', '2024-06-19 21:42:44'),
(28, 'Test Mahasiswa', 'mahasiswa1@example.com', 1, '$2y$12$CeQPmWwl4/Qo5Hu5qAcxye5YuLEIWQJPSF/usYxQaWGFdnHMTyoAa', 'Mahasiswa', '2024-06-20 13:26:41', '2024-06-22 04:42:35'),
(30, 'mahasiswa2', 'mahasiswa2@gmail.com', 1, '$2y$12$xMxfE8ccYUw6WfC.FUF76OlwEdM0Syb8q8ey5In.pVNMaQHK7UQ7K', 'Mahasiswa', '2024-06-22 03:20:11', '2024-06-22 04:43:08'),
(31, 'dosen1', 'dosen1@gmail.com', 1, '$2y$12$co/C50ByOZ2kPGcTZ0jCBeaDGnFnxxiEunNSyFx.CZYZdW6n1uEke', 'Dosen', '2024-06-22 03:24:39', '2024-06-22 04:47:37'),
(32, 'Kaprodi2', 'kaprodi2@gmail.com', 1, '$2y$12$ECtlDp/qa/hUCSJzjoSfKupMRg0xZbCpa7ei6Ed/lQiUPzDge/FNW', 'Kaprodi', '2024-06-24 02:08:16', '2024-06-24 02:08:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_id` (`dokumen_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
