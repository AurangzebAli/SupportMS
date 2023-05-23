-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 09:03 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supportms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpcinventory`
--

CREATE TABLE IF NOT EXISTS `tblpcinventory` (
`PCId` int(11) NOT NULL,
  `OfficerName` varchar(250) NOT NULL,
  `Wing` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `BrandName` varchar(250) NOT NULL,
  `MsOfficeOrOtherSoftware` varchar(250) NOT NULL,
  `LCD` varchar(250) NOT NULL,
  `Printer` varchar(250) NOT NULL,
  `Scanner` varchar(250) NOT NULL,
  `UPS` varchar(250) NOT NULL,
  `Network` varchar(250) NOT NULL,
  `IP` varchar(250) NOT NULL,
  `Designation` varchar(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpcinventory`
--

INSERT INTO `tblpcinventory` (`PCId`, `OfficerName`, `Wing`, `Description`, `BrandName`, `MsOfficeOrOtherSoftware`, `LCD`, `Printer`, `Scanner`, `UPS`, `Network`, `IP`, `Designation`, `Date`) VALUES
(1, 'Farhan Illahi', '', '2 systems', 'hp', 'All software working fine', 'hp lcd', 'm402dw', 'no scanner required', '2 ups', 'working fine', '132.146.2.2', '', '0000-00-00'),
(2, 'Farhan Illa', '2', '2 systems', 'hp', 'All software working fine', 'hp lcd', 'm402dw', 'no scanner required', '2 ups', 'working fine', '132.146.2.2', '', '2018-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tblproblem`
--

CREATE TABLE IF NOT EXISTS `tblproblem` (
`problemId` int(11) NOT NULL,
  `problemname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproblem`
--

INSERT INTO `tblproblem` (`problemId`, `problemname`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Network'),
(4, 'Printer'),
(5, 'NTC Telephone'),
(6, 'Intercom');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupport`
--

CREATE TABLE IF NOT EXISTS `tblsupport` (
`supportId` int(11) NOT NULL,
  `ROName` varchar(500) NOT NULL,
  `Wing` int(11) NOT NULL,
  `TelNumber` varchar(100) NOT NULL,
  `ExtNo` varchar(100) NOT NULL,
  `ProblemOccur` int(11) NOT NULL,
  `ProblemStatus` tinyint(1) NOT NULL,
  `RequestedDAte` date NOT NULL,
  `PrbDesc` text NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsupport`
--

INSERT INTO `tblsupport` (`supportId`, `ROName`, `Wing`, `TelNumber`, `ExtNo`, `ProblemOccur`, `ProblemStatus`, `RequestedDAte`, `PrbDesc`, `Remarks`) VALUES
(1, 'kamran jhanvri', 0, '03213213221', '149', 4, 1, '2017-08-03', 'descriot', ''),
(2, 'rajes', 0, '0321', '123', 3, 1, '2017-08-03', 'description', ''),
(3, 'Reasdfs', 2, '023455555', '1234', 2, 1, '2017-08-03', 'desc', ''),
(4, 'Farhan', 3, '931312', '234', 2, 1, '2017-08-03', 'koi masla ni', ''),
(5, 'zubai', 1, '03213', '123', 2, 1, '2017-08-03', 'desc', ''),
(6, 'Rehmat', 3, '9310066', '131', 4, 1, '2017-08-03', 'not working', ''),
(7, 'zuabir', 1, '0231', '123', 1, 1, '2017-08-03', 'descroptopm', 'Remardk'),
(8, 'rajjesh', 1, '31', '1234', 1, 1, '2017-08-03', 'desc', 'Resolved'),
(9, 'riaz', 9, '312231', '123', 3, 1, '2017-08-03', 'description', ''),
(10, 'ads', 1, '123456789', '123', 2, 1, '2017-08-03', 'desc', ''),
(11, 'checking', 2, '321', '123345', 2, 1, '2017-08-03', 'desctr', ''),
(12, 'Reasds', 3, '7653', 'cea', 2, 1, '2017-08-03', 'cription', ''),
(13, 'Ziya', 6, '122355', '121', 4, 1, '2017-08-03', 'network fault', 'reos'),
(14, 'faheem', 1, '1234444', '123345', 1, 0, '2017-08-03', 'desc', ''),
(15, 'qasim ', 1, '135', '123', 1, 1, '2017-08-03', 'desc', 'Problem Resolved'),
(16, 'ali', 1, '32145566', '123', 3, 1, '2017-08-03', 'print', 'Remarks'),
(17, 'aliiiii', 1, '123456', '121', 1, 1, '2017-08-03', 'description', 'Problem Resolved'),
(18, 'ofiic', 3, '1234', '3213', 2, 1, '2017-08-03', 'printer', 'Problem Resolved '),
(19, 'adf', 4, '123445', '121', 1, 1, '2017-08-03', 'des', 'Resolved'),
(20, 'ads', 1, 'a', '121', 1, 1, '2017-08-03', 's', 'Resolved'),
(21, 'adf', 1, '123445', '121', 2, 1, '2017-08-03', 'desc', 'Remardk'),
(22, 'aoof', 1, '1677', '1222', 1, 1, '2017-08-03', 'dse', 'e'),
(23, 'Farhan', 2, '777', '1234455', 1, 1, '2017-08-03', 'desc', 'Resolved'),
(24, 'vasi', 1, '6767', '432', 1, 1, '2017-08-03', 'desciptionss', 'desc'),
(25, 'data', 1, '312455', '12344', 1, 1, '2017-08-03', 'sasdfafdaf', 'Resolved'),
(26, 'Name', 1, '121', '312', 1, 1, '2017-08-03', 'problem', 'Desc'),
(27, 'Req', 1, '121', '321', 1, 1, '2017-08-03', 'prob', 'Resolved'),
(28, 'raza', 9, '312321', '131', 1, 0, '2017-09-20', 'hardware issue', ''),
(29, 'Requestion ', 1, '0321', '132', 1, 0, '2017-09-14', 'description', ''),
(30, 'zubair', 1, '12345566', '1321', 1, 0, '2017-09-14', 'issue', ''),
(31, 'office', 2, '678', '1321', 1, 0, '2017-09-14', 'desc', ''),
(32, 'reqe', 1, '1321', '131', 1, 0, '2017-09-14', 'issue', ''),
(33, 'hq', 0, '', '', 0, 0, '0000-00-00', '2 systems', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblwing`
--

CREATE TABLE IF NOT EXISTS `tblwing` (
`wingid` int(11) NOT NULL,
  `wingname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwing`
--

INSERT INTO `tblwing` (`wingid`, `wingname`) VALUES
(1, 'IW  -   Investigation wing'),
(2, 'PW  -   Prosecution wing'),
(3, 'I&S -   Intelligence & Security'),
(4, 'WHC -   Witness Handling Cell'),
(5, 'A&P -   Awareness and Prevention'),
(6, 'AD -    Admin '),
(7, 'EDRC'),
(8, 'B&A Budget and Account'),
(9, 'HQ - HEADQUARTER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`UserId` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` char(32) NOT NULL,
  `loggedin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`, `loggedin`) VALUES
(1, 'admin', 'c2e83ac5d65e1a0b19dc39d34cb5ffb4', 1),
(2, 'admin', 'a9c1df460744049bb7543818335257ab', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpcinventory`
--
ALTER TABLE `tblpcinventory`
 ADD PRIMARY KEY (`PCId`);

--
-- Indexes for table `tblproblem`
--
ALTER TABLE `tblproblem`
 ADD PRIMARY KEY (`problemId`);

--
-- Indexes for table `tblsupport`
--
ALTER TABLE `tblsupport`
 ADD PRIMARY KEY (`supportId`);

--
-- Indexes for table `tblwing`
--
ALTER TABLE `tblwing`
 ADD PRIMARY KEY (`wingid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpcinventory`
--
ALTER TABLE `tblpcinventory`
MODIFY `PCId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblproblem`
--
ALTER TABLE `tblproblem`
MODIFY `problemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblsupport`
--
ALTER TABLE `tblsupport`
MODIFY `supportId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tblwing`
--
ALTER TABLE `tblwing`
MODIFY `wingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
