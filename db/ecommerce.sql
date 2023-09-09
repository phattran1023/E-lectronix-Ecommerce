-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 12:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Nokia', 'nokia', 0, '2023-07-25 19:40:38', '2023-07-25 23:59:40', 1),
(2, 'Samsung', 'samsung', 0, '2023-07-25 19:40:46', '2023-07-25 19:40:46', 1),
(3, 'Apple', 'apple', 0, '2023-07-25 19:40:52', '2023-07-25 19:40:52', 1),
(4, 'Xiaomi', 'xiaomi', 0, '2023-07-25 19:40:58', '2023-07-25 23:59:31', 1),
(5, 'Asus', 'asus', 0, '2023-07-26 17:48:49', '2023-07-26 17:48:49', 2),
(6, 'HP', 'hp', 0, '2023-07-26 17:48:59', '2023-07-26 17:48:59', 2),
(7, 'MSI', 'msi', 0, '2023-07-26 17:49:07', '2023-07-26 17:49:07', 2),
(8, 'Oppo', 'oppo', 0, '2023-07-26 17:49:18', '2023-07-26 17:49:18', 1),
(9, 'Apple Tablet', 'apple-tablet', 0, '2023-07-27 04:59:14', '2023-07-27 05:03:23', 3),
(10, 'Xiaomi Tablet', 'xiaomi-tablet', 0, '2023-07-27 05:00:02', '2023-07-27 05:03:07', 3),
(11, 'Lenovo', 'lenovo', 0, '2023-07-27 05:18:07', '2023-07-27 05:18:07', 2),
(12, 'Samsung Tablet', 'samsung-tablet', 0, '2023-07-27 05:23:09', '2023-07-27 05:23:21', 3),
(13, 'Baseus', 'baseus', 0, '2023-08-22 07:11:28', '2023-08-22 07:11:28', 4),
(14, 'Ugreen', 'ugreen', 0, '2023-08-29 06:29:57', '2023-08-30 16:26:12', 4),
(15, 'Apple', 'apple', 0, '2023-08-30 16:26:31', '2023-08-30 16:26:31', 4),
(16, 'Anker', 'anker', 0, '2023-09-04 09:10:12', '2023-09-04 09:10:12', 4),
(17, 'Huawei', 'huawei', 0, '2023-09-04 09:22:57', '2023-09-04 09:22:57', 4);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 1, 7, NULL, 1, '2023-08-19 05:29:49', '2023-08-19 05:29:49'),
(15, 1, 1, 9, 1, '2023-08-19 05:43:49', '2023-08-19 05:43:49'),
(16, 1, 1, 10, 1, '2023-08-19 05:43:57', '2023-08-19 05:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'mobile', 'This is a mobile description', 'uploads/category/1690338527.jpg', 'Mobile', 'This is a mobile description', 'This is a mobile description', 0, '2023-07-25 19:28:47', '2023-07-25 19:28:47'),
(2, 'Laptop', 'laptop', 'This is a laptop description', 'uploads/category/1692146522.jpg', 'Laptop', 'This is a laptop description', 'This is a laptop description', 0, '2023-07-25 19:39:43', '2023-08-15 17:42:02'),
(3, 'Tablet', 'tablet', 'discription tablet', 'uploads/category/1690359264.jpeg', 'Tablet', 'meta keyword tablet', 'meta description tablet', 0, '2023-07-26 01:14:24', '2023-07-26 01:14:24'),
(4, 'Phone accessories', 'phone-accessories', 'This is a phone accessories description', 'uploads/category/1693291482.jpg', 'Phone accessories', 'This is a phone accessories description', 'This is a phone accessories description', 0, '2023-08-22 07:09:50', '2023-08-29 06:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'red', '0', '2023-07-26 07:01:42', '2023-07-26 07:01:42'),
(2, 'Blue', 'blue', '0', '2023-07-26 07:01:51', '2023-07-26 07:01:51'),
(3, 'Black', 'black', '0', '2023-07-26 07:01:58', '2023-07-26 07:01:58'),
(4, 'White', 'white', '0', '2023-07-26 07:02:05', '2023-07-26 07:02:05'),
(5, 'Silver', 'silver', '0', '2023-07-27 05:13:52', '2023-07-27 05:13:52'),
(6, 'Green', 'green', '0', '2023-09-04 09:29:20', '2023-09-04 09:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_body` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment_body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Hello world', '2023-08-08 06:30:20', '2023-08-08 06:30:20'),
(3, 8, 2, 'hmm', '2023-08-15 04:19:49', '2023-08-15 04:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `applies` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_expires` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `applies`, `type`, `value`, `max_value`, `description`, `date_created`, `date_expires`, `status`, `created_at`, `updated_at`) VALUES
(37, 'gift-090923eZcPr4kQ', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(38, 'gift-090923Jgrljf6s', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(39, 'gift-090923S7d3KsIc', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(40, 'gift-090923yyQpWiEj', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(41, 'gift-090923hNoNbsJG', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(42, 'gift-090923YyAzpmc3', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(43, 'gift-090923ofgC2bBD', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(45, 'gift-090923O77GtiJl', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(46, 'gift-0909237T7FUNij', 'All Products', 'amount', 50000, 50000, 'Coupon for all', '2023-09-09 11:35:00', '2023-09-13 10:35:00', 'survey', '2023-09-09 03:35:44', '2023-09-09 03:37:09'),
(47, 'gift-090923Dsjrq62o', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:06', '2023-09-09 03:36:06'),
(48, 'gift-0909238D8p9ZBk', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:06', '2023-09-09 03:36:06'),
(49, 'gift-090923Fk53NFsx', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:06', '2023-09-09 03:36:06'),
(50, 'gift-090923fjEe3idw', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:06', '2023-09-09 03:36:06'),
(51, 'gift-09092371immsov', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:06', '2023-09-09 03:36:06'),
(52, 'gift-090923S2uMkXGi', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:07', '2023-09-09 03:36:07'),
(53, 'gift-090923Juutd5uy', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:07', '2023-09-09 03:36:07'),
(54, 'gift-0909235u9wXtZJ', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:07', '2023-09-09 03:36:07'),
(55, 'gift-090923i5omcWOY', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:07', '2023-09-09 03:36:07'),
(56, 'gift-090923TK4jLqt5', 'All Products', 'percent', 15, 50000, 'Coupon for BlackFriday Coupon for BlackFriday', '2023-09-09 11:35:00', '2023-09-27 10:35:00', '0', '2023-09-09 03:36:07', '2023-09-09 03:36:07'),
(67, 'gift-090923Hbd6uPRr', 'All Products', 'amount', 20000, 20000, 'ngon', '2023-09-09 11:38:00', '2023-09-10 10:38:00', 'free', '2023-09-09 03:38:25', '2023-09-09 03:38:25'),
(68, 'gift-090923EsfXU7AM', 'All Products', 'amount', 20000, 20000, 'ngon', '2023-09-09 11:38:00', '2023-09-10 10:38:00', 'free', '2023-09-09 03:38:25', '2023-09-09 03:38:25'),
(69, 'gift-0909231jvGuGkW', 'All Products', 'amount', 20000, 20000, 'ngon', '2023-09-09 11:38:00', '2023-09-10 10:38:00', 'free', '2023-09-09 03:38:25', '2023-09-09 03:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_orders`
--

CREATE TABLE `coupon_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_orders`
--

INSERT INTO `coupon_orders` (`id`, `order_id`, `code`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, '11', 'gift-050923OeFQgVF8', 50000, '2023-09-05 11:12:52', '2023-09-05 11:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_18_181328_add_details_to_users_table', 1),
(7, '2023_07_19_012634_create_catagories_table', 1),
(8, '2023_07_20_072125_create_brands_table', 1),
(9, '2023_07_21_080846_create_products_table', 1),
(10, '2023_07_21_085334_create_products_images_table', 1),
(11, '2023_07_23_133333_create_colors_table', 1),
(12, '2023_07_23_145915_create_product_colors_table', 1),
(13, '2023_07_24_141928_create_slider_table', 1),
(14, '2023_07_26_044719_add_category_id_to_brands_table', 2),
(15, '2023_07_26_145239_create_wishlists_table', 3),
(16, '2023_07_29_020240_create_carts_table', 4),
(17, '2023_07_30_165517_create_orders_table', 5),
(18, '2023_07_30_165819_create_order_items_table', 5),
(19, '2019_03_01_140553_create_word_list_tables', 6),
(24, '2023_08_08_131859_create_comments_table', 7),
(25, '2023_08_08_131936_create_user_img', 7),
(27, '2023_08_09_080456_creat_settings_table', 8),
(28, '2023_08_09_080456_create_settings_table', 9),
(29, '2023_08_12_020319_create_user_details_table', 10),
(30, '2023_08_15_124610_create_reported_comment', 11),
(31, '2023_08_17_133437_create_coupons_table', 11),
(32, '2023_08_19_141904_create_coupon_orders_table', 11),
(33, '2023_08_26_190006_create_surveys_table', 12),
(34, '2023_08_27_202733_create_survey_users_table', 12),
(35, '2023_08_29_190717_create_replies', 12),
(36, '2023_09_01_151322_create_comment_likes_table', 13),
(37, '2023_09_05_193929_create_comment_likes_table', 14),
(38, '2023_09_08_234231_create_reply_likes_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Order-bwVCeZ', 'Admin', 'admin@gmail.com', '0354778644', '555555', 'asssaassa', 'In Progress...', 'Cash On Delivery', NULL, '2023-04-30 10:32:22', '2023-07-30 10:32:22'),
(2, 1, 'Order-3i3e4A', 'Admin', 'admin@gmail.com', '0354778644', '555555', 'asssaassa', 'In Progress...', 'Cash On Delivery', NULL, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(3, 1, 'Order-fWv8O3', 'Admin', 'admin@gmail.com', '4444555555', '555444', 'Hmmmmm', 'In Progress...', 'Paid by Paypal', '9CY582208G4243915', '2023-06-06 02:06:35', '2023-08-06 02:06:35'),
(4, 1, 'Order-2WczEP', 'Admin', 'admin@gmail.com', '666666555', '555666', '5555555', 'In Progress...', 'Paid by MoMo', '1691312832', '2023-05-06 02:07:13', '2023-08-06 02:07:13'),
(5, 1, 'Order-sf6RzX', 'Admin', 'admin@gmail.com', '555666999', '555666', 'đ5d55d5đ', 'out-for-delivery', 'Paid by Paypal', '14S28890HR4550005', '2023-07-06 07:33:13', '2023-08-07 04:02:09'),
(6, 1, 'Order-nr8ujw', 'Admin', 'admin@gmail.com', '555666999', '555666', '666', 'In Progress...', 'Paid by MoMo', '1691491595', '2023-07-08 03:47:10', '2023-08-08 03:47:10'),
(7, 2, 'Order-2kW8Qh', 'Phat', 'ptrnvnh@gmail.com', '565566999', '555666', '555666', 'In Progress...', 'Paid by Paypal', '9NT05650S4389643T', '2023-08-08 06:35:28', '2023-08-08 06:35:28'),
(8, 2, 'Order-IaYa3A', 'Phat2', 'ptrnvnh@gmail.com', '333666555', '555666', 'hmmmmm', 'completed', 'Paid by Paypal', '32847685V2819653S', '2023-05-15 04:15:35', '2023-08-15 04:16:37'),
(9, 9, 'Order-AzNAVK', 'Tran Ngoc Anh (Aptech HCM)', 'anhtnts2210029@fpt.edu.vn', '0962917042', '700000', '702 quốc lộ 13 phường hiệp bình phước', 'In Progress...', 'Cash On Delivery', NULL, '2023-09-03 17:04:37', '2023-09-03 17:04:37'),
(10, 9, 'Order-4lJ3AK', 'Tran Ngoc Anh', 'nanhtran91@gmail.com', '0962917042', '700000', '702 quốc lộ 13 phường hiệp bình phước', 'In Progress...', 'Cash On Delivery', NULL, '2023-09-04 10:07:24', '2023-09-04 10:07:24'),
(11, 10, 'Order-73YUmo', 'Vũ Lk', 'lkvu921@gmail.com', '0909846655', '700000', '54/5A Ao đôi', 'In Progress...', 'Paid by Paypal', '14B61906EL615240P', '2023-09-05 11:12:52', '2023-09-05 11:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 5, 1200, '2023-07-30 10:32:22', '2023-05-30 10:32:22'),
(2, 1, 2, 1, 4, 1400, '2023-07-30 10:32:22', '2023-06-30 10:32:22'),
(3, 2, 1, NULL, 5, 1200, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(4, 2, 2, 1, 4, 1400, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(5, 3, 1, 10, 1, 1200000, '2023-06-06 02:06:35', '2023-05-06 02:06:35'),
(6, 4, 1, 10, 1, 1200000, '2023-06-06 02:07:13', '2023-06-06 02:07:13'),
(7, 5, 1, 10, 1, 1200000, '2023-08-06 07:33:13', '2023-06-06 07:33:13'),
(8, 6, 1, 10, 1, 1200000, '2023-07-08 03:47:10', '2023-08-08 03:47:10'),
(9, 7, 1, 9, 1, 1200000, '2023-08-08 06:35:29', '2023-08-08 06:35:29'),
(10, 8, 1, 10, 1, 1200000, '2023-08-15 04:15:35', '2023-08-15 04:15:35'),
(11, 9, 27, NULL, 1, 2650000, '2023-09-03 17:04:37', '2023-09-03 17:04:37'),
(12, 10, 35, NULL, 10, 2400000, '2023-09-04 10:07:24', '2023-09-04 10:07:24'),
(13, 11, 1, 10, 1, 1200000, '2023-09-05 11:12:52', '2023-09-05 11:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ptrnvnh@gmail.com', '$2y$10$vTPFRwCmBh/jvfx/d.PRJe9tl1c4Xu29UqqFkQv70NXxLr9BRomlm', '2023-08-20 08:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending,0=not-trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured,0=not featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsung S23 Ultra', 's23-ultra', 'Samsung', '<p>5G 256GB</p>', '<h3><a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s23-ultra-5g-512gb\">Samsung Galaxy S23 Ultra 5G 512GB</a>&nbsp;là một sản phẩm công nghệ không còn xa lạ với những người yêu công nghệ. Máy vừa được giới thiệu với nhiều tính năng và công nghệ nổi bật, đánh dấu một bước tiến đột phá của Samsung trong năm 2023, nhằm tạo nên một thương hiệu hàng đầu trong ngành.</h3><h3>Thiết kế sang trọng cùng những đường nét tinh xảo</h3><p>Galaxy S23 Ultra sẽ được sử dụng lối thiết kế bo cong ở mặt lưng cùng kiểu màn hình vô cực ở hai bên, thân máy thì sẽ được làm chủ yếu từ vật liệu cao cấp như mặt lưng kính phủ nhám vì, thế Galaxy S23 Ultra trông mạnh mẽ, cá tính hơn đồng thời mang đến khả năng chống xước, chống bám vân tay, hạn chế bám bụi tốt.</p><p>Thiết kế cụm camera sau trên <a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s23-ultra\">Galaxy S23 Ultra</a> được làm đơn giản nhưng tinh tế, tạo cảm giác không rối mắt cho người dùng nhưng vẫn toát lên vẻ quyến rũ và sang trọng.</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/2023/02/timerseo/1-1020x570-1.jpg\" alt=\"Thiết kế mặt lưng - Samsung Galaxy S23 Ultra 5G\"></figure><p>Điểm nổi bật là bút S Pen thế hệ mới trên Galaxy S23 Ultra được cải tiến giúp người dùng thao tác nhanh hơn, nhạy hơn so với các thế hệ trước trong các tác vụ thường ngày như: Ghi chú nhanh, nút bấm hỗ trợ chụp ảnh, hỗ trợ thuyết trình, vẽ,...</p><h3>Màn hình chất lượng hiển thị rõ nét và chân thật</h3><p>Màn hình của <a href=\"https://www.thegioididong.com/dtdd\">điện thoại</a> có thước 6.8 inch cùng với tấm nền Dynamic AMOLED 2X có khả năng hiển thị hình ảnh một cách chân thật và rực rỡ, mang đến cho người dùng không gian màn ảnh rộng chỉ trong tầm tay - thỏa sức trải nghiệm.</p><p>Màn hình trên Galaxy S23 Ultra được đánh giá là xuất sắc, rõ nét với độ phân giải 2K+, hỗ trợ tần số quét 120 Hz cho người dùng trải nghiệm xem phim, hay chơi game và lướt web,... vô cùng mượt mà.</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/2023/02/timerseo/2-1020x570-1.jpg\" alt=\"Màn hình chất lượng - Samsung Galaxy S23 Ultra 5G\"></figure><p>Màn hình cong tràn viền trên Galaxy S23 Ultra 5G được trang bị kính cường lực Corning Gorilla Glass Victus 2, giúp nâng cao khả năng chống trầy xước từ đó mang lại cảm giác an toàn cho người dùng khi sử dụng thiết bị một thời gian dài.</p><h3>Bắt trọn từng khoảnh khắc với camera 200 MP chất lượng cao</h3><p>Galaxy S23 Ultra được trang bị camera chính có độ phân giải lên đến 200 MP cùng với đó là một ống kính tiềm vọng 10 MP với khả năng zoom quang học 10X, một ống kính tele 10 MP với khả năng zoom quang học 3X và cuối cùng là một camera góc siêu rộng độ phân giải 12 MP.</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/2023/02/timerseo/4-1020x570-1.jpg\" alt=\"Cụm camera nổi bật - Samsung Galaxy S23 Ultra 5G\"></figure><p>Ngoài ra, camera trước cũng có độ phân giải 12 MP được cải tiến nhờ thuật toán xử lý chụp ảnh mới giúp người dùng bắt trọn từng khoảnh khắc khi chụp ảnh selfie cá nhân hay tập thể với chất lượng tốt nhất cũng như thuận tiện trong việc gọi điện video.</p><h3>Bộ vi xử lý Snapdragon 8 Gen 2 for Galaxy mạnh mẽ</h3><p>Là một trong những flagship hàng đầu giới <a href=\"https://www.thegioididong.com/dtdd?g=android\">điện thoại Android</a>, vì thế không có gì đáng ngạc nhiên khi Galaxy S23 Ultra sở hữu hiệu năng từ bộ vi xử lý Snapdragon 8 Gen 2 for Galaxy được sản xuất trên tiến trình 4 nm hiện đại. Đây cũng là một trong những chiến lược hợp tác giữa Samsung và Qualcomm nhằm mang đến trải nghiệm hiệu năng tốt nhất cho người dùng khi sử dụng Galaxy S23 Ultra 5G và các thiết bị khác thuộc dòng Galaxy S23.</p><p>Galaxy S23 Ultra 5G còn sở hữu dung lượng RAM khủng lên đến 12 GB và bộ nhớ trong 512 GB để người dùng thoải mái lưu trữ các tệp, hình ảnh, video,... dung lượng lớn với tốc độ lưu trữ cực nhanh và bảo mật tốt.</p><p>Với mức đồ họa cao cũng không thể \"cản bước\" được Galaxy S23 Ultra khi \"chiến\" các tựa game mobile HOT trên thị trường như Genshin Impact, PUBG Mobile, Call of Duty Mobile, Tốc Chiến,... nếu bạn là một tín đồ chơi game thì Galaxy S23 Ultra là <a href=\"https://www.thegioididong.com/dtdd-choi-game\">điện thoại chơi game</a> rất đáng để cân nhắc, đồng thời dung lượng 512 GB cũng sẽ giúp bạn thỏa sức tải tất cả tựa game \"nặng\" mà bạn yêu thích.</p><h3>Dung lượng pin lớn đáp ứng mọi nhu cầu cho ngày dài làm việc và giải trí</h3><p>Về dung lượng pin thì chiếc <a href=\"https://www.thegioididong.com/dtdd-samsung\">điện thoại Samsung</a> này được trang bị viên pin 5000 mAh và hỗ trợ sạc nhanh 45 W. Galaxy S23 Ultra vẫn có thể trụ được liên tục loanh quanh 8 tiếng và chỉ cần khoảng 1 giờ là sạc đầy, đáp ứng được nhu cầu sử dụng gần cả một ngày cho người dùng mà không lo bị gián đoạn công việc hay giải trí xem phim, lướt web, đọc báo, chơi game,...</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/2023/02/timerseo/3-1020x570-1.jpg\" alt=\"Dung lượng pin dài lâu - Samsung Galaxy S23 Ultra\"></figure><p>Mẫu flagship trong năm 2023 - Galaxy S23 Ultra 5G là một thiết bị mà người dùng không nên bỏ qua, đặc biệt là tín đồ đam mê chụp ảnh và chơi game. Thiết bị không chỉ sở hữu cấu hình mạnh mẽ mà còn khoác lên mình bộ cánh sang trọng quyến rũ, nhờ đó mà bạn có thể tự tin cầm nắm trong các buổi họp hay tối ưu công việc của bạn thông qua bút S Pen cực kỳ tiện lợi.</p>', 1000000, 1200000, 10, 1, 1, 0, 'Samsung Galaxy S23 Ultra 5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB', '2023-07-25 20:17:05', '2023-08-20 07:37:45'),
(2, 1, 'iPhone 14 Pro Max 128GB', 'iphone-14-pro-max', 'Apple', '<p>iPhone 14 Pro Max 128GB</p>', '<p>iPhone 14 Pro Max 128GB</p>', 1200, 1400, 5, 1, 1, 0, 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', '2023-07-25 20:32:04', '2023-08-20 07:40:58'),
(3, 3, 'Samsung Galaxy Tab S9 WiFi 128GB', 'galaxy-tab-s9-wifi', 'Samsung', '<p>galaxy tab s9 wifi</p>', '<p>galaxy tab s9 wifi</p>', 1500, 1000, 0, 1, 0, 0, 'galaxy tab s9 wifi', 'galaxy tab s9 wifi', 'galaxy tab s9 wifi', '2023-07-26 01:15:29', '2023-08-20 07:37:37'),
(4, 1, 'Samsung Galaxy Z Fold4 5G 256GB', 'samsung-galaxy-z-fold4-5g-256gb', 'Samsung', '<p>Samsung Galaxy Z Fold4 5G 256GB</p>', '<p>Samsung Galaxy Z Fold4 5G 256GB</p>', 1600, 900, 0, 1, 0, 0, 'Samsung Galaxy Z Fold4 5G 256GB', 'Samsung Galaxy Z Fold4 5G 256GB', 'Samsung Galaxy Z Fold4 5G 256GB', '2023-07-26 01:18:01', '2023-08-20 07:41:12'),
(5, 3, 'iPad 9 Wifi 64GB', 'ipad-9-wifi', 'Apple', 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', 1000, 2000, 20, 1, 0, 0, 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', '2023-07-27 04:55:11', '2023-07-27 04:55:11'),
(6, 1, 'Xiaomi 13 5G', 'xiaomi-13-5g', 'Xiaomi', 'xiaomi 13 5G', 'xiaomi 13 5G', 1200, 1000, 100, 1, 0, 0, 'xiaomi 13 5G', 'xiaomi 13 5G', 'xiaomi 13 5G', '2023-07-27 05:05:30', '2023-07-27 05:05:30'),
(7, 1, 'Xiaomi 12T 5G 256GB', 'xiaomi-12t-5g-256gb', 'Xiaomi', 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', 1100, 1300, 10, 1, 0, 0, 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', '2023-07-27 05:08:26', '2023-07-27 05:08:26'),
(8, 2, 'Lenovo Ideapad Gaming 3 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050/120Hz/Win11', 'lenovo-ideapad-gaming-3', 'Lenovo', '<p>Lenovo Ideapad Gaming 3</p>', '<p>Lenovo Ideapad Gaming 3</p>', 1200, 980, 3, 0, 0, 0, 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3', '2023-07-27 05:16:02', '2023-08-20 07:37:09'),
(9, 2, 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'laptop-lenovo-legion-5', 'Lenovo', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 1200, 1000, 15, 0, 0, 0, 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', '2023-07-27 05:17:48', '2023-07-27 05:18:54'),
(10, 3, 'Samsung Galaxy Tab A8 (2022)', 'samsung-galaxy-tab-a8-2022', 'Samsung Tablet', 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', 1000, 650, 10, 0, 0, 0, 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', '2023-07-27 05:22:20', '2023-07-27 05:23:33'),
(12, 4, 'Pin Sạc Dự Phòng Baseus Mini 20W 5200mAh Tích Hợp Dây Cáp Cho iPhone 14', 'phone-accessories', 'Baseus', '<p>20W 5200mAh&nbsp;</p>', '<p>❥Gói \"</p><p>Ngân hàng điện 1 * 20W</p><p>❥Thông số \'</p><p>Tên: Sạc nhanh Baseus Popsicle PowerBank Type-C 5200mAh 20W</p><p>Loại pin - Polyme Lithium</p><p>Dung lượng pin: 5200mAh / 19,24Wh</p><p>Công suất định mức: 3000mAh (5V = 2.4A)</p><p>Chuyển đổi năng lượng &gt; = 75% Tỷ lệ</p><p>&nbsp;</p><p>Đầu vào cáp Type-C / Type-C: 5V = 2.4A / 9V = 2A / 12V = 1.5A</p><p>Đầu ra cáp Type-C / Type-C: 5V = 2.4A / 9V = 2.22A / 12V = 1.5A</p><p>Đầu ra cáp Type-C + Type-C: 5V = 2.4AC</p><p>Đầu ra cáp IPhone: 5V = 2.4A / 9V = 2.22A</p><p>Đầu ra cáp Type-C + IPhone: 5V = 2.4A</p><p>Tổng đầu ra; 5V = 2.4A</p>', 539000, 450000, 21, 0, 0, 0, 'Pin Sạc Dự Phòng Baseus Mini 20W 5200mAh Tích Hợp Dây Cáp Cho iPhone 14', 'Pin Sạc Dự Phòng Baseus Mini 20W 5200mAh Tích Hợp Dây Cáp Cho iPhone 14', 'Pin Sạc Dự Phòng Baseus Mini 20W 5200mAh Tích Hợp Dây Cáp Cho iPhone 14', '2023-08-26 12:14:55', '2023-08-28 15:20:04'),
(14, 4, 'Pin Sạc Dự Phòng Không Dây 10000mAh Mini Có Nam Châm Tự Động Lấy Nét Baseus Cho iPhone 14', 'mini-co-nam-cham-tu-dong-lay-net-baseus-cho-iphone-14', 'Baseus', '<p>10000mAh Mini&nbsp;</p>', '<p>❥Gói hàng bao gồm:</p><p>Ngân hàng điện * 1</p><p>Cáp sạc 60W Type-C * 1</p><p>❥Thông tin sản phẩm:</p><p>Thương hiệu: BASEUS</p><p>Giao diện đầu ra: USB-Loại C</p><p>Giao diện đầu vào: USB Loại C</p><p>Loại pin: Pin Lithium</p><p>Chất liệu vỏ: Silicon</p><p>Các tính năng: sạc không dây</p><p>Xuất xứ: Trung Quốc đại lục</p><p>Kiểu: Ngân hàng điện di động</p><p>Chứng nhận: RoHS, CE, FCC</p><p>Hỗ trợ công nghệ sạc nhanh: Sạc nhanh hai chiều</p><p>Đầu vào tối đa: 20W</p><p>Công suất: 10000mah / 38,5wh</p><p>Công suất định mức: 5800mah (5V / 2.4A)</p><p>Tỷ lệ chuyển đổi năng lượng:&gt; 75%</p><p>Đầu vào Type-c: 5V / 3A; 9V / 2A</p><p>Đầu ra Type-c: 5V / 2.4A; 9V / 2.22A; 12V / 1.5A</p><p>Đầu ra sạc không dây: 5W / 7,5W / 10W / 15W</p><p>Tổng đầu ra: 5V / 2.4A</p>', 800000, 759000, 45, 0, 1, 0, 'Pin Sạc Dự Phòng Không Dây 10000mAh Mini Có Nam Châm Tự Động Lấy Nét Baseus Cho iPhone 14', 'Pin Sạc Dự Phòng Không Dây 10000mAh Mini Có Nam Châm Tự Động Lấy Nét Baseus Cho iPhone 14', 'Pin Sạc Dự Phòng Không Dây 10000mAh Mini Có Nam Châm Tự Động Lấy Nét Baseus Cho iPhone 14', '2023-08-28 15:22:25', '2023-08-28 16:59:53'),
(15, 4, 'Pin Sạc Dự Phòng Nhanh Baseus Airpow 20W PD', 'baseus-airpow-20w-pd', 'Baseus', '<p>20W PD</p>', '<p>❥Gói hàng bao gồm:</p><p>1 * Ngân hàng điện</p><p>1 * Cáp USB to Type-C 3A 0,3m</p><p>❥Thông tin sản phẩm:</p><p>Tên: Baseus Airpow Pin dự phòng sạc nhanh 10000mAh 20W</p><p>Mô hình: PPAP10</p><p>Pin: Pin Lithium Polymer</p><p>Công suất: 10000 mAh / 37 Wh</p><p>Tỷ lệ chuyển đổi năng lượng: ≥75%</p><p>Đầu vào Micro: 5V / 2A; 9V / 2A</p><p>※ -C Đầu vào: 5V / 3A; 9V / 2A; 12V / 1.5A</p><p>Đầu ra USB: 5V / 2.4A; 9V / 2A; 12V / 1.5A</p><p>Đầu ra Type-C: 5V / 2.4A; 9V / 2.22A; 12V / 1.5A</p><p>Tổng đầu ra: 5V / 2.4A</p><p>Trọng lượng sản phẩm: 248g</p>', 420000, 389000, 50, 0, 1, 0, 'Pin Sạc Dự Phòng Nhanh Baseus Airpow 20W PD', 'Pin Sạc Dự Phòng Nhanh Baseus Airpow 20W PD', 'Pin Sạc Dự Phòng Nhanh Baseus Airpow 20W PD', '2023-08-28 16:07:08', '2023-08-28 17:00:10'),
(16, 4, 'Bộ sạc nhanh Baseus GaN3 Pro 65W 2C+U GaN5 100W QC4+ PD3.0 AFC Kèm cáp Type C cho điện thoại', 'phone-accessories', 'Baseus', '<p>65W 2C+U GaN5 100W QC4+ PD3.0</p>', '<p>❥ Gói hàng bao gồm:</p><p>1 * Bộ sạc nhanh 65W 2C + U GaN3 Pro</p><p>❥Thông tin sản phẩm:</p><p>Thương hiệu: Baseus</p><p>Tên sản phẩm: bộ sạc nhanh GaN3 Pro</p><p>Đầu vào: AC 110V-240V ~, 50 / 60Hz, Tối đa 1.5A</p><p>Đầu ra Type-C1: 5V / 3A, 9V / 3A, 12V / 3A, 15V / 3A, 20V / 3,25A</p><p>Đầu ra loại-C2: 5V / 3A, 9V / 3A, 12V / 3A, 15V / 3A, 20V / 3,25A</p><p>Đầu ra USB: 5V / 3A, 5V / 4.5A, 9V / 3A, 12V / 3A, 20V / 3A</p><p>Đầu ra Type-C1 + Type-C2: 45W + 20W</p><p>Đầu ra Type-C1 + USB: 45W + 18W</p><p>Đầu ra Type-C2 + USB: 5V / 3A 15W</p><p>Type-C1 + Type-C2 + Đầu ra USB: 45W + 15W</p><p>Kích thước sản phẩm: 63.5 * 36 * 32mm</p><p>Trọng lượng sản phẩm: khoảng 112g</p>', 750000, 650000, 45, 1, 0, 0, 'Bộ sạc nhanh Baseus GaN3 Pro 65W 2C+U GaN5 100W QC4+ PD3.0 AFC Kèm cáp Type C cho điện thoại', 'Bộ sạc nhanh Baseus GaN3 Pro 65W 2C+U GaN5 100W QC4+ PD3.0 AFC Kèm cáp Type C cho điện thoại', 'Bộ sạc nhanh Baseus GaN3 Pro 65W 2C+U GaN5 100W QC4+ PD3.0 AFC Kèm cáp Type C cho điện thoại', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(17, 4, 'Cáp sạc nhanh,truyền dữ liệu tốc độ cao siêu bền Type C to iP Baseus Crystal 20W', 'type-c-to-ip-baseus-crystal-20w', 'Baseus', '<p>Type C to iP Baseus Crystal 20W</p>', '<p>BASEUS Crystal Shine Series 20W 1m,2m</p><p>Cáp dữ liệu sạc nhanh Type-C đến iP - Màu đen</p><p>Công suất sạc nhanh PD 20W, có thể sạc 60% trong 30 phút</p><p>Cáp bện mật độ cao, giữ cho cáp không bị rối</p><p>Thiết kế rõ ràng và sáng sủa, dễ dàng tìm ra cáp và sạc</p><p>Tương thích rộng rãi cho các thiết bị OS, hỗ trợ cắm dương và cắm âm, chỉ cần cắm và bắt đầu sạc</p><p>Chiều dài cáp là 1m,2m</p><p>&nbsp;</p><p>🔥 Bảo Hành ( Giữ nguyên hộp sạc, hóa đơn ) 🔥</p><p>✅Chỉ bán hàng chất lượng</p><p>✅Bảo hành đổi mới lỗi sản xuất</p><p>✅Nếu bạn hài lòng với dịch vụ của chúng tôi đừng ngần ngại cho Baseusmall.vn 5* nhé. Nếu chưa hài lòng cũng đừng vội đánh giá mà hãy liên hệ trước với chúng tôi để được hỗ trợ nhanh nhất bạn nhé!</p><p>------ Cảm Ơn Quý Khách Đã Ghé Qua Gian Hàng -----</p><p>Hiện nay có rất nhiều sản phẩm Baseus nguồn gốc không rõ hàng mong quý khách hàng cân nhắc trước khi mua hàng tránh phải hàng nhái kém chất lượng</p><p>Sản phẩm chính hãng tất cả đều được dán tem bảo hành chính hãng Baseusmall.vn</p><p>Được phân phối độc quyền Baseus tại Việt Nam do Công Ty TNHH Baseusmall.vn Việt Nam hóa đơn chứng từ nhập khẩu đầy đủ + hộp đồng phân phối độc quyền tại Việt Nam từ Baseus</p>', 110000, 79000, 100, 1, 0, 0, 'Cáp sạc nhanh,truyền dữ liệu tốc độ cao siêu bền Type C to iP Baseus Crystal 20W', 'Cáp sạc nhanh,truyền dữ liệu tốc độ cao siêu bền Type C to iP Baseus Crystal 20W', 'Cáp sạc nhanh,truyền dữ liệu tốc độ cao siêu bền Type C to iP Baseus Crystal 20W', '2023-08-28 16:29:03', '2023-08-28 17:00:24'),
(18, 4, 'Cáp Sạc Nhanh USB to iP Baseus Dynamic Series Fast Charging Data Cable USB to l.P 2.4A', 'usb-to-lp-24a', 'Nokia', '<p>Cable USB to l.P 2.4A</p>', '<p>– Cáp sạc nhanh truyền dữ liệu Baseus Dynamic Series được Baseus ra mắt năm 2021 được năng cấp chl.P thế hệ mới giúp cho sản phẩm có tuổi thọ cao hơn so với các mẫu cũ, có nhiều màu sắc đa dạng phụ hợp cho tất cả mọi người.</p><p>– Hỗ trợ sạc nhanh với dòng điện 2.4A và tốc độ truyền tải dữ liệu lên đến 480Mbps. Độ ổn định cao, đảm bảo an toàn tuyệt đối cho thiết bị của bạn. Tương thích với các dòng l.P …</p><p>– Chl.P nhận dạng thông minh tự động điều chỉnh dòng điện phù hợp với thiết bị đảm bảo sạc nhanh và an toàn. Thân cáp được làm bằng chất liệu ABS siêu bền , cách điện , không thấm nước , bền với nhiệt độ và hóa chất vì vậy không làm biến dạng sản phẩm.</p><p>- Tốc độ sạc : 18W</p><p>Ko sạc được cho Android</p><p>&nbsp;</p><p>🔥 Bảo Hành ( Giữ nguyên hộp sạc, hóa đơn ) 🔥</p><p>✅Chỉ bán hàng chất lượng</p><p>✅Bảo hành đổi mới lỗi sản xuất</p><p>✅Nếu bạn hài lòng với dịch vụ của chúng tôi đừng ngần ngại cho 5* nhé. Nếu chưa hài lòng cũng đừng vội đánh giá mà hãy liên hệ trước với chúng tôi để được hỗ trợ nhanh nhất bạn nhé!</p><p>------ Cảm Ơn Quý Khách Đã Ghé Qua Gian Hàng -----</p><p>Hiện nay có rất nhiều sản phẩm Baseus nguồn gốc không rõ hàng mong quý khách hàng cân nhắc trước khi mua hàng tránh phải hàng nhái kém chất lượng</p><p>Sản phẩm chính hãng tất cả đều được dán tem bảo hành chính hãng Baseusmall.vn</p><p>Được phân phối độc quyền Baseus tại Việt Nam do Công Ty TNHH Baseusmall.vn Việt Nam hóa đơn chứng từ nhập khẩu đầy đủ + hộp đồng phân phối độc quyền tại Việt Nam từ Baseus</p>', 120000, 89000, 85, 0, 1, 0, 'Cáp Sạc Nhanh USB to iP Baseus Dynamic Series Fast Charging Data Cable USB to l.P 2.4A', 'Cáp Sạc Nhanh USB to iP Baseus Dynamic Series Fast Charging Data Cable USB to l.P 2.4A', 'Cáp Sạc Nhanh USB to iP Baseus Dynamic Series Fast Charging Data Cable USB to l.P 2.4A', '2023-08-28 16:33:13', '2023-08-29 03:49:35'),
(19, 4, 'Cáp sạc nhiều đầu Baseus StarSpeed 1-for-3 Fast Charging Data Cable USB to M+L+C 3.5A 1.2m', '1-for-3-fast-charging-data-cable-usb-to-mlc-35a-12m', 'Baseus', '<p>&nbsp;đầu Baseus StarSpeed 1-for-3 Fast Charging</p>', '<p>Thông số kỹ thuật</p><p>&nbsp;</p><p>Thương hiệu&nbsp;&nbsp;&nbsp;&nbsp;Baseus</p><p>Tên&nbsp;&nbsp;&nbsp;&nbsp;Cáp sạc nhiều đầu Baseus StarSpeed 1-for-3 Fast Charging Data Cable USB to M+L+C 3.5A 1.2m</p><p>Chất liệu&nbsp;&nbsp;&nbsp;&nbsp;Hợp kim kẽm + Dây nylon</p><p>Chiều dài&nbsp;&nbsp;&nbsp;&nbsp;1m2</p><p>Màu sắc&nbsp;&nbsp;&nbsp;&nbsp;Đỏ</p><p>Input&nbsp;&nbsp;&nbsp;&nbsp;USB</p><p>Output&nbsp;&nbsp;&nbsp;&nbsp;Micro, iP, Type-C</p><p>&nbsp;</p><p>🔥 Bảo Hành ( Giữ nguyên hộp sạc, hóa đơn ) 🔥</p><p>&nbsp;</p><p>✅Chỉ bán hàng chất lượng</p><p>✅Bảo hành đổi mới lỗi sản xuất</p><p>✅Nếu bạn hài lòng với dịch vụ của chúng tôi đừng ngần ngại cho Baseusmall.vn 5* nhé. Nếu chưa hài lòng cũng đừng vội đánh giá mà hãy liên hệ trước với chúng tôi để được hỗ trợ nhanh bạn nhé!</p><p>------ Cảm Ơn Quý Khách Đã Ghé Qua Gian Hàng -----</p><p>Hiện nay có rất nhiều sản phẩm Baseus nguồn gốc không rõ hàng mong quý khách hàng cân nhắc trước khi mua hàng tránh phải hàng nhái kém chất lượng</p><p>Sản phẩm chính hãng tất cả đều được dán tem bảo hành chính hãng Baseusmall.vn</p><p>Được phân phối độc quyền Baseus tại Việt Nam do Công Ty TNHH Baseusmall.vn Việt Nam hóa đơn chứng từ nhập khẩu đầy đủ + hộp đồng phân phối độc quyền tại Việt Nam từ Baseus</p>', 150000, 100000, 35, 0, 1, 0, 'Cáp sạc nhiều đầu Baseus StarSpeed 1-for-3 Fast Charging Data Cable USB to M+L+C 3.5A 1.2m', 'Cáp sạc nhiều đầu Baseus StarSpeed 1-for-3 Fast Charging Data Cable USB to M+L+C 3.5A 1.2m', 'Cáp sạc nhiều đầu Baseus StarSpeed 1-for-3 Fast Charging Data Cable USB to M+L+C 3.5A 1.2m', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(20, 4, 'Tai Nghe Không Dây Baseus Bowie WM02 Bluetooth V5.3, 25h sử dụng, Kích thước nhỏ gọn, Thời Trang, APP Control', 'tai-nghe-khong-day', 'Baseus', '<p>Tai Nghe Không Dây Baseus Bowie WM02 Bluetooth V5.3, 25h sử dụng</p>', '<p>Tên: Tai nghe không dây Baseus True</p><p>Mẫu số: Baseus Bowie WM02</p><p>Chất liệu: ABS</p><p>Phiên bản: V5.3</p><p>Khoảng cách giao tiếp: 10m</p><p>Thời gian chơi nhạc: 5 giờ (khối lượng ở 70%)</p><p>Thời gian chơi với thùng sạc: 22~25 giờ</p><p>Dung lượng pin: 40 mAh / 0,148 Wh (tai nghe) 300 mAh / 1,11 Wh (bin sạc)</p><p>Đầu vào đánh giá tai nghe: DC5V⎓80 mA</p><p>Đầu vào đánh giá thùng sạc: DC5V⎓300 mA</p><p>Dòng tiêu thụ xếp hạng tai nghe: 8 mA</p><p>Dòng tiêu thụ định mức thùng sạc: 260 mA</p><p>Thời gian sạc đầy: khoảng 1,5 giờ</p><p>Dải tần số đáp ứng: 20 Hz-20 kHz</p><p>Giao diện sạc: Type-C</p><p>Thích hợp cho: Tương thích với hầu hết các thiết bị không dây \"</p><p>1mini in-ear</p><p>2 kênh đôi Baseus độ trễ thấp</p><p>Sạc Flash tức thì 3Baseus</p><p>Cách sử dụng : Tháo seal xanh dưới tai nghe</p><p>&nbsp;</p><p>🔥 Bảo Hành ( Giữ nguyên hộp sạc, hóa đơn ) 🔥</p><p>📞 Phản ánh dịch vụ O769888839 ( #zalo, #viber, #call )</p><p>✅Chỉ bán hàng chất lượng</p><p>✅Bảo hành đổi mới lỗi sản xuất</p><p>✅Nếu bạn hài lòng với dịch vụ của chúng tôi đừng ngần ngại cho Baseusmall.vn 5* nhé. Nếu chưa hài lòng cũng đừng vội đánh giá mà hãy liên hệ trước với chúng tôi để được hỗ trợ nhanh nhất bạn nhé!</p><p>------ Cảm Ơn Quý Khách Đã Ghé Qua Gian Hàng -----</p><p>Hiện nay có rất nhiều sản phẩm Baseus nguồn gốc không rõ hàng mong quý khách hàng cân nhắc trước khi mua hàng tránh phải hàng nhái kém chất lượng</p><p>Sản phẩm chính hãng tất cả đều được dán tem bảo hành chính hãng Baseusmall.vn</p><p>Được phân phối độc quyền Baseus tại Việt Nam do Công Ty TNHH Baseusmall.vn Việt Nam hóa đơn chứng từ nhập khẩu đầy đủ + hộp đồng phân phối độc quyền tại Việt Nam từ Baseus</p>', 350000, 289000, 20, 1, 0, 0, 'Tai Nghe Không Dây Baseus Bowie WM02 Bluetooth V5.3, 25h sử dụng, Kích thước nhỏ gọn, Thời Trang, APP Control', 'Tai Nghe Không Dây Baseus Bowie WM02 Bluetooth V5.3, 25h sử dụng, Kích thước nhỏ gọn, Thời Trang, APP Control', 'Tai Nghe Không Dây Baseus Bowie WM02 Bluetooth V5.3, 25h sử dụng, Kích thước nhỏ gọn, Thời Trang, APP Control', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(21, 4, 'Tai Nghe Chụp Tai Chống Ồn Baseus Bowie D03 Wireless Headphones', 'bowie-d03-wireless-headphones', 'Baseus', '<p>Bowie D03 Wireless Headphones</p>', '<p>Tai&nbsp;Nghe&nbsp;Chụp&nbsp;Tai&nbsp;Chống&nbsp;Ồn&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;Wireless&nbsp;Headphones</p><p>Tai&nbsp;nghe&nbsp;chụp&nbsp;tai&nbsp;chống&nbsp;ồn&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;Wireless&nbsp;Headphones&nbsp;là&nbsp;một&nbsp;sản&nbsp;phẩm&nbsp;tai&nbsp;nghe&nbsp;không&nbsp;dây&nbsp;cao&nbsp;cấp&nbsp;với&nbsp;tính&nbsp;năng&nbsp;chống&nbsp;ồn&nbsp;tiên&nbsp;tiến.&nbsp;Được&nbsp;thiết&nbsp;kế&nbsp;và&nbsp;sản&nbsp;xuất&nbsp;bởi&nbsp;Baseus,&nbsp;một&nbsp;thương&nbsp;hiệu&nbsp;nổi&nbsp;tiếng&nbsp;trong&nbsp;lĩnh&nbsp;vực&nbsp;phụ&nbsp;kiện&nbsp;di&nbsp;động.</p><p>Tai&nbsp;nghe&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;có&nbsp;kiểu&nbsp;dáng&nbsp;chụp&nbsp;tai,&nbsp;ôm&nbsp;sát&nbsp;và&nbsp;thoải&nbsp;mái&nbsp;cho&nbsp;đôi&nbsp;tai&nbsp;của&nbsp;bạn.&nbsp;Với&nbsp;thiết&nbsp;kế&nbsp;đơn&nbsp;giản&nbsp;và&nbsp;trang&nbsp;nhã,&nbsp;tai&nbsp;nghe&nbsp;này&nbsp;mang&nbsp;lại&nbsp;sự&nbsp;sang&nbsp;trọng&nbsp;và&nbsp;thời&nbsp;trang&nbsp;khi&nbsp;sử&nbsp;dụng.&nbsp;Đệm&nbsp;tai&nbsp;nghe&nbsp;mềm&nbsp;mại&nbsp;giúp&nbsp;giảm&nbsp;áp&nbsp;lực&nbsp;và&nbsp;tạo&nbsp;cảm&nbsp;giác&nbsp;thoải&nbsp;mái&nbsp;khi&nbsp;đeo&nbsp;trong&nbsp;thời&nbsp;gian&nbsp;dài.</p><p>Một&nbsp;tính&nbsp;năng&nbsp;nổi&nbsp;bật&nbsp;của&nbsp;tai&nbsp;nghe&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;là&nbsp;khả&nbsp;năng&nbsp;chống&nbsp;ồn.&nbsp;Công&nbsp;nghệ&nbsp;chống&nbsp;ồn&nbsp;thông&nbsp;minh&nbsp;giúp&nbsp;loại&nbsp;bỏ&nbsp;tiếng&nbsp;ồn&nbsp;xung&nbsp;quanh,&nbsp;cho&nbsp;phép&nbsp;bạn&nbsp;tập&nbsp;trung&nbsp;vào&nbsp;âm&nbsp;nhạc&nbsp;hoặc&nbsp;cuộc&nbsp;gọi&nbsp;của&nbsp;mình&nbsp;mà&nbsp;không&nbsp;bị&nbsp;làm&nbsp;phiền&nbsp;bởi&nbsp;tiếng&nbsp;ồn&nbsp;bên&nbsp;ngoài.&nbsp;Điều&nbsp;này&nbsp;rất&nbsp;hữu&nbsp;ích&nbsp;trong&nbsp;các&nbsp;môi&nbsp;trường&nbsp;ồn&nbsp;ào&nbsp;như&nbsp;trong&nbsp;máy&nbsp;bay,&nbsp;tàu&nbsp;hỏa&nbsp;hoặc&nbsp;trong&nbsp;các&nbsp;không&nbsp;gian&nbsp;công&nbsp;cộng.</p><p>Tai&nbsp;nghe&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;cung&nbsp;cấp&nbsp;âm&nbsp;thanh&nbsp;chất&nbsp;lượng&nbsp;cao.&nbsp;Với&nbsp;driver&nbsp;đường&nbsp;kính&nbsp;lớn,&nbsp;tai&nbsp;nghe&nbsp;tái&nbsp;tạo&nbsp;âm&nbsp;thanh&nbsp;rõ&nbsp;ràng,&nbsp;trung&nbsp;thực&nbsp;và&nbsp;sống&nbsp;động.&nbsp;Bạn&nbsp;có&nbsp;thể&nbsp;thưởng&nbsp;thức&nbsp;âm&nbsp;nhạc&nbsp;yêu&nbsp;thích&nbsp;của&nbsp;mình&nbsp;với&nbsp;các&nbsp;dải&nbsp;tần&nbsp;số&nbsp;rộng&nbsp;và&nbsp;bass&nbsp;mạnh&nbsp;mẽ.</p><p>Với&nbsp;kết&nbsp;nối&nbsp;Bluetooth&nbsp;5.3,&nbsp;tai&nbsp;nghe&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;cho&nbsp;phép&nbsp;kết&nbsp;nối&nbsp;không&nbsp;dây&nbsp;với&nbsp;các&nbsp;thiết&nbsp;bị&nbsp;di&nbsp;động&nbsp;như&nbsp;điện&nbsp;thoại,&nbsp;máy&nbsp;tính&nbsp;bảng&nbsp;và&nbsp;laptop.&nbsp;Điều&nbsp;này&nbsp;mang&nbsp;lại&nbsp;sự&nbsp;thuận&nbsp;tiện&nbsp;và&nbsp;tự&nbsp;do&nbsp;trong&nbsp;việc&nbsp;di&nbsp;chuyển&nbsp;mà&nbsp;không&nbsp;bị&nbsp;ràng&nbsp;buộc&nbsp;bởi&nbsp;dây&nbsp;cáp.</p><p>Pin&nbsp;của&nbsp;tai&nbsp;nghe&nbsp;có&nbsp;thể&nbsp;hoạt&nbsp;động&nbsp;trong&nbsp;thời&nbsp;gian&nbsp;dài&nbsp;trước&nbsp;khi&nbsp;cần&nbsp;sạc&nbsp;lại.&nbsp;Thời&nbsp;lượng&nbsp;pin&nbsp;dài&nbsp;này&nbsp;giúp&nbsp;bạn&nbsp;sử&nbsp;dụng&nbsp;tai&nbsp;nghe&nbsp;suốt&nbsp;cả&nbsp;ngày&nbsp;mà&nbsp;không&nbsp;cần&nbsp;lo&nbsp;lắng&nbsp;về&nbsp;việc&nbsp;hết&nbsp;pin.&nbsp;Tai&nbsp;nghe&nbsp;cũng&nbsp;có&nbsp;nút&nbsp;điều&nbsp;khiển&nbsp;thông&nbsp;minh&nbsp;trên&nbsp;thân&nbsp;tai&nbsp;nghe&nbsp;để&nbsp;điều&nbsp;chỉnh&nbsp;âm&nbsp;lượng,&nbsp;chuyển&nbsp;bài&nbsp;hát&nbsp;và&nbsp;nhận&nbsp;cuộc&nbsp;gọi&nbsp;một&nbsp;cách&nbsp;dễ&nbsp;dàng.</p><p>Hình&nbsp;ảnh&nbsp;sản&nbsp;phẩm</p><p>&nbsp;</p><p>Thông&nbsp;số&nbsp;kỹ&nbsp;thuật</p><p>Thương&nbsp;hiệu&nbsp;Baseus</p><p>Tên&nbsp;Tai&nbsp;Nghe&nbsp;Chụp&nbsp;Tai&nbsp;Chống&nbsp;Ồn&nbsp;Baseus&nbsp;Bowie&nbsp;D03&nbsp;Wireless&nbsp;Headphones</p><p>Chất&nbsp;liệu&nbsp;ABS&nbsp;+&nbsp;PC&nbsp;+&nbsp;Metal</p><p>Trọng&nbsp;lượng&nbsp;211g</p><p>Phiên&nbsp;bản&nbsp;Wireless&nbsp;V5.3</p><p>Khoảng&nbsp;cách&nbsp;10m</p><p>Thời&nbsp;gian&nbsp;nghe&nbsp;nhạc&nbsp;30&nbsp;tiếng&nbsp;(Âm&nbsp;lượng&nbsp;70%)</p><p>Cổng&nbsp;sạc&nbsp;Type-C</p><p>Thời&nbsp;gian&nbsp;sạc&nbsp;Khoảng&nbsp;2&nbsp;tiếng</p><p>Dung&nbsp;lượng&nbsp;pin&nbsp;300mAh&nbsp;/&nbsp;1.11Wh</p><p>Tần&nbsp;số&nbsp;20Hz&nbsp;-&nbsp;20kHz</p>', 800000, 659000, 26, 0, 0, 0, 'Tai Nghe Chụp Tai Chống Ồn Baseus Bowie D03 Wireless Headphones', 'Tai Nghe Chụp Tai Chống Ồn Baseus Bowie D03 Wireless Headphones', 'Tai Nghe Chụp Tai Chống Ồn Baseus Bowie D03 Wireless Headphones', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(22, 4, 'Tai Nghe Chụp Tai Không Dây, Chống Ồn Chủ Động Baseus Bowie H1 ANC', 'chong-on-chu-dong-baseus-bowie-h1-anc', 'Baseus', '<p>Tai Nghe Chụp Tai Không Dây, Chống Ồn Chủ Động Baseus Bowie H1 ANC</p>', '<p>- Tai Nghe Baseus Bowie H1 trang bị công nghệ bluetooth 5.2 mới nhất hỗ trợ&nbsp;trao đổi dữ liệu không dây tầm gần giữa các thiết bị thông minh như : điện thoại , laptop, loa và tích hợp giao thức ATT (Attribute-protocol), điều này cho phép người dùng kết nối Bluetooth từ nhiều thiết bị với tai nghe, tăng tính ổn định</p><p>- Sản phẩm được trang bị tính năng DCLL ( dual channel low latency) giúp tự động hóa, cân bằng, cải thiện độ trễ âm thanh cho độ phản hồi cực cao gần như không có độ trễ (0.038s) mang đến cho bạn trải nghiệm nghe nhạc, xem phim hoặc chơi Game cực đỉnh.</p><p>&nbsp;</p><p>-&nbsp;Tai nghe&nbsp;Baseus Bowie H1&nbsp;sử&nbsp;4 micro giúp người dùng có thể trả lời những cuộc gọi dễ dàng, dù là tai nghe chụp&nbsp;tai nhưng micro hút âm thanh cực tốt giúp bạn thoải mái trò chuyện nhưng vẫn đảm bảo âm thanh không bị ảnh hưởng bởi tạp âm.</p><p>- Ngoài ra&nbsp;tai nghe Baseus&nbsp;Bowie H1 còn được trang bị tính năng&nbsp;“năng lượng thấp&nbsp;(low-energy)” giúp giảm điện năng&nbsp;kéo dài thời gian sử dụng liên tục&nbsp;lên đến 70h một thời gian sử dụng&nbsp;khá dài mà ít&nbsp;tai nghe trên thị trường&nbsp;có thể làm được.</p><p>- Với thiết kế công thái học giúp cân bằng tốt hai bên, vành tai được làm bằng kim loại chắc chắn&nbsp;có thể điều chỉnh tùy ý theo kích cỡ người sử dụng&nbsp;cho sự thoải mái, ổn định cho cả ngày sử dụng</p><p>Sử dụng App Control Baseus điều khiển , quản lý các tính năng :&nbsp;</p><p>Chế độ,&nbsp;độ trễ thấp để chơi game&nbsp;</p><p>Bản đồ vị trí (Tìm tai nghe ở khoảng cách xa)&nbsp;</p><p>Ba&nbsp;chế độ nghe nhạc : Chống ồn chủ động , Xuyên âm , Bình thường</p><p>&nbsp;</p><p>Lệnh chức năng:&nbsp;</p><p>Ngưng/phát&nbsp;bài hát: Chạm 1&nbsp;lần nút ở&nbsp;giữa</p><p>Gọi trợ lý ảo: Chạm 3&nbsp;lần nút ở&nbsp;giữa</p><p>Trở lại bài hát: Chạm và&nbsp;giữ&nbsp;1.5s&nbsp;nút volume -</p><p>Bài hát kế tiếp: Chạm và&nbsp;giữ&nbsp;1.5s&nbsp;nút volume +</p><p>Nhận cuộc gọi: Chạm 1&nbsp;lần nút ở&nbsp;giữa</p><p>Hủy cuộc gọi: Chạm và&nbsp;giữ&nbsp;1.5s nút ở giữa</p><p>Chế độ ghép nối: Nhấn và giữ nút ANC 2s</p><p>Chế độ khử tiếng ổn : Chạm 1 lần vào nút ANC</p><p>&nbsp;</p><p>Kết hợp (chuyển tiếp và phản hồi) ANC và thiết kế trong tai cung cấp các chế độ khử tiếng ồn khác nhau và giảm tiếng ồn lên đến 45dB</p><p>Chip thông minh Bluetooth 5.2 tiên tiến giúp kết nối độc lập và đồng bộ của tai nghe trái và phải ổn định</p><p>Thuật toán mạng thần kinh Al lọc âm thanh nền, giúp bạn nghe to và rõ ràng trong khi gọi</p><p>Không cần tháo tai nghe để đàm thoại, ghi lại rõ ràng âm thanh xung quanh</p><p>Bộ âm thanh toàn dải có đường kính 40mm lớn cung cấp âm trầm dày ấn tượng và hiệu ứng âm thanh 3D nhiều lớp</p><p>Pin dung lượng cao 800mAh tích hợp cho thời gian chờ 300 giờ và thời lượng pin lên đến 70 giờ và đảm bảo đủ năng lượng để sử dụng trong một tuần</p>', 1200000, 900000, 12, 1, 0, 0, 'Tai Nghe Chụp Tai Không Dây, Chống Ồn Chủ Động Baseus Bowie H1 ANC', 'Tai Nghe Chụp Tai Không Dây, Chống Ồn Chủ Động Baseus Bowie H1 ANC', 'Tai Nghe Chụp Tai Không Dây, Chống Ồn Chủ Động Baseus Bowie H1 ANC', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(23, 4, 'Củ sạc nhanh mini CD319 Business Charger Nexode / RoboGaN Mini CD519 30W UGREEN | Công nghệ GaN | Bảo hành 18 tháng', 'cd519-30w-ugreen', 'UGREEN', '<p>Củ sạc nhanh mini CD319&nbsp;</p>', '<p>Thông&nbsp;số&nbsp;kỹ&nbsp;thuật</p><p>&nbsp;</p><p>Tên&nbsp;sản&nbsp;phẩm:&nbsp;Bộ&nbsp;sạc&nbsp;nhanh&nbsp;30W&nbsp;RoboGaN&nbsp;CD359</p><p>Đầu&nbsp;vào:&nbsp;100-240V~50/60Hz&nbsp;Tối&nbsp;đa&nbsp;800mA</p><p>Đầu&nbsp;ra&nbsp;5V/3A&nbsp;9V3A&nbsp;12V/2.5A&nbsp;15V/2A&nbsp;20V/1.5A</p><p>PPS:&nbsp;3.3-11V/2.7A</p><p>Tổng&nbsp;công&nbsp;suất&nbsp;đầu&nbsp;ra:&nbsp;Tối&nbsp;đa&nbsp;30W</p><p>Kích&nbsp;cỡ:&nbsp;120x120x49mm</p><p>Trọng&nbsp;lượng&nbsp;sản&nbsp;phẩm:&nbsp;57,5g&nbsp;±&nbsp;3g</p><p>&nbsp;</p><p>- Thương hiệu: UGREEN&nbsp;</p><p>- Số mô hình: CD319&nbsp;</p><p>- Công suất tối đa: 30W&nbsp;</p><p>- Công nghệ: GaN&nbsp;</p><p>- Hỗ trợ: PD3.0/2.0, PPS, QC4.0/3.0/2.0, AFC, SCP, FCP.&nbsp;</p><p>- Công suất đầu vào: 100/240V, 50-60Hz, 800mA Max&nbsp;</p><p>- Đầu ra USB-C 5V/3A, 9V/3A, 12V/2.5A, 15V/2A, 20V/1.5A, 3.3-11V/2.7A&nbsp;</p><p>- Vật liệu: chống cháy&nbsp;</p><p>- Kích thước 32*32*58&nbsp;</p><p>&nbsp;</p><p>LƯU Ý&nbsp;</p><p>- Các cách hiển thị khác nhau có thể khiến màu sắc của sản phẩm có thể hơi khác so với hàng thật. Sai số cho phép đo là ±(1-3)cm.&nbsp;</p><p>&nbsp;</p><p>CHÍNH SÁCH BẢO HÀNH</p><p>- Bảo hành chất lượng sản phẩm 1 đổi 1 trong 18 tháng.</p><p>Với phương châm quyền lợi của khách hàng là quan trọng nhất, Ugreen Việt Nam xây dựng chính sách đổi trả dành cho khách hàng như sau:</p><p>- 1 Đổi 1 trong 18 tháng theo chính sách bảo hành.</p><p>- Tất cả các sản phẩm tuân theo điều khoản bảo hành tại thời điểm xuất hóa đơn cho khách hàng.</p><p>Chi tiết chính sách bảo hành xem tại trang chủ gian hàng.</p>', 320000, 289000, 24, 0, 1, 0, 'Củ sạc nhanh mini CD319 Business Charger Nexode / RoboGaN Mini CD519 30W UGREEN | Công nghệ GaN', 'Củ sạc nhanh mini CD319 Business Charger Nexode / RoboGaN Mini CD519 30W UGREEN | Công nghệ GaN', 'Củ sạc nhanh mini CD319 Business Charger Nexode / RoboGaN Mini CD519 30W UGREEN | Công nghệ GaN', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(24, 4, 'Củ sạc máy tính điện thoại UGREEN 100W CD226 NexodeGaN 4 cổng Sạc Nhanh PD USB BH 18 tháng 1 đổi 1 40747 40737', 'ugreen-100w', 'UGREEN', '<p>&nbsp;UGREEN 100W CD226 NexodeGaN 4&nbsp;</p>', '<p>Củ sạc máy tính / điện thoại UGREEN 100W CD226 Business Charger Nexode| Adapter| Công nghệ GaN| 4 cổng Sạc Nhanh PD USB| Tương thích với Macbook, Ipad, Máy tính bảng, iPhone 14 13 12 Series, Xiaomi USB Type C,...| Bảo hành 18 tháng 1 đổi 1 40747 15336 40737 90575</p><p>Củ sạc máy tính / điện thoại UGREEN 100W CD226 Business Charger Nexode| Adapter| Công nghệ GaN| 4 cổng Sạc Nhanh PD USB| Tương thích với Macbook, Ipad, Máy tính bảng, iPhone 14 13 12 Series, Xiaomi USB Type C,...| Bảo hành 18 tháng 1 đổi 1 40747 15336 40737 90575</p><p><br>- Sạc đồng thời 4 thiết bị</p><p>Sạc đồng thời 4 thiết bị ở tốc độ tối đa, tiết kiệm thời gian sạc lên đến 1 giờ.<br>- Sạc PD100W cho Máy tính xách tay</p><p>USB C 1 hoặc USB C 2 có thể đạt công suất lên đến 100W giúp sạc nhanh cho laptop.</p><p>- PD20W cho iPhone: Bất kỳ cổng USB C nào cũng có thể hỗ trợ sạc nhanh 20W cho dòng iPhone 8-14.</p><p>- Ít tỏa nhiệt &amp; hiệu quả cao hơn.</p><p>Yếu tố cốt lõi ảnh hưởng đến hiệu quả sử dụng năng lượng là khả năng tản nhiệt. Chất bán dẫn gali nitride (GaN) thế hệ thứ ba giúp bộ sạc tỏa ít nhiệt hơn và đẩy nhanh quá trình tản nhiệt. Đồng thời, bộ sạc này cung cấp mật độ năng lượng gấp đôi và giảm 80% tổn thất điện năng, đồng nghĩa với việc tăng hiệu suất sử dụng năng lượng.<br>- Một củ sạc là đủ.</p><p>Một củ sạc Ugreen với 4 cổng usb = 4 cục sạc một cổng.</p><p>- Nhiều phương thức sạc nhanh</p><p>USB C1/USB C2：PD3.0/PD2.0/PPS/QC4+</p><p>USB C3：QC3.0/FCP/SCP</p><p>USB A：QC3.0/QC2.0/SCP/FCP/AFC/Apple 2.4/BC1.2</p><p><br>&nbsp;</p><p><br>&nbsp;</p><p><br>&nbsp;</p>', 1300000, 1100000, 20, 0, 1, 0, 'Củ sạc máy tính điện thoại UGREEN 100W CD226 NexodeGaN 4 cổng Sạc Nhanh PD USB BH 18 tháng 1 đổi 1 40747 40737', 'Củ sạc máy tính điện thoại UGREEN 100W CD226 NexodeGaN 4 cổng Sạc Nhanh PD USB BH 18 tháng 1 đổi 1 40747 40737', 'Củ sạc máy tính điện thoại UGREEN 100W CD226 NexodeGaN 4 cổng Sạc Nhanh PD USB BH 18 tháng 1 đổi 1 40747 40737', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(25, 4, 'Pin sạc dự phòng 20000mAh UGREEN| Sạc nhanh PD 3.0 QC 3.0| Kèm cáp Lightning| BH 18 tháng 1 đổi 1| 10400.', 'pin-sac-du-phong-20000mah', 'UGREEN', '<p>Pin sạc dự phòng 20000mAh UGREEN| Sạc nhanh PD 3.0 QC 3.0|</p>', '<p>Pin sạc dự phòng 20000mAh UGREEN| Chứng nhận MFI | Sạc nhanh PD 3.0 QC 3.0| Kèm cáp Lightning| Tương thích với Dòng iPhone, Android, Samsung, AirPods| Bảo hành 18 tháng 1 đổi 1| 10400<br>SẠC ĐẦY PIN DỰ PHÒNG TRONG 5H<br>Bạn có thể sạc nhanh pin dự phòng bằng cáp usb-c<br>ĐA CHẾ ĐỘ BẢO VỆ</p><p>Bảo vệ thiết bị của bạn khỏi dòng điện quá mức, quá nhiệt, sạc quá mức, đoản mạch.<br><br>SẠC NHANH PD 20W</p><p>+ Cổng USB A trên bộ sạc pin di động hỗ trợ sạc nhanh 18W</p><p>+ Cổng USB C và cáp lightning hỗ trợ sạc nhanh PD 20W</p><p>+ Sạc nhanh iPhone 13 từ 0%-59% chỉ trong vòng 30 phút<br>DUNG LƯỢNG PIN LÊN ĐẾN 20000mAh</p><p>Sạc dự phòng di động này có thể cung cấp gần 5 lần sạc cho iPhone 13, hơn 3 lần sạc đầy cho Samsung Galaxy S23 và hơn 1 lần sạc cho iPad Pro 11<br><br>SẠC ĐỒNG THỜI 3 THIẾT BỊ</p><p>3 Prots được sử dụng cùng nhau sẽ làm giảm tổng công suất đầu ra<br>KHẢ NĂNG TƯƠNG THÍCH RỘNG</p><p>Tương thích với Dòng iPhone, Android, Samsung, AirPods</p><p>&nbsp;</p><p>THÔNG SỐ SẢN PHẨM</p><p>- Thương hiệu: UGREEN</p><p>- Đầu vào 1 : 5V3A, 9V2A, 12V1.5A</p><p>- Đầu vào 2: 5V3A, 9V2.22A, 12V1.5A</p><p>- Đầu vào 3: 5V3A, 9V2.22A</p><p>- Sạc nhanh PD3.0, QC3.0</p><p>- Dung lượng pin: 20000mAh</p><p>- Chứng nhận MFI</p><p>&nbsp;</p><p>CHÍNH SÁCH BẢO HÀNH</p><p>Bảo hành chất lượng sản phẩm 1 đổi 1 trong 18 tháng.</p><p>Với phương châm quyền lợi của khách hàng là quan trọng nhất, Ugreen Việt Nam xây dựng chính sách đổi trả dành cho khách hàng như sau:</p><p>- 1 Đổi 1 trong 18 tháng theo chính sách bảo hành.</p><p>- Tất cả các sản phẩm tuân theo điều khoản bảo hành tại thời điểm xuất hóa đơn cho khách hàng.</p>', 1000000, 749000, 15, 0, 1, 0, 'Pin sạc dự phòng 20000mAh UGREEN| Sạc nhanh PD 3.0 QC 3.0| Kèm cáp Lightning| BH 18 tháng 1 đổi 1| 10400.', 'Pin sạc dự phòng 20000mAh UGREEN| Sạc nhanh PD 3.0 QC 3.0| Kèm cáp Lightning| BH 18 tháng 1 đổi 1| 10400.', 'Pin sạc dự phòng 20000mAh UGREEN| Sạc nhanh PD 3.0 QC 3.0| Kèm cáp Lightning| BH 18 tháng 1 đổi 1| 10400.', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(26, 4, 'Sạc Apple 20W USB-C Power Adapter', 'apple-20w', 'Apple', '<p>&nbsp;Apple 20W USB-C</p>', '<p>Bộ Sạc Apple USB-C 20W giúp sạc nhanh và hiệu quả tại nhà, trong văn phòng hoặc khi đang di chuyển. Tuy bộ sạc này tương thích với mọi thiết bị có cổng USB-C, nhưng Apple khuyên bạn nên sử dụng phụ kiện này với iPad Pro 11 inch và iPad Pro 12.9 inch (thế hệ thứ 3) để đạt hiệu quả sạc tối ưu. Bạn cũng có thể sử dụng với iPhone 8 hoặc các phiên bản cao hơn để tận dụng tính năng sạc nhanh.&nbsp;</p><p>Không bán kèm cáp sạc. Tương thích Các phiên bản iPhone • iPhone 12 Pro • iPhone 12 Pro Max • iPhone 12 mini • iPhone 12 • iPhone 11 Pro • iPhone 11 Pro Max • iPhone 11 • iPhone SE (thế hệ thứ 2) • iPhone XS • iPhone XS Max • iPhone XR • iPhone X • iPhone 8 • iPhone 8 Plus Các phiên bản iPad • iPad Pro 12.9 inch (thế hệ thứ 1, 2, 3 và 4) • iPad Pro 11 inch (thế hệ thứ 1 và 2) • iPad Pro 10.5 inch • iPad Air (thế hệ thứ 3 và 4) • iPad (thế hệ thứ 7 và 8) • iPad mini (thế hệ thứ 5) Thông số kỹ thuật • Model: MHJE3 • Chức năng: Sạc • Đầu ra: Type C: 20W • Công nghệ/Tiện ích: Power Delivery</p><p>• Thương hiệu của: Mỹ&nbsp;<br>&nbsp;</p>', 790000, 490000, 35, 0, 1, 0, 'Sạc Apple 20W USB-C Power Adapter', 'Sạc Apple 20W USB-C Power Adapter', 'Sạc Apple 20W USB-C Power Adapter', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(27, 4, 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', 'apple-airpods', 'Apple', '<p>Tai nghe Bluetooth Apple AirPods 2</p>', '<p><a href=\"https://dienthoaivui.com.vn/tai-nghe-bluetooth-apple-airpods-2/\"><strong>Tai nghe Apple AirPods 2</strong></a> chính hãng VN/A là hàng mới nên chất lượng hoàn toàn được đảm bảo. Ngoài ra, khi mua tai nghe bluetooth Apple AirPods 2 VN/A khách hàng sẽ được hưởng gói bảo hành ưu đãi, cụ thể được đổi mới trong vòng 15 ngày tại CellphoneS, bảo hành 1 năm tại các trung tâm bảo hành ủy quyền của Apple tại Việt Nam. Khi mua máy khách hàng cũng được cung cấp đầy đủ hóa đơn chứng minh nguồn gốc cũng như phụ kiện kèm theo.</p><h3><strong>Dung lượng pin lớn, sử dụng bền bỉ</strong></h3><p>AirPods 2 chính hãng VN/A có dung lượng pin khá ấn tượng. Tai nghe cho 5 giờ chơi nhạc và 3 giờ đàm thoại. Ngoài ra, hộp sạc cũng sở hữu tính năng tính pin, cho thêm 24 giờ sử dụng.</p><p>AirPods 2 có 2 phiên bản: sạc không dây và sạc có dây (sạc thường). Phiên bản chúng ta đang nói đến là phiên bản sạc thường. Tuy nhiên, <strong>tai nghe AirPods 2</strong> sạc có dây ngoài cách thức sạc pin, tai nghe không có quá nhiều khác biệt so với phiên bản sạc không dây.</p><h3><strong>Thiết kế nhỏ gọn, bắt mắt</strong></h3><p>Về cơ bản <a href=\"https://cellphones.com.vn/thiet-bi-am-thanh/tai-nghe/tai-nghe-bluetooth.html\">tai nghe bluetooth</a>&nbsp;Apple AirPods 2 vẫn sở hữu thiết kế thời trang và nhỏ gọn, trọng lượng 4g cũng rất nhẹ không khác mấy so với tai nghe AirPods thế hệ đầu tiên. Nó cũng vẫn giữ nguyên thiết kế với màu trắng đặc trưng cho các dòng tai nghe. Đây là tai nghe wireless 100% và có khả năng tích hợp với mọi thiết bị Apple khác nhau nên bạn có thể linh hoạt sử dụng.<br>Thêm vào đó, chúng còn được phủ lên thêm một lớp chất liệu mới ở đầu mỗi tai nghe để giúp tai nghe được bám hơn trên tai người đeo, tương tự như lớp phủ mặt kính mờ trên mặt lưng của chiếc Pixel 3 mà Google đã trang bị cho chiếc điện thoại của mình.</p><h3><strong>Chip H1cho khả năng kết nối nhanh hơn, mở Siri bằng giọng nói</strong></h3><p>Tai nghe Apple AirPods 2 trang bị chip H1 được hy vọng sẽ giúp kết nối ổn định hơn, mượt mà hơn thế hệ tiền nhiệm, cho người dùng nhiều trải nghiệm tốt hơn. Do đó, thay vì sử dụng chip W1 như các thế hệ sản phẩm cũ thì thế hệ mới 2019 lại được thêm vào chip H1 mạnh mẽ giúp giảm thiểu thời gian chuyển đổi giữa hai thiết bị và gia tăng thời gian đàm thoại lên đến 5 giờ liên tục.<br>Trước đây, người dùng phải chạm hai lần vào tai nghe để kích hoạt trợ lý ảo Siri thì bây giờ tai nghe <strong>Airpods 2</strong> đã có sự cải tiến khi bạn chỉ cần thu âm giọng nói là có thể mở Siri chờ lệnh ngay. Tính năng này giúp bạn có thể dễ dàng điều chỉnh tai nghe mà không cần thao tác quá nhiều. Điều này cho phép người dùng có thể tương tác với Siri khi iPhone để trong túi quần.</p>', 3900000, 2650000, 9, 0, 1, 0, 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', '2023-08-30 16:36:35', '2023-09-03 17:04:37'),
(28, 4, 'Apple USB-C to Linghtning cable 1m FAE - MM0A3FE/A (Cáp Sạc)', 'linghtning', 'Apple', '<p>Apple USB-C to Linghtning</p>', '<p>Hãng sản xuất Apple Chính hãng Cổng/Khe cắm USB-Type C to Lightning Kích thước 1 m Tính năng khác - Tích hợp cùng lúc 2 cổng kết nối Type C và Lightning, để sạc hay truyền dữ liệu Bộ sản phầm gồm : 1 dây cap Bảo hành 12 tháng</p>', 700000, 590000, 50, 1, 0, 0, 'Apple USB-C to Linghtning cable 1m FAE - MM0A3FE/A (Cáp Sạc)', 'Apple USB-C to Linghtning cable 1m FAE - MM0A3FE/A (Cáp Sạc)', 'Apple USB-C to Linghtning cable 1m FAE - MM0A3FE/A (Cáp Sạc)', '2023-09-03 16:47:11', '2023-09-03 16:47:11'),
(29, 4, 'Apple AirTag | Chính hãng Apple Việt Nam', 'chinh-hang-apple-viet-nam', 'Apple', '<p>Apple AirTag</p>', '<h2><strong>Apple Airtag - Thiết bị tìm đồ thất lạc của chính Apple</strong></h2><p><strong>Airtag</strong>&nbsp;là một thiết bị nhỏ được tích hợp công nghệ Bluetooth dùng trong việc tìm kiếm đồ vật, trang thiết bị thất lạc. Dù có nhiều sản phẩm tương tự nhưng <a href=\"https://cellphones.com.vn/nha-thong-minh.html\">phụ kiện nhà thông minh</a>&nbsp;của hãng Apple hứa hẹn sẽ được tích hợp công nghệ sâu hơn, cho người dùng trải nghiệm những hoạt động tuyệt vời hơn nữa của thiết bị.</p><h3><strong>Thiết kế tròn lạ mắt, có logo Apple trên mặt trước</strong></h3><p>Phụ kiện theo dõi Apple Airtags có thiết kế hình tròn dẹp, một mặt được gắn logo quả táo đặc trưng của Apple mặt còn lại người dùng có thể tùy biến&nbsp; theo sở thích cá nhân.&nbsp;Thiết bị sẽ được gắn vào đồ vật thông qua keo đặc biệt hoặc móc nhỏ và sử dụng cùng với các đồ vật khác.<br><strong>Chip tích hợp kết nối với iPhone</strong></p><p>Airtags của apple được gắn con chip&nbsp;Apple U1 tích hợp để có thể kế nối với <a href=\"https://cellphones.com.vn/mobile/apple.html\">điện thoại iPhone</a>&nbsp;hay&nbsp;iPad, Macbooks. Nhờ vậy, bạn có thể theo dõi vị trí của phụ kiện apple AirTag như cách bạn làm để tìm thiết bị Apple bị mất.</p><p>Cách thức sử dụng khá đơn giản, dự trên mã có trong iOS 13. Khi bạn bị thất lạc đồ vật có gắn phụ kiện theo dõi, trên iPhone sẽ có thông báo. Sau đó, bạn cần nhấn vào nút trong ứng dụng Tìm để Airtag phát ra âm thanh, từ đó xác định vị trí vật đã mất.<br><strong>Phụ kiện theo dõi chính xác nhờ&nbsp;Bluetooth Low-Energy&nbsp;</strong></p><p>Nhờ kết nối Bluetooth, Air tag sẽ hoạt động được khá xa. Khi xuất hiện bất kỳ thiết bị Apple nào ở gần bị thất lạc của bạn, thông tin vị trí vật thất lạc sẽ hiện trên máy của bạn.<br><strong>Phụ kiện theo dõi chính xác nhờ&nbsp;Bluetooth Low-Energy&nbsp;</strong></p><p>Nhờ kết nối Bluetooth, Air tag sẽ hoạt động được khá xa. Khi xuất hiện bất kỳ thiết bị Apple nào ở gần bị thất lạc của bạn, thông tin vị trí vật thất lạc sẽ hiện trên máy của bạn.<br><strong>Phụ kiện theo dõi chính xác nhờ&nbsp;Bluetooth Low-Energy&nbsp;</strong></p><p>Nhờ kết nối Bluetooth, Air tag sẽ hoạt động được khá xa. Khi xuất hiện bất kỳ thiết bị Apple nào ở gần bị thất lạc của bạn, thông tin vị trí vật thất lạc sẽ hiện trên máy của bạn.</p>', 900000, 790000, 40, 0, 1, 0, 'Apple AirTag | Chính hãng Apple Việt Nam', 'Apple AirTag | Chính hãng Apple Việt Nam', 'Apple AirTag | Chính hãng Apple Việt Nam', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(30, 4, 'Sạc ANKER PowerPort III Nano 20W 1 cổng USB-C (Type-C) công nghệ PowerIQ 3.0 tương thích tích hợp PD - A2633', 'sac-anker-powerport', 'Anker', '<p>20W 1 cổng USB-C (Type-C)</p>', '<p>✅ Sau đây là các lưu ý của các bộ Combo có trong mã sản phẩm này:</p><p>=&gt; [iPhone:Củ+A8833trắng/đen] Bao gồm 2 mã sản phẩm là A2633 (củ sạc) và A8833 (cáp sạc): Bộ này dùng cho iPhone 8 trở về sau với cáp kèm theo là cáp có độ dài là 1.8 mét.</p><p>&nbsp;</p><p>=&gt; [iPhone:Củ+A8832trắng/đen] Bao gồm 2 mã sản phẩm là A2633 (củ sạc) và A8832(cáp sạc): Bộ này dùng cho iPhone 8 trở về sau với cáp kèm theo là cáp có độ dài là 0.9 mét.</p><p>&nbsp;</p><p>=&gt; [Andr: Củ+ A8852đen] Bao gồm 2 mã sản phẩm là A2633 (củ sạc) và A8852 (cáp sạc): Củ sạc Powerport III nano 20w A2633 và Cáp sạc Powerline III USB-C to USB-C (2 đầu TypeC) dành cho điện thoại Android cao cấp sử dụng chuẩn sạc là USB-C, độ dài 0.9m - A8852.</p><p>****(Quý khách lưu ý kỹ khi lựa chọn, tránh chọn nhầm loại, rất nhiều khách đã chọn combo Andr nhưng dùng sạc cho iPhone, AnkerVN không hỗ trợ đổi trả trong trường hợp chọn nhầm này).</p><p>&nbsp;</p><p>Giới thiệu về sản phẩm Củ sạc nhanh PD 20w Anker Nano:</p><p>✅ Anker Nano được thiết kế với công suất đầu ra 20W để phù hợp với đầu vào tối đa của iPhone 12, vì vậy có thể cung cấp chính xác lượng điện năng mà iPhone của bạn cần.</p><p>&nbsp;</p><p>💙Sạc nhanh</p><p>Sạc iPhone 11 lên 53% chỉ trong 30 phút — nhanh hơn gấp 3 lần so với củ sạc 5W truyền thống.</p><p>&nbsp;</p><p>💙Nhỏ gọn và dễ mang theo</p><p>Với kích thước mỗi cạnh chỉ hơn 2.5cm và trọng lượng tương đương với một cục pin AA, đây là củ sạc tốc độ cao với năng lượng vượt trội và dễ dàng mang theo.</p><p>&nbsp;</p><p>💙Tất cả trong một</p><p>Anker Nano mang theo công nghệ PowerIQ 3.0 độc quyền của Anker cho phép tích hợp công nghệ PD 3.0 và QC 3.0 tương thích tối ưu hóa để hoạt động hoàn hảo với nhiều loại điện thoại thông minh, máy tính bảng,… , vì vậy bạn có thể sạc tất cả các thiết bị di động của mình thông qua củ sạc siêu nhỏ gọn.</p><p>&nbsp;</p><p>💙Công nghệ mạch sạc tiên tiến</p><p>Công nghệ mới nhất của Anker sử dụng thiết kế xếp chồng với các thành phần mạch tùy chỉnh để giảm kích thước, tăng hiệu quả và cải thiện khả năng tản nhiệt.</p><p>&nbsp;</p><p>💙Khả năng tương thích</p><p>👍 iPhone 13/12/12 mini / 12 Pro / 12 Pro Max / iPhone SE (thế hệ thứ 2) / 11/11 Pro / 11 Pro Max / XS / XS Max / XR / X / 8 Plus / 8;</p><p>👍 Đối với dòng iPhone 13 Pro và Pro Max vui lòng chọn mã sản phẩm Anker Atom PD 30w - A2017 sẽ tối ưu hơn với công suất cao hơn.</p><p>👍 iPad Pro 12,9 inch thế hệ thứ 4/3/2/1; iPad Pro 11 inch thế hệ thứ 2/1; iPad Pro 10,5 inch; iPad Air thế hệ thứ 4/3; Pad thế hệ thứ 8/7; iPad mini thế hệ thứ 5, AirPods, Apple Watch</p><p>👍 Galaxy S10 / S10 + / S10e / S9 / S9 + / S8 / S8 +; Ghi chú 9/8; Pixel 3a / 3XL / 3/2 XL / 2, v.v.</p><p>&nbsp;</p><p>💙Thông số kỹ thuật</p><p>Đầu vào: 200-240V 0,6A 50-60Hz</p><p>Đầu ra: 5V = 3A / 9V = 2,22A</p>', 400000, 289000, 30, 1, 0, 0, 'Sạc ANKER PowerPort III Nano 20W 1 cổng USB-C (Type-C) công nghệ PowerIQ 3.0 tương thích tích hợp PD - A2633', 'Sạc ANKER PowerPort III Nano 20W 1 cổng USB-C (Type-C) công nghệ PowerIQ 3.0 tương thích tích hợp PD - A2633', 'Sạc ANKER PowerPort III Nano 20W 1 cổng USB-C (Type-C) công nghệ PowerIQ 3.0 tương thích tích hợp PD - A2633', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(31, 4, 'Cáp sạc ANKER Powerline II Lightning - dài 0.9m - A8432', 'cap-sac-anker-powerline', 'Anker', '<p>Cáp sạc ANKER Powerline II Lightning - dài 0.9m - A8432</p>', '<p>⚡ Cáp Lightning bền nhất và nhanh nhất thế giới!</p><p>Thế hệ đầu tiên của Anker PowerLine có độ bền gấp 5 lần cáp thông thường, Anker PowerLine II lại lên đến một cấp độ mới. Đầu cáp chịu được uốn cong hơn 12000 lần cùng với giật, xoắn và nhiều thử nghiệm khó khăn khác.</p><p>&nbsp;</p><p>⚡ Tốc độ và an toàn</p><p>Chứng nhận Apple MFi có nghĩa là toàn bộ sự an tâm, vì PowerLine II hoàn toàn được Apple cho phép. Được thiết kế để hoạt động không giới hạn với iPhone, iPad, iPod hoặc bất kỳ thiết bị nào có cổng Lightning.</p><p>&nbsp;</p><p>⚡ Cáp bền nhất thế giới</p><p>Đây có thể là chiếc cáp cuối cùng bạn cần mua. Anker Powerline II bền hơn 40% so với thế hệ cáp Powerline I.</p><p>&nbsp;</p><p>✅ Tương thích với</p><p>- iPhone / iPad / Mini 2 / iPad 4 / iPad Mini / Mini 2 / iPad 4 / iPad / iPad / iPad Mini (Thế hệ thứ 4), iPod nano (thế hệ thứ 7) và iPod touch (thế hệ thứ 5).</p><p>&nbsp;</p><p>- Chiều dài cáp: 0.9m</p>', 350000, 320000, 30, 0, 1, 0, 'Cáp sạc ANKER Powerline II Lightning - dài 0.9m - A8432', 'Cáp sạc ANKER Powerline II Lightning - dài 0.9m - A8432', 'Cáp sạc ANKER Powerline II Lightning - dài 0.9m - A8432', '2023-09-04 09:16:31', '2023-09-04 09:16:31');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(32, 4, 'Pin Sạc Dự Phòng Anker 622 MagGO 5000 mAh 1 Cổng USB-C - A1611', 'pin-sac-du-phong-anker-622', 'Anker', '<p>&nbsp;5000 mAh 1 Cổng USB-C - A1611</p>', '<p>Pin Sạc Dự Phòng Anker 622 MagGO 5000 mAh 1 Cổng USB-C - A1611</p><p>&nbsp;</p><p>⚡️ Chống đỡ: Có chân đế linh hoạt có thể gập lại được tích hợp sẵn giúp giữ cho iPhone 13/12 của bạn thẳng đứng để có góc nhìn thoải mái.</p><p>&nbsp;</p><p>⚡️ Mạnh và Nhanh: Nam châm siêu mạnh bắt từ tính vào vị trí để đảm bảo sự liên kết hoàn hảo và sạc hiệu quả.</p><p>Mỏng và nhỏ gọn: Thiết kế đẹp và mỏng chỉ mỏng 0,5 inch (12,8 mm), vì vậy bạn có thể thực hiện cuộc gọi, chụp ảnh tự sướng và hơn thế nữa bằng một tay.</p><p>&nbsp;</p><p>⚡️ Từ Nhỏ đến Nhỏ hơn: Công nghệ Mini Cell mới của Anker làm giảm kích thước tổng thể của pin mà không ảnh hưởng đến năng lượng và hiệu quả sạc.</p><p>&nbsp;</p><p>⚡️ Nạp năng lượng Với kích thước khiêm tốn vừa vặn trong lòng bàn tay, bộ sạc di động từ tính dung lượng 5.000 mAh có thể cung cấp thời gian sử dụng kéo dài 17 giờ.</p><p>&nbsp;</p><p>⚡️ Phí hai chiều Bao gồm các cổng đầu vào và đầu ra USB-C, giờ đây bạn có thể nhanh chóng sạc lại bộ sạc di động hoặc cấp nguồn cho bất kỳ thiết bị USB-C tương thích nào.</p><p>&nbsp;</p><p>⚡️ An toàn là trên hết Công nghệ MultiProtect độc quyền của Anker đi kèm với các tính năng an toàn tiên tiến như kiểm soát nhiệt độ, bảo vệ quá tải và hơn thế nữa để bạn sạc mà không phải lo lắng.</p><p>&nbsp;</p><p>⚡️ Khả năng tương thích:iPhone 13 / iPhone 13 Pro / iPhone 13 Pro Max, iPhone 12 / iPhone 12 Pro / iPhone 12 Pro Max với ốp điện thoại hỗ trợ từ tính.</p><p>&nbsp;</p><p>⚡️ Trong hộp có gì: Pin từ tính Anker 622 (MagGo), cáp USB-C to USB-C 23,6 inch (60 cm)<br>⛔️ Hiện tại AnkerVN có 2 hình thức bảo hành dựa trên tem vật lý (tem tròn ánh kim) và tem hình vuông có mã QR code được dán trên sản phẩm (lưu ý là tem dán trên sản phẩm không phải là tem QR dán trên hộp bao bì).</p><p>&nbsp;</p><p>✅ Nếu sản phẩm của bạn đang được dán tem vật lý thì bạn vui lòng bảo quản kỹ tem này (dán thêm 1 lớp băng keo trong đè lên) để đảm bảo quyền lợi được bảo hành.</p><p>✅ Nếu sản phẩm của bạn được dán tem vuông QR code thì bạn vui lòng xem hướng dẫn kích hoạt tại ankervn.com/huong-dan-cai-dat-va-kich-hoat-bao-hanh-tren-app-ndtl</p><p>&nbsp;</p><p>⛔️ SẢN PHẨM ANKER PHÂN PHỐI CHÍNH HÃNG TẠI VIỆT NAM SẼ ĐƯỢC MỞ HỘP (SEAL) ĐỂ DÁN TEM BẢO HÀNH HOẶC TEM QR CODE VÀ LÀM CĂN CỨ ĐỂ XÁC ĐỊNH SẢN PHẨM ĐƯỢC PHÂN PHỐI CHÍNH HÃNG!</p><p>&nbsp;</p><p>🔥 Chế độ bảo hành: Trường hợp lỗi do nhà sản xuất sẽ được bảo hành 18 tháng (Bảo hành 1 đổi 1 mới 100%).</p>', 1400000, 1350000, 30, 1, 0, 0, 'Pin Sạc Dự Phòng Anker 622 MagGO 5000 mAh 1 Cổng USB-C - A1611', 'Pin Sạc Dự Phòng Anker 622 MagGO 5000 mAh 1 Cổng USB-C - A1611', 'Pin Sạc Dự Phòng Anker 622 MagGO 5000 mAh 1 Cổng USB-C - A1611', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(33, 4, 'Tai Nghe Không Dây Huawei FreeBuds 5i | Phân giải cao | Chống ồn chủ động đa chế độ 42dB', 'tai-nghe-khong-day-huawei-freebuds-5i', 'Huawei', '<p>Tai Nghe Không Dây Huawei FreeBuds 5i | Phân giải cao | Chống ồn chủ động đa chế độ 42dB</p>', '<p>Tai Nghe Không Dây Huawei FreeBuds 5i | Âm thanh độ phân giải cao | Chống ồn chủ động đa chế độ 42dB | Phát nhạc lên đến 28h</p><p>&nbsp;</p><p>Kích thước:</p><p>Mỗi tai nghe</p><p>Chiều cao: 30,9 mm</p><p>Chiều rộng: 21,7 mm</p><p>Chiều sâu: 23,9 mm</p><p>Độ nặng: Khoảng 4,9 g±0,2 g</p><p>&nbsp;</p><p>Hộp sạc</p><p>Chiều cao: 48,2 mm</p><p>Chiều rộng: 61,8 mm</p><p>Chiều sâu: 26,9 mm</p><p>Trọng lượng: Khoảng 33,9 g±1,0 g</p><p>*Kích thước, trọng lượng sản phẩm và các thông số liên quan chỉ là các giá trị lý thuyết. Giá trị thực tế có thể khác nhau giữa các sản phẩm riêng lẻ. Tất cả các thông số kỹ thuật phải tuân theo sản phẩm thực tế.</p><p>&nbsp;</p><p>Màu sắc:</p><p>Ceramic White (trắng sứ)</p><p>Nebula Black (đen huyền ảo)</p><p>Isle Blue (xanh lơ)</p><p>&nbsp;</p><p>Công nghệ âm thanh: Chống ồn chủ động, Chống ồn nghe gọi, Chế độ Trong suốt</p><p>Cảm biến: Cảm biến Hall/Cảm biến Cap</p><p>Trình điều khiển: Trình điều khiển động 10 mm</p><p>Kết nối:</p><p>Tính tương thích Bluetooth:</p><p>BT 5.2</p><p>&nbsp;</p><p>Ghép cặp Bật lên:</p><p>Được hỗ trợ*</p><p>&nbsp;</p><p>Kết nối Bluetooth đồng thời với thiết bị kép:</p><p>Được hỗ trợ</p><p>*Yêu cầu điện thoại thông minh chạy phần mềm EMUI10 hoặc trở lên.</p><p>&nbsp;</p><p>Pin:</p><p>Dung lượng pin</p><p>Mỗi tai nghe：55 mAh (min)*</p><p>Hộp sạc：410 mAh (min)*</p><p>&nbsp;</p><p>Thời lượng phát</p><p>Phát nhạc trong 1 lần sạc: 6,0 tiếng (Khi bật ANC)**</p><p>Phát nhạc trong 1 lần sạc: 7,5 tiếng (Khi không bật ANC)**</p><p>Phát nhạc kèm hộp sạc: 18,5 tiếng (Khi bật ANC))**</p><p>Phát nhạc kèm hộp sạc: 28 tiếng (Khi không bật ANC)**</p><p>&nbsp;</p><p>Thời gian sạc</p><p>Khoảng 60 phút cho tai nghe (trong hộp sạc)***</p><p>Khoảng 110 phút cho hộp sạc mà không có tai nghe bên trong (có dây)***</p><p>&nbsp;</p><p>*Dung lượng thực tế có thể thay đổi đôi chút.</p><p>**Dữ liệu về thời lượng pin đến từ phòng thí nghiệm của Huawei với các điều kiện theo mặc định: âm lượng ở mức 50% và chế độ AAC được bật. Thời lượng pin thực tế có thể khác nhau tùy thuộc vào âm lượng, nguồn âm thanh, tín hiệu nhiễu từ môi trường, tính năng của sản phẩm và thói quen sử dụng.</p><p>***Dữ liệu sạc đến từ phòng thí nghiệm của Huawei với điều kiện thử nghiệm: 25°C trong điều kiện nhiệt độ bình thường.</p><p>&nbsp;</p><p>Điều khiển:</p><p>Tai nghe</p><p>Điều khiển nhấn: nhấn hai lần/nhấn giữ</p><p>Điều khiển vuốt: vuốt lên/vuốt xuống</p><p>&nbsp;</p><p>Hộp sạc</p><p>Nhấn</p><p>&nbsp;</p><p>Chống Bụi, Nước và Tia nước:</p><p>Tai nghe:</p><p>Chỉ số IP 54</p><p>&nbsp;</p><p>*Sản phẩm này không phải là một thiết bị chống nước chuyên nghiệp, nhưng có thể chịu được nước bắn nhẹ khi đang sử dụng bình thường. Sản phẩm đã được thử nghiệm để đạt đến chỉ số IP54 trong phòng thí nghiệm trong các điều kiện được kiểm soát. Khả năng chịu được giọt bắn có giới hạn và khả năng bảo vệ này có thể giảm dần do tình trạng hao mòn hằng ngày.</p><p>&nbsp;</p><p>Sản phẩm và phụ kiện:</p><p>Tai nghe</p><p>Hộp sạc</p><p>Đầu tai nghe silicon (ba kích cỡ)(Gồm các kích thước lớn, trung bình và nhỏ. Kích thước mặc định gắn vào tai nghe là kích thước trung bình.)</p><p>Cáp sạc USB-C</p><p>Hướng dẫn sử dụng nhanh (bao gồm thông tin an toàn)</p><p>Thẻ bảo hành</p><p>&nbsp;</p><p>*Đối với điện thoại thông minh, máy tính bảng, laptop, đồng hồ, vòng đeo thông minh, tai nghe freebuds, SoundX:</p><p>Bảo hành 12 tháng</p><p>Đổi máy trong 30 ngày đầu</p>', 1790000, 1290000, 30, 0, 0, 0, 'Tai Nghe Không Dây Huawei FreeBuds 5i | Phân giải cao | Chống ồn chủ động đa chế độ 42dB', 'Tai Nghe Không Dây Huawei FreeBuds 5i | Phân giải cao | Chống ồn chủ động đa chế độ 42dB', 'Tai Nghe Không Dây Huawei FreeBuds 5i | Phân giải cao | Chống ồn chủ động đa chế độ 42dB', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(34, 4, 'Vòng đeo tay thông minh HUAWEI Band 8 | Thiết kế siêu mỏng | Phân tích khoa học Giấc Ngủ', 'vong-deo-tay-thong-minh-huawei-band-8', 'Huawei', '<p>Vòng đeo tay thông minh HUAWEI Band 8 | Thiết kế siêu mỏng | Phân tích khoa học Giấc Ngủ</p>', '<p>Màu sắc: Màu Đen Bóng Đêm, Màu Xanh Ngọc Lục Bảo, Màu Hồng Anh Đào</p><p>&nbsp;</p><p>Kích thước: 43,45 × 24,54 × 8,99 mm</p><p>*Độ dày của vòng 8,99 mm được đo tại vị trí mỏng nhất (không tính vùng cảm biến).</p><p>*Kích thước sản phẩm, trọng lượng sản phẩm và các thông số kỹ thuật liên quan chỉ là những giá trị lý thuyết. Số liệu đo lường thực tế của từng sản phẩm có thể khác nhau. Mọi thông số kỹ thuật đều phải phù hợp với sản phẩm thực tế.</p><p>&nbsp;</p><p>Chu vi cổ tay áp dụng:</p><p>Phiên bản Màu Hồng Anh Đào</p><p>120 - 190 mm</p><p>Phiên bản Màu Xanh Ngọc Lục Bảo, và Đen Bóng Đêm</p><p>130 - 210 mm</p><p>&nbsp;</p><p>Trọng lượng: Khoảng 14 g (không có dây đeo)</p><p>*Kích thước sản phẩm, trọng lượng sản phẩm và các thông số kỹ thuật liên quan chỉ là những giá trị lý thuyết. Số liệu đo lường thực tế của từng sản phẩm có thể khác nhau. Mọi thông số kỹ thuật đều phải phù hợp với sản phẩm thực tế.</p><p>&nbsp;</p><p>Màn hình:</p><p>AMOLED 1,47 inch</p><p>194 × 368 pixel, PPI 282</p><p>*Màn hình cảm ứng AMOLED hỗ trợ các thao tác trượt và chạm.</p><p>&nbsp;</p><p>Vỏ đồng hồ:</p><p>Màu sắc</p><p>Xanh Ngọc Lục Bảo, Hồng Anh Đào, và Đen Bóng Đêm</p><p>Chất liệu</p><p>Chất liệu polyme có độ bền cao</p><p>&nbsp;</p><p>Dây đồng hồ:</p><p>Dây đeo TPU màu Đen Bóng Đêm</p><p>Dây đeo Silicon màu Hồng Anh Đào,</p><p>Dây đeo Silicon màu Xanh Ngọc Lục Bảo</p><p>&nbsp;</p><p>Bộ cảm biến:</p><p>Cảm biến quán tính 6 trục (gia tốc kế, con quay hồi chuyển và la bàn)</p><p>Cảm biến nhịp tim quang học</p><p>&nbsp;</p><p>Nút: Cảm ứng toàn màn hình + nút bên</p><p>Cổng sạc: Đế sạc từ tính</p><p>&nbsp;</p><p>Yêu cầu đối với Hệ điều hành:</p><p>EMUI 5.0 trở lên</p><p>Android 6.0 trở lên</p><p>iOS 9.0 trở lên</p><p>&nbsp;</p><p>Mức độ kháng nước: Kháng nước 5 ATM</p><p>*Sản phẩm tuân thủ mức kháng nước định mức 5 ATM theo tiêu chuẩn ISO 22810:2010, nghĩa là sản phẩm có thể chịu được áp suất nước tĩnh ở độ sâu lên đến 50 mét trong 10 phút, tuy nhiên, thực tế không có nghĩa là sản phẩm có khả năng chống thấm nước ở độ sâu 50 mét.Thiết bị này có thể được sử dụng cho các hoạt động ở vùng nước nông, chẳng hạn như các hoạt động trong bể bơi hoặc dọc theo bờ biển. Không đeo thiết bị khi lặn, tắm nước nóng, ngâm mình trong suối nước nóng hoặc phòng xông hơi khô, hoặc trong bất kỳ hoạt động nào khác liên quan đến nước sâu hoặc dòng nước chảy xiết. Hãy nhớ rửa sạch thiết bị bằng nước ngọt và lau khô thiết bị khi ngâm thiết bị trong nước biển</p><p>&nbsp;</p><p>Khả năng kết nối: 2.4 GHz, BT 5.0,BLE</p><p>Môi trường:</p><p>Nhiệt độ</p><p>-10℃ - 45℃</p><p>Sạc:</p><p>Yêu cầu về Điện áp và dòng điện của bộ sạc</p><p>5V/1A</p><p>&nbsp;</p><p>Thời lượng sử dụng Pin:</p><p>Thiết bị có thể được sử dụng trong tối đa 14 ngày.</p><p>Luôn bật tính năng theo dõi nhịp tim; tắt tính năng HUAWEI TruSleep™ vào ban đêm; tập luyện trung bình 30 phút mỗi tuần; bật tính năng thông báo tin nhắn (nhận 50 tin nhắn, 6 cuộc gọi và 3 báo thức mỗi ngày); bật màn hình 200 lần mỗi ngày.</p><p>&nbsp;</p><p>Thiết bị có thể được sử dụng đến 9 ngày ở chế độ sử dụng thường xuyên.</p><p>Luôn bật tính năng theo dõi nhịp tim, bật tính năng HUAWEI TruSleep™ vào ban đêm, bật tính năng theo dõi SpO2 tự động và phát hiện mức độ căng thẳng, tập luyện trung bình 60 phút mỗi tuần, bật tính năng thông báo tin nhắn (nhận 50 tin nhắn, 6 cuộc gọi và 3 báo thức mỗi ngày) và bật màn hình 500 lần mỗi ngày.</p><p>&nbsp;</p><p>Thiết bị có thể được sử dụng đến 3 ngày khi bật AOD.</p><p>Bật tính năng AOD (màn hình luôn hiển thị), luôn bật tính năng theo dõi nhịp tim, bật tính năng HUAWEI TruSleep™ vào ban đêm, bật tính năng theo dõi SpO2 tự động và phát hiện mức độ căng thẳng, tập luyện trung bình 60 phút mỗi tuần, bật tính năng thông báo tin nhắn (nhận 50 tin nhắn, 6 cuộc gọi và 3 báo thức mỗi ngày) và bật màn hình 500 lần mỗi ngày.</p><p>&nbsp;</p><p>*Dữ liệu được lấy từ phòng thí nghiệm của HUAWEI. Thời gian sử dụng thực tế có thể thay đổi do sự khác biệt của sản phẩm, thói quen của người dùng và môi trường.</p><p>&nbsp;</p><p>Phụ kiện trong hộp:</p><p>1 Vòng đeo tay thông minh HUAWEI Band 8</p><p>1 Dây sạc và đế sạc</p><p>1 Hướng dẫn sử dụng &amp; Thông tin an toàn &amp; Thẻ bảo hành</p>', 1180000, 980000, 20, 0, 0, 0, 'Vòng đeo tay thông minh HUAWEI Band 8 | Thiết kế siêu mỏng | Phân tích khoa học Giấc Ngủ', 'Vòng đeo tay thông minh HUAWEI Band 8 | Thiết kế siêu mỏng | Phân tích khoa học Giấc Ngủ', 'Vòng đeo tay thông minh HUAWEI Band 8 | Thiết kế siêu mỏng | Phân tích khoa học Giấc Ngủ', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(35, 4, 'Đồng Hồ Thông Minh HUAWEI WATCH FIT 2 | Màn hình HUAWEI FullView 1.74\"', 'dong-ho-thong-minh-huawei-watch-fit-2', 'Huawei', '<p>Đồng Hồ Thông Minh HUAWEI WATCH FIT 2 | Màn hình HUAWEI FullView 1.74\"</p>', '<p>Màu sắc: Đen bóng đêm, Hồng Anh đào, Xanh lơ</p><p>Kích thước: 46×33.5×10.8mm</p><p>Phiên bản Active</p><p>Kích thước cổ tay: 130-210 mm</p><p>Trọng lượng: Khoảng 26 g (không bao gồm dây đeo)</p><p>* Kích thước sản phẩm, trọng lượng sản phẩm và các thông số kỹ thuật liên quan chỉ là những giá trị giả định. Số liệu đo lường thực tế của từng sản phẩm có thể khác nhau. Mọi thông số kỹ thuật đều phải phù hợp với sản phẩm thực tế.</p><p>&nbsp;</p><p>Màn hình:</p><p>Size</p><p>1.74 inches AMOLED color screen</p><p>Resolution</p><p>336 x 480 pixels, PPI 336</p><p>&nbsp;</p><p>Vỏ Đồng hồ:</p><p>Màu sắc</p><p>Đen bóng đêm (Midnight Black), Hồng Anh đào (Sakura Pink), Xanh lơ (Isle Blue)</p><p>Chất liệu</p><p>Khung: polyme</p><p>Mặt sau: polyme</p><p>&nbsp;</p><p>Dây đeo đồng hồ:</p><p>Dây đeo Silicon màu Đen bóng đêm (Midnight Black)</p><p>Dây đeo Silicon màu Hồng Anh đào (Sakura Pink)</p><p>Dây đeo Silicon màu Xanh lơ (Isle Blue)</p><p>&nbsp;</p><p>Cảm biến: 9-axis IMU sensor (Accelerometer sensor, Gyroscope sensor,Geomagnetic sensor), Optical heart rate sensor</p><p>Nút: Full screen touch, side button</p><p>Cổng sạc: Magnetic charging thimble</p><p>Yêu cầu đối với hệ thống: Android 6.0 or later, iOS 9.0 or later</p><p>Độ chống nước: 5ATM water-resistant</p><p>*Devices complying with the 5ATM-rated water have a water resistance rating of 50 meters under ISO standard 22810:2010. This means that they may be used for shallow-water activities like swimming in a pool or ocean. However, they should not be used for scuba diving, waterskiing, or other activities involving high-velocity water or submersion below shallow depth.</p><p>&nbsp;</p><p>Khả năng kết nối:</p><p>NFC</p><p>Không hỗ trợ</p><p>Bluetooth</p><p>2.4 GHz, có hỗ trợ BT5.2 và BR+BLE</p><p>&nbsp;</p><p>Loa &amp; Micro: Supported</p><p>Môi trường: Ambient Operating Temperature, -10℃–+45℃</p><p>Sạc: Charger Voltage and Current Requirements, 5V/1A</p><p>&nbsp;</p><p>Thời lượng sử dụng pin:</p><p>Typical usage: 14 days</p><p>Default settings are used, 30 minutes of Bluetooth calling per week, 30 minutes of audio playback per week, heart rate monitoring and sleep tracking are enabled, 30 minutes of exercise per week, message notification is enabled (50 SMS messages, 6 calls, and 3 alarms per day), and the screen is turned on 200 times per day.</p><p>Heavy usage: 7 days</p><p>Default settings are used, 30 minutes of Bluetooth calling per week, 30 minutes of audio playback per week, heart rate monitoring and HUAWEI TruSleep™ are enabled, 60 minutes of exercise per week, message notification is enabled (50 SMS messages, 6 calls, and 3 alarms per day), and the screen is turned on 500 times per day.</p><p>&nbsp;</p><p>*Based on results from HUAWEI lab tests. The actual usage may vary depending on product differences, user habits, and environment variables.</p><p>&nbsp;</p><p>Phụ kiện trong hộp:</p><p>Watch x 1</p><p>Charging Cradle (including the charging cable) x 1</p><p>Quick Start Guide &amp; Safety Information &amp; Warranty Card x 1</p>', 3990000, 2400000, 5, 0, 0, 0, 'Đồng Hồ Thông Minh HUAWEI WATCH FIT 2 | Màn hình HUAWEI FullView 1.74\"', 'Đồng Hồ Thông Minh HUAWEI WATCH FIT 2 | Màn hình HUAWEI FullView 1.74\"', 'Đồng Hồ Thông Minh HUAWEI WATCH FIT 2 | Màn hình HUAWEI FullView 1.74\"', '2023-09-04 09:34:18', '2023-09-04 10:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 'uploads/products/16903423241.jpg', '2023-07-25 20:32:04', '2023-07-25 20:32:04'),
(3, 3, 'uploads/products/16903593291.jpeg', '2023-07-26 01:15:29', '2023-07-26 01:15:29'),
(4, 1, 'uploads/products/16903593911.jpg', '2023-07-26 01:16:31', '2023-07-26 01:16:31'),
(5, 4, 'uploads/products/16903594811.jpg', '2023-07-26 01:18:01', '2023-07-26 01:18:01'),
(6, 5, 'uploads/products/16904589111.jpg', '2023-07-27 04:55:11', '2023-07-27 04:55:11'),
(7, 6, 'uploads/products/16904595301.jpg', '2023-07-27 05:05:30', '2023-07-27 05:05:30'),
(8, 7, 'uploads/products/16904597061.jpg', '2023-07-27 05:08:26', '2023-07-27 05:08:26'),
(9, 8, 'uploads/products/16904601621.jpg', '2023-07-27 05:16:02', '2023-07-27 05:16:02'),
(10, 9, 'uploads/products/16904602681.jpg', '2023-07-27 05:17:48', '2023-07-27 05:17:48'),
(11, 10, 'uploads/products/16904605401.jpg', '2023-07-27 05:22:20', '2023-07-27 05:22:20'),
(15, 1, 'uploads/products/16913319221.jpg', '2023-08-06 07:25:22', '2023-08-06 07:25:22'),
(16, 1, 'uploads/products/16913319222.jpg', '2023-08-06 07:25:22', '2023-08-06 07:25:22'),
(20, 12, 'uploads/products/16930520951.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(21, 12, 'uploads/products/16930520952.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(22, 12, 'uploads/products/16930520953.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(23, 12, 'uploads/products/16930520954.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(24, 12, 'uploads/products/16930520955.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(25, 12, 'uploads/products/16930520956.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(26, 12, 'uploads/products/16930520957.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(27, 12, 'uploads/products/16930520958.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(28, 12, 'uploads/products/16930520959.jpg', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(29, 12, 'uploads/products/169305209510.txt', '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(30, 14, 'uploads/products/16932361951.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(31, 14, 'uploads/products/16932361952.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(32, 14, 'uploads/products/16932361953.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(33, 14, 'uploads/products/16932361954.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(34, 14, 'uploads/products/16932361955.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(35, 14, 'uploads/products/16932361956.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(36, 14, 'uploads/products/16932361957.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(37, 14, 'uploads/products/16932361958.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(38, 14, 'uploads/products/16932361959.jpg', '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(39, 15, 'uploads/products/16932388801.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(40, 15, 'uploads/products/16932388802.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(41, 15, 'uploads/products/16932388803.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(42, 15, 'uploads/products/16932388804.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(43, 15, 'uploads/products/16932388805.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(44, 15, 'uploads/products/16932388806.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(45, 15, 'uploads/products/16932388807.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(46, 15, 'uploads/products/16932388808.jpg', '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(47, 16, 'uploads/products/16932391631.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(48, 16, 'uploads/products/16932391632.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(49, 16, 'uploads/products/16932391633.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(50, 16, 'uploads/products/16932391634.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(51, 16, 'uploads/products/16932391635.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(52, 16, 'uploads/products/16932391636.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(53, 16, 'uploads/products/16932391637.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(54, 16, 'uploads/products/16932391638.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(55, 16, 'uploads/products/16932391639.jpg', '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(56, 17, 'uploads/products/16932401431.jpg', '2023-08-28 16:29:03', '2023-08-28 16:29:03'),
(57, 17, 'uploads/products/16932401432.jpg', '2023-08-28 16:29:03', '2023-08-28 16:29:03'),
(58, 17, 'uploads/products/16932401433.jpg', '2023-08-28 16:29:03', '2023-08-28 16:29:03'),
(59, 17, 'uploads/products/16932401434.jpg', '2023-08-28 16:29:03', '2023-08-28 16:29:03'),
(61, 18, 'uploads/products/16932403932.jpg', '2023-08-28 16:33:13', '2023-08-28 16:33:13'),
(62, 18, 'uploads/products/16932403933.jpg', '2023-08-28 16:33:13', '2023-08-28 16:33:13'),
(63, 18, 'uploads/products/16932403934.jpg', '2023-08-28 16:33:13', '2023-08-28 16:33:13'),
(64, 18, 'uploads/products/16932403935.jpg', '2023-08-28 16:33:13', '2023-08-28 16:33:13'),
(65, 18, 'uploads/products/16932809751.jpg', '2023-08-29 03:49:35', '2023-08-29 03:49:35'),
(66, 19, 'uploads/products/16932812731.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(67, 19, 'uploads/products/16932812732.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(68, 19, 'uploads/products/16932812733.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(69, 19, 'uploads/products/16932812734.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(70, 19, 'uploads/products/16932812735.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(71, 19, 'uploads/products/16932812736.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(72, 19, 'uploads/products/16932812737.jpg', '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(73, 20, 'uploads/products/16932841771.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(74, 20, 'uploads/products/16932841772.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(75, 20, 'uploads/products/16932841773.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(76, 20, 'uploads/products/16932841774.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(77, 20, 'uploads/products/16932841775.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(78, 20, 'uploads/products/16932841776.jpg', '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(79, 21, 'uploads/products/16932879851.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(80, 21, 'uploads/products/16932879852.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(81, 21, 'uploads/products/16932879853.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(82, 21, 'uploads/products/16932879854.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(83, 21, 'uploads/products/16932879855.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(84, 21, 'uploads/products/16932879856.jpg', '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(85, 22, 'uploads/products/16932882411.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(86, 22, 'uploads/products/16932882412.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(87, 22, 'uploads/products/16932882413.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(88, 22, 'uploads/products/16932882414.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(89, 22, 'uploads/products/16932882415.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(90, 22, 'uploads/products/16932882416.jpg', '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(91, 23, 'uploads/products/16932908611.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(92, 23, 'uploads/products/16932908612.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(93, 23, 'uploads/products/16932908613.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(94, 23, 'uploads/products/16932908614.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(95, 23, 'uploads/products/16932908615.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(96, 23, 'uploads/products/16932908616.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(97, 23, 'uploads/products/16932908617.jpg', '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(98, 24, 'uploads/products/16932912491.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(99, 24, 'uploads/products/16932912492.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(100, 24, 'uploads/products/16932912493.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(101, 24, 'uploads/products/16932912494.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(102, 24, 'uploads/products/16932912495.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(103, 24, 'uploads/products/16932912496.jpg', '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(104, 25, 'uploads/products/16932918011.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(105, 25, 'uploads/products/16932918012.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(106, 25, 'uploads/products/16932918013.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(107, 25, 'uploads/products/16932918014.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(108, 25, 'uploads/products/16932918015.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(109, 25, 'uploads/products/16932918016.jpg', '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(110, 26, 'uploads/products/16934129721.jpg', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(111, 26, 'uploads/products/16934129722.jpg', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(112, 26, 'uploads/products/16934129723.jpg', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(113, 26, 'uploads/products/16934129724.jpg', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(114, 26, 'uploads/products/16934129725.jpg', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(115, 26, 'uploads/products/16934129726.png', '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(116, 27, 'uploads/products/16934133951.png', '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(117, 27, 'uploads/products/16934133952.png', '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(118, 27, 'uploads/products/16934133953.png', '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(119, 27, 'uploads/products/16934133954.png', '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(120, 27, 'uploads/products/16934133955.png', '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(121, 28, 'uploads/products/16937596311.jpg', '2023-09-03 16:47:11', '2023-09-03 16:47:11'),
(122, 28, 'uploads/products/16937596312.jpg', '2023-09-03 16:47:11', '2023-09-03 16:47:11'),
(123, 28, 'uploads/products/16937596313.jpg', '2023-09-03 16:47:11', '2023-09-03 16:47:11'),
(124, 29, 'uploads/products/16937601591.jpg', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(125, 29, 'uploads/products/16937601592.png', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(126, 29, 'uploads/products/16937601593.png', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(127, 29, 'uploads/products/16937601594.jpg', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(128, 29, 'uploads/products/16937601595.jpg', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(129, 29, 'uploads/products/16937601596.jpg', '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(130, 30, 'uploads/products/16938188221.jpg', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(131, 30, 'uploads/products/16938188222.jpg', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(132, 30, 'uploads/products/16938188223.jpg', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(133, 30, 'uploads/products/16938188224.jpg', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(134, 30, 'uploads/products/16938188225.jpg', '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(135, 31, 'uploads/products/16938189911.jpg', '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(136, 31, 'uploads/products/16938189912.jpg', '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(137, 31, 'uploads/products/16938189913.jpg', '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(138, 31, 'uploads/products/16938189914.jpg', '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(139, 31, 'uploads/products/16938189915.jpg', '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(140, 32, 'uploads/products/16938192771.jpg', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(141, 32, 'uploads/products/16938192772.jpg', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(142, 32, 'uploads/products/16938192773.jpg', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(143, 32, 'uploads/products/16938192774.jpg', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(144, 32, 'uploads/products/16938192775.jpg', '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(145, 33, 'uploads/products/16938195461.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(146, 33, 'uploads/products/16938195462.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(147, 33, 'uploads/products/16938195463.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(148, 33, 'uploads/products/16938195464.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(149, 33, 'uploads/products/16938195465.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(150, 33, 'uploads/products/16938195466.jpg', '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(151, 34, 'uploads/products/16938198701.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(152, 34, 'uploads/products/16938198702.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(153, 34, 'uploads/products/16938198703.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(154, 34, 'uploads/products/16938198704.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(155, 34, 'uploads/products/16938198705.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(156, 34, 'uploads/products/16938198706.jpg', '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(157, 35, 'uploads/products/16938200581.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(158, 35, 'uploads/products/16938200582.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(159, 35, 'uploads/products/16938200583.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(160, 35, 'uploads/products/16938200584.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(161, 35, 'uploads/products/16938200585.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(162, 35, 'uploads/products/16938200586.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18'),
(163, 35, 'uploads/products/16938200587.jpg', '2023-09-04 09:34:18', '2023-09-04 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 5, '2023-07-26 07:06:34', '2023-07-26 07:06:34'),
(2, 2, 2, 0, '2023-07-26 07:34:35', '2023-07-26 07:34:35'),
(3, 5, 4, 5, '2023-07-27 04:55:11', '2023-07-27 04:55:11'),
(4, 6, 2, 5, '2023-07-27 05:05:30', '2023-07-27 05:05:30'),
(5, 7, 3, 15, '2023-07-27 05:08:26', '2023-07-27 05:08:26'),
(6, 8, 4, 3, '2023-07-27 05:16:02', '2023-07-27 05:16:02'),
(7, 9, 3, 3, '2023-07-27 05:17:48', '2023-07-27 05:17:48'),
(8, 10, 4, 5, '2023-07-27 05:22:20', '2023-07-27 05:22:20'),
(9, 1, 1, 5, '2023-08-06 02:05:44', '2023-08-19 05:30:23'),
(10, 1, 2, 4, '2023-08-06 02:05:44', '2023-09-05 11:12:52'),
(13, 12, 1, 9, '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(14, 12, 2, 6, '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(15, 12, 3, 0, '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(16, 12, 4, 3, '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(17, 12, 5, 3, '2023-08-26 12:14:55', '2023-08-26 12:14:55'),
(19, 14, 2, 5, '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(20, 14, 3, 20, '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(21, 14, 4, 20, '2023-08-28 15:23:15', '2023-08-28 15:23:15'),
(22, 15, 3, 20, '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(23, 15, 4, 20, '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(24, 15, 5, 10, '2023-08-28 16:08:00', '2023-08-28 16:08:00'),
(25, 16, 2, 5, '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(26, 16, 3, 20, '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(27, 16, 4, 10, '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(28, 16, 5, 10, '2023-08-28 16:12:43', '2023-08-28 16:12:43'),
(29, 17, 3, 100, '2023-08-28 16:29:03', '2023-08-28 16:29:03'),
(30, 18, 2, 85, '2023-08-28 16:33:13', '2023-08-28 16:33:13'),
(31, 19, 2, 5, '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(32, 19, 3, 15, '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(33, 19, 4, 15, '2023-08-29 03:54:33', '2023-08-29 03:54:33'),
(34, 20, 2, 5, '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(35, 20, 3, 5, '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(36, 20, 4, 10, '2023-08-29 04:42:57', '2023-08-29 04:42:57'),
(37, 21, 3, 10, '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(38, 21, 4, 10, '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(39, 21, 5, 6, '2023-08-29 05:46:25', '2023-08-29 05:46:25'),
(40, 22, 3, 12, '2023-08-29 05:50:41', '2023-08-29 05:50:41'),
(41, 23, 3, 20, '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(42, 23, 5, 6, '2023-08-29 06:34:21', '2023-08-29 06:34:21'),
(43, 24, 3, 20, '2023-08-29 06:40:49', '2023-08-29 06:40:49'),
(44, 25, 3, 15, '2023-08-29 06:50:01', '2023-08-29 06:50:01'),
(45, 26, 4, 35, '2023-08-30 16:29:32', '2023-08-30 16:29:32'),
(46, 27, 4, 10, '2023-08-30 16:36:35', '2023-08-30 16:36:35'),
(47, 29, 4, 40, '2023-09-03 16:55:59', '2023-09-03 16:55:59'),
(48, 30, 4, 30, '2023-09-04 09:13:42', '2023-09-04 09:13:42'),
(49, 31, 2, 10, '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(50, 31, 3, 10, '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(51, 31, 4, 10, '2023-09-04 09:16:31', '2023-09-04 09:16:31'),
(52, 32, 2, 10, '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(53, 32, 3, 10, '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(54, 32, 4, 10, '2023-09-04 09:21:17', '2023-09-04 09:21:17'),
(55, 33, 3, 15, '2023-09-04 09:25:46', '2023-09-04 09:25:46'),
(56, 34, 3, 10, '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(57, 34, 6, 10, '2023-09-04 09:31:10', '2023-09-04 09:31:10'),
(58, 35, 3, 15, '2023-09-04 09:34:18', '2023-09-04 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `reply_body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply_likes`
--

CREATE TABLE `reply_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reported_comment`
--

CREATE TABLE `reported_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `user_comment` int(11) NOT NULL,
  `link` tinyint(4) DEFAULT 0,
  `spaming` tinyint(4) DEFAULT 0,
  `attiude` tinyint(4) DEFAULT 0,
  `else` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(2, '-lectronix.com', 'http://127.0.0.1:8000/', 'E-lectronix.com', 'Shopping', 'Shopping', '391 Nam Ky Khoi Nghia, District 3, Ho Chi Minh City', '0354778644', NULL, 'phattran1023@gmail.com', 'phattran1023@gmail.com', 'facebook.com', 'fb.com', 'fb.com', 'youtube.com', '2023-08-09 01:27:39', '2023-08-15 17:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slider1', 'silder1', 'uploads/slider/1691632152.png', 0, '2023-07-26 17:42:42', '2023-08-09 18:49:12'),
(2, 'slider2', 'slider2 description', 'uploads/slider/1690418835.png', 0, '2023-07-26 17:43:15', '2023-07-26 17:47:15'),
(3, 'slider3', 'slider3 description', 'uploads/slider/1691632178.png', 0, '2023-07-26 17:47:42', '2023-08-09 18:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans_a` varchar(255) NOT NULL,
  `ans_b` varchar(255) NOT NULL,
  `ans_c` varchar(255) NOT NULL,
  `ans_d` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `question`, `ans_a`, `ans_b`, `ans_c`, `ans_d`, `correct`, `created_at`, `updated_at`) VALUES
(1, 'What does PHP stand for?', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'Pretext Hypertext Processor', 'Private Hyperlink Processor', 'B', '2023-08-27 05:35:05', '2023-08-27 05:35:05'),
(2, 'Which of the following PHP tags is used to embed PHP code within an HTML file?', '<?php ?>', '<% %>', '<? ?>', '<?= ?>', 'A', '2023-08-27 05:36:01', '2023-08-27 05:36:01'),
(3, 'Which function is used to output text to the web browser in PHP?', 'echo', 'print', 'output', 'display', 'A', '2023-08-27 05:36:30', '2023-08-27 05:36:30'),
(4, 'What is the correct way to comment a single line in PHP?', '/* This is a comment */', '// This is a comment', '// This is a comment //', '<!-- This is a comment -->', 'B', '2023-08-27 05:37:01', '2023-08-27 12:07:05'),
(5, 'How do you define a constant in PHP?', 'define(constant_name, value)', 'const constant_name = value;', 'constant constant_name = value;', 'var constant_name = value;', 'B', '2023-08-27 05:37:23', '2023-08-27 05:37:23'),
(6, 'What is the superglobal array used to collect form data in PHP?', '$_POST', '$_GET', '$_REQUEST', '$_DATA', 'A', '2023-08-27 05:37:53', '2023-08-27 05:37:53'),
(7, 'In PHP, which operator is used for concatenating strings?', '+', '*', '.', '&', 'C', '2023-08-27 05:38:26', '2023-08-27 05:38:26'),
(8, 'What does the \"include\" function in PHP do?', 'It includes a file and executes it.', 'It displays the content of a file.', 'It deletes a file from the server.', 'It checks if a file exists.', 'A', '2023-08-27 05:38:58', '2023-08-27 05:42:29'),
(9, 'What is the primary purpose of Middleware in Laravel?', 'Display web pages', 'Process HTTP requests before they reach the routes', 'Work with databases', 'Create user interfaces', 'B', '2023-08-29 06:10:08', '2023-08-29 06:10:08'),
(10, 'What does Eloquent refer to in Laravel?', 'A file management system', 'A routing system', 'An ORM (Object-Relational Mapping) for databases', 'A code testing toolkit', 'C', '2023-08-29 06:11:04', '2023-08-29 06:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `survey_users`
--

CREATE TABLE `survey_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `survey_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_users`
--

INSERT INTO `survey_users` (`id`, `user_id`, `survey_id`, `created_at`, `updated_at`) VALUES
(4, '10', '9', '2023-09-05 11:11:23', '2023-09-05 11:11:23'),
(5, '10', '8', '2023-09-05 14:01:56', '2023-09-05 14:01:56'),
(6, '10', '6', '2023-09-05 14:01:56', '2023-09-05 14:01:56'),
(7, '10', '4', '2023-09-05 14:01:56', '2023-09-05 14:01:56'),
(8, '10', '3', '2023-09-05 14:01:56', '2023-09-05 14:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$xh4uMnrLrYonVbsFRVLvKeMDua1MYF9Iu0E/UeN0Ucf3ZXN88jt.6', 'KxLyW5u0aWKXwE00YDJb1Drd2MVDsD6q5ym9Zksili01PsqVO2eQYeagHBEc', '2023-07-25 19:19:17', '2023-08-15 04:09:35', 1),
(2, 'Phat', 'ptrnvnh@gmail.com', NULL, '$2y$10$o/rRsllzFo6ZoS.hnTXGFujDEehgZiXu0DtYnKALoubvz75jtsDda', 'ixCWSmVZMhuF7MIplts7tkHCfdKESasXGE6am9uCfy6UDz1vpSV4MzimNmIT', '2023-07-25 19:20:04', '2023-08-19 04:42:19', 0),
(3, 'Trần Vĩnh Phát', 'phattran1023@gmail.com', NULL, '$2y$10$KHP6y7lXVsCQY2m1D/pGF.8vVM7UShWEpnChJtDX1zL4WEsobk9.2', NULL, '2023-07-30 02:02:30', '2023-07-30 02:02:30', 3),
(7, 'Phat3', 'ptrnvnh3@gmail.com', NULL, '$2y$10$vnk0BsEoaDicz8hTTzfXGu1QjcCDm6YKOQHe58OpgCeT.4hdXwxzG', NULL, '2023-08-15 04:27:40', '2023-08-15 04:27:40', 0),
(8, 'Tran Ngoc Anh', 'nanhtran91@gmail.com', NULL, '$2y$10$51z1VfBbhPhZz2ZUV4gSreMxkIkLCGlu/sKkqiQzV784ONTm4gNEi', NULL, '2023-08-22 07:08:17', '2023-08-22 07:08:17', 1),
(9, 'Tran Ngoc Anh (Aptech HCM)', 'anhtnts2210029@fpt.edu.vn', NULL, '$2y$10$nrsHGpYGhMdFBvsO0S4lvOHdEe9y5L1Xzj9IL7x3JhLUoCyhitR7O', NULL, '2023-09-03 14:39:30', '2023-09-03 14:39:30', 3),
(10, 'Vũ Lk', 'lkvu921@gmail.com', NULL, '$2y$10$tZuuFMj1nus7lsZ/bP.9pOAS6p36VSWbpnTbNeFS13AtYi/R2erSm', NULL, '2023-09-04 17:24:04', '2023-09-04 17:24:04', 1),
(11, 'user', 'user@user.com', NULL, '$2y$10$vl9cdbA84DmGmYnshY.ULOoPVZ2e18ktiQFApzUHf/7LnwTxA.Yd.', NULL, '2023-09-05 12:37:43', '2023-09-05 12:37:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `zip_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '999666999', '666555', '5555ssss', '2023-08-11 19:36:33', '2023-08-11 19:36:33'),
(2, 1, '035477864', '444555', '444aaa', '2023-08-12 01:21:43', '2023-08-12 01:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_img`
--

CREATE TABLE `user_img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_img_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whitelist_words`
--

CREATE TABLE `whitelist_words` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 2, 1, '2023-08-08 06:35:45', '2023-08-08 06:35:45'),
(10, 2, 8, '2023-08-15 04:18:07', '2023-08-15 04:18:07'),
(12, 1, 1, '2023-08-15 06:53:33', '2023-08-15 06:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_orders`
--
ALTER TABLE `coupon_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_comment`
--
ALTER TABLE `reported_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_users`
--
ALTER TABLE `survey_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `user_img`
--
ALTER TABLE `user_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whitelist_words`
--
ALTER TABLE `whitelist_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `coupon_orders`
--
ALTER TABLE `coupon_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply_likes`
--
ALTER TABLE `reply_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reported_comment`
--
ALTER TABLE `reported_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `survey_users`
--
ALTER TABLE `survey_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_img`
--
ALTER TABLE `user_img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whitelist_words`
--
ALTER TABLE `whitelist_words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
