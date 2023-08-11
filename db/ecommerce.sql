-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 04:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(12, 'Samsung Tablet', 'samsung-tablet', 0, '2023-07-27 05:23:09', '2023-07-27 05:23:21', 3);

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
(2, 'Laptop', 'laptop', 'This is a laptop description', 'uploads/category/1690339183.jpg', 'Laptop', 'This is a laptop description', 'This is a laptop description', 0, '2023-07-25 19:39:43', '2023-07-25 19:39:43'),
(3, 'Tablet', 'tablet', 'discription tablet', 'uploads/category/1690359264.jpeg', 'Tablet', 'meta keyword tablet', 'meta description tablet', 0, '2023-07-26 01:14:24', '2023-07-26 01:14:24');

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
(5, 'Silver', 'silver', '0', '2023-07-27 05:13:52', '2023-07-27 05:13:52');

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
(1, 1, 2, 'Hello world', '2023-08-08 06:30:20', '2023-08-08 06:30:20');

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
(28, '2023_08_09_080456_create_settings_table', 9);

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
(1, 1, 'Order-bwVCeZ', 'Admin', 'admin@gmail.com', '0354778644', '555555', 'asssaassa', 'In Progress...', 'Cash On Delivery', NULL, '2023-07-30 10:32:22', '2023-07-30 10:32:22'),
(2, 1, 'Order-3i3e4A', 'Admin', 'admin@gmail.com', '0354778644', '555555', 'asssaassa', 'In Progress...', 'Cash On Delivery', NULL, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(3, 1, 'Order-fWv8O3', 'Admin', 'admin@gmail.com', '4444555555', '555444', 'Hmmmmm', 'In Progress...', 'Paid by Paypal', '9CY582208G4243915', '2023-08-06 02:06:35', '2023-08-06 02:06:35'),
(4, 1, 'Order-2WczEP', 'Admin', 'admin@gmail.com', '666666555', '555666', '5555555', 'In Progress...', 'Paid by MoMo', '1691312832', '2023-08-06 02:07:13', '2023-08-06 02:07:13'),
(5, 1, 'Order-sf6RzX', 'Admin', 'admin@gmail.com', '555666999', '555666', 'đ5d55d5đ', 'out-for-delivery', 'Paid by Paypal', '14S28890HR4550005', '2023-08-06 07:33:13', '2023-08-07 04:02:09'),
(6, 1, 'Order-nr8ujw', 'Admin', 'admin@gmail.com', '555666999', '555666', '666', 'In Progress...', 'Paid by MoMo', '1691491595', '2023-08-08 03:47:10', '2023-08-08 03:47:10'),
(7, 2, 'Order-2kW8Qh', 'Phat', 'ptrnvnh@gmail.com', '565566999', '555666', '555666', 'In Progress...', 'Paid by Paypal', '9NT05650S4389643T', '2023-08-08 06:35:28', '2023-08-08 06:35:28');

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
(1, 1, 1, NULL, 5, 1200, '2023-07-30 10:32:22', '2023-07-30 10:32:22'),
(2, 1, 2, 1, 4, 1400, '2023-07-30 10:32:22', '2023-07-30 10:32:22'),
(3, 2, 1, NULL, 5, 1200, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(4, 2, 2, 1, 4, 1400, '2023-07-30 10:36:46', '2023-07-30 10:36:46'),
(5, 3, 1, 10, 1, 1200000, '2023-08-06 02:06:35', '2023-08-06 02:06:35'),
(6, 4, 1, 10, 1, 1200000, '2023-08-06 02:07:13', '2023-08-06 02:07:13'),
(7, 5, 1, 10, 1, 1200000, '2023-08-06 07:33:13', '2023-08-06 07:33:13'),
(8, 6, 1, 10, 1, 1200000, '2023-08-08 03:47:10', '2023-08-08 03:47:10'),
(9, 7, 1, 9, 1, 1200000, '2023-08-08 06:35:29', '2023-08-08 06:35:29');

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
(1, 1, 'Samsung S23 Ultra', 's23-ultra', 'Nokia', '5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB', 1000000, 1200000, 4, 1, 1, 0, 'Samsung Galaxy S23 Ultra 5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB', 'Samsung Galaxy S23 Ultra 5G 256GB', '2023-07-25 20:17:05', '2023-08-06 02:32:39'),
(2, 1, 'iPhone 14 Pro Max 128GB', 'iphone-14-pro-max', 'Nokia', 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', 1200, 1400, 5, 1, 1, 0, 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', '2023-07-25 20:32:04', '2023-08-06 02:36:05'),
(3, 3, 'Samsung Galaxy Tab S9 WiFi 128GB', 'galaxy-tab-s9-wifi', 'Nokia', 'galaxy tab s9 wifi', 'galaxy tab s9 wifi', 1500, 1000, 0, 1, 0, 0, 'galaxy tab s9 wifi', 'galaxy tab s9 wifi', 'galaxy tab s9 wifi', '2023-07-26 01:15:29', '2023-08-06 02:36:13'),
(4, 1, 'Samsung Galaxy Z Fold4 5G 256GB', 'samsung-galaxy-z-fold4-5g-256gb', 'Nokia', 'Samsung Galaxy Z Fold4 5G 256GB', 'Samsung Galaxy Z Fold4 5G 256GB', 1600, 900, 30, 1, 0, 0, 'Samsung Galaxy Z Fold4 5G 256GB', 'Samsung Galaxy Z Fold4 5G 256GB', 'Samsung Galaxy Z Fold4 5G 256GB', '2023-07-26 01:18:01', '2023-07-26 01:18:58'),
(5, 3, 'iPad 9 Wifi 64GB', 'ipad-9-wifi', 'Apple', 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', 1000, 2000, 20, 1, 0, 0, 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', 'iPad 9 Wifi 64GB', '2023-07-27 04:55:11', '2023-07-27 04:55:11'),
(6, 1, 'Xiaomi 13 5G', 'xiaomi-13-5g', 'Xiaomi', 'xiaomi 13 5G', 'xiaomi 13 5G', 1200, 1000, 100, 1, 0, 0, 'xiaomi 13 5G', 'xiaomi 13 5G', 'xiaomi 13 5G', '2023-07-27 05:05:30', '2023-07-27 05:05:30'),
(7, 1, 'Xiaomi 12T 5G 256GB', 'xiaomi-12t-5g-256gb', 'Xiaomi', 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', 1100, 1300, 10, 1, 0, 0, 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', 'Xiaomi 12T 5G 256GB', '2023-07-27 05:08:26', '2023-07-27 05:08:26'),
(8, 2, 'Lenovo Ideapad Gaming 3 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050/120Hz/Win11', 'lenovo-ideapad-gaming-3', 'Nokia', 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3', 1200, 980, 10, 0, 0, 0, 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3', '2023-07-27 05:16:02', '2023-07-27 05:19:10'),
(9, 2, 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'laptop-lenovo-legion-5', 'Lenovo', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 1200, 1000, 15, 0, 0, 0, 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', 'Laptop Lenovo Legion 5 15IAH7 i5 12500H/8GB/512GB/4GB RTX3050Ti/165Hz/Win11', '2023-07-27 05:17:48', '2023-07-27 05:18:54'),
(10, 3, 'Samsung Galaxy Tab A8 (2022)', 'samsung-galaxy-tab-a8-2022', 'Samsung Tablet', 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', 1000, 650, 10, 0, 0, 0, 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', 'Samsung Galaxy Tab A8 (2022)', '2023-07-27 05:22:20', '2023-07-27 05:23:33');

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
(16, 1, 'uploads/products/16913319222.jpg', '2023-08-06 07:25:22', '2023-08-06 07:25:22');

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
(9, 1, 1, 0, '2023-08-06 02:05:44', '2023-08-08 06:35:29'),
(10, 1, 2, 1, '2023-08-06 02:05:44', '2023-08-08 03:47:10');

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
(2, 'E-lectronix.com', 'http://127.0.0.1:8000/', 'E-lectronix', 'Shopping', 'Shopping', '391 Nam Ky Khoi Nghia, District 3, Ho Chi Minh City', '0354778644', NULL, 'phattran1023@gmail.com', 'phattran1023@gmail.com', 'facebook.com', 'fb.com', 'fb.com', 'youtube.com', '2023-08-09 01:27:39', '2023-08-09 06:28:33');

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
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$DmplFPO0/F.64Qd0DvaxEus8BkKcfZHvykyE8FgQ9LqtHNC9RkRIG', NULL, '2023-07-25 19:19:17', '2023-07-25 19:19:17', 1),
(2, 'Phat', 'ptrnvnh@gmail.com', NULL, '$2y$10$fVGLtBm1o2uNJdFjw4d5XelDSjhDk.lLGhxRm5QrX7Ze0NA2mWq1K', '0Hl71H8IYcZUj7QX3VfKMpPTFA10nuAXiKglRiDrhjxNGNgAMjgAu4BCMTRC', '2023-07-25 19:20:04', '2023-08-08 04:36:41', 0),
(3, 'Trần Vĩnh Phát', 'phattran1023@gmail.com', NULL, '$2y$10$KHP6y7lXVsCQY2m1D/pGF.8vVM7UShWEpnChJtDX1zL4WEsobk9.2', NULL, '2023-07-30 02:02:30', '2023-07-30 02:02:30', 3);

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
(9, 2, 1, '2023-08-08 06:35:45', '2023-08-08 06:35:45');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
