-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 22, 2023 at 06:32 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `phone` int(25) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `birthDate`, `phone`, `state`, `email`, `password`, `confirmPassword`, `gender`) VALUES
('A', 'B', '2023-03-08', 1131407894, 'S', '123@gmail.com', '$2y$10$FuzS77B8qVNKOuqe9B037.BscOVxhAxWs7w2FPd0Q1chZCyJJBi7.', '$2y$10$NKoeYnZxbaq/rriYqklqueCuW8AAgn3Nisld4QTjVSY5VLISdWj2S', 'female'),
('A', 'B', '2023-04-20', 1131407894, 'Sarawak', 'chai', '$2y$10$/ZwJC/BbHxmsSH73ROio1eEqsQbbSpq2YYI4/3W5G0eaxAA3/0sa2', '$2y$10$h7IC0K30HuVJD7xcT9bGyekMfCDkJPFLI67K/h.7CrMuIKtrlOdZe', 'female'),
('A', 'A', '2023-04-20', 1131407894, 'S', 'chai@gmail.com', 'Wanyie513', 'Wanyie513', 'female'),
('AA', 'BBB', '2023-04-20', 1131407894, 'W', 'hello@gmail.com', '$2y$10$tbqjE.rdexxn1/MPDYXBPektf7/42o40OY5RKOoTYxZ7OmWp3ZEP6', 'test123', 'male'),
('', 'A', '2023-04-20', 123456789, 'S', 'wanyie@gmail.com', '$2y$10$1WaKj7OLQR2i6RuVi5K1m.kCEfvBPgWMtjx6ckP/m87KidjJ3UoaG', '$2y$10$0dt5dMXAH.AGvq2TqBs5f.U78o01SahcSw4ijWP1pZesyibNE1lqy', 'female'),
('C', 'W', '2023-04-22', 1111111, 'S', 'www@gmail.com', '$2y$10$ZLQf0YufejTAKlOy8zTJierOJjWQJNPzRsHfZO2d.4dPbd80qhdC.', '$2y$10$SJc1yQJ.ZTJ2DVcxLhizAe6dhx/i5NhB7ceTidJp3.hAddlBrlp.C', 'female'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie1@gmail.com', '1234567', '1234567', 'male'),
('Hello', 'World', '2023-04-20', 1131407894, 'Sarawak', 'yie@gmail.com', 'Wanyie513', 'Wanyie513', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
