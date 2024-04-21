-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2023 at 10:49 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `student_result_management_system`
--
CREATE DATABASE IF NOT EXISTS `student_result_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `student_result_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `emailid`, `password`, `username`) VALUES
(1, 'Admin@gmail.com', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `rollno` int NOT NULL,
  `regno` int NOT NULL,
  `math_2` int NOT NULL,
  `dsa` int NOT NULL,
  `be` int NOT NULL,
  `chemistry` int NOT NULL,
  `cetc` int NOT NULL,
  `total` int NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `emailid`, `image`, `section`, `rollno`, `regno`, `math_2`, `dsa`, `be`, `chemistry`, `cetc`, `total`, `status`) VALUES
(2, 'sakshi selmokar', 'selmokarsakshi0@gmail.com', '../assets/students/IMG-20230912-WA0084.jpg', 'A', 29, 36004, 49, 48, 47, 46, 45, 44, 'Pass');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
