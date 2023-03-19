-- phpMyAdmin SQL Dump Hashem
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2022 at 06:48 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaminglounge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'ziad', 'abudabbous', 'z@gmail.com', '123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_dashboard`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `admin_dashboard`;
CREATE TABLE IF NOT EXISTS `admin_dashboard` (
`fname` varchar(200)
,`lname` varchar(200)
,`name` varchar(200)
,`res_time` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `type_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gamestypes`
--

DROP TABLE IF EXISTS `gamestypes`;
CREATE TABLE IF NOT EXISTS `gamestypes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamestypes`
--

INSERT INTO `gamestypes` (`id`, `name`, `capacity`) VALUES
(1, 'Billiard', 2),
(2, 'PS5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `res_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `email`, `password`, `role`) VALUES
(2, 'abd', 'qaroot', 'abd@gmail.com', '123', 0),
(3, 'aa', 'aa', 'aa.com', 'aa', 0),
(4, 'a', 'a', 'a@a.com', '123', 0),
(5, 's', 's', 's@gmail.com', '123', 0),
(6, 'Ziad', 'Abu Dabbous', 'z@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

DROP TABLE IF EXISTS `timeslots`;
CREATE TABLE IF NOT EXISTS `timeslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `8:30` int(11) NOT NULL,
  `9` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `game_id`, `8:30`, `9`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure for view `admin_dashboard`
--
DROP TABLE IF EXISTS `admin_dashboard`;

DROP VIEW IF EXISTS `admin_dashboard`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_dashboard`  AS  select `students`.`fname` AS `fname`,`students`.`lname` AS `lname`,`gamestypes`.`name` AS `name`,`reservations`.`res_time` AS `res_time` from (((`reservations` join `students` on((`reservations`.`student_id` = `students`.`id`))) join `games` on((`reservations`.`game_id` = `games`.`id`))) join `gamestypes` on((`games`.`type_id` = `gamestypes`.`id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
