-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 19, 2022 at 04:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigs_mn_packaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MN Packaging',
  `app_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://gigsoft.net',
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mailhog',
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1025',
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hello@example.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `quantity`, `image`, `quality`) VALUES
(1, 1, 1, '2022-10-24 05:25:45', '2022-10-30 23:17:33', 'Table', 13, 'asset/TlCG2TPLqciT8HziezS1aXKPnVXoguSboCMeWI0f.jpg', 'Good'),
(2, 1, 1, '2022-10-24 05:26:40', '2022-10-30 23:17:20', 'Chair', 10, 'asset/UWrgL3PNystpFHklrqJkJEGJPGoGTazBadkUvu05.jpg', 'Bad'),
(3, 1, 1, '2022-10-30 23:16:54', '2022-10-30 23:16:54', 'laptop', 5, 'asset/N5nSXKR3RbeKYQYl8sy4fBw9C5ZzxS2HmJk8Eae2.png', 'Good'),
(4, 1, 1, '2022-10-30 23:18:30', '2022-10-30 23:18:30', 'Printer', 1, 'asset/USYx41syw0LgzybehhBpNG5fP1vN2N225XSqpkuk.jpg', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attendance` tinyint(4) DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `employee_id`, `name`, `attendance`, `date`) VALUES
(10, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 1, 'tanvir ahmed Remon', 1, '2022-10-27'),
(11, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 2, 'Zahirul Islam', 1, '2022-10-27'),
(12, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 3, 'Shahidul Islam Antor', 1, '2022-10-27'),
(13, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 4, 'Shariar Islam', 1, '2022-10-27'),
(14, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 5, 'Robin', 1, '2022-10-27'),
(15, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 6, 'shakib', 1, '2022-10-27'),
(16, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 7, 'shahadat hossain', 1, '2022-10-27'),
(17, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 8, 'Abdullah Al Mamun', 0, '2022-10-27'),
(18, 1, 1, '2022-10-29 06:41:28', '2022-10-29 06:41:28', 9, 'Aman vai', 1, '2022-10-27'),
(19, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 1, 'tanvir ahmed Remon', 1, '2022-10-28'),
(20, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 2, 'Zahirul Islam', 0, '2022-10-28'),
(21, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 3, 'Shahidul Islam Antor', 1, '2022-10-28'),
(22, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 4, 'Shariar Islam', 1, '2022-10-28'),
(23, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 5, 'Robin', 0, '2022-10-28'),
(24, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 6, 'shakib', 0, '2022-10-28'),
(25, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 7, 'shahadat hossain', 0, '2022-10-28'),
(26, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 8, 'Abdullah Al Mamun', 0, '2022-10-28'),
(27, 1, 1, '2022-10-29 07:56:30', '2022-10-29 07:56:30', 9, 'Aman vai', 0, '2022-10-28'),
(28, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 1, 'tanvir ahmed Remon', 0, '2022-10-26'),
(29, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 2, 'Zahirul Islam', 1, '2022-10-26'),
(30, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 3, 'Shahidul Islam Antor', 1, '2022-10-26'),
(31, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 4, 'Shariar Islam', 1, '2022-10-26'),
(32, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 5, 'Robin', 1, '2022-10-26'),
(33, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 6, 'shakib', 1, '2022-10-26'),
(34, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 7, 'shahadat hossain', 1, '2022-10-26'),
(35, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 8, 'Abdullah Al Mamun', 1, '2022-10-26'),
(36, 1, 1, '2022-10-29 07:59:34', '2022-10-29 07:59:34', 9, 'Aman vai', 1, '2022-10-26'),
(37, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 1, 'tanvir ahmed Remon', 1, '2022-10-25'),
(38, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 2, 'Zahirul Islam', 1, '2022-10-25'),
(39, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 3, 'Shahidul Islam Antor', 1, '2022-10-25'),
(40, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 4, 'Shariar Islam', 1, '2022-10-25'),
(41, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 5, 'Robin', 1, '2022-10-25'),
(42, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 6, 'shakib', 0, '2022-10-25'),
(43, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 7, 'shahadat hossain', 1, '2022-10-25'),
(44, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 8, 'Abdullah Al Mamun', 0, '2022-10-25'),
(45, 1, 1, '2022-10-29 10:54:38', '2022-10-29 10:54:38', 9, 'Aman vai', 1, '2022-10-25'),
(46, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 1, 'tanvir ahmed Remon', 1, '2022-10-27'),
(47, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 2, 'Zahirul Islam', 1, '2022-10-27'),
(48, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 3, 'Shahidul Islam Antor', 1, '2022-10-27'),
(49, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 4, 'Shariar Islam', 1, '2022-10-27'),
(50, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 5, 'Robin', 1, '2022-10-27'),
(51, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 6, 'shakib', 1, '2022-10-27'),
(52, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 7, 'shahadat hossain', 0, '2022-10-27'),
(53, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 8, 'Abdullah Al Mamun', 1, '2022-10-27'),
(54, 1, 1, '2022-10-29 11:25:44', '2022-10-29 11:25:44', 9, 'Aman vai', 1, '2022-10-27'),
(55, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 1, 'tanvir ahmed Remon', 1, '2022-10-30'),
(56, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 2, 'Zahirul Islam', 1, '2022-10-30'),
(57, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 3, 'Shahidul Islam Antor', 1, '2022-10-30'),
(58, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 4, 'Shariar Islam', 1, '2022-10-30'),
(59, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 5, 'Robin', 1, '2022-10-30'),
(60, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 6, 'shakib', 1, '2022-10-30'),
(61, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 7, 'shahadat hossain', 1, '2022-10-30'),
(62, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 8, 'Abdullah Al Mamun', 0, '2022-10-30'),
(63, 1, 1, '2022-10-30 04:57:29', '2022-10-30 04:57:29', 9, 'Aman vai', 1, '2022-10-30'),
(64, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 1, 'tanvir ahmed Remon', 1, '2022-10-29'),
(65, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 2, 'Zahirul Islam', 1, '2022-10-29'),
(66, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 3, 'Shahidul Islam Antor', 1, '2022-10-29'),
(67, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 4, 'Shariar Islam', 1, '2022-10-29'),
(68, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 5, 'Robin', 1, '2022-10-29'),
(69, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 6, 'shakib', 1, '2022-10-29'),
(70, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 7, 'shahadat hossain', 1, '2022-10-29'),
(71, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 8, 'Abdullah Al Mamun', 0, '2022-10-29'),
(72, 1, 1, '2022-10-30 04:59:50', '2022-10-30 04:59:50', 9, 'Aman vai', 1, '2022-10-29'),
(73, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 1, 'tanvir ahmed Remon', 1, '2022-10-31'),
(74, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 2, 'Zahirul Islam', 1, '2022-10-31'),
(75, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 3, 'Shahidul Islam Antor', 1, '2022-10-31'),
(76, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 4, 'Shariar Islam', 1, '2022-10-31'),
(77, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 5, 'Robin', 1, '2022-10-31'),
(78, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 6, 'shakib', 1, '2022-10-31'),
(79, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 7, 'shahadat hossain', 1, '2022-10-31'),
(80, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 8, 'Abdullah Al Mamun', 0, '2022-10-31'),
(81, 1, 1, '2022-10-31 05:32:22', '2022-10-31 05:32:22', 9, 'Aman vai', 1, '2022-10-31'),
(100, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 1, 'tanvir ahmed Remon', 1, '2022-11-01'),
(101, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 2, 'Zahirul Islam', 0, '2022-11-01'),
(102, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 3, 'Shahidul Islam Antor', 1, '2022-11-01'),
(103, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 4, 'Shariar Islam', 1, '2022-11-01'),
(104, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 5, 'Robin', 1, '2022-11-01'),
(105, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 6, 'shakib', 1, '2022-11-01'),
(106, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 7, 'shahadat hossain', 1, '2022-11-01'),
(107, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 8, 'Abdullah Al Mamun', 0, '2022-11-01'),
(108, 1, 1, '2022-11-02 04:40:14', '2022-11-02 04:40:14', 9, 'Aman vai', 1, '2022-11-01'),
(109, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 1, 'tanvir ahmed Remon', 1, '2022-11-02'),
(110, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 2, 'Zahirul Islam', 1, '2022-11-02'),
(111, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 3, 'Shahidul Islam Antor', 1, '2022-11-02'),
(112, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 4, 'Shariar Islam', 1, '2022-11-02'),
(113, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 5, 'Robin', 0, '2022-11-02'),
(114, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 6, 'shakib', 1, '2022-11-02'),
(115, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 7, 'shahadat hossain', 1, '2022-11-02'),
(116, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 8, 'Abdullah Al Mamun', 0, '2022-11-02'),
(117, 1, 1, '2022-11-06 07:04:19', '2022-11-06 07:04:19', 9, 'Aman vai', 1, '2022-11-02'),
(118, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 1, 'tanvir ahmed Remon', 1, '2022-11-03'),
(119, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 2, 'Zahirul Islam', 1, '2022-11-03'),
(120, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 3, 'Shahidul Islam Antor', 1, '2022-11-03'),
(121, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 4, 'Shariar Islam', 1, '2022-11-03'),
(122, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 5, 'Robin', 0, '2022-11-03'),
(123, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 6, 'shakib', 0, '2022-11-03'),
(124, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 7, 'shahadat hossain', 1, '2022-11-03'),
(125, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 8, 'Abdullah Al Mamun', 0, '2022-11-03'),
(126, 1, 1, '2022-11-06 07:04:56', '2022-11-06 07:04:56', 9, 'Aman vai', 1, '2022-11-03'),
(127, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 1, 'tanvir ahmed Remon', 0, '2022-11-06'),
(128, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 2, 'Zahirul Islam', 1, '2022-11-06'),
(129, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 3, 'Shahidul Islam Antor', 0, '2022-11-06'),
(130, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 4, 'Shariar Islam', 0, '2022-11-06'),
(131, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 5, 'Robin', 1, '2022-11-06'),
(132, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 6, 'shakib', 1, '2022-11-06'),
(133, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 7, 'shahadat hossain', 1, '2022-11-06'),
(134, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 8, 'Abdullah Al Mamun', 0, '2022-11-06'),
(135, 1, 1, '2022-11-06 07:05:41', '2022-11-06 07:05:41', 9, 'Aman vai', 1, '2022-11-06'),
(136, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 1, 'tanvir ahmed Remon', 1, '2022-11-07'),
(137, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 2, 'Zahirul Islam', 1, '2022-11-07'),
(138, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 3, 'Shahidul Islam Antor', 1, '2022-11-07'),
(139, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 4, 'Shariar Islam', 1, '2022-11-07'),
(140, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 5, 'Robin', 1, '2022-11-07'),
(141, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 6, 'shakib', 1, '2022-11-07'),
(142, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 7, 'shahadat hossain', 1, '2022-11-07'),
(143, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 8, 'Abdullah Al Mamun', 0, '2022-11-07'),
(144, 1, 1, '2022-11-07 06:11:02', '2022-11-07 06:11:02', 9, 'Aman vai', 1, '2022-11-07'),
(145, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 1, 'Shariar Islam', 1, '2022-11-08'),
(146, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 2, 'tanvir ahmed Remon', 1, '2022-11-08'),
(147, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 3, 'Shahidul Islam Antor', 1, '2022-11-08'),
(148, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 4, 'Zahirul Islam', 1, '2022-11-08'),
(149, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 5, 'shakib', 1, '2022-11-08'),
(150, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 6, 'Robin', 1, '2022-11-08'),
(151, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 7, 'shahadat hossain', 1, '2022-11-08'),
(152, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 8, 'Aman vai', 1, '2022-11-08'),
(153, 1, 1, '2022-11-08 06:12:03', '2022-11-08 06:12:03', 9, 'Abdullah Al Mamun', 0, '2022-11-08'),
(154, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 1, 'Shariar Islam', 1, '2022-11-08'),
(155, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 2, 'tanvir ahmed Remon', 1, '2022-11-08'),
(156, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 3, 'Shahidul Islam Antor', 1, '2022-11-08'),
(157, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 4, 'Zahirul Islam', 1, '2022-11-08'),
(158, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 5, 'shakib', 0, '2022-11-08'),
(159, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 6, 'Robin', 0, '2022-11-08'),
(160, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 7, 'shahadat hossain', 0, '2022-11-08'),
(161, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 8, 'Aman vai', 0, '2022-11-08'),
(162, 1, 1, '2022-11-08 07:56:24', '2022-11-08 07:56:24', 9, 'Abdullah Al Mamun', 0, '2022-11-08'),
(163, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 1, 'Shariar Islam', 1, '2022-11-09'),
(164, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 2, 'tanvir ahmed Remon', 1, '2022-11-09'),
(165, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 3, 'Shahidul Islam Antor', 0, '2022-11-09'),
(166, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 4, 'shakib', 1, '2022-11-09'),
(167, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 5, 'Zahirul Islam', 1, '2022-11-09'),
(168, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 6, 'Robin', 1, '2022-11-09'),
(169, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 7, 'shahadat hossain', 1, '2022-11-09'),
(170, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 8, 'Aman vai', 1, '2022-11-09'),
(171, 1, 1, '2022-11-09 11:40:09', '2022-11-09 11:40:09', 9, 'Abdullah Al Mamun', 0, '2022-11-09'),
(172, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 1, 'Shariar Islam', 1, '2022-11-12'),
(173, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 2, 'tanvir ahmed Remon', 1, '2022-11-12'),
(174, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 3, 'Shahidul Islam Antor', 1, '2022-11-12'),
(175, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 4, 'shakib', 1, '2022-11-12'),
(176, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 5, 'Zahirul Islam', 1, '2022-11-12'),
(177, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 6, 'Robin', 1, '2022-11-12'),
(178, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 7, 'shahadat hossain', 1, '2022-11-12'),
(179, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 8, 'Aman vai', 1, '2022-11-12'),
(180, 1, 1, '2022-11-12 11:38:58', '2022-11-12 11:38:58', 9, 'Abdullah Al Mamun', 0, '2022-11-12'),
(181, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 1, 'Shariar Islam', 1, '2022-11-10'),
(182, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 2, 'tanvir ahmed Remon', 1, '2022-11-10'),
(183, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 3, 'Shahidul Islam Antor', 1, '2022-11-10'),
(184, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 4, 'shakib', 1, '2022-11-10'),
(185, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 5, 'Zahirul Islam', 1, '2022-11-10'),
(186, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 6, 'Robin', 1, '2022-11-10'),
(187, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 7, 'shahadat hossain', 1, '2022-11-10'),
(188, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 8, 'Aman vai', 1, '2022-11-10'),
(189, 1, 1, '2022-11-12 11:40:15', '2022-11-12 11:40:15', 9, 'Abdullah Al Mamun', 0, '2022-11-10'),
(190, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 1, 'Shariar Islam', 1, '2022-11-13'),
(191, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 2, 'tanvir ahmed Remon', 1, '2022-11-13'),
(192, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 3, 'Shahidul Islam Antor', 1, '2022-11-13'),
(193, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 4, 'shakib', 1, '2022-11-13'),
(194, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 5, 'Zahirul Islam', 1, '2022-11-13'),
(195, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 6, 'Robin', 1, '2022-11-13'),
(196, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 7, 'shahadat hossain', 1, '2022-11-13'),
(197, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 8, 'Aman vai', 1, '2022-11-13'),
(198, 1, 1, '2022-11-13 04:38:40', '2022-11-13 04:38:40', 9, 'Abdullah Al Mamun', 0, '2022-11-13'),
(199, 1, 1, '2022-11-16 09:08:53', '2022-11-16 09:08:53', 1, 'Shariar Islam', 1, '2022-11-16'),
(200, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 2, 'tanvir ahmed Remon', 1, '2022-11-16'),
(201, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 3, 'Shahidul Islam Antor', 1, '2022-11-16'),
(202, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 5, 'Zahirul Islam', 1, '2022-11-16'),
(203, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 6, 'Robin', 1, '2022-11-16'),
(204, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 7, 'shahadat hossain', 1, '2022-11-16'),
(205, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 8, 'Aman vai', 1, '2022-11-16'),
(206, 1, 1, '2022-11-16 09:08:54', '2022-11-16 09:08:54', 9, 'Abdullah Al Mamun', 0, '2022-11-16'),
(207, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 1, 'Shariar Islam', 0, '2022-11-19'),
(208, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 2, 'tanvir ahmed Remon', 1, '2022-11-19'),
(209, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 3, 'Shahidul Islam Antor', 1, '2022-11-19'),
(210, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 5, 'Zahirul Islam', 1, '2022-11-19'),
(211, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 6, 'Robin', 1, '2022-11-19'),
(212, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 7, 'shahadat hossain', 1, '2022-11-19'),
(213, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 8, 'Aman vai', 1, '2022-11-19'),
(214, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 9, 'Abdullah Al Mamun', 0, '2022-11-19'),
(215, 1, 1, '2022-11-19 05:13:57', '2022-11-19 05:13:57', 10, 'Mohiuddin Tareq', 1, '2022-11-19'),
(216, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 1, 'Shariar Islam', 1, '2022-12-14'),
(217, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 2, 'tanvir ahmed Remon', 1, '2022-12-14'),
(218, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 3, 'Shahidul Islam Antor', 1, '2022-12-14'),
(219, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 5, 'Zahirul Islam', 1, '2022-12-14'),
(220, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 6, 'Robin', 1, '2022-12-14'),
(221, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 7, 'shahadat hossain', 1, '2022-12-14'),
(222, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 8, 'Aman vai', 1, '2022-12-14'),
(223, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 9, 'Abdullah Al Mamun', 1, '2022-12-14'),
(224, 1, 1, '2022-12-14 12:11:27', '2022-12-14 12:11:27', 10, 'Mohiuddin Tareq', 1, '2022-12-14'),
(225, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 1, 'Shariar Islam', 1, '2022-12-18'),
(226, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 2, 'tanvir ahmed Remon', 1, '2022-12-18'),
(227, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 3, 'Shahidul Islam Antor', 1, '2022-12-18'),
(228, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 5, 'Zahirul Islam', 1, '2022-12-18'),
(229, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 6, 'Robin', 0, '2022-12-18'),
(230, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 7, 'shahadat hossain', 1, '2022-12-18'),
(231, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 8, 'Aman vai', 1, '2022-12-18'),
(232, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 9, 'Abdullah Al Mamun', 1, '2022-12-18'),
(233, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 10, 'Mohiuddin Tareq', 0, '2022-12-18'),
(234, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 1, 'Shariar Islam', 1, '2022-12-18'),
(235, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 2, 'tanvir ahmed Remon', 1, '2022-12-18'),
(236, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 3, 'Shahidul Islam Antor', 1, '2022-12-18'),
(237, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 5, 'Zahirul Islam', 1, '2022-12-18'),
(238, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 6, 'Robin', 0, '2022-12-18'),
(239, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 7, 'shahadat hossain', 1, '2022-12-18'),
(240, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 8, 'Aman vai', 1, '2022-12-18'),
(241, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 9, 'Abdullah Al Mamun', 1, '2022-12-18'),
(242, 1, 1, '2022-12-18 05:12:43', '2022-12-18 05:12:43', 10, 'Mohiuddin Tareq', 0, '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `bankadds`
--

CREATE TABLE `bankadds` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `bank_name` varchar(255) NOT NULL,
  `account_holder` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `routing` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankadds`
--

INSERT INTO `bankadds` (`id`, `status`, `created_at`, `updated_at`, `bank_name`, `account_holder`, `account_number`, `account_type`, `routing`, `swift`, `branch`) VALUES
(1, 1, '2022-10-03', '2022-10-03', '2', 'tanvir ahmed', '00131010022491', 'Business', '285261514', 'MDBLBDDH', 'kamarpara'),
(2, 1, '2022-10-03', '2022-10-30', '4', 'shariar islam', '00131010022490', 'Expoters FC', '1212121212', 'sdsdsdwsd', 'kamarpara');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  `updated_at` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `status`, `created_at`, `updated_at`, `name`) VALUES
(1, 1, '10/2/2022', '10/2/2022', 'Bangladesh Commerce Bank Limited'),
(2, 1, '10/3/2022', '10/3/2022', 'Bank Asia Limited'),
(3, 1, '10/4/2022', '10/4/2022', 'Bengal Commercial Bank Limited'),
(4, 1, '10/5/2022', '10/5/2022', 'BRAC Bank Limited'),
(5, 1, '10/6/2022', '10/6/2022', 'Citizens Bank PLC'),
(6, 1, '10/7/2022', '10/7/2022', 'City Bank Limited'),
(7, 1, '10/8/2022', '10/8/2022', 'Community Bank Bangladesh Limited'),
(8, 1, '10/9/2022', '10/9/2022', 'Dhaka Bank Limited'),
(9, 1, '10/10/2022', '10/10/2022', 'Dutch-Bangla Bank Limited'),
(10, 1, '10/11/2022', '10/11/2022', 'Eastern Bank Limited'),
(11, 1, '10/12/2022', '10/12/2022', 'IFIC Bank Limited'),
(12, 1, '10/13/2022', '10/13/2022', 'Jamuna Bank Limited'),
(13, 1, '10/14/2022', '10/14/2022', 'Meghna Bank Limited'),
(14, 1, '10/15/2022', '10/15/2022', 'Mercantile Bank Limited'),
(15, 1, '10/16/2022', '10/16/2022', 'Midland Bank Limited'),
(16, 1, '10/17/2022', '10/17/2022', 'Modhumoti Bank Limited'),
(17, 1, '10/18/2022', '10/18/2022', 'Mutual Trust Bank Limited'),
(18, 1, '10/19/2022', '10/19/2022', 'National Bank Limited'),
(19, 1, '10/20/2022', '10/20/2022', 'National Credit & Commerce Bank Limited'),
(20, 1, '10/21/2022', '10/21/2022', 'NRB Bank Limited'),
(21, 1, '10/22/2022', '10/22/2022', 'NRB Commercial Bank Ltd'),
(22, 1, '10/23/2022', '10/23/2022', 'One Bank Limited'),
(23, 1, '10/24/2022', '10/24/2022', 'Padma Bank Limited'),
(24, 1, '10/25/2022', '10/25/2022', 'Premier Bank Limited'),
(25, 1, '10/26/2022', '10/26/2022', 'Prime Bank Limited'),
(26, 1, '10/27/2022', '10/27/2022', 'Pubali Bank Limited'),
(27, 1, '10/28/2022', '10/28/2022', 'Shimanto Bank Ltd'),
(28, 1, '10/29/2022', '10/29/2022', 'Southeast Bank Limited'),
(29, 1, '10/30/2022', '10/30/2022', 'South Bangla Agriculture and Commerce Bank Limited'),
(30, 1, '10/31/2022', '10/31/2022', 'Trust Bank Limited'),
(31, 1, '11/1/2022', '11/1/2022', 'United Commercial Bank Ltd'),
(32, 1, '11/2/2022', '11/2/2022', 'Uttara Bank Limited'),
(33, 1, '11/3/2022', '11/3/2022', 'Al-Arafah Islami Bank Limited'),
(34, 1, '11/4/2022', '11/4/2022', 'EXIM Bank Limited'),
(35, 1, '11/5/2022', '11/5/2022', 'First Security Islami Bank Limited'),
(36, 1, '11/6/2022', '11/6/2022', 'Global Islamic Bank Ltd'),
(37, 1, '11/7/2022', '11/7/2022', 'ICB Islamic Bank Limited'),
(38, 1, '11/8/2022', '11/8/2022', 'Islami Bank Bangladesh Limited'),
(39, 1, '11/9/2022', '11/9/2022', 'Shahjalal Islami Bank Limited'),
(40, 1, '11/10/2022', '11/10/2022', 'Social Islami Bank Limited'),
(41, 1, '11/11/2022', '11/11/2022', 'Union Bank Limited'),
(42, 1, '11/12/2022', '11/12/2022', 'Standard Bank Limited'),
(43, 1, '11/13/2022', '11/13/2022', 'Agrani Bank Limited'),
(44, 1, '11/14/2022', '11/14/2022', 'Bangladesh Development Bank'),
(45, 1, '11/15/2022', '11/15/2022', 'BASIC Bank Limited'),
(46, 1, '11/16/2022', '11/16/2022', 'Janata Bank Limited'),
(47, 1, '11/17/2022', '11/17/2022', 'Rupali Bank Limited'),
(48, 1, '11/18/2022', '11/18/2022', 'Sonali Bank Limited'),
(49, 1, '11/19/2022', '11/19/2022', 'Bangladesh Krishi Bank'),
(50, 1, '11/20/2022', '11/20/2022', 'Rajshahi Krishi Unnayan Bank'),
(51, 1, '11/21/2022', '11/21/2022', 'Probashi Kallyan Bank'),
(52, 1, '11/22/2022', '11/22/2022', 'Bank Al-Falah Limited'),
(53, 1, '11/23/2022', '11/23/2022', 'Citibank N.A'),
(54, 1, '11/24/2022', '11/24/2022', 'Commercial Bank of Ceylon PLC'),
(55, 1, '11/25/2022', '11/25/2022', 'Habib Bank Limited'),
(56, 1, '11/26/2022', '11/26/2022', 'HSBC'),
(57, 1, '11/27/2022', '11/27/2022', 'National Bank of Pakistan'),
(58, 1, '11/28/2022', '11/28/2022', 'Standard Chartered Bank'),
(59, 1, '11/29/2022', '11/29/2022', 'State Bank of India'),
(60, 1, '11/30/2022', '11/30/2022', 'Woori Bank'),
(61, 1, '12/1/2022', '12/1/2022', 'AB Bank Limited');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `image`, `description`) VALUES
(1, 1, 1, '2022-10-11 03:14:28', '2022-10-22 22:46:18', 'Bata', 'Brand/uattJZLZTNsA0Fydwqbjo4sAtBwYtmLzqnedit2H.png', 'Shoe'),
(2, 1, 1, '2022-10-11 03:16:08', '2022-10-22 22:47:25', 'CAT', 'Brand/DnnhmNmuTl8Wk9y1J0LKsynIXs24VE4a6jkRYA3b.jpg', 'Bag'),
(3, 1, 1, '2022-10-11 22:25:46', '2022-10-11 22:25:46', 'HP', 'Brand/NUF9ErHm8CCA22KnM11BHLxjdBNENvnI2zcrVRlm.png', 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `code`) VALUES
(1, 1, 1, '2022-10-11 04:44:34', '2022-10-22 22:44:35', 'A', '12'),
(2, 1, 1, '2022-10-11 04:44:49', '2022-10-22 22:44:28', 'B', '12'),
(3, 1, 1, '2022-10-11 21:22:52', '2022-10-11 21:22:52', 'C', '12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'M.N. Packaging & Printing Accessories', 'Manikganj', 'support@email.com', '8765432456', 1, '2022-09-28 13:06:35', '2022-09-28 13:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  `debit_by` text NOT NULL,
  `amount` double NOT NULL,
  `account` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'suppliers/IwMMuBOgG1SFWbVraEbLc56DKa8RTpSjRjoSgZtj.jpg',
  `remark` text NOT NULL,
  `pay_via` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `status`, `created_at`, `updated_at`, `date`, `debit_by`, `amount`, `account`, `image`, `remark`, `pay_via`) VALUES
(1, 1, '2022-10-04', '2022-10-31', '2022-10-05', 'Bank', 100000, '1', 'credit/tNiP4E4o48I2GBD3uqDplCD4IKMUHAUxw1vHkRko.jpg', 'asfasf', '3'),
(2, 1, '2022-10-30', '2022-10-31', '2022-10-30', 'Bank', 121200, '2', 'credit/Hiw17nM1XABi41cdnGE3x6ikUvaaFSNXc92B2wCo.jpg', 'on test..', '4');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  `credit_from` varchar(255) NOT NULL,
  `received` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `account` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'suppliers/IwMMuBOgG1SFWbVraEbLc56DKa8RTpSjRjoSgZtj.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`id`, `status`, `created_at`, `updated_at`, `date`, `credit_from`, `received`, `amount`, `account`, `remark`, `image`) VALUES
(1, 1, '2022-10-04', '2022-10-04', '2022-10-04', 'remon', '3', 100000, '1', 'HR taka paiche.', 'C:\\xampp\\tmp\\php4F3E.tmp'),
(2, 1, '2022-10-04', '2022-10-04', '2022-10-01', 'remon', '2', 50000, '1', 'GM taka ki korsos.', 'suppliers/IwMMuBOgG1SFWbVraEbLc56DKa8RTpSjRjoSgZtj.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 1, '2022-10-02', '2022-10-02'),
(2, 'Production', 1, '2022-10-02', '2022-10-02'),
(4, 'Marketing', 1, '2022-10-02', '2022-10-02'),
(5, 'Printing', 1, '2022-10-02', '2022-10-02'),
(6, 'Finance', 1, '2022-10-02', '2022-10-02'),
(7, 'Accounts', 1, '2022-10-25', '2022-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `status`, `created_at`, `updated_at`, `name`) VALUES
(1, 1, '2022-10-06 04:13:43', '2022-10-10 01:49:59', 'Employee'),
(2, 1, '2022-10-06 04:13:52', '2022-10-10 01:49:42', 'GM'),
(3, 1, '2022-10-06 04:14:00', '2022-10-10 01:49:30', 'HR'),
(4, 1, '2022-10-24 23:46:35', '2022-10-24 23:46:35', 'Accountant'),
(6, 1, '2022-12-10 11:11:16', '2022-12-10 11:11:16', 'Sales Officer');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `id_no` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `work_shift_name` varchar(20) NOT NULL,
  `daily_salary` double NOT NULL,
  `monthly_salary` double NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `nid_no` varchar(200) NOT NULL,
  `nid_image` varchar(500) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `address` text DEFAULT NULL,
  `emergency_name` varchar(255) DEFAULT NULL,
  `emergency_contact` varchar(30) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `date_of_leave` date DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `religion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department_id`, `image`, `id_no`, `designation_id`, `work_shift_name`, `daily_salary`, `monthly_salary`, `email`, `phone`, `gender`, `marital_status`, `nid_no`, `nid_image`, `status`, `address`, `emergency_name`, `emergency_contact`, `created_at`, `updated_at`, `date_of_leave`, `date_of_birth`, `date_of_joining`, `religion`) VALUES
(1, 'Zahirul Islam', 1, 'employee/72PtQctUsS5PnhUc2V1kmYH46PZjzgastmisRshY.jpg', 5, 1, '1', 500, 15000, 'zahirulislam15@gmail.com', '1568347144', '1', '2', '0', '', 1, 'Kamarpara', 'Zahirul Islam', '1000000000', '2022-10-02', '2022-11-13', '2022-10-02', '2022-10-02', '2022-10-02', '1'),
(2, 'Shariar Islam', 2, 'employee/DmBW1m4QzLMZnAfVSQGYMrOCJB7jUNNZRdXOv3jL.jpg', 1, 2, '1', 50, 35000, 'shariar@codecell.bd', '1630456676', '1', '2', '1996001002003004', 'employee/7dgXq0nqEOc0IK9aQsJhznJXoZlfP3IvsyfrxEMa.jpg', 1, 'kamarpara, turag Dhaka.', 'Zahirul Islam', '1568347144', '2022-10-03', '2022-11-13', NULL, '1996-06-07', '2019-12-30', '1'),
(4, 'Robin', 4, 'employee/D016tWHOAlm9tpPjR9j77RbrNagAttIpqHZxWEXY.jpg', 6, 1, '1', 700, 21000, 'robin@codecell.com', '01686235277', '1', '1', '7418529631', 'employee/qRIa26WvbAgHWojdU4IERESzWtZaJBQnssz0EZSH.jpg', 1, 'vatulia, kamarpara, Uttara, Dhaka.', 'Fakhrul', '10101010101', '2022-10-27', '2022-11-13', NULL, '1998-12-11', '2022-10-01', '1'),
(6, 'shahadat hossain', 5, 'employee/LcE7vTtcJsu5NWqEXUf1R7Qf2lNawWw7NAZMGYFa.jpg', 7, 4, '1', 700, 21000, 'shahadat@codecell.com', '01619005449', '1', '2', '1594872361', 'employee/ZaNlgthGh3pQRCNywCOESYh4AeCDFzFh5B4ITYcI.jpg', 1, 'savar, Dhaka.', 'shariful islam', '12345678910', '2022-10-27', '2022-11-13', NULL, '2002-12-12', '2022-10-01', '1'),
(7, 'tanvir ahmed Remon', 7, 'employee/ubZUJ9Z9Lw4ZSbcJ0yCC58XnssyCWGXMdpqCgkpF.jpg', 2, 2, '1', 1200, 36000, 'remon@codecell.com', '01568405146', '1', '2', '8527419630', 'employee/lsXa8Rrl54ZquwwChq5zaQq2tr7IBXsNgBS0Yrsh.jpg', 1, 'kamarpara, uttara, Dhaka', 'shariar Islam', '01630456676', '2022-10-27', '2022-11-29', NULL, '1996-11-30', '2022-01-01', '1'),
(8, 'Shahidul Islam Antor', 2, 'employee/jjh948JiMmwAi76Mn65L0FO2nAghThFbdZKYESAZ.jpg', 3, 4, '1', 1000, 30000, 'antorislam.me@outlook.com', '01642742704', '1', '2', '1237894560', 'employee/QwDv7qWgg6ncRhCNasAPfAPllMRWtvE18vkDmsck.jpg', 1, 'feni.', 'shariar Islam', '01630456676', '2022-10-27', '2022-11-13', NULL, '1999-03-12', '2022-08-01', '1'),
(9, 'Abdullah Al Mamun', 7, 'employee/HRgRBUQTetwjpzK3pJXqdXw8MuIiiFFYHduyJ0tt.jpg', 9, 3, '2', 1100, 33000, 'Rabbi@codecell.com', '01670750908', '1', '1', '9638527410', 'employee/soNVLjpAiYiUTn3QA3PFAWEtMutOg5QBamRwCmfJ.jpg', 1, 'narayangong', 'shariar Islam', '01630456676', '2022-10-27', '2022-11-13', NULL, '1991-02-09', '2022-01-01', '1'),
(10, 'shakib', 2, 'employee/vTpAD1r9DbHyFDwr3QvhsekiF5TZcM03hAs73p0K.jpg', 4, 1, '1', 1000, 30000, 'shakib@gmail.com', '019102030540', '1', '1', '95162387401', 'employee/8b7iWxcKENVtY91EcKrJGwftO4OxazB5eI1n1vEC.jpg', 2, 'Sector-6,Uttara, Dhaka.', 'shariar Islam', '01630456676', '2022-10-29', '2022-11-16', NULL, '1999-12-06', '2022-10-16', '1'),
(11, 'Aman vai', 5, 'employee/gqov8XJacLKD62l4e61NY9HNwoBDJy7OZntG8H3K.jpg', 8, 1, '1', 500, 15000, 'aman@codecell.com', '01892699261', '1', '1', '4871592630', 'employee/1QhjD1T8Km5Pk1ss7nUW8emMTrg8kuboTVlcoM1g.jpg', 1, 'kamarpara, turag, Dhaka.', 'shariar Islam', '01630456676', '2022-10-29', '2022-11-13', NULL, '1985-12-21', '2022-09-01', '1'),
(13, 'Nobin', 2, 'employee/hbs94sBIVX2qZm3letKJGH5EBS2wtqC6LSKvxwZ0.jpg', 10, 1, '1', 1000, 30000, 'tariq@codecell.com', '01630456676', '1', '2', '95162387401', 'employee/GWhfiiQWhnjUupezlffrwRgnNBastMBnQZClrKWV.jpg', 1, 'abcd', 'shariar Islam', '01630456676', '2022-11-19', '2022-12-18', NULL, '2000-01-01', '2022-11-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `datee` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(500) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `datee`, `purpose`, `payment_method`, `account`, `amount`, `remark`) VALUES
(1, 1, 1, '2022-10-05', '2022-12-18', '2022-10-26 18:00:00', 'tea and snacks', '2', '1', 5000, 'khali ek cup cha.'),
(2, 1, 1, '2022-10-05', '2022-12-18', '2022-10-26 18:00:00', 'versity er nama', '2', '2', 20000, 'taka nosto.'),
(4, 1, 1, '2022-10-26', '2022-10-27', '2022-10-26 18:00:00', 'Buy 10 Tables and 10 Chair.', '2', '1', 45000, 'Table chair for new recruitment .'),
(5, 1, 1, '2022-10-26', '2022-12-18', '2022-10-26 18:00:00', 'coffee special', '2', '2', 3000, 'abar o taka nosto.'),
(6, 1, 1, '2022-10-27', '2022-10-27', '2022-10-26 18:00:00', 'flower', '1', NULL, 500, 'buy new flower');

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
-- Table structure for table `lcs`
--

CREATE TABLE `lcs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pi_number` int(11) NOT NULL,
  `pi_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pi_value` int(11) NOT NULL,
  `party_id` varchar(255) NOT NULL,
  `received_bdt` int(11) NOT NULL,
  `status_bdt` varchar(255) NOT NULL DEFAULT '0',
  `lc_number` varchar(255) NOT NULL,
  `lc_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bank_id` varchar(255) NOT NULL,
  `amd_no_date` varchar(255) DEFAULT '1/1/1001',
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `maturity_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ldbc_number` varchar(255) NOT NULL,
  `purchase_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcs`
--

INSERT INTO `lcs` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `pi_number`, `pi_date`, `pi_value`, `party_id`, `received_bdt`, `status_bdt`, `lc_number`, `lc_date`, `bank_id`, `amd_no_date`, `submitted_date`, `maturity_date`, `ldbc_number`, `purchase_amount`) VALUES
(1, 0, 1, '2022-10-08 05:10:13', '2022-10-30 04:22:55', 12, '2022-10-01 18:00:00', 500, '1', 600000, 'Accepted', '123456789', '2022-10-05 18:00:00', '4', '1', '2022-10-06 18:00:00', '2022-10-07 18:00:00', '123456789', 1000000),
(2, 0, 1, '2022-10-08 05:23:34', '2022-10-08 05:23:34', 13, '2022-10-03 18:00:00', 100, '2', 500, 'Refusal', '121415161719', '2022-10-07 18:00:00', '4', '1', '2022-10-15 18:00:00', '2022-10-06 18:00:00', '12457836', 1000000),
(3, 0, 1, '2022-10-30 04:25:26', '2022-10-30 04:25:26', 14, '2022-10-29 18:00:00', 1000, '2', 1000000, 'Accepted', '123456789', '2022-10-29 18:00:00', '2', '2', '2022-11-01 18:00:00', '2022-10-31 18:00:00', '148752369', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `employee_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_to` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_days` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `status`, `created_at`, `updated_at`, `employee_id`, `name`, `date_from`, `date_to`, `total_days`, `type`, `remark`) VALUES
(1, 1, '2022-10-06 02:36:15', '2022-11-16 03:36:49', '12115', 'tanvir remon', '2022-10-07 18:00:00', '2022-10-13 18:00:00', 7, '1', 'check again.'),
(2, 1, '2022-10-06 03:24:11', '2022-11-16 03:37:11', '12115', 'Shahidul Islam Antor', '2022-10-07 18:00:00', '2022-10-09 18:00:00', 3, '2', 'it\'s working.'),
(3, 1, '2022-10-06 03:32:18', '2022-11-16 03:26:34', '12116', 'Shahidul Islam Antor', '2022-11-08 18:00:00', '2022-11-16 18:00:00', 8, '3', NULL),
(4, 1, '2022-11-16 03:14:04', '2022-11-16 03:43:47', '05', 'Zahirul Islam', '2022-11-22 18:00:00', '2022-11-26 18:00:00', 4, '2', 'abcd'),
(5, 1, '2022-11-16 03:44:44', '2022-11-16 03:44:44', '6', 'Robin', '2022-11-16 18:00:00', '2022-11-22 18:00:00', 5, '4', 'yes yes yes.');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `employee_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` double NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `status`, `created_at`, `updated_at`, `employee_id`, `name`, `date`, `amount`, `note`) VALUES
(2, 1, '2022-10-06 03:16:28', '2022-10-06 03:16:28', '12115', 'tanvir remon', '2022-10-05 18:00:00', 100000, 'bia korbe. sobar dawat.'),
(3, 1, '2022-10-06 03:26:00', '2022-10-30 23:04:00', '12115', 'Shahidul Islam Antor', '2022-10-07 18:00:00', 100000, 'A tour to cox\'s bazar.');

