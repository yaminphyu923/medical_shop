-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 06:27 PM
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
-- Database: `medical_shop`
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
(1, 'John', '09799123123', '12/John(N)123456', 'john@gmail.com', 50, 'male', 'Yangon', NULL, '2022-06-27 15:12:11', '2022-06-27 15:12:11');

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
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_remaining` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_remaining_qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_lists`
--

INSERT INTO `medical_lists` (`id`, `name`, `qty`, `total_qty`, `showqty`, `start_date`, `category_id`, `price`, `unit_id`, `expired_date`, `customer_id`, `last_remaining`, `last_remaining_qty`, `photo`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Medicine ONe', '50', '80', '1', '2022-06-01', '1', '200', NULL, '2022-07-26', NULL, 'No', NULL, '1656245371_medicine (1).png', 'Lorem', '2022-06-26 12:09:31', '2022-06-26 12:12:46'),
(2, 'Medicine Two', '50', '70', '1', '2022-06-01', '2', '100', NULL, '2022-07-31', NULL, 'Yes', '5', '1656245433_medicine (2).png', 'Test', '2022-06-26 12:10:33', '2022-06-26 12:12:16'),
(4, 'Medicine Three', '50', '50', '1', '2022-06-01', '2', '100', NULL, '2022-07-26', NULL, 'No', NULL, '1656246554_medicine (3).png', NULL, '2022-06-26 12:29:14', '2022-06-26 12:29:14'),
(5, 'Pill', '50', '50', '1', '2022-06-01', '2', '600', NULL, '2022-07-29', NULL, 'Yes', '5', '1656260369_pill.png', 'Note', '2022-06-26 16:19:30', '2022-06-26 16:21:53'),
(6, 'Capsule', '50', '50', '1', '2022-06-01', '2', '500', NULL, '2022-07-31', NULL, 'Yes', '5', '1656261183_capsules.png', 'Lorem Note', '2022-06-26 16:33:04', '2022-06-26 16:33:04');

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
(1, '1', '500', '1', '2022-06-26 12:09:31', '2022-06-26 12:09:31'),
(2, '1', '1000', '3', '2022-06-26 12:09:31', '2022-06-26 12:09:31'),
(3, '1', '2000', '5', '2022-06-26 12:09:32', '2022-06-26 12:09:32'),
(4, '1', '3000', '10', '2022-06-26 12:09:32', '2022-06-26 12:09:32'),
(5, '1', '4000', '12', '2022-06-26 12:09:32', '2022-06-26 12:09:32'),
(6, '2', '500', '1', '2022-06-26 12:10:33', '2022-06-26 12:10:33'),
(7, '2', '1000', '3', '2022-06-26 12:10:34', '2022-06-26 12:10:34'),
(8, '2', '2000', '5', '2022-06-26 12:10:34', '2022-06-26 12:10:34'),
(9, '2', '3000', '10', '2022-06-26 12:10:35', '2022-06-26 12:10:35'),
(10, '2', '4000', '12', '2022-06-26 12:10:35', '2022-06-26 12:10:35'),
(11, '3', '100', '1', '2022-06-26 12:11:18', '2022-06-26 12:11:18'),
(12, '3', '200', '3', '2022-06-26 12:11:18', '2022-06-26 12:11:18'),
(13, '3', '300', '5', '2022-06-26 12:11:19', '2022-06-26 12:11:19'),
(14, '4', '100', '1', '2022-06-26 12:29:14', '2022-06-26 12:29:14'),
(15, '4', '200', '3', '2022-06-26 12:29:14', '2022-06-26 12:29:14'),
(16, '4', '400', '5', '2022-06-26 12:29:15', '2022-06-26 12:29:15');

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
(13, '2022_06_25_235251_create_medical_list_prices_table', 1);

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
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order`, `voucher`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 'a:1:{i:0;a:17:{s:2:\"id\";s:1:\"5\";s:4:\"name\";s:4:\"Pill\";s:3:\"qty\";s:2:\"50\";s:9:\"total_qty\";s:2:\"50\";s:7:\"showqty\";s:1:\"1\";s:10:\"start_date\";s:10:\"2022-06-01\";s:11:\"category_id\";s:1:\"2\";s:5:\"price\";s:3:\"600\";s:7:\"unit_id\";s:0:\"\";s:12:\"expired_date\";s:10:\"2022-07-29\";s:11:\"customer_id\";s:0:\"\";s:14:\"last_remaining\";s:3:\"Yes\";s:18:\"last_remaining_qty\";s:1:\"5\";s:5:\"photo\";s:19:\"1656260369_pill.png\";s:4:\"note\";s:4:\"Note\";s:10:\"created_at\";s:27:\"2022-06-26T16:19:30.000000Z\";s:10:\"updated_at\";s:27:\"2022-06-26T16:21:53.000000Z\";}}', '1656347161406', 'a:1:{i:0;s:1:\"2\";}', '2022-06-27 16:26:07', '2022-06-27 16:26:07');

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
(28, 'permission-delete', 'web', '2022-06-27 16:09:33', '2022-06-27 16:09:33');

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
(1, 'Admin', 'web', '2022-06-26 16:16:14', '2022-06-26 16:16:14');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1);

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
(1, 'MMcities', 'mmcities@gmail.com', NULL, '$2y$10$YKaL/jxOu9LRe.8fMT0pYeQ5Ar23VQilZyTwsvUc6Q0RAIW3wbClW', '0', NULL, '2022-06-26 12:04:36', '2022-06-26 16:16:48');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_lists`
--
ALTER TABLE `medical_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_list_prices`
--
ALTER TABLE `medical_list_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warning_quantities`
--
ALTER TABLE `warning_quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
