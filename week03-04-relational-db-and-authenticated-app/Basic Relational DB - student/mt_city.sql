-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 02:10 PM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `philr_prep`
--

-- --------------------------------------------------------

--
-- Table structure for table `mt_city`
--

CREATE TABLE IF NOT EXISTS `mt_city` (
  `cityname` varchar(50) NOT NULL,
  `population` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mt_city`
--

INSERT INTO `mt_city` (`cityname`, `population`, `country`, `city_id`) VALUES
('London', 8000000, 'U.K.', 1),
('Edmonton', 800000, 'Canada', 2),
('Rocky Mountain House', 7000, 'Canada', 3),
('Toronto', 2500000, 'Canada', 4),
('Vulcan', 1800, 'Canada', 5),
('Dundee', 150000, 'U.K.', 6),
('Venice', 270000, 'Italy', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
