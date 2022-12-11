-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 11:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `description` varchar(100) DEFAULT NULL,
  `number` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `created_at`, `start_date`, `end_date`, `event_status`, `description`, `number`) VALUES
(1, 'Gugulethu', 'Mathe', '+27659453937', 'gugulethumath@gmail.com', '2022-12-10 08:30:33.877876', '0000-00-00', '0000-00-00', NULL, NULL, 3),
(2, 'Blessing', 'Sibanda', '+27659453937', 'blessingnsibanda@gmail.com', '2022-12-11 07:52:08.723149', '0000-00-00', '0000-00-00', 'Pending', NULL, 3),
(3, 'Blessing', 'Sibanda', '+27659453937', 'blessingnsibanda@gmail.com', '2022-12-11 07:55:05.122269', '0000-00-00', '0000-00-00', 'Pending', NULL, 5),
(4, 'Blessing', 'Sibanda', '+27659453937', 'blessingnsibanda@gmail.com', '2022-12-11 08:33:04.418366', '0000-00-00', '0000-00-00', 'Pending', NULL, 5),
(5, 'Blessing', 'Sibanda', '+27659453937', 'blessingnsibanda@gmail.com', '2022-12-11 08:37:08.380036', '0000-00-00', '0000-00-00', 'Pending', NULL, 5),
(6, '', '', '', '', '2022-12-11 09:08:19.170765', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(7, '', '', '', '', '2022-12-11 09:48:47.180793', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(8, '', '', '', '', '2022-12-11 09:49:28.026454', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(9, '', '', '', '', '2022-12-11 10:12:21.652330', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(10, '', '', '', '', '2022-12-11 11:03:54.389017', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(11, '', '', '', '', '2022-12-11 11:31:43.323499', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(12, 'Sierra', 'Morin', '+1 (978) 639-1673', 'xiladoma@mailinator.com', '2022-12-11 11:45:52.329458', '0000-00-00', '0000-00-00', 'Pending', NULL, 739),
(13, 'Sierra', 'Morin', '+1 (978) 639-1673', 'xiladoma@mailinator.com', '2022-12-11 12:36:52.801566', '0000-00-00', '0000-00-00', 'Pending', NULL, 5),
(14, '', '', '', '', '2022-12-11 17:52:37.808042', '0000-00-00', '0000-00-00', 'Pending', NULL, 0),
(15, '', '', '', '', '2022-12-11 21:33:26.560610', '0000-00-00', '0000-00-00', 'Pending', NULL, 0);

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
  `staff_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0
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
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 1),
(5, 1, 2),
(6, 1, 4);

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
(3, 'Dj', 'Dj01', 1, '4287.00', NULL, 'Best Dj in the city', 5, '/uploads/1668709076_846167bf3789464cdedb.jpg'),
(4, 'Castle Lager', 'CL001', 12, '200.00', NULL, 'Castle lager ', 7, '/uploads/1668713510_fc3b3d5f5526f954fc23.jpg'),
(5, 'T shirt', 'RB0001', 1, '100.00', NULL, 'Tshirt', 5, '/uploads/1670747393_234adbd341fd5cfb3bc7.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
