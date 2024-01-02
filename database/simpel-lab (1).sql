-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2024 at 06:36 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpel-lab`
--
CREATE DATABASE IF NOT EXISTS `simpel-lab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `simpel-lab`;

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` bigint UNSIGNED NOT NULL,
  `aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id`, `aset`, `kondisi`, `lab_id`) VALUES
(1, 'Proyektor', 'baik', 1),
(2, 'Printer', 'baik', 1),
(3, 'Whiteboard', 'baik', 1),
(4, 'Router', 'baik', 1),
(5, 'Switch', 'baik', 1),
(6, 'Proyektor', 'baik', 2),
(7, 'Printer', 'baik', 2),
(8, 'Whiteboard', 'baik', 2),
(9, 'Router', 'baik', 2),
(10, 'Switch', 'baik', 2),
(11, 'Proyektor', 'baik', 3),
(12, 'Printer', 'baik', 3),
(13, 'Whiteboard', 'baik', 3),
(14, 'Router', 'baik', 3),
(15, 'Switch', 'baik', 3),
(16, 'Proyektor', 'baik', 4),
(17, 'Printer', 'baik', 4),
(18, 'Whiteboard', 'baik', 4),
(19, 'Router', 'baik', 4),
(20, 'Switch', 'baik', 4),
(21, 'Proyektor', 'baik', 5),
(22, 'Printer', 'baik', 5),
(23, 'Whiteboard', 'baik', 5),
(24, 'Router', 'baik', 5),
(25, 'Switch', 'baik', 5),
(26, 'Proyektor', 'baik', 6),
(27, 'Printer', 'baik', 6),
(28, 'Whiteboard', 'baik', 6),
(29, 'Router', 'baik', 6),
(30, 'Switch', 'baik', 6),
(31, 'Proyektor', 'baik', 7),
(32, 'Printer', 'baik', 7),
(33, 'Whiteboard', 'baik', 7),
(34, 'Router', 'baik', 7),
(35, 'Switch', 'baik', 7),
(36, 'Proyektor', 'baik', 8),
(37, 'Printer', 'baik', 8),
(38, 'Whiteboard', 'baik', 8),
(39, 'Router', 'baik', 8),
(40, 'Switch', 'baik', 8);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemeliharaan_komputer`
--

