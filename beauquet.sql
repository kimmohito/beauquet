-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauquet`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cId` int(255) NOT NULL,
  `cGroup` int(255) NOT NULL,
  `cDate` datetime NOT NULL,
  `cUserId` int(255) NOT NULL,
  `cProductName` varchar(255) NOT NULL,
  `cProductDescription` varchar(255) NOT NULL,
  `cProductPrice` decimal(65,2) NOT NULL,
  `cProductQuantity` int(11) NOT NULL,
  `cItemTotal` decimal(65,2) NOT NULL,
  `cStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cId`, `cGroup`, `cDate`, `cUserId`, `cProductName`, `cProductDescription`, `cProductPrice`, `cProductQuantity`, `cItemTotal`, `cStatus`) VALUES
(8, 1394153951, '2021-06-11 16:30:39', 12, 'Flower C', 'Pink Rose with Dried Flowers and Baby Breath', '50.00', 5, '250.00', 'completed'),
(9, 1036883196, '0000-00-00 00:00:00', 12, 'Flower A', 'Random small fresh flowers', '30.00', 1, '30.00', 'pending'),
(10, 735795318, '0000-00-00 00:00:00', 12, 'Flower B', 'Lilac and Baby Breath', '45.00', 1, '45.00', 'pending'),
(11, 735795318, '0000-00-00 00:00:00', 12, 'Flower D', 'Red Tulips with Lavenders & Dried Flowers', '70.00', 2, '140.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mId` int(255) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `mEmail` varchar(255) NOT NULL,
  `mMessage` varchar(255) NOT NULL,
  `mDate` datetime NOT NULL,
  `mStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mId`, `mName`, `mEmail`, `mMessage`, `mDate`, `mStatus`) VALUES
(1, 'test', 'test@test', 'This is just a test! Nothing more than that.', '2021-06-11 12:15:21', 'seen'),
(2, 'Ahrazolkifli', 'ahrazolkifli@gmail.com', 'test', '2021-06-11 17:03:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(255) NOT NULL,
  `pImg` varchar(255) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pDescription` varchar(255) NOT NULL,
  `pPrice` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pImg`, `pName`, `pDescription`, `pPrice`) VALUES
(11, 'f1-removebg-preview.png', 'Flower A', 'Random small fresh flowers', '30.00'),
(12, 'f2-removebg-preview.png', 'Flower B', 'Lilac and Baby Breath', '45.00'),
(13, 'f3-removebg-preview.png', 'Flower C', 'Pink Rose with Dried Flowers and Baby Breath', '50.00'),
(14, 'f4-removebg-preview.png', 'Hand Bouquet A', 'White Rose with Fresh Leaves', '150.00'),
(15, 'f5-removebg-preview.png', 'Hand Bouquet B', 'Dried Flowers and Furry Leaves', '100.00'),
(16, 'f6-removebg-preview.png', 'Hand Bouquet C', 'Fresh Sunflowers with Fresh Leaves and Pink Baby Breath', '150.00'),
(17, 'f7-removebg-preview.png', 'Flower D', 'Red Tulips with Lavenders & Dried Flowers', '70.00'),
(18, 'f8-removebg-preview.png', 'Hand Bouquet D', 'Dried Lavender with Hay Flower and Blue Tulip', '150.00'),
(19, 'f9-removebg-preview.png', 'Flower E', 'Baby Breath (random color)', '40.00'),
(20, 'f10-removebg-preview.png', 'Hand Bouquet E', 'Pink Baby Breaths with Lavenders', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uId` int(255) NOT NULL,
  `uType` varchar(255) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `uEmail` varchar(255) NOT NULL,
  `uHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `uType`, `uName`, `uEmail`, `uHash`) VALUES
(0, 'admin', 'admin', 'admin@shamrowater.com', '21232f297a57a5a743894a0e4a801fc3'),
(1, 'buyer', 'buyer', 'sara.castie97@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'buyer', 'ahrazolkifli', 'ahrazolkifli@gmail.com', 'c0dd106be7cd670190d39a6dfd627a7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
