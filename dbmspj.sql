-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2021 at 08:39 AM
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
-- Database: `dbmspj`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `admin` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin`, `password`) VALUES
('alpha', 'alpha@123');

-- --------------------------------------------------------

--
-- Table structure for table `bigreg`
--

DROP TABLE IF EXISTS `bigreg`;
CREATE TABLE IF NOT EXISTS `bigreg` (
  `id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `age` varchar(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `address` varchar(205) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `dateofad` date NOT NULL,
  `doctor` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bigreg`
--

INSERT INTO `bigreg` (`id`, `name`, `age`, `sex`, `bloodgroup`, `address`, `contactno`, `dateofad`, `doctor`) VALUES
('N20211', 'Tresa', '55', 'female', 'B-', 'HJKKHKJHKHKH', '7125874521', '2021-01-19', 'Dr.David S Albert'),
('N20213', 'David', '65', 'female', 'O+', 'kjlkjl', '9875633214', '2021-01-20', 'Dr.David S Albert'),
('N20200002', 'Tresa', '27', 'female', 'O+', '54645', '8989898989', '2021-03-27', 'Dr.David S Albert');

-- --------------------------------------------------------

--
-- Table structure for table `casroom`
--

DROP TABLE IF EXISTS `casroom`;
CREATE TABLE IF NOT EXISTS `casroom` (
  `id` varchar(10) NOT NULL,
  `roomno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `casualty`
--

DROP TABLE IF EXISTS `casualty`;
CREATE TABLE IF NOT EXISTS `casualty` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deletetable`
--

DROP TABLE IF EXISTS `deletetable`;
CREATE TABLE IF NOT EXISTS `deletetable` (
  `id` varchar(10) NOT NULL,
  `indate` date NOT NULL,
  `outdate` date NOT NULL,
  `department` varchar(25) NOT NULL,
  `count` int(30) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletetable`
--

INSERT INTO `deletetable` (`id`, `indate`, `outdate`, `department`, `count`, `rate`) VALUES
('N20211', '2021-01-19', '2021-01-20', 'Casualty', 1, 2000),
('N20211', '2021-01-22', '2021-01-23', 'ICU', 1, 2000),
('N20211', '2021-01-30', '2021-01-23', 'Casualty', 7, 14000),
('N20212', '2021-01-20', '2021-01-28', 'ICU', 8, 16000),
('N20213', '2021-01-20', '2021-01-23', 'ICU', 3, 6000),
('N20213', '2021-01-27', '2021-02-06', 'Casualty', 10, 20000),
('N20200002', '2021-03-27', '2021-04-11', 'ICU', 15, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
CREATE TABLE IF NOT EXISTS `general` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groom`
--

DROP TABLE IF EXISTS `groom`;
CREATE TABLE IF NOT EXISTS `groom` (
  `id` varchar(10) NOT NULL,
  `roomno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `icu`
--

DROP TABLE IF EXISTS `icu`;
CREATE TABLE IF NOT EXISTS `icu` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `icuroom`
--

DROP TABLE IF EXISTS `icuroom`;
CREATE TABLE IF NOT EXISTS `icuroom` (
  `id` varchar(10) NOT NULL,
  `roomno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientreg`
--

DROP TABLE IF EXISTS `patientreg`;
CREATE TABLE IF NOT EXISTS `patientreg` (
  `id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `age` varchar(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `address` varchar(205) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `dateofad` date NOT NULL,
  `doctor` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientreg`
--

INSERT INTO `patientreg` (`id`, `name`, `age`, `sex`, `bloodgroup`, `address`, `contactno`, `dateofad`, `doctor`) VALUES
('00889', 'Tresa', '56', 'female', 'o+', 'kejhedk', '8585858585', '2021-08-12', 'Dr.David S Albert');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `department`, `shift`) VALUES
('icu001', 'Rakesh', 'Icu', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `totalroom`
--

DROP TABLE IF EXISTS `totalroom`;
CREATE TABLE IF NOT EXISTS `totalroom` (
  `roomno1` int(4) NOT NULL,
  `section` varchar(25) NOT NULL,
  PRIMARY KEY (`roomno1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalroom`
--

INSERT INTO `totalroom` (`roomno1`, `section`) VALUES
(100, 'GENERALROOM'),
(101, 'GENERALROOM'),
(102, 'GENERALROOM'),
(103, 'GENERALROOM'),
(104, 'GENERALROOM'),
(105, 'GENERALROOM'),
(106, 'GENERALROOM'),
(107, 'GENERALROOM'),
(108, 'GENERALROOM'),
(109, 'GENERALROOM'),
(110, 'GENERALROOM'),
(200, 'ICU BED'),
(201, 'ICU BED'),
(202, 'ICU BED'),
(203, 'ICU BED'),
(204, 'ICU BED'),
(205, 'ICU BED'),
(206, 'ICU BED'),
(207, 'ICU BED'),
(208, 'ICU BED'),
(209, 'ICU BED'),
(210, 'ICU BED'),
(300, 'VIP'),
(301, 'VIP'),
(302, 'VIP'),
(303, 'VIP'),
(304, 'VIP'),
(305, 'VIP'),
(306, 'VIP'),
(307, 'VIP'),
(308, 'VIP'),
(309, 'VIP'),
(310, 'VIP'),
(400, 'WARD BED'),
(401, 'WARD BED'),
(402, 'WARD BED'),
(403, 'WARD BED'),
(404, 'WARD BED'),
(405, 'WARD BED'),
(406, 'WARD BED'),
(407, 'WARD BED'),
(408, 'WARD BED'),
(409, 'WARD BED'),
(410, 'WARD BED'),
(500, 'CASUALTY BED'),
(501, 'CASUALTY BED'),
(502, 'CASUALTY BED'),
(503, 'CASUALTY BED'),
(504, 'CASUALTY BED'),
(505, 'CASUALTY BED'),
(506, 'CASUALTY BED'),
(507, 'CASUALTY BED'),
(508, 'CASUALTY BED'),
(509, 'CASUALTY BED'),
(510, 'CASUALTY BED');

-- --------------------------------------------------------

--
-- Table structure for table `vip`
--

DROP TABLE IF EXISTS `vip`;
CREATE TABLE IF NOT EXISTS `vip` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vroom`
--

DROP TABLE IF EXISTS `vroom`;
CREATE TABLE IF NOT EXISTS `vroom` (
  `id` varchar(10) NOT NULL,
  `roomno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wroom`
--

DROP TABLE IF EXISTS `wroom`;
CREATE TABLE IF NOT EXISTS `wroom` (
  `id` varchar(10) NOT NULL,
  `roomno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
