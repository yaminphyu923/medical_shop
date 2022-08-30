-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 08:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test', '2022-06-26 12:07:17', '2022-06-26 12:07:17'),
(2, 'Lorem', '2022-06-26 12:07:24', '2022-06-26 12:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `nrc`, `email`, `age`, `sex`, `address`, `occupation`, `created_at`, `updated_at`) VALUES
(1, 'John', '09799123123', '12/John(N)123456', 'john@gmail.com', 50, 'male', 'Yangon', NULL, '2022-06-27 15:12:11', '2022-06-27 15:12:11'),
(4, 'Ma Maw', '09123123', '12/MAW(N)000000', 'maw@gmail.com', 34, 'Female', 'Yangon', NULL, '2022-07-06 05:19:48', '2022-07-06 05:20:53'),
(9, 'Hnin', '094200000000', '12/HNIN(N)123456', 'hnin@gamil.com', 23, 'Female', 'Ygn', NULL, '2022-08-08 05:14:22', '2022-08-08 05:14:22'),
(15, 'Tun', '09799147258', '12/TUN(N)123456', 'tun@gmail.com', 30, 'Female', 'Yangon', NULL, '2022-08-22 08:20:35', '2022-08-22 08:20:45');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group`, `created_at`, `updated_at`) VALUES
(2, 'Capsule', '2022-07-01 08:33:06', '2022-07-01 08:33:06'),
(3, 'Pill', '2022-07-01 08:33:13', '2022-07-01 08:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `medical_lists`
--

CREATE TABLE `medical_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showqty` text COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `start_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_remaining` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_remaining_qty` text COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_lists`
--

INSERT INTO `medical_lists` (`id`, `name`, `qty`, `total_qty`, `showqty`, `start_date`, `category_id`, `group_id`, `original_price`, `price`, `unit_id`, `expired_date`, `customer_id`, `last_remaining`, `last_remaining_qty`, `photo`, `note`, `created_at`, `updated_at`) VALUES
(26, 'Capsule', '500', '418', '1', '2022-07-20', '2', '2', '150', '[\"220\",\"250\",\"300\"]', NULL, '2024-07-20', NULL, 'No', NULL, '1658328082_capsules.png', 'remark', '2022-07-20 14:41:22', '2022-08-24 05:50:29'),
(27, 'Pill', '500', '421', '1', '2022-07-20', '2', '3', '100', NULL, NULL, '2024-07-20', NULL, 'No', NULL, '1658331685_pill.png', NULL, '2022-07-20 15:41:25', '2022-08-23 16:25:03'),
(28, 'Medicine', '500', '462', '1', '2022-07-20', '2', '3', '100', NULL, NULL, '2024-07-20', NULL, 'No', NULL, '1658331732_medicine.png', NULL, '2022-07-20 15:42:12', '2022-08-24 06:01:39'),
(34, 'Pill 15', '500', '472', '1', '2022-08-08', '2', '3', '80', NULL, NULL, '2024-08-06', NULL, 'No', NULL, '1659797258_pill15.jpg', NULL, '2022-08-06 14:47:38', '2022-08-24 06:01:38'),
(38, 'Syrup', '500', '488', '1', '2022-08-22', '1', '2', '100', '[\"150\",\"200\"]', NULL, '2024-08-22', NULL, 'No', NULL, '1661156722_syrup.png', 'note', '2022-08-22 08:25:22', '2022-08-24 06:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `medical_list_prices`
--

CREATE TABLE `medical_list_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_list_prices`
--

INSERT INTO `medical_list_prices` (`id`, `medical_list_id`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(17, '26', '220', NULL, '2022-07-20 14:41:22', '2022-07-20 14:47:12'),
(18, '26', '250', NULL, '2022-07-20 14:41:22', '2022-07-20 14:47:12'),
(19, '26', '300', NULL, '2022-07-20 14:41:22', '2022-07-20 14:47:12'),
(20, '27', '150', NULL, '2022-07-20 15:41:25', '2022-07-20 15:41:25'),
(21, '27', '160', NULL, '2022-07-20 15:41:25', '2022-07-20 15:41:25'),
(22, '27', '170', NULL, '2022-07-20 15:41:25', '2022-07-20 15:41:25'),
(23, '28', '110', NULL, '2022-07-20 15:42:12', '2022-07-20 15:42:12'),
(24, '28', '120', NULL, '2022-07-20 15:42:12', '2022-07-20 15:42:12'),
(25, '28', '130', NULL, '2022-07-20 15:42:12', '2022-07-20 15:42:12'),
(26, '29', '100', NULL, '2022-07-21 16:16:44', '2022-07-21 16:16:44'),
(27, '30', NULL, NULL, '2022-07-21 16:17:08', '2022-07-21 16:17:08'),
(28, '31', NULL, NULL, '2022-07-21 16:17:43', '2022-07-21 16:17:43'),
(29, '32', '100', NULL, '2022-08-05 13:54:30', '2022-08-05 14:27:09'),
(30, '33', '100', NULL, '2022-08-05 13:55:35', '2022-08-05 13:55:35'),
(31, '34', '100', NULL, '2022-08-06 14:47:38', '2022-08-06 14:47:38'),
(32, '34', '200', NULL, '2022-08-06 14:47:38', '2022-08-06 14:47:38'),
(33, '36', '150', NULL, '2022-08-08 05:45:10', '2022-08-08 09:18:23'),
(34, '36', '120', NULL, '2022-08-08 05:45:10', '2022-08-08 09:18:23'),
(35, '38', '150', NULL, '2022-08-22 08:25:22', '2022-08-22 08:27:49'),
(36, '38', '200', NULL, '2022-08-22 08:25:22', '2022-08-22 08:27:49'),
(37, '39', NULL, NULL, '2022-08-22 08:28:01', '2022-08-22 08:28:01');

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
(5, '2022_06_15_154350_create_customers_table', 1),
(6, '2022_06_16_114739_create_medical_lists_table', 1),
(7, '2022_06_16_115429_create_categories_table', 1),
(8, '2022_06_16_215423_create_warning_quantities_table', 1),
(9, '2022_06_18_133841_create_refills_table', 1),
(10, '2022_06_19_103627_create_orders_table', 1),
(11, '2022_06_21_131953_create_permission_tables', 1),
(12, '2022_06_21_211617_create_units_table', 1),
(13, '2022_06_25_235251_create_medical_list_prices_table', 1),
(14, '2022_07_01_144801_create_groups_table', 2),
(15, '2022_07_02_212110_create_order_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_money` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_money` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `voucher`, `medical_list_id`, `price`, `qty`, `total_amount`, `customer_id`, `debt_money`, `debt`, `pay_money`, `status`, `created_at`, `updated_at`) VALUES
(177, '#238538', NULL, NULL, NULL, NULL, '15', '0', NULL, '840', '0', '2022-08-24 06:01:38', '2022-08-24 06:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_money` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_money` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `medical_list_id`, `qty`, `price`, `total`, `customer_id`, `debt_money`, `pay_money`, `status`, `created_at`, `updated_at`) VALUES
(192, '177', '34', '1', '200', '200', NULL, NULL, NULL, '0', '2022-08-24 06:01:38', '2022-08-24 06:01:38'),
(193, '177', '38', '2', '200', '400', NULL, NULL, NULL, '0', '2022-08-24 06:01:38', '2022-08-24 06:01:38'),
(194, '177', '28', '2', '120', '240', '15', NULL, NULL, '0', '2022-08-24 06:01:39', '2022-08-24 06:02:26');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'medical-list', 'web', '2022-06-26 16:13:19', '2022-06-26 16:13:19'),
(2, 'medical-list-create', 'web', '2022-06-26 16:13:33', '2022-06-26 16:13:33'),
(3, 'medical-list-edit', 'web', '2022-06-26 16:13:42', '2022-06-26 16:13:42'),
(4, 'medical-list-delete', 'web', '2022-06-26 16:13:52', '2022-06-26 16:13:52'),
(5, 'medical-list-excel-export', 'web', '2022-06-26 16:14:05', '2022-06-26 16:14:05'),
(6, 'medical-list-excel-import', 'web', '2022-06-26 16:14:19', '2022-06-26 16:14:19'),
(7, 'medical-list-refill', 'web', '2022-06-26 16:14:31', '2022-06-26 16:14:31'),
(8, 'customer-list', 'web', '2022-06-27 14:32:17', '2022-06-27 14:32:17'),
(9, 'customer-create', 'web', '2022-06-27 14:32:27', '2022-06-27 14:32:27'),
(10, 'customer-edit', 'web', '2022-06-27 14:32:37', '2022-06-27 14:32:37'),
(11, 'customer-delete', 'web', '2022-06-27 14:32:46', '2022-06-27 14:32:46'),
(12, 'medical-list-category', 'web', '2022-06-27 15:14:25', '2022-06-27 15:14:25'),
(13, 'medical-list-expire', 'web', '2022-06-27 15:19:43', '2022-06-27 15:19:43'),
(14, 'medical-list-quantity', 'web', '2022-06-27 15:40:25', '2022-06-27 15:40:25'),
(15, 'medical-order-list', 'web', '2022-06-27 15:45:07', '2022-06-27 15:45:07'),
(16, 'order-list', 'web', '2022-06-27 15:45:21', '2022-06-27 15:45:21'),
(17, 'user-list', 'web', '2022-06-27 16:02:57', '2022-06-27 16:02:57'),
(18, 'user-create', 'web', '2022-06-27 16:03:11', '2022-06-27 16:03:11'),
(19, 'user-edit', 'web', '2022-06-27 16:03:21', '2022-06-27 16:03:21'),
(20, 'user-delete', 'web', '2022-06-27 16:03:34', '2022-06-27 16:03:34'),
(21, 'role-list', 'web', '2022-06-27 16:04:29', '2022-06-27 16:04:29'),
(22, 'role-create', 'web', '2022-06-27 16:04:41', '2022-06-27 16:04:41'),
(23, 'role-edit', 'web', '2022-06-27 16:04:50', '2022-06-27 16:04:50'),
(24, 'role-delete', 'web', '2022-06-27 16:05:01', '2022-06-27 16:05:01'),
(25, 'permission-list', 'web', '2022-06-27 16:09:00', '2022-06-27 16:09:00'),
(26, 'permission-create', 'web', '2022-06-27 16:09:12', '2022-06-27 16:09:12'),
(27, 'permission-edit', 'web', '2022-06-27 16:09:22', '2022-06-27 16:09:22'),
(28, 'permission-delete', 'web', '2022-06-27 16:09:33', '2022-06-27 16:09:33'),
(31, 'voucher-list', 'web', '2022-08-06 15:36:54', '2022-08-06 15:36:54');

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
-- Table structure for table `refills`
--

CREATE TABLE `refills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_exp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refills`
--

INSERT INTO `refills` (`id`, `medical_list_id`, `refill_qty`, `refill_exp`, `created_at`, `updated_at`) VALUES
(1, '3', '10', '2022-07-31', '2022-06-26 12:11:38', '2022-06-26 12:11:38'),
(2, '3', '10', '2022-09-26', '2022-06-26 12:11:48', '2022-06-26 12:11:48'),
(3, '2', '10', '2022-07-31', '2022-06-26 12:12:06', '2022-06-26 12:12:06'),
(4, '2', '10', '2022-09-26', '2022-06-26 12:12:17', '2022-06-26 12:12:17'),
(5, '1', '10', '2022-07-31', '2022-06-26 12:12:34', '2022-06-26 12:12:34'),
(6, '1', '20', '2022-08-28', '2022-06-26 12:12:47', '2022-06-26 12:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-26 16:16:14', '2022-06-26 16:16:14'),
(4, 'SuperAdmin', 'web', '2022-08-06 15:42:50', '2022-08-06 15:42:50'),
(6, 'User', 'web', '2022-08-22 08:31:30', '2022-08-22 08:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(1, 6),
(2, 1),
(2, 4),
(2, 6),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 1),
(19, 4),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 4),
(25, 1),
(25, 4),
(26, 1),
(26, 4),
(27, 1),
(27, 4),
(28, 1),
(28, 4),
(31, 1),
(31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-06-26 12:07:42', '2022-06-26 12:07:42'),
(2, '3', '2022-06-26 12:07:49', '2022-06-26 12:07:49'),
(3, '5', '2022-06-26 12:07:58', '2022-06-26 12:07:58'),
(4, '10', '2022-06-26 12:08:04', '2022-06-26 12:08:04'),
(5, '12', '2022-06-26 12:08:11', '2022-06-26 12:08:11');

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MMcities', 'mmcities@gmail.com', NULL, '$2y$10$8K749W3QeBRv/WbdnCEfFueq.9lkkmhWDKbgv0snlLhItojOaPXea', '0', NULL, '2022-06-26 12:04:36', '2022-08-06 15:43:29'),
(5, 'Yankin Aung', 'yankinaung@gmail.com', NULL, '$2y$10$23xaYl5JrgjXdOaY.iBkPu84OaiM1qrkoBJOKGkIZMC/NQrie3sfu', '0', NULL, '2022-08-16 15:16:38', '2022-08-16 15:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `warning_quantities`
--

CREATE TABLE `warning_quantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yellow_warning` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `red_warning` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_quantities`
--

INSERT INTO `warning_quantities` (`id`, `yellow_warning`, `red_warning`, `created_at`, `updated_at`) VALUES
(1, '40', '20', '2022-06-26 12:08:30', '2022-06-26 12:08:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_lists`
--
ALTER TABLE `medical_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_list_prices`
--
ALTER TABLE `medical_list_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `refills`
--
ALTER TABLE `refills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- Indexes for table `warning_quantities`
--
ALTER TABLE `warning_quantities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_lists`
--
ALTER TABLE `medical_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `medical_list_prices`
--
ALTER TABLE `medical_list_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refills`
--
ALTER TABLE `refills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warning_quantities`
--
ALTER TABLE `warning_quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
