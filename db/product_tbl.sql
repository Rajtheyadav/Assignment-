-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 08:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_tbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `prodcut_image`
--

CREATE TABLE `prodcut_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodcut_image`
--

INSERT INTO `prodcut_image` (`id`, `product_id`, `product_img`) VALUES
(3, 19, '1657934628p1.jpg'),
(4, 19, '1657934628photo-1526947425960-945c6e72858f.jpg'),
(5, 19, '1657934628product-photo-water-bottle-hero.png'),
(9, 21, '1657942226myw3schoolsimage.jpg'),
(10, 21, '1657942226p1.jpg'),
(11, 21, '1657942226photo-1526947425960-945c6e72858f.jpg'),
(12, 21, '1657942226product-photo-water-bottle-hero.png'),
(17, 22, '1657945068photo-1526947425960-945c6e72858f.jpg'),
(18, 22, '1657945068product-photo-water-bottle-hero.png'),
(29, 32, '1657950540p1.jpg'),
(30, 32, '1657950540photo-1526947425960-945c6e72858f.jpg'),
(32, 32, '1657951228p1.jpg'),
(34, 33, '1657951782p1.jpg'),
(35, 33, '1657951782photo-1526947425960-945c6e72858f.jpg'),
(36, 33, '1657951782product-photo-water-bottle-hero.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_desccription` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_desccription`, `product_image`, `created_on`) VALUES
(19, 'test', 54, 'test', NULL, '2022-07-16 01:23:48'),
(21, 'asdasd', 23, 'aasdasd', NULL, '2022-07-16 03:30:26'),
(22, 'testing', 1000, 'testing', NULL, '2022-07-16 04:17:48'),
(32, 'Abc test', 7000, 'testing data', NULL, '2022-07-16 05:49:00'),
(33, 'Testing', 7000, 'testing', NULL, '2022-07-16 06:09:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prodcut_image`
--
ALTER TABLE `prodcut_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodcut_image`
--
ALTER TABLE `prodcut_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