CREATE TABLE `detail_pemeliharaan_komputer` (
  `pemeliharaan_id` bigint UNSIGNED NOT NULL,
  `prosedur_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemeliharaan_komputer`
--

INSERT INTO `detail_pemeliharaan_komputer` (`pemeliharaan_id`, `prosedur_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 9),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 7),
(2, 8),
(3, 9),
(4, 1),
(5, 1),
(5, 3),
(5, 6),
(5, 9),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_perbaikan`
--

CREATE TABLE `detail_perbaikan` (
  `id` bigint UNSIGNED NOT NULL,
  `perbaikan_id` bigint UNSIGNED DEFAULT NULL,
  `jenis_perbaikan` enum('perbaikan lainnya','penggantian hardware','instal software') COLLATE utf8mb4_unicode_ci NOT NULL,
  `perbaikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_perbaikan`
--

INSERT INTO `detail_perbaikan` (`id`, `perbaikan_id`, `jenis_perbaikan`, `perbaikan`) VALUES
(2, 2, 'perbaikan lainnya', 'asdasda'),
(3, 3, 'instal software', 'Sistem Operasi windows 10'),
(4, 4, 'penggantian hardware', 'Keyboard logitech mk-01'),
(5, 4, 'perbaikan lainnya', 'pembersihan ram'),
(6, 5, 'perbaikan lainnya', 'asdsad'),
(7, 6, 'perbaikan lainnya', 'pembersihan ram');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `id` bigint UNSIGNED NOT NULL,
  `hardware` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`id`, `hardware`, `lab_id`) VALUES
(1, 'Prosessor', 1),
(2, 'Ram', 1),
(3, 'Motherboard', 1),
(4, 'Penyimpanan', 1),
(5, 'Power Supply', 1),
(6, 'Casing', 1),
(7, 'Monitor', 1),
(8, 'Keyboard', 1),
(9, 'mouse', 1),
(10, 'Prosessor', 2),
(11, 'Ram', 2),
(12, 'Motherboard', 2),
(13, 'Penyimpanan', 2),
(14, 'Power Supply', 2),
(15, 'Casing', 2),
(16, 'Monitor', 2),
(17, 'Keyboard', 2),
(18, 'mouse', 2),
(19, 'Prosessor', 3),
(20, 'Ram', 3),
(21, 'Motherboard', 3),
(22, 'Penyimpanan', 3),
(23, 'Power Supply', 3),
(24, 'Casing', 3),
(25, 'Monitor', 3),
(26, 'Keyboard', 3),
(27, 'mouse', 3),
(28, 'NIC/Kartu Jaringan', 3),
(29, 'Prosessor', 4),
(30, 'Ram', 4),
(31, 'Motherboard', 4),
(32, 'Penyimpanan', 4),
(33, 'Power Supply', 4),
(34, 'Casing', 4),
(35, 'Monitor', 4),
(36, 'Keyboard', 4),
(37, 'mouse', 4),
(38, 'NIC/Kartu Jaringan', 4),
(39, 'Prosessor', 5),
(40, 'Ram', 5),
(41, 'Motherboard', 5),
(42, 'Penyimpanan', 5),
(43, 'Power Supply', 5),
(44, 'Casing', 5),
(45, 'Monitor', 5),
(46, 'Keyboard', 5),
(47, 'mouse', 5),
(48, 'NIC/Kartu Jaringan', 5),
(49, 'Prosessor', 6),
(50, 'Ram', 6),
(51, 'Motherboard', 6),
(52, 'Penyimpanan', 6),
(53, 'Power Supply', 6),
(54, 'Casing', 6),
(55, 'Monitor', 6),
(56, 'Keyboard', 6),
(57, 'mouse', 6),
(58, 'NIC/Kartu Jaringan', 6),
(59, 'Prosessor', 7),
(60, 'Ram', 7),
(61, 'Motherboard', 7),
(62, 'Penyimpanan', 7),
(63, 'Power Supply', 7),
(64, 'Casing', 7),
(65, 'Monitor', 7),
(66, 'Keyboard', 7),
(67, 'mouse', 7),
(68, 'NIC/Kartu Jaringan', 7),
(69, 'Prosessor', 8),
(70, 'Ram', 8),
(71, 'Motherboard', 8),
(72, 'Penyimpanan', 8),
(73, 'Power Supply', 8),
(74, 'Casing', 8),
(75, 'Monitor', 8),
(76, 'Keyboard', 8),
(77, 'mouse', 8);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_pc`
--

CREATE TABLE `hardware_pc` (
  `pc_id` bigint UNSIGNED NOT NULL,
  `hardware_id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_pc`
--

INSERT INTO `hardware_pc` (`pc_id`, `hardware_id`, `keterangan`) VALUES
(1, 1, 'Intel Core i3-9100'),
(1, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(1, 3, 'ASRock B450M-HDV'),
(1, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(1, 5, 'Thermaltake Smart 500W'),
(1, 6, 'NZXT H510 Compact'),
(1, 7, 'AOC 22V2H 21.5 inch'),
(1, 8, 'logitech mk-01'),
(1, 9, 'Logitech MK270 Combo'),
(2, 1, 'Intel Core i3-9100'),
(2, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(2, 3, 'ASRock B450M-HDV'),
(2, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(2, 5, 'Thermaltake Smart 500W'),
(2, 6, 'NZXT H510 Compact'),
(2, 7, 'AOC 22V2H 21.5 inch'),
(2, 8, 'Logitech MK270 combo'),
(2, 9, 'Logitech MK270 Combo'),
(3, 1, 'Intel Core i3-9100'),
(3, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(3, 3, 'ASRock B450M-HDV'),
(3, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(3, 5, 'Thermaltake Smart 500W'),
(3, 6, 'NZXT H510 Compact'),
(3, 7, 'AOC 22V2H 21.5 inch'),
(3, 8, 'Logitech MK270 combo'),
(3, 9, 'Logitech MK270 Combo'),
(4, 1, 'Intel Core i3-9100'),
(4, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(4, 3, 'ASRock B450M-HDV'),
(4, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(4, 5, 'Thermaltake Smart 500W'),
(4, 6, 'NZXT H510 Compact'),
(4, 7, 'AOC 22V2H 21.5 inch'),
(4, 8, 'Logitech MK270 combo'),
(4, 9, 'Logitech MK270 Combo'),
(5, 1, 'Intel Core i3-9100'),
(5, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(5, 3, 'ASRock B450M-HDV'),
(5, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(5, 5, 'Thermaltake Smart 500W'),
(5, 6, 'NZXT H510 Compact'),
(5, 7, 'AOC 22V2H 21.5 inch'),
(5, 8, 'Logitech MK270 combo'),
(5, 9, 'Logitech MK270 Combo'),
(6, 1, 'Intel Core i3-9100'),
(6, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(6, 3, 'ASRock B450M-HDV'),
(6, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(6, 5, 'Thermaltake Smart 500W'),
(6, 6, 'NZXT H510 Compact'),
(6, 7, 'AOC 22V2H 21.5 inch'),
(6, 8, 'Logitech MK270 combo'),
(6, 9, 'Logitech MK270 Combo'),
(7, 1, 'Intel Core i3-9100'),
(7, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(7, 3, 'ASRock B450M-HDV'),
(7, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(7, 5, 'Thermaltake Smart 500W'),
(7, 6, 'NZXT H510 Compact'),
(7, 7, 'AOC 22V2H 21.5 inch'),
(7, 8, 'Logitech MK270 combo'),
(7, 9, 'Logitech MK270 Combo'),
(8, 1, 'Intel Core i3-9100'),
(8, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(8, 3, 'ASRock B450M-HDV'),
(8, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(8, 5, 'Thermaltake Smart 500W'),
(8, 6, 'NZXT H510 Compact'),
(8, 7, 'AOC 22V2H 21.5 inch'),
(8, 8, 'Logitech MK270 combo'),
(8, 9, 'Logitech MK270 Combo'),
(9, 1, 'Intel Core i3-9100'),
(9, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(9, 3, 'ASRock B450M-HDV'),
(9, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(9, 5, 'Thermaltake Smart 500W'),
(9, 6, 'NZXT H510 Compact'),
(9, 7, 'AOC 22V2H 21.5 inch'),
(9, 8, 'Logitech MK270 combo'),
(9, 9, 'Logitech MK270 Combo'),
(10, 1, 'Intel Core i3-9100'),
(10, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(10, 3, 'ASRock B450M-HDV'),
(10, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(10, 5, 'Thermaltake Smart 500W'),
(10, 6, 'NZXT H510 Compact'),
(10, 7, 'AOC 22V2H 21.5 inch'),
(10, 8, 'Logitech MK270 combo'),
(10, 9, 'Logitech MK270 Combo'),
(11, 1, 'Intel Core i3-9100'),
(11, 2, 'Corsair Vengeance LPX 8GB DDR4 2666MHz'),
(11, 3, 'ASRock B450M-HDV'),
(11, 4, 'Kingston A2000 NVMe PCIe M.2 128GB'),
(11, 5, 'Thermaltake Smart 500W'),
(11, 6, 'NZXT H510 Compact'),
(11, 7, 'AOC 22V2H 21.5 inch'),
(11, 8, 'Logitech MK270 combo'),
(11, 9, 'Logitech MK270 Combo');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lab` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `nama_lab`, `role_id`) VALUES
(1, 'TKJ 1', 4),
(2, 'TKJ 2', 4),
(3, 'TKJ 3', 4),
(4, 'Fiber Optik', 4),
(5, 'Simdig', 4),
(6, 'Multimedia', 4),
(7, 'AKL 1', 5),
(8, 'AKL 2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_11_08_080125_create_roles_table', 1),
(4, '2023_11_14_191358_create_lab', 1),
(5, '2023_11_14_191742_create_hardware', 1),
(6, '2023_11_16_192257_create_software', 1),
(7, '2023_11_16_194726_create_aset', 1),
(8, '2023_11_19_073922_create_prosedur', 1),
(9, '2023_11_19_102839_create_pc', 1),
(10, '2023_11_19_205413_create_hardware_pc', 1),
(11, '2023_11_20_023730_create_software_pc', 1),
(12, '2023_11_20_083435_create_sesi_pemeliharaan', 1),
(13, '2023_11_20_083753_create_pemeliharaan_komputer', 1),
(14, '2023_11_20_090100_create_detail_pemeliharaan_komputer', 1),
(15, '2023_11_22_152758_create_kerusakan', 1),
(16, '2023_11_22_161638_create_penggantian__hardware_table', 1),
(17, '2023_11_29_020150_create_detail_perbaikan', 1),
(18, '2023_12_09_125439_create_penggantian_software', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` bigint UNSIGNED NOT NULL,
  `no_pc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Rusak','Normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Normal',
  `lab_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `no_pc`, `status`, `lab_id`) VALUES
(1, '01', 'Rusak', 1),
(2, '02', 'Normal', 1),
(3, '03', 'Normal', 1),
(4, '04', 'Normal', 1),
(5, '05', 'Normal', 1),
(6, '06', 'Normal', 1),
(7, '07', 'Normal', 1),
(8, '08', 'Normal', 1),
(9, '09', 'Normal', 1),
(10, '10', 'Normal', 1),
(11, '11', 'Normal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan_komputer`
--

CREATE TABLE `pemeliharaan_komputer` (
  `id` bigint UNSIGNED NOT NULL,
  `sesi_id` bigint UNSIGNED NOT NULL,
  `pc_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `perbaikan` enum('butuh perbaikan','tidak butuh perbaikan') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeliharaan_komputer`
--

INSERT INTO `pemeliharaan_komputer` (`id`, `sesi_id`, `pc_id`, `user_id`, `tanggal`, `perbaikan`) VALUES
(1, 1, 1, 4, '2023-12-26 23:46:55', 'butuh perbaikan'),
(2, 1, 2, 4, '2023-12-27 01:39:37', 'butuh perbaikan'),
(3, 1, 3, 4, '2023-12-27 11:27:38', 'tidak butuh perbaikan'),
(4, 2, 1, 4, '2023-12-28 00:47:59', 'tidak butuh perbaikan'),
(5, 3, 1, 4, '2023-12-28 01:02:03', 'butuh perbaikan'),
(6, 4, 1, 4, '2023-12-28 03:06:28', 'butuh perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `penggantian_hardware`
--

CREATE TABLE `penggantian_hardware` (
  `id` bigint UNSIGNED NOT NULL,
  `perbaikan_id` bigint UNSIGNED NOT NULL,
  `hardware_id` bigint UNSIGNED NOT NULL,
  `pc_id` bigint UNSIGNED NOT NULL,
  `hardware_lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardware_baru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penggantian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggantian_hardware`
--

INSERT INTO `penggantian_hardware` (`id`, `perbaikan_id`, `hardware_id`, `pc_id`, `hardware_lama`, `hardware_baru`, `tanggal_penggantian`) VALUES
(1, 4, 8, 1, 'Logitech MK270 combo', 'logitech mk-01', '2023-12-28 01:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `penggantian_software`
--

CREATE TABLE `penggantian_software` (
  `id` bigint UNSIGNED NOT NULL,
  `perbaikan_id` bigint UNSIGNED NOT NULL,
  `software_id` bigint UNSIGNED NOT NULL,
  `pc_id` bigint UNSIGNED NOT NULL,
  `software_lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `software_baru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penggantian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggantian_software`
--

INSERT INTO `penggantian_software` (`id`, `perbaikan_id`, `software_id`, `pc_id`, `software_lama`, `software_baru`, `tanggal_penggantian`) VALUES
(1, 3, 1, 2, 'Windows 10 Pro', 'windows 10', '2023-12-28 00:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` bigint UNSIGNED NOT NULL,
  `pemeliharaan_id` bigint UNSIGNED DEFAULT NULL,
  `pc_id` bigint UNSIGNED NOT NULL,
  `lab_id` bigint UNSIGNED NOT NULL,
  `kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tgl_kerusakan` datetime NOT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` enum('selesai','Dalam Perbaikan','menunggu perbaikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu perbaikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `pemeliharaan_id`, `pc_id`, `lab_id`, `kerusakan`, `keterangan`, `tgl_kerusakan`, `tgl_selesai`, `status`) VALUES
(2, NULL, 1, 1, 'tidak bisa menyala', NULL, '2023-12-27 00:23:37', '2023-12-27 11:20:33', 'selesai'),
(3, 2, 2, 1, 'booting lama , lemot saat membuka aplikasi', 'done', '2023-12-27 01:39:37', '2023-12-28 00:52:55', 'selesai'),
(4, 5, 1, 1, 'pc lemot,keyboard rusak', NULL, '2023-12-28 01:02:03', '2023-12-28 01:03:04', 'selesai'),
(5, 6, 1, 1, 'blue screen', '-', '2023-12-28 03:06:28', NULL, 'Dalam Perbaikan'),
(6, NULL, 1, 1, 'bluescreen', 'sudah menyala tetapi masih lemot saat booting', '2023-12-31 20:53:18', NULL, 'Dalam Perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prosedur_pemeliharaan`
--

CREATE TABLE `prosedur_pemeliharaan` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prosedur_pemeliharaan`
--

INSERT INTO `prosedur_pemeliharaan` (`id`, `keterangan`) VALUES
(1, 'Membersihkan hardware dari debu'),
(2, 'Memeriksa setiap komponen hardware untuk mendeteksi kerusakan'),
(3, 'Menjalankan disk cleanup untuk membersihkan file-file tidak perlu'),
(4, 'Menjalankan disk defragmentation untuk mengoptimalkan kinerja hard disk'),
(5, 'Memastikan perangkat input/output berfungsi dengan baik'),
(6, 'Memastikan Aplikasi Penting bisa berjalan'),
(7, 'menghapus program yang tidak diperlukan'),
(8, 'mengecek pembaruan program antivirus'),
(9, 'Melakukan pemindaian virus');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'kepala program keahlian TKJT'),
(3, 'kepala program keahlian AKL'),
(4, 'Tim MR TKJT '),
(5, 'Tim MR AKL');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_pemeliharaan`
--

CREATE TABLE `sesi_pemeliharaan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `lab_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi_pemeliharaan`
--

INSERT INTO `sesi_pemeliharaan` (`id`, `nama_sesi`, `tanggal_mulai`, `lab_id`) VALUES
(1, 'pemeliharan rutin', '2023-12-26', 1),
(2, 'pemeliharan rutin', '2023-12-27', 1),
(3, 'pemeliharan rutin', '2023-12-28', 1),
(4, 'masih error', '2023-12-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` bigint UNSIGNED NOT NULL,
  `software` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `software`, `lab_id`) VALUES
(1, 'Sistem Operasi', 1),
(2, 'Office', 1),
(3, 'Text Editor', 1),
(4, 'Software Desain', 1),
(5, 'Antivirus', 1),
(6, 'Browser', 1),
(7, 'Software Jaringan', 1),
(8, 'Sistem Operasi', 2),
(9, 'Office', 2),
(10, 'Text Editor', 2),
(11, 'Software Desain', 2),
(12, 'Antivirus', 2),
(13, 'Browser', 2),
(14, 'Software Jaringan', 2),
(15, 'Sistem Operasi', 3),
(16, 'Office', 3),
(17, 'Text Editor', 3),
(18, 'Software Desain', 3),
(19, 'Antivirus', 3),
(20, 'Browser', 3),
(21, 'Software Jaringan', 3),
(22, 'Sistem Operasi', 4),
(23, 'Office', 4),
(24, 'Text Editor', 4),
(25, 'Software Desain', 4),
(26, 'Antivirus', 4),
(27, 'Browser', 4),
(28, 'Sistem Operasi', 5),
(29, 'Office', 5),
(30, 'Text Editor', 5),
(31, 'Software Desain', 5),
(32, 'Antivirus', 5),
(33, 'Browser', 5),
(34, 'Sistem Operasi', 6),
(35, 'Office', 6),
(36, 'Text Editor', 6),
(37, 'Software Desain', 6),
(38, 'Antivirus', 6),
(39, 'Browser', 6),
(40, 'Sistem Operasi', 7),
(41, 'Office', 7),
(42, 'Software Akuntansi', 7),
(43, 'Antivirus', 7),
(44, 'Browser', 7),
(45, 'PDF Reader', 7),
(46, 'Sistem Operasi', 8),
(47, 'Office', 8),
(48, 'Software Akuntansi', 8),
(49, 'Antivirus', 8),
(50, 'Browser', 8),
(51, 'PDF Reader', 8);

-- --------------------------------------------------------

--
-- Table structure for table `software_pc`
--

CREATE TABLE `software_pc` (
  `pc_id` bigint UNSIGNED NOT NULL,
  `software_id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `software_pc`
--

INSERT INTO `software_pc` (`pc_id`, `software_id`, `keterangan`) VALUES
(1, 1, 'Windows 10 Pro'),
(1, 2, 'Microsoft Office 2016'),
(1, 3, 'Visual Studio Code'),
(1, 4, 'CorelDraw x7'),
(1, 5, 'Windows Defender'),
(1, 6, 'Chrome'),
(1, 7, 'Cosco Packet Tracer'),
(2, 1, 'windows 10'),
(2, 2, 'Microsoft Office 2016'),
(2, 3, 'Visual Studio Code'),
(2, 4, 'CorelDraw x7'),
(2, 5, 'Windows Defender'),
(2, 6, 'Chrome'),
(2, 7, 'Cosco Packet Tracer'),
(3, 1, 'Windows 10 Pro'),
(3, 2, 'Microsoft Office 2016'),
(3, 3, 'Visual Studio Code'),
(3, 4, 'CorelDraw x7'),
(3, 5, 'Windows Defender'),
(3, 6, 'Chrome'),
(3, 7, 'Cosco Packet Tracer'),
(4, 1, 'Windows 10 Pro'),
(4, 2, 'Microsoft Office 2016'),
(4, 3, 'Visual Studio Code'),
(4, 4, 'CorelDraw x7'),
(4, 5, 'Windows Defender'),
(4, 6, 'Chrome'),
(4, 7, 'Cosco Packet Tracer'),
(5, 1, 'Windows 10 Pro'),
(5, 2, 'Microsoft Office 2016'),
(5, 3, 'Visual Studio Code'),
(5, 4, 'CorelDraw x7'),
(5, 5, 'Windows Defender'),
(5, 6, 'Chrome'),
(5, 7, 'Cosco Packet Tracer'),
(6, 1, 'Windows 10 Pro'),
(6, 2, 'Microsoft Office 2016'),
(6, 3, 'Visual Studio Code'),
(6, 4, 'CorelDraw x7'),
(6, 5, 'Windows Defender'),
(6, 6, 'Chrome'),
(6, 7, 'Cosco Packet Tracer'),
(7, 1, 'Windows 10 Pro'),
(7, 2, 'Microsoft Office 2016'),
(7, 3, 'Visual Studio Code'),
(7, 4, 'CorelDraw x7'),
(7, 5, 'Windows Defender'),
(7, 6, 'Chrome'),
(7, 7, 'Cosco Packet Tracer'),
(8, 1, 'Windows 10 Pro'),
(8, 2, 'Microsoft Office 2016'),
(8, 3, 'Visual Studio Code'),
(8, 4, 'CorelDraw x7'),
(8, 5, 'Windows Defender'),
(8, 6, 'Chrome'),
(8, 7, 'Cosco Packet Tracer'),
(9, 1, 'Windows 10 Pro'),
(9, 2, 'Microsoft Office 2016'),
(9, 3, 'Visual Studio Code'),
(9, 4, 'CorelDraw x7'),
(9, 5, 'Windows Defender'),
(9, 6, 'Chrome'),
(9, 7, 'Cosco Packet Tracer'),
(10, 1, 'Windows 10 Pro'),
(10, 2, 'Microsoft Office 2016'),
(10, 3, 'Visual Studio Code'),
(10, 4, 'CorelDraw x7'),
(10, 5, 'Windows Defender'),
(10, 6, 'Chrome'),
(10, 7, 'Cosco Packet Tracer'),
(11, 1, 'Windows 10 Pro'),
(11, 2, 'Microsoft Office 2016'),
(11, 3, 'Visual Studio Code'),
(11, 4, 'CorelDraw x7'),
(11, 5, 'Windows Defender'),
(11, 6, 'Chrome'),
(11, 7, 'Cosco Packet Tracer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `phone`, `address`, `role_id`) VALUES
(1, 'admin', 'admin simpel-lab', '$2y$10$uuJKCXAX2HsXSO4bA4WfTeVyslfM..cnuz7qAHL/vYvaE.V3j2XOi', '088232919767', 'bebel ,wonokerto, kabupaten pekalongan', 1),
(2, 'miftachul', 'miftachul chasanah, S.Pd', '$2y$10$0E4HdBageUKIPynskt1Xd.IUu7U2LgvRL9JhiakD.37rtiCdr2tMm', '-', 'Sragi', 3),
(3, 'imam', 'imam ahmad subhan, ST', '$2y$10$ZPLXUWUvjyztZCavxRfVpuOv4ZSO93PfK7I9tJ/fODitVZgYqvu1O', '-', 'Sragi', 2),
(4, 'sriwati', 'sriwati ,S.Kom', '$2y$10$uaB0IzyLDodCf4Q2klRv..s4lr3ViJk2PHwIvFHi262nZEpBimy9e', '-', 'Sragi', 4),
(5, 'rahmat', 'Rahmat Sudarmo ,S.Kom', '$2y$10$4LE8uZ5Sp01zU4GQcOMVyOOi6YAL197x58pdAYNlAG.9nCJjqtYXC', '-', 'Sragi', 4),
(6, 'bugar', 'Bugar Jati Lestari ,S.Pd', '$2y$10$2Mg39IjlWUh6OxcclAyt8e0uRtUmaNlqtqy9QcNMuOHaDeAazwngq', '-', 'Sragi', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asetlab_id` (`lab_id`);

--
-- Indexes for table `detail_pemeliharaan_komputer`
--
ALTER TABLE `detail_pemeliharaan_komputer`
  ADD KEY `pemeliharaan_komputer_id` (`pemeliharaan_id`),
  ADD KEY `prosedur_id` (`prosedur_id`);

--
-- Indexes for table `detail_perbaikan`
--
ALTER TABLE `detail_perbaikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_perbaikan_id` (`perbaikan_id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_id` (`lab_id`);

--
-- Indexes for table `hardware_pc`
--
ALTER TABLE `hardware_pc`
  ADD KEY `pc_id` (`pc_id`),
  ADD KEY `hardware_id` (`hardware_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pclab_id` (`lab_id`);

--
-- Indexes for table `pemeliharaan_komputer`
--
ALTER TABLE `pemeliharaan_komputer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesi_pemeliharaan_id` (`sesi_id`),
  ADD KEY `pemeliharaanpc_id` (`pc_id`),
  ADD KEY `pemeliharaanuser_id` (`user_id`);

--
-- Indexes for table `penggantian_hardware`
--
ALTER TABLE `penggantian_hardware`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggantian_perbaikan_id` (`perbaikan_id`),
  ADD KEY `penggantian_hardware_id` (`hardware_id`),
  ADD KEY `penggantian_pc_id` (`pc_id`);

--
-- Indexes for table `penggantian_software`
--
ALTER TABLE `penggantian_software`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggantianSw_perbaikan_id` (`perbaikan_id`),
  ADD KEY `penggantian_software_id` (`software_id`),
  ADD KEY `penggantianSw_pc_id` (`pc_id`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbaikan_pemeliharaan_id` (`pemeliharaan_id`),
  ADD KEY `perbaikan_pc_id` (`pc_id`),
  ADD KEY `kerusakanLab_id` (`lab_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prosedur_pemeliharaan`
--
ALTER TABLE `prosedur_pemeliharaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesi_pemeliharaan`
--
ALTER TABLE `sesi_pemeliharaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesiLab_id` (`lab_id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spftware_lab_id` (`lab_id`);

--
-- Indexes for table `software_pc`
--
ALTER TABLE `software_pc`
  ADD KEY `swpc_id` (`pc_id`),
  ADD KEY `software_id` (`software_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `detail_perbaikan`
--
ALTER TABLE `detail_perbaikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemeliharaan_komputer`
--
ALTER TABLE `pemeliharaan_komputer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penggantian_hardware`
--
ALTER TABLE `penggantian_hardware`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggantian_software`
--
ALTER TABLE `penggantian_software`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prosedur_pemeliharaan`
--
ALTER TABLE `prosedur_pemeliharaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sesi_pemeliharaan`
--
ALTER TABLE `sesi_pemeliharaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `asetlab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemeliharaan_komputer`
--
ALTER TABLE `detail_pemeliharaan_komputer`
  ADD CONSTRAINT `pemeliharaan_komputer_id` FOREIGN KEY (`pemeliharaan_id`) REFERENCES `pemeliharaan_komputer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prosedur_id` FOREIGN KEY (`prosedur_id`) REFERENCES `prosedur_pemeliharaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_perbaikan`
--
ALTER TABLE `detail_perbaikan`
  ADD CONSTRAINT `detail_perbaikan_id` FOREIGN KEY (`perbaikan_id`) REFERENCES `perbaikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `lab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hardware_pc`
--
ALTER TABLE `hardware_pc`
  ADD CONSTRAINT `hardware_id` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pclab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeliharaan_komputer`
--
ALTER TABLE `pemeliharaan_komputer`
  ADD CONSTRAINT `pemeliharaanpc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeliharaanuser_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sesi_pemeliharaan_id` FOREIGN KEY (`sesi_id`) REFERENCES `sesi_pemeliharaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggantian_hardware`
--
ALTER TABLE `penggantian_hardware`
  ADD CONSTRAINT `penggantian_hardware_id` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penggantian_pc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penggantian_perbaikan_id` FOREIGN KEY (`perbaikan_id`) REFERENCES `perbaikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggantian_software`
--
ALTER TABLE `penggantian_software`
  ADD CONSTRAINT `penggantian_software_id` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penggantianSw_pc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penggantianSw_perbaikan_id` FOREIGN KEY (`perbaikan_id`) REFERENCES `perbaikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `kerusakanLab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbaikan_pc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbaikan_pemeliharaan_id` FOREIGN KEY (`pemeliharaan_id`) REFERENCES `pemeliharaan_komputer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sesi_pemeliharaan`
--
ALTER TABLE `sesi_pemeliharaan`
  ADD CONSTRAINT `sesiLab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `spftware_lab_id` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `software_pc`
--
ALTER TABLE `software_pc`
  ADD CONSTRAINT `software_id` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `swpc_id` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
