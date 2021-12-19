-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 11:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unipark`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `user_email`, `auth_type`, `selector`, `token`, `created_at`, `expires_at`) VALUES
(62, 'user@user.com', 'account_verify', 'aab86520e2089be0', '$2y$10$eQSmkVQCyt./dbGi.arba.29oqozZ8RJEcZghvlr/Qm5jKM7Nq6pK', '2021-11-13 09:09:53', '2021-11-13 10:09:53'),
(75, 'supa@hot.com', 'remember_me', '4427d832b4e178c1', '$2y$10$Fv4H7lqErRZ/9hUs5Rwl.uj5t5W1Ps10Qx7Nwr13J.vR8qaf8yZ4S', '2021-12-19 10:07:40', '2021-12-29 10:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `park`
--

CREATE TABLE `park` (
  `id` int(11) NOT NULL,
  `parking_id` int(11) NOT NULL,
  `parkStatus` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `takenFrom` time DEFAULT NULL,
  `freeAt` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `park`
--

INSERT INTO `park` (`id`, `parking_id`, `parkStatus`, `user_id`, `takenFrom`, `freeAt`) VALUES
(1, 1, 'Avilable', NULL, NULL, NULL),
(2, 1, 'Avilable', NULL, NULL, NULL),
(3, 1, 'Avilable', NULL, NULL, NULL),
(4, 2, 'Avilable', NULL, NULL, NULL),
(5, 2, 'Avilable', NULL, NULL, NULL),
(6, 3, 'BUSY', NULL, NULL, NULL),
(7, 3, 'Avilable', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `parkingName` varchar(255) NOT NULL,
  `parkingMap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `parkingName`, `parkingMap`) VALUES
(1, 'Parking 1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d845.7823438575009!2d35.93284648815106!3d32.01160899881986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2acd5038212339f0!2zMzLCsDAwJzQxLjgiTiAzNcKwNTYnMDAuMiJF!5e0!3m2!1sen!2sjo!4v163679870'),
(2, 'Parking 2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d845.7823438575009!2d35.93284648815106!3d32.01160899881986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2acd5038212339f0!2zMzLCsDAwJzQxLjgiTiAzNcKwNTYnMDAuMiJF!5e0!3m2!1sen!2sjo!4v163679870');

-- --------------------------------------------------------

--
-- Table structure for table `parkinghistory`
--

CREATE TABLE `parkinghistory` (
  `id` int(11) NOT NULL,
  `carNumber` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `starTime` varchar(255) NOT NULL,
  `endTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkinghistory`
--

INSERT INTO `parkinghistory` (`id`, `carNumber`, `user_id`, `date`, `starTime`, `endTime`) VALUES
(1, '40-505050', 32, '2021-11-27', '11:38', '12:38'),
(2, '52165574', 32, '2021-11-27', '12:41', '13:41'),
(3, '0423245', 32, '2021-12-19', '13:29', '14:29');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `fromUser` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) NOT NULL,
  `carNumber` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `fromUser`, `date`, `photo`, `carNumber`, `text`) VALUES
(1, 32, '2021-11-27 10:27:58', '61a2082e3c8322.62748992.png', '8524520', 'qsxzsqxqsxxs'),
(2, 32, '2021-11-27 10:42:19', '61a20b8baf1c60.69431794.jpg', '5216485', 'final test'),
(3, 32, '2021-12-19 10:30:29', '61bf09c56d0327.37902324.png', '54824532', ';erjveafvfe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT '_defaultUser.png',
  `verified_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userType`, `email`, `password`, `first_name`, `last_name`, `gender`, `headline`, `bio`, `profile_image`, `verified_at`, `created_at`, `updated_at`, `deleted_at`, `last_login_at`) VALUES
(31, 'admin', 'admin', 'admin@admin.com', '$2y$10$XOtV9m5WXcnGgPQTiiQPIuGmnmtEqGdTd3VnFMS3XL8bkkRnvHHSe', 'admin', 'admin', 'm', '07955555555', 'My profile', '61bf097a794170.12734705.jpg', '2021-11-01 09:03:55', '2021-11-13 08:59:17', '2021-12-19 10:31:22', NULL, '2021-12-19 10:31:22'),
(32, 'user', '', 'user@user.com', '$2y$10$XGgHzB4E3aqlZgg8HstWcuAmj8/GmGl.VlYlpXd4zl7ZhzY8Ekb5K', 'user', 'one', 'm', '0791249875', '3180605198', '618f80e1a5d578.87974400.jpg', '2021-11-13 09:09:53', '2021-11-13 09:09:53', '2021-12-19 10:29:28', NULL, '2021-12-19 10:29:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkinghistory`
--
ALTER TABLE `parkinghistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `park`
--
ALTER TABLE `park`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parkinghistory`
--
ALTER TABLE `parkinghistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
