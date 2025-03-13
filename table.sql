-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 04:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmmedicalwebdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `password` varchar(28) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`name`, `email`, `phone`, `city`, `password`, `Date`) VALUES
('MANISH', '9441600981', 'manish01ag', 'hyderabad', 'mmmmmmm', '2025-02-09 21:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `table` ADD FULLTEXT KEY `created_at` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
