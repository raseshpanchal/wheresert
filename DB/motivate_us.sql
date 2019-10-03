-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 10:18 AM
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
-- Table structure for table `motivate_us`
--

CREATE TABLE `motivate_us` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `EmailMobile` varchar(50) NOT NULL,
  `UserCountry` varchar(50) NOT NULL,
  `UserComment` varchar(500) NOT NULL,
  `PostDate` date NOT NULL,
  `PostTime` time NOT NULL,
  `Publish` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motivate_us`
--

INSERT INTO `motivate_us` (`ID`, `UserName`, `EmailMobile`, `UserCountry`, `UserComment`, `PostDate`, `PostTime`, `Publish`) VALUES
(1, 'Rajesh Panchal', '9820937938', '', 'Wonderful+website.+Keep+it+up%21', '2019-10-03', '12:50:32', 'Yes'),
(2, 'Ashish Yadav', '9820098200', '', 'Hello+World', '2019-10-03', '13:45:30', 'Yes'),
(3, 'Deepak Nishad', 'deepak@gmail.com', '', 'Hello+1234', '2019-10-03', '13:47:15', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motivate_us`
--
ALTER TABLE `motivate_us`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motivate_us`
--
ALTER TABLE `motivate_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
