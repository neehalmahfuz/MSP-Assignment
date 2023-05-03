-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 04:16 PM
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
-- Table structure for table `custom_requests`
--

CREATE TABLE `custom_requests` (
  `id` int(11) NOT NULL,
  `request_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `customerid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `country` enum('Malaysia','Indonesia','Japan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `creditcard` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbltrainingrequest`
--

CREATE TABLE `tbltrainingrequest` (
  `RequestId` int(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `CourseName` varchar(40) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  `CreditCardNum` varchar(20) DEFAULT NULL,
  `RequestTime` datetime DEFAULT NULL,
  `RequestStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrainingrequest`
--

INSERT INTO `tbltrainingrequest` (`RequestId`, `email`, `CourseName`, `PaymentMethod`, `CreditCardNum`, `RequestTime`, `RequestStatus`) VALUES
(1, 'sookwangzheng@gmail.com', NULL, 'Cash', NULL, '2023-04-22 09:52:10', 'Pending'),
(2, 'sookwangzheng@gmail.com', 'Sales and Marketing Skills', 'Cash', NULL, '2023-04-22 09:54:54', 'Pending'),
(3, 'sookwangzheng@gmail.com', 'Sales and Marketing Skills', 'Credit Card', '1234567890', '2023-04-22 15:57:24', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_requests`
--

CREATE TABLE `training_requests` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `training_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `custom_request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_statuses`
--

CREATE TABLE `training_statuses` (
  `id` int(11) NOT NULL,
  `status` enum('pending','ongoing','done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_venues`
--

CREATE TABLE `training_venues` (
  `id` int(11) NOT NULL,
  `venue_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `phone` int(25) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accType` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `birthDate`, `phone`, `state`, `email`, `accType`, `password`, `confirmPassword`, `gender`) VALUES
('A', 'B', '2023-03-08', 1131407894, 'S', '123@gmail.com', 'Client', '$2y$10$FuzS77B8qVNKOuqe9B037.BscOVxhAxWs7w2FPd0Q1chZCyJJBi7.', '$2y$10$NKoeYnZxbaq/rriYqklqueCuW8AAgn3Nisld4QTjVSY5VLISdWj2S', 'female'),
('ABCD', 'ABCD', '2023-04-24', 123456789, 'Sarawak', 'abcd@gmail.com', 'Client', 'abcd1234', 'abcd1234', 'female'),
('A', 'B', '2023-04-20', 1131407894, 'Sarawak', 'chai', 'Client', '$2y$10$/ZwJC/BbHxmsSH73ROio1eEqsQbbSpq2YYI4/3W5G0eaxAA3/0sa2', '$2y$10$h7IC0K30HuVJD7xcT9bGyekMfCDkJPFLI67K/h.7CrMuIKtrlOdZe', 'female'),
('A', 'A', '2023-04-20', 1131407894, 'S', 'chai@gmail.com', 'Client', 'Wanyie513', 'Wanyie513', 'female'),
('AA', 'BBB', '2023-04-20', 1131407894, 'W', 'hello@gmail.com', 'Client', '$2y$10$tbqjE.rdexxn1/MPDYXBPektf7/42o40OY5RKOoTYxZ7OmWp3ZEP6', 'test123', 'male'),
('Andy', 'soo', '2000-10-11', 168586118, 'Sarawak', 'sookwangzheng@gmail.com', 'Admin', 'andysoo1011', 'andysoo1011', 'Male'),
('', 'A', '2023-04-20', 123456789, 'S', 'wanyie@gmail.com', 'Client', '$2y$10$1WaKj7OLQR2i6RuVi5K1m.kCEfvBPgWMtjx6ckP/m87KidjJ3UoaG', '$2y$10$0dt5dMXAH.AGvq2TqBs5f.U78o01SahcSw4ijWP1pZesyibNE1lqy', 'female'),
('C', 'W', '2023-04-22', 1111111, 'S', 'www@gmail.com', 'Client', '$2y$10$ZLQf0YufejTAKlOy8zTJierOJjWQJNPzRsHfZO2d.4dPbd80qhdC.', '$2y$10$SJc1yQJ.ZTJ2DVcxLhizAe6dhx/i5NhB7ceTidJp3.hAddlBrlp.C', 'female'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie1@gmail.com', 'Client', '1234567', '1234567', 'male'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie@gmail.com', 'Client', 'Wanyie513', 'Wanyie513', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_requests`
--
ALTER TABLE `custom_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`customerid`);

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
-- Indexes for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_requests`
--
ALTER TABLE `training_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `venue_id` (`venue_id`),
  ADD KEY `custom_request_id` (`custom_request_id`);

--
-- Indexes for table `training_statuses`
--
ALTER TABLE `training_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_venues`
--
ALTER TABLE `training_venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_requests`
--
ALTER TABLE `custom_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- AUTO_INCREMENT for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_requests`
--
ALTER TABLE `training_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_statuses`
--
ALTER TABLE `training_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_venues`
--
ALTER TABLE `training_venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `training_requests`
--
ALTER TABLE `training_requests`
  ADD CONSTRAINT `training_requests_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `training_requests_ibfk_2` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`),
  ADD CONSTRAINT `training_requests_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `training_statuses` (`id`),
  ADD CONSTRAINT `training_requests_ibfk_4` FOREIGN KEY (`venue_id`) REFERENCES `training_venues` (`id`),
  ADD CONSTRAINT `training_requests_ibfk_5` FOREIGN KEY (`custom_request_id`) REFERENCES `custom_requests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
