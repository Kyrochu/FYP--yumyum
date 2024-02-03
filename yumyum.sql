-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 05:04 PM
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
-- Database: `yumyum`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_on`
--

CREATE TABLE `add_on` (
  `add_id` int(255) NOT NULL,
  `add_name` varchar(100) NOT NULL,
  `add_price` double NOT NULL,
  `food_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_on`
--

INSERT INTO `add_on` (`add_id`, `add_name`, `add_price`, `food_id`) VALUES
(1, 'no tomato', 0, 1),
(2, 'Extra Sauce', 0.5, 1),
(3, 'No tomato', 0, 2),
(4, 'Extra Sauce ', 0.5, 2),
(5, 'No tomato', 0, 3),
(6, 'Extra Sauce', 0.5, 3),
(7, 'No Tomato', 0, 4),
(8, 'Extra Sauce', 0.5, 4);

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
  `food_total_price` double NOT NULL,
  `cart_food_delete` int(11) NOT NULL DEFAULT 1,
  `user_id` int(255) NOT NULL,
  `add_on_id` int(255) NOT NULL,
  `add_on_name` varchar(255) NOT NULL,
  `add_on_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `food_id`, `num_food`, `food_total_price`, `cart_food_delete`, `user_id`, `add_on_id`, `add_on_name`, `add_on_price`) VALUES
(49, 1, 1, 10.5, 0, 15, 2, 'Extra Sauce', 0.5),
(50, 2, 1, 8.5, 0, 15, 4, 'Extra Sauce ', 0.5),
(51, 2, 1, 8.5, 1, 15, 4, 'Extra Sauce ', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_type`) VALUES
(7, 'Meal', 'meal'),
(8, 'Snack', 'snack'),
(9, 'Alacat', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `e_user`
--

CREATE TABLE `e_user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_user`
--

INSERT INTO `e_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_pass`) VALUES
(1, 'nicc', 'kroyk32@gmail.com', '011', '111');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` double NOT NULL,
  `food_type` varchar(50) NOT NULL,
  `food_description` varchar(200) NOT NULL,
  `food_delete` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_img`, `food_name`, `food_price`, `food_type`, `food_description`, `food_delete`) VALUES
(1, 'menu-1.jpg', 'Pork Burger', 10, 'meal', 'Fresh pork make it', 0),
(2, 'menu-2.jpg', 'Chicken Burger', 8, 'meal', 'Fresh chicken make it', 0),
(3, 'menu-3.jpg', 'Fries', 5.4, 'snack', 'Fresh potatos make it', 0),
(4, 'menu-4.jpg\r\n', 'Tuna Pizza', 12, 'meal', 'so tuna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `or_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `food_id` int(255) NOT NULL,
  `num_food` int(255) NOT NULL,
  `add_on_id` int(255) NOT NULL,
  `or_delete` int(11) NOT NULL DEFAULT 1,
  `or_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`or_id`, `user_id`, `food_id`, `num_food`, `add_on_id`, `or_delete`, `or_time`) VALUES
(36, 15, 1, 1, 2, 1, '2024-02-03 20:42:57'),
(37, 15, 2, 1, 4, 1, '2024-02-03 20:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `r_id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `total_price` double NOT NULL,
  `re_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`r_id`, `u_id`, `card_number`, `total_price`, `re_time`) VALUES
(28, 7, '', 22, '2024-01-12 11:27:11'),
(29, 15, '1111222233334444', 19.8, '2024-01-13 18:48:53'),
(30, 15, '', 33.55, '2024-01-13 18:57:10'),
(31, 15, '', 30.8, '2024-01-14 00:22:08'),
(32, 15, '', 35.2, '2024-01-14 00:23:15'),
(33, 15, '1111111111111111111111111111', 20.35, '2024-01-15 10:52:38'),
(34, 15, '1111111111111111', 11.55, '2024-01-15 21:04:59'),
(35, 15, '1111 1111 1111 1111', 8.8, '2024-01-15 21:50:16'),
(36, 15, '5432 3456 7898 7654', 12, '2024-01-16 11:48:48'),
(37, 15, '4321 2321 2345 4323', 21, '2024-01-16 11:58:12'),
(38, 15, '4323 4567 8876 5432', 21, '2024-02-03 18:50:01'),
(39, 15, '4567 8765 4323 4567', 19, '2024-02-03 20:40:46'),
(40, 15, '4578 7654 3213 4567', 19, '2024-02-03 20:42:07'),
(41, 15, '4565 4324 5687 6543', 19, '2024-02-03 20:42:57');

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
(14, 'James', '0123456788', 'l@gmail.com', '123456', '', '', '', 0, '2023-11-24 07:44:21', ''),
(15, 'Brian', '01156417215', 'kroyk32@gmail.com', '1e.', 'no 31 puki', 'melaka', 'melaka', 73500, '2024-01-12 08:05:40', '49213e'),
(18, 'nicc', '0133772811', 'chu@gmail.com', 'jjjjjj2@', 'no 11, jalan indah ', 'indah villa', 'johor', 81100, '2024-01-11 08:12:20', ''),
(19, 'lol', '010-2222222', 'test1234@gmail.com', '1e.', '', '', '', 0, '2024-01-12 08:34:47', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_on`
--
ALTER TABLE `add_on`
  ADD PRIMARY KEY (`add_id`);

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
-- Indexes for table `e_user`
--
ALTER TABLE `e_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`r_id`);

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
-- AUTO_INCREMENT for table `add_on`
--
ALTER TABLE `add_on`
  MODIFY `add_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `e_user`
--
ALTER TABLE `e_user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
