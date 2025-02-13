-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 05:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duhrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidateregistrationtbl`
--

CREATE TABLE `candidateregistrationtbl` (
  `id` int(11) NOT NULL,
  `fullname` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `jobtitle` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(77) COLLATE utf8_unicode_ci NOT NULL,
  `checkboxname` varchar(77) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidateregistrationtbl`
--
ALTER TABLE `candidateregistrationtbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidateregistrationtbl`
--
ALTER TABLE `candidateregistrationtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
