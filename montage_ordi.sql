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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
CREATE TABLE IF NOT EXISTS `component` (
  `idComponent` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `pcType` varchar(50) DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graphicCard`
--

DROP TABLE IF EXISTS `graphicCard`;
CREATE TABLE IF NOT EXISTS `graphicCard` (
  `idComponent` int NOT NULL,
  `chipset` varchar(50) DEFAULT NULL,
  `memory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hardDisc`
--

DROP TABLE IF EXISTS `hardDisc`;
CREATE TABLE IF NOT EXISTS `hardDisc` (
  `idComponent` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `ssd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `idModel` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pcNumber` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `quantity` decimal(15,2) DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idModel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_component`
--

DROP TABLE IF EXISTS `model_component`;
CREATE TABLE IF NOT EXISTS `model_component` (
  `idComponent` int NOT NULL,
  `idModel` int NOT NULL,
  PRIMARY KEY (`idComponent`,`idModel`),
  KEY `idModel` (`idModel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mother_board`
--

DROP TABLE IF EXISTS `mother_board`;
CREATE TABLE IF NOT EXISTS `mother_board` (
  `idComponent` int NOT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mouse_and_pad`
--

DROP TABLE IF EXISTS `mouse_and_pad`;
CREATE TABLE IF NOT EXISTS `mouse_and_pad` (
  `idComponent` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `keyType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `power_supply`
--

DROP TABLE IF EXISTS `power_supply`;
CREATE TABLE IF NOT EXISTS `power_supply` (
  `idComponent` int NOT NULL,
  `_batteryPower` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

DROP TABLE IF EXISTS `screen`;
CREATE TABLE IF NOT EXISTS `screen` (
  `idComponent` int NOT NULL,
  `size` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_history`
--

DROP TABLE IF EXISTS `stock_history`;
CREATE TABLE IF NOT EXISTS `stock_history` (
  `idStockHistory` int NOT NULL AUTO_INCREMENT,
  `modificationDate` datetime DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `addedRemoved` tinyint(1) DEFAULT NULL,
  `idComponent` int NOT NULL,
  PRIMARY KEY (`idStockHistory`),
  KEY `idComponent` (`idComponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
