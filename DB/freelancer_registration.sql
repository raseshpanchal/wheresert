-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 09:05 AM
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
-- Table structure for table `freelancer_registration`
--

CREATE TABLE `freelancer_registration` (
  `ID` int(11) NOT NULL,
  `FUID` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ProfilePic` varchar(100) NOT NULL,
  `Code` varchar(10) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `ContactMobile` varchar(50) NOT NULL,
  `ContactEmail` varchar(50) NOT NULL,
  `BusinessTitle` varchar(100) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Description` longtext NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreateDate` date NOT NULL,
  `CreateTime` time NOT NULL,
  `PaidPhoto` varchar(10) NOT NULL,
  `PaidBanners` varchar(10) NOT NULL,
  `PaidListing` varchar(3) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer_registration`
--

INSERT INTO `freelancer_registration` (`ID`, `FUID`, `FirstName`, `LastName`, `ProfilePic`, `Code`, `Mobile`, `EmailID`, `ContactMobile`, `ContactEmail`, `BusinessTitle`, `Designation`, `Address`, `DOB`, `Gender`, `Description`, `City`, `State`, `Country`, `ZipCode`, `Password`, `CreateDate`, `CreateTime`, `PaidPhoto`, `PaidBanners`, `PaidListing`, `Status`) VALUES
(1, '', 'Rajesh', 'Panchal', '1571035777_9820098200.jpg', '', '9820098200', 'rajeshp22@gmail.com', '9870098700', 'thisismyemail@gmail.com', 'IT Studio 22', 'Fashion Designer', 'Malbaar Hills', '22/08/1940', 'Male', 'Indonesia is in a very active seismic zone, also, but by virtue of its larger size than Japan, it has more total earthquakes. Which country has the most earthquakes per unit area? This would probably be Tonga, Fiji, or Indonesia since they are all in extremely active seismic areas along subduction zones.', 'Dubai', 'Dubai', 'UAE', '400026', '12345', '2019-06-29', '16:20:30', 'No', 'No', 'No', 'Active'),
(2, '', 'Hassan', 'Alkahily', '559533016_1568013292.png', '+971', '559533016', 'ha@gmail.com', '', '', 'Yearex General Trading LLC', '', '', '09/04/2003', 'Male', 'Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%27s+standard+dummy+text+ever+since+the+1500s', 'Dubai', '', '', '', '12345', '2019-09-04', '14:46:01', 'No', 'No', 'No', 'Active'),
(3, '', 'Mostafa', 'Awwad', '5554545_1568034474.png', '+971', '5554545', '', '', '', 'Silverline Technologies', '', '', '09/01/2003', 'Male', 'Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%27s+standard+dummy+text+ever+since+the+1500s', 'Dubai', 'Dubai', 'UAE', '', '12345', '2019-09-09', '18:33:45', 'No', 'No', 'No', 'Active'),
(4, '', 'Mariyam', 'Qaiser', '9890098900_1568116467.png', '+971', '9890098900', '', '', '', 'Yearex', '', '', '09/10/2003', 'Female', 'This+is+something+about+me...', 'Dubai', 'Dubai', 'UAE', '00000', '12345', '2019-09-10', '17:23:24', 'No', 'No', 'No', 'Active'),
(5, '', 'Tapodnya', 'Panchal', '1571038161_9830098300.jpg', '', '9830098300', '', '9830098300', 'tapodnya@gmail.com', '', '', '', '13/10/2003', 'Male', 'This+is+Tapodnya+Panchal+basically+from+Mumbai+but+now+resides+in+Dubai+since+1910.', 'Dubai', 'Dubai', '', '', '12345', '2019-10-14', '12:55:47', 'No', 'No', 'No', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `freelancer_registration`
--
ALTER TABLE `freelancer_registration`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `freelancer_registration`
--
ALTER TABLE `freelancer_registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
