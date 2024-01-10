-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 04:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `addID` int(250) NOT NULL,
  `addName` varchar(500) NOT NULL,
  `addPrice` decimal(10,2) NOT NULL,
  `pro_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `name`, `email`, `password`, `admin_type`) VALUES
(2, 'test4321', 'test4321@gmail.com', 'test4321', 'SuperAdmin'),
(32, 'lee', 'lee12@gmail.com', '1234', 'Admin'),
(34, 'test', 'test123@gmail.com', 'test1234', 'SuperAdmin'),
(44, 'w', 'w@mail.com', '1234', 'SuperAdmin'),
(47, 'brian', 'brian@hotmail.com', '1111', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(19, 'Beverages', '1701186839.png'),
(20, 'Pizza', '1701186879.png'),
(22, 'test', '1701186924.png'),
(23, 'Snacks', '1701794643.png'),
(24, 'Alcohol', '1701880873.png'),
(25, 'Lunch', '1703951820.png'),
(26, 'Dinner', '1704340193.png'),
(28, 'Cakes', '1704545271.png'),
(29, 'AS', '1704545282.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(200) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_price` decimal(10,2) NOT NULL,
  `pro_desc` varchar(200) NOT NULL,
  `cat_id` int(200) NOT NULL,
  `pro_img` varchar(200) NOT NULL,
  `pro_qty` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_desc`, `cat_id`, `pro_img`, `pro_qty`) VALUES
(20, 'Chicken Pizza with American Sausage', '39.90', 'Brand New Chicken Pizza with delicious American Sausage', 20, '', 0),
(30, 'Ice Lemon Tea', '12.90', 'asdasdasd', 19, '', 0),
(31, 'Beef Pizza', '129.90', 'Beef is noice', 20, '', 22),
(34, 'NEW NAME', '100.00', 'asdasdasd', 22, '', 222),
(35, 'test', '99.90', 'asdasdasd', 22, '', 222),
(36, 'test', '99.90', 'asdasdasd', 23, '', 122),
(37, 'test', '99.90', 'asdasdasd', 24, '', 100),
(38, 'test', '100000.00', 'asdasdasd', 22, '', 5),
(39, 'test', '99.90', 'asdasdasd', 22, '', 5),
(40, 'test', '99.90', 'asdasdasd', 22, '', 100),
(41, 'test', '99.90', 'asdasdasd', 22, '', 100),
(42, 'test', '99.90', 'asdasdasd', 22, '', 100),
(44, 'test', '99.90', 'asdasdasd', 26, '', 4),
(45, 'test', '99.90', 'asdasdasd', 26, '', 4),
(46, 'test', '99.90', 'asdasdasd', 25, '', 2),
(47, 'test', '99.90', 'asdasdasd', 26, '', 0),
(52, 'test', '99.90', 'asdasdasd', 29, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` int(5) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_number`, `address`, `city`, `state`, `postcode`, `email`, `password`) VALUES
(1, 'Aiman', '000-1111111', '', '', '', 0, 'Aiman@mail.com', 'aiman0000'),
(5, 'TestUser', '012-980 8888', '', '', '', 0, 'test@user.com', 'jjj'),
(9, 'aaa', '012- 2302131 2', '', '', '', 0, 'a@mai.com', '9999'),
(12, 'lol', '019- 999 9999', '', '', '', 0, 'lol@gmail.com', 'xxx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`addID`),
  ADD KEY `LinkToProducts` (`pro_id`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `LinkToCategory` (`cat_id`);

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
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `addID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addon`
--
ALTER TABLE `addon`
  ADD CONSTRAINT `LinkToProducts` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `LinkToCategory` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
