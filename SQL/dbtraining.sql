-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 02:31 PM
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
-- Database: `database`
--

-- --------------------------------------------------------


--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `CourseId` int(10) NOT NULL,
  `CourseName` varchar(40) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `ImageCourse` varchar(255) DEFAULT NULL,
  `PriceCourse` int(10) DEFAULT NULL,
  `InstructorName` varchar(30) DEFAULT NULL,
  `LocationId` int(10) DEFAULT NULL,
  `ConpanyStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseId`, `CourseName`, `Description`, `Duration`, `ImageCourse`, `PriceCourse`, `InstructorName`, `LocationId`, `ConpanyStatus`) VALUES
(1, 'Sales and Marketing Skills', 'Improve sales skills and effectiveness, as well as understand the latest trends and strategies in marketing.', '5 hours', 'Sales-Marketing-Alignment-Power.jpg', 120, 'Jacky lim', 0, 'Open'),
(2, 'Technical and software development skill', 'Helps technical and software developers improve their programming and software development skills, as well as stay abreast of the latest technology trends and developments.', '8 hours', 'Technical and software development skills.jpg', 150, 'Jacky lim', 0, 'Open'),
(3, 'Leadership and Management Skills', 'Help leaders and managers improve their leadership and management skills, as well as understand best practices and strategies.', '5 hours', 'leadership-skills.png', 110, 'Jacky lim', 0, 'Open'),
(4, 'Project Management and Team Collaboratio', 'Can help project managers and team members master project management best practices and techniques, as well as learn how to collaborate with team members', '6 hours', 'Project Management and Team Collaboration.png', 130, 'Jacky lim', 0, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `EnrollId` int(10) NOT NULL,
  `CName` varchar(30) DEFAULT NULL,
  `CourseName` varchar(40) DEFAULT NULL,
  `EnrollDate` datetime DEFAULT NULL,
  `ScheduleId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblinstructors`
--

CREATE TABLE `tblinstructors` (
  `InstructorId` int(10) NOT NULL,
  `UserIc` varchar(25) DEFAULT NULL,
  `InstructorName` varchar(30) DEFAULT NULL,
  `InstructorPhone` varchar(20) DEFAULT NULL,
  `InstructorEmail` varchar(40) DEFAULT NULL,
  `InstructorAddresses` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `LocationId` int(10) NOT NULL,
  `RoomNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `ScheduleId` int(10) NOT NULL,
  `EnrollId` int(10) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `ScheduleStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`EnrollId`);

--
-- Indexes for table `tblinstructors`
--
ALTER TABLE `tblinstructors`
  ADD PRIMARY KEY (`InstructorId`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`LocationId`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`ScheduleId`);

--
-- AUTO_INCREMENT for dumped tables
--


-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `EnrollId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinstructors`
--
ALTER TABLE `tblinstructors`
  MODIFY `InstructorId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `LocationId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `ScheduleId` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
