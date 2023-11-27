-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 05:04 AM
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
-- Database: `final`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
