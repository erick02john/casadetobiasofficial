-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2018 at 09:06 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--

--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `UserID` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `ContactNo` int(15) NOT NULL,
  `UserType` varchar(15) NOT NULL,
  `UserStatus` varchar(15) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`UserID`, `Username`, `Password`, `FullName`, `ContactNo`, `UserType`, `UserStatus`) VALUES
('2018-123', 'davepaul', 'test', 'Dave Paul Garcia', 91234567, 'Admin', 'Active'),
('2018-33062', 'dave', 'test', 'Dave Paul Garcia', 2147483647, 'Frontdesk', 'Active'),
('2018-79104', 'test', 'test', 'test', 908089, 'Frontdesk', 'Active'),
('784', 'cathann', 'test', 'Cathrina Ann Esquejo', 9999999, 'Frontdesk', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE IF NOT EXISTS `amenity` (
  `AmenityID` int(11) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(10) DEFAULT NULL,
  `AmenityType` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `AmenityPrice` decimal(10,2) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`AmenityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`AmenityID`, `ReservationID`, `AmenityType`, `Quantity`, `AmenityPrice`, `Description`) VALUES
(64, 0, '', 0, '0.00', ''),
(65, 3523, 'Bar', 1, '100.00', 'Beer'),
(66, 3523, 'Toiletries', 2, '20.00', 'Soap'),
(67, 1377, 'Swimmingpool', 1, '200.00', 'Entrance fee');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `BillingID` int(10) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(10) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `PaidAmount` decimal(10,2) DEFAULT NULL,
  `Balance` decimal(10,2) DEFAULT NULL,
  `BillingStatus` varchar(15) NOT NULL,
  `ModeOfPayment` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`BillingID`),
  KEY `ReservationID` (`ReservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`BillingID`, `ReservationID`, `TotalAmount`, `PaidAmount`, `Balance`, `BillingStatus`, `ModeOfPayment`) VALUES
(121, 8591, '12000.00', '6000.00', '6000.00', 'Pending', 'Bank Deposit'),
(122, 1377, '9200.00', '9000.00', '200.00', 'Pending', 'Paypal'),
(123, 8844, '2000.00', '2000.00', '0.00', 'Fully Paid', 'Cash'),
(124, 8656, '9000.00', '0.00', '9000.00', 'Pending', 'Bank Deposit'),
(126, 3523, '4340.00', '5200.00', '-860.00', 'Pending', 'Paypal'),
(127, 3418, '39000.00', '19500.00', '19500.00', 'Pending', 'Bank Deposit'),
(128, 9375, '5280.00', '3000.00', '2280.00', 'Pending', 'Bank Deposit'),
(129, 8059, '5400.00', '5400.00', '0.00', 'Fully Paid', 'Paypal'),
(130, 1070, '6000.00', '6000.00', '0.00', 'Fully Paid', 'Paypal'),
(131, 4740, '7600.00', '0.00', '7600.00', 'Pending', 'Cash'),
(132, 1702, '4000.00', '4000.00', '0.00', 'Fully Paid', 'Paypal'),
(133, 340, '21000.00', '21000.00', '0.00', 'Fully Paid', 'Paypal'),
(134, 9826, '24000.00', '12000.00', '12000.00', 'Pending', 'Bank Deposit'),
(135, 9029, '18000.00', '0.00', '18000.00', 'Pending', 'Cash'),
(136, 4071, '6000.00', '4500.00', '1500.00', 'Pending', 'Paypal'),
(137, 5937, '57000.00', '0.00', '57000.00', 'Pending', 'Bank Deposit'),
(138, 7314, '4000.00', '2000.00', '2000.00', 'Pending', 'Bank Deposit'),
(139, 4808, '49400.00', '24700.00', '24700.00', 'Pending', 'Paypal'),
(140, 9130, '72000.00', '0.00', '72000.00', 'Pending', 'Bank Deposit'),
(141, 2522, '20400.00', '0.00', '20400.00', 'Pending', 'Bank Deposit'),
(142, 5483, '9000.00', '0.00', '9000.00', 'Pending', 'Bank Deposit'),
(143, 1911, '3800.00', '0.00', '3800.00', 'Pending', 'Bank Deposit'),
(144, 2111, '12000.00', '6000.00', '6000.00', 'Pending', 'Bank Deposit'),
(145, 1625, '0.00', '0.00', '0.00', 'Pending', ''),
(146, 1317, '3000.00', '1500.00', '1500.00', 'Pending', 'Bank Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `DiscountID` int(11) NOT NULL AUTO_INCREMENT,
  `DiscountType` varchar(50) DEFAULT NULL,
  `DiscountPercent` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`DiscountID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`DiscountID`, `DiscountType`, `DiscountPercent`) VALUES
(1, 'Senior citizen', '0.12'),
(4, 'Student', '0.20'),
(5, 'Free Room', '1.00'),
(6, '50 OFF', '0.50'),
(7, 'Corporate', '0.10');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `GuestId` varchar(12) NOT NULL,
  `GuestFName` varchar(50) NOT NULL,
  `GuestMName` varchar(50) NOT NULL,
  `GuestLName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`GuestId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestId`, `GuestFName`, `GuestMName`, `GuestLName`, `Address`, `Gender`, `ContactNumber`, `Email`, `Password`) VALUES
('2018-11660', 'Cath', 'Ann', 'Esquejo', 'Sta. Cruz Village Borol 1st Balagtas, Bulacan', 'Female', '09125652789', 'cathann09@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-14920', 'Dave Paul', 'Cabalagnan', 'Garcia', 'Sta. mesa', 'Male', '9084566863', 'davepaulgarciia@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2018-17187', 'Dave Paul', 'C', 'Garcia', 'Manila', 'Male', '0999999123', 'davepaulgarcia@g.com', '098f6bcd4621d373cade4e832627b4f6'),
('2018-20627', 'GGFF', 'gygg', 'gygy', 'AFafdysgduhsgdbj', 'Female', '091212133323', 'lorainnelati@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-22491', 'Theresse', 'G', 'Garcera', 'Test Address', 'Female', '09051234567', 'garceratheresse@yahoo.com', '32250170a0dca92d53ec9624f336ca24'),
('2018-24906', 'Dave', 'Paul', 'Garcia', 'Sta. Mesa', 'Male', '09084566863', 'davepaulgarciia@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-27993', 'mikaella', 'haha', 'baldos', 'mang kanor street tondo', 'Female', '09691234567', 'mikaellabaldos@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2018-32418', 'havana', 'oh ', 'nana', 'havana oh nana 123456 st', 'Male', '09461234567', 'havana@g.com', NULL),
('2018-37890', 'lorainne', 'jill', 'lati', '612 pasig City', 'Female', '09056136403', 'lorainnelati@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('2018-41650', 'test', 'test', 'testq', 'test', 'Female', '0912467899', 'hys7db7sy@g.com', '098f6bcd4621d373cade4e832627b4f6'),
('2018-49357', 'Toffee', 'Anthony', 'Esquejoo', 'Bulakan, Bulacan', 'Male', '0987624849', 'toffee@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-51935', 'Camille', 'Ann', 'Esquejo', 'Sta. Cruz Village Balagtas, Bulacan', 'Female', '09256485164', 'camilleann02@gmail.com', NULL),
('2018-54984', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('2018-59269', 'Seojoon', 'Pogi', 'Park', 'Seoul, South Korea', 'Male', '09123456789', 'parkseojoonnim@gmail.com', NULL),
('2018-59665', 'daveriel', 'cedricks', 'halili', '3300 2nd street, V. mapa, sta. mesa, manila', 'Male', '09499110027', 'dave.cedricks@gmail.com', 'fb4806b851d568028d36bfa7fa03e035'),
('2018-62281', 'Asd', 'F', 'Wer', 'FaBGhhagghhhdghv', 'Male', '32333122222', 'dzzt.caamic@yahoo.com', '202cb962ac59075b964b07152d234b70'),
('2018-63654', 'Jeup', 'Yass', 'Imfact', 'Daehan Mingukkkkk', 'Male', '021554644545', 'jeup@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-67025', 'Sgfkhjlj', 'hggkjgl', 'fKHKGL', 'Adhgklh;lj;;kbnmb,nlkuko;', 'Male', '09546138547', 'adsf@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-68425', 'Gong', 'Gong', 'Gong', '132 jbjlkbklnl kjbohoh', 'Male', '0354844696', 'gonggong@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-70097', 'asdsd', 'adadsd', 'adsds', 'addadss', 'Male', '099667584563', 'asdada@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('2018-73494', 'Ann', 'Yo', 'Park', 'Quezon City', 'Female', '09457856314', 'babyboyjiyong@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
('2018-79470', 'Camela Gail', 'cruz', 'Enbien', '12 Rosario Pasig City', 'Female', '09168387608', 'CamelaEnbien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('2018-86762', 'Roy', 'Bahillo', 'Callope', 'Sampaloc Manila', 'Male', '09209463906', 'rbcallope@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('2018-90810', 'Dave Paul', 'Cabalagnan', 'Garcia', 'Sta. mesa', 'Male', '9084566863', 'davepaulgarciia@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('2018-93848', 'a', 'a', 'a', 'a', 'Male', '1212', 'aaa@yahoo.com', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
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
  `FDO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `GuestID` (`GuestID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `GuestID`, `RoomsReserved`, `RoomID`, `NumberOfAdult`, `NumberOfChild`, `ReservationDate`, `CheckInDate`, `CheckOutDate`, `ExpirationDate`, `Status`, `AmountPaid`, `Photo`, `FDO`) VALUES
(340, '2018-63654', ' 101', NULL, 2, NULL, '2018-02-18', '2018-03-14', '2018-03-21', '2018-02-25', 'Reserved', NULL, '', NULL),
(1070, '2018-73494', ' 101', NULL, 2, NULL, '2018-02-18', '2018-10-09', '2018-10-11', '2018-02-25', 'Checked-in', NULL, '', NULL),
(1317, '2018-20627', ' 101', NULL, 2, NULL, '2018-03-19', '2018-03-21', '2018-03-22', '2018-03-22', 'Reserved', NULL, '5263-meditation-photography-wallpaper-4.jpg', NULL),
(1377, '2018-24906', ' 101', NULL, 2, NULL, '2018-02-17', '2018-05-15', '2018-05-18', '2018-02-24', 'Checked-in', NULL, '', NULL),
(1625, '2018-54984', '', NULL, 0, NULL, '2018-03-18', '0000-00-00', '0000-00-00', '2018-03-25', 'Pending', NULL, '', NULL),
(1702, '2018-67025', ' 205 210 208 202', NULL, 8, NULL, '2018-02-18', '2018-05-16', '2018-05-17', '2018-02-25', 'Reserved', NULL, '', NULL),
(1911, '2018-70097', ' 707', NULL, 2, NULL, '2018-03-18', '2018-03-18', '2018-03-19', '2018-03-19', 'No Show', NULL, '', NULL),
(2111, '2018-14920', ' 106 305', NULL, 4, NULL, '2018-03-18', '2018-03-18', '2018-03-20', '2018-03-20', 'Reserved', NULL, '88026-Transaction.PNG', NULL),
(2522, '2018-62281', ' 101 102 707 109 209 106', NULL, 7, NULL, '2018-03-12', '2018-03-13', '2018-03-14', '2018-03-14', 'No Show', NULL, '', NULL),
(3418, '2018-86762', ' 101 102 109 209 106 302 103 105 207 205 210 208 202 204 301', NULL, 30, NULL, '2018-02-17', '2018-02-23', '2018-02-24', '2018-02-24', 'Checked-out', NULL, '49190-FA34101B-C647-423B-8E07-5F371213FFA9.jpeg', 'Cathrina Ann Esquejo'),
(3523, '2018-22491', ' 205', NULL, 6, NULL, '2018-02-17', '2018-02-24', '2018-02-25', '2018-02-25', 'Checked-out', NULL, '', 'Cathrina Ann Esquejo'),
(4071, '2018-11660', ' 205', NULL, 2, NULL, '2018-02-18', '2018-08-14', '2018-08-17', '2018-02-25', 'Reserved', NULL, '', NULL),
(4740, '2018-59269', ' 202 204 301', NULL, 8, NULL, '2018-02-18', '2018-03-12', '2018-03-13', NULL, 'No Show', NULL, '', NULL),
(4808, '2018-27993', ' 102', NULL, 3, NULL, '2018-02-20', '2018-03-20', '2018-04-02', '2018-02-27', 'Reserved', NULL, '', NULL),
(5483, '2018-93848', ' 305 302 303', NULL, 3, NULL, '2018-03-13', '2018-03-13', '2018-03-14', '2018-03-14', 'No Show', NULL, '', NULL),
(5937, '2018-49357', ' 101 102 103 105 207 202 204', NULL, 14, NULL, '2018-02-18', '2018-03-08', '2018-03-11', '2018-02-25', 'Pending', NULL, '', NULL),
(7314, '2018-73494', ' 205 210', NULL, 3, NULL, '2018-02-18', '2018-02-18', '2018-02-19', '2018-02-20', 'No Show', NULL, '60065-20170129_102748.jpg', NULL),
(8059, '2018-59665', ' 102', NULL, 5, NULL, '2018-02-18', '2018-02-18', '2018-02-19', '2018-02-19', 'No Show', NULL, '', NULL),
(8591, '2018-11660', ' 101 102', NULL, 4, NULL, '2018-02-16', '2018-03-20', '2018-03-22', '2018-02-23', 'Checked-in', NULL, '', NULL),
(8656, '2018-49357', ' 101', NULL, 2, NULL, '2018-02-17', '2018-02-17', '2018-02-20', '2018-02-20', 'No Show', NULL, '', NULL),
(8844, '2018-32418', ' 205', NULL, 2, NULL, '2018-02-17', '2018-02-17', '2018-02-18', NULL, 'Checked-out', NULL, '', NULL),
(9029, '2018-51935', ' 102 109 209', NULL, 6, NULL, '2018-02-18', '2018-03-17', '2018-03-19', NULL, 'No Show', NULL, '', NULL),
(9130, '2018-41650', ' 101 102 109 209 106 305 302 303 103 105 123 207', NULL, 2, NULL, '2018-02-20', '2018-02-24', '2018-02-26', '2018-02-26', 'Pending', NULL, '', NULL),
(9375, '2018-90810', ' 102', NULL, 2, NULL, '2018-02-18', '2018-02-20', '2018-02-22', '2018-02-22', 'Reserved', NULL, '80101-20294297_1700002700306945_671622748617360571_n.jpg', NULL),
(9826, '2018-68425', ' 101 102 109 209', NULL, 8, NULL, '2018-02-18', '2018-05-22', '2018-05-24', '2018-02-25', 'Reserved', NULL, '44417-DSC_0111.JPG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` int(6) NOT NULL,
  `RoomStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomStatus`) VALUES
(24, 'Unoccupied'),
(25, 'Occupied'),
(101, 'Unoccupied'),
(102, 'Unoccupied'),
(103, 'Unoccupied'),
(104, 'Unoccupied'),
(105, 'Unoccupied'),
(106, 'Unoccupied'),
(109, 'Unoccupied'),
(123, 'Unoccupied'),
(202, 'Unoccupied'),
(204, 'Unoccupied'),
(205, 'Unoccupied'),
(207, 'Unoccupied'),
(208, 'Unoccupied'),
(209, 'Unoccupied'),
(210, 'Unoccupied'),
(301, 'Unoccupied'),
(302, 'Unoccupied'),
(303, 'Unoccupied'),
(304, 'Unoccupied'),
(305, 'Unoccupied'),
(306, 'Unoccupied'),
(309, 'Unoccupied'),
(707, 'Unoccupied');

-- --------------------------------------------------------

--
-- Table structure for table `roominventory`
--

CREATE TABLE IF NOT EXISTS `roominventory` (
  `roominid` int(10) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(10) DEFAULT NULL,
  `RoomID` int(6) DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`roominid`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1056 ;

--
-- Dumping data for table `roominventory`
--

INSERT INTO `roominventory` (`roominid`, `ReservationID`, `RoomID`, `CheckInDate`, `CheckOutDate`, `Status`) VALUES
(976, 8591, 101, '2018-03-20', '2018-03-22', 'Checked-in'),
(977, 8591, 102, '2018-03-20', '2018-03-22', 'Checked-in'),
(978, 1377, 101, '2018-05-15', '2018-05-18', 'Checked-in'),
(979, 8844, 205, '2018-02-17', '2018-02-18', 'Checked-out'),
(980, 8656, 101, '2018-02-17', '2018-02-20', 'No Show'),
(981, 3523, 205, '2018-02-24', '2018-02-25', 'Checked-out'),
(982, 3418, 101, '2018-02-23', '2018-02-24', 'Checked-out'),
(983, 3418, 102, '2018-02-23', '2018-02-24', 'Checked-out'),
(984, 3418, 109, '2018-02-23', '2018-02-24', 'Checked-out'),
(985, 3418, 209, '2018-02-23', '2018-02-24', 'Checked-out'),
(986, 3418, 106, '2018-02-23', '2018-02-24', 'Checked-out'),
(987, 3418, 302, '2018-02-23', '2018-02-24', 'Checked-out'),
(988, 3418, 103, '2018-02-23', '2018-02-24', 'Checked-out'),
(989, 3418, 105, '2018-02-23', '2018-02-24', 'Checked-out'),
(990, 3418, 207, '2018-02-23', '2018-02-24', 'Checked-out'),
(991, 3418, 205, '2018-02-23', '2018-02-24', 'Checked-out'),
(992, 3418, 210, '2018-02-23', '2018-02-24', 'Checked-out'),
(993, 3418, 208, '2018-02-23', '2018-02-24', 'Checked-out'),
(994, 3418, 202, '2018-02-23', '2018-02-24', 'Checked-out'),
(995, 3418, 204, '2018-02-23', '2018-02-24', 'Checked-out'),
(996, 3418, 301, '2018-02-23', '2018-02-24', 'Checked-out'),
(997, 9375, 102, '2018-02-20', '2018-02-22', 'Reserved'),
(998, 8059, 102, '2018-02-18', '2018-02-19', 'No Show'),
(999, 1070, 101, '2018-10-09', '2018-10-11', 'Checked-in'),
(1000, 4740, 202, '2018-03-12', '2018-03-13', 'No Show'),
(1001, 4740, 204, '2018-03-12', '2018-03-13', 'No Show'),
(1002, 4740, 301, '2018-03-12', '2018-03-13', 'No Show'),
(1003, 1702, 205, '2018-05-16', '2018-05-17', 'Reserved'),
(1004, 1702, 210, '2018-05-16', '2018-05-17', 'Reserved'),
(1005, 1702, 208, '2018-05-16', '2018-05-17', 'Reserved'),
(1006, 1702, 202, '2018-05-16', '2018-05-17', 'Reserved'),
(1007, 340, 101, '2018-03-14', '2018-03-21', 'Reserved'),
(1008, 9826, 101, '2018-05-22', '2018-05-24', 'Reserved'),
(1009, 9826, 102, '2018-05-22', '2018-05-24', 'Reserved'),
(1010, 9826, 109, '2018-05-22', '2018-05-24', 'Reserved'),
(1011, 9826, 209, '2018-05-22', '2018-05-24', 'Reserved'),
(1012, 9029, 102, '2018-03-17', '2018-03-19', 'No Show'),
(1013, 9029, 109, '2018-03-17', '2018-03-19', 'No Show'),
(1014, 9029, 209, '2018-03-17', '2018-03-19', 'No Show'),
(1016, 4071, 205, '2018-08-14', '2018-08-17', 'Pending'),
(1017, 5937, 101, '2018-03-08', '2018-03-11', 'Pending'),
(1018, 5937, 102, '2018-03-08', '2018-03-11', 'Pending'),
(1019, 5937, 103, '2018-03-08', '2018-03-11', 'Pending'),
(1020, 5937, 105, '2018-03-08', '2018-03-11', 'Pending'),
(1021, 5937, 207, '2018-03-08', '2018-03-11', 'Pending'),
(1022, 5937, 202, '2018-03-08', '2018-03-11', 'Pending'),
(1023, 5937, 204, '2018-03-08', '2018-03-11', 'Pending'),
(1028, 7314, 205, '2018-02-19', '2018-02-20', 'No Show'),
(1029, 7314, 210, '2018-02-19', '2018-02-20', 'No Show'),
(1030, 4808, 102, '2018-03-20', '2018-04-02', 'Reserved'),
(1031, 9130, 101, '2018-02-24', '2018-02-26', 'Pending'),
(1032, 9130, 102, '2018-02-24', '2018-02-26', 'Pending'),
(1033, 9130, 109, '2018-02-24', '2018-02-26', 'Pending'),
(1034, 9130, 209, '2018-02-24', '2018-02-26', 'Pending'),
(1035, 9130, 106, '2018-02-24', '2018-02-26', 'Pending'),
(1036, 9130, 305, '2018-02-24', '2018-02-26', 'Pending'),
(1037, 9130, 302, '2018-02-24', '2018-02-26', 'Pending'),
(1038, 9130, 303, '2018-02-24', '2018-02-26', 'Pending'),
(1039, 9130, 103, '2018-02-24', '2018-02-26', 'Pending'),
(1040, 9130, 105, '2018-02-24', '2018-02-26', 'Pending'),
(1041, 9130, 123, '2018-02-24', '2018-02-26', 'Pending'),
(1042, 9130, 207, '2018-02-24', '2018-02-26', 'Pending'),
(1043, 2522, 101, '2018-03-13', '2018-03-14', 'No Show'),
(1044, 2522, 102, '2018-03-13', '2018-03-14', 'No Show'),
(1045, 2522, 707, '2018-03-13', '2018-03-14', 'No Show'),
(1046, 2522, 109, '2018-03-13', '2018-03-14', 'No Show'),
(1047, 2522, 209, '2018-03-13', '2018-03-14', 'No Show'),
(1048, 2522, 106, '2018-03-13', '2018-03-14', 'No Show'),
(1049, 5483, 305, '2018-03-13', '2018-03-14', 'No Show'),
(1050, 5483, 302, '2018-03-13', '2018-03-14', 'No Show'),
(1051, 5483, 303, '2018-03-13', '2018-03-14', 'No Show'),
(1052, 1911, 707, '2018-03-18', '2018-03-19', 'No Show'),
(1053, 2111, 106, '2018-03-18', '2018-03-20', 'Reserved'),
(1054, 2111, 305, '2018-03-18', '2018-03-20', 'Reserved'),
(1055, 1317, 101, '2018-03-21', '2018-03-22', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE IF NOT EXISTS `roomtype` (
  `RoomTypeID` varchar(6) NOT NULL,
  `RoomID` int(6) DEFAULT NULL,
  `RoomNumber` int(3) NOT NULL,
  `RoomRate` decimal(7,2) DEFAULT NULL,
  `RoomCapacity` int(2) DEFAULT NULL,
  `RoomType` text,
  `Description` text NOT NULL,
  `RoomPhoto` varchar(250) NOT NULL,
  PRIMARY KEY (`RoomTypeID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RoomTypeID`, `RoomID`, `RoomNumber`, `RoomRate`, `RoomCapacity`, `RoomType`, `Description`, `RoomPhoto`) VALUES
('1210', 202, 202, '2000.00', 5, 'Superior(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '76065-84624-supdouble.jpg'),
('1212', 204, 204, '2000.00', 5, 'Superior(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '76065-84624-supdouble.jpg'),
('1213', 205, 205, '2000.00', 5, 'Superior(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '96280-supsingle.jpg'),
('124', 101, 101, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('125', 102, 102, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('126', 103, 103, '3000.00', 8, 'Presidential(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '82060-preDouble.jpg'),
('128', 105, 105, '3000.00', 8, 'Presidential(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '82060-preDouble.jpg'),
('137383', 707, 707, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('161048', 109, 109, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('188628', 209, 209, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('226183', 123, 123, '3000.00', 8, 'Presidential(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '82060-preDouble.jpg'),
('276972', 106, 106, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('301060', 306, 306, '2000.00', 5, 'Superior(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', ''),
('319627', 305, 305, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('335558', 210, 210, '2000.00', 5, 'Superior(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '96280-supsingle.jpg'),
('421682', 301, 301, '2000.00', 5, 'Superior(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '76065-84624-supdouble.jpg'),
('600843', 302, 302, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('652253', 309, 309, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', ''),
('690554', 304, 304, '2000.00', 5, 'Superior(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '96280-supsingle.jpg'),
('767499', 208, 208, '2000.00', 5, 'Superior(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '96280-supsingle.jpg'),
('857799', 303, 303, '3000.00', 8, 'Presidential(Queen Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '29955-20294297_1700002700306945_671622748617360571_n.jpg'),
('997974', 207, 207, '3000.00', 8, 'Presidential(Twin Sized-Bed)', 'Breakfast and swimming pool pass for 2 persons', '82060-preDouble.jpg');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
