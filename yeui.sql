-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2013 at 11:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.0-ZS5.6.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yeui`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `harga` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `type`, `barang`, `harga`) VALUES
(3, 'Mazda', 'Mazda 2', 275000000),
(6, 'TOYOTA', 'NEW INNOVA', 300000000),
(7, 'HONDA', 'CITY', 250000000),
(8, 'SUZUKI', 'SWIFT', 220000000),
(9, 'SUZUKI', 'ESTILO', 180000000),
(10, 'SUZUKI', 'ERTIGA', 185000000),
(11, 'MITSUBHISI', 'LANCER EVOLUTION 7', 550000000),
(12, 'TOYOTA', 'FORTUNER', 450000000),
(14, 'HONDA', 'Jazz', 215000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
