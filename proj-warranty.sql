-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 06:49 AM
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
('C001', 'A', '12345', '12345', '2018-11-29');

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
  `cus_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_date`, `orders_pay`, `orders_ship`, `orders_track`, `orders_amount`, `orders_status`, `staff_id`, `cus_id`) VALUES
('O001', '2018-11-29', NULL, NULL, NULL, 122500, 0, 'E001', 'C001');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `partner_id` varchar(5) COLLATE utf8_croatian_ci NOT NULL,
  `partner_name` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `partner_tel` varchar(10) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `partner_name`, `partner_tel`) VALUES
('P001', 'C', '12345');

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
('11', '1142n', '2018-11-29', 1, 'O001'),
('12', '1142n', '2018-11-29', 1, 'O001'),
('13', '1142n', '2018-11-29', 1, 'O001'),
('14', '1142n', '2018-11-29', 1, 'O001'),
('15', '1142n', '2018-11-29', 1, 'O001'),
('16', '1142n', '2018-11-29', 0, NULL),
('17', '1142n', '2018-11-29', 0, NULL),
('18', '1142n', '2018-11-29', 0, NULL),
('19', '1142n', '2018-11-29', 0, NULL),
('20', '1142n', '2018-11-29', 0, NULL),
('21', '3560g', '2018-11-29', 1, 'O001'),
('22', '3560g', '2018-11-29', 1, 'O001'),
('23', '3560g', '2018-11-29', 1, 'O001'),
('24', '3560g', '2018-11-29', 1, 'O001'),
('25', '3560g', '2018-11-29', 1, 'O001'),
('26', '3560g', '2018-11-29', 0, NULL),
('27', '3560g', '2018-11-29', 0, NULL),
('28', '3560g', '2018-11-29', 0, NULL),
('29', '3560g', '2018-11-29', 0, NULL),
('30', '3560g', '2018-11-29', 0, NULL),
('31', '4404', '2018-11-29', 1, 'O001'),
('32', '4404', '2018-11-29', 1, 'O001'),
('33', '4404', '2018-11-29', 1, 'O001'),
('34', '4404', '2018-11-29', 1, 'O001'),
('35', '4404', '2018-11-29', 1, 'O001'),
('36', '4404', '2018-11-29', 0, NULL),
('37', '4404', '2018-11-29', 0, NULL),
('38', '4404', '2018-11-29', 0, NULL),
('39', '4404', '2018-11-29', 0, NULL),
('40', '4404', '2018-11-29', 0, NULL);

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
(1, 'O001', '1142n', 5),
(2, 'O001', '3560g', 5),
(3, 'O001', '4404', 5);

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
('E001', 'B', '12345');

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
('1142n', 'Cisco Aironet AIR-LAP1142N-A-K9', 1800, 100, 5),
('3560g', 'Cisco Catalyst WS-C3560-24PS-S', 12000, 300, 5),
('4404', 'Cisco WLC AIR-WLC4404-100-K9', 10000, 300, 5);

--
-- Indexes for dumped tables
--

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
  ADD KEY `staff_id` (`staff_id`);

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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
