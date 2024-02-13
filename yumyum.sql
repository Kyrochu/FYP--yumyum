-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 08:49 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_on`
--

INSERT INTO `add_on` (`add_id`, `add_name`, `add_price`, `food_id`) VALUES
(91, 'Extra mayonnaise', 1.8, 30),
(92, 'Extra sauce', 1.2, 30),
(93, 'Extra mayonnaise', 1.8, 31),
(94, 'Extra sauce', 1.2, 31),
(95, 'Extra mayonnaise', 1.8, 32),
(96, 'Extra sauce', 1.2, 32),
(97, 'Extra sauce', 2, 27),
(99, 'Extra noodles', 5, 27),
(100, 'Extra sauce', 2, 28),
(101, 'Extra noodles', 5, 28),
(102, 'Extra mushroom', 1.5, 28),
(103, 'Extra noodles', 5, 29),
(104, 'Extra shrimp', 8, 29),
(105, 'Extra cheese', 3, 24),
(106, 'Extra pepper', 0.8, 24),
(107, 'Extra salmon', 12, 24),
(108, 'Extra pepper', 0.8, 25),
(110, 'Extra mushroom', 1.5, 25),
(111, 'Extra cheese', 3, 25),
(112, 'Extra cheese', 3, 26),
(113, 'Extra prawn & squid', 10, 26),
(114, 'Extra pepper', 0.8, 26),
(115, 'Barbeque sauce', 2, 21),
(116, 'Mayonnaise', 3, 21),
(117, 'Extra cheese', 2.2, 22),
(118, 'Extra mayonnaise', 1.8, 22),
(119, 'Barbeque sauce', 2, 23),
(120, 'Mayonnaise', 3, 23);

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
(2, 'SuperAdmin', 'Super@gmail.com', 'test1234', 'SuperAdmin'),
(21, 'TestSuper', 'TestSuper@gmail.com', 'TestSuper8888', 'SuperAdmin'),
(32, 'lee', 'lee12@gmail.com', '1234', 'Admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `food_id`, `num_food`, `food_total_price`, `cart_food_delete`, `user_id`, `add_on_id`, `add_on_name`, `add_on_price`) VALUES
(139, 30, 1, 28, 0, 20, 92, 'Extra sauce', 1.2),
(140, 30, 1, 28.6, 0, 20, 91, 'Extra mayonnaise', 1.8),
(142, 24, 1, 45.8, 0, 20, 107, 'Extra salmon', 12),
(144, 31, 1, 26.8, 0, 20, 0, '', 0),
(145, 32, 1, 38.8, 0, 20, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_type` varchar(60) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_type`, `cat_img`) VALUES
(17, 'Burger', 'Burger', '1707843717.png'),
(18, 'Pasta', 'Pasta', '1707843729.png'),
(19, 'Pizza', 'Pizza', '1707843746.png'),
(20, 'Snack', 'Snack', '1707843765.png');

-- --------------------------------------------------------

--
-- Table structure for table `e_wallet`
--

CREATE TABLE `e_wallet` (
  `w_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `w_debit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_wallet`
--

