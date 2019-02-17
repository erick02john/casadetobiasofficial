-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 06:56 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casadetobiasofficial`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `UserID` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `ContactNo` int(15) NOT NULL,
  `UserType` varchar(15) NOT NULL,
  `UserStatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`UserID`, `Username`, `Password`, `FullName`, `ContactNo`, `UserType`, `UserStatus`) VALUES
('2019-123', 'admin', 'admin', 'erick john mugol', 91234567, 'Admin', 'Active'),
('2019-79104', 'test', 'test', 'test', 908089, 'Frontdesk', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `AmenityID` int(11) NOT NULL,
  `ReservationID` int(10) DEFAULT NULL,
  `AmenityType` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `AmenityPrice` decimal(10,2) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`AmenityID`, `ReservationID`, `AmenityType`, `Quantity`, `AmenityPrice`, `Description`) VALUES
(64, 0, '', 0, '0.00', ''),
(65, 3523, 'Bar', 1, '100.00', 'Beer'),
(66, 3523, 'Toiletries', 2, '20.00', 'Soap'),
(67, 1377, 'Swimmingpool', 1, '200.00', 'Entrance fee'),
(68, 1561, 'Others', 2, '1000.00', 'cream'),
(69, 1561, 'Others', 1, '1000.00', 'ice'),
(70, 6246, 'Others', 5, '1500.00', 'new'),
(71, 6246, 'Others', 10, '1300.00', 'Extra Pillow '),
(72, 6246, 'Bar', 50, '10.00', 'sss'),
(73, 6246, 'Others', 2, '200.00', 'towels');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `BillingID` int(10) NOT NULL,
  `ReservationID` int(10) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `PaidAmount` decimal(10,2) DEFAULT NULL,
  `Balance` decimal(10,2) DEFAULT NULL,
  `BillingStatus` varchar(15) NOT NULL,
  `ModeOfPayment` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `DiscountID` int(11) NOT NULL,
  `DiscountType` varchar(50) DEFAULT NULL,
  `DiscountPercent` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`DiscountID`, `DiscountType`, `DiscountPercent`) VALUES
(1, 'Senior', '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestId` varchar(12) NOT NULL,
  `GuestFName` varchar(50) NOT NULL,
  `GuestMName` varchar(50) NOT NULL,
  `GuestLName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestId`, `GuestFName`, `GuestMName`, `GuestLName`, `Address`, `Gender`, `ContactNumber`, `Email`, `Password`) VALUES
