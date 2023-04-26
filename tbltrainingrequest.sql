-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 02:05 PM
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
(3, 'sookwangzheng@gmail.com', 'Sales and Marketing Skills', 'Credit Card', '1234567890', '2023-04-22 15:57:24', 'Pending'),
(4, 'chai@gmail.com', 'Technical and software development skill', 'Credit Card', '67744444333', '2023-04-26 19:51:29', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  ADD PRIMARY KEY (`RequestId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltrainingrequest`
--
ALTER TABLE `tbltrainingrequest`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
