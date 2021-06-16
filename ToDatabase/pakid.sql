-- phpMyAdmin SQL Dump
-- version 5.1.1-1.el7.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 05:59 PM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if20_marcus_praktika`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakid`
--

CREATE TABLE `pakid` (
  `pakid_id` int(11) NOT NULL,
  `firma` varchar(15) COLLATE utf8_estonian_ci NOT NULL,
  `suurus` varchar(5) COLLATE utf8_estonian_ci NOT NULL,
  `a` decimal(3,1) NOT NULL,
  `b` decimal(3,1) NOT NULL,
  `c` decimal(3,1) NOT NULL,
  `max_kaal` int(3) NOT NULL,
  `hind` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `pakid`
--

INSERT INTO `pakid` (`pakid_id`, `firma`, `suurus`, `a`, `b`, `c`, `max_kaal`, `hind`) VALUES
(0, 'Omniva', 'S', '64.0', '38.0', '9.0', 30, '2.95'),
(1, 'Omniva', 'M', '64.0', '38.0', '19.0', 30, '3.98'),
(2, 'Omniva', 'L', '64.0', '38.0', '39.0', 30, '4.85'),
(3, 'Itella', 'XS', '42.0', '34.0', '5.0', 5, '2.59'),
(4, 'Itella', 'S', '42.0', '34.0', '12.0', 35, '2.99'),
(5, 'Itella', 'M', '42.0', '34.0', '20.0', 35, '3.99'),
(6, 'Itella', 'L', '42.0', '36.0', '34.0', 35, '4.89'),
(7, 'Itella', 'XL', '60.0', '36.0', '60.0', 35, '6.49'),
(8, 'DPD', 'XS', '60.0', '19.0', '8.5', 1, '2.50'),
(9, 'DPD', 'S', '60.0', '40.0', '8.5', 3, '2.90'),
(10, 'DPD', 'M', '60.0', '40.0', '18.0', 10, '3.90'),
(11, 'DPD', 'L', '60.0', '40.0', '37.0', 20, '4.80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakid`
--
ALTER TABLE `pakid`
  ADD PRIMARY KEY (`pakid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakid`
--
ALTER TABLE `pakid`
  MODIFY `pakid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
