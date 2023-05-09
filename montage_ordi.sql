-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2023 at 03:57 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montage_ordi`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int NOT NULL AUTO_INCREMENT,
  `commentDate` datetime DEFAULT NULL,
  `messageSeen` tinyint(1) DEFAULT NULL,
  `idModel` int NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `idModel` (`idModel`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
CREATE TABLE IF NOT EXISTS `component` (
  `idComponent` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `pcType` varchar(50) DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graphiccard`
--

DROP TABLE IF EXISTS `graphiccard`;
CREATE TABLE IF NOT EXISTS `graphiccard` (
  `idComponent` int NOT NULL,
  `chipset` varchar(50) DEFAULT NULL,
  `memory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harddisc`
--

DROP TABLE IF EXISTS `harddisc`;
CREATE TABLE IF NOT EXISTS `harddisc` (
  `idComponent` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `ssd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keyboard`
--

DROP TABLE IF EXISTS `keyboard`;
CREATE TABLE IF NOT EXISTS `keyboard` (
  `idComponent` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `withPad` tinyint(1) DEFAULT NULL,
  `keyType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modelpc`
--

DROP TABLE IF EXISTS `modelpc`;
CREATE TABLE IF NOT EXISTS `modelpc` (
  `idModel` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idModel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modelpc_component`
--

DROP TABLE IF EXISTS `modelpc_component`;
CREATE TABLE IF NOT EXISTS `modelpc_component` (
  `idComponent` int NOT NULL,
  `idModel` int NOT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`idComponent`,`idModel`),
  KEY `idModel` (`idModel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

DROP TABLE IF EXISTS `motherboard`;
CREATE TABLE IF NOT EXISTS `motherboard` (
  `idComponent` int NOT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mouseandpad`
--

DROP TABLE IF EXISTS `mouseandpad`;
CREATE TABLE IF NOT EXISTS `mouseandpad` (
  `idComponent` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `keyType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `powersupply`
--

DROP TABLE IF EXISTS `powersupply`;
CREATE TABLE IF NOT EXISTS `powersupply` (
  `idComponent` int NOT NULL,
  `batteryPower` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

DROP TABLE IF EXISTS `processor`;
CREATE TABLE IF NOT EXISTS `processor` (
  `idComponent` int NOT NULL,
  `coreNumber` int DEFAULT NULL,
  `compatibleChipset` varchar(50) DEFAULT NULL,
  `cpuFrequency` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

DROP TABLE IF EXISTS `ram`;
CREATE TABLE IF NOT EXISTS `ram` (
  `idComponent` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `numberOfBars` int DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

DROP TABLE IF EXISTS `screen`;
CREATE TABLE IF NOT EXISTS `screen` (
  `idComponent` int NOT NULL,
  `size` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockhistory`
--

DROP TABLE IF EXISTS `stockhistory`;
CREATE TABLE IF NOT EXISTS `stockhistory` (
  `idStockHistory` int NOT NULL AUTO_INCREMENT,
  `modificationDate` datetime DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `addedRemoved` tinyint(1) DEFAULT NULL,
  `idComponent` int NOT NULL,
  PRIMARY KEY (`idStockHistory`),
  KEY `idComponent` (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `modelpc` (`idModel`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `graphiccard`
--
ALTER TABLE `graphiccard`
  ADD CONSTRAINT `graphiccard_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `harddisc`
--
ALTER TABLE `harddisc`
  ADD CONSTRAINT `harddisc_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD CONSTRAINT `keyboard_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `modelpc_component`
--
ALTER TABLE `modelpc_component`
  ADD CONSTRAINT `modelpc_component_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`),
  ADD CONSTRAINT `modelpc_component_ibfk_2` FOREIGN KEY (`idModel`) REFERENCES `modelpc` (`idModel`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `mouseandpad`
--
ALTER TABLE `mouseandpad`
  ADD CONSTRAINT `mouseandpad_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `powersupply`
--
ALTER TABLE `powersupply`
  ADD CONSTRAINT `powersupply_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `processor`
--
ALTER TABLE `processor`
  ADD CONSTRAINT `processor_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `screen`
--
ALTER TABLE `screen`
  ADD CONSTRAINT `screen_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);

--
-- Constraints for table `stockhistory`
--
ALTER TABLE `stockhistory`
  ADD CONSTRAINT `stockhistory_ibfk_1` FOREIGN KEY (`idComponent`) REFERENCES `component` (`idComponent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
