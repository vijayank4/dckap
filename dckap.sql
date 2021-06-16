-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 05:39 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dckap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dkp_order_details`
--

CREATE TABLE `dkp_order_details` (
  `dod_id` int(11) NOT NULL,
  `dod_product_id` int(11) NOT NULL,
  `dod_product_name` varchar(200) NOT NULL,
  `dod_category_name` varchar(200) NOT NULL,
  `dod_name` varchar(200) NOT NULL,
  `dod_email` varchar(100) NOT NULL,
  `dod_phone_number` int(10) DEFAULT NULL,
  `dod_address` text NOT NULL,
  `dod_date` date NOT NULL,
  `dod_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkp_order_details`
--

INSERT INTO `dkp_order_details` (`dod_id`, `dod_product_id`, `dod_product_name`, `dod_category_name`, `dod_name`, `dod_email`, `dod_phone_number`, `dod_address`, `dod_date`, `dod_date_time`) VALUES
(1, 1, 'Laptop', 'Lenovo', 'Vijayan', 'vijayan.mca4@gmail.com', 2147483647, 'No:1/2, Gingee', '2021-06-15', '2021-06-15 23:29:12'),
(2, 2, 'Laptop', 'Dell', 'Vijayan', 'vijayan.mca4@gmail.com', 2147483647, 'No:1/2, Gingee', '2021-06-15', '2021-06-15 23:32:07'),
(3, 3, 'Laptop', 'LG', 'Vijayan', 'vijayan.mca4@gmail.com', 2147483647, 'No:1/2, Gingee', '2021-06-15', '2021-06-15 23:36:53'),
(4, 1, 'Laptop', 'Lenovo', 'Vijayan', 'vijayan.mca4@gmail.com', 2147483647, 'No:1/2, Gingee', '2021-06-15', '2021-06-15 23:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `dkp_product`
--

CREATE TABLE `dkp_product` (
  `dp_product_id` int(11) NOT NULL,
  `dp_product_name` varchar(200) NOT NULL,
  `dp_short_description` varchar(100) NOT NULL,
  `dp_product_description` varchar(200) NOT NULL,
  `dp_images` varchar(200) NOT NULL,
  `dp_price` int(11) NOT NULL,
  `dp_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkp_product`
--

INSERT INTO `dkp_product` (`dp_product_id`, `dp_product_name`, `dp_short_description`, `dp_product_description`, `dp_images`, `dp_price`, `dp_status`) VALUES
(1, 'Laptop', 'Laptop is a small personal computer', 'Laptop is a small personal computer', 'images/1-1.webp,images/1-2.webp,images/1-3.webp,images/1-4.webp,images/1-5.webp,images/1-6.webp', 30000, 1),
(3, 'Laptop', 'Laptop is a small personal computer', 'Laptop is a small personal computer', 'images/1-1.webp,images/1-2.webp,images/1-3.webp,images/1-4.webp,images/1-5.webp,images/1-6.webp', 30000, 1),
(2, 'Laptop', 'Laptop is a small personal computer', 'Laptop is a small personal computer', 'images/1-1.webp,images/1-2.webp,images/1-3.webp,images/1-4.webp,images/1-5.webp,images/1-6.webp', 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dkp_product_category`
--

CREATE TABLE `dkp_product_category` (
  `dpc_id` int(11) NOT NULL,
  `dpc_product_id` int(11) NOT NULL,
  `dpc_category_name` varchar(200) NOT NULL,
  `dpc_category_value` varchar(200) NOT NULL,
  `dpc_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkp_product_category`
--

INSERT INTO `dkp_product_category` (`dpc_id`, `dpc_product_id`, `dpc_category_name`, `dpc_category_value`, `dpc_status`) VALUES
(1, 1, 'Product Name', 'Laptop', 1),
(2, 1, 'Brand', 'Lenovo', 1),
(3, 1, 'Model', 'LNV-532-01', 1),
(4, 2, 'Product Name', 'Laptop', 1),
(5, 2, 'Brand', 'Dell', 1),
(6, 2, 'Model', 'DELL-532-01', 1),
(7, 3, 'Product Name', 'Laptop', 1),
(8, 3, 'Brand', 'LG', 1),
(9, 3, 'Quantity', 'LG-532-01', 1),
(10, 4, 'Product Name', '', 1),
(11, 4, 'Brand', '', 1),
(12, 4, 'Quantity', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dkp_order_details`
--
ALTER TABLE `dkp_order_details`
  ADD PRIMARY KEY (`dod_id`);

--
-- Indexes for table `dkp_product`
--
ALTER TABLE `dkp_product`
  ADD PRIMARY KEY (`dp_product_id`);

--
-- Indexes for table `dkp_product_category`
--
ALTER TABLE `dkp_product_category`
  ADD PRIMARY KEY (`dpc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dkp_order_details`
--
ALTER TABLE `dkp_order_details`
  MODIFY `dod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dkp_product`
--
ALTER TABLE `dkp_product`
  MODIFY `dp_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dkp_product_category`
--
ALTER TABLE `dkp_product_category`
  MODIFY `dpc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
