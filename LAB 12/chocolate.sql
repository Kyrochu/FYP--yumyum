-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 07:34 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocolate`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` char(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_price` decimal(5,2) NOT NULL,
  `product_stock` int(3) NOT NULL,
  `product_isDelete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `product_size`, `product_price`, `product_stock`, `product_isDelete`) VALUES
('C101', 'Love Signature Chocolates Box (15 pieces)', 'small', '45.90', 15, 0),
('C102', 'Almond Chocolate', 'big', '32.00', 7, 0),
('C117', 'Chocolates 4 Bar Holiday Gift Box', 'big', '29.90', 20, 0),
('C120', 'Dark Chocolate', 'small', '54.00', 9, 0),
('C121', 'Chocolate Covered Strawberries', 'big', '29.90', 0, 0),
('CD106', 'Sweet Honey Chocolate', 'big', '40.00', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_name` varchar(100) NOT NULL,
  `purchase_quantity` int(3) NOT NULL,
  `purchase_product_price` decimal(5,2) NOT NULL,
  `purchase_product_code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_name`, `purchase_quantity`, `purchase_product_price`, `purchase_product_code`) VALUES
(8, 'Yap Hui Yen', 10, '45.90', 'C101'),
(9, 'Khoh', 50, '29.90', 'C121');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
