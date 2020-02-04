-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 02:02 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'staff', 'customers');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dir` varchar(3) NOT NULL,
  `default_language` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `city`, `country`, `address`, `dir`, `default_language`, `avatar`, `user_type`) VALUES
(1, '127.0.0.1', 'admin', '$2y$12$KxhYRSJLjFE6C2KnJ5oio.mWwAVXFR.SaX0taWfC/TD/YEREnMXt2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '08ed4ff4936ecbd987f739828759cff2e93a4b8a', '$2y$10$rFmIoV2nN7YZydPQq44rHOVeNHV7HUCLZFIXhIFN43d2mDOTih87O', 1268889823, 1571523125, 1, 'ahmad zaher', 'khrezaty', 'ahmad', '0948842976', 'aleppo', 'syria', 'new aleppo', 'ltr', '', NULL, 0),
(3, '::1', 'ahmadzaher', '$2y$12$eunAl/bwbBMd4FtZrzXb1e11M9EW72h8wefuuOJI9U1SKue2fVfeG', 'ahmad.khrezaty@gmail.com', NULL, NULL, NULL, NULL, NULL, '6ba7d171662be13b308f46ec433bb17cca231e81', '$2y$10$yhmK94OQK705/B0OWiHSDOyK9QjLfuyx23wVd4bJ3980DLvBUEugi', 1565685686, 1580691821, 1, 'Ahmad', 'Khrezaty', 'Ebla Team', '0948842976', 'حلب', 'سورية', 'حلب الجديدة', 'ltr', 'arabic', NULL, 2),
(4, '::1', 'ahmadkhrezaty', '$2y$12$KxhYRSJLjFE6C2KnJ5oio.mWwAVXFR.SaX0taWfC/TD/YEREnMXt2', 'ahmadkhrezaty@gmail.com', NULL, NULL, NULL, NULL, NULL, 'ab85c7b5a6e6be0144e0b8e5386fc6b4dda91cb9', '$2y$10$AvRC6EK878RW55bpM0122.z49dmXxWcY6obkM3aJzEXJcU/xEtDNq', 1565686139, 1574553039, 1, 'Ahmad Zaher', 'Khrezaty', '', '0948842978', 'Aleppo', 'Syria', 'Halap Aljadidah', 'ltr', '', NULL, 0),
(5, '::1', 'ahmadkhrezatykh', '$2y$10$FVceQQ25UKA3dk1oNFdP1eMpD5P0FjYAJOqqD/bia.gcXSxIlWmeW', 'ahmadkhrezatykh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566386192, 1570627269, 1, 'ahmad', 'adsdas', 'adas', '', '', '', '', 'rtl', '', '', 0),
(6, '::1', 'ahmadkhrezaty', '$2y$10$dEW9afWGpNG5CqIqng6gSuh6zqnjpK8L5e0Zs08pab.p9rcGLvl1i', 'ahmadkhreza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566386216, NULL, 1, 'asddas', 'fdsf', 'cxzzxc', '', '', '', '', '', '', '', 0),
(7, '::1', 'ahmadkhrezaty1@gmail.com', '$2y$10$NCkno4JxbZ9p/2WUaYYzx.qnNIMedYu9SOhDDmGE.SMLx4/EDWAMC', 'ahmadkhrezaty1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566386252, NULL, 1, 'sadas', 'dasdas', 'xzczxc', '0921312313213', NULL, NULL, NULL, '', '', '', 0),
(8, '::1', 'ahmadkhrezatykhss@gmail.com', '$2y$10$/4eqdWuP8xRO4xMRrFlUuO632L4gDylkZMyah9BYmCeqVY6m/8j5y', 'ahmadkhrezatykhss@gmail.com', 'f62f280ddfc2028d2104', '$2y$10$cSPVR35Q8PqN4w4jFTsti.1qoF3hK0mKV8FeeYHp2ExAyveMyls2e', NULL, NULL, NULL, NULL, NULL, 1566386275, NULL, 0, 'vxcvxcv', 'bxvdsf', 'fdsfhbfcvb', '13213123123', NULL, NULL, NULL, '', '', '', 0),
(9, '::1', 'ahmadkhrezaty12@gmail.com', '$2y$10$9mL0tcHZhQvRRY6p6A2.s.ed0bV4uamrCUqRd3Hs5wyELecH54Dvi', 'ahmadkhrezaty12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566386295, NULL, 1, 'cvdsfg', 'xbcvdfgv', 'sdfwetwer', '3123123', NULL, NULL, NULL, '', '', '', 0),
(10, '::1', 'ahmadkhrezaty13213@gmail.com', '$2y$10$OpYv1VF7VzSM.05W0RI7B.slbceQ9.BUM094W9wlDS9EI60Vo72gO', 'ahmadkhrezaty13213@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566386332, NULL, 1, 'zxcfhxcv', 'qe\\zasd', 'xzczxc', '09123123321', NULL, NULL, NULL, '', '', '', 0),
(11, '::1', 'ahmadkhrezaty1342@gmail.com', '$2y$10$nvVmmnB.E0FsG/I1qm6p3eKFCHDFfgMl9JhXS1Hfr.UUxUp8xmqG6', 'ahmadkhrezaty1342@gmail.com', '6c435aba4bcf87bfc397', '$2y$10$gepBp7dOE1gNPTDEYFVUKukteekPMGVfx5er2/RQ8oUNfwfnkpHcS', NULL, NULL, NULL, NULL, NULL, 1566386363, NULL, 0, 'dasdasd', 'dfsdvczx', 'vxcvfdg', '09123123', NULL, NULL, NULL, '', '', '', 0),
(12, '::1', 'ahmadkhrezaty1123123@gmail.com', '$2y$10$Mk85sQ3YRFbt0x3Ud2Z7uOsujoxkdEeCTCB8AlzTRgUOTCtDyDH/q', 'ahmadkhrezaty1123123@gmail.com', '0c07a338e8a8f6e03a74', '$2y$10$Da2bQWqFME.q4YKJZSPj7u7.jbpP3XTV1Ke4p.wC8s/Wf2MwAT49m', NULL, NULL, NULL, NULL, NULL, 1566386399, NULL, 0, 'أحمد زاهر', 'خريزاتي', 'sadsadasd', '0944543666', '', '', '', '', '', '', 0),
(13, '::1', 'ahmad@gmail.com', '$2y$10$VVv82mYMyoA/9HJxut8B2entHVQHpfKXXp9fqdvAjK1mxCzCShlCm', 'ahmad@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1570581311, NULL, 1, 'عبد الجواد', 'نجار', 'dasdas', '', '', '', '', '', '', '', 0),
(14, '::1', 'jamal@gmail.com', '$2y$10$K0HrryRxFAfNOGQOHwOf8u1e9deZoaLAIObJf/uWQSIOCv4rGGcbe', 'jamal@gmail.com', '593134b6f8c1ab1688f4', '$2y$10$g7fBdYbcHKC47S2ezX5JF.6zZbmLLW5Gg/7UnH5sF8gqzWySFTfXS', NULL, NULL, NULL, NULL, NULL, 1570581351, NULL, 0, 'mohammad', 'jamal', 'jamal company', '0944543666', NULL, NULL, NULL, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(99, 1, 1),
(100, 1, 2),
(28, 3, 1),
(30, 3, 3),
(14, 4, 1),
(87, 4, 3),
(17, 5, 2),
(18, 6, 2),
(19, 7, 2),
(20, 8, 2),
(21, 9, 2),
(22, 10, 2),
(23, 11, 2),
(24, 12, 2),
(25, 13, 2),
(26, 14, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
