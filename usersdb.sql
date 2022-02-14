-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2021 at 06:33 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `newdemande` tinyint(1) NOT NULL DEFAULT '0',
  `newOrient` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'mazal',
  `newSoin` tinyint(1) NOT NULL,
  `phone` int NOT NULL,
  `ordonance` varchar(250) NOT NULL,
  `congMalade` varchar(300) NOT NULL,
  `bilanAnalyse` varchar(300) NOT NULL,
  `hopital` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `first_name`, `last_name`, `adresse`, `age`, `email`, `newdemande`, `newOrient`, `newSoin`, `phone`, `ordonance`, `congMalade`, `bilanAnalyse`, `hopital`) VALUES
(12, 'gg', 'grg', 'faeff veri', 25, 'z@gmail.com', 0, ' \r\ngrakdajlzldakzdadlazmdaz', 0, 220102012, ' \r\nnjhkkhkj', ' \r\nhello fares', ' \r\nbonjoour djaidjazoidahjldjldjzle', ''),
(16, 'gg', 'grg', 'faeff veri', 21, 'painmoih2@gmail.com', 0, 'mazal', 0, 558901020, '', '', '', ''),
(13, 'houssem', 'gergour', '20aout1955', 18, 'hello@h.h', 0, 'boite de lettre est vide', 0, 550201010, ' \r\ndolipran 1000g \r\nFADIAMONE CR DERM TUB 30G\r\nFAGOPYRUM ESCULENTUM BOIRON 12CH tube-granules', '', '', ''),
(14, 'hani', 'benmahammed', 'chlef', 25, 'hani@h.com', 1, 'boite de lettre est vide', 0, 550303020, 'hello hani$', 'jhjh', 'boite d', 'boite de lettre est vide'),
(15, 'efzfz', 'zfzefzf', 'qddqsdqs', 25, 'd@d.d', 0, 'boite de lettre est vide', 0, 55020402, '', 'sfdsfsdf', '', ''),
(17, 'gg', 'grg', 'faeff veri', 31, 'pai212oh2@gmail.com', 0, 'mazal', 0, 550201770, '', '', '', ''),
(18, 'gg', 'grg', 'faeff veri', 31, '45@gmail.com', 0, 'mazal', 0, 556201770, '', '', '', ''),
(19, 'gg', 'grg', 'faeff veri', 24, 'painmsswoh2@gmail.com', 0, 'mazal', 0, 11010101, '', '', '', ''),
(20, 'moh', 'fares', 'chlef', 21, 'fares@ga.com', 0, 'mazal', 0, 550302010, '', '', '', ''),
(21, 'gg', 'grg', 'faeff veri', 23, 'paicccnmoh2@gmail.com', 0, 'mazal', 0, 550809305, '', '', '', ''),
(22, 'gg', 'grg', 'faeff veri', 32, 'painmodddh2@gmail.com', 0, 'mazal', 0, 550201090, '', '', '', ''),
(23, 'gg', 'grg', 'faeff veri', 25, 'painmohdzd2@gmail.com', 0, 'mazal', 0, 550201820, '', '', '', ''),
(24, 'gg', 'grg', 'faeff veri', 21, 'painmoh2@sdcgmail.com', 0, 'mazal', 0, 550781020, '', '', '', ''),
(25, 'gg', 'grg', 'faeff veri', 32, 'painmotreh2@gmail.com', 0, 'mazal', 0, 550209620, '', '', '', ''),
(26, 'fouad', 'farid', 'cite 20aout 19555 chelghoum laid mila', 23, 'f@f.f', 0, 'mazal', 0, 660405060, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employer_id`
--

DROP TABLE IF EXISTS `employer_id`;
CREATE TABLE IF NOT EXISTS `employer_id` (
  `id_emp` int NOT NULL,
  UNIQUE KEY `id` (`id_emp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employer_id`
--

INSERT INTO `employer_id` (`id_emp`) VALUES
(10101),
(111111),
(111223),
(121212),
(151415),
(151515),
(223233),
(363636);

-- --------------------------------------------------------

--
-- Table structure for table `infermier`
--

DROP TABLE IF EXISTS `infermier`;
CREATE TABLE IF NOT EXISTS `infermier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_infermier` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nurseid` (`id_infermier`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `infermier`
--

INSERT INTO `infermier` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `id_infermier`) VALUES
(19, 'gg', 'grg', 'paindrtdrtdmoh2@gmail.com', 550201023, '121212', 151515),
(18, 'gg', 'grg', 'painmoh2@gmail.com', 550201020, 'ddddddddd', 0),
(17, 'Sami', 'Bouam', 'q@q.q', 550202020, '121212', 10101),
(20, 'bensaad', 'fares', 'fares@a.com', 550302011, '121212', 151415);

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_medcin` int NOT NULL,
  `phone` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `doc_id` (`id_medcin`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id`, `last_name`, `first_name`, `password`, `email`, `id_medcin`, `phone`) VALUES
(23, 'Ishak', 'Segar', '121212', 'a@a.a', 121212, 550201020),
(24, '', '', '', '', 0, 0),
(25, 'ooooooo', 'ooooooo', '64464545', 'oooooo@tt.k', 363636, 550201025);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` int NOT NULL,
  `adresse` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `adresse`, `age`) VALUES
(41, 'gg', 'grg', 'painmoh2@gmail.com', '1212121212', 550201020, 'faeff veri', 21),
(42, 'gg', 'grg', 'z@gmail.com', '121212', 220102012, 'faeff veri', 25),
(43, 'houssem', 'gergour', 'hello@h.h', '121212', 550201010, '20aout1955', 18),
(44, 'hani', 'benmahammed', 'hani@h.com', '121212', 550303020, 'chlef', 25),
(45, 'efzfz', 'zfzefzf', 'd@d.d', '121212', 55020402, 'qddqsdqs', 25),
(46, 'gg', 'grg', 'painmoih2@gmail.com', '121212', 558901020, 'faeff veri', 21),
(47, 'gg', 'grg', 'pai212oh2@gmail.com', '121212', 550201770, 'faeff veri', 31),
(48, 'gg', 'grg', '45@gmail.com', '121212', 556201770, 'faeff veri', 31),
(49, '', '', '', '', 0, '', 0),
(50, 'gg', 'grg', 'painmsswoh2@gmail.com', '121212', 11010101, 'faeff veri', 24),
(51, 'moh', 'fares', 'fares@ga.com', '121212', 550302010, 'chlef', 21),
(52, 'gg', 'grg', 'paicccnmoh2@gmail.com', '121212', 550809305, 'faeff veri', 23),
(53, 'gg', 'grg', 'painmodddh2@gmail.com', '12123123', 550201090, 'faeff veri', 32),
(54, 'gg', 'grg', 'painmohdzd2@gmail.com', '245245225', 550201820, 'faeff veri', 25),
(55, 'gg', 'grg', 'painmoh2@sdcgmail.com', '35343543', 550781020, 'faeff veri', 21),
(56, 'gg', 'grg', 'painmotreh2@gmail.com', '121212', 550209620, 'faeff veri', 32),
(57, 'fouad', 'farid', 'f@f.f', '121212', 660405060, 'cite 20aout 19555 chelghoum laid mila', 23);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
