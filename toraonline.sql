-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 03:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toraonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(0, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cid`, `fname`, `lname`, `gender`, `address`, `dob`, `email`, `position`, `date`) VALUES
(1, 'abdul', 'sibo', 'm', 'nyamasheke', '2023-12-31', 'abdul@gmail.com', 'p', '2024-01-09 18:54:03'),
(2, 'arine', 'kkkk', 'f', 'gatare', '2024-01-09', 'kjsd@gmail.com', 'v', '2024-01-10 07:10:20'),
(25, 'Cruise', 'Janvier', 'f', 'NYARUGENGE', '2024-01-10', 'keza@gmail.com', 'v', '2024-01-10 09:46:48'),
(26, 'eric', 'twese', 'm', 'nyamata', '2024-01-17', 'eruyt@gmail.com', 'p', '2024-01-12 12:51:18'),
(27, 'samuel', 'yene', 'f', 'nyamata', '2024-01-12', 'yene@gmail.com', 'p', '2024-01-12 12:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `empl_registration`
--

CREATE TABLE `empl_registration` (
  `Nid` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empl_registration`
--

INSERT INTO `empl_registration` (`Nid`, `firstname`, `lastname`, `dob`, `gender`, `position`, `email`, `password`, `date`) VALUES
(34859348, 'jkdf', 'fskd', 2024, 'Female', 'kjerklter', 'cruise@gmail.com', 'janvier2020', '2024-01-01 18:06:27'),
(84390573, 'odipfig', 'ksge', 2024, 'Female', 'kr;lkjter', 's@gmail.com', 'janvier20334', '2024-01-01 18:08:46'),
(2147483647, 'adbul', 'sibo', 2024, 'Female', 'empl', 'sibo@gmail.com', '0000', '2024-01-02 12:12:05'),
(2323, 'abelle', 'girbelt', 2024, 'Male', 'manager', 'abelle@gmail.com', '123', '2024-01-10 09:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `fname`, `email`, `subject`, `message`, `date`) VALUES
(1, '', 'sibo@gmail.com', 'hello', '', '2024-01-05 07:04:55'),
(2, '', 'sibo@gmail.com', 'hello', 'i would sakk\r\n', '2024-01-05 07:05:27'),
(5, '', 'eiou@gmial.com', 'hi', 'mabera yanyoko....', '2024-01-05 07:13:38'),
(6, '', 'sibo@gmail.com', 'hello', 'tssp\r\n', '2024-01-05 10:07:00'),
(7, '', 'sibo@gmail.com', 'hello', 'tssp\r\n', '2024-01-05 10:08:42'),
(8, '', 'sibo@gmail.com', 'hello', 'tssp\r\n', '2024-01-05 10:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `Nid` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `cid`, `Nid`, `position`, `date`) VALUES
(5, 0, 123, NULL, '2024-01-12'),
(6, 0, 0, NULL, '2024-01-12'),
(7, 0, 0, NULL, '2024-01-12'),
(8, 0, 0, NULL, '2024-01-12'),
(9, 0, 0, NULL, '2024-01-12'),
(10, 0, 0, NULL, '2024-01-12'),
(11, 26, 0, NULL, '2024-01-12'),
(13, 27, 0, NULL, '2024-01-12'),
(15, 27, 0, NULL, '2024-01-12'),
(18, 27, 0, NULL, '2024-01-12'),
(19, 27, 0, NULL, '2024-01-12'),
(20, 27, 0, NULL, '2024-01-12'),
(22, 27, 0, NULL, '2024-01-12'),
(23, 27, 0, NULL, '2024-01-12'),
(24, 27, 0, NULL, '2024-01-12'),
(25, 27, 0, NULL, '2024-01-12'),
(26, 27, 0, NULL, '2024-01-12'),
(27, 27, 0, NULL, '2024-01-12'),
(28, 27, 0, NULL, '2024-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
