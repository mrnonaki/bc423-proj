-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 08:23 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj-warranty`
--

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `claim_id` int(11) NOT NULL,
  `claim_date` date NOT NULL,
  `old_sn` varchar(20) NOT NULL,
  `new_sn` varchar(20) NOT NULL,
  `claim_reason` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`claim_id`, `claim_date`, `old_sn`, `new_sn`, `claim_reason`) VALUES
(1, '2018-11-29', 'FOC1342W4MR', 'FOC1134Y1UX', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(5) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_addr` varchar(500) NOT NULL,
  `cus_tel` varchar(10) NOT NULL,
  `cus_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_addr`, `cus_tel`, `cus_reg`) VALUES
('C001', 'May', 'Bangkok University', '0900786795', '2018-11-29'),
('C002', 'ภคภูมิ นิมิหุต', '304  บางหว้า กรุงเทพมหานคร ', '0867563482', '2018-11-29'),
('C003', 'ณัฏฐา พรสกุลไพศาล', '420  ถนนรามอินทรา เขตบางเขน กรุงเทพมหานคร', '0986756657', '2018-11-29'),
('C004', 'ธัญญ่า มาร์เรน', '55   ถนนร่มเกล้า เขตลาดกระบัง\r\nกรุงเทพมหานคร', '0986785769', '2018-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(5) NOT NULL,
  `orders_date` date NOT NULL,
  `orders_pay` date DEFAULT NULL,
  `orders_ship` date DEFAULT NULL,
  `orders_track` varchar(20) DEFAULT NULL,
  `orders_amount` int(11) NOT NULL,
  `orders_status` int(11) NOT NULL,
  `staff_id` varchar(5) NOT NULL,
  `cus_id` varchar(5) NOT NULL,
  `partner_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_date`, `orders_pay`, `orders_ship`, `orders_track`, `orders_amount`, `orders_status`, `staff_id`, `cus_id`, `partner_id`) VALUES
('O001', '2018-11-29', '2018-11-29', '2018-11-29', '1234567890', 24500, 2, 'E001', 'C001', 'P001'),
('O002', '2018-11-29', '2018-11-29', '2018-11-29', '12345', 24500, 2, 'E004', 'C004', 'P001'),
('O003', '2018-11-29', '2018-11-29', '2018-11-29', 'TEPA000927073', 1900, 2, 'E001', 'C002', 'P001'),
('O004', '2018-11-29', '2018-11-29', NULL, NULL, 36700, 1, 'E001', 'C002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `partner_id` varchar(5) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `partner_name`, `partner_tel`) VALUES
('P001', 'Kerry Express', '1217');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_sn` varchar(20) NOT NULL,
  `type_id` varchar(5) NOT NULL,
  `prod_in` date NOT NULL,
  `prod_status` int(11) NOT NULL,
  `orders_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_sn`, `type_id`, `prod_in`, `prod_status`, `orders_id`) VALUES
('FGL1709ZJJF', '4404', '2018-11-29', 2, 'O001'),
('FGL1709ZJJM', '4404', '2018-11-29', 3, 'O002'),
('FGL1709ZM0D', '4404', '2018-11-29', 0, NULL),
('FGL1709ZN4V', '4404', '2018-11-29', 0, NULL),
('FGL1709ZN5E', '4404', '2018-11-29', 0, NULL),
('FGL1709ZNA4', '4404', '2018-11-29', 0, NULL),
('FGL1709ZNAK', '4404', '2018-11-29', 0, NULL),
('FGL1709ZNH5', '4404', '2018-11-29', 0, NULL),
('FGL1709ZNHH', '4404', '2018-11-29', 0, NULL),
('FGL1709ZNJ0', '4404', '2018-11-29', 0, NULL),
('FOC1133Y4V2', '3560g', '2018-11-29', 2, 'O001'),
('FOC1133Y4V6', '3560g', '2018-11-29', 0, NULL),
('FOC1134Y1TS', '3560g', '2018-11-29', 0, NULL),
('FOC1134Y1UX', '3560g', '2018-11-29', 5, 'O002'),
('FOC1342W4MR', '3560g', '2018-11-29', 4, 'O002'),
('FTX1504E5WG', '1142n', '2018-11-29', 2, 'O001'),
('FTX1508K102', '1142n', '2018-11-29', 3, 'O002'),
('FTX1510K2CJ', '1142n', '2018-11-29', 0, NULL),
('FTX1526K6V3', '1142n', '2018-11-29', 0, NULL),
('FTX1544K5JA', '1142n', '2018-11-29', 0, NULL),
('FTX1622E1YN', '1142n', '2018-11-29', 0, NULL),
('FTX1622E4DZ', '1142n', '2018-11-29', 0, NULL),
('FTX1622K1X8', '1142n', '2018-11-29', 0, NULL),
('FTX1622K1YF', '1142n', '2018-11-29', 0, NULL),
('FTX1624E6C3', '1142n', '2018-11-29', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `orders_id` varchar(5) NOT NULL,
  `type_id` varchar(10) NOT NULL,
  `sales_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `orders_id`, `type_id`, `sales_count`) VALUES
(1, 'O001', '1142n', 1),
(2, 'O001', '3560g', 1),
(3, 'O001', '4404', 1),
(4, 'O002', '1142n', 1),
(5, 'O002', '3560g', 1),
(6, 'O002', '4404', 1),
(7, 'O003', '1142n', 1),
(8, 'O004', '1142n', 2),
(9, 'O004', '3560g', 1),
(10, 'O004', '4404', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(5) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_tel`) VALUES
('E001', 'Non', '0855109945'),
('E002', 'Mathinee', '0894758768'),
('E003', 'Somkanae', '0985986978'),
('E004', 'Saowanee', '0850746410');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` varchar(10) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_price` int(11) NOT NULL,
  `type_rate` int(11) NOT NULL,
  `type_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_price`, `type_rate`, `type_count`) VALUES
('1142n', 'Cisco Aironet AIR-LAP1142N-A-K9', 1800, 100, 8),
('3560g', 'Cisco Catalyst WS-C3560-24PS-S', 12000, 300, 3),
('4404', 'Cisco WLC AIR-WLC4404-100-K9', 10000, 300, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `old_sn` (`old_sn`),
  ADD KEY `new_sn` (`new_sn`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_sn`),
  ADD KEY `product_ibfk_1` (`type_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claim`
--
ALTER TABLE `claim`
  ADD CONSTRAINT `claim_ibfk_1` FOREIGN KEY (`old_sn`) REFERENCES `product` (`prod_sn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_ibfk_2` FOREIGN KEY (`new_sn`) REFERENCES `product` (`prod_sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
