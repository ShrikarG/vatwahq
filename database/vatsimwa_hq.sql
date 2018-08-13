-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 03:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hq_bak`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `stu_email` varchar(50) NOT NULL,
  `vacc` varchar(20) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `stu_reason` text NOT NULL,
  `rej_reason` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atcbooking`
--

CREATE TABLE `atcbooking` (
  `id` int(11) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `position` varchar(11) DEFAULT NULL,
  `b_full_date` date NOT NULL,
  `b_day` int(11) DEFAULT NULL,
  `b_month` int(11) DEFAULT NULL,
  `b_year` int(11) DEFAULT NULL,
  `stime` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `etime` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `euid` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atc_roster`
--

CREATE TABLE `atc_roster` (
  `id` int(11) NOT NULL,
  `vatsimcid` int(11) DEFAULT NULL,
  `fname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_log`
--

CREATE TABLE `booking_log` (
  `id` int(11) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(50) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `vacc` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `event` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `flight_no` varchar(15) DEFAULT NULL,
  `dep_icao` varchar(4) DEFAULT NULL,
  `arr_icao` varchar(4) DEFAULT NULL,
  `dep_time` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `arr_time` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `route` text,
  `status` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ins_slots`
--

CREATE TABLE `ins_slots` (
  `id` int(11) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `session_date` date DEFAULT NULL,
  `sess_start_time` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `sess_end_time` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `ins_id` int(11) DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `stu_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ins_email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` text,
  `lname` varchar(30) DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `auth` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qr_events`
--

CREATE TABLE `qr_events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(512) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `qr` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qr_staff`
--

CREATE TABLE `qr_staff` (
  `id` int(11) NOT NULL,
  `vatsimid` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `callsign` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `verify` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qr_status`
--

CREATE TABLE `qr_status` (
  `id` int(11) NOT NULL,
  `vacc` varchar(20) DEFAULT NULL,
  `qyear` varchar(10) NOT NULL,
  `q_status` int(11) NOT NULL DEFAULT '0',
  `submitted_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qr_students`
--

CREATE TABLE `qr_students` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `sfname` varchar(50) DEFAULT NULL,
  `slname` varchar(50) DEFAULT NULL,
  `srating` varchar(50) DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `qr` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `dep_icao` varchar(4) DEFAULT NULL,
  `arr_icao` varchar(4) DEFAULT NULL,
  `route` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solo`
--

CREATE TABLE `solo` (
  `vatsimcid` int(11) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `vacc` varchar(30) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_till` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `session_date` date DEFAULT NULL,
  `sess_start_time` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `sess_end_time` int(4) UNSIGNED ZEROFILL NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `ins_id` int(11) NOT NULL,
  `notes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atcbooking`
--
ALTER TABLE `atcbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atc_roster`
--
ALTER TABLE `atc_roster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_log`
--
ALTER TABLE `booking_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ins_slots`
--
ALTER TABLE `ins_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_events`
--
ALTER TABLE `qr_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_staff`
--
ALTER TABLE `qr_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_status`
--
ALTER TABLE `qr_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_students`
--
ALTER TABLE `qr_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atcbooking`
--
ALTER TABLE `atcbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atc_roster`
--
ALTER TABLE `atc_roster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_log`
--
ALTER TABLE `booking_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ins_slots`
--
ALTER TABLE `ins_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_events`
--
ALTER TABLE `qr_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_staff`
--
ALTER TABLE `qr_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_status`
--
ALTER TABLE `qr_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_students`
--
ALTER TABLE `qr_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
