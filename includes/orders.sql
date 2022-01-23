-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: Jun 01, 2020 at 12:51 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s********_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `user_firstName` varchar(25) NOT NULL,
  `user_lastName` varchar(25) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_phone` decimal(10,0) NOT NULL,
  `user_Address` varchar(40) NOT NULL,
  `user_suburb` varchar(20) NOT NULL,
  `user_state` enum('Victoria','New South Wales','Queensland','Northern Territory','Western Australia','South Australia','Tasmania','Australian Capital Territory') NOT NULL,
  `user_postcode` int(4) NOT NULL,
  `user_prefContact` enum('Email','Post','Phone') NOT NULL,
  `user_deliveryMethod` enum('Online','Hard Copy') NOT NULL,
  `user_cart` varchar(500) NOT NULL,
  `additional_comments` varchar(180) NOT NULL,
  `card_type` enum('Visa','Master Card','Amex') NOT NULL,
  `card_holder` varchar(50) NOT NULL,
  `card_number` int(20) NOT NULL,
  `card_cvv` int(3) NOT NULL,
  `card_exp` varchar(4) NOT NULL,
  `order_cost` float NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` enum('PENDING','FULFILLED','PAID','ARCHIVED') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




