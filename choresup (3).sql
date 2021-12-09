-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 03:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choresup`
--

-- --------------------------------------------------------

--
-- Table structure for table `chores`
--

CREATE TABLE `chores` (
  `Chore_Id` int(11) NOT NULL,
  `Chore_Name` varchar(20) NOT NULL,
  `Chore Description` varchar(100) NOT NULL,
  `House_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Equipment_Id` int(11) NOT NULL,
  `Equipment_Name` varchar(50) NOT NULL,
  `Equipment_Status` enum('Functional','Faulty') NOT NULL,
  `House_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `House_Id` int(11) NOT NULL,
  `House_Name` varchar(30) NOT NULL,
  `House_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `Resident_Id` int(11) NOT NULL,
  `Resident_Name` varchar(50) NOT NULL,
  `House_Id` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Resident_Status` enum('Active','Away') NOT NULL,
  `House_head` enum('Yes','No') NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Date_of_Birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resident_chores`
--

CREATE TABLE `resident_chores` (
  `Resident_Chore_ID` int(11) NOT NULL,
  `Resident_Id` int(11) NOT NULL,
  `Chore_Id` int(11) NOT NULL,
  `Equipment_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Task_Complete` enum('Yes','No') NOT NULL,
  `House_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chores`
--
ALTER TABLE `chores`
  ADD PRIMARY KEY (`Chore_Id`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equipment_Id`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`House_Id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`Resident_Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `resident_chores`
--
ALTER TABLE `resident_chores`
  ADD PRIMARY KEY (`Resident_Chore_ID`),
  ADD KEY `House_Id` (`House_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chores`
--
ALTER TABLE `chores`
  MODIFY `Chore_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Equipment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `House_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `Resident_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resident_chores`
--
ALTER TABLE `resident_chores`
  MODIFY `Resident_Chore_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chores`
--
ALTER TABLE `chores`
  ADD CONSTRAINT `chores_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `resident_chores`
--
ALTER TABLE `resident_chores`
  ADD CONSTRAINT `resident_chores_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
