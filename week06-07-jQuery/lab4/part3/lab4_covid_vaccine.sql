-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2021 at 05:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adomingo4_dmit2503`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab4_covid_vaccine`
--

CREATE TABLE `lab4_covid_vaccine` (
  `province` varchar(50) NOT NULL,
  `feb17,2021` int(11) NOT NULL,
  `feb18,2021` int(11) NOT NULL,
  `feb19,2021` int(11) NOT NULL,
  `feb22,2021` int(11) NOT NULL,
  `feb23,2021` int(11) NOT NULL,
  `feb24,2021` int(11) NOT NULL,
  `feb25,2021` int(11) NOT NULL,
  `feb26,2021` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab4_covid_vaccine`
--

INSERT INTO `lab4_covid_vaccine` (`province`, `feb17,2021`, `feb18,2021`, `feb19,2021`, `feb22,2021`, `feb23,2021`, `feb24,2021`, `feb25,2021`, `feb26,2021`, `id`) VALUES
('alberta', 152056, 155532, 160423, 173539, 180755, 186572, 195572, 207300, 1),
('british columbia', 176015, 180691, 192942, 218726, 224354, 230875, 239883, 252373, 2),
('manitoba', 56707, 57702, 58974, 62365, 63970, 66372, 69060, 71469, 3),
('new brunswick', 21182, 21182, 21182, 26317, 26317, 26317, 26317, 26317, 4),
('newfoundland and labrador', 16458, 16458, 16458, 16458, 16458, 20285, 20285, 20285, 5),
('northwest territories', 14157, 14157, 14157, 14157, 16454, 16454, 16454, 16454, 6),
('nova scotia', 24049, 25032, 25032, 27521, 27966, 29237, 30748, 32019, 7),
('nunavut', 8632, 8632, 8632, 11084, 11084, 11084, 11084, 11084, 8),
('ontario', 489484, 501867, 518834, 569455, 585707, 602848, 621960, 643765, 9),
('prince edward island', 10610, 10691, 10691, 10691, 11630, 11630, 12176, 12176, 10),
('quebec', 299673, 302118, 311651, 353894, 365978, 376910, 387076, 400538, 11),
('saskatchewan', 50326, 50465, 53030, 61730, 62342, 63345, 65436, 69451, 12),
('yukon', 11514, 11544, 11850, 12173, 13423, 14364, 15174, 15174, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab4_covid_vaccine`
--
ALTER TABLE `lab4_covid_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab4_covid_vaccine`
--
ALTER TABLE `lab4_covid_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
