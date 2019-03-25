-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 12:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `academic_id` int(10) UNSIGNED NOT NULL,
  `academic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`academic_id`, `academic`, `description`, `created_at`, `updated_at`) VALUES
(1, '2000-2003', NULL, '2018-04-10 00:32:11', '2018-04-10 00:32:11'),
(2, '2004-2006', NULL, '2018-04-10 00:32:31', '2018-04-10 00:32:31'),
(3, '2007-2010', NULL, '2018-04-10 00:32:53', '2018-04-10 00:32:53'),
(4, '2011-2013', NULL, '2018-04-10 00:33:03', '2018-04-10 00:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` int(10) UNSIGNED NOT NULL,
  `batch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `batch`, `created_at`, `updated_at`) VALUES
(1, '1', '2018-04-10 00:50:10', '2018-04-10 00:50:10'),
(2, '2', '2018-04-10 00:50:11', '2018-04-10 00:50:11'),
(3, '3', '2018-04-10 00:50:12', '2018-04-10 00:50:12'),
(4, '4', '2018-04-10 00:50:12', '2018-04-10 00:50:12'),
(5, '5', '2018-04-10 00:50:13', '2018-04-10 00:50:13'),
(6, '6', '2018-04-10 00:50:14', '2018-04-10 00:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `shift_id` int(10) UNSIGNED NOT NULL,
  `time_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `academic_id`, `level_id`, `shift_id`, `time_id`, `group_id`, `batch_id`, `start_date`, `end_date`, `active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, 1, 1, '2018-04-01', '2018-04-30', 1, '2018-04-10 00:51:01', '2018-04-10 00:51:01'),
(2, 4, 6, 2, 2, 3, 1, '2018-04-10', '2018-04-30', 1, '2018-04-10 00:51:27', '2018-04-30 12:40:19'),
(5, 2, 8, 5, 4, 4, 6, '2018-04-01', '2018-04-30', 1, '2018-04-18 14:35:55', '2018-04-30 01:29:34'),
(7, 3, 4, 4, 3, 2, 2, '2018-05-01', '2018-05-29', 1, '2018-04-30 13:40:43', '2018-04-30 13:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `fee_type_id` int(10) UNSIGNED NOT NULL,
  `fee_heading` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `academic_id`, `level_id`, `fee_type_id`, `fee_heading`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Fees', 300.00, NULL, NULL),
(2, 4, 2, 1, 'Fees', 400.00, '2018-04-13 14:48:34', '2018-04-13 14:48:34'),
(3, 1, 8, 1, 'Fees', 10000.00, '2018-04-18 22:53:41', '2018-04-18 22:53:41'),
(4, 2, 8, 1, 'Fees', 3000.00, '2018-04-30 14:33:45', '2018-04-30 14:33:45'),
(5, 2, 8, 1, 'Fees', 30000.00, '2018-04-30 14:34:56', '2018-04-30 14:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `feetypes`
--

CREATE TABLE `feetypes` (
  `fee_type_id` int(10) UNSIGNED NOT NULL,
  `fee_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feetypes`
--

INSERT INTO `feetypes` (`fee_type_id`, `fee_type`, `created_at`, `updated_at`) VALUES
(1, 'School Fee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group`, `created_at`, `updated_at`) VALUES
(1, 'A', '2018-04-10 00:50:24', '2018-04-10 00:50:24'),
(2, 'B', '2018-04-10 00:50:26', '2018-04-10 00:50:26'),
(3, 'C', '2018-04-10 00:50:28', '2018-04-10 00:50:28'),
(4, 'D', '2018-04-10 00:50:30', '2018-04-10 00:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(10) UNSIGNED NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level`, `description`, `program_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'basic', 1, '2018-04-10 00:34:52', '2018-04-10 00:34:52'),
(2, '2', 'advance', 1, '2018-04-10 00:35:07', '2018-04-10 00:35:07'),
(3, '1', 'basic', 2, '2018-04-10 00:35:31', '2018-04-10 00:35:31'),
(4, '3', 'Advance', 2, '2018-04-10 00:36:24', '2018-04-10 00:36:24'),
(5, '4', 'Advance', 3, '2018-04-10 00:36:34', '2018-04-10 00:36:34'),
(6, '1', 'basic', 4, '2018-04-10 00:36:46', '2018-04-10 00:36:46'),
(7, '2', 'Advance', 4, '2018-04-10 00:36:58', '2018-04-10 00:36:58'),
(8, '1', 'NN', 5, '2018-04-18 14:35:23', '2018-04-18 14:35:23');

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
(3, '2018_04_01_210807_create_roles_table', 1),
(38, '2014_10_12_000000_create_users_table', 2),
(39, '2014_10_12_100000_create_password_resets_table', 2),
(40, '2018_04_01_210916_create_students_table', 2),
(41, '2018_04_02_054831_create_academics_table', 2),
(42, '2018_04_02_055140_create_programs_table', 2),
(43, '2018_04_02_055212_create_levels_table', 2),
(44, '2018_04_02_055350_create_shifts_table', 2),
(45, '2018_04_02_055421_create_times_table', 2),
(46, '2018_04_02_055623_create_batches_table', 2),
(47, '2018_04_02_055649_create_groups_table', 2),
(48, '2018_04_02_055728_create_classes_table', 2),
(49, '2018_04_02_055855_create_statuses_table', 2),
(50, '2018_04_02_060515_create_feetypes_table', 2),
(51, '2018_04_02_063800_create_fees_table', 2),
(52, '2018_04_02_064002_create_studentfees_table', 2),
(53, '2018_04_02_064102_create_transactions_table', 2),
(54, '2018_04_02_064308_create_receipts_table', 2),
(55, '2018_04_02_064359_create_receiptdetails_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Php', 'Core', '2018-04-10 00:33:38', '2018-04-10 00:33:38'),
(2, 'Java', 'core', '2018-04-10 00:33:47', '2018-04-10 00:33:47'),
(3, 'Ms Word', 'Basic Ms word', '2018-04-10 00:34:06', '2018-04-10 00:34:06'),
(4, 'PhotoShop', 'Basic', '2018-04-10 00:34:32', '2018-04-10 00:34:32'),
(5, 'Python', 'Basic', '2018-04-18 14:35:08', '2018-04-18 14:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `receiptdetails`
--

CREATE TABLE `receiptdetails` (
  `receiptdetail_id` int(10) UNSIGNED NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `transact_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receiptdetails`
--

INSERT INTO `receiptdetails` (`receiptdetail_id`, `receipt_id`, `student_id`, `transact_id`, `created_at`, `updated_at`) VALUES
(1, 1, 24, 1, '2018-04-12 12:59:30', '2018-04-12 12:59:30'),
(2, 2, 11, 2, '2018-04-12 13:01:52', '2018-04-12 13:01:52'),
(3, 3, 11, 3, '2018-04-12 14:20:24', '2018-04-12 14:20:24'),
(4, 4, 11, 4, '2018-04-12 14:21:21', '2018-04-12 14:21:21'),
(5, 5, 8, 5, '2018-04-13 14:51:06', '2018-04-13 14:51:06'),
(6, 6, 23, 6, '2018-04-14 12:41:48', '2018-04-14 12:41:48'),
(7, 7, 23, 7, '2018-04-14 13:31:51', '2018-04-14 13:31:51'),
(8, 8, 24, 8, '2018-04-17 01:12:05', '2018-04-17 01:12:05'),
(9, 9, 24, 9, '2018-04-17 01:14:02', '2018-04-17 01:14:02'),
(10, 10, 24, 10, '2018-04-17 14:32:31', '2018-04-17 14:32:31'),
(11, 11, 24, 11, '2018-04-17 14:33:31', '2018-04-17 14:33:31'),
(12, 12, 34, 11, '2018-04-18 23:43:29', '2018-04-18 23:43:29'),
(13, 13, 24, 12, '2018-04-29 13:57:40', '2018-04-29 13:57:40'),
(14, 14, 35, 13, '2018-04-30 14:35:15', '2018-04-30 14:35:15'),
(15, 15, 24, 14, '2018-05-04 22:32:20', '2018-05-04 22:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receipt_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL),
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL),
(14, NULL, NULL),
(15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `shift_id` int(10) UNSIGNED NOT NULL,
  `shift` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`shift_id`, `shift`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '2018-04-10 00:39:35', '2018-04-10 00:39:35'),
(2, 'Afternoon', '2018-04-10 00:41:01', '2018-04-10 00:41:01'),
(3, 'Evening', '2018-04-10 00:42:37', '2018-04-10 00:42:37'),
(4, 'Night', '2018-04-10 00:42:42', '2018-04-10 00:42:42'),
(5, 'Noon', '2018-04-10 00:47:34', '2018-04-10 00:47:34'),
(6, 'Late Night', '2018-04-28 13:57:34', '2018-04-28 13:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(5, 8, 2, NULL, NULL),
(6, 10, 2, NULL, NULL),
(7, 11, 1, NULL, NULL),
(8, 12, 1, NULL, NULL),
(9, 13, 2, NULL, NULL),
(10, 14, 2, NULL, NULL),
(11, 15, 1, NULL, NULL),
(12, 16, 1, NULL, NULL),
(13, 17, 1, NULL, NULL),
(14, 18, 1, NULL, NULL),
(15, 19, 1, NULL, NULL),
(16, 20, 1, NULL, NULL),
(17, 21, 1, NULL, NULL),
(18, 23, 1, NULL, NULL),
(19, 24, 1, NULL, NULL),
(20, 25, 5, NULL, NULL),
(21, 26, 5, NULL, NULL),
(22, 27, 5, NULL, NULL),
(23, 28, 5, NULL, NULL),
(24, 29, 5, NULL, NULL),
(25, 30, 5, NULL, NULL),
(26, 32, 1, NULL, NULL),
(27, 33, 1, NULL, NULL),
(28, 34, 5, NULL, NULL),
(29, 35, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `s_fee_id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `discount` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentfees`
--

INSERT INTO `studentfees` (`s_fee_id`, `fee_id`, `student_id`, `level_id`, `amount`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 24, 1, 250.00, 16, '2018-04-12 12:59:30', '2018-04-12 12:59:30'),
(2, 1, 11, 1, 300.00, 0, '2018-04-12 13:01:52', '2018-04-12 13:01:52'),
(3, 1, 11, 1, 200.00, 33, '2018-04-12 14:20:24', '2018-04-12 14:20:24'),
(4, 1, 11, 1, 100.00, 66, '2018-04-12 14:21:21', '2018-04-12 14:21:21'),
(5, 2, 8, 2, 200.00, 50, '2018-04-13 14:51:06', '2018-04-13 14:51:06'),
(6, 1, 23, 1, 150.00, 50, '2018-04-14 12:41:48', '2018-04-14 12:41:48'),
(7, 1, 24, 1, 50.00, 83, '2018-04-17 01:12:05', '2018-04-17 01:12:05'),
(8, 1, 24, 1, 300.00, 0, '2018-04-17 01:14:02', '2018-04-17 01:14:02'),
(9, 1, 24, 1, 200.00, 33, '2018-04-17 14:33:30', '2018-04-17 14:33:30'),
(10, 3, 34, 8, 8000.00, 20, '2018-04-18 23:43:29', '2018-04-18 23:43:29'),
(11, 5, 35, 8, 10.00, 99, '2018-04-30 14:35:15', '2018-04-30 14:35:15'),
(12, 1, 24, 1, 100.00, 66, '2018-05-04 22:32:20', '2018-05-04 22:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rac` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_card` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateregistred` date NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `sex`, `dob`, `email`, `rac`, `status`, `nationality`, `national_card`, `passport`, `phone`, `village`, `commune`, `district`, `province`, `current_address`, `dateregistred`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'sfd', 'fsd', 0, '2018-04-11', 'tanvir@gmail.com', 'sdf', '0', 'sdff', 'dsfds', 'efwe', 'ewfsw', 'efws', 'ewfe', 'werfwe', 'fwerf', 'wefwsfc', '2018-04-11', '', 1, '2018-04-11 00:40:49', '2018-04-11 00:40:49'),
(9, 'erwf', 'erw', 0, '2018-04-10', 'tanvir@gmail.com', 'fdwef', '0', 'fwsc', 'rgfed', 'fewerf', 'ewfsw', 'efws', 'ewfe', 'efwe', 'fwerf', 'fwerf', '2018-04-11', '', 1, '2018-04-11 00:41:56', '2018-04-11 00:41:56'),
(10, 'erwf', 'erw', 0, '2018-04-10', 'tanvir@gmail.com', 'fdwef', '0', 'fwsc', 'rgfed', 'fewerf', 'ewfsw', 'efws', 'ewfe', 'efwe', 'fwerf', 'fwerf', '2018-04-11', '', 1, '2018-04-11 00:42:17', '2018-04-11 00:42:17'),
(11, 'rfg', 'fwefw', 0, '2018-04-02', 'tanvirkhan6364@gmail.com', 'fdwef', '0', 'edfwef', 'rgfed', 'efwe', 'ewfsw', 'efws', 'ewfe', 'werfwe', 'efwef', 'fwerf', '2018-04-11', '', 1, '2018-04-11 00:52:46', '2018-04-11 00:52:46'),
(12, 'rfg', 'fewrf', 0, '2018-04-11', 'tanvir@gmail.com', 'fecsdf', '0', 'fwsc', 'GHF', 'efwe', 'wfeewr', 'efws', 'ewfe', 'werfwe', 'efwef', 'fwerf', '2018-04-11', '', 1, '2018-04-11 00:55:09', '2018-04-11 00:55:09'),
(13, 'rfg', 'fewrf', 0, '2018-04-11', 'tanvir@gmail.com', 'fecsdf', '0', 'fwsc', 'GHF', 'efwe', 'wfeewr', 'efws', 'ewfe', 'werfwe', 'efwef', 'fwerf', '2018-04-11', '', 1, '2018-04-11 00:55:41', '2018-04-11 00:55:41'),
(14, 'rfg', 'fewrf', 0, '2018-04-11', 'tanvir@gmail.com', 'fecsdf', '0', 'fwsc', 'GHF', 'efwe', 'wfeewr', 'efws', 'ewfe', 'werfwe', 'efwef', 'fwerf', '2018-04-11', '92240.2018-04-11.1523429769.jpeg', 1, '2018-04-11 00:56:09', '2018-04-11 00:56:09'),
(15, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '82962.2018-04-12.1523556745.jpg', 1, '2018-04-12 12:12:25', '2018-04-12 12:12:25'),
(16, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '43159.2018-04-12.1523556945.jpg', 1, '2018-04-12 12:15:45', '2018-04-12 12:15:45'),
(17, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '42228.2018-04-12.1523557127.jpg', 1, '2018-04-12 12:18:47', '2018-04-12 12:18:47'),
(18, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '55957.2018-04-12.1523557769.jpg', 1, '2018-04-12 12:29:29', '2018-04-12 12:29:29'),
(19, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '24315.2018-04-12.1523558120.jpg', 1, '2018-04-12 12:35:20', '2018-04-12 12:35:20'),
(20, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '15732.2018-04-12.1523558983.jpg', 1, '2018-04-12 12:49:43', '2018-04-12 12:49:43'),
(21, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '13291.2018-04-12.1523559120.jpg', 1, '2018-04-12 12:52:00', '2018-04-12 12:52:00'),
(22, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '52569.2018-04-12.1523559184.jpg', 1, '2018-04-12 12:53:04', '2018-04-12 12:53:04'),
(23, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '82300.2018-04-12.1523559216.jpg', 1, '2018-04-12 12:53:36', '2018-04-12 12:53:36'),
(24, 'Tanvir', 'Khan', 0, '1996-10-25', 'tanvirkhan6364@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', '1996xxxxxxxxxxxxxxxxxxxxxxxxx', '01911893172', 'Ziri', 'Bangladeshi', 'Patya', 'Bangladeshi', 'Banglabazar', '2018-04-12', '92870.2018-04-12.1523559340.jpg', 1, '2018-04-12 12:55:40', '2018-04-12 12:55:40'),
(25, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '21402.2018-04-18.1524083908.jpg', 1, '2018-04-18 14:38:28', '2018-04-18 14:38:28'),
(26, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '70970.2018-04-18.1524084356.jpg', 1, '2018-04-18 14:45:56', '2018-04-18 14:45:56'),
(27, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '69743.2018-04-18.1524084417.jpg', 1, '2018-04-18 14:46:57', '2018-04-18 14:46:57'),
(28, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '42449.2018-04-18.1524084437.jpg', 1, '2018-04-18 14:47:17', '2018-04-18 14:47:17'),
(29, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '81171.2018-04-18.1524084618.jpg', 1, '2018-04-18 14:50:18', '2018-04-18 14:50:18'),
(30, 'Sahabuz', 'Abdullah', 0, '2016-09-01', 'xxx@xx.com', 'xxx', '0', 'xxx', 'xxx', 'xxx', '019xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', '2018-04-18', '57361.2018-04-18.1524084771.jpg', 1, '2018-04-18 14:52:51', '2018-04-18 14:52:51'),
(31, 'edf', 'fewrf', 0, '2018-04-16', 'tanvir@gmail.com', 'fdwef', '0', 'fwsc', 'rgfed', 'efwe', '01911893172', 'ewfde', 'ewfcwsf', 'werfwe', 'efwef', 'fwerf', '2018-04-19', '', 1, '2018-04-18 22:49:08', '2018-04-18 22:49:08'),
(32, 'edf', 'fewrf', 0, '2018-04-16', 'tanvir@gmail.com', 'fdwef', '0', 'fwsc', 'rgfed', 'efwe', '01911893172', 'ewfde', 'ewfcwsf', 'werfwe', 'efwef', 'fwerf', '2018-04-19', '', 1, '2018-04-18 22:49:33', '2018-04-18 22:49:33'),
(33, 'edf', 'fewrf', 0, '2018-04-16', 'tanvir@gmail.com', 'fdwef', '0', 'fwsc', 'rgfed', 'efwe', '01911893172', 'ewfde', 'ewfcwsf', 'werfwe', 'efwef', 'fwerf', '2018-04-19', '', 1, '2018-04-18 22:50:34', '2018-04-18 22:50:34'),
(34, 'Sahabuz', 'Abdullah', 0, '1996-02-06', 'tanvir@gmail.com', 'Bangladeshi', '0', 'Bangladeshi', '1996xxxxxxxxxxxxxxxxxxx', 'xxx', '01911893172', 'xxx', 'xxx', 'xxx', 'xxx', 'HRTFHRT', '2018-04-19', '66265.2018-04-19.1524113546.jpg', 1, '2018-04-18 22:52:26', '2018-04-18 22:52:26'),
(35, 's', 's', 1, '2018-02-07', 'tanvir@gmail.com', 'Islam', '0', '1111', '11111', '234434', '4534534', 'ftgrsdfg', 'dfgdefg', 'fdgfd', 'dgdfgsd', 'sfgdfsgas', '2018-04-30', '69605.2018-04-30.1525120361.jpg', 1, '2018-04-30 14:32:41', '2018-04-30 14:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `time_id` int(10) UNSIGNED NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`time_id`, `time`, `created_at`, `updated_at`) VALUES
(1, '8.00am-12.00pm', '2018-04-10 00:49:19', '2018-04-10 00:49:19'),
(2, '12.00pm-3.00pm', '2018-04-10 00:49:32', '2018-04-10 00:49:32'),
(3, '3.00pm-5.00pm', '2018-04-10 00:49:50', '2018-04-10 00:49:50'),
(4, '5.00pm-9.00pm', '2018-04-10 00:49:57', '2018-04-10 00:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transact_id` int(10) UNSIGNED NOT NULL,
  `transact_date` datetime NOT NULL,
  `remark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` double(8,2) NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `s_fee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transact_id`, `transact_date`, `remark`, `description`, `paid`, `fee_id`, `student_id`, `user_id`, `s_fee_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-12 18:56:34', 'Good', 'basic', 250.00, 1, 24, 1, 1, '2018-04-12 12:59:30', '2018-04-12 12:59:30'),
(2, '2018-04-12 19:01:40', 'sdc', 'cvdf', 300.00, 1, 11, 1, 2, '2018-04-12 13:01:52', '2018-04-12 13:01:52'),
(3, '2018-04-12 20:19:58', 'dcd', 'cdc', 200.00, 1, 11, 1, 3, '2018-04-12 14:20:24', '2018-04-12 14:20:24'),
(4, '2018-04-12 20:20:25', NULL, NULL, 100.00, 1, 11, 1, 4, '2018-04-12 14:21:21', '2018-04-12 14:21:21'),
(5, '2018-04-13 20:48:35', 'Good', 'basic', 200.00, 2, 8, 1, 5, '2018-04-13 14:51:06', '2018-04-13 14:51:06'),
(6, '2018-04-14 18:41:33', NULL, NULL, 100.00, 1, 23, 1, 6, '2018-04-14 12:41:48', '2018-04-14 12:41:48'),
(7, '2018-04-14 19:31:22', NULL, NULL, 50.00, 1, 23, 1, 6, '2018-04-14 13:31:51', '2018-04-14 13:31:51'),
(10, '2018-04-17 20:22:00', 'nn', 'complete taka', 200.00, 1, 24, 1, 8, '2018-04-17 14:32:30', '2018-04-17 14:32:30'),
(11, '2018-04-19 05:43:00', 'Sahabuz Pay', 'Half Pay', 5000.00, 3, 34, 1, 10, '2018-04-18 23:43:29', '2018-04-18 23:43:29'),
(13, '2018-04-30 20:34:57', 'dd', 'dd', 10.00, 5, 35, 1, 11, '2018-04-30 14:35:15', '2018-04-30 14:35:15'),
(14, '2018-05-05 04:28:55', NULL, NULL, 100.00, 1, 24, 1, 12, '2018-05-04 22:32:20', '2018-05-04 22:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tanvir Khan', 1, 'tanvir@gmail.com', '$2y$10$2MqR/yCg.xEkhAOCDxTReeAiSkpKdfnIWKlkENxPPZA1rFplaTQXW', 'E8VcvRhMTSL3azjIQHmcBX0kE5zXMg65ywLndBE7ky0tXtFK9zL9VuibGZRX', '2018-04-10 00:30:58', '2018-04-10 00:30:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `classes_academic_id_foreign` (`academic_id`),
  ADD KEY `classes_level_id_foreign` (`level_id`),
  ADD KEY `classes_shift_id_foreign` (`shift_id`),
  ADD KEY `classes_time_id_foreign` (`time_id`),
  ADD KEY `classes_group_id_foreign` (`group_id`),
  ADD KEY `classes_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `fees_academic_id_foreign` (`academic_id`),
  ADD KEY `fees_level_id_foreign` (`level_id`),
  ADD KEY `fees_fee_type_id_foreign` (`fee_type_id`);

--
-- Indexes for table `feetypes`
--
ALTER TABLE `feetypes`
  ADD PRIMARY KEY (`fee_type_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `levels_program_id_foreign` (`program_id`);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `receiptdetails`
--
ALTER TABLE `receiptdetails`
  ADD PRIMARY KEY (`receiptdetail_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `statuses_student_id_foreign` (`student_id`),
  ADD KEY `statuses_class_id_foreign` (`class_id`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`s_fee_id`),
  ADD KEY `studentfees_fee_id_foreign` (`fee_id`),
  ADD KEY `studentfees_student_id_foreign` (`student_id`),
  ADD KEY `studentfees_level_id_foreign` (`level_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `transactions_fee_id_foreign` (`fee_id`),
  ADD KEY `transactions_student_id_foreign` (`student_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_s_fee_id_foreign` (`s_fee_id`);

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
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `academic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feetypes`
--
ALTER TABLE `feetypes`
  MODIFY `fee_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `receiptdetails`
--
ALTER TABLE `receiptdetails`
  MODIFY `receiptdetail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `shift_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `s_fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `time_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `classes_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `classes_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `classes_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `classes_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`shift_id`),
  ADD CONSTRAINT `classes_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`time_id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `fees_fee_type_id_foreign` FOREIGN KEY (`fee_type_id`) REFERENCES `feetypes` (`fee_type_id`),
  ADD CONSTRAINT `fees_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `statuses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD CONSTRAINT `studentfees_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `studentfees_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `studentfees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `transactions_s_fee_id_foreign` FOREIGN KEY (`s_fee_id`) REFERENCES `studentfees` (`s_fee_id`),
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
