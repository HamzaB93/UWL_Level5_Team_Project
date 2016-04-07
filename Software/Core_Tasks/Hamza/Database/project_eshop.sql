-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 12:43 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img_url`, `stock`) VALUES
(1000, 'Apples', 1.00, 'A bag of apples', 'apples2.jpg', 50),
(1001, 'Bananas', 0.80, 'A bag of bananas', 'bananas.jpg', 50),
(1002, 'Peaches', 1.00, 'A bag of peaches', '', 50),
(1003, 'Oranges', 1.50, 'A bag of oranges', '', 30),
(1004, 'Brown Bread', 0.75, 'Sliced brown bread', '', 40),
(1005, 'White Bread', 0.75, 'Sliced white bread', '', 40),
(1006, 'Coffee', 3.00, 'Jar of coffee', '', 40),
(1007, 'Tea Bags', 3.00, 'A box of 200 tea bags', '', 40),
(1008, 'Rich-Tea Biscuits', 0.50, 'A pack of biscuits', '', 30),
(1009, 'Salted Crisps', 2.50, '6 pack of salted crisps', '', 60),
(1010, 'Pringles', 2.50, 'Tube of pringles', '', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
