-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 03:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(1, 0, 5, 1, '2025-05-31 05:00:35'),
(42, 0, 5, 1, '2025-05-31 07:50:54'),
(43, 0, 5, 1, '2025-05-31 07:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(5, 'Formals Shirts', 'MensWear', '                                            All kinds of menswear                                                                                                                                                                                                                                                                                                ', 0, 1, '1748089092.jpg', '                                    ', '                                    All kinds of menswear                                                                                                                                                                                                                                                                                                ', '                                    all kinds of menswear                                                                                                                                                                                                                                                                                                ', '2025-05-24 12:18:12'),
(12, 'Shirts', 'Shirt', '                                     this is good fabric                                    ', 0, 1, '1748285403.jpg', '                                    ', '                                    fresh                                    ', '                                    fresh                                    ', '2025-05-26 18:50:03'),
(14, 'Lowers', 'Lowers', '                                    BEST QUALITY LOWERS', 0, 1, '1748286092.jpg', '                                    LOWER', '                                    LOWER', '                                    LOWER', '2025-05-26 19:01:32'),
(15, 'Shirt Jeans Combos', 'Shirt Jeans', ' best quality combos are available                                    ', 0, 1, '1748286259.jpg', '                                    ', '                                    combos                                    ', '                                    combos                                    ', '2025-05-26 19:04:19'),
(16, 'Glasses', 'Glasses', 'Best Quality Glasses', 0, 1, '1748286878.jpg', 'Glasses', 'Glasses', 'Glasses', '2025-05-26 19:14:38'),
(18, 'Ties', 'Ties', 'Best Quality Ties', 0, 1, '1748287013.jpg', 'ties', 'ties', 'ties', '2025-05-26 19:16:53'),
(19, 'T shirts', 'T shirts', 'Best Quality T shirts for summer', 0, 1, '1748287094.jpg', 'T shirts', 'T shits', 'T shirts', '2025-05-26 19:18:14'),
(25, 'Jeans', 'Jeans', 'jeans', 0, 1, '1748427931.jpg', 'Jeans', 'Jeans', 'Jeans', '2025-05-28 10:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(4, 0, 'POLO Shirt', 'POLO SHirts', 'Plain polo shirts                                                                                                         ', 'plain polo shirts                                                                                                        ', 1900, 1400, '1748406029.jpg', 10, 0, 0, '                                    Polo shirts plain                                                                                                        ', '                                                    ', '                                                    ', '2025-05-28 04:20:29'),
(5, 12, 'Brooks Brothers', 'Original polo shirts', 'Original polo shirts                                                                                                                                                                                                                ', 'Original polo shirts                                                                                                                                                                                                                ', 550, 1200, '1748406193.jpg', 6, 0, 1, 'Original Polo shirts                                                                                                                                                                           ', '                                                    ', '                                                    ', '2025-05-28 04:23:13'),
(6, 12, 'American Eagle', 'American eagle shirts', 'Original American Eagle Shirts                                                    ', 'Original American Eagle Shirts                                                    ', 1500, 3200, '1748406455.jpg', 10, 0, 0, 'Original Shirts                                                    ', '                                                    ', '                                                    ', '2025-05-28 04:27:35'),
(7, 13, 'G-Star', 'G-Star', 'G-Star jeans                                                    ', 'G-Star jeans                                                    ', 1250, 2500, '1748406688.jpg', 25, 0, 1, 'G-Star jeans                                                    ', '                                                    ', '                                                    ', '2025-05-28 04:31:28'),
(8, 13, 'Hugo Boss', 'Hugo Boss', 'Hugo Boss jeans                                                                                                        ', 'Hugo Boss jeans                                                                                                        ', 1350, 2600, '1748406797.jpg', 4, 0, 1, 'Hugo Boss jeans                                                                                                        ', '                                                    ', '                                                    ', '2025-05-28 04:33:17'),
(9, 0, 'Original Ties', 'Original Ties', 'Original Ties', 'Original Ties', 2000, 4000, '1748406865.jpg', 6, 0, 1, 'Original Ties', 'Original Ties', 'Original Ties', '2025-05-28 04:34:25'),
(11, 12, 'Burberry Shirts', 'Burberry Shirts', 'Burberry Shirts                                                                                                                                                            ', 'Burberry Shirts                                                                                                                                                            ', 250, 1100, '1748407032.jpg', 5, 0, 1, 'Burberry Shirts                                                                                                                                                            ', '                                                    ', '                                                    ', '2025-05-28 04:37:12'),
(12, 0, 'Ties', 'Ties', 'Ties', 'We have best quality ties', 250, 550, '1748407755.jpg', 25, 0, 1, 'Ties', 'Ties', 'Ties', '2025-05-28 04:49:15'),
(13, 12, 'Brooks Brothers', 'MensWear', 'Best Quality Shirts                                                                                                        ', 'Best Quality Shirts                                                                                                        ', 650, 1300, '1748427607.jpg', 25, 0, 1, 'Original Shirts                                                                                                        ', '                                                    ', '                                                    ', '2025-05-28 10:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'AdminLavi', 'lovyv189@gmail.com', 1111111111, '12345678', 1, '2025-05-23 18:20:14'),
(2, 'Yash', 'yash@gmail.com', 2147483647, '12345678', 0, '2025-05-23 18:21:18'),
(3, 'Param', 'param@gmail.com', 1111111111, '12345678', 0, '2025-05-23 19:25:16');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
