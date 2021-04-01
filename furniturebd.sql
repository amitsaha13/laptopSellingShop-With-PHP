-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 09:51 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniturebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `userID`, `name`, `about`) VALUES
(6, 'amit', 'amit saha', 'hi    ...........');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`) VALUES
(7, 'Laptop'),
(8, 'Mouse'),
(9, 'Keyboard'),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `productId`, `name`, `image`, `price`) VALUES
(56, 7, 'Laptop 2', 'l2.jpg', 66000),
(57, 7, 'Laptop 3', 'l3.jpg', 70000),
(60, 7, 'Laptop 4', 'l4.jpg', 78000),
(110, 7, 'Laptop 1', 'l1.jpg', 45600),
(150, 8, 'Mouse 1', 'm1.jpg', 800),
(151, 8, 'Mouse 2', 'm2.jpg', 1800),
(152, 8, 'Mouse 3', 'm3.jpg', 2000),
(153, 8, 'Mouse 4', 'm4.png', 1900),
(154, 8, 'Mouse 5', 'm5.jpg', 1400),
(155, 8, 'Mouse 6', 'm6.png', 800),
(200, 9, 'Keyboard 1', 'k1.jpg', 2100),
(201, 9, 'Keyboard 02', 'k2.jpg', 2500),
(202, 9, 'Keyboard 3', 'k3.jpg', 2300),
(203, 9, 'Keyboard 4', 'k4.jpg', 2200),
(204, 9, 'Keyboard 5', 'k5.jpg', 1400),
(205, 9, 'Keyboard 6', 'k6.jpg', 1400),
(209, 8, 'Mouse 7', 'm2.jpg', 700),
(224, 12, '', '', 0),
(225, 12, '', '', 0),
(226, 12, '', '', 0),
(227, 12, '', '', 0),
(228, 12, '', '', 0),
(229, 12, '', '', 0),
(230, 12, '', '', 0),
(231, 12, '', '', 0),
(232, 12, '', '', 0),
(233, 12, '', '', 0),
(234, 12, '', '', 0),
(235, 12, '', '', 0),
(236, 12, '', '', 0),
(237, 12, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `userID`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fahad.aust09@gmail.com'),
(9, 'amit', 'e10adc3949ba59abbe56e057f20f883e', 'amit.ndc@gmail.com'),
(10, 'amit', 'e10adc3949ba59abbe56e057f20f883e', 'aishwarza@live.com'),
(11, 'amit', 'e10adc3949ba59abbe56e057f20f883e', 'amit.ndc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shopingcart`
--

CREATE TABLE `shopingcart` (
  `cartId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `indexID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopingcart`
--

INSERT INTO `shopingcart` (`cartId`, `id`, `productName`, `qty`, `price`, `status`, `indexID`) VALUES
(2, 9, 'Mouse 2', 2, 3600, 'delivered', 0),
(3, 9, 'Mouse 3', 1, 2000, 'delivered', 0),
(4, 9, 'Keyboard 3', 1, 2300, 'delivered', 0),
(5, 9, 'Laptop 2', 2, 132000, 'delivered', 0),
(6, 1, 'Laptop 4', 1, 78000, 'delivered', 0),
(7, 11, 'Mouse 2', 1, 1800, 'delivered', 0),
(16, 11, 'Laptop 2', 1, 66000, 'delivered', 0),
(17, 11, 'Laptop 3', 1, 70000, 'delivered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` int(11) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `cardnumber` varchar(12) NOT NULL,
  `cardvalidity` varchar(6) NOT NULL,
  `holdername` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `customername`, `cardnumber`, `cardvalidity`, `holdername`, `amount`, `date`) VALUES
(1, 'Amit Saha', '101.202.303', '132020', 'amitsaha', '300', '0000-00-00'),
(2, 'amit', '101.102.303', '13/202', 'amitsaha', '370', '0000-00-00'),
(3, 'amit', '101.202.404', '132022', 'amitsaha', '300', '2019-08-19'),
(4, 'amit', '707.303.999', '132022', 'amitsaha', '370', '2019-08-20'),
(5, 'amit', '101.102.303', '132020', 'amitsaha', '420', '2019-08-05'),
(6, 'amit', '777.888555', '132020', 'Ritu Panday', '555', '2019-08-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopingcart`
--
ALTER TABLE `shopingcart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shopingcart`
--
ALTER TABLE `shopingcart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopingcart`
--
ALTER TABLE `shopingcart`
  ADD CONSTRAINT `shopingcart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
