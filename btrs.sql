-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 09:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `buscounters`
--

CREATE TABLE `buscounters` (
  `bcid` int(11) NOT NULL,
  `counterName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `busses`
--

CREATE TABLE `busses` (
  `bid` int(11) NOT NULL,
  `busName` varchar(50) NOT NULL,
  `busNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sid` int(11) NOT NULL,
  `date` date NOT NULL,
  `bid` int(11) NOT NULL,
  `startCounter` int(11) NOT NULL,
  `destinationCounter` int(11) NOT NULL,
  `startTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `userTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buscounters`
--
ALTER TABLE `buscounters`
  ADD PRIMARY KEY (`bcid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `busses`
--
ALTER TABLE `busses`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `fK_1` (`startCounter`),
  ADD KEY `fk_2` (`destinationCounter`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buscounters`
--
ALTER TABLE `buscounters`
  MODIFY `bcid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `busses`
--
ALTER TABLE `busses`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buscounters`
--
ALTER TABLE `buscounters`
  ADD CONSTRAINT `buscounters_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `fK_1` FOREIGN KEY (`startCounter`) REFERENCES `buscounters` (`bcid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`destinationCounter`) REFERENCES `buscounters` (`bcid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `busses` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
