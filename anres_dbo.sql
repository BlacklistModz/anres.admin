-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 06:02 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anres_dbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(7) NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attend_type` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affiliation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentation_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submission_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path_paper` text COLLATE utf8_unicode_ci,
  `path_std` text COLLATE utf8_unicode_ci,
  `path_mou` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `title`, `attend_type`, `firstname`, `lastname`, `affiliation`, `address`, `province`, `postal`, `region`, `email`, `presentation_type`, `submission_type`, `payment_type`, `payment_status`, `price`, `currency`, `created`, `updated`, `status`, `path_paper`, `path_std`, `path_mou`) VALUES
(815988696, 'Mr', 'Administrator', 'Chayakorn', 'Kaewong', 'default', 'Chiang sean', 'Chiang rai', '57150', 'THAILAND', 'whitecat.chayakorn@gmail.com', 'default', 'default', 'none', 'Waiting', 0.00, '', '2018-01-03 14:22:07', '0000-00-00 00:00:00', 'Appcept', NULL, 'none', 'none'),
(454657138, 'Mr', 'Thai Delegate', 'asdasd', 'asdasdas', 'dsadas', '57150', 'saddsasda', 'dsadas', 'Central African Republic', 'dsadasd@asdasd', 'Poster presentation', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 10:08:42', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(274206900, 'Mr', 'Thai Delegate', 'asdasd', 'asdasdas', 'dsadas', '57150', 'saddsasda', 'dsadas', 'Central African Republic', 'dsadasd@asdasd', 'Poster presentation', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 07:00:54', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(814097934, 'Mr', 'Thai Delegate', 'asdasd', 'asdasdas', 'dsadas', '57150', 'saddsasda', 'dsadas', 'Central African Republic', 'dsadasd@asdasd', 'Poster presentation', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 03:40:49', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(152895865, 'Mr', 'Thai Delegate', 'asdasd', 'asdasdas', 'dsadas', '57150', 'saddsasda', 'dsadas', 'Central African Republic', 'dsadasd@asdasd', 'Poster presentation', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 03:38:39', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(175659543, 'Mr', 'Thai Delegate', 'chutipong', 'hanyur', 'test', 'chiang sean', 'chiang rai', '57150', 'Thailand', 'whitecat.chayakorn@gmail.com', 'Attend the conference only', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 03:04:01', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(844031498, 'Mr', 'Thai Delegate', 'chutipong', 'hanyur', 'test', 'chiang sean', 'chiang rai', '57150', 'Thailand', 'whitecat.chayakorn@gmail.com', 'Attend the conference only', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 02:58:11', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(150163252, 'Mr', 'Thai Delegate', 'chutipong', 'hanyur', 'test', 'chiang sean', 'chiang rai', '57150', 'Thailand', 'whitecat.chayakorn@gmail.com', 'Attend the conference only', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 02:53:55', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL),
(854584828, 'Mr', 'Thai Delegate', 'chutipong', 'hanyur', 'test', 'chiang sean', 'chiang rai', '57150', 'Thailand', 'whitecat.chayakorn@gmail.com', 'Attend the conference only', NULL, 'Bill payment', 'Waiting', NULL, '', '2018-01-04 02:40:24', '0000-00-00 00:00:00', 'wait', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `createdAt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updatedAt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `createdAt`, `updatedAt`) VALUES
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018', '2018'),
(0, '2018-01-03 06:09:16', '2018-01-03 06:09:16'),
(0, '2018-01-03 06:10:54', '2018-01-03 06:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `option_name` varchar(160) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `uid` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `user_type` int(5) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `reg_id` int(10) NOT NULL COMMENT 'reg id',
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_stamp` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_stamp` datetime DEFAULT NULL,
  `permission` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `reg_id`, `firstname`, `lastname`, `email`, `username`, `password`, `access_token`, `create_stamp`, `update_stamp`, `permission`) VALUES
(1, 0, 'Admin', '', 'admin@admin.com', 'admin', '$2y$10$XfXpLXqn.dZceJ9i7.taluelWBpj7dYJzHzO/pg.2qFO4JMlRBUd2', NULL, '2018-01-05 10:46:40', '2018-01-05 10:44:00', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD KEY `option_name` (`option_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
