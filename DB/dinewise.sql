-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2024 at 04:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinewise`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_payment`
--

CREATE TABLE `advance_payment` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  `month` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `uid` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` time DEFAULT NULL,
  `logout` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_rule` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_rules`
--

CREATE TABLE `attendance_rules` (
  `id` bigint UNSIGNED NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_rules`
--

INSERT INTO `attendance_rules` (`id`, `start`, `end`, `status`, `created_at`, `updated_at`) VALUES
(1, '07:00:00', '19:00:00', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `no_of_people` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booked_from` timestamp NULL DEFAULT NULL,
  `booked_to` timestamp NULL DEFAULT NULL,
  `tables` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `name`, `mobile`, `email`, `address`, `no_of_people`, `event`, `booked_from`, `booked_to`, `tables`, `amount`, `description`, `status`, `cancel_reason`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2024041', 'Subhan Raj', '9450430095', 'shubhanraj2002@gmail.com', '554/705, Bheem Nagar, Near Janta Girls Inter College', '10', 'Anniversary', '2024-04-30 03:37:00', '2024-05-03 03:37:00', NULL, '10000', '', NULL, NULL, NULL, '2024-04-28 03:38:06', '2024-04-28 03:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `create_payment`
--

CREATE TABLE `create_payment` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `month` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `dob`, `doa`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Vaibhav goswami', '7518445857', 'goswamivaibhav72@gmail.com', '2024-04-18', NULL, NULL, NULL, '2024-04-15 09:26:43', '2024-04-17 09:48:36'),
(2, 'Shazan Ateeq', '324354', 'digi@gmail.com', '2024-04-18', NULL, NULL, NULL, '2024-04-18 05:29:46', '2024-04-18 05:29:46'),
(3, 'Subhan Raj', '9919611222', 'shubhanraj2002@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_loyalty_points`
--

CREATE TABLE `customer_loyalty_points` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_loyalty_points`
--

INSERT INTO `customer_loyalty_points` (`id`, `customer_id`, `points`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 561, NULL, '2024-04-16 07:32:27', '2024-04-20 04:50:43'),
(2, '2', 90, NULL, '2024-04-18 12:23:41', '2024-04-18 12:27:51'),
(3, '3', 21, NULL, '2024-04-28 03:48:49', '2024-04-28 03:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `define_salary`
--

CREATE TABLE `define_salary` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_salary` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` bigint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  `month` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `source` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `req` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `business` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `service_taken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_from` date NOT NULL,
  `l_to` date NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reject_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `year` int NOT NULL,
  `month` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_fa_email` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_fa_phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `role`, `user_id`, `email`, `phone`, `password`, `two_fa_email`, `two_fa_phone`, `created_at`, `updated_at`) VALUES
