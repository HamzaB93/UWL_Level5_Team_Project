-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 12:03 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

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
(1000, 'Apples', 1.00, 'A bag of apples', 'apples.jpg', 21),
(1001, 'Bananas', 0.80, 'A bag of bananas', 'bananas.jpg', 42),
(1002, 'Peaches', 1.00, 'A bag of peaches', 'peaches.jpg', 50),
(1003, 'Oranges', 1.50, 'A bag of oranges', 'Oranges.jpg', 30),
(1004, 'Brown Bread', 0.75, 'Sliced brown bread', 'brown_bread.jpg', 40),
(1005, 'White Bread', 0.75, 'Sliced white bread', 'white_bread.jpg', 40),
(1006, 'Coffee', 3.00, 'Jar of coffee', 'Coffee_Beans.jpg', 40),
(1007, 'Tea Bags', 3.00, 'A box of 200 tea bags', 'tea_bags.jpg', 40),
(1008, 'Rich-Tea Biscuits', 0.50, 'A pack of biscuits', 'biscuits.jpg', 30),
(1009, 'Salted Crisps', 2.50, '6 pack of salted crisps', 'crisps.jpg', 60),
(1010, 'Pringles', 2.50, 'Tube of pringles', 'pringles.JPG', 50),
(1011, 'Fruit', 4.50, 'A variety of chopped up fruits', 'fruit.jpg', 50),
(1012, 'Soap', 3.50, 'A bar and soap', 'soap.png', 50),
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
(1030, 'Samsung Galaxy S6', 499.99, 'The latest Samsung Smartphone', 'samsung.jpeg', 50);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
