-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2024 at 08:51 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Checkout`
--

CREATE TABLE `Checkout` (
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Checkout`
--

INSERT INTO `Checkout` (`CustomerID`, `ProductID`, `OrderDate`) VALUES
(1, 12, '2024-05-08 23:35:19'),
(1, 14, '2024-05-08 23:35:19'),
(1, 20, '2024-05-08 23:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerInformation`
--

CREATE TABLE `CustomerInformation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CustomerInformation`
--

INSERT INTO `CustomerInformation` (`ID`, `Name`, `Address`, `Email`) VALUES
(1, 'Henry Hardane', 'Zalka, Saideh Street.', 'henry@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ID` int(11) NOT NULL,
  `PRODUCT` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `IMAGE` varchar(255) DEFAULT NULL,
  `IS_ACTIVE` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ID`, `PRODUCT`, `DESCRIPTION`, `PRICE`, `CATEGORY`, `IMAGE`, `IS_ACTIVE`) VALUES
(11, 'Lenovo Legion ', 'The Lenovo Legion is a series of laptops and desktops designed primarily for gaming. These devices are known for their powerful performance, high-quality graphics, and fast refresh rates, which are essential for a smooth gaming experience. The Legion series typically features the latest Intel or AMD processors, along with NVIDIA or AMD graphics cards.', '1000.00', 'Laptops', 'Lenovo Legion .jpg', '1'),
(12, 'Lenovo Yoga', 'The Lenovo Yoga series is renowned for its versatility and innovation, primarily catering to users seeking a blend of productivity and portability. These devices are known as 2-in-1 laptops, equipped with hinges that allow them to be used as a tablet or tented for viewing media.', '1200.00', 'Laptops', 'Lenovo Yoga.avif', '1'),
(14, 'MSI-Gaming', 'MSI is predominantly recognized for its strong emphasis on gaming and high-performance computing. Their laptops and desktops are favored by gamers, streamers, and content creators for their powerful processors, superior graphics capabilities, and high refresh rate displays.', '1700.00', 'Laptops', 'MSI-Gaming.png', '1'),
(19, 'Samsung S24 Ultra', 'The Samsung Galaxy S24 Ultra comes with 6.8-nch Dynamic AMOLED display with 120Hz refresh rate and Qualcomm Snapdragon 8 Gen 3 processor. Specs also include 5000mAh battery and Quad camera setup on the back.', '1100.00', 'Mobile Phones', 'Samsung S24 Ultra.jpg', '1'),
(20, 'Iphone 15 Pro Max', 'The iPhone 15 Pro Max comes with 6.7-inch OLED display with 120Hz refresh rate and Apple\'s improved A17 Pro processor. On the back there is a Triple camera setup with 48MP main camera.', '1370.00', 'Mobile Phones', 'Iphone 15 Pro Max.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `table_contacts`
--

CREATE TABLE `table_contacts` (
  `ContactID` int(11) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Body` text,
  `ContactDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_contacts`
--

INSERT INTO `table_contacts` (`ContactID`, `Phone`, `Email`, `Subject`, `Body`, `ContactDate`) VALUES
(2, '+961 71 542 715', 'henry@hotmail.com', 'Inquiry about Office Location', 'I hope this message finds you well, I am writing to inquire about the location of your headquarters. Thank you for your help.', '2024-05-08 10:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ActiveStatus` bit(1) NOT NULL DEFAULT b'1',
  `Gender` varchar(1) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `FirstName`, `LastName`, `Email`, `ProfilePicture`, `Password`, `CreationDate`, `ActiveStatus`, `Gender`, `Age`) VALUES
(2, 'henry', 'Henry', 'Hardane', 'henryhardane@hotmail.com', 'henry.png', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', '2024-05-07 19:46:04', b'1', 'M', 19),
(3, 'admin', 'Admin', 'Admin', 'admin@hotmail.com', 'admin.png', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '2024-05-08 21:18:33', b'1', 'M', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Checkout`
--
ALTER TABLE `Checkout`
  ADD PRIMARY KEY (`CustomerID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `CustomerInformation`
--
ALTER TABLE `CustomerInformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_contacts`
--
ALTER TABLE `table_contacts`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerInformation`
--
ALTER TABLE `CustomerInformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_contacts`
--
ALTER TABLE `table_contacts`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Checkout`
--
ALTER TABLE `Checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `CustomerInformation` (`ID`),
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
