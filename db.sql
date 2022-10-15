-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `datetime`) VALUES
(1, 'Mezbah', 'hmezbah@gmail.com', '8989', '2022-09-26 19:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `contact`, `address`, `datetime`) VALUES
(1, 'Md.Habibullah Mezbah', 'hmezbah@gmail.com', '$2y$10$qtQaDU59JtHEQ09gQM8xg.Xvpcni9cmO.ZWP5UkgZA39Xrl6FONKC', '01722734209', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '2022-09-25 21:56:43'),
(2, 'Mezbah', 'hmezbah20@gmail.com', '$2y$10$Q9yRmjCmwbSNDToQCu46aulCrtQNLyeYm2QI8ERC6Qy1hsF02faCG', '01722734207', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '2022-09-26 09:48:15'),
(3, 'julkar9', 'julkar@gmail.com', '$2y$10$1yFqdB3vgOvTQQrvol7FIepED5YCVtsskQPlJHxpwfxmYLowA79Yu', '01722734205', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '2022-09-26 11:04:11'),
(4, 'Md.Habibullah Mezbah', 'hmezbah55@gmail.com', '$2y$10$A1CiPBGxeLD.0dbV8zbILutE2wnDBxu4r.9Rm5HwIJr2aVQaIRTLa', '01722734205', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '2022-09-26 13:10:21'),
(5, 'fatima', 'fatima@gmail.com', '$2y$10$/x01wy3L5JLxLXqqUtdQbe7P9zPuP7freNW3tOnORq8IpkJgSiACa', '122345678', 'yghgfjyuokifg', '2022-09-26 13:19:52'),
(6, 'Sahik bin shymum', 'beevor@gmail.com', '$2y$10$jZ5BIleoKCuzOhvVoJdBR.X/4P0UhIwMBtZmDKjjCk0jpuERXbYKG', '01722734289', 'Dhaka', '2022-09-27 18:49:21'),
(7, 'Sadia', 'sadia@gmail.com', '$2y$10$eZiaUgc14tlTYXfT9MbG6.gC4GbcTQhofWNPkXgcMLTrKAkaRA9Iq', '01722567890', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '2022-09-28 12:16:58'),
(8, 'Nazneen', 'nazneen@gmail.com', '$2y$10$6xhlNu7gYdC0h1ywa7sZhOmbK0N8MPmnUUko/i.w6o1nySqvw.JTm', '1234567897', 'Dhaka', '2022-10-03 15:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `depositor`
--

CREATE TABLE `depositor` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `at_rate` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depositor`
--

INSERT INTO `depositor` (`id`, `name`, `email`, `password`, `contact`, `address`, `quantity`, `at_rate`, `datetime`) VALUES
(1, 'Md.Habibullah Mezbah', 'hmezbah@gmail.com', '$2y$10$7prlT0BoDyLQOun1dz/AJubszN96cQyj658O6gcRGC.fSK9MFMJ0O', '01722734209', 'House # 47,Road # 02,Katkipara,ideal more,R.K Road, Rangpur.', '', '', '2022-09-28 20:23:42'),
(2, 'Mezbah', 'hmezbah20@gmail.com', '$2y$10$a.7ppyrj2r4P3MU60hL.6ebKyD1wSiQ5jSMOjFrgUaKJOCzSGaek2', '01722734205', ' Rangpur.', '', '', '2022-09-28 20:37:24'),
(3, 'beevor', 'beevor@gmail.com', '$2y$10$2VU/vqhZ4hMzV.KCn8/a5uI5S9M7j4eifszFp2gUUEcvD4ZKKycle', '0172273426', 'Dhaka ', '', '', '2022-10-13 23:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `depositor_transaction`
--

CREATE TABLE `depositor_transaction` (
  `id` int(11) NOT NULL,
  `depositor_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('customer_price', '12'),
('depositor_price', '10'),
('site_name', 'Dairy Management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depositor`
--
ALTER TABLE `depositor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `depositor_transaction`
--
ALTER TABLE `depositor_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depositor`
--
ALTER TABLE `depositor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `depositor_transaction`
--
ALTER TABLE `depositor_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
