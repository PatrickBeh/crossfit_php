-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 04:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tb_class`
--

CREATE TABLE `tb_class` (
  `id` int(11) NOT NULL,
  `tb_class_type_id` int(11) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_type`
--

CREATE TABLE `tb_class_type` (
  `id` int(11) NOT NULL,
  `class_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_class_type`
--

INSERT INTO `tb_class_type` (`id`, `class_type`) VALUES
(1, 'Crossfit'),
(2, 'Functional'),
(3, 'Cardio'),
(4, 'Test'),
(5, 'Cardio'),
(6, 'Cardio');

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipment`
--

CREATE TABLE `tb_equipment` (
  `id` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `equipment_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_equipment`
--

INSERT INTO `tb_equipment` (`id`, `equipment_name`, `equipment_description`) VALUES
(1, 'Leg Press Machine', 'Exercises Glutes and Quad'),
(2, 'Weightlifting Bar', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_exercise`
--

CREATE TABLE `tb_exercise` (
  `id` int(11) NOT NULL,
  `tb_exercise_type_id` int(11) NOT NULL,
  `exercise_name` varchar(255) NOT NULL,
  `exercise_description` text NOT NULL,
  `tb_equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_exercise_type`
--

CREATE TABLE `tb_exercise_type` (
  `id` int(11) NOT NULL,
  `exercise_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `account_type`) VALUES
(1, 'pbehenck', 'e10adc3949ba59abbe56e057f20f883e', 'Patrick', 'Behenck', 'test@test.com', 'staff'),
(2, 'erickcordeiro', 'e10adc3949ba59abbe56e057f20f883e', 'Erick', 'Cordeiro', 'erickcordeiroa@gmail.com', 'staff'),
(7, 'teste', '81dc9bdb52d04dc20036dbd8313ed055', 'teste', 'teste', 'teste@teste.com', 'members'),
(8, 'talinef', 'e10adc3949ba59abbe56e057f20f883e', 'Taline', 'Franca', 'taline@email.com', 'member'),
(9, 'Ueirif', 'e10adc3949ba59abbe56e057f20f883e', 'Ueiri', 'Franca', 'ueiri@email.com', 'member'),
(10, 'Patrick', 'e10adc3949ba59abbe56e057f20f883e', 'Patrick', 'Santos', 'santos@email.com', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_workout`
--

CREATE TABLE `tb_workout` (
  `id` int(11) NOT NULL,
  `workout_name` varchar(255) NOT NULL,
  `workout_description` text NOT NULL,
  `tb_exercise_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `set_and_reps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_workout_to_class`
--

CREATE TABLE `tb_workout_to_class` (
  `id` int(11) NOT NULL,
  `tb_workout_id` int(11) NOT NULL,
  `tb_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_class_type`
--
ALTER TABLE `tb_class_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_exercise`
--
ALTER TABLE `tb_exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_exercise_type`
--
ALTER TABLE `tb_exercise_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_workout`
--
ALTER TABLE `tb_workout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_workout_to_class`
--
ALTER TABLE `tb_workout_to_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_class_type`
--
ALTER TABLE `tb_class_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_exercise`
--
ALTER TABLE `tb_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_exercise_type`
--
ALTER TABLE `tb_exercise_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_workout`
--
ALTER TABLE `tb_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_workout_to_class`
--
ALTER TABLE `tb_workout_to_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
