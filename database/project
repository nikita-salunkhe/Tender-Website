-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 12:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `tender_id` int(10) NOT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `tender_c` varchar(100) DEFAULT NULL,
  `amt_emd` float DEFAULT NULL,
  `estimated_cost` float DEFAULT NULL,
  `mode_emd` varchar(50) DEFAULT NULL,
  `offer_no` int(10) DEFAULT NULL,
  `offer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`tender_id`, `client_name`, `submission_date`, `tender_c`, `amt_emd`, `estimated_cost`, `mode_emd`, `offer_no`, `offer_date`) VALUES
(123, 'nikita', '2020-05-01', ',llkhj', 77, 57, ';lhjk;l', 860, '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phn` int(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(30) NOT NULL,
  `Purchase_order` varchar(30) NOT NULL,
  `invoice_no` int(30) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_amt` int(30) NOT NULL,
  `Payment_due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `email`, `phn`, `company_name`, `city`, `zip`, `Purchase_order`, `invoice_no`, `invoice_date`, `invoice_amt`, `Payment_due_date`) VALUES
(29, 'nikita', 'kjglkhj@gmail.com', 70870968, 'trf', 'nlgkjh', 509680597, '567', 7869, '2020-05-01', 7869, '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `tender_id` int(10) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_qty` int(10) DEFAULT NULL,
  `make` varchar(100) DEFAULT NULL,
  `principal_rate` float DEFAULT NULL,
  `quoted_rate` float DEFAULT NULL,
  `value_of_quotation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `tender_id`, `product_name`, `product_qty`, `make`, `principal_rate`, `quoted_rate`, `value_of_quotation`) VALUES
(167, 123, 'w', 45, 'hmn;l', 5890, 4095, '6870'),
(168, 123, 'mhkmpo', 56, 'lhkjpo', 809, 546, '6869');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `tender_no` int(10) NOT NULL,
  `PO_no` varchar(30) NOT NULL,
  `ord_pri` varchar(30) NOT NULL,
  `ord_date` date NOT NULL,
  `deliy_date` date NOT NULL,
  `pre_insp` varchar(30) NOT NULL,
  `security_deposite_amt` int(30) NOT NULL,
  `mode_deposite` varchar(30) NOT NULL,
  `performance_back_guarantee` varchar(30) NOT NULL,
  `mode_pbg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`tender_no`, `PO_no`, `ord_pri`, `ord_date`, `deliy_date`, `pre_insp`, `security_deposite_amt`, `mode_deposite`, `performance_back_guarantee`, `mode_pbg`) VALUES
(123, '567', 'hll;h', '2020-05-01', '2020-05-02', 'yes', 600, 'National Electronic Fund Trans', 'l,;hlj', 'National Electronic Fund Trans');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `username`, `email`, `password`) VALUES
(10, 'nikita', 'nikita.salunkhe18@vit.edu', 'b6bcf585f869c118b09d07ce65df31c0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`tender_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`tender_no`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
