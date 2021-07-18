-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 04:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Account_No` int(10) NOT NULL,
  `Customer_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Branch_Name` varchar(10) NOT NULL,
  `AvailableBalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Account_No`, `Customer_Name`, `Email`, `Branch_Name`, `AvailableBalance`) VALUES
(1, 1003001, 'Hema', 'hema@gmail.com', 'Gugai', 40000),
(2, 1003002, 'Gayathri', 'gaya3@gmail.com', 'Salem', 60000),
(3, 1003003, 'Venkat', 'venkat@gmail.com', 'Gugai', 85000),
(4, 1003004, 'Gobi', 'gobi@gmail.com', 'chengalpat', 45000),
(5, 1003005, 'Niveditha', 'nive5@gmail.com', 'trichy', 15000),
(6, 1003006, 'Mathu', 'mathu@gmail.com', 'Madras', 35000),
(7, 1003007, 'Illakkiya', 'illakks@gmail.com', 'chengalpat', 15000),
(8, 1003008, 'Nanthini', 'nanthini@gmail.com', 'neyveli', 15000),
(9, 1003009, 'Harsha', 'harsha@gmail.com', 'Nagapatnam', 35000),
(10, 1003010, 'Deepthi', 'deepthi@gmail.com', 'Trichy', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `CustomerID` int(10) NOT NULL,
  `sender_name` varchar(20) NOT NULL,
  `reciever_name` varchar(20) NOT NULL,
  `amount_transfer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`CustomerID`, `sender_name`, `reciever_name`, `amount_transfer`) VALUES
(1, 'Gayathri', 'Hema', 10000),
(2, 'Illakkiya', 'Harsha', 5000),
(3, 'Gobi', 'Gayathri', 10000),
(4, 'Hema', 'Gobi', 10000),
(5, 'Venkat', 'Deepthi', 5000),
(6, 'Illakkiya', 'Niveditha', 5000),
(7, 'Nanthini', 'Gobi', 5000),
(8, 'Hema', 'Venkat', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
