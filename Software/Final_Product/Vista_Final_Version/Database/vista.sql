-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 03:42 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vista`
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
(1, 'vista01', 'vista01', 'John Doe', ' , Apples  , Soap ', 'johndoe@outlook.com', 0),
(2, 'vista02', '0000000', 'Amrit Parajuli', '', 'amrit.parajuli@outlook.com', 1),
(3, 'vista03', '1111111', 'Joe Sykes', ' , Apples ', 'joesykes@yahoo.com', 1),
(4, 'vista04', '2222222', 'Hamza Bhatti', '', 'hamza.bhatti@gmail.com', 1),
(5, 'vista05', '3333333', 'Andrew Foster', '', 'andrew.foster@hotmail.com', 0),
(6, 'vista06', '6666666', 'Tashan N Cousins', '', 't.cousins@outlook.com', 0);

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
('Visa', 1234, 123, 'Joe', 973.90),
('Solo', 1111, 123, 'bla', 973.90),
('visa', 0, 567, 'Tashan', 245.90);

-- --------------------------------------------------------

--
-- Table structure for table `final_price`
--

CREATE TABLE `final_price` (
  `id` int(4) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_price`
--

INSERT INTO `final_price` (`id`, `price`) VALUES
(1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_points`
--

CREATE TABLE `loyalty_points` (
  `ID` int(4) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Points` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty_points`
--

INSERT INTO `loyalty_points` (`ID`, `Name`, `Points`) VALUES
(2000, 'Tim', 400),
(2001, 'Joe', 299),
(2002, 'Hamza', 630),
(2003, 'Amrit', 10),
(2004, 'Tashan', 50),
(2005, 'Andrew', 649);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(150) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img_url`, `stock`) VALUES
(1000, 'Apples', 1.00, 'A bag of apples </br> we have a 3 for 2 deal on this poduct', 'apples.jpg', 39),
(1001, 'Bananas', 0.80, 'A bag of bananas', 'bananas.jpg', 41),
(1002, 'Peaches', 1.00, 'A bag of peaches', 'peaches.jpg', 50),
(1003, 'Oranges', 1.50, 'A bag of oranges', 'Oranges.jpg', 30),
(1004, 'Brown Bread', 0.75, 'Sliced brown bread', 'brown_bread.jpg', 40),
(1005, 'White Bread', 0.75, 'Sliced white bread', 'white_bread.jpg', 40),
(1006, 'Coffee', 3.00, 'Jar of coffee', 'Coffee_Beans.jpg', 40),
(1007, 'Tea Bags', 3.00, 'A box of 200 tea bags', 'tea_bags.jpg', 40),
(1008, 'Rich-Tea Biscuits', 0.50, 'A pack of biscuits', 'biscuits.jpg', 30),
(1009, 'Salted Crisps', 2.50, '6 pack of salted crisps', 'crisps.jpg', 60),
(1010, 'Pringles', 2.50, 'Tube of pringles', 'pringles.JPG', 50),
(1011, 'Fruit', 4.50, 'A variety of chopped up fruits </br> We have a 2 for 1 deal on this product', 'fruit.jpg', 50),
(1012, 'Soap', 3.50, 'A bar and soap </br> We have a 3 for 2 deal on this product', 'soap.png', 49),
(1014, 'Toothpaste', 3.50, 'Tube of toothpaste', 'toothpaste.jpg', 50),
(1015, 'Face Wash', 4.20, 'Bottle of face wash', 'face_wash.jpg', 50),
(1016, 'Moisturiser', 3.90, 'Bottle of moisturiser', 'moisturiser.jpg', 50),
(1017, 'Shower Gel', 3.20, 'Bottle of shower gel', 'shower_gel.jpg', 50),
(1018, 'Deodrant', 2.80, 'Can of Deodrant', 'deodrant.jpg', 50),
(1019, 'Hand Wash', 3.20, 'Bottle of hand wash', 'hand_wash.jpg', 50),
(1020, 'Mouthwash', 3.50, 'Bottle of mouthwash', 'mouthwash.jpg', 50),
(1021, '40" LED Full HD TV', 399.99, 'A 40" TV Full HD', 'tv.png', 50),
(1022, 'Sat Nav', 89.99, 'Satellite Navigation System', 'sat_nav.jpg', 50),
(1023, 'Laptop', 499.99, 'brand new laptop', 'laptop.png', 50),
(1024, 'Tablet', 350.00, 'Brand new tablet', 'tablet.png', 50),
(1025, 'Laptop Charger', 24.99, 'Laptop charger for all laptops', 'charger.jpg', 50),
(1026, 'Playstation 4', 350.00, 'A brand new gaming console', 'ps4.png', 50),
(1027, 'Xbox One', 350.00, 'A brand new gaming Console', 'xbox.png', 50),
(1028, 'Blender', 19.99, 'Makes food into smoothies', 'blender.jpg', 50),
(1029, 'Iphone 6', 599.99, 'The latest Iphone', 'iphone.jpg', 50),
(1030, 'Samsung Galaxy S6', 499.99, 'The latest Samsung Smartphone', 'samsung.jpeg', 50),
(1031, 'Dark Souls III', 39.99, 'Action RPG developed by From Software', 'souls.jpg', 100),
(1032, 'Quantum Break', 39.99, 'Action thriller by Remedy Entertainment', 'quantum.jpg', 100),
(1033, 'Uncharted: Nathan Drake Collection', 39.99, 'Action Adventure by Naught Dog', 'drake.jpg', 100),
(1034, 'Uncharted 4: A Thief''s End', 40.00, 'Action Adventure by Naughty Dog', 'uncharted.jpg', 100),
(1035, 'No Man''s Sky', 49.99, 'Adventure RPG by indie game developer Hello Games', 'nomans.jpg', 1000),
(1036, 'Hitman Complete Experience', 29.99, 'Stealth Action by IO', 'hitman.jpg', 200),
(1037, 'Call Of Duty: Black Ops 3', 39.99, 'First Person Shooter by acclaimed studio Treyarch', 'blackops.jpg', 50),
(1038, 'The Division', 44.99, 'Third Person Shooter RPG by Ubisoft', 'division.jpg', 100),
(1039, 'Fallout 4', 29.99, 'Open World RPG by Bethesday', 'fallout.jpg', 100),
(1040, 'DOOM', 42.99, 'First Person Shooter by Bethesday', 'doom.jpg', 1000),
(1041, 'Star Wars The Force Awakens', 15.00, 'Latest installment in the Star Wars franchise', 'force.jpg', 100),
(1042, 'Deadpool', 13.99, 'Fourth wall comic book movie', 'deadpool.jpg', 1000),
(1043, 'The Lego Movie', 10.99, 'Adventure with your favorite lego characters', 'lego.jpg', 1000),
(1044, 'Avengers', 5.99, 'Comic book movie from Marvel Studios', 'avengers.jpg', 1000),
(1045, 'Man Of Steel', 5.99, 'Featuring the most recognized character from DC', 'mos.jpg', 100),
(1046, 'The Dark Knight Trilogy', 19.99, 'All 3 movies from Nolan''s Batman trilogy', 'tdk.jpg', 200),
(1047, 'Mad Max Fury Road', 14.99, 'Action Adventure movie from George Miller', 'fury.jpg', 100),
(1048, 'Mad Max Collection', 19.99, 'All movies from the popular George Miller series', 'maxcollection.jpg', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `final_price`
--
ALTER TABLE `final_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `final_price`
--
ALTER TABLE `final_price`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2006;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1049;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
