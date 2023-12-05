-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 06:03 AM
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
(27, 1, 'Mclaren', 'M43', 2023, 400000, 'Black', 'Green', 0, 'New', 'Mclaren.png'),
(32, 2, 'Toyota', 'Rav-4', 2022, 18000, 'Green', 'Black', 500, 'Used', 'WhiteToyotaRAV42015.png'),
(33, 1, 'Toyota', 'Kango', 2023, 4000, 'Black', 'grey', 0, 'New', 'NoImage.png'),
(34, 1, 'Mclaren', 'Rogue', 2015, 10000, 'Black', 'Black', 120000, 'Used', 'blackHondaCivic2008.png'),
(35, 1, 'Hyundai', 'Accent', 2023, 36000, 'Dark blue', 'Black', 0, 'New', 'HyundaiAccent2023Blue.png');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`id`, `car_id`, `feature_id`) VALUES
(42, 27, 1),
(43, 27, 3),
(44, 27, 5),
(45, 27, 7),
(46, 27, 9),
(47, 27, 12),
(62, 32, 1),
(63, 32, 2),
(64, 32, 3),
(65, 32, 4),
(66, 32, 5),
(67, 32, 6),
(68, 33, 1),
(69, 33, 3),
(70, 33, 5),
(71, 33, 7),
(72, 34, 1),
(73, 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `car_review`
--

CREATE TABLE `car_review` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
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
  `car_id` int(11) NOT NULL,
  `receiver` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `comment`, `date`, `car_id`, `receiver`) VALUES
(1, 1, "What's your address", '2023-12-03', 32, 'cris'),
(2, 1, "What's the fuel consumption?", '2023-12-03', 32, 'cris'),
(3, 12, "Wa fin a bono?", '2023-12-05', 27, 'nimayale045');

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
(20, 'Tinted Windows', 'Provides privacy and blocks out excess sunlight.'),
(21, 'flame exhaust', 'Flames come out of the exhaust.'),
(22, 'flame exhaust', 'Flames come out of the exhaust.'),
(23, 'flame exhaust', 'Flames come out of the exhaust.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `car_id`, `status`, `price`) VALUES
(1, 5, 27, 'In process', 400000);

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
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `stars` int(2) NOT NULL,
  `term` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `stars`, `term`) VALUES
(1, 1, 'Very Bad'),
(2, 2, 'Bad'),
(3, 3, 'good'),
(4, 4, 'Very good'),
(5, 5, 'Excellent');

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
  `picture` varchar(50) NOT NULL,
  `access` varchar(3) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fname`, `lname`, `password`, `email`, `phone`, `picture`, `access`) VALUES
(1, 0x6e696d6179616c65303435, 'Yassine', 'El Yamani', '$2y$10$8b6YwRZUrTmI9x4r0F.clOlMMjKR/pddREiGLCCd7bLgDRbM0svq.', 0x596173734c65424740676d61696c2e636f6d, '(514)-900-4578', 'avatar.png', 'Yes'),
(2, 0x63726973, 'sdfsdf', 'jsfdjshdbgj', '$2y$10$g6wywWqdBXfnfY9KFTTzt.7EYSeT/ZBSQ8hv8H7LI/HBVkbCFfc.q', 0x63723740676d61696c2e636f6d, '(438)-438-438', 'handsome.png', 'Yes'),
(5, 0x726f6e, 'Ronald', 'Raphael', '$2y$10$QQlcVtixb2jqvKVfsKZtjOOpxGFi1aLLIe5MoSJtZy8IodtZWR5Jy', 0x726f6e4076616e6965722e6361, '111', 'avatar.png', 'Yes'),
(9, 0x4247, 'Yassine', 'El Yamani', '$2y$10$PRo8LqsGcThlGLanFdw80eKwrWL3o8E6H7bv198EaHl8/oDmEv9gK', 0x424740676d61696c2e636f6d, '438-566-1284', 'handsome.png', 'Yes'),
(10, 0x5175697a, 'Q', 'Quest', '$2y$10$KshXVwjIQfG2n.ZvL1ftgekc6ToFyZMmnc0wa9BUOvctmwPrC0zcK', 0x5175697a40676d61696c2e636f6d, '123-456-7890', 'Messi.png', 'Yes'),
(11, 0x515151, 'ssss', 'ddddd', '$2y$10$z98fUXsKWlQulDZODkwLnugQ.Hu/E5UUR29JgXYdMWrQlqICUAPjS', 0x5151514066656465782e6361, '514-555-9812', 'Messi.png', 'Yes'),
(12, 0x717765727479, 'qqqq', 'qqqqq', '$2y$10$kaHm08.dBiBKijn8.c.rGueYJwFwkYMXCRkoiP8Y6w7vonn33GOvu', 0x71776572747940676d61696c2e636f6d, '514-788-5602', 'Messi.png', 'Yes');

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
(10, 10, 'EZ_SLR02'),
(11, 11, 'EZ_SLR02'),
(12, 12, 'EZ_ADM03');

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
-- Indexes for table `car_review`
--
ALTER TABLE `car_review`
  ADD KEY `revcar_id_FK` (`car_id`),
  ADD KEY `carrev_id_FK` (`review_id`),
  ADD KEY `revuser_id_FK` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_FK` (`user_id`),
  ADD KEY `Cid_FK` (`car_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_id` (`car_id`),
  ADD KEY `ord_user_id_FK` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `car_review`
--
ALTER TABLE `car_review`
  ADD CONSTRAINT `carrev_id_FK` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`),
  ADD CONSTRAINT `revcar_id_FK` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `revuser_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Cid_FK` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `userid_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ord_car_id_FK` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `ord_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
