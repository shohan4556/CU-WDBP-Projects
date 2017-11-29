-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 06:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'gfgf', 'Z2ZnZmc='),
(2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `custinfo`
--

CREATE TABLE `custinfo` (
  `cu_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custinfo`
--

INSERT INTO `custinfo` (`cu_id`, `name`, `email`, `password`, `gender`, `country`) VALUES
(123, 'nhrasal', 'nhrasal@gmail.com', '123456', 'm', 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `prodinfo`
--

CREATE TABLE `prodinfo` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `img_type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `prodesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodinfo`
--

INSERT INTO `prodinfo` (`prod_id`, `name`, `img_name`, `img_path`, `img_type`, `price`, `prodesc`) VALUES
(1, 'laptop', 'tech.jpg', 'prodimg/tech.jpg', 'image/jpeg', 125800, 'laptop '),
(1234, 'car', 'car.jpg', 'prodimg/car.jpg', 'image/jpeg', 250000, 'its more beautiful '),
(1259, 'Car ', 'car1.jpg', 'prodimg/car1.jpg', 'image/jpeg', 145200, 'Car'),
(1263, 'shirt', 'shirt.jpg', 'prodimg/shirt.jpg', 'image/jpeg', 250, 'shirt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `custinfo`
--
ALTER TABLE `custinfo`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `prodinfo`
--
ALTER TABLE `prodinfo`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `custinfo`
--
ALTER TABLE `custinfo`
  MODIFY `cu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
