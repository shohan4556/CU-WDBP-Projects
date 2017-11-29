-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 03:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `image`, `email`, `username`, `password`) VALUES
(1, 'Anwarul Islam', 'assets/images/user.jpg', 'a@a.com', 'anwar', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `allocate_classroom`
--

CREATE TABLE `allocate_classroom` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `allocate_classroom`
--

INSERT INTO `allocate_classroom` (`id`, `department_id`, `course_id`, `room_id`, `day_id`, `time_from`, `time_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 3, 2, 1, 1, '14:00:00', '17:00:00', '2017-05-10 09:05:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 2, 1, 1, '14:01:00', '15:00:00', '2017-05-10 09:05:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 2, 1, 1, '13:00:00', '18:01:00', '2017-05-10 09:05:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 7, 1, 13, 2, '14:00:00', '16:00:00', '2017-05-11 04:05:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher`
--

CREATE TABLE `assign_teacher` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_credit` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `assign_teacher`
--

INSERT INTO `assign_teacher` (`id`, `department_id`, `teacher_id`, `course_id`, `course_code`, `course_credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 5, 'BBA-302', 2, '2017-05-08 08:05:10', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(2, 1, 3, 4, '54', 3, '2017-05-08 08:05:18', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(3, 3, 2, 2, 'CSE-101', 3, '2017-05-08 08:05:34', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(4, 3, 2, 3, 'CSE-103', 3, '2017-05-08 08:05:42', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(5, 3, 1, 2, 'CSE-101', 3, '2017-05-08 08:05:49', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(6, 3, 1, 3, 'CSE-103', 3, '2017-05-08 08:05:57', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(7, 3, 2, 3, 'CSE-103', 3, '2017-05-09 03:05:55', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(8, 1, 3, 4, '54', 3, '2017-05-10 03:05:52', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(9, 3, 1, 3, 'CSE-103', 3, '2017-05-10 03:05:45', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(10, 1, 3, 4, '54', 3, '2017-05-10 10:05:15', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(11, 1, 3, 4, '54', 3, '2017-05-10 10:05:53', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(12, 1, 3, 4, '54', 3, '2017-05-10 10:05:18', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(13, 3, 2, 2, 'CSE-101', 3, '2017-05-11 12:05:21', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(14, 7, 7, 1, 'CSE-101', 3, '2017-05-11 03:05:28', '0000-00-00 00:00:00', '2017-08-02 07:08:44'),
(15, 7, 9, 3, 'sdfsdgds', 3, '2017-07-24 02:07:58', '0000-00-00 00:00:00', '2017-08-02 07:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cor_code` varchar(10) NOT NULL,
  `cor_name` varchar(50) NOT NULL,
  `cor_credit` float NOT NULL,
  `cor_desc` varchar(200) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `cor_department` int(11) NOT NULL,
  `cor_semester` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cor_code`, `cor_name`, `cor_credit`, `cor_desc`, `assigned_to`, `cor_department`, `cor_semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSE-101', 'Structured Programming', 3, 'description ta jene nibo pore', 0, 7, 1, '2017-05-11 03:05:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'BN=121', 'History and Analysis', 4, 'thisis description for this course ', 0, 10, 3, '2017-07-18 09:07:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sdfsdgds', 'gsdfgdsfgdf', 3, 'fgdsgdf', 0, 7, 5, '2017-07-24 02:07:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_name`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday'),
(8, 'Sat-Sun-Mon'),
(9, 'Tue-Wed-Thu');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(7) NOT NULL,
  `dep_code` varchar(15) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_code`, `dep_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'CSE-66', 'CSE', '2017-05-11 03:05:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'BBA-55', 'BBA', '2017-05-11 03:05:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '54545', 'History', '2017-05-15 06:05:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'fdgsdf', 'gdfgsdfg', '2017-07-18 02:07:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'adfasdf', 'asdfsadf', '2017-07-18 02:07:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'dfgds', 'fgdfgdsfg', '2017-07-18 02:07:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'dsafasd', 'asdfasd', '2017-07-18 02:07:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'ami tom', 'sadflksdaf', '2017-07-18 02:07:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'am kdfkasdkfk', 'kjkasdjkfa', '2017-07-18 02:07:27', '2017-07-18 02:07:45', '0000-00-00 00:00:00'),
(20, 'mai', 'aksdjf', '2017-07-24 02:07:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2017-07-31 05:07:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`) VALUES
(1, 'Professor'),
(2, 'Associate Professor'),
(3, 'Assistant Professor'),
(4, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_student`
--

CREATE TABLE `enroll_student` (
  `id` int(11) NOT NULL,
  `stu_reg_no` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `enroll_student`
--

INSERT INTO `enroll_student` (`id`, `stu_reg_no`, `course_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSE-2017-001', 1, '2017-05-11 04:05:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`) VALUES
(1, 'A+'),
(2, 'A'),
(3, 'A-'),
(4, 'B+'),
(5, 'B'),
(6, 'B-'),
(7, 'C+'),
(8, 'C'),
(9, 'C-'),
(10, 'D+'),
(11, 'D'),
(12, 'D-'),
(13, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `stu_reg_no` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `stu_reg_no`, `course_id`, `grade_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSE-2017-001', 2, 1, '2017-05-07 11:05:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'CSE-2017-001', 3, 2, '2017-05-07 11:05:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'CSE-2017-001', 1, 4, '2017-05-11 04:05:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`) VALUES
(1, '101'),
(2, '102'),
(3, '103'),
(4, '104'),
(5, '105'),
(6, '106'),
(7, '201'),
(8, '202'),
(9, '203'),
(10, '204'),
(11, '205'),
(12, '206'),
(13, '301'),
(14, '302'),
(15, '303'),
(16, '304'),
(17, '305'),
(18, '306'),
(19, '401'),
(20, '402'),
(21, '403'),
(22, '405'),
(23, '406');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester_no` varchar(1) NOT NULL,
  `semester_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_no`, `semester_name`) VALUES
(1, '1', 'First Semester'),
(2, '2', 'Second Semeser'),
(3, '3', 'Third Semester'),
(4, '4', 'Fourth Semster'),
(5, '5', 'Fifth Semester'),
(6, '6', 'Sixth Semester'),
(7, '7', 'Seventh Semester'),
(8, '8', 'Eighth Semester');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stu_reg_no` varchar(25) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_mobile` varchar(15) NOT NULL,
  `stu_password` char(32) NOT NULL,
  `stu_username` varchar(55) NOT NULL,
  `stu_email` varchar(60) NOT NULL,
  `stu_reg_date` varchar(25) NOT NULL,
  `stu_address` varchar(200) NOT NULL,
  `stu_department` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stu_reg_no`, `stu_name`, `stu_mobile`, `stu_password`, `stu_username`, `stu_email`, `stu_reg_date`, `stu_address`, `stu_department`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CSE-2017-001', 'HM Shajib', '01879240015', 'janina', 'janina', 'anwar', '2017-05-11', 'dhaka alia dhaka', '7', '2017-05-11 04:05:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'CSE-2017-002', 'sajib vai stu', '44590', 'f83b5b22', '', 'sajib@kajib.com', '1998-08-24', '3014/Ibarahim Hall, Bakshibazar, Chakbazar, 1211-Dhaka, Dhaka, Bangladesh.', '7', '2017-07-31 07:07:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'CSE-2017-003', 'sajib vai stu', '44590', '9df2cdcf', '', 'sajib@kajib.com', '1998-08-24', '3014/Ibarahim Hall, Bakshibazar, Chakbazar, 1211-Dhaka, Dhaka, Bangladesh.', '7', '2017-07-31 07:07:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'CSE-2017-004', 'sajib vai stu', '44590', '9df2cdcf', '', 'sajib@kajib.com', '1998-08-24', '3014/Ibarahim Hall, Bakshibazar, Chakbazar, 1211-Dhaka, Dhaka, Bangladesh.', '7', '2017-07-31 07:07:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `tea_name` varchar(30) NOT NULL,
  `tea_address` varchar(70) NOT NULL,
  `tea_email` varchar(60) NOT NULL,
  `tea_username` varchar(55) NOT NULL,
  `tea_mobile` varchar(15) NOT NULL,
  `tea_credit_taken` float NOT NULL,
  `tea_designation` int(11) NOT NULL,
  `tea_department` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `tea_name`, `tea_address`, `tea_email`, `tea_username`, `tea_mobile`, `tea_credit_taken`, `tea_designation`, `tea_department`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Salimullah Muslim', 'dhaka alia dhaka', 's@alimullah.com', 'janina', '01879240015', 35, 2, 3, '2017-05-05 04:05:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ahmad ullah', 'dhaka alia dhaka', 'a@h.com', '', '01879240015', 25, 3, 3, '2017-05-05 07:05:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'alamgir hossain', 'amlkasfkj', 'a@lamgiir.com', '', '5645', 2, 2, 1, '2017-05-07 10:05:36', '2017-05-11 02:05:32', '0000-00-00 00:00:00'),
(4, 'ami notun teacher', 'address tao notun', 'e@mail.con', '', '546546', 24, 3, 4, '2017-05-08 08:05:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'nadex askdf', 'dhaka alia dhaka', 's@alimullah.comasd', '', '01879240015', 25, 3, 5, '2017-05-10 08:05:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'dfssfdgfds', 'gsdfgsdf', 'gsdf@h.com', '', '41624', 25, 3, 2, '2017-05-10 08:05:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Salimullah Muslim', 'dhaka alia dhaka', 's@alimullah.com', '', '01879240015', 20, 2, 7, '2017-05-11 03:05:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Salisffa', 'dhaka alia dhaka', 's@alimullah.com', '', '45646', 45, 2, 8, '2017-05-11 04:05:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'asdfasdf', 'asdfasdf', 's@alimullah.com', '', '01879240015', 52, 2, 7, '2017-05-11 04:05:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ami anwarul Islam ', 'amar kono address nai tobe ekta somoy ami dhakate ekta flat kinbo ekho', 'anawarul@gmail.com', '', '01515151515', 22, 1, 10, '2017-07-18 02:07:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocate_classroom`
--
ALTER TABLE `allocate_classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_student`
--
ALTER TABLE `enroll_student`
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
-- Indexes for table `semester`
--
ALTER TABLE `semester`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `allocate_classroom`
--
ALTER TABLE `allocate_classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `enroll_student`
--
ALTER TABLE `enroll_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
