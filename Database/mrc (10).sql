-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2019 at 10:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `pid`) VALUES
(0, 'Country', 1),
(1, 'Egypt', 0),
(2, 'Cairo', 1),
(4, 'Alex', 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(255) NOT NULL,
  `linkname` varchar(255) NOT NULL,
  `physicallink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `linkname`, `physicallink`) VALUES
(1, 'RESERVATION', 'reservation.php'),
(2, 'ADMIN PANEL', 'adminPanel.php');

-- --------------------------------------------------------

--
-- Table structure for table `radiology`
--

CREATE TABLE `radiology` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiology`
--

INSERT INTO `radiology` (`ID`, `Name`, `price`) VALUES
(1, 'PET', 300),
(2, 'CT', 200);

-- --------------------------------------------------------

--
-- Table structure for table `reservationdetails`
--

CREATE TABLE `reservationdetails` (
  `ID` int(255) NOT NULL,
  `ReserveID` int(255) NOT NULL,
  `RadiologyID` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationdetails`
--

INSERT INTO `reservationdetails` (`ID`, `ReserveID`, `RadiologyID`, `quantity`) VALUES
(2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `ID` int(255) NOT NULL,
  `PatientID` int(255) NOT NULL,
  `DoctorID` int(255) NOT NULL,
  `Date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ID`, `PatientID`, `DoctorID`, `Date`) VALUES
(3, 1, 5, '2018-10-23 20:40:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `socialnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertypeid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `addressid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `socialnumber`, `password`, `usertypeid`, `username`, `dob`, `addressid`) VALUES
(1, 'Mohamed', 'Radrod', 'reda@reda.com', '123456789', '123', 2, 'Mreda', '1998-09-23', 2),
(2, 'Sherif', 'Nayad', 'reda@reda.com', '987654321', 'admin', 1, 'admin', '1998-10-25', 2),
(3, 'Omar', 'Anas', 'Email@email.com', '123431', 'omar', 2, 'oanas', '1997-11-29', 2),
(4, 'Alley', 'Dorry', 'Email@email.com', '748394827', '123', 2, 'Dorry3', '1997-09-22', 2),
(5, 'Mohamed', 'Abo El Rejal', 'email@email.com', '134983', '123', 3, 'MA', '2010-02-13', 2),
(6, 'Ahmed', 'Reda', 'Email@email.com', '123431', '123', 2, 'areda', '1996-03-04', 2),
(7, 'Karim', 'Dorry', 'Email@email.com', '73894857481', '123', 2, 'kdorry', '2006-10-23', 4),
(8, 'Sherif', 'Dorry', 'email@email.com', '87654131', '123', 3, 'sdorry', '1992-01-01', 4),
(9, 'Karim', 'Karim', 'Email@email.com', '34565432', '123', 2, 'kdorry', '1987-02-03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `useroptions`
--

CREATE TABLE `useroptions` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useroptions`
--

INSERT INTO `useroptions` (`id`, `name`, `type`) VALUES
(1, 'working_hours', 'number'),
(2, 'Field', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `useropvalue`
--

CREATE TABLE `useropvalue` (
  `id` int(30) NOT NULL,
  `userTyOpId` int(30) NOT NULL,
  `userId` int(30) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useropvalue`
--

INSERT INTO `useropvalue` (`id`, `userTyOpId`, `userId`, `value`) VALUES
(1, 1, 5, '10'),
(4, 1, 8, '2'),
(5, 3, 8, 'gamd');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Patient'),
(3, 'doctor'),
(6, 'Janitor'),
(10, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `usertypelinks`
--

CREATE TABLE `usertypelinks` (
  `id` int(255) NOT NULL,
  `typeid` int(255) NOT NULL,
  `linkid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypelinks`
--

INSERT INTO `usertypelinks` (`id`, `typeid`, `linkid`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 1),
(4, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypeoptions`
--

CREATE TABLE `usertypeoptions` (
  `id` int(30) NOT NULL,
  `userTypeId` int(30) NOT NULL,
  `optionsId` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypeoptions`
--

INSERT INTO `usertypeoptions` (`id`, `userTypeId`, `optionsId`) VALUES
(1, 3, 1),
(3, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentid` (`pid`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiology`
--
ALTER TABLE `radiology`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RID` (`ReserveID`),
  ADD KEY `PID` (`RadiologyID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PID` (`PatientID`),
  ADD KEY `DID` (`DoctorID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressid` (`addressid`),
  ADD KEY `UTID` (`usertypeid`);

--
-- Indexes for table `useroptions`
--
ALTER TABLE `useroptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useropvalue`
--
ALTER TABLE `useropvalue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTyOpId` (`userTyOpId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LID` (`linkid`),
  ADD KEY `TID` (`typeid`);

--
-- Indexes for table `usertypeoptions`
--
ALTER TABLE `usertypeoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `optionsId` (`optionsId`),
  ADD KEY `userTypeId` (`userTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `useroptions`
--
ALTER TABLE `useroptions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useropvalue`
--
ALTER TABLE `useropvalue`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertypeoptions`
--
ALTER TABLE `usertypeoptions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD CONSTRAINT `reservationdetails_ibfk_1` FOREIGN KEY (`ReserveID`) REFERENCES `reserve` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationdetails_ibfk_2` FOREIGN KEY (`RadiologyID`) REFERENCES `radiology` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useropvalue`
--
ALTER TABLE `useropvalue`
  ADD CONSTRAINT `useropvalue_ibfk_1` FOREIGN KEY (`userTyOpId`) REFERENCES `usertypeoptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `useropvalue_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD CONSTRAINT `usertypelinks_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertypelinks_ibfk_2` FOREIGN KEY (`linkid`) REFERENCES `links` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertypeoptions`
--
ALTER TABLE `usertypeoptions`
  ADD CONSTRAINT `usertypeoptions_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertypeoptions_ibfk_2` FOREIGN KEY (`optionsId`) REFERENCES `useroptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
