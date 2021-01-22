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
-- Table structure for table `mt_person`
--

CREATE TABLE IF NOT EXISTS `mt_person` (
  `name` varchar(50) NOT NULL,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `birthcity` int(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mt_person`
--

INSERT INTO `mt_person` (`name`, `person_id`, `birthcity`, `occupation`) VALUES
('Phil', 1, 1, 'Web Developer'),
('Joe', 2, 2, 'Truck Driver'),
('Sandy', 3, 2, 'Cosmetologist'),
('Grant', 4, 2, 'Oil Worker'),
('Fawn', 5, 5, 'Accountant'),
('Christian', 6, 3, 'Web Designer'),
('Gerry', 7, 6, 'History Prof'),
('Anthony', 8, 4, 'Video Producer'),
('Luigi', 9, 7, 'Business Owner'),
('Nigella', 10, 1, 'TV Cooking Show Host');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
