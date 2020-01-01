-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 07:54 AM
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
-- Database: `scaffolding_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_register`
--

CREATE TABLE `client_register` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client_contact_person_1` varchar(100) NOT NULL,
  `client_contact_person_2` varchar(100) NOT NULL,
  `client_contact_Tel1` int(11) NOT NULL,
  `client_contact_Tel2` int(11) NOT NULL,
  `client_contact_Fax1` int(11) NOT NULL,
  `client_contact_Fax2` int(11) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_recorded_by` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `order_num` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_register`
--

INSERT INTO `client_register` (`client_id`, `client_name`, `client_address`, `client_contact_person_1`, `client_contact_person_2`, `client_contact_Tel1`, `client_contact_Tel2`, `client_contact_Fax1`, `client_contact_Fax2`, `client_email`, `client_recorded_by`, `remarks`, `password`, `account_type`, `created_at`, `order_num`) VALUES
(5, 'System User', 'null', 'No One', 'No One', 123456, 123456, 3216464, 3216465, 'systemuser@scaff.com', 1, '', '$2y$10$NmLUel/RETnx2xxRYVyFdOsXD5qhmr0VTXsws5hJPagLlipfIFpWe', 'SU', '2019-11-04 19:29:13', 1),
(6, 'System Admin', 'dawer', 'asdedf', 'asdfwef', 123456, 123456, 1234, 48799, 'systemadmin@scaff.com', 1, '', '$2y$10$LR135ifopqcx1l7gRadLE.BAuUNy.DjCGrCRFfJ3uUNA00Neq48/.', 'SA', '2019-11-04 19:31:25', 1),
(7, 'Client Viewer', 'asdwe adeas', 'Sdfadf', 'asdfwef', 12564, 123456, 3216464, 3216465, 'clientviewer@scaff.com', 1, '', '$2y$10$bO1u13HA7BTbvKbxGAjZ2uCm0bJ/6dNEonCxAO5408lfH.IdWE6EW', 'CV', '2019-11-04 19:32:42', 1),
(8, 'Client Admin', 'asdhfp npiosd', 'Sdfadf', 'asdfwef', 12564, 458654, 3216464, 48799, 'clientadmin@scaff.com', 1, 'asdfwe daf wee df', '$2y$10$tuB023l30xI1sWPgvIhduexI0tjCIdwXUVDNGVhCfFf.6MzXfp3lG', 'CA', '2019-11-04 19:33:27', 13);

-- --------------------------------------------------------

--
-- Table structure for table `dn_cn_buffer`
--

CREATE TABLE `dn_cn_buffer` (
  `product_material_item_code` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand_new_selling_rate` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dn_cn_register`
--

CREATE TABLE `dn_cn_register` (
  `tx_number` int(11) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `tx_date` date NOT NULL,
  `tx_product` int(11) NOT NULL,
  `tx_quantity` int(11) NOT NULL,
  `tx_truck_type` varchar(10) NOT NULL,
  `tx_truck_plate_number` varchar(20) NOT NULL,
  `tx_truck_rate` int(11) NOT NULL,
  `tx_recorded_by` int(11) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dn_cn_register`
--