INSERT INTO `e_wallet` (`w_id`, `user_id`, `w_debit`) VALUES
(1, 2, 183),
(2, 1, 69),
(4, 0, 0),
(5, 4, 129),
(6, 20, 117.2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_img`, `food_name`, `food_price`, `food_type`, `food_description`, `food_delete`) VALUES
(21, 'Chicken Nugget.png', 'Chicken Nugget', 15.8, 'Snack', 'Crispy and juicy nuggets', 0),
(22, 'Cheesy Crisper.png', 'Cheesy Crispers', 16.8, 'Snack', 'Irresistible bites of crispy goodness, featuring a perfect blend of melted cheese and golden crunch. ', 0),
(23, 'Onion Rings.png', 'Onion Rings', 13.8, 'Snack', 'Thinly sliced onions coated in a flavorful batter, fried to perfection.', 0),
(24, 'Smoked Salmon Pizza.png', 'Smoked Salmon Pizza', 33.8, 'Pizza', 'Smoked Salmon Sliced, Napolitana Sauce Based, Kewpie Mayo & Mozzarella Cheese', 0),
(25, 'Truffle Mushroom Pizza.png', 'Truffle Mushroom Pizza', 30.8, 'Pizza', 'Shiitake Mushroom, Shimmeji Mushroom, Kewpie Mayo & Mozzarella Cheese', 0),
(26, 'Calamari Pizza.png', 'Calamari Pizza', 32.8, 'Pizza', 'Prawn, Pineapple Cubed, Cherry Tomatoes, Squid Sliced, Napolitana Sauce Based, Kewpie Mayo & Mozzarella Cheese', 0),
(27, 'Chicken Bolognese Spaghetti.png', 'Chicken Bolognese Spaghetti', 19.8, 'Pasta', 'Spaghetti cooked with chicken minced, homemade bolognese sauce and topping with cherry tomato and parmesan cheese powder.', 0),
(28, 'Mushroom Aglio-olio.png', 'Mushroom Aglio-olio', 18.8, 'Pasta', 'Shiitake Mushroom, Garlic, Onion, Pepper, Basil Leaf & Chilli Flakes', 0),
(29, 'Pesto Pasta With Shrimp.png', 'Pesto Pasta With Shrimp', 29.8, 'Pasta', 'Spaghetti cooked with shrimps, mushroom and homemade pesto sauce. Topping with walnut chunks and parmesan cheese powder. ', 0),
(30, 'Grilled Chicken Burger.png', 'Grilled Chicken Burger', 26.8, 'Burger', 'Grilled Chicken Chop, Green Lettuce, Tomato, Sliced Onion with Homemade Brown Sauce', 0),
(31, 'Classic Crispy Chicken.png', 'Classic Crispy Chicken Burger', 26.8, 'Burger', 'Fried Chicken, Grerkin, Tomato, Lettuce, Cheese, Potato Bites', 0),
(32, 'Wagyu Burger.png', 'Wagyu Burger', 38.8, 'Burger', 'Wagyu Beef, Cheese, Tomato, Grerkin, Onion Ring & Thousand Island Sauce', 0);

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
  `or_time` datetime NOT NULL,
  `pay_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`or_id`, `user_id`, `food_id`, `num_food`, `add_on_id`, `or_delete`, `or_time`, `pay_by`) VALUES
(135, 20, 30, 1, 92, 0, '2024-02-14 03:34:59', 'E-Wallet'),
(136, 20, 30, 1, 91, 0, '2024-02-14 03:34:59', 'E-Wallet'),
(137, 20, 24, 1, 107, 0, '2024-02-14 03:34:59', 'E-Wallet'),
(138, 20, 31, 1, 0, 0, '2024-02-14 03:37:10', 'E-Wallet'),
(139, 20, 32, 1, 0, 0, '2024-02-14 03:46:17', 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `his_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `postcode` int(11) NOT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `add_on_name` varchar(255) DEFAULT NULL,
  `add_on_price` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `pay_by` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`his_id`, `order_date`, `user_id`, `username`, `contact_number`, `address`, `city`, `state`, `postcode`, `food_name`, `add_on_name`, `add_on_price`, `quantity`, `price`, `total_price`, `pay_by`) VALUES
(123, '2024-02-14 03:34:59', 20, 'Brian', '012-9696888', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, 'Grilled Chicken Burger', 'Extra sauce', 1.2, 1, 26.8, 28, 'E-Wallet'),
(124, '2024-02-14 03:34:59', 20, 'Brian', '012-9696888', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, 'Grilled Chicken Burger', 'Extra mayonnaise', 1.8, 1, 26.8, 28.6, 'E-Wallet'),
(125, '2024-02-14 03:34:59', 20, 'Brian', '012-9696888', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, 'Smoked Salmon Pizza', 'Extra salmon', 12, 1, 33.8, 45.8, 'E-Wallet'),
(126, '2024-02-14 03:37:10', 20, 'Brian', '012-9696888', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, 'Classic Crispy Chicken Burger', '', 0, 1, 26.8, 26.8, 'E-Wallet'),
(127, '2024-02-14 03:46:17', 20, 'Brian', '012-9696888', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, 'Wagyu Burger', '', 0, 1, 38.8, 38.8, 'Card');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`r_id`, `u_id`, `card_number`, `total_price`, `re_time`) VALUES
(79, 20, '4564 6464 5646 4564', 38.8, '2024-02-14 03:46:17');

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
  `pin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_number`, `email`, `password`, `address`, `city`, `state`, `postcode`, `updated_time`, `pin`) VALUES
(20, 'Brian', '012-9696888', 'Brian12@gmail.com', 'Brian99$', '69-A , Jalan Pisang Wangi', 'Melaka', 'Malacca', 75250, '2024-02-13 19:31:31', '031020');

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
-- Indexes for table `e_wallet`
--
ALTER TABLE `e_wallet`
  ADD PRIMARY KEY (`w_id`);

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
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`r_id`);

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
  MODIFY `add_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `e_wallet`
--
ALTER TABLE `e_wallet`
  MODIFY `w_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
