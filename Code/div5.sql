-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 02:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `div5`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `user_type` enum('1-Admin','2-Student') DEFAULT NULL COMMENT '1-Admin, 2-Student',
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_type`, `createDate`) VALUES
(5, 'Ana', 'ana@gmail', 'beec983e1d29e81bde7148cec004bbbc9e1034f5', '1-Admin', '2020-11-01 00:00:00'),
(70, 'Klevi', 'klevi@gmail.com', 'a84e7e32495a7ebe6f2c656ad24798d69325c8bf', '2-Student', '2020-11-07 14:49:28'),
(71, 'Ledi', 'ledi@gmail.com', '57643bb378d6e0d9e80224603e0cbebae518976c', '2-Student', '2020-11-08 10:49:37'),
(72, 'Ela', 'ela@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2-Student', '2020-11-09 23:34:17'),
(73, 'Alba', 'alba@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2-Student', '2020-11-09 23:34:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
