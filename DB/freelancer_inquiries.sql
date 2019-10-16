-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 06:40 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheresert`
--

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_inquiries`
--

CREATE TABLE `freelancer_inquiries` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ContactNumber` varchar(30) NOT NULL,
  `ContactPreference` varchar(50) NOT NULL,
  `Comment` varchar(1000) NOT NULL,
  `PostDate` date NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer_inquiries`
--

INSERT INTO `freelancer_inquiries` (`ID`, `UserID`, `FirstName`, `LastName`, `Email`, `City`, `ContactNumber`, `ContactPreference`, `Comment`, `PostDate`, `Status`) VALUES
(1, 1, 'Rajesh', 'Panchal', 'rajeshp22@gmail.com', 'Mumbai', '9820098200', 'PhoneCall,SMS/Whatsapp,Email', 'Hello+world', '2019-09-07', 'Read'),
(2, 1, 'Rasesh', 'Panchal', 'raseshpanchal@gmail.com', 'Dubai', '9840098400', 'PhoneCall', 'This+is+a+sample+short+note', '2019-09-07', 'Read'),
(3, 1, 'Rasesh', 'Panchal', 'raseshpanchal@gmail.com', 'Dubai', '9840098400', 'SMS/Whatsapp', 'This+is+a+sample+short+note+again....', '2019-09-10', 'Read'),
(4, 2, 'Rajesh', 'Panchal', 'raseshpanchal@gmail.com', 'Mumbai', '9840098400', 'PhoneCall,SMS/Whatsapp,Email', 'Please+contact+me+as+I+need+robotic+work+to+be+done.+Thanks+in+advance%21', '2019-09-09', 'New'),
(5, 2, 'Ashish', 'Yadav', 'ashish@gmail.com', 'Mumbai', '9860098600', 'PhoneCall,SMS/Whatsapp,Email', 'Hello+world', '2019-09-09', 'New'),
(6, 3, 'Niraj', 'Singh', 'niraj@gmail.com', 'Dubai', '9880098800', 'PhoneCall,SMS/Whatsapp,Email', 'Please+get+in+touch', '2019-09-09', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `freelancer_inquiries`
--
ALTER TABLE `freelancer_inquiries`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `freelancer_inquiries`
--
ALTER TABLE `freelancer_inquiries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
