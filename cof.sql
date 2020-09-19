-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 10:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cof`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `food_id` int(11) NOT NULL,
  `customer_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmt_id`, `comment`, `food_id`, `customer_name`) VALUES
(7, 'ok', 1, NULL),
(8, 'good', 1, ''),
(9, 'The aroma itself is unique!', 1, ''),
(10, 'The aroma itself is unique!', 1, ''),
(11, 'The aroma itself is unique!', 1, ''),
(12, 'The aroma itself is unique!', 1, ''),
(13, 'Best coffee ever!', 1, ''),
(14, 'Too cossy!', 1, 'ts'),
(15, 'Too cossy!', 1, 'ts'),
(16, 'The aroma itself is unique!', 1, 'ts'),
(17, 'Best coffee in town!', 1, 'ts'),
(18, 'ok', 1, 'ts'),
(19, 'ok', 1, 'ts'),
(20, 'ok', 1, 'ts'),
(21, 'ok', 1, 'ts'),
(22, 'ok', 1, 'ts'),
(23, 'ok', 1, 'ts'),
(24, 'Too cossy!', 1, 'zz'),
(25, 'good', 2, 'zz');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `username`, `password`, `phone`, `email`, `address`, `gender`, `image`, `membership`) VALUES
(1, 'Towsif Salauddin', 'ts', '1234', '01951953901', 'tawsif824@gmail.com', '192A debidas ghat lane', 'male', '1599166922.png', 'Gold'),
(2, 'Fardin', 'fardin', '12345678', '01951953901', '123@gmail.com', '192A debidas ghat lane', 'male', 'http://127.0.0.1/img/profile/_.PNG', 'gold'),
(3, 'nafis', 'naf', '123456', '12231', '23@gmail.com', '192A debidas ghat lane', 'male', '1600268341.jpg', 'gold'),
(4, 'abc', 'A', '123456', '131313', '1234@gmail.com', 'AAA', 'female', 'http://127.0.0.1/img/profile/_.PNG', 'none'),
(5, 'abc', 'abc', '123456', '0889789', '12394@gmail.com', '192A debidas ghat lane', 'male', '1600186655.jpg', 'none'),
(6, 'Mita', 'aa', '12345678', '313131', '312@gmail.com', 'adadasda', 'male', '1599158907.PNG', 'none'),
(7, 'mishu', 'mi', '123456', '12345678', 'm@gmail.com', '192A debidas ghat lane', 'female', '1600186428.png', 'none'),
(8, 'Zidan', 'zz', '123456', '1234667', 'zz@gmail.com', 'mirpur', 'male', '1600443109.jpg', 'none'),
(9, 'adnan', 'aa', '123456', '1234567899', 'a@gmail.com', '123/2A', 'male', '1600443291.jpg', 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggested` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `discount_amount`, `status`, `ingredients`, `image`, `suggested`) VALUES
(1, 'Cappachino\r\n', 80, NULL, 'available', 'Hot water,cocoa bin', NULL, 'yes'),
(2, 'Aericcano', 100, NULL, 'available', 'Coco bin,hot water', NULL, 'yes');

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
(1, '2014_10_12_000000_create_customers_table', 1),
(2, '2020_09_14_162237_create_foods_table', 2),
(3, '2020_09_17_142531_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `grand_total` double(8,2) NOT NULL,
  `item_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` enum('cash_on_delivery','paypal','bKash','card','cash') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user`, `status`, `grand_total`, `item_count`, `is_paid`, `payment_method`, `shipping_name`, `shipping_address`, `shipping_city`, `shipping_phone`, `shipping_notes`) VALUES
(1, 'OrderNumber-5f636f046a291', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(2, 'OrderNumber-5f637c71f379e', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(3, 'OrderNumber-5f637cd6bd33e', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(4, 'OrderNumber-5f637cf751c3b', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(5, 'OrderNumber-5f637d9ba54c2', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(6, 'OrderNumber-5f637dab59405', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(7, 'OrderNumber-5f637e4741cbb', 'ts', 'pending', 80.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(8, 'OrderNumber-5f6383283b390', 'naf', 'pending', 400.00, 1, 0, 'cash_on_delivery', 'Nafis', '12/4a', 'Dhaka', '12331312', 'call before arrival'),
(9, 'OrderNumber-5f64c68227a8d', 'ts', 'pending', 480.00, 1, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(10, 'OrderNumber-5f64c77c0038f', 'ts', 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Towsif Salauddin', '192A debidas ghat lane', 'Dhaka', '01951953901', 'be quick'),
(11, 'OrderNumber-5f64d0f375751', 'ts', 'pending', 320.00, 1, 0, 'cash_on_delivery', 'zidan', '192A debidas ghat lane', 'Dhaka', '01951953901', 'please mae it on time');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `food_id`, `price`, `quantity`) VALUES
(1, 7, 1, 80.00, 1),
(2, 8, 2, 100.00, 4),
(3, 9, 1, 80.00, 6),
(4, 11, 1, 80.00, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_food_id_foreign` (`food_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
