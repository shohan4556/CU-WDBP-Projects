-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2017 at 06:57 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` varchar(26) DEFAULT NULL,
  `email` varchar(26) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `email`, `address`, `password`) VALUES
(1, 'Monir', 'monir7dhaka@gmail.com', 'mirpur-14,Dhaka', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Aziz', 'aziz7dhaka@gmail.com', 'uttara,Dhaka', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Anju', 'anju7dhaka@gmail.com', 'mirpur-12,Dhaka', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Ruhul', 'ruhul7dhaka@gmail.com', 'farmgate,Dhaka', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(26) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `bloodgroup` varchar(3) DEFAULT NULL,
  `mobilenumber` int(11) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `password` varchar(36) DEFAULT NULL,
  `email` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `address`, `bloodgroup`, `mobilenumber`, `age`, `password`, `email`) VALUES
(1, 'Monir', 'Dhaka', 'A+', 1515, 12, '1234', 'monir7dhaka@gmail.com'),
(2, 'Aziz', 'uttara', 'A+', 15152125, 22, '81dc9bdb52d04dc20036dbd8313ed055', 'aziz7dhaka@gmail.com'),
(3, 'h', '', 'A+', 15152125, 20, 'e10adc3949ba59abbe56e057f20f883e', 'monir7dhaka@gmail.com'),
(4, 'Ruhul', '', 'A+', 1515212850, 20, '81dc9bdb52d04dc20036dbd8313ed055', 'ruhul7dhaka@gmail.com'),
(5, 'Anju', '', 'A+', 15525652, 22, '81dc9bdb52d04dc20036dbd8313ed055', 'anju@gmail.com'),
(6, 'shah', '', 'O-', 15152125, 20, '81dc9bdb52d04dc20036dbd8313ed055', 'shah@gmail.com'),
(7, 'zakir', '', 'B-', 1515215, 20, '81dc9bdb52d04dc20036dbd8313ed055', 'zakir7dhaka@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
