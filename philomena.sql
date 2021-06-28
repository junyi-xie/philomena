-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 02:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `philomena`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `staff_id` int(11) DEFAULT 0,
  `treatment_id` int(11) DEFAULT 0,
  `reservation_date` int(8) NOT NULL DEFAULT 0,
  `reservation_time` int(6) NOT NULL DEFAULT 0,
  `notes` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `province` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `store_name`, `email`, `phone`, `zipcode`, `address`, `city`, `province`, `country`, `status`) VALUES
(1, 'Philomena - Hair & Nails', 'info@philomena.com', '+31 655-598-586', '2771 DX', 'Julianastraat 48', 'Boskoop', 'South-Holland', 'The Netherlands', 1);

-- --------------------------------------------------------

--
-- Table structure for table `openinghours`
--

DROP TABLE IF EXISTS `openinghours`;
CREATE TABLE `openinghours` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT 0,
  `day` varchar(255) NOT NULL DEFAULT '',
  `open` mediumint(6) NOT NULL DEFAULT 0,
  `closed` mediumint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `openinghours`
--

INSERT INTO `openinghours` (`id`, `branch_id`, `day`, `open`, `closed`) VALUES
(1, 1, 'Monday', 100000, 180000),
(2, 1, 'Tuesday', 100000, 180000),
(3, 1, 'Wednesday', 100000, 180000),
(4, 1, 'Thursday', 100000, 180000),
(5, 1, 'Friday', 100000, 180000),
(6, 1, 'Saturday', 100000, 150000),
(7, 1, 'Sunday', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `function` varchar(255) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `function`, `priority`) VALUES
(1, 'Administrator', 2),
(2, 'Guest', 0),
(3, 'Barber', 1),
(4, 'Nail Stylist', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `day_week` int(11) NOT NULL DEFAULT 0,
  `start_time` mediumint(6) NOT NULL DEFAULT 0,
  `end_time` mediumint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `day_week`, `start_time`, `end_time`) VALUES
(1, 2, 1, 90000, 170000),
(2, 3, 1, 90000, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

DROP TABLE IF EXISTS `treatments`;
CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `duration` mediumint(6) NOT NULL DEFAULT 0,
  `price` float(10,3) NOT NULL DEFAULT 0.000,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `type_id`, `name`, `duration`, `price`, `status`) VALUES
(1, 1, 'Nail Polish', 10000, 2.150, 1),
(2, 1, 'Nails Fix', 13000, 1.200, 1),
(3, 2, 'Hair Straightener', 11500, 3.500, 1),
(4, 2, 'Hair Dressing', 10000, 2.750, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `status`) VALUES
(1, 'Nail', 1),
(2, 'Hair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT 0,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `province` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `account_created` bigint(14) NOT NULL DEFAULT 0,
  `last_login` bigint(14) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `zipcode`, `city`, `province`, `country`, `account_created`, `last_login`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$ltK/t87nMecbIWlYF0IbauGlXiKqs5VB1AqussCQIRX1cVrrjOpEq', '123456789', 'Street 123', '1234 AB', 'City Z', 'Washington', 'United States', 20210426110142, 20210628141348),
(2, 3, 'Employee', '1', 'employee1@email.com', '$2y$10$NztYp6L9CNhODQFhIYIpfeRXgrESlZa950dBdd1.MvhbcH8vB1Wly', '', '', '', '', '', 'The Netherlands', 20210605183945, 20210628105035),
(3, 4, 'Employee', '2', 'employee2@email.com', '$2y$10$fno7erycnXkfLQHhe9F0pu.Rt8GlNtcCGxNoQe6TFVWGOtcOEn.PK', '', '', '', '', '', 'The Netherlands', 20210605183945, 20210628105035);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`user_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `openinghours`
--
ALTER TABLE `openinghours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `openinghours`
--
ALTER TABLE `openinghours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `guest_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`),
  ADD CONSTRAINT `treatment_id` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`);

--
-- Constraints for table `openinghours`
--
ALTER TABLE `openinghours`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
