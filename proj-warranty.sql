-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 09:34 PM
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
('C0001', 'A', 'AA', '12345', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(5) NOT NULL,
  `orders_date` date NOT NULL,
  `orders_pay` date NOT NULL,
  `orders_ship` date NOT NULL,
  `orders_track` varchar(20) NOT NULL,
  `orders_amount` int(11) NOT NULL,
  `orders_status` int(11) NOT NULL,
  `staff_id` varchar(5) NOT NULL,
  `cus_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_date`, `orders_pay`, `orders_ship`, `orders_track`, `orders_amount`, `orders_status`, `staff_id`, `cus_id`) VALUES
('O0001', '2018-11-25', '0000-00-00', '0000-00-00', '', 20000, 0, 'E0001', 'C0001');

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
('P0001', 'A', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_sn` varchar(20) NOT NULL,
  `prod_in` date NOT NULL,
  `prod_status` int(11) NOT NULL,
  `type_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_sn`, `prod_in`, `prod_status`, `type_id`) VALUES
('A', '2018-11-19', 0, '1142n'),
('B', '2018-11-19', 0, '3560g'),
('C', '2018-11-19', 0, '4404');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `orders_id` varchar(5) NOT NULL,
  `type_id` varchar(10) NOT NULL,
  `prod_sn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `orders_id`, `type_id`, `prod_sn`) VALUES
(1, 'O0001', '1142n', NULL),
(2, 'O0001', '1142n', NULL),
(3, 'O0001', '1142n', NULL),
(4, 'O0001', '1142n', NULL),
(5, 'O0001', '1142n', NULL),
(6, 'O0001', '1142n', NULL),
(7, 'O0001', '1142n', NULL),
(8, 'O0001', '1142n', NULL),
(9, 'O0001', '1142n', NULL),
(10, 'O0001', '1142n', NULL);

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
('E0001', 'A', '12345');

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
('1142n', 'Cisco Aironet AIR-LAP1142N-A-K9', 1900, 100, 100),
('3560g', 'Cisco Catalyst WS-C3560-24PS-S', 12000, 300, 100),
('4404', 'Cisco WLC AIR-WLC4404-100-K9', 10000, 300, 100);

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
  ADD KEY `product_ibfk_1` (`type_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `prod_sn` (`prod_sn`),
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
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`prod_sn`) REFERENCES `product` (`prod_sn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
