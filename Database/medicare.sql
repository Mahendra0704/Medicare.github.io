-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 09:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `number`, `address`, `image_path`, `longitude`, `latitude`) VALUES
(1, 'Anurag singh kushvaha', 10, 'satna', '', 0.000000, 0.000000),
(2, 'Anurag singh kushvaha', 10, 'Pateri', '', 81.629639, 21.251385),
(3, 'Anurag singh kushvaha', 10, 'satna', 'images/63e8ac058a48bpng', 81.629639, 21.251385),
(4, 'Anurag singh kushvaha', 10, 'satna', 'images/63e900d87ca61jpg', 0.000000, 0.000000),
(5, 'Anurag singh kushvaha', 10, 'satna', 'images/63e9044f39ad0jpg', 81.629639, 21.251385),
(6, 'Anurag singh kushvaha', 10, 'satna', 'images/63e905f442f70jpg', 81.629639, 21.251385),
(7, 'Dhiru', 10, 'satna', 'images/63e9fb408189ejpg', 81.629639, 21.251385);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(110) NOT NULL,
  `pass` int(10) NOT NULL,
  `rpass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `address`, `pass`, `rpass`) VALUES
(19, 'Anurag singh kushvahar', 'rahulanuragsingh@gmail.com', 'Pateri', 12345678, 12345678);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
