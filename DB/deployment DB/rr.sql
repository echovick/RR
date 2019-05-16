-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 06:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'gabe', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `fpwrd`
--

CREATE TABLE `fpwrd` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

CREATE TABLE `payers` (
  `ID` int(11) NOT NULL COMMENT ''' ''',
  `userID` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `paid` int(11) NOT NULL,
  `recieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sec_qa`
--

CREATE TABLE `sec_qa` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ques` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec_qa`
--

INSERT INTO `sec_qa` (`id`, `email`, `phone`, `ques`, `answer`) VALUES
(1, 'gabrielibenye@gmail.com', '', 'Whats my name', 'its me'),
(3, 'bienmoses@gmail.com', '08124079283', 'What street did u live in', 'Rumuagholu');

-- --------------------------------------------------------

--
-- Table structure for table `transac`
--

CREATE TABLE `transac` (
  `ID` int(11) NOT NULL,
  `transacID` int(11) NOT NULL,
  `payer` varchar(300) NOT NULL,
  `recipient` varchar(300) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `merge_date` varchar(300) NOT NULL,
  `recieve_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ID` int(11) NOT NULL COMMENT ' ',
  `username` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `refeerer` varchar(300) NOT NULL,
  `bankname` varchar(225) NOT NULL,
  `accntno` varchar(225) NOT NULL,
  `accnttype` varchar(225) NOT NULL,
  `accntname` varchar(225) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fpwrd`
--
ALTER TABLE `fpwrd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payers`
--
ALTER TABLE `payers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sec_qa`
--
ALTER TABLE `sec_qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transac`
--
ALTER TABLE `transac`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fpwrd`
--
ALTER TABLE `fpwrd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT ''' ''', AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sec_qa`
--
ALTER TABLE `sec_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ', AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
