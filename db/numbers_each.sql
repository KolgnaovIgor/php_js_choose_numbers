-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2020 at 08:57 AM
-- Server version: 8.0.15
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numbers_each`
--

-- --------------------------------------------------------

--
-- Table structure for table `numbers_one`
--

CREATE TABLE `numbers_one` (
  `id` int(11) NOT NULL COMMENT 'id record',
  `numbers` int(11) NOT NULL COMMENT 'just a number',
  `status` int(11) NOT NULL COMMENT 'true or false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table of numbers';

--
-- Dumping data for table `numbers_one`
--

INSERT INTO `numbers_one` (`id`, `numbers`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 4, 0),
(4, 8, 0),
(5, 16, 0),
(6, 32, 0),
(7, 64, 0),
(8, 128, 0),
(9, 256, 0),
(10, 512, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `numbers_one`
--
ALTER TABLE `numbers_one`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `numbers_one`
--
ALTER TABLE `numbers_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id record', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
