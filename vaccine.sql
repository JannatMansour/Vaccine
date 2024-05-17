-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 03:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `linechart`
--

CREATE TABLE `linechart` (
  `id` int(10) NOT NULL,
  `Weight` float NOT NULL,
  `Age` float NOT NULL,
  `High` float NOT NULL,
  `id_patient` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linechart`
--

INSERT INTO `linechart` (`id`, `Weight`, `Age`, `High`, `id_patient`) VALUES
(1, 20, 2, 40, 401365888),
(3, 15, 5, 35, 401365888),
(4, 25, 8, 50, 401365888),
(5, 45, 23, 40, 567832549),
(9, 70, 21, 163, 401365888),
(10, 50, 70, 180, 567832549);

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `FullName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `password`, `FullName`) VALUES
(123456, '123456789', 'Muhannad Al-Amouri');

-- --------------------------------------------------------

--
-- Table structure for table `logindoctor`
--

CREATE TABLE `logindoctor` (
  `id` int(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `id_Specialization` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logindoctor`
--

INSERT INTO `logindoctor` (`id`, `password`, `FullName`, `id_Specialization`) VALUES
(121212121, '11111', 'Yamen ahmad', 1),
(123412345, '1234', 'ahmad ali', 2),
(214365879, '1234', 'saleh jamel', 3),
(222222222, '12345', 'samer Hamouda', 4),
(545636897, '11111', 'amer jamel', 3),
(909808707, '1234', 'Khaled Moses', 4),
(987654321, '1234', 'mohammad sami', 5);

-- --------------------------------------------------------

--
-- Table structure for table `loginpatient`
--

CREATE TABLE `loginpatient` (
  `id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginpatient`
--

INSERT INTO `loginpatient` (`id`, `password`, `FullName`, `gender`) VALUES
(401365888, '123456789', 'saleh khalid', 'male'),
(401401401, '123456789', 'fade sameh', 'male'),
(403032132, '12345', 'ahmad ahmad', 'male'),
(404040409, '12345', 'adham zboon', 'male'),
(567832549, '111111', 'ali mostafa', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL,
  `id_doctor` int(20) NOT NULL,
  `id_patient` int(10) NOT NULL,
  `data_reservations` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `id_doctor`, `id_patient`, `data_reservations`) VALUES
(18, 214365879, 401365888, '2022-06-08 00:35:16'),
(19, 123412345, 401365888, '2022-06-18 01:36:31'),
(22, 123412345, 401365888, '2022-06-05 02:48:14'),
(23, 987654321, 401365888, '2022-06-05 02:55:35'),
(24, 121212121, 401365888, '2022-06-05 03:30:31'),
(25, 121212121, 401365888, '2022-06-05 03:33:06'),
(26, 909808707, 401365888, '2022-06-05 03:35:16'),
(27, 123412345, 401365888, '2022-06-05 03:41:01'),
(28, 545636897, 401365888, '2022-06-05 03:42:22'),
(29, 123412345, 401365888, '2022-06-05 04:02:09'),
(30, 121212121, 401365888, '2022-06-05 04:07:36'),
(31, 123412345, 401365888, '2022-06-05 04:11:36'),
(32, 123412345, 401365888, '2022-06-05 10:38:48'),
(33, 545636897, 401365888, '2022-06-05 10:53:00'),
(34, 123412345, 401365888, '2022-06-05 10:56:15'),
(35, 214365879, 401365888, '2022-06-05 10:59:34'),
(36, 123412345, 401365888, '2022-06-05 11:03:06'),
(37, 123412345, 401365888, '2022-06-05 11:03:57'),
(38, 123412345, 401365888, '2022-06-05 11:10:04'),
(39, 123412345, 401365888, '2022-06-05 11:55:07'),
(40, 123412345, 401365888, '2022-06-05 16:21:48'),
(41, 121212121, 401401401, '2022-06-05 16:22:07'),
(42, 123412345, 401365888, '2022-06-05 16:30:17'),
(43, 121212121, 401401401, '2022-06-05 16:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(11) NOT NULL,
  `Specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `Specialization`) VALUES
(1, 'Dermatology'),
(2, 'bones'),
(3, 'eyes'),
(4, 'Ear, Nose and Throat'),
(5, 'dental');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `number` float NOT NULL,
  `date` date NOT NULL,
  `id_patient` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `type`, `number`, `date`, `id_patient`) VALUES
(1, 'Liquid', 2, '2022-05-22', 401365888),
(2, 'Capsules', 4, '2022-05-26', 401365888),
(3, 'Drops', 5, '2022-05-15', 401365888),
(4, 'Inhalers', 3, '2022-05-25', 567832549),
(5, 'accmol', 3, '2022-05-12', 401365888),
(37, 'accamol', 2, '2022-05-28', 401365888),
(38, 'covid-19', 1, '2022-05-31', 567832549);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linechart`
--
ALTER TABLE `linechart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindoctor`
--
ALTER TABLE `logindoctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Specialization` (`id_Specialization`);

--
-- Indexes for table `loginpatient`
--
ALTER TABLE `loginpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linechart`
--
ALTER TABLE `linechart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linechart`
--
ALTER TABLE `linechart`
  ADD CONSTRAINT `linechart_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `loginpatient` (`id`);

--
-- Constraints for table `logindoctor`
--
ALTER TABLE `logindoctor`
  ADD CONSTRAINT `logindoctor_ibfk_1` FOREIGN KEY (`id_Specialization`) REFERENCES `specializations` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `logindoctor` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `loginpatient` (`id`);

--
-- Constraints for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `loginpatient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
