-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2019 at 04:32 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_data`
--

DROP TABLE IF EXISTS `email_data`;
CREATE TABLE IF NOT EXISTS `email_data` (
  `email_address` varchar(50) NOT NULL,
  `email_track_code` varchar(50) NOT NULL,
  `email_subject` varchar(50) NOT NULL,
  `email_body` text NOT NULL,
  PRIMARY KEY (`email_track_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_track`
--

DROP TABLE IF EXISTS `email_track`;
CREATE TABLE IF NOT EXISTS `email_track` (
  `email_track_code` varchar(50) NOT NULL,
  `email_status` varchar(50) DEFAULT NULL,
  `email_open_datetime` varchar(50) DEFAULT NULL,
  KEY `fk_track_code` (`email_track_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email_track`
--
ALTER TABLE `email_track`
  ADD CONSTRAINT `fk_track_code` FOREIGN KEY (`email_track_code`) REFERENCES `email_data` (`email_track_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
