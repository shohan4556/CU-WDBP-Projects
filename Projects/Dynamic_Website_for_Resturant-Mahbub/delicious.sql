-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 08:20 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delicious`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `description` text NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `img_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `category`, `price`, `description`, `img_name`, `img_path`, `img_type`) VALUES
(1, 'Special Pudding', 'Desert', 100, 'As desire', '1.jpg', 'photo/1.jpg', 'image/jpeg'),
(2, 'Brawnie', 'Desert', 100, 'As desire', '2.jpg', 'photo/2.jpg', 'image/jpeg'),
(3, 'Vanilla Icecream', 'Desert', 100, 'As desire', '3.jpg', 'photo/3.jpg', 'image/jpeg'),
(4, 'Special Mix Icecream', 'Desert', 200, 'Enough for one person', '4.jpg', 'photo/4.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) NOT NULL,
  `item1` varchar(50) NOT NULL,
  `quantity1` varchar(50) NOT NULL,
  `item2` varchar(50) NOT NULL,
  `quantity2` varchar(50) NOT NULL,
  `item3` varchar(50) NOT NULL,
  `quantity3` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip` int(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `c_num` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `item1`, `quantity1`, `item2`, `quantity2`, `item3`, `quantity3`, `fname`, `lname`, `email`, `street`, `area`, `city`, `zip`, `country`, `c_num`) VALUES
(2, 'Pudding', '1', '', '', '', '', 'Mahbub', 'Hossain', 'mahbubhossain001@gmail.com', 'GA-87', 'Middle Badda', 'Dhaka', 1212, 'Bangladesh', '+8801521109326');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
