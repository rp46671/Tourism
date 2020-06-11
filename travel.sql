-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 09:35 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(3) NOT NULL,
  `userid` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` double NOT NULL,
  `packid` int(5) NOT NULL,
  `depature_date` date NOT NULL,
  `starting_location` varchar(19) NOT NULL,
  `traveller` int(2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `userid`, `Name`, `Contact`, `packid`, `depature_date`, `starting_location`, `traveller`, `status`) VALUES
(114, 2, 'à¤ªà¥à¤°à¤£à¤¯ à¤¸à¤¿à¤‚à¤¹ à', 8194020608, 73, '2019-05-30', 'Haldwani', 2, 'Confirmed'),
(115, 2, 'à¤ªà¥à¤°à¤£à¤¯ à¤¸à¤¿à¤‚à¤¹ à', 8194020608, 72, '2019-06-08', 'haldwani', 1, 'Cancelled'),
(116, 2, 'Bhanu Pratap Singh Negi', 9719510253, 81, '2019-05-31', 'Haldwani', 2, 'Cancelled'),
(117, 2, 'q', 8194020608, 81, '2019-07-19', 'Haldwani', 2, 'Confirmed'),
(118, 17, 'Dene', 9410715327, 81, '2020-07-16', 'Haldwani', 5, 'Confirmed'),
(119, 2, 'baba', 4747474747, 83, '2020-06-27', 'delhui', 2, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `Enquiryid` int(50) NOT NULL,
  `Packageid` int(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `Name` varchar(200) NOT NULL,
  `Mobileno` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(900) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`Enquiryid`, `Packageid`, `userid`, `Name`, `Mobileno`, `Email`, `Message`, `Status`) VALUES
(13, NULL, NULL, '578575', '2421554545', '4454@2121', 'zaxax', 0),
(14, NULL, NULL, 'PRANAY SINGH NEGI', '1194020608', 'negipranaysingh@gmail.com', 'szs', 1),
(15, 81, 2, '', '1234567890', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Packid` int(200) NOT NULL,
  `packname` varchar(100) NOT NULL,
  `days` int(2) NOT NULL,
  `Packprice` int(200) NOT NULL,
  `Pic1` varchar(200) NOT NULL,
  `slider` varchar(8000) NOT NULL,
  `Detail` varchar(8000) NOT NULL,
  `Departure` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Packid`, `packname`, `days`, `Packprice`, `Pic1`, `slider`, `Detail`, `Departure`) VALUES
(72, 'leh & Laddakh', 6, 400, 'IMG_20170702_184704_1.jpg', 'FB_IMG_1518494086246.jpg | FB_IMG_1522681849247.jpg | FB_IMG_1518494086246.jpg | FB_IMG_1522681849247.jpg | FB_IMG_1522681854652.jpg | FB_IMG_1518494086246.jpg | FB_IMG_1518494086246.jpg | FB_IMG_1522681849247.jpg | FB_IMG_1518494086246.jpg | FB_IMG_1522681849247.jpg | FB_IMG_1522681854652.jpg', '', 'Delhi, haldwani'),
(73, 'agartala', 5, 4000, 'IMG_20181027_140050.jpg', 'IMG_20181027_114737.jpg | IMG_20181027_114737.jpg | IMG_20181027_140050.jpg', '', 'Haldwani, Kathgodam'),
(81, 'Haridwar', 3, 653, 'IMG_20190206_064313.jpg', 'IMG_20190113_044058.jpg | IMG_20190113_195229-EFFECTS.jpg | IMG_20190113_195238.jpg | IMG_20190113_195238-EFFECTS.jpg', '', 'Haldwani, Kathgodam, Nainital'),
(82, 'bikaner', 2, 221, 'IMG_20190206_142003.jpg', 'IMG_20190206_142000.jpg | IMG_20190206_142003.jpg | IMG_20190206_142020.jpg | IMG_20190206_142411.jpg | IMG_20190206_142446.jpg | IMG_20190206_142455.jpg', '', 'Haldwani, Kathgodam'),
(83, 'bengaluru', 2, 420, 'IMG_20160608_190813_1.jpg', 'IMG_20160603_174137_1 (1).jpg | IMG_20160603_175755_1.jpg | IMG_20160606_184533_1 (1).jpg | IMG_20160603_174137_1 (1).jpg | IMG_20160603_174137_1 (1).jpg | IMG_20160603_174137_1.jpg | IMG_20160603_174137_1 (1).jpg | IMG_20160603_174137_1.jpg | IMG_20160603_174148_1 (1).jpg', '', 'Kolkata, delhi, haldwani');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `sn` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`sn`, `name`, `username`, `password`, `email`, `contact`, `active`, `admin`) VALUES
(1, 'PRANAY SINGH NEGI', 'ps121', '12345', 'sabhya.ps@outlook.com', '9410564405', 1, 0),
(2, 'Pranay Singh Negi', 'prny', 'qwerty', 'negipranaysingh@gmail.com', '4784585', 1, 1),
(3, 'gaurav pant', 'aadeez', '123456', 'aadeez@gmail.com', '', 1, 0),
(16, 'aaasss', 'ps121sasasasa', 'sasass2', 'negipranaysingh@gmail.comsasas', '9876543215', 1, 0),
(17, 'dene', 'dene1', '12345', 'dene@dene', '1234567890', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD UNIQUE KEY `bookingid` (`bookingid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `packid` (`packid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`Enquiryid`),
  ADD KEY `Packageid` (`Packageid`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Packid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `Enquiryid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Packid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `sn` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_info` (`sn`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`packid`) REFERENCES `package` (`Packid`);

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_info` (`sn`),
  ADD CONSTRAINT `enquiry_ibfk_2` FOREIGN KEY (`Packageid`) REFERENCES `package` (`Packid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
