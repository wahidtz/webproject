-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 10:43 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_ms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assetinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_assetinfo` (
  `sl_id` int(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `storage_location` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL,
  `checkin_date` timestamp(6) NULL DEFAULT NULL,
  `remarks` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `fitness` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assetinfo`
--

INSERT INTO `tbl_assetinfo` (`sl_id`, `model_name`, `storage_location`, `availability`, `color`, `asset_code`, `checkin_date`, `remarks`, `price`, `fitness`) VALUES
(3, 'Samsung Galaxy A51', 'Cabinet 1', 'In Stock', 'Silver', 'S20201204002', '2020-12-29 08:04:41.000000', '', 340000, 'Used'),
(4, 'Samsung Galaxy A50', 'Not defined', 'Borrowed', 'Silver', 'S20201204001', '2020-12-29 08:29:16.000000', 'Raihan borrowed device', 500000, NULL),
(5, ' iPhone 12 Pro Max', 'Not defined', 'Sold', 'Silver', 'S20201204006', '2020-12-29 09:27:33.000000', '', 135000, NULL),
(6, 'Galaxy Note20 Ultra', 'Cabinet 3', 'In Stock', 'Blue', 'S20201204005', '2020-12-29 09:28:01.000000', '', 99000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrow_lost_others`
--

CREATE TABLE IF NOT EXISTS `tbl_borrow_lost_others` (
  `id` int(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_borrow_lost_others`
--

INSERT INTO `tbl_borrow_lost_others` (`id`, `asset_code`, `activity`, `details`, `user_id`, `date`) VALUES
(1, 'S20201204001', 'Borrow', 'Raihan Borrowed the device', 'gofran.khan', '2020-12-29 09:30:01.000000'),
(2, 'S20201204001', 'Received', 'Raihan return deice', 'gofran.khan', '2020-12-29 09:41:38.000000'),
(3, 'S20201204001', 'Borrow', 'Raihan borrowed device', 'gofran.khan', '2020-12-29 09:42:28.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_devicelist`
--

CREATE TABLE IF NOT EXISTS `tbl_devicelist` (
  `id` int(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `device_type` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `operating_system` varchar(100) NOT NULL,
  `init_price` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_devicelist`
--

INSERT INTO `tbl_devicelist` (`id`, `model_name`, `device_type`, `company`, `operating_system`, `init_price`) VALUES
(1, 'Samsung Galaxy A51', 'Phone', 'Samsung', 'Android 10.0', 345),
(2, 'Samsung Galaxy A50', 'Phone', 'Samsung', 'Android 10.0', 500000),
(3, ' iPhone 12 Pro Max', 'Phone', 'Apple', 'iOS 14.1', 135000),
(4, 'iPhone 11 Pro', 'Phone', 'Apple', 'iOS 13', 120000),
(5, 'iPad Pro 11', 'Tablet', 'Apple', 'iPadOS 13.4', 100000),
(6, 'iPad Pro 10.5', 'Tablet', 'Apple', 'iOS 10.3.2', 80000),
(7, 'Watch Series 4', 'Wearable', 'Apple', 'watchOS 5.0', 48000),
(8, 'Watch Series 3', 'Wearable', 'Apple', 'watchOS 4.0', 36000),
(9, 'Galaxy S20 FE 5G', 'Phone', 'Samsung', 'Android 10.0', 100000),
(10, 'Galaxy Note20 Ultra', 'Phone', 'Samsung', 'Android 10.0', 99000),
(11, 'Galaxy Tab S6 5G', 'Tablet', 'Samsung', 'Android 10.0', 45000),
(12, 'Galaxy Watch3', 'Wearable', 'Samsung', 'Tizen-based wearable OS 5.5', 28000),
(13, 'Redmi Note 9 Pro 5G', 'Phone', 'Xiaomi', 'Android 10', 35000),
(14, 'Mi Watch Lite', 'Wearable', 'Xiaomi', '', 45000),
(15, 'Reno5 Pro 5G', 'Phone', 'Oppo', 'Android 11', 50000),
(16, 'Oppo Watch', 'Wearable', 'Oppo', 'Android Wear OS - International', 30000),
(17, 'Poco X3', 'Phone', 'Xiaomi', 'Android 10.0', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `access_type` varchar(100) NOT NULL,
  `mobile` int(100) NOT NULL,
  `desk_location` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `name`, `emp_id`, `designation`, `access_type`, `mobile`, `desk_location`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Asset Management System for Mobile Shop', 2020001, 'Sr. System Administrator', 'admin', 1234567890, 'Not defined'),
(5, 'gofran.khan', '36baadcd8a4bf71ea1ed88f3363190a8', 'Md. Gofran Khan', 2020003, 'Engineer', 'admin', 1911234567, 'Level 8'),
(6, 'gofrankhan', 'f6e4606d827110bfd6413821db0d55ef', 'Md. Gofran Khan', 2020004, 'Software Engineer', 'user', 1911987654, 'Level 3'),
(7, 'nitol.saha', '36baadcd8a4bf71ea1ed88f3363190a8', 'Nitol Saha', 2020005, 'Sr. System Administrator', 'admin', 738737828, 'Level 8'),
(8, 'anika.oshin', '36baadcd8a4bf71ea1ed88f3363190a8', 'Anika Oshin', 2020006, 'Sr. System Administrator', 'admin', 1111111111, 'Level 3'),
(9, 'Muntasir Wahid Turza', '36baadcd8a4bf71ea1ed88f3363190a8', 'muntasir.wahid', 2020007, 'Sr. System Administrator', 'admin', 222222222, 'Level 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soldout`
--

CREATE TABLE IF NOT EXISTS `tbl_soldout` (
  `id` int(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soldout`
--

INSERT INTO `tbl_soldout` (`id`, `asset_code`, `customer_name`, `customer_phone`, `customer_address`, `user_id`, `date`) VALUES
(1, 'S20201204006', 'Md. Yasin Khan', '01920998854', 'Savar, Dhaka', 'gofran.khan', '2020-12-29 09:29:20.000000'),
(2, 'S20201204006', 'Md. Yasin Khan', '01920998854', 'Savar, Dhaka', 'gofran.khan', '2020-12-29 09:29:21.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assetinfo`
--
ALTER TABLE `tbl_assetinfo`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `tbl_borrow_lost_others`
--
ALTER TABLE `tbl_borrow_lost_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_devicelist`
--
ALTER TABLE `tbl_devicelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_soldout`
--
ALTER TABLE `tbl_soldout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assetinfo`
--
ALTER TABLE `tbl_assetinfo`
  MODIFY `sl_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_borrow_lost_others`
--
ALTER TABLE `tbl_borrow_lost_others`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_devicelist`
--
ALTER TABLE `tbl_devicelist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_soldout`
--
ALTER TABLE `tbl_soldout`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
