-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 01:02 PM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(100) NOT NULL,
  `name_com` varchar(40) NOT NULL,
  `email_com` varchar(30) NOT NULL,
  `text_com` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `name_com`, `email_com`, `text_com`) VALUES
(6, 'Handsome', 'TEST@MotherMail.com', 'I like Fantastos . It has a good service!'),
(13, 'Madeline', 'Madeline1234@hotmail.com', 'I love your hotel website.It looks intresting and ease at use.'),
(15, '1211205395@student.mmu.edu.y', 'leebrian3433@gmail.com', 'sfsdfs'),
(18, 'BRIAN LEE', 'leebrian3433@gmail.com', 'I love to use this website');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `card_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_holder_name` varchar(100) NOT NULL,
  `expiry_month` int(11) NOT NULL,
  `expiry_year` int(11) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`card_id`, `card_number`, `card_holder_name`, `expiry_month`, `expiry_year`, `cvv`) VALUES
(1, '4444222233330000', 'James lew', 4, 2030, '168'),
(4, '5555666677778888', 'BRIAN LEE', 2, 2032, '112'),
(7, '5555333355557777', 'Wei Wang', 9, 2032, '187'),
(9, '4444222266668888', 'Jayson yong', 1, 2030, '122');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `cus_phone` int(50) NOT NULL,
  `cus_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `user_email`, `cus_phone`, `cus_delete`) VALUES
(1, 'chu wei wang', 'kyro32@gmail.com\r\n', 0, 0),
(2, 'john', 'john@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(150) NOT NULL,
  `room_price` decimal(10,2) NOT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `room_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_price`, `room_image`, `room_description`) VALUES
(1, 'LUXURY ROOM', '500.00', 'luxury room.jpg', 'Deluxe accommodations offer large bedroom spaces for activities and relaxation. The highlight is the luxurious bed with premium bedding for a comfortable sleep. The fully furnished bathroom includes showers, bathtubs, and plush towels. Deluxe rooms also come with premium amenities such as flat-screen TVs, minibars, coffee and tea makers, air conditioning, and safes. High-speed Internet connection is usually provided for guests to stay connected.'),
(2, 'DOUBLE ROOM', '400.00', 'double.jpg', 'The double room is a spacious and comfortable accommodation option suitable for couples, groups of friends, or business travelers. It features a cozy double bed or twin beds, ensuring a pleasant sleeping environment. The room is equipped with standard amenities like a private bathroom, air conditioning or heating, TV, mini fridge, iron, and ironing board. Complimentary wireless Internet access and room service may also be available. The design and decoration of the double room are often inviting and straightforward, with various themes such as modern, conventional, or regional cultural influences, depending on the hotel.'),
(3, 'SINGLE ROOM', '200.00', 'single.jpg', 'Lavish bathrooms with upscale features such as heated floors and soaking tubs. High-end, lush linens and towels. Deluxe pillows and mattresses so your sleeping hours are as blissful as your waking ones. Beautiful views in every direction – inside and out'),
(5, 'SUITE ROOM', '600.00', 'suite.png', 'Our suites provide opulent and spacious accommodations with separate living rooms and bedrooms, ensuring unparalleled comfort. Guests can enjoy amenities such as private bathrooms with showers and bathtubs, queen or king beds, cozy sofas, and lounge chairs for socializing. The suites also offer coffee makers, minibars, flat-screen TVs, music equipment, and complimentary Wi-Fi. Some suites may include additional luxuries like free-standing jacuzzis and saunas. Overall, our suites offer the epitome of luxury and relaxation for a truly indulgent experience.'),
(6, 'FAMILY ROOM', '700.00', 'family room.jpg', 'Our family room is intended to give families with a big and pleasant lodging alternative. With various bedrooms, family-friendly amenities, and entertainment options, it guarantees that everyone enjoys a relaxing and pleasurable stay. Privacy and connectivity are also prioritised, and a handy location adds to the total convenience. Additional services, such as complementary breakfast and access to children\'s facilities, are frequently offered, making it an excellent choice for families looking for a memorable hotel experience.'),
(7, 'EXECUTIVE ROOM', '900.00', 'Executive Suite.jpg', 'Our Executive Suite is the epitome of luxury and spaciousness, offering top-notch amenities and premium services. It features a separate living area and bedroom, a king-size bed, elegant furniture, a lavish bathroom, and a private balcony or patio. As an executive suite guest, you\'ll enjoy exclusive perks such as access to a private lounge, complimentary breakfast, and expedited check-in and check-out. Whether you\'re traveling for business or leisure, our executive suites provide the ultimate comfort, luxury, and convenience.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
