-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 04:58 AM
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
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `price` int(11) NOT NULL,
  `ext_col` varchar(20) NOT NULL,
  `int_col` varchar(20) NOT NULL,
  `distance` int(7) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'Used',
  `features` varchar(500) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'NoImage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `user_id`, `make`, `model`, `year`, `price`, `ext_col`, `int_col`, `distance`, `status`, `features`, `picture`) VALUES
(1, 1, 'Honda', 'CR-V', 2007, 2300, 'Red', 'Grey', 155000, 'Used', 'Heated seats', 'HondaCR-V2007Red.png'),
(2, 1, 'Toyota', 'Matrix', 2003, 3000, 'Grey', 'Grey', 140000, 'Used', 'Sunroof', 'ToyotaMatrix2003White.png'),
(3, 1, 'Toyota', 'Camry', 2020, 15000, 'Silver', 'Black', 25000, 'Used', 'Bluetooth, Backup Camera', 'NoImage.png'),
(4, 1, 'Honda', 'Civic', 2008, 1400, 'Black', 'Gray', 245000, 'Used', 'Sunroof, Alloy Wheels', 'blackHondaCivic2008.png'),
(5, 1, 'Ford', 'F-150', 2022, 35000, 'Blue', 'Beige', 10000, 'New', '4x4, Tow Package', 'NoImage.png'),
(6, 1, 'Chevrolet', 'Malibu', 2018, 12000, 'Red', 'Black', 40000, 'Used', 'Keyless Entry, Cruise Control', 'NoImage.png'),
(7, 1, 'Nissan', 'Altima', 2021, 18000, 'Black', 'Gray', 20000, 'Cert', 'Navigation, Leather Seats', 'NoImage.png');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `features` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `card_num` bigint(16) NOT NULL,
  `CVV` int(6) NOT NULL,
  `pay_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` varchar(15) NOT NULL,
  `rights` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `rights`) VALUES
('EZ_ADM03', 'Admin'),
('EZ_BYR05', 'Buyer'),
('EZ_SLR02', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varbinary(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varbinary(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fname`, `lname`, `password`, `email`, `phone`, `picture`) VALUES
(1, 0x6e696d6179616c65303435, 'Yassine', 'El Yamani', '$2y$10$8b6YwRZUrTmI9x4r0F.clOlMMjKR/pddREiGLCCd7bLgDRbM0svq.', 0x596173734c65424740676d61696c2e636f6d, '(514)-900-4578', 'avatar.png'),
(2, 0x63726973, 'sdfsdf', 'jsfdjshdbgj', '$2y$10$g6wywWqdBXfnfY9KFTTzt.7EYSeT/ZBSQ8hv8H7LI/HBVkbCFfc.q', 0x63723740676d61696c2e636f6d, '(438)-438-438', 'handsome.png'),
(3, 0x526f6e6e79, 'Ronald', 'Chaipas', '$2y$10$Eq1CRAyI5d73VYDhuRmvWuQ/ASS0eV1m2SQWHibKrWebHiQ4172Li', 0x526f6e5f616c6440676d61696c2e636f6d, '438-514-9562', 'handsome.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rights_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `user_id`, `rights_id`) VALUES
(1, 1, 'EZ_ADM03'),
(2, 2, 'EZ_SLR02'),
(3, 3, 'EZ_SLR02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id_FK` (`car_id`),
  ADD KEY `feature_id_FK` (`feature_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_FK` (`user_id`),
  ADD KEY `rights_id_FK` (`rights_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_features`
--
ALTER TABLE `car_features`
  ADD CONSTRAINT `car_id_FK` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `feature_id_FK` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD CONSTRAINT `rights_id_FK` FOREIGN KEY (`rights_id`) REFERENCES `rights` (`id`),
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
