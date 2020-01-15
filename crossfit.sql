-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 10:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crossfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Amrap'),
(2, ' E.M.O.M'),
(3, 'Chipper'),
(4, 'Tabata'),
(5, 'Singlet'),
(6, 'Couplet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `admin`) VALUES
(1, 'Sofija', 'Milovanovic', 'sofija', 'sofija', 'Admin'),
(2, 'Marko', 'Maric', 'mare', 'mare', 'Admin'),
(3, 'Filip', 'Kostic', 'koles', 'koles', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_times`
--

CREATE TABLE `user_times` (
  `user_time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wod_id` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `seconds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_times`
--

INSERT INTO `user_times` (`user_time_id`, `user_id`, `wod_id`, `minutes`, `seconds`) VALUES
(1, 1, 1, 15, 46),
(2, 2, 1, 17, 21),
(3, 3, 1, 15, 48),
(4, 1, 3, 18, 21),
(7, 1, 4, 7, 55),
(8, 1, 1, 54, 33);

-- --------------------------------------------------------

--
-- Table structure for table `wod`
--

CREATE TABLE `wod` (
  `id` int(11) NOT NULL,
  `wod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wod_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `difficulty` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wod`
--

INSERT INTO `wod` (`id`, `wod_name`, `wod_desc`, `type_id`, `difficulty`) VALUES
(1, 'FRAN', '21-15-9 Reps For Time\r\nThrusters (95/65 lb)\r\nPull-Ups', 1, 'Medium'),
(2, 'LINDA', '10-9-8-7-6-5-4-3-2-1 Reps, For Time\r\nDeadlift (1½ bodyweight)\r\nBench Press (bodyweight)\r\nClean (¾ bodyweight)', 1, 'Hard'),
(3, 'FAT AMY', 'For Time\r\n50 Air Squats\r\n10 Burpees\r\n40 Sit-Ups\r\n10 Burpees\r\n30 Lunges (alternating legs)\r\n10 Burpees\r\n20 Kettlebell Swings (1.5/1 pood)\r\n10 Burpees\r\n10 meter Bear Crawl\r\n10 Burpees\r\n20 Kettlebell Swings (1.5/1 pood)\r\n10 Burpees\r\n30 Lunges (alternating legs)\r\n10 Burpees\r\n40 Sit-Ups\r\n10 Burpees\r\n50 Air Squats', 1, 'Hard'),
(4, 'CHELSEA', 'EMOM in 30 minutes\r\n5 Pull-Ups\r\n10 Push-Ups\r\n15 Air Squats', 2, 'Low');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_times`
--
ALTER TABLE `user_times`
  ADD PRIMARY KEY (`user_time_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wod`
--
ALTER TABLE `wod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_times`
--
ALTER TABLE `user_times`
  MODIFY `user_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wod`
--
ALTER TABLE `wod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_times`
--
ALTER TABLE `user_times`
  ADD CONSTRAINT `user_times_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `wod`
--
ALTER TABLE `wod`
  ADD CONSTRAINT `wod_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
