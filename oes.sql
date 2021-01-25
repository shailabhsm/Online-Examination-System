-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2021 at 09:32 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `chemistry`
--

DROP TABLE IF EXISTS `chemistry`;
CREATE TABLE IF NOT EXISTS `chemistry` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'chemistry',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemistry`
--

INSERT INTO `chemistry` (`q_no`, `question`, `subject`, `a`, `b`, `c`, `d`, `correct`) VALUES
(1, 'Who is regarded as father of modern chemistry ?', 'chemistry', 'Ruterford', 'Einstein', 'Lavoisier', 'C.V. Raman', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

DROP TABLE IF EXISTS `computer`;
CREATE TABLE IF NOT EXISTS `computer` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'computer',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`q_no`, `question`, `subject`, `a`, `b`, `c`, `d`, `correct`) VALUES
(1, 'CPU stands for ?', 'computer', 'Core Processing Unit', 'Central Processing Unit', 'Central Primary Unit', 'Core Primary Unit', 'b'),
(2, 'ALU Stands for ?', 'computer', 'Arithmetic Logical Unit', 'Arithmetic Last Unit', 'Arithmetic Long Unit', 'Arithmetic Lower Unit', 'a'),
(3, 'CSS stands for ?', 'computer', 'Coding Style Sheet', 'Capsule Style Sheet', 'Cascading Style Sheet', 'Capital Style Sheet', 'c'),
(4, 'WWW stands for ?', 'computer', 'World Whole Web', 'Wide World Web', 'Web World Wide', 'World Wide Web', 'd'),
(5, 'Which of the following are components of Central Processing Unit (CPU) ?', 'computer', 'Arithmetic logic unit, Mouse', 'Arithmetic logic unit, Control unit', 'Arithmetic logic unit, Integrated Circuits', 'Control Unit, Monitor', 'b'),
(6, 'Which among following first generation of computers had ?', 'computer', 'Vaccum Tubes and Magnetic Drum', 'Integrated Circuits', 'Magnetic Tape and Transistors', 'All of above', 'a'),
(7, 'Where is RAM located ?', 'computer', 'Expansion Board', 'External Drive', 'Mother Board', 'All of above', 'c'),
(8, 'If a computer has more than one processor then it is known as ?', 'computer', 'Uniprocess', 'Multiprocessor', 'Multithreaded', 'Multiprogramming', 'b'),
(9, 'Full form of URL is ?', 'computer', 'Uniform Resource Locator', 'Uniform Resource Link', 'Uniform Registered Link', 'Unified Resource Link', 'a'),
(10, 'In which of the following form, data is stored in computer ?', 'computer', 'Decimal', 'Binary', 'HexaDecimal', 'Octal', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `gk`
--

DROP TABLE IF EXISTS `gk`;
CREATE TABLE IF NOT EXISTS `gk` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'gk',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gk`
--

INSERT INTO `gk` (`q_no`, `question`, `subject`, `a`, `b`, `c`, `d`, `correct`) VALUES
(1, 'Study of the Universe is known as ?', 'gk', 'Sociology', 'Cosmology', 'Universology', 'Petology', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

DROP TABLE IF EXISTS `maths`;
CREATE TABLE IF NOT EXISTS `maths` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'maths',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physics`
--

DROP TABLE IF EXISTS `physics`;
CREATE TABLE IF NOT EXISTS `physics` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'physics',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physics`
--

INSERT INTO `physics` (`q_no`, `question`, `subject`, `a`, `b`, `c`, `d`, `correct`) VALUES
(1, 'Which instrument is used to measure the power of electric circuit ?', 'physics', 'Voltmeter', 'Wattmeter', 'Wavemeter', 'Viscometer', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `reasoning`
--

DROP TABLE IF EXISTS `reasoning`;
CREATE TABLE IF NOT EXISTS `reasoning` (
  `q_no` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `subject` varchar(30) NOT NULL DEFAULT 'reasoning',
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reasoning`
--

INSERT INTO `reasoning` (`q_no`, `question`, `subject`, `a`, `b`, `c`, `d`, `correct`) VALUES
(1, 'Moon : Satellite :: Earth : ?', 'reasoning', 'Sun', 'Planet', 'Solar System', 'Asteroid', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `res`
--

DROP TABLE IF EXISTS `res`;
CREATE TABLE IF NOT EXISTS `res` (
  `e_no` int NOT NULL AUTO_INCREMENT,
  `score` float NOT NULL,
  `t_ques` int NOT NULL,
  `q_attempt` int NOT NULL,
  `s_t_lock` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `status` varchar(4) NOT NULL,
  `percent` float NOT NULL,
  PRIMARY KEY (`e_no`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reslog`
--

DROP TABLE IF EXISTS `reslog`;
CREATE TABLE IF NOT EXISTS `reslog` (
  `e_no` int NOT NULL,
  `q_no` int NOT NULL,
  `ans` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

DROP TABLE IF EXISTS `sub`;
CREATE TABLE IF NOT EXISTS `sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `name`, `created_at`) VALUES
(1, 'Physics', '2017-03-21 19:41:27'),
(2, 'Chemistry', '2017-03-21 19:43:12'),
(3, 'Maths', '2017-03-22 16:52:35'),
(4, 'Computer', '2017-03-22 16:52:50'),
(5, 'Gk', '2017-03-22 16:54:09'),
(7, 'Reasoning', '2017-04-19 23:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` double NOT NULL,
  `mobile` double NOT NULL,
  `photo` longblob NOT NULL,
  `secque1` varchar(100) NOT NULL,
  `secans1` varchar(50) NOT NULL,
  `secque2` varchar(100) NOT NULL,
  `secans2` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_type`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_type`, `name`, `email`, `pass`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `photo`, `secque1`, `secans1`, `secque2`, `secans2`, `dob`, `created_at`) VALUES
('admin', 'a', 'a@a', 'a', 'a', 'a', 'a', 'a', 1, 1, '', '', '', '', '', '0000-00-00', '2017-03-21 18:15:05'),
('admin', 'a', 'c@a', 'a', 'aa', 'a', 'a', 'a', 1, 1, '', '', '', '', '', '0000-00-00', '2017-03-21 18:15:05'),
('admin', 'q', 'q@q', 'q', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00', '2017-04-14 23:01:13'),
('student', 'a', 'aaa@aaa', 'a', 'q', 'a', 'a', 'a', 111, 111, '', '', '', '', '', '0000-00-00', '2017-03-21 18:15:05'),
('student', 'a', 'q@q', 'q', 'q', 'q', 'q', 'q', 111111, 1111111111, '', '', '', '', '', '0000-00-00', '2017-04-14 22:57:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
