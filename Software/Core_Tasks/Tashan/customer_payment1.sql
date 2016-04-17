-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 09:51 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
-- Table structure for table `customer_payment1`
--

CREATE TABLE `customer_payment1` (
  `type_of_cards` text NOT NULL,
  `card_number` int(20) NOT NULL,
  `security_code` int(3) NOT NULL,
  `cardholder_name` text NOT NULL,
  `balance` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment1`
--

INSERT INTO `customer_payment1` (`type_of_cards`, `card_number`, `security_code`, `cardholder_name`, `balance`) VALUES
('Visa', 1234, 123, 'Joe', 991.80),
('Solo', 1111, 123, 'bla', 991.80),
('visa', 0, 567, 'Tashan', 245.90);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
