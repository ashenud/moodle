-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 05:24 PM
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
(1, 1, 'Lesly', 'Jayasekara', '1971-09-08', 1, '', 'lesly@gmail.com', '25/4, Galle Road,  Moratuwa', NULL, 'Mathematics', 'University of Ruhuna', NULL, '2021-05-16 08:28:23', '2021-06-16 15:48:03'),
(3, 4, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asd', 'asf', NULL, '2021-06-16 16:29:06', NULL),
(4, 7, 'ASHEN', 'UDITHAMAL', '2021-06-15', 2, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'qwe', 'asd', NULL, '2021-06-16 16:32:42', NULL),
(5, 12, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:38:31', NULL),
(6, 13, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:39:30', NULL),
(7, 14, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:40:07', NULL),
(8, 15, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:40:13', NULL),
(9, 16, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:40:33', NULL),
(10, 17, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:40:50', NULL),
(11, 18, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:42:06', NULL),
(12, 19, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:42:07', NULL),
(13, 20, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '213', NULL, '2021-06-16 16:42:19', NULL),
(14, 23, 'ASHEN', 'UDITHAMAL', '2021-06-02', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asd', 'asfd', NULL, '2021-06-16 16:45:28', NULL),
(15, 24, 'ASHEN', 'UDITHAMAL', '2021-06-09', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '213', '123', NULL, '2021-06-16 16:46:11', NULL);

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
(1, 2, 'Ashen', 'Udithamal', '1995-03-16', 1, '', 'ashen@gmail.com', '28/4, Kottawa Road, Battaramulla', NULL, 1, 2, 2, 2, NULL, '2021-05-16 15:13:59', '2021-06-16 15:48:18'),
(3, 3, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 3, NULL, '2021-06-16 16:27:54', NULL),
(4, 5, 'ASHEN', 'UDITHAMAL', '2021-06-15', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 3, NULL, '2021-06-16 16:31:20', NULL),
(5, 6, 'ASHEN', 'UDITHAMAL', '2021-06-15', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 3, NULL, '2021-06-16 16:32:20', NULL),
(6, 8, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 2, 1, 3, 2, NULL, '2021-06-16 16:33:34', NULL),
(7, 9, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 2, 1, 3, 2, NULL, '2021-06-16 16:34:57', NULL),
(8, 10, 'ASHEN', 'UDITHAMAL', '2021-06-10', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 2, 1, 3, 3, NULL, '2021-06-16 16:36:58', NULL),
(9, 11, 'ASHEN', 'UDITHAMAL', '2021-06-16', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 3, NULL, '2021-06-16 16:37:48', NULL),
(10, 21, 'ASHEN', 'UDITHAMAL', '2021-06-15', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 2, NULL, '2021-06-16 16:43:26', NULL),
(11, 22, 'ASHEN', 'UDITHAMAL', '2021-06-15', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 2, 1, 3, 3, NULL, '2021-06-16 16:44:12', NULL);

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
(2, 'Ashen', 'Udithamal', 1, 'ashen@gmail.com', 2, '28/4, Kottawa Road, Battaramulla', NULL, 'student1', '202cb962ac59075b964b07152d234b70', NULL, '2021-05-16 15:13:59', '2021-06-03 13:00:00'),
(3, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:27:54', NULL),
(4, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '1233', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:29:06', NULL),
(5, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'qwe', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:31:20', NULL),
(6, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'qwe', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:32:20', NULL),
(7, 'ASHEN', 'UDITHAMAL', 2, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'sad', 'd78c03d72e72b44a131d255aec3c8a11', NULL, '2021-06-16 16:32:42', NULL),
(8, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'qwee', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:33:34', NULL),
(9, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '12333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:34:57', NULL),
(10, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asd', '7815696ecbf1c96e6894b779456d330e', NULL, '2021-06-16 16:36:58', NULL),
(11, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'qweee', '76d80224611fc919a5d54f0ff9fba446', NULL, '2021-06-16 16:37:48', NULL),
(12, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:38:31', NULL),
(13, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:39:30', NULL),
(14, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:40:07', NULL),
(15, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:40:13', NULL),
(16, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:40:33', NULL),
(17, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:40:50', NULL),
(18, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:42:06', NULL),
(19, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:42:07', NULL),
(20, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '123333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:42:19', NULL),
(21, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asddd', '7815696ecbf1c96e6894b779456d330e', NULL, '2021-06-16 16:43:26', NULL),
(22, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asdddd', '7815696ecbf1c96e6894b779456d330e', NULL, '2021-06-16 16:44:12', NULL),
(23, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asdff', '7815696ecbf1c96e6894b779456d330e', NULL, '2021-06-16 16:45:28', NULL),
(24, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, '1233333', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 16:46:11', NULL);

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
