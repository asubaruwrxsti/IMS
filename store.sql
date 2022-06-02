-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 09:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `SN` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `user_id`, `product`, `SN`, `qty`) VALUES
(1, 1, 'test_product', 'tPiMU2kM', 1329),
(2, 1, 'test_product2', '8jMNPPUX', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `BARCODE` varchar(10) DEFAULT NULL,
  `First_Name` text DEFAULT NULL,
  `Last_Name` text DEFAULT NULL,
  `Contact` varchar(255) DEFAULT NULL,
  `Date_Entry` varchar(255) DEFAULT current_timestamp(),
  `Operator` text DEFAULT NULL,
  `Device` varchar(255) DEFAULT NULL,
  `Qty` int(11) DEFAULT 1,
  `Status_Repaired` int(11) DEFAULT 0,
  `Price` int(11) DEFAULT 0,
  `Status_Paid` int(11) DEFAULT 0,
  `Status_Dispatched` int(11) DEFAULT 0,
  `Operator_Dispatch` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `BARCODE`, `First_Name`, `Last_Name`, `Contact`, `Date_Entry`, `Operator`, `Device`, `Qty`, `Status_Repaired`, `Price`, `Status_Paid`, `Status_Dispatched`, `Operator_Dispatch`, `Comments`) VALUES
(37, 'A74Hd2UL4s', 'Biorni', 'Ismalaja', '', '05/18/2022', '', 'Test_Paisje', 0, 1, 0, 0, 0, NULL, ''),
(39, 'WY7SIPdCwD', 'Arlind', 'Ismalaja', '', '05/21/2022', '', 'Albania', 0, 1, 0, 1, 1, NULL, ' '),
(40, 'WY7SIPdCwF', 'Test2', 'Test', '', '05/21/2022', '', 'Albania', 0, 1, 0, 1, 1, NULL, ' '),
(42, 'tyaMPXf3qN', 'Arlind', 'Ismalaja', '', '06/02/2022', '', 'Albania', 0, 0, 0, 0, 0, NULL, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
