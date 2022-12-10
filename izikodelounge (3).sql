-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 08:36 AM
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
-- Database: `izikodelounge`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `event_status` varchar(150) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `created_at`, `start_date`, `end_date`, `event_status`, `description`) VALUES
(1, 'Gugulethu', 'Mathe', '+27659453937', 'gugulethumath@gmail.com', '2022-12-08 06:26:44.528009', '2022-12-01', '2022-12-09', 'Pending', NULL),
(2, '', '', '', '', '2022-12-08 08:33:18.108407', '1969-12-31', '1969-12-31', 'Pending', NULL),
(3, '', '', '', '', '2022-12-08 08:40:06.732412', '1969-12-31', '1969-12-31', 'Pending', NULL),
(4, 'Gugulethu', 'Mathe', '+27659453937', 'gugulethumath@gmail.com', '2022-12-09 07:04:25.748538', '2022-12-14', '2022-12-14', 'Pending', NULL),
(5, '', '', '', '', '2022-12-09 07:08:30.273641', '1969-12-31', '1969-12-31', 'Pending', NULL),
(6, '', '', '', '', '2022-12-09 07:14:27.632407', '1969-12-31', '1969-12-31', 'Pending', NULL),
(7, '', '', '', '', '2022-12-09 07:17:15.049229', '1969-12-31', '1969-12-31', 'Pending', NULL),
(8, '', '', '', '', '2022-12-09 07:17:16.045133', '1969-12-31', '1969-12-31', 'Pending', NULL),
(9, '', '', '', '', '2022-12-09 07:25:27.237571', '1969-12-31', '1969-12-31', 'Pending', NULL),
(10, '', '', '', '', '2022-12-09 07:58:22.876992', '1969-12-31', '1969-12-31', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `roles` varchar(100) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `first_name`, `last_name`, `email`, `contact`, `roles`, `created_at`, `updated_at`, `password`) VALUES
(1, 'Gugulethu', 'Mathe', 'admin@mprentals.co.za', '0659453937', 'Admin', '2022-03-09 17:41:09.539528', '2022-03-09 17:41:09.539528', '$2y$10$gR4PrvXfSp7uGe7VQE.rjeXxoFZuRCY/fgYxDmmPzGnLuveKRErCa'),
(16, 'Gugulethu', 'Mathe', 'gugulethumath@gmail.com', '+27659453937', 'Admin', '2022-09-30 12:21:25.976713', '2022-09-30 12:21:25.976713', '$2y$10$Sc52CMSzj04boIt6ISuRv.OeZfFfUYqC6RDroK3TmwqpkriBsUNMu'),
(21, 'Yvonne', 'Thulare', 'yvonneethulare@gmail.com', '+27659453937', 'Admin', '2022-10-19 13:19:21.983656', '2022-10-19 13:19:21.983656', '$2y$10$7Ji5SsKQy3MNY0FG.KrQPuRx50HKY.gj3XCF5oB3pY9Agt5lhtfya');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp(6) NULL DEFAULT current_timestamp(6),
  `status` varchar(100) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(110) DEFAULT NULL,
  `is_featured` tinyint(45) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `is_featured`, `img`) VALUES
(1, 'Birthday Package', 1, '/uploads/1668674538_6e92d85f88c26e3e0c06.jpg'),
(2, 'School Package', 1, '/uploads/1668713144_65a224b921bfeee417ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package_products`
--

CREATE TABLE `package_products` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_products`
--

INSERT INTO `package_products` (`id`, `package_id`, `product_id`) VALUES
(1, 4, 3),
(2, 4, 7),
(3, 4, 2),
(4, 4, 1),
(5, 4, 2),
(6, 4, 4),
(7, 4, 5),
(8, 4, 6),
(9, 4, 7),
(10, 4, 3),
(11, 2, 1),
(12, 2, 3),
(13, 1, 4),
(14, 1, 4),
(15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `is_featured` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `catergory_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `quantity`, `price`, `is_featured`, `description`, `catergory_id`, `img`) VALUES
(1, 'Coke', 'CK001', 30, '200.00', NULL, '24 x 1.5 Coke ', 3, '/uploads/1668681118_9cd4e1f0833cda9a0310.jpg'),
(2, 'Red Bull ', 'RB0001', 20, '1004.00', NULL, 'Redbull six pack', 3, '/uploads/1668690795_f99121539dc1402d5895.jpg'),
(3, 'Dj', 'Dj01', 1, '4287.00', NULL, 'Best Dj in the city', 5, '/uploads/1668709076_846167bf3789464cdedb.jpg'),
(4, 'Castle Lager', 'CL001', 12, '200.00', NULL, 'Castle lager ', 7, '/uploads/1668713510_fc3b3d5f5526f954fc23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prod_category`
--

CREATE TABLE `prod_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_category`
--

INSERT INTO `prod_category` (`id`, `name`) VALUES
(1, 'Food'),
(3, 'Drinks'),
(4, 'Entertainment'),
(5, 'staff'),
(7, 'Alcohol');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_type` varchar(45) DEFAULT NULL,
  `beds_total` int(11) DEFAULT NULL,
  `bed_types` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `occupants` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_order`
--

CREATE TABLE `room_order` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_products`
--
ALTER TABLE `package_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_category`
--
ALTER TABLE `prod_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_order`
--
ALTER TABLE `room_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_products`
--
ALTER TABLE `package_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prod_category`
--
ALTER TABLE `prod_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_order`
--
ALTER TABLE `room_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
