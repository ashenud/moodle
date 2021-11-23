-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2021 at 03:33 PM
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
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lecturers`
--

INSERT INTO `tbl_lecturers` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `mobile`, `email`, `address`, `image_url`, `specialized`, `university`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lesly', 'Jayasekara', '1971-09-08', 1, '', 'lesly@gmail.com', '25/4, Galle Road,  Moratuwa', NULL, 'Mathematics', 'University of Ruhuna', NULL, '2021-05-16 08:28:23', '2021-06-16 15:48:03'),
(16, 26, 'ASHEN', 'UDITHAMAL', '2021-06-08', 2, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'sad', 'asd', NULL, '2021-06-16 18:39:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lecture_type` int(2) NOT NULL,
  `lecture_type_desc` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`id`, `user_id`, `lecture_type`, `lecture_type_desc`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Networking Related Lecture', 'what are doing', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(2, 2, 1, 'Networking Related Lecture', 'Sri Lanka is the most favourite cricket country in all world country like Sri Lanka cricket also I like to', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(3, 2, 0, 'Software Quality assurance Related Lecture', 'samuh Sumesh cricketers in Sri Lankan cricket team Rashtriya this Sri Lanka cricketers and I think always wanted to know what the shit shit f***', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(4, 2, 1, 'Networking Related Lecture', 'November Rambha all of Sri Lankan in Indian players most valuable cricket introduction history about all of yes', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(5, 2, 0, 'Software Quality assurance Related Lecture', 'software quality assurance', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(6, 2, 1, 'Networking Related Lecture', 'Pogo hello how are you', NULL, '2021-11-21 11:17:05', '2021-11-21 16:47:05'),
