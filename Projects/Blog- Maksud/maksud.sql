-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2017 at 03:07 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maksud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `joined` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_admin_username_uindex` (`admin_username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `password`, `joined`) VALUES
(1, 'maksud', '123456', '2017-11-26 20:39:07'),
(2, 'tipu', '123456', '2017-11-26 21:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `legends`
--

DROP TABLE IF EXISTS `legends`;
CREATE TABLE IF NOT EXISTS `legends` (
  `legend_id` int(11) NOT NULL AUTO_INCREMENT,
  `legend_name` varchar(32) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `died` date DEFAULT NULL,
  `legend_details` longtext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`legend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legends`
--

INSERT INTO `legends` (`legend_id`, `legend_name`, `dateofbirth`, `died`, `legend_details`, `image`) VALUES
(4, 'Borhan Uddin Tipu', '2017-11-07', '2017-11-23', 'rhgfghfhfgh', '1375170_738571119608897_5099975668070521409_n.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
