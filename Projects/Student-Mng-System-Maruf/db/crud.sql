-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 01:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitmphp5051`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `title`) VALUES
(2, '50', 'PHP'),
(3, '52', 'Web Design'),
(4, '55', 'HTML'),
(5, '56', 'CSS'),
(6, '57', 'jQuery'),
(7, '58', 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `map_students_courses`
--

CREATE TABLE IF NOT EXISTS `map_students_courses` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_students_courses`
--

INSERT INTO `map_students_courses` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 2),
(9, 15, 3),
(10, 15, 2),
(11, 15, 7),
(12, 15, 6),
(13, 15, 4),
(14, 15, 5),
(15, 0, 7),
(16, 0, 5),
(17, 0, 5),
(18, 0, 5),
(36, 16, 2),
(37, 16, 6),
(38, 13, 7),
(39, 13, 6),
(40, 11, 3),
(41, 11, 4),
(42, 8, 7),
(43, 8, 5),
(44, 6, 4),
(45, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `seip` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `seip`) VALUES
(6, 'maruf', 'ahmed', '1111'),
(7, 'mahdi', 'hasan', '123456'),
(8, 'shubroto', 'World', '1234451'),
(11, 'Saimon', 'Muntasir', '167618'),
(13, 'asif', 'ahmed', '123456'),
(15, 'nasir', 'mia', '66666'),
(16, 'dfddd', 'ddd', '1111');

--
-- Indexes for dumped tables
--











CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1234'),
(2, 'admin2@gmail.com', '6565');














--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_students_courses`
--
ALTER TABLE `map_students_courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `map_students_courses`
--
ALTER TABLE `map_students_courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
