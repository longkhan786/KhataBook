-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 05:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `expe`
--

CREATE TABLE `expe` (
  `exp_id` int(25) NOT NULL,
  `head_id` int(25) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expe`
--

INSERT INTO `expe` (`exp_id`, `head_id`, `amount`, `date`) VALUES
(1, 6, '500', '2023-11-09'),
(2, 5, '500', '2023-11-22'),
(3, 7, '90', '2023-11-08'),
(4, 3, '239', '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `head_master`
--

CREATE TABLE `head_master` (
  `id` int(25) NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_master`
--

INSERT INTO `head_master` (`id`, `head`) VALUES
(2, 'books'),
(3, 'mobile recharge'),
(4, 'furniture'),
(5, 'tv recharge'),
(6, 'petrol'),
(7, 'food');

-- --------------------------------------------------------

--
-- Stand-in structure for view `incexp`
-- (See below for the actual view)
--
CREATE TABLE `incexp` (
`id` int(25)
,`head` varchar(255)
,`inc_id` int(25)
,`head_id` int(25)
,`amount` varchar(255)
,`date` date
,`I` varchar(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `inc_id` int(25) NOT NULL,
  `head_id` int(25) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inc_id`, `head_id`, `amount`, `date`) VALUES
(1, 6, '100', '2023-11-01'),
(2, 2, '1000', '2023-07-04'),
(3, 2, '500', '2023-10-30'),
(4, 5, '500', '2023-11-30'),
(5, 4, '1000', '2023-06-14'),
(6, 2, '1000', '2023-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `stud_info`
--

CREATE TABLE `stud_info` (
  `stud_id` int(25) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stud_info`
--

INSERT INTO `stud_info` (`stud_id`, `stud_name`, `father_name`, `email`, `gender`, `hobby`, `password`) VALUES
(1, 'admin', 'root', 'admin@gmail.com', 'male', 'cricket', '123456'),
(2, 'root', 'root', 'root@hmail.com', 'female', 'cricket', '123'),
(8, 'long khan', 'karam khan', 'longkhandhareja78@gmail.com', 'male', 'cricket,football,', '123');

-- --------------------------------------------------------

--
-- Structure for view `incexp`
--
DROP TABLE IF EXISTS `incexp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `incexp`  AS SELECT `head_master`.`id` AS `id`, `head_master`.`head` AS `head`, `income`.`inc_id` AS `inc_id`, `income`.`head_id` AS `head_id`, `income`.`amount` AS `amount`, `income`.`date` AS `date`, 'I' AS `I` FROM (`head_master` join `income` on(`head_master`.`id` = `income`.`head_id`))union select `head_master`.`id` AS `id`,`head_master`.`head` AS `head`,`expe`.`exp_id` AS `exp_id`,`expe`.`head_id` AS `head_id`,`expe`.`amount` AS `amount`,`expe`.`date` AS `date`,'E' AS `E` from (`head_master` join `expe` on(`head_master`.`id` = `expe`.`head_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expe`
--
ALTER TABLE `expe`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `exp_id` (`exp_id`),
  ADD KEY `exp_id_2` (`exp_id`,`head_id`);

--
-- Indexes for table `head_master`
--
ALTER TABLE `head_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`inc_id`),
  ADD KEY `inc_id` (`inc_id`),
  ADD KEY `inc_id_2` (`inc_id`,`head_id`);

--
-- Indexes for table `stud_info`
--
ALTER TABLE `stud_info`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expe`
--
ALTER TABLE `expe`
  MODIFY `exp_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `head_master`
--
ALTER TABLE `head_master`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stud_info`
--
ALTER TABLE `stud_info`
  MODIFY `stud_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