(2, 'ADMIN', '123443', 'admin@gmail.com', '123456789', '$2y$10$iPTIfKy4yBWCsQZr0waxie6sfHQx1UO22j55CaZ0z6H03Rrsb8cpW', 'NO', ' NO', '2022-11-28 05:17:05', '2022-11-28 05:17:05'),
(8, 'STAFF', 'Vaibhav2023', 'goswamivaibhav72@gmail.com', '7518445857', '$2y$10$iPTIfKy4yBWCsQZr0waxie6sfHQx1UO22j55CaZ0z6H03Rrsb8cpW', 'NO', NULL, '2023-03-02 12:15:04', '2023-04-21 06:30:04'),
(10, 'RECEPTION', '46498213', 'reception@gmail.com', '45455', '$2y$10$iPTIfKy4yBWCsQZr0waxie6sfHQx1UO22j55CaZ0z6H03Rrsb8cpW', 'NO', NULL, '2023-04-15 05:30:36', '2023-04-15 05:30:36'),
(11, 'CHEF', 'chef@2023', 'chef@gmail.com', NULL, '$2y$10$iPTIfKy4yBWCsQZr0waxie6sfHQx1UO22j55CaZ0z6H03Rrsb8cpW', 'NO', 'NO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty`
--

CREATE TABLE `loyalty` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalty`
--

INSERT INTO `loyalty` (`id`, `amount`, `points`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '500', '100', '2024-04-18 09:58:24', '2024-04-15 10:59:15', '2024-04-15 10:59:15'),
(2, '3000', '200', '2024-04-18 09:58:24', '2024-04-15 12:20:57', '2024-04-15 12:20:57'),
(3, '5000', '300', '2024-04-18 09:58:25', '2024-04-16 06:39:45', '2024-04-16 06:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `img_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `img_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'f991cb0cfa7912.jpg', NULL, '2024-01-20 11:37:23', '2024-01-20 11:37:23'),
(9, '7aae33bb329872.png', NULL, '2024-01-25 06:54:23', '2024-01-25 06:54:23'),
(10, '6f4f0ac4a73661.jpg', NULL, '2024-01-25 07:16:23', '2024-01-25 07:16:23'),
(11, '86c10e3bc38751.jpg', NULL, '2024-01-25 07:17:25', '2024-01-25 07:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_13_094653_create_product_categories_table', 2),
(4, '2023_03_13_095039_product_categories_add_softdelete', 3),
(5, '2023_03_14_070345_create_pricing_units_table', 4),
(6, '2023_03_14_094853_create_product_models_table', 5),
(7, '2023_03_15_075458_create_product_materials_table', 6),
(8, '2023_03_15_124341_create_table_models_table', 7),
(9, '2023_03_16_061620_create_bookings_table', 8),
(11, '2023_03_21_072740_create_stared_products_table', 9),
(12, '2023_03_24_065404_create_customers_models_table', 10),
(13, '2023_03_17_075713_create_orders_table', 11),
(14, '2024_04_15_154321_create_loyalty_models_table', 12),
(15, '2024_04_16_115137_create_customer_loyalty_points_models_table', 13),
(16, '2024_04_16_160813_create_setting_models_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int UNSIGNED NOT NULL,
  `order_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productData` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectedTable` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_people` int NOT NULL,
  `table_status` int NOT NULL DEFAULT '0',
  `customer_or_booking` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id_or_booking_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderInstruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_item` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_amount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_discount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loyalty_used` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payable_amount` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `grand_amount` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chef_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'RECEIVED',
  `date` date DEFAULT NULL,
  `month` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `productData`, `selectedTable`, `no_of_people`, `table_status`, `customer_or_booking`, `customer_id_or_booking_id`, `orderInstruction`, `total_item`, `total_amount`, `gst_amount`, `discount_amount`, `loyalty_discount`, `loyalty_used`, `payable_amount`, `payment_method`, `other_method`, `grand_amount`, `payment_status`, `status`, `chef_status`, `date`, `month`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2024041', '[{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":2,\"price_per_unit\":220,\"product_price\":440,\"order_status\":\"Prepared\"},{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":180,\"product_price\":180,\"order_status\":\"Recieved\"},{\"product_id\":\"8F0D908618\",\"product_name\":\"Green Tea\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":50,\"product_price\":50,\"order_status\":\"Processing\"}]', '[\"1\"]', 2, 1, 'customers', '1', '', '3', '670', '134', '0', '5', '100', '799', 'card', '', '804', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 05:47:53', '2024-04-19 06:49:47'),
(2, '2024042', '[{\"product_id\":\"F95EA1F2A9\",\"product_name\":\"Mineral Water\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Bottle\",\"product_qty\":\"1\",\"price_per_unit\":\"20\",\"product_price\":\"20\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"F95EA1F2A9Bottle\"},{\"product_id\":\"2DF34B9EA4\",\"product_name\":\"Soft Drink\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Bottle\",\"product_qty\":\"1\",\"price_per_unit\":\"60\",\"product_price\":\"60\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"2DF34B9EA4Bottle\"},{\"product_id\":\"833C6BD3D6\",\"product_name\":\"Masal Shikanji\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"100\",\"product_price\":\"100\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"833C6BD3D6Item\"},{\"product_id\":\"37EBBCC2A5\",\"product_name\":\"Diet Cold Drink\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"100\",\"product_price\":\"100\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"37EBBCC2A5Item\"},{\"product_id\":\"F815B4A1DD\",\"product_name\":\"Mango Delight\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"150\",\"product_price\":\"150\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"F815B4A1DDItem\"},{\"product_id\":\"5FBA9AA9E7\",\"product_name\":\"Paneer Tikka Pizza\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"250\",\"product_price\":\"250\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"5FBA9AA9E7Item\"},{\"product_id\":\"22EE424D02\",\"product_name\":\"Margherita Pizza\",\"product_img\":\"<img src=\'http:\\/\\/127.0.0.1:8000\\/mystorage\\/media\\/f991cb0cfa7912.jpg\'>\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"220\",\"product_price\":\"220\",\"status\":\"saved\",\"order_status\":\"Recieved\",\"id\":\"22EE424D02Item\"}]', '[\"2\"]', 1, 1, 'customers', '1', 'hello', '7', '900', '180', '0', '0', '0', '1080', 'cash', NULL, '1080', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 06:12:36', '2024-04-19 07:48:03'),
(3, '2024043', '[{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"180\",\"product_price\":\"180\",\"order_status\":\"Processing\"},{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"220\",\"product_price\":\"220\",\"order_status\":\"Recieved\"},{\"product_id\":\"9F11CABED2\",\"product_name\":\"Ckn Mandi\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"599\",\"product_price\":\"599\",\"order_status\":\"Recieved\"},{\"product_id\":\"AA8729FC7C\",\"product_name\":\"Bun Kebab\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"150\",\"product_price\":\"150\",\"order_status\":\"Recieved\"},{\"product_id\":\"BCA2CF7DF6\",\"product_name\":\"Hell\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"120\",\"product_price\":\"120\",\"order_status\":\"Recieved\"}]', '[\"1\"]', 2, 1, 'customers', '1', '', '5', '1269', '254', '20', '5', '100', '1498', 'cash', '', '1523', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 07:12:05', '2024-04-19 07:47:49'),
(4, '2024044', '[{\"product_id\":\"8FE3BAD9A1\",\"product_name\":\"Ckn Perry Perry\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"230\",\"product_price\":\"230\",\"order_status\":\"Recieved\"},{\"product_id\":\"8FDF39B58F\",\"product_name\":\"Crunchy Chicken\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"300\",\"product_price\":\"300\",\"order_status\":\"Recieved\"},{\"product_id\":\"F257E4C13B\",\"product_name\":\"Chicken Steak\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"350\",\"product_price\":\"350\",\"order_status\":\"Recieved\"},{\"product_id\":\"26725E3C51\",\"product_name\":\"Chicken Sandwich\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"180\",\"product_price\":\"180\",\"order_status\":\"Recieved\"}]', '[\"5\"]', 2, 1, 'customers', '1', '', '4', '1060', '212', '100', '5', '100', '1167', 'upi', '', '1272', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 07:25:03', '2024-04-19 07:46:45'),
(5, '2024045', '[{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"220\",\"product_price\":\"220\",\"order_status\":\"Recieved\"},{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"180\",\"product_price\":\"180\",\"order_status\":\"Recieved\"},{\"product_id\":\"5FC90AF235\",\"product_name\":\"CKN Korma\",\"product_unit\":\"Full\",\"product_qty\":1,\"price_per_unit\":\"550\",\"product_price\":\"550\",\"order_status\":\"Recieved\"},{\"product_id\":\"38A4CF75EC\",\"product_name\":\"Trinidadian CKN\",\"product_unit\":\"Half\",\"product_qty\":1,\"price_per_unit\":\"320\",\"product_price\":\"320\",\"order_status\":\"Recieved\"},{\"product_id\":\"24ACC4CAEF\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"95\",\"product_price\":\"95\",\"order_status\":\"Recieved\"}]', '[\"1\"]', 2, 1, 'customers', '1', '', '5', '1365', '273', '0', '0', '0', '1638', 'card', NULL, '1638', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 07:59:44', '2024-04-19 09:25:09'),
(6, '2024046', '[{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":220,\"product_price\":220,\"order_status\":\"Recieved\"},{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":180,\"product_price\":180,\"order_status\":\"Recieved\"},{\"product_id\":\"26725E3C51\",\"product_name\":\"Chicken Sandwich\",\"product_unit\":\"Item\",\"product_qty\":2,\"price_per_unit\":180,\"product_price\":360,\"order_status\":\"Recieved\"}]', '[\"2\"]', 2, 1, 'customers', '1', 'fsdfdsf', '3', '760', '152', '50', '1', '10', '861', 'cash', NULL, '912', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 09:22:32', '2024-04-19 09:24:50'),
(7, '2024047', '[{\"product_id\":\"F95EA1F2A9\",\"product_name\":\"Mineral Water\",\"product_unit\":\"Bottle\",\"product_qty\":\"1\",\"price_per_unit\":\"20\",\"product_price\":\"20\",\"order_status\":\"Prepared\"},{\"product_id\":\"B70752D21A\",\"product_name\":\"Red Bull\",\"product_unit\":\"Bottle\",\"product_qty\":\"3\",\"price_per_unit\":\"190\",\"product_price\":\"570\",\"order_status\":\"Prepared\"}]', '[\"2\"]', 1, 1, 'customers', '1', 'Hello this is vaibhav goswami', '2', '590', '118', '0', '0', '0', '708', 'cash', NULL, '708', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 09:27:12', '2024-04-19 09:29:02'),
(8, '2024048', '[{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"220\",\"product_price\":\"220\",\"order_status\":\"Recieved\"},{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"180\",\"product_price\":\"180\",\"order_status\":\"Recieved\"},{\"product_id\":\"5A61DEE9B0\",\"product_name\":\"Butter Naan\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"60\",\"product_price\":\"60\",\"order_status\":\"Recieved\"}]', '[\"1\"]', 2, 1, 'customers', '1', '', '3', '460', '92', '0', '0', '0', '552', 'cash', NULL, '552', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 09:36:01', '2024-04-20 04:50:43'),
(9, '2024049', '[{\"product_id\":\"FF6884ECEC\",\"product_name\":\"Chicken Chilli\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"220\",\"product_price\":\"220\",\"order_status\":\"Processing\"},{\"product_id\":\"E1B90029D9\",\"product_name\":\"Chicken Spring Roll\",\"product_unit\":\"Item\",\"product_qty\":1,\"price_per_unit\":\"180\",\"product_price\":\"180\",\"order_status\":\"Prepared\"}]', '[\"2\"]', 2, 1, 'customers', '1', '', '2', '400', '80', '0', '0', '0', '480', 'cash', NULL, '480', 'done', 'completed', 'RECEIVED', '2024-04-19', 'April', '2024', NULL, '2024-04-19 10:01:41', '2024-04-27 04:12:22'),
(10, '20240410', '[{\"product_id\":\"5FBA9AA9E7\",\"product_name\":\"Paneer Tikka Pizza\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"250\",\"product_price\":\"250\",\"order_status\":\"Prepared\"},{\"product_id\":\"D025662986\",\"product_name\":\"Vanilla\",\"product_unit\":\"Item\",\"product_qty\":\"1\",\"price_per_unit\":\"95\",\"product_price\":\"95\",\"order_status\":\"Processing\"}]', '[\"5\"]', 1, 1, 'customers', '3', 'Make it quick', '2', '345', '69', '10', '0', '0', '404', 'cash', NULL, '414', 'done', 'completed', 'RECEIVED', '2024-04-28', 'April', '2024', NULL, '2024-04-28 03:45:33', '2024-04-28 03:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing_units`
--

CREATE TABLE `pricing_units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_units`
--

INSERT INTO `pricing_units` (`id`, `unit_id`, `unit`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1BD3C3F2C3', 'Half', NULL, '2024-04-15 05:54:11', '2024-04-15 05:54:11'),
(2, '5745B42161', 'Full', NULL, '2024-04-15 05:54:16', '2024-04-15 05:54:16'),
(3, '4A0047EC71', 'Bottle', NULL, '2024-04-15 05:54:23', '2024-04-15 05:54:23'),
(4, 'C7AAE55036', 'Cup', NULL, '2024-04-15 05:54:30', '2024-04-15 05:54:30'),
(5, '55D726FDFE', 'Item', NULL, '2024-04-15 05:54:52', '2024-04-15 05:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `auto_product_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stared` int DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `auto_product_id`, `product_id`, `cat_id`, `product_name`, `product_image`, `stock`, `price`, `status`, `stared`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'F95EA1F2A9', '983B3ED4F5', '1EA155686F', 'Mineral Water', '8', '10', '[[\"4A0047EC71\",\"20\"]]', NULL, 0, NULL, '2024-04-15 05:56:32', '2024-04-15 05:56:32'),
(2, '2DF34B9EA4', 'ED653F1AEE', '1EA155686F', 'Soft Drink', '8', '10', '[[\"4A0047EC71\",\"60\"]]', NULL, 0, NULL, '2024-04-15 05:57:34', '2024-04-15 05:57:34'),
(3, '97BE341668', 'CA52EED480', '1EA155686F', 'Fresh Lime Soda (Sweet/Salty)', '8', '10', '[[\"55D726FDFE\",\"80\"]]', NULL, 0, NULL, '2024-04-15 05:59:18', '2024-04-15 05:59:18'),
(4, 'B70752D21A', '984945DEFD', '1EA155686F', 'Red Bull', '8', '10', '[[\"4A0047EC71\",\"190\"]]', NULL, 0, NULL, '2024-04-15 05:59:46', '2024-04-15 05:59:46'),
(5, '4D3EAD42F5', '3938E1D128', '1EA155686F', 'Masal Coke', '8', '10', '[[\"55D726FDFE\",\"100\"]]', NULL, 0, NULL, '2024-04-15 06:00:20', '2024-04-15 06:00:20'),
(6, '37EBBCC2A5', '259F1080C4', '1EA155686F', 'Diet Cold Drink', '8', '10', '[[\"55D726FDFE\",\"100\"]]', NULL, 0, NULL, '2024-04-15 06:00:54', '2024-04-15 06:00:54'),
(7, '833C6BD3D6', 'C5E8C8442F', '1EA155686F', 'Masal Shikanji', '8', '10', '[[\"55D726FDFE\",\"100\"]]', NULL, 0, NULL, '2024-04-15 06:01:16', '2024-04-15 06:01:16'),
(8, 'BCA2CF7DF6', 'F1A82F6A8C', '1EA155686F', 'Hell', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:01:31', '2024-04-15 06:01:31'),
(9, '41F5403692', 'FF1416D5F1', '08B016EC75', 'Virgin Mojito', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:02:57', '2024-04-15 06:02:57'),
(10, 'EDE1F2A7FB', 'F45F24E078', '08B016EC75', 'Blueberry Mojito', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:03:22', '2024-04-15 06:03:22'),
(11, '1C1FDD46D4', '3E154D3B54', '08B016EC75', 'Pina Colada', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:03:47', '2024-04-15 06:03:47'),
(12, '4A5FD5D03E', 'B17F22E58D', '08B016EC75', 'Laughing Buddha', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:04:21', '2024-04-15 06:04:21'),
(13, '6A35F19A6F', 'E1ACB0C248', '08B016EC75', 'Blue Lagoon', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:05:05', '2024-04-15 06:05:05'),
(14, 'F815B4A1DD', 'C483938320', '08B016EC75', 'Mango Delight', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:05:36', '2024-04-15 06:05:36'),
(15, 'E817BCC271', '90DAC5AD8C', '08B016EC75', 'Fruit Punch', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:06:05', '2024-04-15 06:06:05'),
(16, 'A1009439F0', 'B0E5B5C241', '08B016EC75', 'Green Apple Mojito', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:06:34', '2024-04-15 06:06:34'),
(17, 'F48B4F8517', '64699C54F2', '08B016EC75', 'Virgin Strawberry Diaquiri', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:07:07', '2024-04-15 06:07:07'),
(18, '2983DA4CA6', '8A74F345AD', '75D3B746C7', 'Tea', '8', '10', '[[\"55D726FDFE\",\"50\"]]', NULL, 0, NULL, '2024-04-15 06:07:32', '2024-04-15 06:07:32'),
(19, '598AB213FB', 'AC0E10A24E', '75D3B746C7', 'Assam Tea', '8', '10', '[[\"55D726FDFE\",\"50\"]]', NULL, 0, NULL, '2024-04-15 06:07:53', '2024-04-15 06:07:53'),
(20, '8F0D908618', '7037B04718', '75D3B746C7', 'Green Tea', '8', '10', '[[\"55D726FDFE\",\"50\"]]', NULL, 0, NULL, '2024-04-15 06:08:22', '2024-04-15 06:08:22'),
(21, 'F924D5CB4B', '49AED7D744', '75D3B746C7', 'Masala Tea', '8', '10', '[[\"55D726FDFE\",\"60\"]]', NULL, 0, NULL, '2024-04-15 06:08:47', '2024-04-15 06:08:47'),
(22, '4983FE6A4D', 'D5AFE34AA6', '4A6E6C278D', 'Orange', '8', '10', '[[\"55D726FDFE\",\"90\"]]', NULL, 0, NULL, '2024-04-15 06:09:13', '2024-04-15 06:09:13'),
(23, 'A7AED33D6B', 'CFA6FBBEAA', '4A6E6C278D', 'Mango', '8', '10', '[[\"55D726FDFE\",\"90\"]]', NULL, 0, NULL, '2024-04-15 06:09:33', '2024-04-15 06:09:33'),
(24, 'B6C9893345', 'D67462E454', '4A6E6C278D', 'Cranberry', '8', '10', '[[\"55D726FDFE\",\"100\"]]', NULL, 0, NULL, '2024-04-15 06:10:02', '2024-04-15 06:10:02'),
(25, 'E682AC4196', '4716547A7C', '4A6E6C278D', 'Litchi', '8', '10', '[[\"55D726FDFE\",\"90\"]]', NULL, 0, NULL, '2024-04-15 06:10:30', '2024-04-15 06:10:30'),
(26, '8EE3588CB2', '8BDA0B9B24', '4A6E6C278D', 'Pineapple', '8', '10', '[[\"55D726FDFE\",\"90\"]]', NULL, 0, NULL, '2024-04-15 06:10:53', '2024-04-15 06:10:53'),
(27, '5709BADE8F', 'A4A1810B7A', '4A6E6C278D', 'Mixed', '8', '10', '[[\"55D726FDFE\",\"100\"]]', NULL, 0, NULL, '2024-04-15 06:11:14', '2024-04-15 06:11:14'),
(28, '62C4246E51', 'E823B18184', 'A5BC2D68C5', 'Chocolate Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:12:02', '2024-04-15 06:12:02'),
(29, '6E03CBD528', 'D178015C61', 'A5BC2D68C5', 'Strawberry Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:12:27', '2024-04-15 06:12:27'),
(30, 'C4BAB69C1C', '6E2BB5660A', 'A5BC2D68C5', 'Strawberry Lemonade', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:13:02', '2024-04-15 06:13:02'),
(31, 'D478BCEE57', '524A59123D', 'A5BC2D68C5', 'Butterschotch Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:13:42', '2024-04-15 06:13:42'),
(32, '89C08A5804', 'E4539CAB27', 'A5BC2D68C5', 'Vanilla Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:14:08', '2024-04-15 06:14:08'),
(33, 'E7F96AB648', '1BB5F968C8', 'A5BC2D68C5', 'Mango Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:14:30', '2024-04-15 06:14:30'),
(34, '928F70A7C4', '67B855A690', 'A5BC2D68C5', 'Snicker Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:14:56', '2024-04-15 06:14:56'),
(35, '3011603682', '1FCF6F3D4C', 'A5BC2D68C5', 'Oreo Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:15:19', '2024-04-15 06:15:19'),
(36, 'B0ADC1543D', 'F2E045C8E5', 'A5BC2D68C5', 'Kitkat Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:15:41', '2024-04-15 06:15:41'),
(37, '53B2866730', '906F7725FF', 'A5BC2D68C5', 'Caramel Shake', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:16:05', '2024-04-15 06:16:05'),
(38, '083F1BED75', '67DBB96D8A', 'A5BC2D68C5', 'Cold Coffee', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:16:29', '2024-04-15 06:16:29'),
(39, 'D2CDE46BC6', '73BDF0E08F', 'A5BC2D68C5', 'Cold Coffee With Ice Cream', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:17:00', '2024-04-15 06:17:00'),
(40, '92C3219A0F', '91AA49FFB0', 'A5BC2D68C5', 'Caribbean Special Shake', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:17:29', '2024-04-15 06:17:29'),
(41, 'D61A60D0E6', '1FFA5DE3FF', '3B5E1B7880', 'Veg Clear Soup', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:18:09', '2024-04-15 06:18:09'),
(42, '9FEBCFDF75', 'DA695C7F2E', '3B5E1B7880', 'Cream Of Tomato/Mushroom', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:18:42', '2024-04-15 06:18:42'),
(43, 'E150A11F36', 'DD37780706', '3B5E1B7880', 'Sweetcorn Soup', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:19:06', '2024-04-15 06:19:06'),
(44, 'C7529824EA', '52115CE0B2', '3B5E1B7880', 'Manchow Soup', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:19:58', '2024-04-15 06:19:58'),
(45, '8004D845D7', '61A19CF8F6', '3B5E1B7880', 'Hot & Sour', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:20:37', '2024-04-15 06:20:37'),
(46, 'F36603C184', 'AD18E51DB4', '3B5E1B7880', 'Pecking Soup', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:21:04', '2024-04-15 06:21:04'),
(47, '87F332FB78', '9293176D40', '3B5E1B7880', 'Tomato Soup', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:21:37', '2024-04-15 06:21:37'),
(48, '408B16078F', '687673E7C6', '2D5E6329C7', 'Chicken Hot N Sour', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:22:10', '2024-04-15 06:22:10'),
(49, '051F51B06C', '4CB3AF6207', '2D5E6329C7', 'Chicken Pecking Soup', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:22:37', '2024-04-15 06:22:37'),
(50, '274E0011F9', 'B8FDBB906F', '2D5E6329C7', 'Chicken Manchow', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:23:09', '2024-04-15 06:23:09'),
(51, '73F00387DE', 'BCE55E0DD3', '2D5E6329C7', 'Chicken Mushroom', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:23:41', '2024-04-15 06:23:41'),
(52, '7B7CB207BA', '6E61ED8931', '2D5E6329C7', 'Chicken Sweetcorn', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:24:04', '2024-04-15 06:24:04'),
(53, '1115A6A015', 'C8BF568B64', 'D830294A45', 'Paneer Chilli', '8', '10', '[[\"55D726FDFE\",\"190\"]]', NULL, 0, NULL, '2024-04-15 06:25:07', '2024-04-15 06:25:07'),
(54, '4E78C2AAE9', 'A1BB969E6E', 'D830294A45', 'Fried Rice', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:25:32', '2024-04-15 06:25:32'),
(55, '56427B7F9D', '954ECC3053', 'D830294A45', 'Veg. Noodles', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:26:02', '2024-04-15 06:26:02'),
(56, '790BA7E7B5', '4B0AD2F36A', 'D830294A45', 'Veg. Steamed Momos', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:26:29', '2024-04-15 06:26:29'),
(57, '1E66E5EBE0', '30070A1051', 'D830294A45', 'Veg. Momos Fried', '8', '10', '[[\"55D726FDFE\",\"140\"]]', NULL, 0, NULL, '2024-04-15 06:27:16', '2024-04-15 06:27:16'),
(58, '3AF7FA81B2', 'C3A36F4ED2', 'D830294A45', 'Sprink Roll', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:27:36', '2024-04-15 06:27:36'),
(59, '3306984554', '0ED8B4DC87', 'D830294A45', 'Veg. Manchurian', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:28:08', '2024-04-15 06:28:08'),
(60, '2CBA48BFE0', '868AB4A9B2', 'D830294A45', 'Honey Chilli Potato', '8', '10', '[[\"55D726FDFE\",\"160\"]]', NULL, 0, NULL, '2024-04-15 06:28:56', '2024-04-15 06:28:56'),
(61, 'DB5C83EB19', 'D9424F49B1', 'D830294A45', 'Caribbean Maggi', '8', '10', '[[\"55D726FDFE\",\"130\"]]', NULL, 0, NULL, '2024-04-15 06:31:21', '2024-04-15 06:31:21'),
(62, 'FF6884ECEC', '6CDA68158A', '47E4DF35EB', 'Chicken Chilli', '8', '10', '[[\"55D726FDFE\",\"220\"]]', NULL, 0, NULL, '2024-04-15 06:35:05', '2024-04-15 06:35:05'),
(63, 'BB2CE0F409', 'B9F3B334F9', '47E4DF35EB', 'Chicken Fried Rice', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 06:35:46', '2024-04-15 06:35:46'),
(64, '491964AAE5', '2ADE390053', '47E4DF35EB', 'American Chopsuey (Chicken and egg)', '8', '220', '[[\"55D726FDFE\",\"220\"]]', NULL, 0, NULL, '2024-04-15 06:37:33', '2024-04-15 06:37:33'),
(65, 'A83D9ABFCC', 'ACF62F5A0E', '47E4DF35EB', 'Chicken Hakka Noodles', '8', '10', '[[\"55D726FDFE\",\"210\"]]', NULL, 0, NULL, '2024-04-15 06:38:20', '2024-04-15 06:38:20'),
(66, '25BD0799C6', '7E92F9F013', '47E4DF35EB', 'Steamed Chicken Momos', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:38:52', '2024-04-15 06:38:52'),
(67, 'E5A7AD6DD6', '9FA395184D', '47E4DF35EB', 'Fried Manchurian Momos', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:39:21', '2024-04-15 06:39:21'),
(68, 'D1F1BE562F', '5180A1D1D1', '47E4DF35EB', 'Chicken Manchurian', '8', '10', '[[\"55D726FDFE\",\"240\"]]', NULL, 0, NULL, '2024-04-15 06:39:52', '2024-04-15 06:39:52'),
(69, 'E1B90029D9', '75E2E2AC23', '47E4DF35EB', 'Chicken Spring Roll', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:40:16', '2024-04-15 06:40:16'),
(70, '6B32E6F7BB', '064E7C90A2', '47E4DF35EB', 'Drums Of Heaven', '8', '10', '[[\"55D726FDFE\",\"260\"]]', NULL, 0, NULL, '2024-04-15 06:40:43', '2024-04-15 06:40:43'),
(71, '0B5DDE4817', '8AA22A08E2', '47E4DF35EB', 'Chicken Lollipop', '8', '10', '[[\"55D726FDFE\",\"240\"]]', NULL, 0, NULL, '2024-04-15 06:41:51', '2024-04-15 06:41:51'),
(72, '178CC5EA9C', 'B593525672', '47E4DF35EB', 'Chicken 65', '8', '10', '[[\"55D726FDFE\",\"240\"]]', NULL, 0, NULL, '2024-04-15 06:42:11', '2024-04-15 06:42:11'),
(73, '5FBA9AA9E7', '72A586739A', 'CC35976C32', 'Paneer Tikka Pizza', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 06:43:36', '2024-04-15 06:43:36'),
(74, '22EE424D02', '0C40740042', 'CC35976C32', 'Margherita Pizza', '8', '10', '[[\"55D726FDFE\",\"220\"]]', NULL, 0, NULL, '2024-04-15 06:44:01', '2024-04-15 06:44:01'),
(75, '828BBA298A', '82FA466ABD', 'CC35976C32', 'Double Cheese Pizza', '8', '10', '[[\"55D726FDFE\",\"270\"]]', NULL, 0, NULL, '2024-04-15 06:44:29', '2024-04-15 06:44:29'),
(76, '9EB9347616', '3604B400B1', 'CC35976C32', 'Veg Pizza Farm House Style', '8', '10', '[[\"55D726FDFE\",\"240\"]]', NULL, 0, NULL, '2024-04-15 06:44:58', '2024-04-15 06:44:58'),
(77, 'B33D88842E', '6568F86084', 'CC35976C32', 'Veg Grilled Sandwich', '8', '10', '[[\"55D726FDFE\",\"130\"]]', NULL, 0, NULL, '2024-04-15 06:45:22', '2024-04-15 06:45:22'),
(78, 'E9DD470AFF', '0D6784BE04', 'CC35976C32', 'Paneer Double Decker Sandwich', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:46:06', '2024-04-15 06:46:06'),
(79, '03F7D1EB02', '401C8A9231', 'CC35976C32', 'Veg Club Sandwich', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:47:59', '2024-04-15 06:47:59'),
(80, '424511E544', '140B7ACE90', 'CC35976C32', 'Veg Burger', '8', '10', '[[\"55D726FDFE\",\"130\"]]', NULL, 0, NULL, '2024-04-15 06:49:53', '2024-04-15 06:49:53'),
(81, '40B37A46E3', '527CEFBC5F', 'CC35976C32', 'Cheese Burger', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:50:17', '2024-04-15 06:50:17'),
(82, '2BBBE8895A', '0901093C84', 'CC35976C32', 'Cheese Bal', '8', '10', '[[\"55D726FDFE\",\"160\"]]', NULL, 0, NULL, '2024-04-15 06:51:04', '2024-04-15 06:51:04'),
(83, '27E7532B26', '441C982884', 'CC35976C32', 'French Fries', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 06:51:33', '2024-04-15 06:51:33'),
(84, 'D51949872A', '8EC2344022', 'CC35976C32', 'Potato Wedges', '8', '10', '[[\"55D726FDFE\",\"130\"]]', NULL, 0, NULL, '2024-04-15 06:51:58', '2024-04-15 06:51:58'),
(85, '2ECD5F2FD7', '948ECE28F0', 'CC35976C32', 'Nachos With Salsa', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 06:52:27', '2024-04-15 06:52:27'),
(86, '234F10FB53', 'FADBA18BFC', 'CC35976C32', 'Nachos With Cheese', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 06:52:47', '2024-04-15 06:52:47'),
(87, 'B4EA6F1000', '33C7818D1F', 'CC35976C32', 'Perry Perry', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:53:20', '2024-04-15 06:53:20'),
(88, '698ED3881A', '6A25F8F50A', 'CC35976C32', 'Masala French Fries', '8', '10', '[[\"55D726FDFE\",\"140\"]]', NULL, 0, NULL, '2024-04-15 06:53:46', '2024-04-15 06:53:46'),
(89, '3E17676543', '47019A18FF', 'CC35976C32', 'Pasta Red Sauce', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:54:10', '2024-04-15 06:54:10'),
(90, 'A3AC24247D', 'FF511E3EC5', 'CC35976C32', 'Pasta White Sauce', '8', '10', '[[\"55D726FDFE\",\"260\"]]', NULL, 0, NULL, '2024-04-15 06:54:34', '2024-04-15 06:54:34'),
(91, '553AA9A7C7', '15CEB6DE41', 'CC35976C32', 'Garlic Cheese Bread', '8', '10', '[[\"55D726FDFE\",\"160\"]]', NULL, 0, NULL, '2024-04-15 06:54:55', '2024-04-15 06:54:55'),
(92, '8FE3BAD9A1', 'BC003DE7C1', '136AA34EFC', 'Ckn Perry Perry', '8', '10', '[[\"55D726FDFE\",\"230\"]]', NULL, 0, NULL, '2024-04-15 06:55:22', '2024-04-15 06:55:22'),
(93, 'B0465058B5', '6E883171A5', '136AA34EFC', 'Ckn Nachos With Cheese', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:55:45', '2024-04-15 06:55:45'),
(94, '8F526A9D40', '2B3097BDD0', '136AA34EFC', 'Chicken Tikka Pizza', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 06:56:15', '2024-04-15 06:56:15'),
(95, '8EC65E1599', '02902BCAF2', '136AA34EFC', 'Chilli Chiken Pizza', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 06:56:40', '2024-04-15 06:56:40'),
(96, '8E92A6AB39', '68F8D4E618', '136AA34EFC', 'Chicken Double Cheese Pizza', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 06:57:13', '2024-04-15 06:57:13'),
(97, '26725E3C51', '10038FA596', '136AA34EFC', 'Chicken Sandwich', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:57:43', '2024-04-15 06:57:43'),
(98, 'A552A6E4EA', '5F250116D0', '136AA34EFC', 'Chicken Double Decker Sandwich', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 06:58:19', '2024-04-15 06:58:19'),
(99, '59FEEBA0D8', '0EF06458C6', '136AA34EFC', 'Chicken Club Sandwich', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:58:49', '2024-04-15 06:58:49'),
(100, '466AE17B3A', '580838178A', '136AA34EFC', 'Chicken Club Burger', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 06:59:25', '2024-04-15 06:59:25'),
(101, 'F257E4C13B', '84BACDA209', '136AA34EFC', 'Chicken Steak', '8', '10', '[[\"55D726FDFE\",\"350\"]]', NULL, 0, NULL, '2024-04-15 06:59:47', '2024-04-15 06:59:47'),
(102, '8933800325', '6328088DD0', '136AA34EFC', 'Cuban Sandwich', '8', '10', '[[\"55D726FDFE\",\"230\"]]', NULL, 0, NULL, '2024-04-15 07:00:25', '2024-04-15 07:00:25'),
(103, '8FDF39B58F', 'BBD1C0761C', '136AA34EFC', 'Crunchy Chicken', '8', '10', '[[\"55D726FDFE\",\"300\"]]', NULL, 0, NULL, '2024-04-15 07:00:52', '2024-04-15 07:00:52'),
(104, '6E61FAEAF7', 'DA8E618ADF', '136AA34EFC', 'Pepper Chicken', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 07:01:12', '2024-04-15 07:01:12'),
(105, 'BF7768BDDE', 'CEF741FAEF', '136AA34EFC', 'Garlic Chicken Breast', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 07:01:39', '2024-04-15 07:01:39'),
(106, '58A4D184A0', '49FAD07087', '136AA34EFC', 'Baked Pennie With Chicken', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 07:02:03', '2024-04-15 07:02:03'),
(107, 'B7F208696E', '2BF0C590A7', '2D8300C028', 'Paneer Tikka', '8', '10', '[[\"55D726FDFE\",\"260\"]]', NULL, 0, NULL, '2024-04-15 07:02:37', '2024-04-15 07:02:37'),
(108, '418A01FC3D', 'F895D52A4E', '2D8300C028', 'Amritsari Paneer Tikka', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 07:03:04', '2024-04-15 07:03:04'),
(109, '29E05AD641', '3BDE7F77B8', '2D8300C028', 'Paneer Kathi Roll', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 07:03:30', '2024-04-15 07:03:30'),
(110, 'E6832A6E2C', 'DEE70D982F', '2D8300C028', 'Veg Platter (Kebab)', '8', '10', '[[\"55D726FDFE\",\"400\"]]', NULL, 0, NULL, '2024-04-15 07:03:56', '2024-04-15 07:03:56'),
(111, '6FC4529A95', 'A8315F4193', '2D8300C028', 'Paneer Malai Tikka', '8', '10', '[[\"55D726FDFE\",\"290\"]]', NULL, 0, NULL, '2024-04-15 07:04:30', '2024-04-15 07:04:30'),
(112, '2B27FB6B36', 'E7A335BC9E', '2D8300C028', 'Dahi Ke Kebab', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 07:04:52', '2024-04-15 07:04:52'),
(113, '165C8DD545', '8EEAE3A688', 'DE0652447A', 'Ckn Tikka', '8', '10', '[[\"55D726FDFE\",\"290\"]]', NULL, 0, NULL, '2024-04-15 07:05:21', '2024-04-15 07:05:21'),
(114, '227AD490A8', 'B3B8D4132A', 'DE0652447A', 'Ckn Malai Tikka', '8', '10', '[[\"55D726FDFE\",\"320\"]]', NULL, 0, NULL, '2024-04-15 07:06:29', '2024-04-15 07:06:29'),
(115, 'F46F954F4D', '29FEFD5A5F', 'DE0652447A', 'Tandoori Kebab Platter', '8', '10', '[[\"55D726FDFE\",\"500\"]]', NULL, 0, NULL, '2024-04-15 07:07:14', '2024-04-15 07:07:14'),
(116, '969FA9E169', '1BC8A2775F', 'DE0652447A', 'Tandoori Ckn', '8', '10', '[[\"1BD3C3F2C3\",\"290\"],[\"5745B42161\",\"480\"]]', NULL, 0, NULL, '2024-04-15 07:07:56', '2024-04-15 07:07:56'),
(117, 'AA8729FC7C', '85720E23B2', 'DE0652447A', 'Bun Kebab', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 07:08:42', '2024-04-15 07:08:42'),
(118, 'D84DF3B76A', '356331DB91', 'DE0652447A', 'CKN Barra', '8', '10', '[[\"55D726FDFE\",\"320\"]]', NULL, 0, NULL, '2024-04-15 07:09:02', '2024-04-15 07:09:02'),
(119, '9F11CABED2', 'E9E8D71C10', 'DE0652447A', 'Ckn Mandi', '8', '10', '[[\"55D726FDFE\",\"599\"]]', NULL, 0, NULL, '2024-04-15 07:09:28', '2024-04-15 07:09:28'),
(120, '482CFAA4B3', 'B51968CB82', 'DE0652447A', 'Mutton Mandi', '8', '10', '[[\"55D726FDFE\",\"799\"]]', NULL, 0, NULL, '2024-04-15 07:09:46', '2024-04-15 07:09:46'),
(121, '047AA5430A', '0D0FEBA33D', '3EFC53EC21', 'Paneer Butter Masala', '8', '10', '[[\"55D726FDFE\",\"260\"]]', NULL, 0, NULL, '2024-04-15 07:14:58', '2024-04-15 07:14:58'),
(122, 'E47958C969', 'D63483D96B', '3EFC53EC21', 'Shahi Paneer', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 07:15:58', '2024-04-15 07:15:58'),
(123, '9377284A7A', 'D2F4C40959', '3EFC53EC21', 'Kadai Paneer', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 07:16:42', '2024-04-15 07:16:42'),
(124, '492FA2D23A', '552347410F', '3EFC53EC21', 'Handi Paneer', '8', '10', '[[\"55D726FDFE\",\"260\"]]', NULL, 0, NULL, '2024-04-15 07:19:06', '2024-04-15 07:19:06'),
(125, '9983F0BA13', 'EC678A444A', '3EFC53EC21', 'Palak Paneer', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 07:20:05', '2024-04-15 07:20:05'),
(126, '5E253DF7AE', '17A80DBFEB', '3EFC53EC21', 'Paneer Do-Pyaza', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 07:37:24', '2024-04-15 07:37:24'),
(127, '7C79DAAAFD', '049D8FAB17', '3EFC53EC21', 'Matar Paneer', '8', '10', '[[\"55D726FDFE\",\"250\"]]', NULL, 0, NULL, '2024-04-15 07:37:56', '2024-04-15 07:37:56'),
(128, 'E666DBCDD8', 'F107083856', '3EFC53EC21', 'Paneer Lababdaar', '8', '10', '[[\"55D726FDFE\",\"280\"]]', NULL, 0, NULL, '2024-04-15 07:38:38', '2024-04-15 07:38:38'),
(129, '1E401DBFA0', 'C079B9B2B3', '3EFC53EC21', 'Mix Veg.', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 07:39:00', '2024-04-15 07:39:00'),
(130, 'F4F74CE110', '640043A73C', '3EFC53EC21', 'Dum Aloo', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 07:39:26', '2024-04-15 07:39:26'),
(131, '19C7F5796A', '096C6A9E76', '3EFC53EC21', 'Zeera Aloo', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 07:39:52', '2024-04-15 07:39:52'),
(132, '605DFA1503', 'E9EDA4EDEC', '3EFC53EC21', 'Arhar Daal Fry', '8', '10', '[[\"55D726FDFE\",\"170\"]]', NULL, 0, NULL, '2024-04-15 07:40:21', '2024-04-15 07:40:21'),
(133, '2DD7144057', '552E93B712', '3EFC53EC21', 'Daal Tadka', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 07:40:46', '2024-04-15 07:40:46'),
(134, '2682DFD2DD', '433C92301D', '3EFC53EC21', 'Daal Makhni', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 07:41:13', '2024-04-15 07:41:13'),
(135, '21D46FB9A4', 'B539FB3FE7', '3EFC53EC21', 'Daal Sultani', '8', '10', '[[\"55D726FDFE\",\"200\"]]', NULL, 0, NULL, '2024-04-15 07:41:34', '2024-04-15 07:41:34'),
(136, '7A43D8E33C', '69AE20A905', '3EFC53EC21', 'Plain Rice', '8', '10', '[[\"55D726FDFE\",\"130\"]]', NULL, 0, NULL, '2024-04-15 07:41:54', '2024-04-15 07:41:54'),
(137, 'CA78DFC0E5', 'FED48485B2', '3EFC53EC21', 'Zeera Rice', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 07:42:18', '2024-04-15 07:42:18'),
(138, '9AF745D49D', '4D224BFB31', '5DED82BEFC', 'Butter CKN', '8', '10', '[[\"1BD3C3F2C3\",\"300\"],[\"5745B42161\",\"560\"]]', NULL, 0, NULL, '2024-04-15 07:54:58', '2024-04-15 07:54:58'),
(139, '5FC90AF235', '44257FFC03', '5DED82BEFC', 'CKN Korma', '8', '10', '[[\"1BD3C3F2C3\",\"290\"],[\"5745B42161\",\"550\"]]', NULL, 0, NULL, '2024-04-15 07:55:30', '2024-04-15 07:55:30'),
(140, 'ED3D35B512', '66E9726614', '5DED82BEFC', 'CKN Masala', '8', '10', '[[\"1BD3C3F2C3\",\"290\"],[\"5745B42161\",\"550\"]]', NULL, 0, NULL, '2024-04-15 07:56:59', '2024-04-15 07:56:59'),
(141, '5B00DB4E29', '07FDFF084F', '5DED82BEFC', 'Murgh Kali Mirch', '8', '10', '[[\"1BD3C3F2C3\",\"300\"],[\"5745B42161\",\"560\"]]', NULL, 0, NULL, '2024-04-15 07:58:20', '2024-04-15 07:58:20'),
(142, '38A4CF75EC', '92102A6D80', '5DED82BEFC', 'Trinidadian CKN', '8', '10', '[[\"1BD3C3F2C3\",\"320\"],[\"5745B42161\",\"580\"]]', NULL, 0, NULL, '2024-04-15 07:59:44', '2024-04-15 07:59:44'),
(143, 'C277465370', '08D6247FCF', '5DED82BEFC', 'CKN Lababdar', '8', '10', '[[\"1BD3C3F2C3\",\"290\"],[\"5745B42161\",\"550\"]]', NULL, 0, NULL, '2024-04-15 09:04:49', '2024-04-15 09:04:49'),
(144, 'A36D69DE89', '813FAAF21A', '5DED82BEFC', 'Mutton Korma', '8', '10', '[[\"1BD3C3F2C3\",\"320\"],[\"5745B42161\",\"580\"]]', NULL, 0, NULL, '2024-04-15 09:05:26', '2024-04-15 09:05:26'),
(145, 'DFEC93B9D3', '90CCE36A6C', '5DED82BEFC', 'Goat Stew', '8', '10', '[[\"1BD3C3F2C3\",\"360\"],[\"5745B42161\",\"650\"]]', NULL, 0, NULL, '2024-04-15 09:06:08', '2024-04-15 09:06:08'),
(146, '7BAEAB2E3C', '8F1772A083', '5DED82BEFC', 'Mutton Rogan Josh', '8', '10', '[[\"1BD3C3F2C3\",\"350\"],[\"5745B42161\",\"620\"]]', NULL, 0, NULL, '2024-04-15 09:06:45', '2024-04-15 09:06:45'),
(147, '9D0FD74B72', '052E6C26C7', '5DED82BEFC', 'Mutton Biryani', '8', '10', '[[\"1BD3C3F2C3\",\"280\"],[\"5745B42161\",\"500\"]]', NULL, 0, NULL, '2024-04-15 09:07:19', '2024-04-15 09:07:19'),
(148, '5DBC3C18C5', '821C78B965', '5DED82BEFC', 'CKN Rice', '8', '10', '[[\"1BD3C3F2C3\",\"240\"],[\"5745B42161\",\"430\"]]', NULL, 0, NULL, '2024-04-15 09:07:50', '2024-04-15 09:07:50'),
(149, '69397FFD84', 'EEE6BD5835', '5DED82BEFC', 'CKN Biryani', '8', '10', '[[\"1BD3C3F2C3\",\"240\"],[\"5745B42161\",\"430\"]]', NULL, 0, NULL, '2024-04-15 09:08:29', '2024-04-15 09:08:29'),
(150, '92E2DDEBA3', '240D95B75D', '5E409B9EA3', 'Tawa Roti', '8', '10', '[[\"55D726FDFE\",\"25\"]]', NULL, 0, NULL, '2024-04-15 09:09:49', '2024-04-15 09:09:49'),
(151, '21E7E142EC', '0A02A8ADDE', '5E409B9EA3', 'Tandoori Roti', '8', '10', '[[\"55D726FDFE\",\"25\"]]', NULL, 0, NULL, '2024-04-15 09:12:37', '2024-04-15 09:12:37'),
(152, '880CA88B53', '494873204C', '5E409B9EA3', 'Butter Roti', '8', '10', '[[\"55D726FDFE\",\"30\"]]', NULL, 0, NULL, '2024-04-15 09:13:05', '2024-04-15 09:13:05'),
(153, 'CD852D2251', 'D4E84B1FDB', '5E409B9EA3', 'Plain Naan', '8', '10', '[[\"55D726FDFE\",\"45\"]]', NULL, 0, NULL, '2024-04-15 09:13:57', '2024-04-15 09:13:57'),
(154, '5A61DEE9B0', 'DA3CC5C314', '5E409B9EA3', 'Butter Naan', '8', '10', '[[\"55D726FDFE\",\"60\"]]', NULL, 0, NULL, '2024-04-15 09:14:26', '2024-04-15 09:14:26'),
(155, '7A059DE5DE', 'D59A8CC21A', '5E409B9EA3', 'Laccha Paratha', '8', '10', '[[\"55D726FDFE\",\"60\"]]', NULL, 0, NULL, '2024-04-15 09:14:49', '2024-04-15 09:14:49'),
(156, '3BFEE0D93D', 'DC4B5E720D', '5E409B9EA3', 'Missi Roti', '8', '10', '[[\"55D726FDFE\",\"50\"]]', NULL, 0, NULL, '2024-04-15 09:15:37', '2024-04-15 09:15:37'),
(157, 'EC507E07BA', '346D3EF0FC', '5F6C4BEBD9', 'Plain Raita', '8', '10', '[[\"55D726FDFE\",\"30\"]]', NULL, 0, NULL, '2024-04-15 09:16:13', '2024-04-15 09:16:13'),
(158, 'A8CEFF5A52', 'A10E8C8D95', '5F6C4BEBD9', 'Boondi Raita', '8', '10', '[[\"55D726FDFE\",\"60\"]]', NULL, 0, NULL, '2024-04-15 09:16:33', '2024-04-15 09:16:33'),
(159, '141F9C71A6', '3544A41E59', '5F6C4BEBD9', 'Fruit Raita', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 09:17:00', '2024-04-15 09:17:00'),
(160, '2AE98820CE', '22F94AC10B', '5F6C4BEBD9', 'Pineapple Raita', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 09:17:23', '2024-04-15 09:17:23'),
(161, '651C16577C', '016565DD33', 'D1FFE7692C', 'Russian Salad', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 09:19:09', '2024-04-15 09:19:09'),
(162, '32FC68A9EE', '830CA78F8D', 'D1FFE7692C', 'Caesar Salad', '8', '10', '[[\"55D726FDFE\",\"150\"]]', NULL, 0, NULL, '2024-04-15 09:19:32', '2024-04-15 09:19:32'),
(163, 'A81EFC49CC', 'A05BEC1BDF', 'D1FFE7692C', 'Chicken Greek Salad', '8', '10', '[[\"55D726FDFE\",\"180\"]]', NULL, 0, NULL, '2024-04-15 09:20:07', '2024-04-15 09:20:07'),
(164, 'D025662986', 'F7C2A50670', 'B0E73461C7', 'Vanilla', '8', '10', '[[\"55D726FDFE\",\"95\"]]', NULL, 0, NULL, '2024-04-15 09:20:34', '2024-04-15 09:20:34'),
(165, 'ACA3BCA2CD', '15BBBE0E1F', 'B0E73461C7', 'Strawberry', '8', '10', '[[\"55D726FDFE\",\"95\"]]', NULL, 0, NULL, '2024-04-15 09:20:56', '2024-04-15 09:20:56'),
(166, '8C3F04AAEE', 'F9C39CE5C6', 'B0E73461C7', 'Chocolate', '8', '10', '[[\"55D726FDFE\",\"95\"]]', NULL, 0, NULL, '2024-04-15 09:21:18', '2024-04-15 09:21:18'),
(167, '24ACC4CAEF', '4849BC71FD', 'B0E73461C7', 'Butter Scotch', '8', '10', '[[\"55D726FDFE\",\"95\"]]', NULL, 0, NULL, '2024-04-15 09:21:39', '2024-04-15 09:21:39'),
(168, 'ADAADBD669', 'FADAEA1987', 'F659C81975', 'Gulab Jamun', '8', '10', '[[\"55D726FDFE\",\"70\"]]', NULL, 0, NULL, '2024-04-15 09:22:06', '2024-04-15 09:22:06'),
(169, 'B17207B647', 'A22D3D0001', 'F659C81975', 'Sahi Tukda', '8', '10', '[[\"55D726FDFE\",\"120\"]]', NULL, 0, NULL, '2024-04-15 09:22:33', '2024-04-15 09:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `cat_id`, `cat_name`, `cat_img`, `cat_banner`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1EA155686F', 'Drinks', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:46:43', '2024-04-15 05:46:43', NULL),
(2, '08B016EC75', 'Mocktails', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:47:01', '2024-04-15 05:47:01', NULL),
(3, '75D3B746C7', 'Hot Beverages', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:47:16', '2024-04-15 05:47:16', NULL),
(4, '4A6E6C278D', 'Juices', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:47:26', '2024-04-15 05:47:26', NULL),
(5, 'A5BC2D68C5', 'Shakes', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:47:39', '2024-04-15 05:47:39', NULL),
(6, '3B5E1B7880', 'Soups - Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:47:59', '2024-04-15 05:47:59', NULL),
(7, '2D5E6329C7', 'Soups - Non Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:48:52', '2024-04-15 05:48:52', NULL),
(8, 'D830294A45', 'Chinese - Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:49:09', '2024-04-15 05:49:09', NULL),
(9, '47E4DF35EB', 'Chinese - Non Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:49:23', '2024-04-15 05:49:23', NULL),
(10, 'CC35976C32', 'Continental - Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:49:51', '2024-04-15 05:49:51', NULL),
(11, '136AA34EFC', 'Continental - Non Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"10\"}]', '2024-04-15 05:50:05', '2024-04-15 05:50:05', NULL),
(12, '2D8300C028', 'Indian - Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:50:20', '2024-04-15 05:50:20', NULL),
(13, '3EFC53EC21', 'Main Course - Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:50:40', '2024-04-15 05:50:40', NULL),
(14, 'DE0652447A', 'Indian - Non Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:50:55', '2024-04-15 05:50:55', NULL),
(15, '5DED82BEFC', 'Main Course - Non Veg', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:51:12', '2024-04-15 05:51:12', NULL),
(16, '5E409B9EA3', 'Indian Breads', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:51:29', '2024-04-15 05:51:29', NULL),
(17, '5F6C4BEBD9', 'Raitas', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:51:41', '2024-04-15 05:51:41', NULL),
(18, 'D1FFE7692C', 'Salads (Healthy Suggestions)', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:52:13', '2024-04-15 05:52:13', NULL),
(19, 'F659C81975', 'Desserts', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:52:27', '2024-04-15 05:52:27', NULL),
(20, 'B0E73461C7', 'Ice Cream', '[{\"file_id\":\"8\"}]', '[{\"file_id\":\"11\"}]', '2024-04-15 05:52:39', '2024-04-15 05:52:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_materials`
--

CREATE TABLE `product_materials` (
  `id` bigint UNSIGNED NOT NULL,
  `material_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `id` bigint UNSIGNED NOT NULL,
  `year` int NOT NULL,
  `month` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_time` time NOT NULL,
  `exit_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `released_payment`
--

CREATE TABLE `released_payment` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_payment_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_amount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_increment`
--

CREATE TABLE `salary_increment` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'company_name', 'DineWise', NULL, '2024-04-16 10:59:39', '2024-04-28 04:34:21'),
(3, 'loyalty_point_value', '.05', NULL, '2024-04-16 10:59:39', '2024-04-18 10:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_ex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `profile_picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `uid`, `name`, `email`, `phone`, `work_ex`, `designation`, `doj`, `address`, `profile_picture`, `documents`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '46498213', 'Digicrowd', 'testing@gmail.com', '45455', '5', 'dfdsf', '2023-04-19', 'Ali Nagar Sunehra', '[{\"file_id\":\"1\"}]', '[{\"file_id\":\"2\"}]', '2023-04-12 11:28:10', '2023-04-12 11:28:10', NULL),
(3, 'Vaibhav2023', 'Vaibhav Goswami', 'dfjlfdsjfdfsfsds@gmail.com', '34545', '2', 'dfdsf', '2023-04-22', 'sfsf', '[{\"file_id\":\"3\"}]', '[{\"file_id\":\"1\"}]', '2023-04-13 09:18:27', '2023-04-13 09:18:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_account_details`
--

CREATE TABLE `staff_account_details` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonepay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_account_details`
--

INSERT INTO `staff_account_details` (`id`, `uid`, `bank_name`, `account_holder_name`, `acc_no`, `ifsc_code`, `phone_number`, `gpay`, `phonepay`, `paytm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '46498213', 'kotak mahindra', 'Vaibhav Goswami', '23456', 'FAEdI153', '2345', '345', '3455', '', '2023-04-13 07:08:04', '2023-04-13 07:08:04', NULL),
(2, 'Vaibhav2023', 'kotak mahindra', 'Digicrowd', '34354656', 'gff', '456545', '342543', '', '', '2023-04-13 09:47:08', '2023-04-13 09:47:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stared_products`
--

CREATE TABLE `stared_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint UNSIGNED NOT NULL,
  `table_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_no`, `capacity`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '4', NULL, NULL, '2024-04-15 09:26:08', '2024-04-15 09:26:08'),
(2, '2', '4', NULL, NULL, '2024-04-15 09:26:13', '2024-04-15 09:26:13'),
(3, '3', '4', NULL, NULL, '2024-04-15 09:26:17', '2024-04-15 09:26:17'),
(4, '4', '4', NULL, NULL, '2024-04-15 09:26:24', '2024-04-15 09:26:24'),
(5, '5', '4', NULL, NULL, '2024-04-15 09:26:27', '2024-04-15 09:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_payment`
--
ALTER TABLE `advance_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_rules`
--
ALTER TABLE `attendance_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_id_unique` (`booking_id`);

--
-- Indexes for table `create_payment`
--
ALTER TABLE `create_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `customer_loyalty_points`
--
ALTER TABLE `customer_loyalty_points`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_loyalty_points_customer_id_unique` (`customer_id`);

--
-- Indexes for table `define_salary`
--
ALTER TABLE `define_salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `define_salary_uid_unique` (`uid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `loyalty`
--
ALTER TABLE `loyalty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_units`
--
ALTER TABLE `pricing_units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_id` (`unit_id`),
  ADD UNIQUE KEY `unit_id_2` (`unit_id`),
  ADD KEY `unit_id_3` (`unit_id`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`cat_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `cat_name` (`cat_name`,`cat_img`,`cat_banner`);

--
-- Indexes for table `product_materials`
--
ALTER TABLE `product_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `material_id_2` (`material_id`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `released_payment`
--
ALTER TABLE `released_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_increment`
--
ALTER TABLE `salary_increment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_account_details`
--
ALTER TABLE `staff_account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stared_products`
--
ALTER TABLE `stared_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_payment`
--
ALTER TABLE `advance_payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_rules`
--
ALTER TABLE `attendance_rules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_payment`
--
ALTER TABLE `create_payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_loyalty_points`
--
ALTER TABLE `customer_loyalty_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `define_salary`
--
ALTER TABLE `define_salary`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyalty`
--
ALTER TABLE `loyalty`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pricing_units`
--
ALTER TABLE `pricing_units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_materials`
--
ALTER TABLE `product_materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `released_payment`
--
ALTER TABLE `released_payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_increment`
--
ALTER TABLE `salary_increment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_account_details`
--
ALTER TABLE `staff_account_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stared_products`
--
ALTER TABLE `stared_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