('2019-15268', 'isol', 'Rollan', 'Song', 'silk residence 2545 santol sta mesa manila', 'Female', '09561234568', 'isoljoy@gmail.com', '56849ffdb6b4b1aa0062ad824f68809f'),
('2019-32792', 'Carloj', 'jewqj', 'test', 'qlkewlkqwje213 ', 'Female', '1209381932', 'carlosjabay123@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-35922', 'John Carlo', 'Busano', 'Jabay', 'Blk 18 Lot 13  Calamansian', 'Female', '091234566676654', 'carlosjabay@gmail.com', 'da95e756f715a1d95b9aa62928c57e37'),
('2019-36161', 'test', 'test', 'test', 'test1', 'Female', '2515121632', 'test1@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-39558', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-51253', 'test1', 'test', 'tes', 'here', 'Female', '265252626262', 'test2@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-52616', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-55598', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-55865', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-59885', 'test', 'test', 'tst', 'test', 'Female', '210554', 'gg@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-60568', 'erik', 'jo', 'm', ' asdf', 'Female', '62106851', 'ejej@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-61189', 'test', 'test', 'test', 'asf,kjbj', 'Male', '1321321313213', 'arraicx@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-63917', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-66369', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-66466', 'ej', 'ej', 'ej', 'ej', 'Male', '262682626595626', 'ej@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('2019-66579', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2019-71969', 'dean', 'maveric', 'hitgano', 'sldkjfh', 'Male', '64065', 'dhitgano@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-78167', 'adrian', 'dominic', 'soldao', 'rizal', 'Male', '05549222454', 'adriansoldao@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-82295', 'test', 'test', 'tst', 'test', 'Female', '985406210', 'tttest@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-83248', 'John Carlo', 'Busano', 'Jabay', 'Blk 18 Lot 13  Calamansian', 'Female', '091234566676654', 'carlosjabay@gmail.com', 'da95e756f715a1d95b9aa62928c57e37'),
('2019-87218', 'test', 'test', 'test', 'test', 'Female', '9365845215', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2019-88682', 'isol', 'rollan', 'song', 'old sta mesa manila', 'Female', '09562512914', 'solsong@gmail.com', '56849ffdb6b4b1aa0062ad824f68809f');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` int(10) NOT NULL,
  `GuestID` varchar(12) DEFAULT NULL,
  `RoomsReserved` varchar(250) NOT NULL,
  `RoomID` int(6) DEFAULT NULL,
  `NumberOfAdult` int(5) DEFAULT NULL,
  `NumberOfChild` int(5) DEFAULT NULL,
  `ReservationDate` date DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  `ExpirationDate` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `AmountPaid` varchar(10) DEFAULT NULL,
  `Photo` varchar(250) NOT NULL,
  `FDO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(6) NOT NULL,
  `RoomStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomStatus`) VALUES
(101, 'Occupied'),
(102, 'Occupied'),
(103, 'Occupied'),
(104, 'Occupied'),
(105, 'Unoccupied'),
(106, 'Occupied'),
(107, 'Occupied'),
(108, 'Occupied'),
(201, 'Unoccupied'),
(202, 'Unoccupied'),
(203, 'Unoccupied'),
(204, 'Unoccupied'),
(205, 'Unoccupied'),
(301, 'Unoccupied'),
(302, 'Unoccupied'),
(303, 'Unoccupied'),
(304, 'Unoccupied');

-- --------------------------------------------------------

--
-- Table structure for table `roominventory`
--

CREATE TABLE `roominventory` (
  `roominid` int(10) NOT NULL,
  `ReservationID` int(10) DEFAULT NULL,
  `RoomID` int(6) DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `RoomTypeID` varchar(6) NOT NULL,
  `RoomID` int(6) DEFAULT NULL,
  `RoomNumber` int(3) NOT NULL,
  `RoomRate` decimal(7,2) DEFAULT NULL,
  `RoomCapacity` int(2) DEFAULT NULL,
  `RoomType` text,
  `Description` text NOT NULL,
  `RoomPhoto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RoomTypeID`, `RoomID`, `RoomNumber`, `RoomRate`, `RoomCapacity`, `RoomType`, `Description`, `RoomPhoto`) VALUES
('110817', 204, 204, '1500.00', 4, 'Small Kubo', 'TV,</br>Bathroom</br>1 Beds', '67445-3.0.jpg'),
('199705', 106, 106, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '10363-dormitory2.jpg'),
('220326', 201, 201, '1500.00', 4, 'Small Kubo', 'TV,</br>Bathroom</br>1 Beds', '28741-3.0.jpg'),
('231082', 104, 104, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '71172-'),
('275521', 107, 107, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '56871-dormitory2.jpg'),
('375659', 105, 105, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '89237-'),
('430106', 202, 202, '1500.00', 4, 'Small Kubo', 'TV,</br>Bathroom</br>1 Beds', '19733-casa5.jpg'),
('502924', 304, 304, '2000.00', 6, 'Big Kubo House', 'TV,</br>Bathroom</br>4 Beds', '49796-bigkubo2.jpg'),
('5057', 205, 205, '1500.00', 4, 'Small Kubo', 'TV,</br>Bathroom</br>1 Beds', '78089-3.0.jpg'),
('555719', 108, 108, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '59073-dormitory2.jpg'),
('577281', 303, 303, '200.00', 6, 'Big Kubo House', 'TV,</br>Bathroom</br>4 Beds', '25276-bigkubo2.jpg'),
('591172', 101, 101, '2000.00', 6, 'Dormitory Clubhouse', 'one tv yes', '67227-dormitory2.jpg'),
('600675', 203, 203, '1500.00', 4, 'Small Kubo', 'TV,</br>Bathroom</br>1 Beds', '38252-casa5.jpg'),
('682905', 301, 301, '2000.00', 8, 'Big Kubo House', 'TV,</br>Bathroom</br>4 Beds', '15505-bigkubo2.jpg'),
('688114', 103, 103, '2000.00', 6, 'Dormitory Clubhouse', 'TV,</br>Bathroom</br>3 Beds', '3711-dormitory2.jpg'),
('704561', 102, 102, '2000.00', 6, 'Dormitory Clubhouse ', 'on shit', '90278-dormitory2.jpg'),
('920836', 302, 302, '2000.00', 8, 'Big Kubo House', 'TV,</br>Bathroom</br>4 Beds', '68357-bigkubo2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`AmenityID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`BillingID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`DiscountID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `GuestID` (`GuestID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `roominventory`
--
ALTER TABLE `roominventory`
  ADD PRIMARY KEY (`roominid`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RoomTypeID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `AmenityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `BillingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `DiscountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roominventory`
--
ALTER TABLE `roominventory`
  MODIFY `roominid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1169;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestId`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `roominventory`
--
ALTER TABLE `roominventory`
  ADD CONSTRAINT `roominventory_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `roomtype_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
