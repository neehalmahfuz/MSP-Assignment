-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 10:43 PM
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
  `ConpanyStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseId`, `CourseName`, `Description`, `Duration`, `ImageCourse`, `PriceCourse`, `InstructorName`, `ConpanyStatus`) VALUES
(1, 'Sales and Marketing Skills', 'Improve sales skills and effectiveness, as well as understand the latest trends and strategies in marketing.', '5 hours', 'Sales-Marketing-Alignment-Power.jpg', 120, 'Jacky lim', 'Active'),
(2, 'Technical and software development skill', 'Helps technical and software developers improve their programming and software development skills, as well as stay abreast of the latest technology trends and developments.', '8 hours', 'Technical and software development skills.jpg', 150, 'Jacky lim', 'Active'),
(3, 'Leadership and Management Skills', 'Help leaders and managers improve their leadership and management skills, as well as understand best practices and strategies.', '5 hours', 'leadership-skills.png', 110, 'Jacky lim', 'Active'),
(4, 'Project Management and Team Collaboratio', 'Can help project managers and team members master project management best practices and techniques, as well as learn how to collaborate with team members', '6 hours', 'Project Management and Team Collaboration.png', 130, 'Jacky lim', 'Active'),
(6, 'MSP', 'testing', '8 hours', 'msp.jpg', 130, 'Jacky lim', 'Active');

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
  `PaymentStatus` varchar(20) DEFAULT NULL,
  `RequestTime` datetime DEFAULT NULL,
  `RequestStatus` varchar(20) DEFAULT NULL,
  `Venue` varchar(20) NOT NULL,
  `Date` date DEFAULT NULL,
  `Pax` int(11) NOT NULL,
  `CVV` int(11) DEFAULT NULL,
  `Images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrainingrequest`
--

INSERT INTO `tbltrainingrequest` (`RequestId`, `email`, `CourseName`, `PaymentMethod`, `CreditCardNum`, `PaymentStatus`, `RequestTime`, `RequestStatus`, `Venue`, `Date`, `Pax`, `CVV`, `Images`) VALUES
(1, 'neeh@gmail.com', 'Technical and software development skill', 'Cash', '', 'Pending', '2023-05-10 05:58:16', 'Pending', 'Sarawak Plaza', '2023-05-11', 2, 0, 'receipts_images/Screenshot.png'),
(2, 'yie1@gmail.com', 'Sales and Marketing Skills', 'Cash', '', 'Approved', '2023-05-10 23:49:06', 'Confirmed', 'Tunku Abdul Rahman P', '2023-05-11', 2, 0, 'msp.jpg'),
(3, 'yie1@gmail.com', 'Technical and software development skill', 'Credit Card', '1212121212121256', 'Pending', '2023-05-10 23:49:30', 'Pending', 'Cityone Megamall Eve', '2023-05-31', 3, 123, ''),
(8, 'yie1@gmail.com', 'Technical and software development skill', 'Cash', '', 'Pending', '2023-05-11 14:25:57', 'Pending', '11Ridgeway Kuching', '2023-05-13', 2, 0, 'msp.jpg'),
(9, 'yie1@gmail.com', 'MSP', 'Cash', '', 'Approved', '2023-05-15 14:16:52', 'Confirmed', 'Tunku Abdul Rahman P', '2023-05-18', 2, 0, 'msp.jpg');

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
('Neehal', 'Mahfuz', '2001-10-01', 1123344321, 'Sarawak', 'neeh@gmail.com', 'Client', 'neehal123', 'neehal123', 'male'),
('Andy', 'soo', '2000-10-11', 168586118, 'Sarawak', 'sookwangzheng@gmail.com', 'Admin', 'andysoo1011', 'andysoo1011', 'Male'),
('', 'A', '2023-04-20', 123456789, 'S', 'wanyie@gmail.com', 'Client', '$2y$10$1WaKj7OLQR2i6RuVi5K1m.kCEfvBPgWMtjx6ckP/m87KidjJ3UoaG', '$2y$10$0dt5dMXAH.AGvq2TqBs5f.U78o01SahcSw4ijWP1pZesyibNE1lqy', 'female'),
('C', 'W', '2023-04-22', 1111111, 'S', 'www@gmail.com', 'Client', '$2y$10$ZLQf0YufejTAKlOy8zTJierOJjWQJNPzRsHfZO2d.4dPbd80qhdC.', '$2y$10$SJc1yQJ.ZTJ2DVcxLhizAe6dhx/i5NhB7ceTidJp3.hAddlBrlp.C', 'female'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie1@gmail.com', 'Client', '1234567', '1234567', 'male'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie@gmail.com', 'Client', 'Wanyie513', 'Wanyie513', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
