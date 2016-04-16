-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 03:01 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(50) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Customer_Name` text NOT NULL,
  `Items_Bought` text NOT NULL,
  `Email_Address` text NOT NULL,
  `Mail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Username`, `Password`, `Customer_Name`, `Items_Bought`, `Email_Address`, `Mail`) VALUES
(1, 'vista01', 'vista01', 'John Doe', ' , Apples  , Bananas ', 'johndoe@outlook.com', 0),
(2, 'vista02', '0000000', 'Amrit Parajuli', '', 'amrit.parajuli@outlook.com', 1),
(3, 'vista03', '1111111', 'Joe Sykes', '', 'joesykes@yahoo.com', 1),
(4, 'vista04', '2222222', 'Hamza Bhatti', '', 'hamza.bhatti@gmail.com', 1),
(5, 'vista05', '3333333', 'Andrew Foster', '', 'andrew.foster@hotmail.com', 0),
(6, 'vista06', '6666666', 'Tashan N Cousins', '', 't.cousins@outlook.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
