-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2026 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_name`, `contact`, `vehicle_type`, `booking_date`, `amount`, `created_at`) VALUES
(4, 'Aman Verma', NULL, 'Swift', '2026-02-25', 2500.00, '2026-02-19 15:29:49'),
(5, 'Neha Singh', NULL, 'Innova', '2026-03-01', 6000.00, '2026-02-19 15:29:49'),
(6, 'Rahul Mehta', NULL, 'Scorpio', '2026-03-05', 5500.00, '2026-02-19 15:29:49'),
(7, 'Sejal', NULL, 'mercedes', '2005-03-16', 300000.00, '2026-02-19 15:35:39'),
(8, 'Muskan', NULL, 'alto', '2005-04-12', 500000.00, '2026-02-19 15:36:18'),
(9, 'Saumya shrivastava', NULL, 'Royal Enfield Bike', '2003-02-12', 20000.00, '2026-02-19 17:52:09'),
(10, 'Saumya shrivastava', NULL, 'Royal Enfield Bike', '0000-00-00', 20000000.00, '2026-02-20 06:09:22'),
(11, 'dhruv', NULL, 'Royal Enfield Bike', '2019-03-12', 2000000.00, '2026-02-20 15:01:36'),
(13, 'Saumya shrivastava', NULL, 'Royal Enfield Bike', '2019-02-12', 200000.00, '2026-02-22 13:50:02'),
(14, 'Muskan', NULL, 'Pleasure Scooty', '2003-02-12', 300000.00, '2026-02-22 13:51:48'),
(15, 'Swati', NULL, 'Royal Enfield Bike', '2019-03-12', 200000.00, '2026-02-23 14:32:49'),
(16, 'Deepika', NULL, 'Royal Enfield Bike', '2014-12-10', 200000.00, '2026-02-24 06:07:38'),
(18, 'Priyanshi', NULL, 'Royal Enfield Bike', '2017-09-10', 300000.00, '2026-02-26 09:02:48'),
(19, 'swati', NULL, 'Royal Enfield Bike', '2004-03-12', 200000.00, '2026-02-26 18:45:27'),
(20, 'Muskan', NULL, 'mercedes', '2004-12-10', 30000.00, '2026-02-27 06:38:38'),
(22, 'swati', NULL, 'thar', '2001-03-12', 30000000.00, '2026-02-27 10:38:02'),
(23, 'Sejal', NULL, 'Royal Enfield Bike', '2007-05-12', 20000.00, '2026-02-28 10:35:48'),
(24, 'Saumya shrivastava', NULL, 'Royal Enfield Bike', '2019-09-12', 200000.00, '2026-02-28 11:05:28'),
(28, 'Sweta singh', NULL, 'Royal Enfield Bike', '2008-06-12', 500000.00, '2026-03-06 15:54:28'),
(30, 'Arun', NULL, 'Mercedes', '2018-09-12', 200000.00, '2026-03-08 10:31:14'),
(31, 'Arunima', NULL, 'Mercedes', '2009-05-12', 400000.00, '2026-03-08 14:06:09'),
(33, 'Pranav', NULL, 'Mercedes', '2008-10-12', 200000.00, '2026-03-08 15:18:19'),
(58, 'hemanjali shrivastava', NULL, 'Bike', '2009-03-12', 120000.00, '2026-04-18 06:58:49'),
(59, 'Sumit', NULL, 'Royal Enfield Bike', '2009-03-12', 20000.00, '2026-04-19 19:04:58'),
(60, 'Sumit', NULL, 'Royal Enfield Bike', '2009-03-12', 20000.00, '2026-04-19 19:05:09'),
(62, 'Arun', NULL, 'Car', '2009-09-12', 20000.00, '2026-04-21 09:07:15'),
(63, 'Hema', NULL, 'Mercedes', '2010-08-12', 200000.00, '2026-04-21 09:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `address`, `contact`, `description`) VALUES
(1, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'regular customer'),
(2, 'Heena', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(3, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(4, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'Cooperative Customer'),
(5, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(6, 'Arunima', 'Pragati Nagar tilhari', '9425643156', 'regular Customer'),
(7, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'Cooperative Customer'),
(8, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'Careless Customer'),
(9, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(10, 'Ritika', 'House no.113 Gitanjali school jbp', '9425643156', 'Talkitive Customer'),
(11, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'Cooperative Customer'),
(12, 'Arunima', 'Pragati Nagar tilhari', '9425643156', 'Cooperative Customer'),
(13, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(14, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'REGULAR CUSTOMER'),
(15, 'Pranav', 'Pragati Nagar tilhari', '9425643156', 'REGULAR CUSTOMER'),
(16, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(17, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'Regular customer'),
(18, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regualar Customer'),
(19, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regualar Customer'),
(20, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regualar Customer'),
(21, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regualar Customer'),
(22, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regualr customer'),
(23, 'hemanjali shrivastava', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer'),
(24, 'Arun', 'Pragati Nagar tilhari', '9425643156', 'Regular Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
