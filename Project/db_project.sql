-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 05:07 AM
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
  `picture` varchar(255) NOT NULL DEFAULT 'NoImage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `user_id`, `make`, `model`, `year`, `price`, `ext_col`, `int_col`, `distance`, `status`, `picture`) VALUES
(18, 2, 'Mclaren', 'M43', 2023, 10000, 'Black', 'Green', 0, 'New', 'Mclaren.png'),
(20, 2, 'Hyundai', 'Rav-4', 2012, 3500, 'White', 'Black', 118000, 'Used', 'HyundaiAccent2023Blue.png'),
(21, 1, 'Hyundai', 'Rav-4', 2008, 10000, 'Dark blue', 'Black', 0, 'New', 'blackHondaCivic2008.png'),
(22, 1, 'Honda', 'Kango', 2008, 1400, 'White', 'Black', 120000, 'Used', 'blackHondaCivic2008.png'),
(23, 1, 'Honda', 'Kango', 2008, 1400, 'White', 'Black', 120000, 'Used', 'blackHondaCivic2008.png');

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
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `features` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `features`, `description`) VALUES
(1, 'Air Conditioning', 'Keeps the cabin cool during hot weather.'),
(2, 'Power Windows', 'Allows for easy opening and closing of windows.'),
(3, 'Bluetooth Connectivity', 'Enables hands-free phone calls and music streaming.'),
(4, 'GPS Navigation', 'Helps you find your way with turn-by-turn directions.'),
(5, 'Leather Seats', 'Provides a luxurious and comfortable interior.'),
(6, 'Sunroof', 'Adds natural light and fresh air to the cabin.'),
(7, 'Backup Camera', 'Assists in parking and avoiding obstacles.'),
(8, 'Keyless Entry', 'Convenient access to the car without using a key.'),
(9, 'Cruise Control', 'Maintains a constant speed on the highway.'),
(10, 'Heated Seats', 'Keeps you warm during cold weather.'),
(11, 'Alloy Wheels', "Enhance the car's appearance and performance."),
(12, 'Fog Lights', 'Improve visibility in foggy conditions.'),
(13, 'Remote Start', 'Start the car remotely for convenience.'),
(14, 'Parking Sensors', 'Alerts you to obstacles when parking.'),
(15, 'Blind Spot Monitoring', 'Helps detect vehicles in your blind spots.'),
(16, 'Lane Departure Warning', 'Alerts you if you drift out of your lane.'),
(17, 'Adaptive Cruise Control', 'Automatically adjusts speed to maintain a safe following distance.'),
(18, 'Automatic Emergency Braking', 'Applies the brakes in emergency situations.'),
(19, 'Rear Spoiler', 'Enhances aerodynamics and sporty appearance.'),
(20, 'Tinted Windows', 'Provides privacy and blocks out excess sunlight.');

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
(5, 0x726f6e, 'Ronald', 'Raphael', '$2y$10$QQlcVtixb2jqvKVfsKZtjOOpxGFi1aLLIe5MoSJtZy8IodtZWR5Jy', 0x726f6e4076616e6965722e6361, '111', 'avatar.png'),
(9, 0x4247, 'Yassine', 'El Yamani', '$2y$10$PRo8LqsGcThlGLanFdw80eKwrWL3o8E6H7bv198EaHl8/oDmEv9gK', 0x424740676d61696c2e636f6d, '438-566-1284', 'handsome.png'),
(10, 0x5175697a, 'Q', 'Quest', '$2y$10$KshXVwjIQfG2n.ZvL1ftgekc6ToFyZMmnc0wa9BUOvctmwPrC0zcK', 0x5175697a40676d61696c2e636f6d, '123-456-7890', 'Messi.png');

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
(5, 5, 'EZ_BYR05'),
(9, 9, 'EZ_BYR05'),
(10, 10, 'EZ_SLR02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CU_id_FK` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `CU_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
