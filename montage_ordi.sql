-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2023 at 04:19 PM
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
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE IF NOT EXISTS `Comment` (
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
-- Table structure for table `Component`
--

DROP TABLE IF EXISTS `Component`;
CREATE TABLE IF NOT EXISTS `Component` (
  `idComponent` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `pcType` varchar(50) DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GraphicCard`
--

DROP TABLE IF EXISTS `GraphicCard`;
CREATE TABLE IF NOT EXISTS `GraphicCard` (
  `idComponent` int NOT NULL,
  `chipset` varchar(250) DEFAULT NULL,
  `memory` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HardDisc`
--

DROP TABLE IF EXISTS `HardDisc`;
CREATE TABLE IF NOT EXISTS `HardDisc` (
  `idComponent` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `ssd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Keyboard`
--

DROP TABLE IF EXISTS `Keyboard`;
CREATE TABLE IF NOT EXISTS `Keyboard` (
  `idComponent` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `withPad` tinyint(1) DEFAULT NULL,
  `keyType` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Model`
--

DROP TABLE IF EXISTS `Model`;
CREATE TABLE IF NOT EXISTS `Model` (
  `idModel` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pcNumber` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `quantity` decimal(15,2) DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idModel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ModelComponent`
--

DROP TABLE IF EXISTS `ModelComponent`;
CREATE TABLE IF NOT EXISTS `ModelComponent` (
  `idComponent` int NOT NULL,
  `idModel` int NOT NULL,
  PRIMARY KEY (`idComponent`,`idModel`),
  KEY `idModel` (`idModel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MotherBoard`
--

DROP TABLE IF EXISTS `MotherBoard`;
CREATE TABLE IF NOT EXISTS `MotherBoard` (
  `idComponent` int NOT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MouseAndPad`
--

DROP TABLE IF EXISTS `MouseAndPad`;
CREATE TABLE IF NOT EXISTS `MouseAndPad` (
  `idComponent` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `keyType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PowerSupply`
--

DROP TABLE IF EXISTS `PowerSupply`;
CREATE TABLE IF NOT EXISTS `PowerSupply` (
  `idComponent` int NOT NULL,
  `_batteryPower` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Processor`
--

DROP TABLE IF EXISTS `Processor`;
CREATE TABLE IF NOT EXISTS `Processor` (
  `idComponent` int NOT NULL,
  `coreNumber` int DEFAULT NULL,
  `compatibleChipset` varchar(50) DEFAULT NULL,
  `cpuFrequency` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ram`
--

DROP TABLE IF EXISTS `Ram`;
CREATE TABLE IF NOT EXISTS `Ram` (
  `idComponent` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `numberOfBars` int DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Screen`
--

DROP TABLE IF EXISTS `Screen`;
CREATE TABLE IF NOT EXISTS `Screen` (
  `idComponent` int NOT NULL,
  `size` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `StockHistory`
--

DROP TABLE IF EXISTS `StockHistory`;
CREATE TABLE IF NOT EXISTS `StockHistory` (
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
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
