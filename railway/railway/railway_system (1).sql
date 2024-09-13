-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 06:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `PID` int(25) NOT NULL,
  `FNAME` varchar(25) NOT NULL,
  `LNAME` varchar(25) NOT NULL,
  `AGE` int(25) NOT NULL,
  `GENDER` varchar(25) NOT NULL,
  `CONTACT` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PID`, `FNAME`, `LNAME`, `AGE`, `GENDER`, `CONTACT`) VALUES
(1, '', '', 0, 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `email` varchar(255) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`email`, `pass`) VALUES
('dfsafsdfasd@gmail.com', '6786786'),
('dfsafsdffasd@gmail.com', '6786786');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sid` int(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sid`, `s_name`, `location`) VALUES
(5585, 'dhirasrom', 'janina'),
(8888, 'bnbb', 'uuuuu');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tkid` int(255) NOT NULL,
  `PID` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `seat_n` varchar(255) NOT NULL,
  `booking_d` date NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `sta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`tkid`, `PID`, `tid`, `seat_n`, `booking_d`, `Dept`, `sta`) VALUES
(555, 22303286, 55, '87y', '2024-04-17', '', ''),
(5555558, 9999999, 9999999, '55555', '2024-04-03', 'kjnkj', 'mgfnh');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `tid` int(255) NOT NULL,
  `d_station` varchar(255) NOT NULL,
  `a_station` varchar(255) NOT NULL,
  `a_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`tid`, `d_station`, `a_station`, `a_time`) VALUES
(1, '1', '1', '10:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tkid`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