(7, 2, 0, 'Software Quality assurance Related Lecture', 'how are you what are you doing so care software quality software quality assurance', NULL, '2021-11-21 11:45:21', '2021-11-21 17:15:21'),
(8, 2, 1, 'Networking Related Lecture', 'networking related actual lecture calling tomorrow we can celebrate it', NULL, '2021-11-21 11:46:12', '2021-11-21 17:16:12'),
(9, 2, 0, 'Software Quality assurance Related Lecture', 'Satya software software assurance relate quality', NULL, '2021-11-21 11:46:49', '2021-11-21 17:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pases`
--

CREATE TABLE `tbl_pases` (
  `id` int(11) NOT NULL,
  `pass_mark` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
-- Table structure for table `tbl_reminders`
--

CREATE TABLE `tbl_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reminder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `pusher_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_reminders`
--

INSERT INTO `tbl_reminders` (`id`, `user_id`, `reminder`, `date`, `pusher_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'meeting 1', '2021-12-23 09:35:00', '2021-11-23 00:00:43', NULL, '2020-12-21 14:35:36', '2021-11-22 18:30:43'),
(2, 2, 'meeting', '2021-12-25 19:48:00', '2021-11-23 00:06:43', NULL, '2020-12-22 08:48:54', '2021-11-22 18:36:43'),
(3, 2, 'test tanscation', '2021-12-23 09:35:00', '2021-11-23 00:01:43', NULL, '2020-12-22 08:19:06', '2021-11-22 18:31:43'),
(4, 2, 'meeting', '2021-12-25 19:19:00', '2021-11-23 00:05:46', NULL, '2020-12-22 08:19:06', '2021-11-22 18:35:46'),
(5, 2, 'test tanscation', '2021-12-23 09:35:00', '2021-11-23 00:02:43', NULL, '2020-12-22 08:19:52', '2021-11-22 18:32:43'),
(6, 2, 'meeting 6', '2021-12-24 19:19:00', '2021-11-23 00:03:44', NULL, '2020-12-22 08:19:52', '2021-11-22 18:33:44'),
(7, 2, 'meeting 2', '2021-12-24 19:48:00', '2021-11-23 00:04:45', NULL, '2020-12-22 08:48:39', '2021-11-22 18:34:45'),
(8, 2, 'meeting 4', '2021-12-31 19:48:00', '2021-11-23 00:07:43', NULL, '2020-12-22 08:48:28', '2021-11-22 18:37:43'),
(43, 2, '00asd0142axcasdvfs', '2021-07-16 09:26:00', '2021-07-11 19:49:59', NULL, '2021-07-04 08:56:53', '2021-07-11 14:19:59'),
(44, 2, 'asdasd', '2021-07-14 19:53:00', '2021-07-11 19:53:16', NULL, '2021-07-11 14:23:16', '2021-07-11 14:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_streams`
--

CREATE TABLE `tbl_streams` (
  `id` int(11) NOT NULL,
  `stream_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `grade_point` decimal(5,4) NOT NULL DEFAULT '1.1000',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `mobile`, `email`, `address`, `image_url`, `al_stream`, `uni_stream`, `ol_eng_result`, `al_eng_result`, `grade_point`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ashen', 'Udithamal', '1995-03-16', 1, '', 'ashen@gmail.com', '28/4, Kottawa Road, Battaramulla', NULL, 1, 2, 2, 2, '2.0000', NULL, '2021-05-16 15:13:59', '2021-11-21 12:15:29'),
(12, 25, 'ASHEN', 'UDITHAMAL', '2021-06-08', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 3, '1.1000', NULL, '2021-06-16 18:39:21', NULL),
(13, 27, 'ASHEN', 'UDITHAMAL', '2021-06-02', 1, '+94712782201', 'udithamal.lk@gmail.com', '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 1, 1, 3, 2, '1.1000', NULL, '2021-07-03 19:33:49', NULL),
(14, 28, 'Zachery', 'Middleton', '2021-11-11', 1, '0712489230', 'lucikaxic@mailinator.com', 'Placeat asperiores ', NULL, 2, 2, 1, 2, '2.0000', NULL, '2021-11-21 12:13:40', '2021-11-21 12:13:40'),
(15, 29, 'Aurora', 'Becker', '2021-11-02', 2, '0125012500', 'zemawoqen@mailinator.com', 'Aspernatur expedita ', NULL, 1, 1, 1, 3, '1.1000', NULL, '2021-11-21 12:15:10', '2021-11-21 12:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_study_plans`
--

CREATE TABLE `tbl_study_plans` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_study_plans`
--

INSERT INTO `tbl_study_plans` (`id`, `plan_id`, `time`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '5.00 AM', 'Make a habit of waking at 5 o clock in the morning.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:31:33'),
(2, 1, '5.00 AM - 5.30 AM', 'Finish up all utilities of freshening up yourself.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(3, 1, '5.30 AM - 6.00 AM', 'Mediate for 10 minutes and think of the goal which you want to achieve.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(4, 1, '6.30 AM - 6.30 AM', 'Take a cold water or tea as it increases the energy level.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(5, 1, '6.30 AM - 7.30 AM', 'Have a healthy breakfast & get ready to university.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(6, 1, '2.00 PM or 4.00 PM', 'Once you return from university have lunch. After that either take a break.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(7, 1, '4.00 PM - 6.00 PM', 'Take a break. At that time, you can go out to play or hobby.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(8, 1, '6.00 PM - 9.00 PM', 'Study subject which you find difficult.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(9, 1, '9.00 PM - 9.30 PM', 'Get a light dinner.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(10, 1, '9.30 PM - 10.30 PM', 'Do your homework.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(11, 1, '10.30 PM - 11.30 PM', 'Revise your topics', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(12, 1, '11.30 PM ', 'Go to sleep.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(13, 2, '4.00 AM', 'Make a habit of waking at 4 o clock in the morning.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(14, 2, '4.00 AM - 4.30 AM', 'Finish up all utilities of freshening up yourself.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(15, 2, '4.30 AM - 5.00 AM', 'Mediate for 10 minutes and think of the goal which you want to achieve.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(16, 2, '5.00 AM - 6.30 AM', 'Self-study.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(17, 2, '6.30 AM - 7.00 AM', 'Take a cold water or tea as it increases the energy level.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(18, 2, '7.00 AM - 7.30 AM', 'Have a healthy breakfast & get ready to university.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(19, 2, '2.00 PM or 4.00 PM', 'Once you return from university have lunch. After that either take a break.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(20, 2, '4.00 PM - 5.00 PM', 'Take a break. At that time, you can go out to play or hobby.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(21, 2, '5.00 PM - 9.00 PM', 'Study subject which you find difficult.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(22, 2, '9.00 PM - 9.30 PM', 'Get a light dinner.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(23, 2, '9.30 PM - 11.00 PM', 'Do your homework.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(24, 2, '11.00 PM - 11.30 PM', 'Revise your topics', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(25, 2, '11.30 PM ', 'Go to sleep.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(26, 3, '6.00 AM', 'Make a habit of waking at 6 o clock in the morning.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(27, 3, '6.00 AM - 6.30 AM', 'Finish up all utilities of freshening up yourself.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(28, 3, '6.30 AM - 7.00 AM', 'Mediate for 10 minutes and think of the goal which you want to achieve.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(29, 3, '7.00 AM - 7.30 AM', 'Take a cold water or tea as it increases the energy level.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(30, 3, '7.30 AM - 8.00 AM', 'Have a healthy breakfast & get ready to office.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(31, 3, '2.00 PM or 4.00 PM', 'Once you return from office have lunch. After that either take a break.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(32, 3, '4.00 PM - 6.00 PM', 'Take a break. At that time, you can go out to play or hobby.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(33, 3, '6.00 PM - 11.00 PM', 'Study subject which you find difficult.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(34, 3, '11.00 PM - 11.30 PM', 'Get a light dinner.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(35, 3, '11.30 PM - 12.30 PM', 'Do your homework in the office.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(36, 3, '12.30 PM - 1.30 PM', 'Revise your topics', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(37, 3, '1.30 PM ', 'Go to sleep.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(38, 4, '3.00 AM', 'Make a habit of waking at 3 o clock in the morning.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(39, 4, '3.00 AM - 3.30 AM', 'Finish up all utilities of freshening up yourself.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(40, 4, '3.30 AM - 4.00 AM', 'Mediate for 10 minutes and think of the goal which you want to achieve.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(41, 4, '4.00 AM - 6.00 AM', 'Self-study', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(42, 4, '7.00 AM - 7.30 AM', 'Take a cold water or tea as it increases the energy level.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(43, 4, '7.30 AM - 8.00 AM', 'Have a healthy breakfast & get ready to office.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(44, 4, '2.00 PM or 4.00 PM', 'Once you return from office have lunch. After that either take a break.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(45, 4, '4.00 PM - 5.00 PM', 'Take a break. At that time, you can go out to play or hobby.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(46, 4, '5.00 PM - 8.00 PM', 'Study subject which you find difficult.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(47, 4, '8.00 PM - 8.30 PM', 'Get a light dinner.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(48, 4, '8.30 PM - 9.30 PM', 'Do your homework in the office.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(49, 4, '9.30 PM - 10.30 PM', 'Do your homework in university,', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(50, 4, '10.30 PM - 11.30 PM', 'Revise your topics', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23'),
(51, 4, '12.00 PM ', 'Go to sleep.', NULL, '2021-11-23 15:31:33', '2021-11-23 15:32:23');

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
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `gender`, `email`, `type_id`, `address`, `image_url`, `username`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lesly', 'Jayasekara', 1, 'lesly@gmail.com', 1, '25/4, Galle Road,  Moratuwa', NULL, 'lecturer1', '202cb962ac59075b964b07152d234b70', NULL, '2021-05-16 08:28:23', '2021-06-13 10:12:20'),
(2, 'Ashen', 'Udithamal', 1, 'ashen@gmail.com', 2, '28/4, Kottawa Road, Battaramulla', NULL, 'student1', '202cb962ac59075b964b07152d234b70', NULL, '2021-05-16 15:13:59', '2021-06-03 13:00:00'),
(25, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'ashen', '202cb962ac59075b964b07152d234b70', NULL, '2021-06-16 18:39:21', NULL),
(26, 'ASHEN', 'UDITHAMAL', 2, 'udithamal.lk@gmail.com', 1, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'asd', '7815696ecbf1c96e6894b779456d330e', NULL, '2021-06-16 18:39:52', NULL),
(27, 'ASHEN', 'UDITHAMAL', 1, 'udithamal.lk@gmail.com', 2, '33/B, PUWAKGAHADENIYA ROAD, HOKANDARA EAST, HOKANDARA.', NULL, 'assad', 'a8f5f167f44f4964e6c998dee827110c', NULL, '2021-07-03 19:33:49', NULL),
(28, 'Zachery', 'Middleton', 1, 'lucikaxic@mailinator.com', 2, 'Placeat asperiores ', NULL, 'abc', '202cb962ac59075b964b07152d234b70', NULL, '2021-11-21 12:13:40', '2021-11-21 12:13:40'),
(29, 'Aurora', 'Becker', 2, 'zemawoqen@mailinator.com', 2, 'Aspernatur expedita ', NULL, 'lilahon', '202cb962ac59075b964b07152d234b70', NULL, '2021-11-21 12:15:10', '2021-11-21 12:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_types`
--

CREATE TABLE `tbl_user_types` (
  `ut_id` int(11) NOT NULL,
  `ut_name` varchar(25) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_types`
--

INSERT INTO `tbl_user_types` (`ut_id`, `ut_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer', NULL, '2021-06-13 10:13:42', '2021-06-13 10:13:42'),
(2, 'Student', NULL, '2021-06-13 10:13:42', '2021-06-13 10:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `id` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `file_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `starred` tinyint(4) NOT NULL DEFAULT '0',
  `uploaded_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `owner_id`, `file_name`, `file_type`, `mime_type`, `file_size`, `starred`, `uploaded_date`) VALUES
('bccb93b4-3dc9-41e0-800c-62ed211ee0f2', 1, 'checking-page.png', 'resume', 'image/png', 795515, 0, '2021-07-14 03:49:33'),
('5dd65d1e-73bc-4456-9ad5-88d3a12cf38c', 1, '2021FEB-MONTHLY-BILL (1).pdf', 'resume', 'application/pdf', 552559, 0, '2021-07-14 03:57:50'),
('f782347f-476c-46ea-9313-f14219095dba', 1, 'butter-cake_1980x1320-118370-1.jpg', 'lecture_notes', 'image/jpeg', 226838, 0, '2021-10-17 12:22:13'),
('5a01881e-8352-4ed4-96d7-15471a108c46', 1, 'bread.csv', 'lecture_notes', 'application/vnd.ms-excel', 169, 0, '2021-10-17 12:22:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lecturers`
--
ALTER TABLE `tbl_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pases`
--
ALTER TABLE `tbl_pases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reminders`
--
ALTER TABLE `tbl_reminders`
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
-- Indexes for table `tbl_study_plans`
--
ALTER TABLE `tbl_study_plans`
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
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_files_mm_user_u_id_fk` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lecturers`
--
ALTER TABLE `tbl_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pases`
--
ALTER TABLE `tbl_pases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_reminders`
--
ALTER TABLE `tbl_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_streams`
--
ALTER TABLE `tbl_streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_study_plans`
--
ALTER TABLE `tbl_study_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
