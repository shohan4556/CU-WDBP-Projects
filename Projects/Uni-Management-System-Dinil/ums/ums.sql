-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 05:55 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocate_rooms`
--

CREATE TABLE `allocate_rooms` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `value` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocate_rooms`
--

INSERT INTO `allocate_rooms` (`id`, `dept_id`, `course_id`, `room_id`, `day_id`, `start`, `end`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(62, 24, 18, 1, 2, '06:00:00', '07:00:00', 2, '2017-05-06 22:03:15', '2017-05-06 22:03:15', '2017-05-06 22:03:15'),
(65, 14, 11, 1, 2, '09:00:00', '10:00:00', 2, '2017-05-06 22:32:41', '2017-05-06 22:32:41', '2017-05-06 22:32:41'),
(66, 5, 16, 1, 1, '09:00:00', '09:30:00', 2, '2017-05-06 22:33:03', '2017-05-06 22:33:03', '2017-05-06 22:33:03'),
(67, 14, 11, 4, 5, '09:30:00', '12:00:00', 2, '2017-05-07 12:04:05', '2017-05-07 12:04:05', '2017-05-07 12:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `totlal_credit` int(11) NOT NULL,
  `remaining_credit` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_credit` int(11) NOT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `dept_name`, `teacher_name`, `totlal_credit`, `remaining_credit`, `course_code`, `course_name`, `course_credit`, `stat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, '24', 'Abdullah AL Amin', 100, 94, 'SOCY-2220', 'Globalisation & Development in Post-Colonial ', 3, 2, '2017-05-06 21:53:02', '2017-05-06 21:53:02', '2017-05-06 21:53:02'),
(36, '4', 'Tasnif Abdullah', 40, 36, 'BBA-101', 'Fundamentals of Accounting', 4, 2, '2017-05-07 22:06:17', '2017-05-07 22:06:17', '2017-05-07 22:06:17'),
(37, '23', 'Neamat Ullah', 26, 23, 'Banagla-1', 'Bangla Bekoron ', 3, 2, '2017-05-07 22:09:28', '2017-05-07 22:09:28', '2017-05-07 22:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_credit` int(11) NOT NULL,
  `body` text NOT NULL,
  `dept_id` int(11) NOT NULL,
  `semi_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `course_credit`, `body`, `dept_id`, `semi_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'CSE-101', 'Fundamental Of Computer', 3, 'This is Description.', 1, 1, 1, '2017-04-26 21:27:28', '2017-04-26 21:27:28', '2017-04-26 21:27:28'),
(14, 'IS-101', 'Al-Quran', 5, 'N/A', 2, 4, 1, '2017-04-29 02:17:23', '2017-04-29 02:17:23', '2017-04-29 02:17:23'),
(15, 'Banagla-1', 'Bangla Bekoron ', 3, 'N/a', 23, 3, 1, '2017-04-29 23:26:10', '2017-04-29 23:26:10', '2017-04-29 23:26:10'),
(21, 'CSE 212', 'Algorithm', 3, 'About Search Algorithm', 1, 3, 1, '2017-11-28 22:48:32', '2017-11-28 22:48:32', '2017-11-28 22:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `title`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `title`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSE', 'Computer Science And Engineering', 1, '2017-04-26 02:03:03', '2017-04-26 02:03:03', '2017-04-26 02:03:03'),
(2, 'IS', 'Islamic Studies', 0, '2017-04-26 02:10:57', '2017-04-26 02:10:57', '2017-04-26 02:10:57'),
(3, 'EEE', 'Electrical And Electronics Engineering', 1, '2017-04-26 03:44:23', '2017-04-26 03:44:23', '2017-04-26 03:44:23'),
(14, 'EETE', 'Electrical Electronic Telecommunication Engineering', 1, '2017-04-26 14:41:59', '2017-04-26 14:41:59', '2017-04-26 14:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `did` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`did`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lecturer', '2017-04-27 12:04:56', '2017-04-27 12:04:56', '2017-04-27 12:04:56'),
(2, 'Assistant Professor', '2017-04-27 12:04:56', '2017-04-27 12:04:56', '2017-04-27 12:04:56'),
(3, 'Professor', '2017-04-27 12:04:56', '2017-04-27 12:04:56', '2017-04-27 12:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `entrol_course`
--

CREATE TABLE `entrol_course` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrol_course`
--

INSERT INTO `entrol_course` (`id`, `reg_no`, `course_id`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6', 16, '2017-05-02', '2017-05-02 22:52:44', '2017-05-02 22:52:44', '2017-05-02 22:52:44'),
(5, '5', 11, '2017-05-02', '2017-05-02 22:52:44', '2017-05-02 22:52:44', '2017-05-02 22:52:44'),
(11, '10', 21, '2017-11-15', '2017-11-28 22:54:23', '2017-11-28 22:54:23', '2017-11-28 22:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`) VALUES
(1, 'A+'),
(3, 'A-'),
(4, 'B+'),
(5, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `reg_id`, `course_id`, `grade`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 3, '1', '2017-05-03 01:26:32', '2017-05-03 01:26:32', '2017-05-03 01:26:32'),
(4, 1, 9, '5', '2017-05-03 01:18:48', '2017-05-03 01:18:48', '2017-05-03 01:18:48'),
(6, 5, 11, '2', '2017-05-03 13:55:25', '2017-05-03 13:55:25', '2017-05-03 13:55:25'),
(7, 4, 15, '1', '2017-05-03 14:26:45', '2017-05-03 14:26:45', '2017-05-03 14:26:45'),
(11, 10, 21, '1', '2017-11-28 22:54:49', '2017-11-28 22:54:49', '2017-11-28 22:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '101', '2017-05-05 12:46:38', '2017-05-05 12:46:38', '2017-05-05 12:46:38'),
(2, '201', '2017-05-05 12:46:38', '2017-05-05 12:46:38', '2017-05-05 12:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' 1st Semester', '2017-04-26 16:09:48', '2017-04-26 16:09:48', '2017-04-26 16:09:48'),
(2, '2nd Semester', '2017-04-26 16:09:48', '2017-04-26 16:09:48', '2017-04-26 16:09:48'),
(3, '3rd Semester', '2017-04-26 16:10:15', '2017-04-26 16:10:15', '2017-04-26 16:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `title`, `email`, `contact`, `date`, `address`, `dept_id`, `reg_no`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohiuddin Sadek', 'mohiuddin@gamil.com', '01911543307', '2017-05-01', 'Narayanganj', 1, 'CSE-2017-001', 1, '2017-05-01 20:04:31', '2017-05-01 20:04:31', '2017-05-01 20:04:31'),
(2, 'tasnif Abdullah', 'tasnif@gmail.com', '01571774573', '2017-05-01', 'Narayanganj', 2, 'IS-2017-001', 1, '2017-05-02 00:03:11', '2017-05-02 00:03:11', '2017-05-02 00:03:11'),
(3, 'Mh Suhag', 'suhag@gmail.com', '01818446677', '2017-05-01', 'Puran Dhaka', 1, 'CSE-2017-002', 1, '2017-05-02 00:04:15', '2017-05-02 00:04:15', '2017-05-02 00:04:15'),
(10, 'Dinil Islam', 'dinil.islam000@gmail.com', '01670236067', '2017-07-25', 'Hagaribagh', 1, 'CSE-2017-003', 1, '2017-11-28 22:51:16', '2017-11-28 22:51:16', '2017-11-28 22:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `desig_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `total_credit` int(11) NOT NULL,
  `remaining_credit` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `address`, `email`, `contact`, `desig_id`, `dept_id`, `total_credit`, `remaining_credit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sadek', 'Narayanganj', 'sadek@gmail.com', '01911543307', 1, 2, 26, 22, 0, '2017-04-27 13:08:47', '2017-04-27 13:08:47', '2017-04-27 13:08:47'),
(2, 'Mohiuddin Sadek', 'Narayanganj', 'mohiuddin@gmail.com', '01911543307', 1, 14, 47, -8, 0, '2017-04-27 13:09:39', '2017-04-27 13:09:39', '2017-04-27 13:09:39'),
(26, 'Ataullah Bhuiyan', 'Dhanmondi', 'ataullah007@gmail.com', '01788952335', 2, 1, 3, 3, 1, '2017-11-28 22:50:22', '2017-11-28 22:50:22', '2017-11-28 22:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `is_admin`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', '2017-05-07 19:36:46', '2017-05-07 19:36:46', '2017-05-07 19:36:46'),
(2, 'student', 'student@gmail.com', 0, 'student', '2017-05-07 21:13:27', '2017-05-07 21:13:27', '2017-05-07 21:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocate_rooms`
--
ALTER TABLE `allocate_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `entrol_course`
--
ALTER TABLE `entrol_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocate_rooms`
--
ALTER TABLE `allocate_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrol_course`
--
ALTER TABLE `entrol_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
