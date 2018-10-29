-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 05:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookaddict`
--
CREATE DATABASE IF NOT EXISTS `bookaddict` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookaddict`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'TextBook'),
(2, 'Study Related Books'),
(3, 'Story Books'),
(4, 'Novel'),
(5, 'Stationary Products');

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `OrderID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`OrderID`, `Quantity`, `ProductID`, `userID`) VALUES
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `PreorderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ContactNO` int(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preorder`
--

INSERT INTO `preorder` (`PreorderID`, `ProductID`, `Name`, `ContactNO`, `Quantity`, `time`) VALUES
(1, 1, 'adnan', 1521209576, 5, '2017-02-10 22:40:27'),
(2, 3, 'adnan', 1521209576, 3, '2017-02-10 22:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `productinfo`
--

CREATE TABLE `productinfo` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `StockAvailability` int(111) NOT NULL,
  `Price` float NOT NULL,
  `SubcategoryID` int(11) NOT NULL,
  `imgurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productinfo`
--

INSERT INTO `productinfo` (`ProductID`, `ProductName`, `Description`, `StockAvailability`, `Price`, `SubcategoryID`, `imgurl`) VALUES
(1, 'Physics Book 1st paperby Shajahan Tapan', 'Hsc text book.', 400, 250, 1, 'productimg/tapan.jpg'),
(2, 'SureSuccess SSC Test Paper', 'a guide book for SSC students to become prepared for SSC examination.With 100+ model tests in all subjects (creative questions included).', 55, 9600, 2, 'productimg/ss.jpg'),
(3, 'Thakurmar Jhuli', 'An all time classic story book for kids .', 150, 250, 3, 'productimg/thak.png'),
(4, 'Hacker(volume 1,2)paperback', 'story of an unbeatable hacker who taunts masud rana in every step. Will rana be able to beat this hacker?', 3, 120, 4, 'productimg/hacker.jpg'),
(5, 'Matador HI-SCHOOL ', '.5mm ball point pen for smooth writing.', 400, 5, 5, 'productimg/mshc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SubcategoryID` int(11) NOT NULL,
  `Subcategory` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SubcategoryID`, `Subcategory`, `CategoryID`) VALUES
(1, 'HSC Textbook', 1),
(2, 'SSC Guide', 2),
(3, 'Kids story books', 3),
(4, 'Thriller ', 4),
(5, 'pen', 5),
(6, 'SSC textbook', 1),
(7, 'Class 8 textBook', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplierinfo`
--

CREATE TABLE `supplierinfo` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `SupplierContactNO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplierinfo`
--

INSERT INTO `supplierinfo` (`SupplierID`, `SupplierName`, `SupplierContactNO`) VALUES
(1, 'korim', '5556');

-- --------------------------------------------------------

--
-- Table structure for table `supplyinfo`
--

CREATE TABLE `supplyinfo` (
  `ProductSupplyID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BuyingPrice` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplyinfo`
--

INSERT INTO `supplyinfo` (`ProductSupplyID`, `ProductID`, `SupplierID`, `userID`, `Quantity`, `BuyingPrice`, `time`) VALUES
(3, 1, 1, 1, 200, 200, '2017-02-10 23:57:51'),
(4, 1, 1, 1, 100, 200, '2017-02-11 00:04:49'),
(5, 1, 1, 7, 50, 200, '2017-02-11 00:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `transactioninfo`
--

CREATE TABLE `transactioninfo` (
  `InvoiceID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `TotalPrice` float NOT NULL,
  `TimeofTransaction` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `JoinDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userID`, `FirstName`, `LastName`, `UserName`, `ContactNo`, `Role`, `Password`, `JoinDate`) VALUES
(1, 'Dana', 'White', 'Owner', '01972571666', 'owner', '123456', '2017-02-01 00:00:00'),
(8, 'Nate', 'Diaz', 'Employee', '01721557669', 'employee', '123456', '2017-02-02 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`PreorderID`);

--
-- Indexes for table `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`ProductID`,`SubcategoryID`),
  ADD KEY `i` (`SubcategoryID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SubcategoryID`,`CategoryID`),
  ADD KEY `e` (`CategoryID`);

--
-- Indexes for table `supplierinfo`
--
ALTER TABLE `supplierinfo`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `supplyinfo`
--
ALTER TABLE `supplyinfo`
  ADD PRIMARY KEY (`ProductSupplyID`),
  ADD KEY `a` (`SupplierID`),
  ADD KEY `c` (`userID`);

--
-- Indexes for table `transactioninfo`
--
ALTER TABLE `transactioninfo`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD UNIQUE KEY `InvoiceID` (`InvoiceID`),
  ADD KEY `g` (`userID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `PreorderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productinfo`
--
ALTER TABLE `productinfo`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SubcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplierinfo`
--
ALTER TABLE `supplierinfo`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplyinfo`
--
ALTER TABLE `supplyinfo`
  MODIFY `ProductSupplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactioninfo`
--
ALTER TABLE `transactioninfo`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
