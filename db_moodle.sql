-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 05:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_moodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecturers`
--

CREATE TABLE `tbl_lecturers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1-male,2-female,3-other',
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_url` text,
  `specialized` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lecturers`
--

INSERT INTO `tbl_lecturers` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `mobile`, `email`, `address`, `image_url`, `specialized`, `university`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lesly', 'Jayasekara', '1971-09-08', 1, '', 'lesly@gmail.com', '25/4, Galle Road,  Moratuwa', NULL, 'Mathematics', 'University of Ruhuna', NULL, '2021-05-16 08:28:23', '2021-06-16 15:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pases`
--

CREATE TABLE `tbl_pases` (
  `id` int(11) NOT NULL,
  `pass_mark` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pases`
--

INSERT INTO `tbl_pases` (`id`, `pass_mark`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A Pass', NULL, '2021-06-16 15:37:25', NULL),
(2, 'B Pass', NULL, '2021-06-16 15:37:25', NULL),
(3, 'C Pass', NULL, '2021-06-16 15:37:25', NULL),
(4, 'S Pass', NULL, '2021-06-16 15:37:25', NULL),
(5, 'F Pass', NULL, '2021-06-16 15:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_streams`
--

CREATE TABLE `tbl_streams` (
  `id` int(11) NOT NULL,
  `stream_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_streams`
--

INSERT INTO `tbl_streams` (`id`, `stream_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sinhala', NULL, '2021-05-16 08:28:23', '2021-06-16 15:35:37'),
(2, 'English', NULL, '2021-05-16 15:13:59', '2021-06-16 15:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1-male,2-female,3-other',
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_url` text,
  `al_stream` int(2) DEFAULT NULL,
  `uni_stream` int(2) DEFAULT NULL,
  `ol_eng_result` int(2) DEFAULT NULL,
  `al_eng_result` int(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `mobile`, `email`, `address`, `image_url`, `al_stream`, `uni_stream`, `ol_eng_result`, `al_eng_result`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ashen', 'Udithamal', '1995-03-16', 1, '', 'ashen@gmail.com', '28/4, Kottawa Road, Battaramulla', NULL, 1, 2, 2, 2, NULL, '2021-05-16 15:13:59', '2021-06-16 15:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1-male,2-female,3-other',
  `email` varchar(255) DEFAULT NULL,
  `type_id` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_url` text,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `gender`, `email`, `type_id`, `address`, `image_url`, `username`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lesly', 'Jayasekara', 1, 'lesly@gmail.com', 1, '25/4, Galle Road,  Moratuwa', NULL, 'lecturer1', '202cb962ac59075b964b07152d234b70', NULL, '2021-05-16 08:28:23', '2021-06-13 10:12:20'),
(2, 'Ashen', 'Udithamal', 1, 'ashen@gmail.com', 2, '28/4, Kottawa Road, Battaramulla', NULL, 'student1', '202cb962ac59075b964b07152d234b70', NULL, '2021-05-16 15:13:59', '2021-06-03 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_types`
--

CREATE TABLE `tbl_user_types` (
  `ut_id` int(11) NOT NULL,
  `ut_name` varchar(25) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_types`
--

INSERT INTO `tbl_user_types` (`ut_id`, `ut_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer', NULL, '2021-06-13 10:13:42', '2021-06-13 10:13:42'),
(2, 'Student', NULL, '2021-06-13 10:13:42', '2021-06-13 10:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lecturers`
--
ALTER TABLE `tbl_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pases`
--
ALTER TABLE `tbl_pases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_streams`
--
ALTER TABLE `tbl_streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lecturers`
--
ALTER TABLE `tbl_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pases`
--
ALTER TABLE `tbl_pases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_streams`
--
ALTER TABLE `tbl_streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
