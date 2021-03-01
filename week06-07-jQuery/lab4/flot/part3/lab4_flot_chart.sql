-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2021 at 07:49 PM
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
-- Table structure for table `lab4_flot_chart`
--

CREATE TABLE `lab4_flot_chart` (
  `continent` varchar(50) NOT NULL,
  `1980` int(11) NOT NULL,
  `1985` int(11) NOT NULL,
  `1990` int(11) NOT NULL,
  `1995` int(11) NOT NULL,
  `2000` int(11) NOT NULL,
  `2005` int(11) NOT NULL,
  `2010` int(11) NOT NULL,
  `2015` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab4_flot_chart`
--

INSERT INTO `lab4_flot_chart` (`continent`, `1980`, `1985`, `1990`, `1995`, `2000`, `2005`, `2010`, `2015`, `id`) VALUES
('africa', 6690227, 7679105, 8784645, 9837908, 11585292, 13641392, 16638514, 19190960, 14),
('asia', 28631238, 38462755, 50906402, 78816162, 91355271, 105525086, 123059207, 138862910, 15),
('central america', 3034816, 3493587, 3450666, 4599779, 5439824, 6518106, 7277302, 8082082, 16),
('europe', 54539984, 58398473, 63889889, 52847252, 51304731, 51877895, 56592024, 61009213, 17),
('north america', 27012485, 28594181, 31431428, 36589715, 41566208, 44338523, 46394123, 47727080, 18),
('oceania', 4030005, 4055644, 4499961, 4945571, 5402334, 5801092, 5876334, 6952170, 19),
('south america', 12153924, 13063466, 15674533, 20982346, 25849187, 31675624, 37629517, 42414233, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab4_flot_chart`
--
ALTER TABLE `lab4_flot_chart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab4_flot_chart`
--
ALTER TABLE `lab4_flot_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
