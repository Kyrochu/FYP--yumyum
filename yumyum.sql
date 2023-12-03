-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 05:15 AM
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
-- Database: `yumyum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `name`, `email`, `password`, `admin_type`) VALUES
(2, 'test4321', 'test4321@gmail.com', 'test4321', 'SuperAdmin'),
(32, 'lee', 'lee12@gmail.com', '1234', 'Admin'),
(34, 'test', 'test123@gmail.com', 'test1234', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `food_id` int(100) NOT NULL,
  `num_food` int(30) NOT NULL,
  `cart_food_delete` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `food_id`, `num_food`, `cart_food_delete`) VALUES
(1, 2, 1, 1),
(5, 1, 1, 1),
(6, 4, 1, 1),
(7, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(200) NOT NULL,
  `cat_name` int(200) NOT NULL,
  `cat_img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(6, 0, '1701012867.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` varchar(30) NOT NULL,
  `food_type` varchar(50) NOT NULL,
  `food_description` varchar(200) NOT NULL,
  `food_delete` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_img`, `food_name`, `food_price`, `food_type`, `food_description`, `food_delete`) VALUES
(1, 'menu-1.jpg', 'Pork Burger', '10', 'meal', 'Fresh pork make it', 0),
(2, 'menu-2.jpg', 'Chicken Burger', '8', 'meal', 'Fresh chicken make it', 0),
(3, 'menu-3.jpg', 'Fries', '5', 'snack', 'Fresh potatos make it', 0),
(4, 'menu-4.jpg\r\n', 'Tuna Pizza', '12', 'meal', 'so tuna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `m_id` int(11) NOT NULL,
  `m_image` varchar(255) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_desc` text NOT NULL,
  `m_category` varchar(200) NOT NULL,
  `m_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(100) NOT NULL,
  `test_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_img`) VALUES
(1, 'team-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(300) NOT NULL,
  `postcode` int(11) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_number`, `email`, `password`, `address`, `city`, `state`, `postcode`, `updated_time`, `code`) VALUES
(5, 'James', '015664789', 'lewmingren@gmail.com', '111111', '', '', '', 0, '2023-11-24 07:44:21', ''),
(7, 'James', '1433223', 'ddd@gmail.com', '111', '', '', '', 0, '2023-11-24 07:44:21', ''),
(8, 'jeremie', '0123456789', 'lewmingren@g', '1', '', '', '', 0, '2023-11-24 07:44:21', ''),
(9, 'jeremie', '0123456789', 'jeremie@gmail.com', '12345', '', '', '', 0, '2023-11-24 07:44:21', ''),
(10, 'James', '0123456789', 'lewmingren@gmaom', '111', '', '', '', 0, '2023-11-24 07:44:21', ''),
(11, 'jeremie', '0123456789', 'lewmingren@gmom', '111', '', '', '', 0, '2023-11-24 07:44:21', ''),
(12, 'James', 'abc', 'lewmin@gmail', '111', '', '', '', 0, '2023-11-24 07:44:21', ''),
(14, 'James', '0123456788', 'l@gmail.com', '123456', '', '', '', 0, '2023-11-24 07:44:21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
