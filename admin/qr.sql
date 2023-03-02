-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 11:28 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabassigned`
--

CREATE TABLE IF NOT EXISTS `tabassigned` (
  `StaffID` varchar(50) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabassigned`
--

INSERT INTO `tabassigned` (`StaffID`, `CourseID`, `Year`) VALUES
('s1001', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabattendance`
--

CREATE TABLE IF NOT EXISTS `tabattendance` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Attendance` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabattendance`
--

INSERT INTO `tabattendance` (`EntryID`, `RegisterNumber`, `Semester`, `Attendance`) VALUES
(2, '1001', 2, '90'),
(3, '1001', 1, '70');

-- --------------------------------------------------------

--
-- Table structure for table `tabcgpa`
--

CREATE TABLE IF NOT EXISTS `tabcgpa` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `CGPA` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabcgpa`
--

INSERT INTO `tabcgpa` (`EntryID`, `RegisterNumber`, `CGPA`) VALUES
(1, '1001', '8.6');

-- --------------------------------------------------------

--
-- Table structure for table `tabclub`
--

CREATE TABLE IF NOT EXISTS `tabclub` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `Activity` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabclub`
--

INSERT INTO `tabclub` (`EntryID`, `RegisterNumber`, `Activity`) VALUES
(1, '1001', 'IEEE');

-- --------------------------------------------------------

--
-- Table structure for table `tabcourses`
--

CREATE TABLE IF NOT EXISTS `tabcourses` (
  `CourseID` int(11) NOT NULL,
  `UGPG` varchar(10) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Years` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabcourses`
--

INSERT INTO `tabcourses` (`CourseID`, `UGPG`, `CourseName`, `Years`) VALUES
(3, 'UG', 'B.E. Computer Science Engineering', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tabec`
--

CREATE TABLE IF NOT EXISTS `tabec` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `Activity` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabec`
--

INSERT INTO `tabec` (`EntryID`, `RegisterNumber`, `Activity`) VALUES
(4, '1001', 'NCC');

-- --------------------------------------------------------

--
-- Table structure for table `tabexam`
--

CREATE TABLE IF NOT EXISTS `tabexam` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `ExamName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabexam`
--

INSERT INTO `tabexam` (`EntryID`, `RegisterNumber`, `ExamName`) VALUES
(3, '1001', 'MCSE'),
(4, '1001', 'CCNA');

-- --------------------------------------------------------

--
-- Table structure for table `tabic`
--

CREATE TABLE IF NOT EXISTS `tabic` (
  `EntryID` int(11) NOT NULL,
  `RegisterNumber` varchar(50) NOT NULL,
  `ICName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabic`
--

INSERT INTO `tabic` (`EntryID`, `RegisterNumber`, `ICName`) VALUES
(2, '1001', 'FX College');

-- --------------------------------------------------------

--
-- Table structure for table `tabstaffs`
--

CREATE TABLE IF NOT EXISTS `tabstaffs` (
  `StaffID` varchar(50) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabstaffs`
--

INSERT INTO `tabstaffs` (`StaffID`, `StaffName`, `Gender`, `password`) VALUES
('s1001', 'Ajey', 'Male', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tabstudents`
--

CREATE TABLE IF NOT EXISTS `tabstudents` (
  `RollNumber` varchar(50) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `Year` int(11) NOT NULL,
  `FatherName` varchar(50) NOT NULL,
  `FatherMobile` varchar(50) NOT NULL,
  `FatherOcc` varchar(50) NOT NULL,
  `MotherName` varchar(50) NOT NULL,
  `MotherMobile` varchar(50) NOT NULL,
  `MotherOcc` varchar(50) NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `Add1` varchar(50) NOT NULL,
  `Add2` varchar(50) NOT NULL,
  `Add3` varchar(50) NOT NULL,
  `AnnualIncome` varchar(50) NOT NULL,
  `SSLCPercentage` varchar(50) NOT NULL,
  `HSCPercentage` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabstudents`
--

INSERT INTO `tabstudents` (`RollNumber`, `StudentName`, `Gender`, `CourseID`, `Year`, `FatherName`, `FatherMobile`, `FatherOcc`, `MotherName`, `MotherMobile`, `MotherOcc`, `BloodGroup`, `Add1`, `Add2`, `Add3`, `AnnualIncome`, `SSLCPercentage`, `HSCPercentage`, `Email`) VALUES
('1001', 'Arun', 'Male', '3', 1, 'Nagarajan', '9994618909', 'Govt.', 'Olagammal', '8881234567', 'Housewife', 'AB+', '86/1 SMR Complex', 'Trivandrum Road, Palayamkottai', 'Tirunelveli', '2 Lakh to 3 Lakh', '80', '90', 'ysarun@gmail.com'),
('1002', 'Ajey', 'Male', '3', 1, 'Nagarajan', '9994618909', 'Govt.', 'Olagammal', '8881234567', 'Housewife', 'AB+', '86/1 SMR Complex', 'Trivandrum Road, Palayamkottai', 'Tirunelveli', '2 Lakh to 3 Lakh', '80', '90', 'ysarun@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabassigned`
--
ALTER TABLE `tabassigned`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `tabattendance`
--
ALTER TABLE `tabattendance`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabcgpa`
--
ALTER TABLE `tabcgpa`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabclub`
--
ALTER TABLE `tabclub`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabcourses`
--
ALTER TABLE `tabcourses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `tabec`
--
ALTER TABLE `tabec`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabexam`
--
ALTER TABLE `tabexam`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabic`
--
ALTER TABLE `tabic`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `tabstaffs`
--
ALTER TABLE `tabstaffs`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `tabstudents`
--
ALTER TABLE `tabstudents`
  ADD PRIMARY KEY (`RollNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabattendance`
--
ALTER TABLE `tabattendance`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabcgpa`
--
ALTER TABLE `tabcgpa`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabclub`
--
ALTER TABLE `tabclub`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabcourses`
--
ALTER TABLE `tabcourses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabec`
--
ALTER TABLE `tabec`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabexam`
--
ALTER TABLE `tabexam`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabic`
--
ALTER TABLE `tabic`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
