-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 09:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `make` varchar(15) NOT NULL,
  `model` varchar(15) NOT NULL,
  `ext_color` varchar(15) NOT NULL,
  `int_color` varchar(15) NOT NULL,
  `year` int(4) NOT NULL,
  `price` int(9) NOT NULL,
  `dist_traveled` int(7) DEFAULT 0,
  `VIN` varchar(17) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'Used',
  `picture` varchar(50) DEFAULT 'NoImage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `seller_id`, `make`, `model`, `ext_color`, `int_color`, `year`, `price`, `dist_traveled`, `VIN`, `status`, `picture`) VALUES
(1, 15, 'Honda', 'CR-V', 'Red', 'White', 2007, 2300, 145000, '4CD4903LQW00WER', 'Used', 'HondaCR-V2007Red.png'),
(2, 2, 'Toyota', 'RAV4', 'white', 'black', 2015, 12000, 100000, '5Y1SL65848Z411439', 'Used', 'WhiteToyotaRAV42015.png'),
(3, 2, 'Honda', 'Civic', 'black', 'grey', 2008, 6000, 203569, '5Y1SL33248B411439', 'Used', 'blackHondaCivic2008.png'),
(4, 4, 'Nissan', 'Rogue', 'Brown', 'Grey', 2023, 38000, 100000, '9DF2345YJS89WFG00', 'Used', 'BrownNissanRogue2023.png'),
(5, 5, 'Hyundai', 'Accent', 'Blue', 'Black', 2023, 38000, 0, '9DF2345YJS89WFG00', 'New', 'HyundaiAccent2023Blue.png'),
(6, 6, 'Toyota', 'Supra', 'White', 'Black', 2003, 23000, 154000, '9DF2345YJS89WFG00', 'Used', 'WhiteToyotaSupra2003.png');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `name`, `description`, `status`) VALUES
(123456, 'Vlad Dumitrescu', 'Purolator', 'Delivered'),
(587945, 'Ronald Raphael', 'Bike', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Yassine', 'Y@ss@gmail.com', '$2y$10$Hp0i2JZ.IZ0TBjGcknxsmO4rBPIJSo5Oz9mb81u2csnTWpDt7sE5W'),
(2, 'CristianoRonaldo', 'CR7@gmail.com', '$2y$10$AprSPGhmSJmiluEDinFv2ubo5AMBfmtKTrFtMvnIaIklthn0o.rnC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