INSERT INTO `dn_cn_register` (`tx_number`, `tx_type`, `tx_date`, `tx_product`, `tx_quantity`, `tx_truck_type`, `tx_truck_plate_number`, `tx_truck_rate`, `tx_recorded_by`, `remark`) VALUES
(12, 'a', '0000-00-00', 123, 55, 'c', '12456', 4500, 2, NULL),
(45, 'a', '0000-00-00', 12345, 55, '2345', '12456', 4500, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_register`
--

CREATE TABLE `product_register` (
  `product_name` varchar(100) NOT NULL,
  `product_material_item_code` varchar(20) NOT NULL,
  `product_brand_new_selling_rate` int(11) NOT NULL,
  `product_second_hand_selling_rate` int(11) NOT NULL,
  `product_loss_rate` int(11) NOT NULL,
  `product_repair_rate` int(11) NOT NULL,
  `product_cleaning_rate` int(11) NOT NULL,
  `product_daily_rental_rate` int(11) NOT NULL,
  `product_weekly_rental_rate` int(11) NOT NULL,
  `product_monthly_rental_rate` int(11) NOT NULL,
  `product_daily_hire_charge` int(11) NOT NULL,
  `product_weekly_hire_charge` int(11) NOT NULL,
  `product_monthly_hire_charge` int(11) NOT NULL,
  `product_recorded_by` int(11) NOT NULL,
  `supplier_name` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_register`
--

INSERT INTO `product_register` (`product_name`, `product_material_item_code`, `product_brand_new_selling_rate`, `product_second_hand_selling_rate`, `product_loss_rate`, `product_repair_rate`, `product_cleaning_rate`, `product_daily_rental_rate`, `product_weekly_rental_rate`, `product_monthly_rental_rate`, `product_daily_hire_charge`, `product_weekly_hire_charge`, `product_monthly_hire_charge`, `product_recorded_by`, `supplier_name`, `remarks`, `Stock`) VALUES
('steel rod', '0', 5500, 3000, 3000, 300, 50, 50, 300, 1000, 50, 300, 1000, 123, 0, 'l;aksdfl', 0),
('abcd', '12345', 4500, 2000, 4500, 300, 500, 50, 350, 1000, 50, 350, 1000, 1, 0, 'kjkjuukjjk', 0),
('brick', 'bcd45', 100, 50, 80, 60, 20, 10, 60, 250, 10, 60, 250, 5, 3, 'awd', 0),
('ss rod', 'ss2546', 400, 220, 400, 50, 10, 10, 50, 200, 10, 50, 200, 4, 0, 'afdv adsfe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_register`
--

CREATE TABLE `project_register` (
  `project_id` varchar(100) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `project_contract_no` int(11) NOT NULL,
  `project_site_location` varchar(100) NOT NULL,
  `project_mail_location` varchar(100) NOT NULL,
  `project_order_no` int(11) NOT NULL,
  `project_status` varchar(100) NOT NULL,
  `project_recorded_by` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `tx_truck_rates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_register`
--

INSERT INTO `project_register` (`project_id`, `project_title`, `project_contract_no`, `project_site_location`, `project_mail_location`, `project_order_no`, `project_status`, `project_recorded_by`, `remarks`, `tx_truck_rates`) VALUES
('1234', 'abcd', 45684, 'sdaf', 'asdfwe', 12, 'running', 1, 'sadlfsdh hellos kdjfsdf', 0),
('124kj', 'kjhkj', 123456, 'kjh', 'mkoi', 456, 'Uncomplete', 123, 'jjiuhjj', 4500),
('as123', 'Scaffolding', 123456, 'A', 'M', 12, 'Uncomplete', 123, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `quotation_id` varchar(20) NOT NULL,
  `product_material_item_code` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand_new_selling_rate` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`quotation_id`, `product_material_item_code`, `product_name`, `product_brand_new_selling_rate`, `quantity`) VALUES
('CLI82019112', '12345', 'abcd', 4500, 15),
('CLI82019112', 'bcd45', 'brick', 100, 7),
('CLI82019113', '0', 'steel rod', 5500, 1),
('CLI82019113', '12345', 'abcd', 4500, 1),
('CLI82019113', 'bcd45', 'brick', 100, 1),
('CLI82019113', 'ss2546', 'ss rod', 400, 1),
('CLI82019114', '12345', 'abcd', 4500, 10),
('CLI82019114', 'bcd45', 'brick', 100, 98),
('CLI82019115', '12345', 'abcd', 4500, 15),
('CLI82019116', '0', 'steel rod', 5500, 10),
('CLI82019117', '12345', 'abcd', 4500, 1),
('CLI82019117', 'bcd45', 'brick', 100, 1),
('CLI82019118', '12345', 'abcd', 4500, 1),
('CLI82019118', 'bcd45', 'brick', 100, 1),
('CLI82019119', 'bcd45', 'brick', 100, 1),
('CLI820191110', '12345', 'abcd', 4500, 1),
('CLI820191110', 'bcd45', 'brick', 100, 1),
('CLI820191111', '0', 'steel rod', 5500, 1),
('CLI820191212', '0', 'steel rod', 5500, 10),
('CLI820191212', '12345', 'abcd', 4500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_register`
--

CREATE TABLE `quotation_register` (
  `quotation_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `discount_rate` decimal(4,2) DEFAULT -1.00,
  `payment_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `payment_advance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tx_number` varchar(20) DEFAULT 'NULL',
  `client_admin_approved` int(11) NOT NULL,
  `system_user_approved` int(11) NOT NULL,
  `yard_manager_approved` int(11) NOT NULL,
  `project_manager_approved` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `payment_advance_confirm` int(11) NOT NULL DEFAULT 0,
  `payment_clearance_confirm` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_register`
--

INSERT INTO `quotation_register` (`quotation_id`, `user_id`, `total_price`, `discount_rate`, `payment_amount`, `payment_advance`, `tx_number`, `client_admin_approved`, `system_user_approved`, `yard_manager_approved`, `project_manager_approved`, `timestamp`, `status`, `payment_advance_confirm`, `payment_clearance_confirm`) VALUES
('CLI820191110', '8', '4600.00', '15.00', '0.00', '1000.00', 'NULL', 8, 6, 0, 0, '2019-11-24 22:54:10', 'ORDER CONF', 0, 0),
('CLI820191111', '8', '5500.00', '10.00', '0.00', '2000.00', 'NULL', 8, 6, 0, 0, '2019-11-25 06:09:13', 'ORDER CONFIRMED', 0, 0),
('CLI82019112', '8', '68200.00', '2.00', '0.00', '0.00', 'NULL', 8, 6, 0, 0, '2019-11-24 14:59:19', 'ORDER CONFIRMED', 0, 0),
('CLI82019113', '8', '10500.00', '2.00', '0.00', '0.00', 'NULL', 8, 6, 0, 0, '2019-11-24 16:08:27', 'ORDER CONFIRMED', 0, 0),
('CLI82019114', '8', '54800.00', '16.00', '0.00', '20000.00', 'NULL', 8, 6, 0, 0, '2019-11-24 20:26:12', 'ORDER CONF', 0, 0),
('CLI82019115', '8', '67500.00', '17.00', '0.00', '30000.00', 'NULL', 8, 6, 0, 0, '2019-11-24 21:04:29', 'ORDER CONF', 0, 0),
('CLI82019116', '8', '55000.00', '13.00', '0.00', '25000.00', 'NULL', 8, 6, 0, 0, '2019-11-24 21:16:57', 'ORDER CONFIRMED', 0, 0),
('CLI82019117', '8', '4600.00', '45.00', '0.00', '2000.00', 'NULL', 8, 6, 0, 0, '2019-11-24 22:09:37', 'ORDER CONFIRMED', 0, 0),
('CLI82019118', '8', '4600.00', '15.25', '0.00', '1500.00', 'NULL', 8, 6, 0, 0, '2019-11-24 22:40:21', 'ORDER CONF', 0, 0),
('CLI82019119', '8', '100.00', '12.00', '0.00', '20.00', 'NULL', 8, 6, 0, 0, '2019-11-24 22:46:08', 'ORDER CONFIRMED', 0, 0),
('CLI820191212', '8', '59500.00', '12.50', '25000.00', '25000.00', 'NULL', 8, 6, 0, 0, '2019-12-28 04:13:27', 'PACKING', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `saleo68c7v0ll8dm3n3jnh6ahjqhtk`
--

CREATE TABLE `saleo68c7v0ll8dm3n3jnh6ahjqhtk` (
  `product_material_item_code` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand_new_selling_rate` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_register`
--

CREATE TABLE `supplier_register` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_url` varchar(100) NOT NULL,
  `supplier_contact_person` varchar(100) NOT NULL,
  `supplier_contact_tel1` int(11) NOT NULL,
  `supplier_contact_tel2` int(11) NOT NULL,
  `supplier_contact_fax` int(11) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_recorded_by` int(11) NOT NULL,
  `supplier_hire_quantity` int(11) NOT NULL,
  `supplier_discount` float NOT NULL,
  `supplier_payment_terms` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `quotation_payment_terms` int(11) NOT NULL,
  `quotation_recorded_by` int(11) NOT NULL,
  `tx_truck_rates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_register`
--
ALTER TABLE `client_register`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `dn_cn_buffer`
--
ALTER TABLE `dn_cn_buffer`
  ADD PRIMARY KEY (`product_material_item_code`);

--
-- Indexes for table `dn_cn_register`
--
ALTER TABLE `dn_cn_register`
  ADD PRIMARY KEY (`tx_number`);

--
-- Indexes for table `product_register`
--
ALTER TABLE `product_register`
  ADD PRIMARY KEY (`product_material_item_code`);

--
-- Indexes for table `project_register`
--
ALTER TABLE `project_register`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `quotation_register`
--
ALTER TABLE `quotation_register`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `saleo68c7v0ll8dm3n3jnh6ahjqhtk`
--
ALTER TABLE `saleo68c7v0ll8dm3n3jnh6ahjqhtk`
  ADD PRIMARY KEY (`product_material_item_code`);

--
-- Indexes for table `supplier_register`
--
ALTER TABLE `supplier_register`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_register`
--
ALTER TABLE `client_register`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier_register`
--
ALTER TABLE `supplier_register`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
