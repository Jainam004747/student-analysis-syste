-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 08:08 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(56) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `uname`, `password`, `last_update`) VALUES
(1, 'jainam047', 'e8f3220ab678a16218cd4d44acc55ebc', '2020-04-20 18:18:39.354611'),
(2, 'devid047', 'adf15ac58d28ae32a0a30c19e332a1bf', '2020-04-20 17:46:13.024222'),
(4, 'test', '202cb962ac59075b964b07152d234b70', '2020-04-20 18:38:23.179239');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `lab_lecture` varchar(10) NOT NULL,
  `lab_lecture_sequence` int(10) NOT NULL,
  `students_attendance` varchar(2000) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `teacher_id`, `branch_id`, `sem_id`, `sub_id`, `date`, `lab_lecture`, `lab_lecture_sequence`, `students_attendance`, `last_update`) VALUES
(1, 0, 1, 1, 1, '2020-03-03', 'lecture', 1, '176240316056,176240316089,176240316013\r\n', '2020-03-04 04:37:10'),
(2, 0, 1, 1, 6, '2020-03-03', 'lecture', 2, '176240316056,176240316089,176240316013', '2020-03-03 09:22:09'),
(4, 0, 1, 1, 8, '2020-03-03', 'lecture', 4, '176240316013', '2020-03-04 06:10:13'),
(5, 0, 1, 1, 9, '2020-03-03', 'lecture', 3, '176240316056,176240316013', '2020-03-05 04:48:34'),
(6, 0, 1, 1, 9, '2020-03-04', 'lecture', 2, '176240316089', '2020-03-13 04:24:32'),
(7, 0, 1, 1, 1, '2020-03-04', 'lecture', 3, '176240316056,176240316013', '2020-03-13 04:25:44'),
(8, 0, 1, 1, 6, '2020-03-03', 'lab', 5, '176240316089,176240316013', '2020-03-13 04:56:33'),
(9, 0, 1, 1, 6, '2020-03-13', 'lecture', 2, '176240316056,176240316089', '2020-03-13 10:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(50) NOT NULL,
  `b_name` varchar(150) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `b_name`, `status`, `last_update`) VALUES
(1, 'IT', 'Y', '2020-01-31 18:30:00.000000'),
(2, 'CIVIL', 'Y', '2020-02-01 06:54:40.043771'),
(4, 'CDDM', 'Y', '2020-02-01 09:09:12.081100'),
(5, 'CE', 'Y', '2020-02-15 03:39:31.189705'),
(9, 'COMPUTER', 'Y', '2020-02-03 04:41:10.094227'),
(10, 'Mechanical', 'Y', '2020-02-03 04:57:30.315321');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `id` int(50) NOT NULL,
  `sem_name` varchar(150) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`id`, `sem_name`, `status`, `last_update`) VALUES
(1, '6', 'Y', '2020-01-31 18:30:00.000000'),
(2, '1', 'N', '2020-02-03 04:58:38.494146'),
(4, '5', 'N', '2020-02-02 06:49:33.080934'),
(5, '2', 'Y', '2020-02-03 04:57:53.324839'),
(6, '3', 'N', '2020-02-03 04:58:24.312257'),
(7, '4', 'Y', '2020-02-03 04:58:03.613800'),
(8, '7', 'N', '2020-02-03 04:58:33.475501'),
(11, '8', 'Y', '2020-02-05 06:47:00.652019');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(6) NOT NULL,
  `en_roll` varchar(15) DEFAULT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `mobile_no` varchar(80) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sem_id` varchar(30) NOT NULL,
  `branch_id` varchar(30) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `en_roll`, `f_name`, `m_name`, `l_name`, `gender`, `mobile_no`, `address`, `email`, `password`, `sem_id`, `branch_id`, `last_update`) VALUES
(1, '176240316056', 'patel', 'ashok', 'rajukumar', 'M', '1234567890', 'sam,addas complex , mahavirnagar , himmatnagar .', 'ashok@gmail.com', '', '1', '1', '2020-03-02 09:44:49.629909'),
(3, '176240316023', 'Hardik', 'j', 'Soni', 'M', '1234567890', 'demo', 'h@g.com', '', '5', '1', '2020-03-02 09:45:08.546408'),
(4, '176240316089', 'adad', 'ad', 'asd', 'M', '1234567890', 'sdfdsfasdfasdf', 'jp@gmail.com', '', '1', '1', '2020-03-02 09:45:20.253901'),
(5, '176240316013', 'asd', 'asd', 'dasd', 'M', '1234567890', 'xcscasdcs', 'j@gmail.com', '', '1', '1', '2020-03-02 09:45:40.288838');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(50) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `sem_id` int(50) NOT NULL,
  `teacher_id` int(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`, `branch_id`, `sem_id`, `teacher_id`, `status`, `last_update`) VALUES
(1, 'ANDROID', 1, 1, 1, 'Y', '2020-02-07 14:20:53.565227'),
(3, 'COMPUTER PROGRAMING', 1, 2, 2, 'Y', '2020-02-07 14:20:57.138757'),
(4, 'FUNDAMENTALS OF DIGITAL ELECTRONICS', 1, 2, 4, 'Y', '2020-02-07 14:21:01.927701'),
(6, 'ADVANCE JAVA PROGRAMMING', 1, 1, 2, 'Y', '2020-02-07 14:21:06.394603'),
(7, 'OBJECT ORIANTED PROGRAMING', 1, 6, 4, 'Y', '2020-02-07 14:27:50.994941'),
(8, 'WNS', 1, 1, 1, 'Y', '2020-03-04 06:07:46.397568'),
(9, 'PHP', 1, 1, 1, 'Y', '2020-03-05 04:47:35.688099');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `id` int(50) NOT NULL,
  `teacher_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(56) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `branch_id` varchar(150) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`id`, `teacher_name`, `email`, `password`, `gender`, `branch_id`, `last_update`) VALUES
(1, 'virat', 'virat@gmail.com', '5a39fe36ce9aa092ffe8faa0eaedd5da', 'M', '1', '2020-04-21 04:35:39.819898'),
(2, 'rohit', 'd12@gmail.com', '2d235ace000a3ad85f590e321c89bb99', 'M', '9', '2020-04-21 04:36:10.684417'),
(4, 'rahul', 'h@g.com', '439ed537979d8e831561964dbbbd7413', 'M', '1', '2020-04-21 04:36:34.891730'),
(5, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'M', '1', '2020-04-21 04:34:28.802945');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_roll` (`en_roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_details`
--
ALTER TABLE `teacher_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
