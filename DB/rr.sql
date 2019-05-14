-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 02:13 AM
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

--
-- Dumping data for table `payers`
--

INSERT INTO `payers` (`ID`, `userID`, `amount`, `username`, `date`, `time`, `paid`, `recieved`) VALUES
(8, '31', '20000', 'Blessy', '2019-05-09', '08:37:15pm', 0, 0),
(9, '29', '5000', 'Godwin', '2019-05-09', '08:57:54pm', 0, 0),
(10, '34', '5000', 'Jendor', '2019-05-10', '06:33:00am', 0, 0),
(11, '35', '2000', 'unlimited', '2019-05-10', '07:19:57am', 0, 0),
(12, '48', '2000', 'Clifford Favour', '2019-05-10', '09:08:56pm', 1, 0),
(13, '36', '2000', 'OSUNUKPO', '2019-05-11', '03:23:33am', 0, 0);

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

--
-- Dumping data for table `transac`
--

INSERT INTO `transac` (`ID`, `transacID`, `payer`, `recipient`, `amount`, `status`, `merge_date`, `recieve_date`) VALUES
(1, 1405190, 'gabe', 'danny', 2000, 'pending', '2019-05-14', '2019-05-17');

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
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `username`, `password`, `email`, `phone_no`, `refeerer`, `bankname`, `accntno`, `accnttype`, `accntname`, `fee`) VALUES
(28, 'Chizzy', 'adc5e79a002be7643e5fa0a60f112914', 'baggy@gmail.com', '08142368898', '', 'GTBank', '022020202', 'Savings', 'Chizzy', 0),
(29, 'Ernest', '66f4554054f7be6d27f2f9bc9b5916c2', 'chukwugolumonyeka@gmail.com', '07065304968', '', 'Zenith bank', '2209173952', 'Savings', 'Ernest Onyedika', 1),
(30, 'Winners', 'adc083c41abf5bc35f5c93fc46499e37', 'talk2doosh@gmail.com', '08073651715', '', 'GTB', '0027682167', 'Savings', 'Dooshima Ann ager', 1),
(31, 'Blessy', '96b4341e37c94dbdb9a1468d675bb822', 'ihechidinma4u93@gmail.com', '08033282593', '', 'Diamond bank', '0096672043', 'Savings', 'Chidinma .B.', 1),
(32, 'Rozzae', 'adc5e79a002be7643e5fa0a60f112914', 'uchechukwueze70@gmail.com', '08131117279', '', 'Gtbank', '0221239485', 'Savings', 'EZE VICTOR UCHECHUKWU', 1),
(33, 'Prosper', 'd54d1702ad0f8326224b817c796763c9', 'prosper@gmail.com', '08156321845', '', 'diamond bank', '0081785750', 'Savings', 'Chukwugolum onyeka', 1),
(34, 'Jendor', 'a6e75ad6b5d9665e54f79d5be1acb85f', 'sasherebayode@gmail.com', '07062996870', '', 'First Bank PLC', '3107970119', 'Savings', 'Sashere Olajide', 1),
(35, 'unlimited', '958f470d0b1c8fb2b9e62b48e8903299', 'adebimpeosinuga@gmail.com', '08098247995', '', 'Guaranty Trust Bank', '0029638106', 'Savings', 'Sotubo Temiloluwa', 1),
(36, 'OSUNUKPO', '2dcd637cb55f0c125c21d284fc2f8876', 'osunukposam@gmail.com', '08036969159', '', 'Savings', '2036072835', '', 'OSUNUKPO SAMSON', 1),
(37, 'Nice', '95642e9083fb566dfe3a090857a5f9cf', 'btlesh2019@gmail.com', '09032724394', '', 'Diamond bank', '0073156205', 'Savings', 'Clifford', 1),
(44, 'Bernard', '63f4d2b20bebbd56d037049d0b71b217', 'bernard@gmail.com', '08159141372', '', 'diamond bank', '0081785750', 'Savings', 'Chukwugolum onyeka', 0),
(45, 'Soxy', '32dcfca75cad1728d041f12f2271d99e', 'sodbabe@gmail.com', '09075632112', '', 'Fcmb', '5464783017', 'Savings', 'Sonari ngoye', 1),
(46, 'Fine', '4af583baad7bfcfc009afb3feffbc005', 'opestar6@gmail.com', '08033156611', 'Soxy', 'Zenithbank', '1000800775', 'Current', 'Herietta Uzoh', 1),
(48, 'Clifford Favour', 'fcf326e20a7b2b4d5d5323c5ada79856', 'Cliffordfavour006@gmail.com', '08067665872', '', 'GTBank', '0431070330', 'Savings', 'Chukwugolum Favour Uzoma', 1),
(50, 'gabe', '5f4dcc3b5aa765d61d8327deb882cf99', 'gabrielibenye@gmail.com', '+2348142368898', '', 'Fidelity', '6080266119', 'savings', 'Gabriel Ibenye', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT ''' ''', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sec_qa`
--
ALTER TABLE `sec_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ', AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
