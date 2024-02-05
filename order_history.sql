-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 01:39 AM
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
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `his_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `add_on_name` varchar(255) DEFAULT NULL,
  `add_on_price` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`his_id`, `order_date`, `username`, `contact_number`, `food_name`, `add_on_name`, `add_on_price`, `quantity`, `price`, `total_price`) VALUES
(64, '2024-02-05 08:35:26', 'Brian', '01156417215', 'Pork Burger', 'no tomato', 0, 1, 10, 10),
(65, '2024-02-05 08:35:26', 'Brian', '01156417215', 'Pork Burger', 'Extra Sauce', 0.5, 1, 10, 10.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`his_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
