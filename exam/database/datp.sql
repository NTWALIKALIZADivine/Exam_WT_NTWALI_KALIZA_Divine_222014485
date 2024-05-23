-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 08:54 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE IF NOT EXISTS `attendees` (
  `attendee_id` int(40) NOT NULL AUTO_INCREMENT,
  `workshop_name` varchar(20) NOT NULL,
  `registration_date` date NOT NULL,
  `Names` varchar(50) NOT NULL,
  `Phone` int(56) NOT NULL,
  `image` varchar(90) NOT NULL,
  PRIMARY KEY (`attendee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`attendee_id`, `workshop_name`, `registration_date`, `Names`, `Phone`, `image`) VALUES
(1, 'Physics', '2024-05-15', 'Kagabe Rita', 2147483647, ''),
(2, 'math', '2024-05-07', 'Kagabe Rita', 2147483647, ''),
(3, 'chemy', '2024-05-31', 'gihozo', 786789813, ''),
(5, '', '0000-00-00', 'kk', 786789845, 'delivery.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `certificate_id` int(40) NOT NULL,
  `user_id` int(50) NOT NULL,
  `course_id` int(55) NOT NULL,
  `completion date` varchar(34) NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datanalysis`
--

CREATE TABLE IF NOT EXISTS `datanalysis` (
  `Id` int(121) NOT NULL AUTO_INCREMENT,
  `Resource_name` varchar(33) NOT NULL,
  `Upload_date` date NOT NULL,
  `Desccription` varchar(55) NOT NULL,
  `Resource_type` varchar(88) NOT NULL,
  `image` varchar(90) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `datanalysis`
--

INSERT INTO `datanalysis` (`Id`, `Resource_name`, `Upload_date`, `Desccription`, `Resource_type`, `image`, `dateAdded`) VALUES
(2, 'mikk', '2024-05-22', 'yu', 'yhbuhjb', 'delivery.jpeg', '2024-05-23 06:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE IF NOT EXISTS `enrollments` (
  `user_id` int(30) NOT NULL,
  `course` int(40) NOT NULL,
  `dates` int(50) NOT NULL,
  `completion status` int(55) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `User_feedback` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `Email`, `User_feedback`) VALUES
(1, 'igiihzogady@gmail.com', 'asfdfsddvsdvs');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `instructor_id` int(50) NOT NULL AUTO_INCREMENT,
  `instructor_name` varchar(30) NOT NULL,
  `instructor_email` varchar(40) NOT NULL,
  `instructor_expertise` varchar(55) NOT NULL,
  `address` varchar(90) NOT NULL,
  `gender` varchar(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_name`, `instructor_email`, `instructor_expertise`, `address`, `gender`, `image`, `dateAdded`) VALUES
(1, 'kadi', 'kadi@gmail.com', 'Analysis', '', '', '', '0000-00-00 00:00:00'),
(2, 'kaliza', 'kaldiv2002@gmail.com', 'Beginner teacher', '', '', '', '0000-00-00 00:00:00'),
(3, 'gad', 'rita@gmail.com', 'expert analyst', '', '', '', '0000-00-00 00:00:00'),
(4, 'gad', 'rita@gmail.com', 'expert analyst', '', '', '', '0000-00-00 00:00:00'),
(5, 'gad', 'rita@gmail.com', 'expert analyst', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `user_id` int(50) NOT NULL,
  `Quiz_id` int(50) NOT NULL,
  `score` int(50) NOT NULL,
  `completion date` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `fullname`, `email`, `address`, `age`, `gender`, `image`, `dateAdded`) VALUES
(1, 'mike', 'rita@gmail.com', 'KK 169', 12, 'male', 'delivery.jpeg', '2024-05-23 07:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `role` varchar(90) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `role`) VALUES
(1, 'Kadi Kaliza', 'kaldiv2002@gmail.com', '123', ''),
(2, 'kadi kaliza', 'jj@gmail.com', '666', ''),
(3, 'hugues karangwa', 'kar@gmail.com', '123456', ''),
(4, 'gad', 'gad@gmail.com', '12345', ''),
(5, 'kadi', 'rita@gmail.com', 'bb', 'user'),
(6, 'kadi', 'kaldiv2002@gmail.com', 'bbbb', 'Admin'),
(7, 'mike', 'mike@gmail.com', '18126e7bd3f84b3f3e4df094def5b7de', 'Student'),
(8, 'mike@gmail.com', 'mike@gmail.com', 'e28f6f64608c970c663197d7fe1f5a59', 'Student'),
(9, 'Esther', 'esther@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `workshop schedule`
--

CREATE TABLE IF NOT EXISTS `workshop schedule` (
  `workshop_id` int(30) NOT NULL,
  `workshop_time` int(40) NOT NULL,
  `workshop_date` varchar(50) NOT NULL,
  `workshop_instructor` text NOT NULL,
  PRIMARY KEY (`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worshop`
--

CREATE TABLE IF NOT EXISTS `worshop` (
  `workshop_id` int(30) NOT NULL AUTO_INCREMENT,
  `workshop_name` varchar(45) NOT NULL,
  `description` varchar(50) NOT NULL,
  `duration` varchar(55) NOT NULL,
  `image` varchar(90) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `worshop`
--

INSERT INTO `worshop` (`workshop_id`, `workshop_name`, `description`, `duration`, `image`, `dateAdded`) VALUES
(1, 'Data Visualisation Mastery', 'This workshop focuses on mastering various data vi', '3', '', '0000-00-00 00:00:00'),
(2, 'Machine Learning Fundamentals', 'Learn the fundamental concepts of machine learning', '4Hours', '', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