-- --------------------------------------------------------

--
-- Table structure for table `loan_requests`
--

CREATE TABLE `loan_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `quantity`, `unit`, `quality`, `supplier_id`) VALUES
(2, 1, 1, '2022-10-09 02:54:43', '2022-10-31 00:31:48', 'paper', 10, 'Box', 'A', 6),
(3, 1, 1, '2022-10-09 05:12:39', '2022-10-31 00:34:25', 'laptop', 5, 'PCS', 'B', 4),
(4, 1, 1, '2022-10-10 22:13:00', '2022-10-10 22:13:20', 'Mouse', 99, 'PCS', 'A', 1),
(5, 1, 1, '2022-10-10 23:55:47', '2022-10-31 00:32:32', 'suta', 1000, 'Box', 'E', 8),
(6, 1, 1, '2022-10-30 23:20:54', '2022-10-30 23:20:54', 'Printer', 100, 'PCS', 'A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `material_for_suppliers`
--

CREATE TABLE `material_for_suppliers` (
  `id` tinyint(4) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_for_suppliers`
--

INSERT INTO `material_for_suppliers` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `image`) VALUES
(1, 1, 1, '2022-10-24 03:34:31', '2022-10-24 03:37:24', 'Cotton', 'materialForSupplier/KbRywFLmif45Ha38kknL3ImdVlP7vVbslAwTbmTw.jpg'),
(2, 1, 1, '2022-10-24 03:37:49', '2022-10-24 03:37:49', 'Button', 'materialForSupplier/88RFkT3saDvvDqu6q9nJrFsn5qwT3GuSsUkIBC71.png'),
(3, 1, 1, '2022-10-24 03:40:55', '2022-10-24 03:40:55', 'Zipper', 'materialForSupplier/IWSdYhYEc9EcOiRJpsAuXGPXRsEUAxyDI8s1NUyc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material_productions`
--

CREATE TABLE `material_productions` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT 'White'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_productions`
--

INSERT INTO `material_productions` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `quantity`, `unit`, `quality`, `receiver`, `code`) VALUES
(1, 1, 1, '2022-10-10 05:28:22', '2022-10-10 05:28:22', 'paper', 10, 'Box', 'A', 'asdf', 'White'),
(2, 1, 1, '2022-10-10 05:29:28', '2022-10-10 05:29:28', 'laptop', 1, 'PCS', 'B', 'remon', 'White'),
(8, 1, 1, '2022-10-10 22:10:02', '2022-10-10 22:10:02', 'laptop', 1, 'PCS', 'B', 'remon', 'Gray'),
(10, 1, 1, '2022-10-10 22:25:58', '2022-10-10 22:25:58', 'Mouse', 20, 'PCS', 'A', 'Robin', 'Black'),
(13, 1, 1, '2022-10-10 22:32:42', '2022-10-10 23:20:42', 'Mouse', 1, 'PCS', 'A', 'shariar', 'Dark Black'),
(14, 1, 1, '2022-10-31 02:29:04', '2022-10-31 02:29:04', 'Printer', 20, 'PCS', 'A', 'Shahadat Hossain', 'Black'),
(15, 1, 1, '2022-12-14 06:25:48', '2022-12-14 06:25:48', 'laptop', 3, 'PCS', 'B', 'tanvir ahmed', 'black');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_04_065416_create_admins_table', 2),
(6, '2022_08_06_095501_create_categories_table', 2),
(7, '2022_08_09_045116_create_app_settings_table', 2),
(8, '2022_08_10_040536_create_notifications_table', 2),
(9, '2022_08_11_061238_create_otp_tokens_table', 2),
(10, '2022_08_11_083607_create_app_sliders_table', 2),
(11, '2022_08_21_102938_create_customer_messages_table', 2),
(12, '2022_08_22_053319_create_blogs_table', 2),
(13, '2022_08_24_042623_create_app_contents_table', 2),
(14, '2022_08_24_062653_create_services_table', 2),
(15, '2022_08_28_101444_create_testimonials_table', 2),
(16, '2022_08_28_115844_create_teams_table', 2),
(17, '2022_08_28_120708_create_loan_requests_table', 2),
(18, '2022_08_29_040531_create_comments_table', 2),
(19, '2022_08_30_071902_create_ac_types_table', 2),
(20, '2022_09_04_055641_create_ac_titles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_delivery_date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_id` text NOT NULL,
  `unit_price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `total_discount` double NOT NULL,
  `grand_total` double NOT NULL,
  `transport_cost` double DEFAULT NULL,
  `total_paid` double NOT NULL,
  `total_due` decimal(10,0) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `order_note` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `party_id`, `order_date`, `order_delivery_date`, `product_id`, `quantity`, `unit_id`, `unit_price`, `discount`, `total_discount`, `grand_total`, `transport_cost`, `total_paid`, `total_due`, `payment_method`, `order_note`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-10-08', '2022-12-15', '3', 1000, '1', 45000, 0, 0, 45002000, 2000, 30000000, '15002000', 1, 'order received by GM.', 'upload/dAoKMWZaaOKObsaJotweH9fp06JzODZyIIE0FMbL.png', 1, '2022-10-11', '2022-10-12'),
(3, 1, '2022-10-01', '2022-11-11', '1', 10, '1', 100000, 0, 0, 1000000, 0, 500000, '500000', 1, 'this is a new bag.', 'upload/yj9DXveLSgidwKA8InTNUpmjRWVrmv2sinBweabS.jpg', 1, '2022-10-12', '2022-10-12'),
(4, 3, '2022-10-07', '2022-10-14', '2', 1000, '1', 120, 0, 0, 120000, 0, 120000, '0', 1, 'another sample order.', 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 1, '2022-10-12', '2022-10-12'),
(5, 2, '2022-10-31', '2022-12-31', '3', 25, '1', 40000, 10, 4000, 1000000, 4000, 500000, '500000', 2, 'asdfghjk asdfghjk asdfghjk', 'upload/oud2Dgh2s7XruC9cVGl4CHddizIkf8XRsZyXsq2X.png', 1, '2022-10-31', '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `company` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `name`, `email`, `phone`, `image`, `company`, `address`, `describe`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tanvir ahmed', 'tanvir@codecell.bd', '01568405146', 'parties/9HOb5RfqbYdr8I4ji4RJtRfZbOE7fYhVT0JHXKae.jpg', 'tanvir packaging', 'Sector-10,Uttara, Dhaka.', NULL, 1, '2022-10-01', '2022-10-01'),
(2, 'Shariar Islam', 'CEO@codecell.bd', '01630456676', 'parties/HEyqvC1wIGwca9fJmC2vLcQrVj89ivTHjJuIgZdi.png', 'Codecell Ltd.', 'H#155, R#13, Sector-10,Uttara, Dhaka.', NULL, 1, '2022-10-01', '2022-10-01'),
(3, 'Oracal', 'oracal123@gmail.com', '12345678912', 'parties/ZnX5Hi4Sf8J97p89gdbkXo9IKSy9MBca6eSQ8o4d.png', 'Oracal Publication', 'valo publication.', NULL, 1, '2022-10-01', '2022-10-01'),
(4, 'Robin', 'robin@codecell.com', '+880 1673-867061', 'parties/hqrXeyQrJp0OqFyPpSgy0wqeH6mvwsEztOo1Y2NV.png', 'Brothers Ambition Technology', 'V9WJ+RGH, Bhatulia Mosjid Road,Turag, Dhaka 1230', NULL, 1, '2022-11-12', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `partyreceives`
--

CREATE TABLE `partyreceives` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `party` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `account` varchar(255) DEFAULT 'Hand Cash',
  `amount` double NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partyreceives`
--

INSERT INTO `partyreceives` (`id`, `status`, `created_at`, `updated_at`, `date`, `party`, `method`, `account`, `amount`, `remark`) VALUES
(1, 1, '2022-10-05 02:44:54', '2022-12-18 03:06:51', '2022-09-30 18:00:00', '1', '2', '1', 100000, 'asdfghjk'),
(2, 1, '2022-10-05 02:47:27', '2022-10-05 02:47:27', '2022-10-07 18:00:00', '3', '2', '2', 100000, 'qwertyuiop');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_per_days`
--

CREATE TABLE `production_per_days` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `production_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `remark` text DEFAULT '0',
  `production` int(11) NOT NULL,
  `image` varchar(255) DEFAULT '1',
  `party_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_per_days`
--

INSERT INTO `production_per_days` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `product_id`, `order_id`, `product_name`, `unit_id`, `production_date`, `remark`, `production`, `image`, `party_id`) VALUES
(7, 1, 1, '2022-10-12 06:18:41', '2022-10-14 22:07:40', 1, 3, 'bag', 1, '2022-10-06 18:00:00', 'wergh', 8, 'upload/yj9DXveLSgidwKA8InTNUpmjRWVrmv2sinBweabS.jpg', 1),
(13, 1, 1, '2022-10-13 00:17:19', '2022-10-13 00:17:19', 2, 4, 'shoe', 1, '2022-10-11 18:00:00', NULL, 290, 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 3),
(15, 1, 1, '2022-10-13 00:29:00', '2022-10-14 22:07:20', 3, 2, 'HP pavilion 15', 1, '2022-10-10 18:00:00', 'mnmnmnm', 200, 'upload/dAoKMWZaaOKObsaJotweH9fp06JzODZyIIE0FMbL.png', 1),
(16, 1, 1, '2022-10-13 06:06:23', '2022-10-13 06:06:23', 2, 4, 'shoe', 1, '2022-10-12 18:00:00', 'qawesrdf', 100, 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 3),
(17, 1, 1, '2022-10-13 06:08:37', '2022-10-13 06:08:37', 2, 4, 'shoe', 1, '2022-10-12 18:00:00', 'again check.', 120, 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 3),
(18, 1, 1, '2022-10-14 22:40:02', '2022-10-14 22:40:02', 2, 4, 'shoe', 1, '2022-10-14 18:00:00', NULL, 150, 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 3),
(19, 1, 1, '2022-10-14 22:51:22', '2022-10-14 22:51:22', 3, 2, 'HP pavilion 15', 1, '2022-10-14 18:00:00', NULL, 70, 'upload/dAoKMWZaaOKObsaJotweH9fp06JzODZyIIE0FMbL.png', 1),
(20, 1, 1, '2022-10-15 06:10:39', '2022-10-15 06:10:52', 1, 3, 'bag', 1, '2022-10-14 18:00:00', NULL, 2, 'upload/yj9DXveLSgidwKA8InTNUpmjRWVrmv2sinBweabS.jpg', 1),
(22, 1, 1, '2022-10-15 06:42:48', '2022-10-15 06:52:46', 3, 2, 'HP pavilion 15', 1, '2022-10-01 18:00:00', NULL, 130, 'upload/dAoKMWZaaOKObsaJotweH9fp06JzODZyIIE0FMbL.png', 1),
(23, 1, 1, '2022-10-15 06:53:22', '2022-10-15 06:53:58', 2, 4, 'shoe', 1, '2022-10-14 18:00:00', NULL, 140, 'upload/NLn4tLLED0pRVZmel05RC7K5270MYqPuCDt5ZCCT.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `catagory_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT '1',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`, `catagory_id`, `brand_id`, `price`, `unit_id`, `image`, `description`) VALUES
(1, 1, 1, '2022-10-11 07:29:08', '2022-10-22 22:43:53', 'bag', '2', '1', 500, '1', 'products/5jM20Om2yQOuYW2fGFOyFiY6Qp82EyvFi2s0m3lM.jpg', 'a bag for all.'),
(2, 1, 1, '2022-10-11 22:23:29', '2022-10-22 22:43:40', 'shoe', '1', '1', 1200, '1', 'products/wIuRxMz2mDdHvxsPAU66w6INmdaD7DoEWM9Y5krh.jpg', 'Casual Sneaker for man.'),
(3, 1, 1, '2022-10-11 22:27:51', '2022-10-11 22:27:51', 'HP pavilion 15', '2', '3', 79990, '1', 'products/t0uYNXN6kFsAeQTA2wCmdIbjapKPB2HsoJDLPgaK.png', 'this laptop is made by HP for me.');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `material_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `product_total` double DEFAULT NULL,
  `total_due` int(11) NOT NULL,
  `total_discount` int(11) NOT NULL,
  `transport_cost` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `purchase_note` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplierID`, `purchase_date`, `material_id`, `quantity`, `unit_id`, `unit_price`, `discount`, `product_total`, `total_due`, `total_discount`, `transport_cost`, `grand_total`, `total_paid`, `payment_method`, `purchase_note`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-09-30', 3, 1000, 1, 100, 7, NULL, 50000, 7000, 7000, 100000, 50000, 2, 'test is no.', 'upload/zXMdE5DwH9fqWNVTJzMEKacS9H9TifGUCL9evjbh.jpg', 1, '2022-09-30', '2022-10-24'),
(6, 3, '2022-10-01', 1, 10, 1, 12000, 20, NULL, 20000, 2000, 20000, 120000, 100000, 1, '2nd purchase done.', 'upload/1JTFiYNd22TPWQkAaYGX9e7K2pmWGbbmezdoEnEJ.jpg', 1, '2022-10-01', '2022-10-24'),
(7, 4, '2022-10-02', 2, 1000, 1, 5, 0, NULL, 4000, 0, 0, 5000, 1000, 1, 'is 1 or 2?', 'upload/OdeBQ2l66gEosGe5es1cdgyFtMMymPsQjl5IbX6h.png', 1, '2022-10-01', '2022-10-22'),
(8, 3, '2022-10-24', 2, 2000, 1, 2, 1, NULL, 500, 40, 40, 4000, 3500, 1, 'news is on', NULL, 1, '2022-10-24', '2022-10-24'),
(9, 6, '2022-10-23', 1, 400, 5, 7000, 0, NULL, 800000, 0, 0, 2800000, 2000000, 2, 'asdfghj', NULL, 1, '2022-10-24', '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quotation_date` date NOT NULL DEFAULT current_timestamp(),
  `party_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `total` double NOT NULL,
  `total_discount` double NOT NULL,
  `tax` int(11) NOT NULL,
  `grand_total` double NOT NULL,
  `quotation_note` text NOT NULL,
  `quotation_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `quotation_date`, `party_id`, `product_id`, `quantity`, `unit_id`, `unit_price`, `discount`, `total`, `total_discount`, `tax`, `grand_total`, `quotation_note`, `quotation_status`) VALUES
(1, 1, 1, '2022-11-16 04:51:57', '2022-11-16 06:08:30', '2022-11-16', 1, 1, 10, 1, 120, 0, 12000, 0, 10, 120000, 'this is on pending test.', 2),
(2, 1, 1, '2022-11-16 06:10:10', '2022-11-16 06:10:10', '2022-11-16', 2, 1, 10, 1, 100, 0, 1000, 0, 0, 1000, 'this is on test Sending.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_in_bangla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_in_bangla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplierpayments`
--

CREATE TABLE `supplierpayments` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `account` text DEFAULT 'Hand Cash',
  `amount` double NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplierpayments`
--

INSERT INTO `supplierpayments` (`id`, `status`, `created_at`, `updated_at`, `date`, `name`, `method`, `account`, `amount`, `remark`) VALUES
(1, 1, '2022-10-05 03:24:13', '2022-10-27 01:48:57', '2022-10-02 18:00:00', '3', '2', '2', 50000, 'asdfgh'),
(2, 1, '2022-10-05 03:25:01', '2022-10-05 03:25:01', '2022-09-30 18:00:00', '4', '2', '1', 100000, 'qwe'),
(3, 1, '2022-10-05 03:26:47', '2022-10-27 01:48:32', '2022-09-30 18:00:00', '6', '2', '1', 100000, 'zsxdcfvgbhnjm'),
(4, 1, '2022-10-27 01:50:36', '2022-10-27 01:50:36', '2022-10-26 18:00:00', '3', '1', 'Hand Cash', 35000, 'new updated checked.');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text DEFAULT NULL,
  `company` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `image`, `name`, `email`, `phone`, `company`, `address`, `describe`, `status`, `created_at`, `updated_at`) VALUES
(1, 'suppliers/UFhPMsmKmOg5MCmdgiBg8vxyHe5IbJT8cZ5TamiU.jpg', 'Shariar Islam', 'codecell@gmail.com', '019102030540', 'Codecell Ltd.', 'Kamarpara, sector-10, Uttara, Dhaka', NULL, 1, '2022-09-28 07:52:32', '2022-10-24 23:18:39'),
(3, 'suppliers/m0iXNzUaQfw2B5g7Y4dqvci05QQLEQzj8oDgyPqg.jpg', 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', 'abcd.co', 'uttara,Dhaka', NULL, 1, '2022-09-28 23:15:40', '2022-10-24 23:18:28'),
(4, 'suppliers/k3a0xTZrOJaZa3GoSVa807gqv5qOzsrnv8OM6OKa.jpg', 'Shahidul Islam Antor', 'antor123@gmail.com', '01677777777', 'antor.bd', 'Mohipal, Feni.', NULL, 1, '2022-09-28 23:17:20', '2022-10-24 23:13:36'),
(6, 'suppliers/Fprv8h0us4aXzsKSSo3VfRQmksUrVx5xClsY5E81.webp', 'tanvir ahmed', 'tanvir@codecell.bd', '0167777777', 'tanvir sneakers', 'google it.', NULL, 1, '2022-09-30 22:54:11', '2022-10-24 23:13:11'),
(7, 'suppliers/7vKQZraFssq8M8L1JEaPfQ6ghbnePL72uW4PFqBl.jpg', 'shakib', 'shakib@gmail.com', '01677777788', 'shakib.com.bd', 'azampur, dhaka.', NULL, 1, '2022-10-24 23:22:08', '2022-10-24 23:23:11'),
(8, 'suppliers/IAcvLOmrLvE2BHWszqW3Zvv9zw0tIp4qDfvMoFJz.jpg', 'Robin', 'robin@codecell.com', '01568347147', 'robin & co.', 'vatulia, kamarpara.', NULL, 1, '2022-10-24 23:24:34', '2022-10-24 23:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `company_id`, `status`, `created_at`, `updated_at`, `name`) VALUES
(1, 1, 1, '2022-10-11 03:38:01', '2022-10-11 03:38:01', 'PCS'),
(2, 1, 1, '2022-10-11 03:44:26', '2022-10-11 03:44:26', 'KG'),
(3, 1, 1, '2022-10-11 03:48:17', '2022-10-11 03:48:17', 'Ton'),
(4, 1, 1, '2022-10-11 03:48:55', '2022-10-11 03:48:55', 'Gram'),
(5, 1, 1, '2022-10-11 03:50:00', '2022-10-11 04:20:24', 'box');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL COMMENT '0=inactive; 1=managing_director; 2=gm; 3=salse; 4=hr; 5=account; 6=stock',
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

INSERT INTO `users` (`id`, `company_id`, `image`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'Managing Director', 'shahidul@codecell.com.bd', NULL, '$2y$10$icHaIxQGT3ig6Vub27JdCulZD2xI/6meb8aW/9Of1L1wHkGCn51eC', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankadds`
--
ALTER TABLE `bankadds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lcs`
--
ALTER TABLE `lcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_requests`
--
ALTER TABLE `loan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_for_suppliers`
--
ALTER TABLE `material_for_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_productions`
--
ALTER TABLE `material_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partyreceives`
--
ALTER TABLE `partyreceives`
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
-- Indexes for table `production_per_days`
--
ALTER TABLE `production_per_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`) USING HASH;

--
-- Indexes for table `supplierpayments`
--
ALTER TABLE `supplierpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `bankadds`
--
ALTER TABLE `bankadds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lcs`
--
ALTER TABLE `lcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_requests`
--
ALTER TABLE `loan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_for_suppliers`
--
ALTER TABLE `material_for_suppliers`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_productions`
--
ALTER TABLE `material_productions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partyreceives`
--
ALTER TABLE `partyreceives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_per_days`
--
ALTER TABLE `production_per_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplierpayments`
--
ALTER TABLE `supplierpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
