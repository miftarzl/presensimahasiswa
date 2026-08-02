-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2026 at 11:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `start_time` timestamp NOT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `pertemuan` int NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `qr_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `radius` int NOT NULL DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `class_id`, `start_time`, `end_time`, `tanggal`, `pertemuan`, `mode`, `qr_token`, `lat`, `lng`, `radius`, `created_at`, `updated_at`, `dosen_id`) VALUES
(18, 9, '2026-06-23 18:11:00', '2026-06-23 18:15:00', '2026-06-24', 1, 'online_vclass', '6a3acc22cabb0', -6.299506, 107.0241815, 30, '2026-06-23 18:10:42', '2026-06-23 18:10:42', 16),
(19, 10, '2026-06-23 18:26:00', '2026-06-23 18:30:00', '2026-06-24', 1, 'offline', '6a3acfb388897', -6.299506, 107.0241815, 30, '2026-06-23 18:25:55', '2026-06-23 18:25:55', 15),
(21, 9, '2026-06-24 06:45:00', '2026-06-24 11:00:00', '2026-06-24', 2, 'offline', '6a3b7d3a7ef3e', -6.26394233871154, 106.97114650914543, 30, '2026-06-24 06:46:18', '2026-06-24 06:46:18', 16),
(22, 12, '2026-06-25 17:31:00', '2026-06-25 17:35:00', '2026-06-26', 1, 'online_vclass', '6a3d65bae363a', -6.2995050968862705, 107.02418288477439, 30, '2026-06-25 17:30:34', '2026-06-25 17:30:34', 8),
(25, 11, '2026-06-25 17:57:00', '2026-06-25 18:00:00', '2026-06-26', 3, 'online_zoom', '6a3d6c04ca0d9', -6.29949858431465, 107.02418520784268, 30, '2026-06-25 17:57:24', '2026-06-25 17:57:24', 8),
(26, 12, '2026-06-30 16:39:00', '2026-06-29 23:00:00', '2026-06-30', 5, 'offline', '6a43f12002f9e', -6.299511825398902, 107.02422925255036, 30, '2026-06-30 16:38:56', '2026-06-30 16:38:56', 8),
(28, 11, '2026-06-30 16:41:00', '2026-06-30 16:59:00', '2026-06-30', 2, 'offline', '6a43f1b87dca9', -6.299355490010627, 107.02418576811901, 30, '2026-06-30 16:41:28', '2026-06-30 16:41:28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id` bigint UNSIGNED NOT NULL,
  `attendance_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `status` enum('hadir','izin','sakit','tidak hadir') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hadir',
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`id`, `attendance_id`, `student_id`, `status`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(305, 19, 1, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(306, 19, 2, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(307, 19, 3, 'hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:28:08'),
(308, 19, 4, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(309, 19, 5, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(310, 19, 6, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(311, 19, 7, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(312, 19, 8, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(313, 19, 9, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(314, 19, 10, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(315, 19, 11, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(316, 19, 12, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(317, 19, 13, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(318, 19, 14, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(319, 19, 15, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(320, 19, 16, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(321, 19, 17, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(322, 19, 18, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(323, 19, 19, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(324, 19, 20, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(325, 19, 21, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(326, 19, 22, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(327, 19, 23, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(328, 19, 24, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(329, 19, 25, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(330, 19, 26, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(331, 19, 27, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(332, 19, 28, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(333, 19, 29, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(334, 19, 30, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(335, 19, 31, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(336, 19, 32, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(337, 19, 33, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(338, 19, 34, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(339, 19, 35, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(340, 19, 36, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(341, 19, 37, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(342, 19, 38, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(343, 19, 39, 'tidak hadir', NULL, '2026-06-23 18:27:41', '2026-06-23 18:27:41'),
(344, 18, 1, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(345, 18, 2, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(346, 18, 3, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(347, 18, 4, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(348, 18, 5, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(349, 18, 6, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(350, 18, 7, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(351, 18, 8, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(352, 18, 9, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(353, 18, 10, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(354, 18, 11, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(355, 18, 12, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(356, 18, 13, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(357, 18, 14, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(358, 18, 15, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(359, 18, 16, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(360, 18, 17, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(361, 18, 18, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(362, 18, 19, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(363, 18, 20, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(364, 18, 21, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(365, 18, 22, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(366, 18, 23, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(367, 18, 24, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(368, 18, 25, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(369, 18, 26, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(370, 18, 27, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(371, 18, 28, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(372, 18, 29, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(373, 18, 30, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(374, 18, 31, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(375, 18, 32, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(376, 18, 33, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(377, 18, 34, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(378, 18, 35, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(379, 18, 36, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(380, 18, 37, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(381, 18, 38, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(382, 18, 39, 'tidak hadir', NULL, '2026-06-24 06:37:18', '2026-06-24 06:37:18'),
(422, 21, 1, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(423, 21, 2, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(424, 21, 3, 'hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:48:56'),
(425, 21, 4, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(426, 21, 5, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(427, 21, 6, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(428, 21, 7, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(429, 21, 8, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(430, 21, 9, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(431, 21, 10, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(432, 21, 11, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(433, 21, 12, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(434, 21, 13, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(435, 21, 14, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(436, 21, 15, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(437, 21, 16, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(438, 21, 17, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(439, 21, 18, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(440, 21, 19, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(441, 21, 20, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(442, 21, 21, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(443, 21, 22, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(444, 21, 23, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(445, 21, 24, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(446, 21, 25, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(447, 21, 26, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(448, 21, 27, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(449, 21, 28, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(450, 21, 29, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(451, 21, 30, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(452, 21, 31, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(453, 21, 32, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(454, 21, 33, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(455, 21, 34, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(456, 21, 35, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(457, 21, 36, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(458, 21, 37, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(459, 21, 38, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(460, 21, 39, 'tidak hadir', NULL, '2026-06-24 06:46:35', '2026-06-24 06:46:35'),
(500, 25, 3, 'hadir', 'bukti-presensi/m9Zfe0KGTbaqiMnQ6MNOEumbs7D0BxUTi5W5P0Fh.jpg', '2026-06-25 17:58:20', '2026-06-25 17:58:20'),
(501, 25, 1, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(502, 25, 2, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(503, 25, 4, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(504, 25, 5, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(505, 25, 6, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(506, 25, 7, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(507, 25, 8, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(508, 25, 9, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(509, 25, 10, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(510, 25, 11, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(511, 25, 12, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(512, 25, 13, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(513, 25, 14, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(514, 25, 15, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(515, 25, 16, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(516, 25, 17, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(517, 25, 18, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(518, 25, 19, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(519, 25, 20, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(520, 25, 21, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(521, 25, 22, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(522, 25, 23, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(523, 25, 24, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(524, 25, 25, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(525, 25, 26, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(526, 25, 27, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(527, 25, 28, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(528, 25, 29, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(529, 25, 30, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(530, 25, 31, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(531, 25, 32, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(532, 25, 33, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(533, 25, 34, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(534, 25, 35, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(535, 25, 36, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(536, 25, 37, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(537, 25, 38, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(538, 25, 39, 'tidak hadir', NULL, '2026-06-25 17:58:38', '2026-06-25 17:58:38'),
(578, 28, 1, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(579, 28, 2, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(580, 28, 3, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(581, 28, 4, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(582, 28, 5, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(583, 28, 6, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(584, 28, 7, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(585, 28, 8, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(586, 28, 9, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(587, 28, 10, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(588, 28, 11, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(589, 28, 12, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(590, 28, 13, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(591, 28, 14, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(592, 28, 15, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(593, 28, 16, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(594, 28, 17, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(595, 28, 18, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(596, 28, 19, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(597, 28, 20, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(598, 28, 21, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(599, 28, 22, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(600, 28, 23, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(601, 28, 24, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(602, 28, 25, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(603, 28, 26, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(604, 28, 27, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(605, 28, 28, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(606, 28, 29, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(607, 28, 30, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(608, 28, 31, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(609, 28, 32, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(610, 28, 33, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(611, 28, 34, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(612, 28, 35, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(613, 28, 36, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(614, 28, 37, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(615, 28, 38, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(616, 28, 39, 'tidak hadir', NULL, '2026-07-15 09:55:28', '2026-07-15 09:55:28'),
(617, 22, 1, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(618, 22, 2, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(619, 22, 3, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(620, 22, 4, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(621, 22, 5, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(622, 22, 6, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(623, 22, 7, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(624, 22, 8, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(625, 22, 9, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(626, 22, 10, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(627, 22, 11, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(628, 22, 12, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(629, 22, 13, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(630, 22, 14, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(631, 22, 15, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(632, 22, 16, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(633, 22, 17, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(634, 22, 18, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(635, 22, 19, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(636, 22, 20, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(637, 22, 21, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(638, 22, 22, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(639, 22, 23, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(640, 22, 24, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(641, 22, 25, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(642, 22, 26, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(643, 22, 27, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(644, 22, 28, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(645, 22, 29, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(646, 22, 30, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(647, 22, 31, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(648, 22, 32, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(649, 22, 33, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(650, 22, 34, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(651, 22, 35, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(652, 22, 36, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(653, 22, 37, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(654, 22, 38, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(655, 22, 39, 'tidak hadir', NULL, '2026-08-02 11:20:40', '2026-08-02 11:20:40'),
(656, 26, 1, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(657, 26, 2, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(658, 26, 3, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(659, 26, 4, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(660, 26, 5, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(661, 26, 6, 'tidak hadir', NULL, '2026-08-02 11:31:44', '2026-08-02 11:31:44'),
(662, 26, 7, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(663, 26, 8, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(664, 26, 9, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(665, 26, 10, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(666, 26, 11, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(667, 26, 12, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(668, 26, 13, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(669, 26, 14, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(670, 26, 15, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(671, 26, 16, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(672, 26, 17, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(673, 26, 18, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(674, 26, 19, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(675, 26, 20, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(676, 26, 21, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(677, 26, 22, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(678, 26, 23, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(679, 26, 24, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(680, 26, 25, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(681, 26, 26, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(682, 26, 27, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(683, 26, 28, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(684, 26, 29, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(685, 26, 30, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(686, 26, 31, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(687, 26, 32, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(688, 26, 33, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(689, 26, 34, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(690, 26, 35, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(691, 26, 36, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(692, 26, 37, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(693, 26, 38, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45'),
(694, 26, 39, 'tidak hadir', NULL, '2026-08-02 11:31:45', '2026-08-02 11:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `mata_kuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `dosen_id`, `mata_kuliah`, `kode_kelas`, `jadwal`, `semester`, `created_at`, `updated_at`) VALUES
(3, 14, 'Statistika', '4KA25', 'Senin 08:00 - 10.00', 'Genap', '2026-05-31 00:03:03', '2026-05-31 00:03:03'),
(4, 1, 'Statistika', '1KA01', 'Senin 08.00 : 10.00', 'Genap', '2026-05-31 00:58:29', '2026-05-31 00:58:29'),
(9, 16, 'Audit Teknologi Informasi', '4KA25', 'Sabtu, 13.30 - 14.30', 'Genap', '2026-06-23 18:09:27', '2026-06-23 18:09:27'),
(10, 15, 'Basis Data', '4KA25', 'Selasa,  08.00 - 10.00', 'Genap', '2026-06-23 18:14:57', '2026-06-23 18:14:57'),
(11, 8, 'Etika & Profesionalisme TSI', '4KA25', 'Selasa, 10.00 - 12.00', 'Genap', '2026-06-24 03:13:45', '2026-06-24 03:13:45'),
(12, 8, 'Statistika', '4KA25', 'Senin 08.00 : 10.00', 'Genap', '2026-06-25 17:12:43', '2026-06-25 17:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, NULL, NULL),
(2, 2, 9, NULL, NULL),
(3, 3, 9, NULL, NULL),
(4, 4, 9, NULL, NULL),
(5, 5, 9, NULL, NULL),
(6, 6, 9, NULL, NULL),
(7, 7, 9, NULL, NULL),
(8, 8, 9, NULL, NULL),
(9, 9, 9, NULL, NULL),
(10, 10, 9, NULL, NULL),
(11, 11, 9, NULL, NULL),
(12, 12, 9, NULL, NULL),
(13, 13, 9, NULL, NULL),
(14, 14, 9, NULL, NULL),
(15, 15, 9, NULL, NULL),
(16, 16, 9, NULL, NULL),
(17, 17, 9, NULL, NULL),
(18, 18, 9, NULL, NULL),
(19, 19, 9, NULL, NULL),
(20, 20, 9, NULL, NULL),
(21, 21, 9, NULL, NULL),
(22, 22, 9, NULL, NULL),
(23, 23, 9, NULL, NULL),
(24, 24, 9, NULL, NULL),
(25, 25, 9, NULL, NULL),
(26, 26, 9, NULL, NULL),
(27, 27, 9, NULL, NULL),
(28, 28, 9, NULL, NULL),
(29, 29, 9, NULL, NULL),
(30, 30, 9, NULL, NULL),
(31, 31, 9, NULL, NULL),
(32, 32, 9, NULL, NULL),
(33, 33, 9, NULL, NULL),
(34, 34, 9, NULL, NULL),
(35, 35, 9, NULL, NULL),
(36, 36, 9, NULL, NULL),
(37, 37, 9, NULL, NULL),
(38, 38, 9, NULL, NULL),
(39, 39, 9, NULL, NULL),
(40, 1, 10, NULL, NULL),
(41, 2, 10, NULL, NULL),
(42, 3, 10, NULL, NULL),
(43, 4, 10, NULL, NULL),
(44, 5, 10, NULL, NULL),
(45, 6, 10, NULL, NULL),
(46, 7, 10, NULL, NULL),
(47, 8, 10, NULL, NULL),
(48, 9, 10, NULL, NULL),
(49, 10, 10, NULL, NULL),
(50, 11, 10, NULL, NULL),
(51, 12, 10, NULL, NULL),
(52, 13, 10, NULL, NULL),
(53, 14, 10, NULL, NULL),
(54, 15, 10, NULL, NULL),
(55, 16, 10, NULL, NULL),
(56, 17, 10, NULL, NULL),
(57, 18, 10, NULL, NULL),
(58, 19, 10, NULL, NULL),
(59, 20, 10, NULL, NULL),
(60, 21, 10, NULL, NULL),
(61, 22, 10, NULL, NULL),
(62, 23, 10, NULL, NULL),
(63, 24, 10, NULL, NULL),
(64, 25, 10, NULL, NULL),
(65, 26, 10, NULL, NULL),
(66, 27, 10, NULL, NULL),
(67, 28, 10, NULL, NULL),
(68, 29, 10, NULL, NULL),
(69, 30, 10, NULL, NULL),
(70, 31, 10, NULL, NULL),
(71, 32, 10, NULL, NULL),
(72, 33, 10, NULL, NULL),
(73, 34, 10, NULL, NULL),
(74, 35, 10, NULL, NULL),
(75, 36, 10, NULL, NULL),
(76, 37, 10, NULL, NULL),
(77, 38, 10, NULL, NULL),
(78, 39, 10, NULL, NULL),
(79, 1, 11, NULL, NULL),
(80, 2, 11, NULL, NULL),
(81, 3, 11, NULL, NULL),
(82, 4, 11, NULL, NULL),
(83, 5, 11, NULL, NULL),
(84, 6, 11, NULL, NULL),
(85, 7, 11, NULL, NULL),
(86, 8, 11, NULL, NULL),
(87, 9, 11, NULL, NULL),
(88, 10, 11, NULL, NULL),
(89, 11, 11, NULL, NULL),
(90, 12, 11, NULL, NULL),
(91, 13, 11, NULL, NULL),
(92, 14, 11, NULL, NULL),
(93, 15, 11, NULL, NULL),
(94, 16, 11, NULL, NULL),
(95, 17, 11, NULL, NULL),
(96, 18, 11, NULL, NULL),
(97, 19, 11, NULL, NULL),
(98, 20, 11, NULL, NULL),
(99, 21, 11, NULL, NULL),
(100, 22, 11, NULL, NULL),
(101, 23, 11, NULL, NULL),
(102, 24, 11, NULL, NULL),
(103, 25, 11, NULL, NULL),
(104, 26, 11, NULL, NULL),
(105, 27, 11, NULL, NULL),
(106, 28, 11, NULL, NULL),
(107, 29, 11, NULL, NULL),
(108, 30, 11, NULL, NULL),
(109, 31, 11, NULL, NULL),
(110, 32, 11, NULL, NULL),
(111, 33, 11, NULL, NULL),
(112, 34, 11, NULL, NULL),
(113, 35, 11, NULL, NULL),
(114, 36, 11, NULL, NULL),
(115, 37, 11, NULL, NULL),
(116, 38, 11, NULL, NULL),
(117, 39, 11, NULL, NULL),
(118, 75, 9, NULL, NULL),
(119, 1, 12, NULL, NULL),
(120, 2, 12, NULL, NULL),
(121, 3, 12, NULL, NULL),
(122, 4, 12, NULL, NULL),
(123, 5, 12, NULL, NULL),
(124, 6, 12, NULL, NULL),
(125, 7, 12, NULL, NULL),
(126, 8, 12, NULL, NULL),
(127, 9, 12, NULL, NULL),
(128, 10, 12, NULL, NULL),
(129, 11, 12, NULL, NULL),
(130, 12, 12, NULL, NULL),
(131, 13, 12, NULL, NULL),
(132, 14, 12, NULL, NULL),
(133, 15, 12, NULL, NULL),
(134, 16, 12, NULL, NULL),
(135, 17, 12, NULL, NULL),
(136, 18, 12, NULL, NULL),
(137, 19, 12, NULL, NULL),
(138, 20, 12, NULL, NULL),
(139, 21, 12, NULL, NULL),
(140, 22, 12, NULL, NULL),
(141, 23, 12, NULL, NULL),
(142, 24, 12, NULL, NULL),
(143, 25, 12, NULL, NULL),
(144, 26, 12, NULL, NULL),
(145, 27, 12, NULL, NULL),
(146, 28, 12, NULL, NULL),
(147, 29, 12, NULL, NULL),
(148, 30, 12, NULL, NULL),
(149, 31, 12, NULL, NULL),
(150, 32, 12, NULL, NULL),
(151, 33, 12, NULL, NULL),
(152, 34, 12, NULL, NULL),
(153, 35, 12, NULL, NULL),
(154, 36, 12, NULL, NULL),
(155, 37, 12, NULL, NULL),
(156, 38, 12, NULL, NULL),
(157, 39, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Amelia Fitri', 'amel12@gmail.com', '$2y$12$IKP81ZwfQnrFjda4U916c..2sCZb0tXb19OGRgySBvLX.gXz4eSx.', '2026-05-03 22:46:17', '2026-05-03 22:46:17'),
(5, 'Amelia Fitri', 'amalialavancha@gmail.com', '$2y$12$bVloYc6YqfWjamPNkXxhG.1aMVhQ.K5UPz1Mspp7CZOAX0VhZ8DVW', '2026-05-23 00:25:03', '2026-08-02 09:08:09'),
(8, 'amelia', 'amel123@gmail.com', '$2y$12$DEV8pzj.zDelLQLVHwYYju05FQ/kFyebIUSQaOrk3opnLTPFqT1pG', '2026-05-30 23:30:58', '2026-05-30 23:30:58'),
(11, 'Elita', 'elitaputri@gmail.com', '$2y$12$ut9En0cI73Rjzr/FgcVd1ecS8Y3pi8KvTQktBblPhruWORLnVP7hK', '2026-05-30 23:37:50', '2026-05-30 23:37:50'),
(12, 'Elita', 'elitaputri1@gmail.com', '$2y$12$gh7i5wtF7X/Acva8pbwWE.gkRG0G/UnaIFg.I4crGxNDPpFYItEFC', '2026-05-30 23:47:16', '2026-05-30 23:47:16'),
(13, 'gita', 'gita123@gmial.com', '$2y$12$Ukn/4vbV9J9N3q3kU0vKLepOj2CtTmgCQIXNObtHrsEIn61QdORZO', '2026-05-30 23:52:15', '2026-05-30 23:52:15'),
(14, 'gita', 'gita123@gmail.com', '$2y$12$uCOHFmF4KIRCkdgzVaypPuYcFuvx1iSgmJuvSQjGGj7AFnE4QDW.2', '2026-05-30 23:52:45', '2026-05-30 23:52:45'),
(15, 'Budi', 'budi123@gmail.com', '$2y$12$cgjPpgUAB5p/SUK1CFWJ7umkjtxm2SHcU4favubql3NtgUPf4K3eq', '2026-06-22 09:24:22', '2026-06-22 09:24:22'),
(16, 'Siti', 'Siti18@gmail.com', '$2y$12$kZBIlDR.Z8xI9gHKRWT1jOY8J72ZzzN1fPHSb0ESKiEMe0Dh0fXxK', '2026-06-23 18:07:16', '2026-06-23 18:07:16'),
(18, 'Gita', 'gitalavancha18@gmail.com', '$2y$12$2yjpYzOvGvSWp5HqlqwdduWNpZNLjkXe04T2/JfaCaP/cy5jx58kW', '2026-06-25 09:14:15', '2026-06-25 16:31:07'),
(19, 'Gita', 'gita18@gmail.com', '$2y$12$FoE4VOZME7TDUdDhXb1N0uzzaozACuj2C4iLZS8cFo9r2e14R9fEW', '2026-06-26 07:02:53', '2026-06-26 07:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_otps`
--

CREATE TABLE `password_reset_otps` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_otps`
--

INSERT INTO `password_reset_otps` (`id`, `email`, `otp`, `password`, `expired_at`, `created_at`, `updated_at`) VALUES
(5, 'Siti18@gmail.com', '778158', '12345678', '2026-06-25 16:37:19', '2026-06-25 16:32:19', '2026-06-25 16:32:19'),
(7, 'amel123@gmail.com', '238776', '12345678', '2026-06-26 06:21:15', '2026-06-26 06:16:15', '2026-06-26 06:16:15'),
(8, 'gita18@gmail.com', '731444', '12345678', '2026-06-26 07:18:12', '2026-06-26 07:13:12', '2026-06-26 07:13:12'),
(11, 'amalialavancha@gmail.com', '326860', '12345678', '2026-08-02 11:20:02', '2026-08-02 11:15:02', '2026-08-02 11:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `status_presensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_id` bigint UNSIGNED DEFAULT NULL,
  `is_password_changed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nama`, `npm`, `email`, `password`, `class_id`, `status_presensi`, `created_at`, `updated_at`, `dosen_id`, `is_password_changed`) VALUES
(1, 'ALIFYA HARSYARANI', '10122134', '10122134@student.ac.id', '$2y$12$yC4rOfaorKlbdDRizQsq.e/ky597FdL42Re/lcl3/Zn0FBZaVSPuW', 7, NULL, '2026-05-03 22:47:30', '2026-06-22 16:47:09', NULL, 0),
(2, 'AMARA LUTHFI VANNESA', '10122148', '10122148@student.ac.id', '$2y$12$drnDzKg3ZZx1nTeekGWSQ.ChwFasprGxNUs.gpQvyfmko9S1aqAjG', 7, NULL, '2026-05-03 22:47:30', '2026-06-22 16:47:09', NULL, 0),
(3, 'AMELIA FITRI GITALAVANCHA', '10122150', '10122150@student.ac.id', '$2y$12$zSigRq2BzwkMfh.EVoBU3.5t8bat99zvIUYxM7tWFvgTCLvJmBdKq', 7, NULL, '2026-05-03 22:47:31', '2026-06-22 16:49:23', NULL, 1),
(4, 'ANGGER RIZKY RAMBUDIA', '10122180', '10122180@student.ac.id', '$2y$12$XeIuNLBEUH3.MG9PgnhDT.DUY92aA6gQV49MwdNPnmOSWPXWfehZu', 7, NULL, '2026-05-03 22:47:31', '2026-06-24 03:18:54', NULL, 1),
(5, 'ANNISA DWI PANGESTU', '10122189', '10122189@student.ac.id', '$2y$12$hUlTmjJ2lUGa/iT4DAJ2UuuqCol4.FY5.1AicqM5f72WPd2doHM06', 7, NULL, '2026-05-03 22:47:31', '2026-06-22 16:47:09', NULL, 0),
(6, 'ANNISA NURUL ASRI', '10122193', '10122193@student.ac.id', '$2y$12$VFpaMyTellf0SOi80gsip.6d5ha1se9eexwbwltiTe5TIv9ywKFFK', 7, NULL, '2026-05-03 22:47:32', '2026-06-22 16:47:09', NULL, 0),
(7, 'ARRAHMAN AKMAL', '10122223', '10122223@student.ac.id', '$2y$12$PDMjPOndC.RCKZzwAl3AaeQha/UGGgRRrRCYz7RMTNGxD6l1XtExG', 7, NULL, '2026-05-03 22:47:32', '2026-06-22 16:47:09', NULL, 0),
(8, 'AUREL FEYBILYA SIMAMORA', '10122245', '10122245@student.ac.id', '$2y$12$xXx/AnZAVpQs4K3ugdlg6OhOc02KlJaBx34hhiRBXcGdLS5eybC8.', 7, NULL, '2026-05-03 22:47:33', '2026-06-22 16:47:09', NULL, 0),
(9, 'AZZAHRA DANIA INDRIYANI', '10122259', '10122259@student.ac.id', '$2y$12$itS5LM.L6rp6xU.OoP/9KOLlwjbvNdNQQI56T8/VBgJlNiHdczb7q', 7, NULL, '2026-05-03 22:47:33', '2026-06-22 16:47:09', NULL, 0),
(10, 'DANTY ZAHRA NADHIRA', '10122329', '10122329@student.ac.id', '$2y$12$0GAjbBKmt9enbQNA5lOYB.tcAPJrL1M.Qyr5URg3yHB5DoxHlXhMy', 7, NULL, '2026-05-03 22:47:33', '2026-06-22 16:47:09', NULL, 0),
(11, 'DEFANIA ADESTI', '10122342', '10122342@student.ac.id', '$2y$12$WuvS5tJZ..hsRpPsH5KK4OYswyLyNOQfjY2djzap3w/0D/4IwJ2k.', 7, NULL, '2026-05-03 22:47:34', '2026-06-22 16:47:09', NULL, 0),
(12, 'DELLIA PUTRI SANTOSO', '10122347', '10122347@student.ac.id', '$2y$12$E9bDkUXsAkkuCHwvyjvNUuD7pcc6bj2sP1ljjlgY7ROiPmp82Eema', 7, NULL, '2026-05-03 22:47:34', '2026-06-22 16:47:09', NULL, 0),
(13, 'DESVITA DAMAYANTI', '10122357', '10122357@student.ac.id', '$2y$12$vTgtxjTwymfrIMlACWLPz.tX29LiX/AGBKXebkAVMtwzb1/L5NCVm', 7, NULL, '2026-05-03 22:47:34', '2026-06-22 16:47:09', NULL, 0),
(14, 'DIMAS NAUFAL HERMAWAN', '10122387', '10122387@student.ac.id', '$2y$12$dJdrRQA/oq433KR2F4.emOU1LYT/Mev7p86gxPqJpltflbbS6P68G', 7, NULL, '2026-05-03 22:47:35', '2026-06-22 16:47:09', NULL, 0),
(15, 'DINDA RIFKA TIAS NOVANSA', '10122398', '10122398@student.ac.id', '$2y$12$UGCq6vxS7.g4ctGpIEDsfueyp1WRmAmpqOHr1JhFyLAuqkmEmpzh.', 7, NULL, '2026-05-03 22:47:35', '2026-06-22 16:47:09', NULL, 0),
(16, 'DWIKI DIANDRA PUTRA', '10122407', '10122407@student.ac.id', '$2y$12$wyMNM7bzKfOgJG7fIK2ABOLAM571UAkjsc85Ezcb6J.GXEO8i47ta', 7, NULL, '2026-05-03 22:47:36', '2026-06-22 16:47:09', NULL, 0),
(17, 'FAUZAN DIFA', '10122484', '10122484@student.ac.id', '$2y$12$nQcJwzszpe/zIMlfXh7YTe3lQuzFMHVcGNuIIv6QN2WDevOuUzmLa', 7, NULL, '2026-05-03 22:47:36', '2026-06-22 16:47:09', NULL, 0),
(18, 'GHANI AGRAPRANA', '10122543', '10122543@student.ac.id', '$2y$12$NVRSJHRYRsbOBcdzl0RWCuMzIW1JrHipWsB9urpwZZrth7cdNNHGS', 7, NULL, '2026-05-03 22:47:36', '2026-06-22 16:47:09', NULL, 0),
(19, 'HERU MUZAKI ALPIAN', '10122595', '10122595@student.ac.id', '$2y$12$4gT/3jbAlojf/yQIO/b/xe7hKuL0iwdTFNKmsI2DeOhKperKJRG/.', 7, NULL, '2026-05-03 22:47:37', '2026-06-22 16:47:09', NULL, 0),
(20, 'HUWAIDA ADILYA PUTRI', '10122606', '10122606@student.ac.id', '$2y$12$Qnf.0nbkKxbVKq6PBfUjt.blnrFk6t7Vinfg5rmg59W4.Je4q2z7a', 7, NULL, '2026-05-03 22:47:37', '2026-06-22 16:47:10', NULL, 0),
(21, 'KAYLAH AHLA HANINA', '10122675', '10122675@student.ac.id', '$2y$12$ajiZDXdJm3FFBV6v1.sgoujtjtgiNhrL5YAorsANi1zPYQcePdtrC', 7, NULL, '2026-05-03 22:47:37', '2026-06-22 16:47:10', NULL, 0),
(22, 'MIFTA RIZALDIRAHMAT', '10122764', '10122764@student.ac.id', '$2y$12$yE7TOosTiGsy4qSZnYPBuOaKQ1xPndt8u2tPoF6CfjekWvWzwssmy', 7, NULL, '2026-05-03 22:47:38', '2026-06-22 16:47:10', NULL, 0),
(23, 'MOCH HARIS SAPUTRA', '10122767', '10122767@student.ac.id', '$2y$12$fyewyeVBwGkxr6RPwUZASOvLvTfqJZB4SHD2HKWDSXLxFGQlaf7.S', 7, NULL, '2026-05-03 22:47:38', '2026-06-22 16:47:10', NULL, 0),
(24, 'MUHAMMAD ALIF AL GHIFARI', '10122837', '10122837@student.ac.id', '$2y$12$VdWOT8oxXjTRzVwL4cSfteR0fHFDMhuHVQL5xifpdjw/9O1TnAnlS', 7, NULL, '2026-05-03 22:47:39', '2026-06-22 16:47:10', NULL, 0),
(25, 'MUHAMMAD AMMAR ARIEF', '10122845', '10122845@student.ac.id', '$2y$12$iv3OkyMub2vob6HvWzh4e.M9HdaHRQkjYg6gGh8UdDJD9tNiTYvQa', 7, NULL, '2026-05-03 22:47:39', '2026-06-22 16:47:10', NULL, 0),
(26, 'MUHAMMAD DAFFA RAJENDRA', '10122867', '10122867@student.ac.id', '$2y$12$4aTGVVij555ai0k2tSbi/OYuIs.3TUIKuUlkOAtH0b5PI3v8tkbfa', 7, NULL, '2026-05-03 22:47:39', '2026-06-22 16:47:10', NULL, 0),
(27, 'MUHAMMAD FAJAR FEBRIAN', '10122898', '10122898@student.ac.id', '$2y$12$rZDeubUDMBoQGWhQ/KXgUuaqRKDTXg6xx0epQj7NWhlLC./7UdjsS', 7, NULL, '2026-05-03 22:47:40', '2026-06-22 16:47:10', NULL, 0),
(28, 'MUHAMMAD NAUFAL HILMY', '10122951', '10122951@student.ac.id', '$2y$12$MLrfKmag1gleQttpWhzhYu69xMD9JZHXxjUlD2jv7S0eremNv/c5q', 7, NULL, '2026-05-03 22:47:40', '2026-06-22 16:47:10', NULL, 0),
(29, 'MUHAMMAD RYO SETIAWAN', '10122995', '10122995@student.ac.id', '$2y$12$DylRM./b.stuk3..ebhmM.qlKUGz4I4Dac.9/r8VWCIUBsstmGjnS', 7, NULL, '2026-05-03 22:47:40', '2026-06-22 16:47:10', NULL, 0),
(30, 'NAUFAL AMRU', '11122064', '11122064@student.ac.id', '$2y$12$Iti7BTHA2Nyno/FncR5Lvu.YJuhkd2BlmFn6m9s3J94mg/v3LL3iu', 7, NULL, '2026-05-03 22:47:41', '2026-06-22 16:47:10', NULL, 0),
(31, 'NISRINA SYIFA', '11122084', '11122084@student.ac.id', '$2y$12$cCs2K1/11O8UQMLn9jwttOBIECPV9mvtV2yZLQAG5aGMVghrRANI2', 7, NULL, '2026-05-03 22:47:41', '2026-06-22 16:47:10', NULL, 0),
(32, 'NOOR SYIVA SYAKIRA WAHDANIE', '11122086', '11122086@student.ac.id', '$2y$12$K3UZ2OodkYzv1rBH2aHaoexaeBwiP1Jqq4Rtx/HgeLp4z2XZWFGwq', 7, NULL, '2026-05-03 22:47:42', '2026-06-22 16:47:10', NULL, 0),
(33, 'RAKHA ADITISNA KUMARA', '11122192', '11122192@student.ac.id', '$2y$12$eyVCvQ0T8m6/j2ttx42YiOFIIzq8/2cpIXuhUKow6RGqCpHnmv3d6', 7, NULL, '2026-05-03 22:47:42', '2026-06-22 16:47:10', NULL, 0),
(34, 'RIZKY RAMDHANI KOSWARA', '11122300', '11122300@student.ac.id', '$2y$12$aVgb97mIfpnP..Z/CCi8p.TDMmvKeAkT4g.6ZBshjOB9kvqT9VKeW', 7, NULL, '2026-05-03 22:47:43', '2026-06-22 16:47:10', NULL, 0),
(35, 'ROSA LINDA SALSABILA', '11122313', '11122313@student.ac.id', '$2y$12$bb79TWQFTYJ0SK0edbFsjObx0skKfVZhw9hrQPmtKsZVjBzOlbTIi', 7, NULL, '2026-05-03 22:47:43', '2026-06-22 16:47:10', NULL, 0),
(36, 'SABRINA NAJWA APRILIANTI', '11122325', '11122325@student.ac.id', '$2y$12$vmsyRCKiMp5bUzI5kkG.tuk.zt/Fegi.xcfBxOf6b0RL0nC.FBwvS', 7, NULL, '2026-05-03 22:47:43', '2026-06-22 16:47:10', NULL, 0),
(37, 'STEFY RUSLANDA', '11122395', '11122395@student.ac.id', '$2y$12$mivsSlVVNF6sovfk8Aj/LuOdk0sZTf8zbQTJSjlpFRVnFcSj2k7CC', 7, NULL, '2026-05-03 22:47:44', '2026-06-22 16:47:10', NULL, 0),
(38, 'TRI ANGGORO SAPUTRI', '11122441', '11122441@student.ac.id', '$2y$12$6x.mkPJW3whkDdu/QOc49uYLGNV.0h3Khd9c7qMCuRz2GAiqXCb8K', 7, NULL, '2026-05-03 22:47:44', '2026-06-22 16:47:10', NULL, 0),
(39, 'ZULFAN NURBEKTI', '11122518', '11122518@student.ac.id', '$2y$12$fSDZOgRO1uP9tEn1rCXhYO.msCGGnCAgJhEtfhIIV/Eq03i9fms2m', 7, NULL, '2026-05-03 22:47:45', '2026-06-22 16:47:10', NULL, 0),
(41, 'ABRAR RIZKY AZALI', '10125007', '10125007@student.ac.id', '$2y$12$E9ZlFGTyFkRVh8sHxBKqROf3S8L77Sl8NOnGT23mhS0QRojKOi48y', 5, NULL, '2026-05-31 00:58:37', '2026-06-02 00:26:08', NULL, 0),
(42, 'ADE MAISYAH RIMA', '10125015', '10125015@student.ac.id', '$2y$12$Kjc808wswfaNv34a7OtFkOq2dnQMh0EX1CqlZpD3Qt2.MYtrU22XW', 5, NULL, '2026-05-31 00:58:38', '2026-06-02 00:26:09', NULL, 0),
(43, 'ALDIKA FARID HAKIM LUBIS', '10125059', '10125059@student.ac.id', '$2y$12$d6qFPJWrQsm/L3XAK6jpm.Vp6gEVaDX1R0m17gLscwHEQLxpBrOoW', 5, NULL, '2026-05-31 00:58:38', '2026-06-02 00:26:09', NULL, 0),
(44, 'AMIRA MUTHIA NAJLA', '10125099', '10125099@student.ac.id', '$2y$12$eCmduTSHq4Nm5yQAfQkJd.9DTdTkBNIHFgH2pHoMxFSdLbtVilhk6', 5, NULL, '2026-05-31 00:58:39', '2026-06-02 00:26:09', NULL, 0),
(45, 'ANANDA DENDI FIRRIZQI', '10125105', '10125105@student.ac.id', '$2y$12$gH5IvSuUOHKYMwWQRoZ7S.tKYqmNQ74YTJXa0PKJCkhLzNa7jB6d2', 5, NULL, '2026-05-31 00:58:39', '2026-06-02 00:26:09', NULL, 0),
(46, 'ARYA BINTANG PRAKASA YAHYA', '10125150', '10125150@student.ac.id', '$2y$12$w23e2W.KqPyZep1VPmTIe.h6IHl5k3lBfBAulVWJUAdmgTY9aJenK', 5, NULL, '2026-05-31 00:58:40', '2026-06-02 00:26:09', NULL, 0),
(47, 'BAYU HERNAWAN', '10125188', '10125188@student.ac.id', '$2y$12$mac7OrYwsa4XPVRsueyKo.Xhj5dqalqs2buaGHwWuFHaev81wcnS2', 5, NULL, '2026-05-31 00:58:40', '2026-06-02 00:26:09', NULL, 0),
(48, 'CHANTIQYA TRY AYUNINGTIAS', '10125212', '10125212@student.ac.id', '$2y$12$iIM8EXSNh4mroqU1c7Fo3uoqOO2WWFZPOBK9T5gOWOSnaYqs7HPcG', 5, NULL, '2026-05-31 00:58:41', '2026-06-02 00:26:09', NULL, 0),
(49, 'DENASA RAFFIANDANA SARODJA', '10125240', '10125240@student.ac.id', '$2y$12$xnjcoGLITi39WrkxLQduUej6NZ5DcNRbEKLSuvBPmWvoJuVS68/8.', 5, NULL, '2026-05-31 00:58:41', '2026-06-02 00:26:09', NULL, 0),
(50, 'EGGY FIRMANSYAH', '10125289', '10125289@student.ac.id', '$2y$12$R2RaiIteV1y/Q.21Qx99T.o6USlLiyJIie7uXS1l75sibmTdK/f2y', 5, NULL, '2026-05-31 00:58:42', '2026-06-02 00:26:09', NULL, 0),
(51, 'FARRAS ARKAN', '10125334', '10125334@student.ac.id', '$2y$12$BgkzwDfjvnBzfJTMO0Yc6.cbjzUBhgHvB4fQ1TDyeqlqLeQddbwOi', 5, NULL, '2026-05-31 00:58:42', '2026-06-02 00:26:09', NULL, 0),
(52, 'FERDI FEBRYAN', '10125364', '10125364@student.ac.id', '$2y$12$zA6siB765mRf6fDNk5W9.uKcZvRyEbeHmleDbDkXDrLKfMuHnvGmS', 5, NULL, '2026-05-31 00:58:43', '2026-06-02 00:26:10', NULL, 0),
(53, 'FIRNA ADELYA', '10125369', '10125369@student.ac.id', '$2y$12$/VqyI.Br/acvw4WUWrr1CuXbGOWGlBiMujRqwERpzP2m5Qep3t3SC', 5, NULL, '2026-05-31 00:58:44', '2026-06-02 00:26:10', NULL, 0),
(54, 'HAIKAL GUSTAF', '10125402', '10125402@student.ac.id', '$2y$12$8yR4XPS1cxU/fqUcfV8KBurik9J5m.VMeGbgI6jRIW4yRfCwpA4RC', 5, NULL, '2026-05-31 00:58:44', '2026-06-02 00:26:10', NULL, 0),
(55, 'JUAN ARCHIE DENGAH', '10125457', '10125457@student.ac.id', '$2y$12$QeeHGZgO5cl9XefTjkYPtud6yFWNybdbZUU8gXA/W1iwWCtLdw9S2', 5, NULL, '2026-05-31 00:58:45', '2026-06-02 00:26:10', NULL, 0),
(56, 'KIRANA PUTRI KUSMAWAN', '10125482', '10125482@student.ac.id', '$2y$12$/rBZToh203Ie5GfbpW.Nou89HeeJlyLPHNsXbRa/1OXu0BEqcTz1G', 5, NULL, '2026-05-31 00:58:45', '2026-06-02 00:26:10', NULL, 0),
(57, 'MAULANA DHAVIARSYA', '10125518', '10125518@student.ac.id', '$2y$12$lXuMlo/g0bgda687pRhXpeowk/V1KDTPcjYY3YtWGYGPclAtgfurW', 5, NULL, '2026-05-31 00:58:46', '2026-06-02 00:26:10', NULL, 0),
(58, 'MOHAMMAD RAIHAN SYARIEF PUTRA', '11125132', '11125132@student.ac.id', '$2y$12$ePjR6CnwSXEsZSNH5SIRkev2oDCi86pE9a9cncH6SJSdBDDdSa7sO', 5, NULL, '2026-05-31 00:58:46', '2026-06-02 00:26:10', NULL, 0),
(59, 'MUHAMAD ALBI SAPTADI', '10125559', '10125559@student.ac.id', '$2y$12$3e27OUVdvyh0xMgKBWqtvuek37mnSUAy9CAumccGBcVX3mB0pkjkO', 5, NULL, '2026-05-31 00:58:47', '2026-06-02 00:26:10', NULL, 0),
(60, 'MUHAMMAD ABYAN ALFAYYAZ', '10125587', '10125587@student.ac.id', '$2y$12$SGCt1JYfrpEA14DIZLupROvaP55DnCzB0sj56NC.5uvnadUdt7946', 5, NULL, '2026-05-31 00:58:47', '2026-06-02 00:26:10', NULL, 0),
(61, 'MUHAMMAD DAFFA FADILLAH', '10125612', '10125612@student.ac.id', '$2y$12$IFDWuX5k5aB.Yd6wm2XDuevmR.snApO2c61OZAvrT7o3BXyg1x7aC', 5, NULL, '2026-05-31 00:58:48', '2026-06-02 00:26:10', NULL, 0),
(62, 'MUHAMMAD FAUZAN RAAFI', '10125648', '10125648@student.ac.id', '$2y$12$sN/pOS9q2l6HjKuqYP9ENOb1vbk/hbNTUeBNBhO.IhZymnX86pJei', 5, NULL, '2026-05-31 00:58:48', '2026-06-02 00:26:10', NULL, 0),
(63, 'MUHAMMAD PRATAMA HADIYANTO', '10125692', '10125692@student.ac.id', '$2y$12$2hbJr/Rc7FLwjsRpz5RwhOOgt0dpLe4n8kF.g4zAQnPCPkm5aS/f2', 5, NULL, '2026-05-31 00:58:49', '2026-06-02 00:26:10', NULL, 0),
(64, 'MUHAMMAD RIDHO FALAH', '10125719', '10125719@student.ac.id', '$2y$12$E6r0EPStHznC45B58s0uM.CqBuZzyqm/xI0dfwR1vojOs.srXiMO2', 5, NULL, '2026-05-31 00:58:49', '2026-06-02 00:26:10', NULL, 0),
(65, 'MUHAMMAD ZAKKI FADHILAH', '10125744', '10125744@student.ac.id', '$2y$12$tqeD41mZp9iVcgzH.TobCemn2dFJjXjYGClKf7ntjUKLHBWGZlIFC', 5, NULL, '2026-05-31 00:58:50', '2026-06-02 00:26:10', NULL, 0),
(66, 'NAILA ZAHRA SURYANA', '10125777', '10125777@student.ac.id', '$2y$12$RdCcovOgYUnLTLCVJI8GcOGXhD9ZiOhpRhP0HE.sEds5wr0S/IoTO', 5, NULL, '2026-05-31 00:58:50', '2026-06-02 00:26:10', NULL, 0),
(67, 'NURHASAN AL HUDA', '10125831', '10125831@student.ac.id', '$2y$12$FfW9bOamg9fRoMOedkSXbuoevI0Q0HVLNOgsXBuI6S772YC3hmnDG', 5, NULL, '2026-05-31 00:58:51', '2026-06-02 00:26:10', NULL, 0),
(68, 'RAFI AFFANSYAH PANJAITAN', '10125876', '10125876@student.ac.id', '$2y$12$XEcmZDWPYN7RfwzYjdTLRO4tH3Qi/2VXbJhWMm3UAv8xR5FYj85rq', 5, NULL, '2026-05-31 00:58:51', '2026-06-02 00:26:10', NULL, 0),
(69, 'RASYA KAKA RAMADHAN', '10125919', '10125919@student.ac.id', '$2y$12$hObKKLkK6M9l9FONqOSOm.VrKcMd.ZKvcOh28dd7uzSz7I4bbBXvq', 5, NULL, '2026-05-31 00:58:52', '2026-06-02 00:26:10', NULL, 0),
(70, 'REVA RAHMADANI', '10125944', '10125944@student.ac.id', '$2y$12$QNYlUsv0gYBc9kE45vGHYOt686wZwUWrecBCplqkER5UisTsDiqGG', 5, NULL, '2026-05-31 00:58:52', '2026-06-02 00:26:10', NULL, 0),
(71, 'RIF\'AT AHMAD SADEWA', '10125962', '10125962@student.ac.id', '$2y$12$MoA.30k7iEnRjF8ReOuIa.qjfy5R1tqmDMAfhHUI24WHXLFyK1GgC', 5, NULL, '2026-05-31 00:58:53', '2026-06-02 00:26:10', NULL, 0),
(72, 'SADAM MAULANA', '10125995', '10125995@student.ac.id', '$2y$12$Iyeyy/Y818Uh1cAjQGqduOrm2QlLMHMyrYVVNXfy4BBOjcdiS3WAe', 5, NULL, '2026-05-31 00:58:53', '2026-06-02 00:26:10', NULL, 0),
(73, 'SYAHLA FAHRIYYAH SANJAYA', '11125058', '11125058@student.ac.id', '$2y$12$3/ViU1TJDcRCaq0lDvEZf.a6ve9ikF/G/QSQ6sOHdJiZxVTHRVlNm', 5, NULL, '2026-05-31 00:58:54', '2026-06-02 00:26:10', NULL, 0),
(74, 'TEGAR ARKHANUL HAYDEN', '11125073', '11125073@student.ac.id', '$2y$12$IY.4Nt9Ad2CDOWMToowQEua/XWwJ2InnxOm.oj/4Ecw.wd.YluSbK', 5, NULL, '2026-05-31 00:58:54', '2026-06-02 00:26:10', NULL, 0),
(75, 'Nadira', '10123456', '10123456@student.ac.id', '$2y$12$.t/mQrDC69f7tTZ9LBpFI.zO8Km0kxXNiyQJUUa4aS9yDMj6PdYK6', 6, NULL, '2026-06-22 15:26:04', '2026-06-22 15:26:04', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_student_student_id_foreign` (`student_id`),
  ADD KEY `class_student_class_id_foreign` (`class_id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_email_unique` (`email`);

--
-- Indexes for table `password_reset_otps`
--
ALTER TABLE `password_reset_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_npm_unique` (`npm`),
  ADD KEY `students_dosen_id_foreign` (`dosen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_reset_otps`
--
ALTER TABLE `password_reset_otps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
