-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2016 at 08:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amohelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE IF NOT EXISTS `aircraft` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `registration` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `manuals`
--

CREATE TABLE IF NOT EXISTS `manuals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `order` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `manuals`
--

INSERT INTO `manuals` (`id`, `name`, `order`) VALUES
(1, 'Customer', 1),
(2, 'AMO', 2),
(3, 'Other', 3);

-- --------------------------------------------------------

--
-- Table structure for table `work_cards`
--

CREATE TABLE IF NOT EXISTS `work_cards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `work_order_id` int(11) unsigned NOT NULL,
  `number` int(11) NOT NULL,
  `originator` varchar(2) NOT NULL,
  `date` date NOT NULL,
  `discrepancy` text NOT NULL,
  `rectification` text NOT NULL,
  `independent_check_required` tinyint(1) NOT NULL,
  `modification_report_required` tinyint(1) NOT NULL,
  `sdr_required` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `work_order_id` (`work_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE IF NOT EXISTS `work_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `number` varchar(255) NOT NULL,
  `aircraft_id` int(11) unsigned NOT NULL,
  `total_time` varchar(50) DEFAULT NULL,
  `total_cycles` varchar(50) DEFAULT NULL,
  `engine_tt` varchar(50) DEFAULT NULL,
  `propeller_tt` varchar(50) DEFAULT NULL,
  `manuals_note` varchar(255) NOT NULL,
  `logbook_discepancys` tinyint(1) NOT NULL,
  `logbook_discepancys_note` text NOT NULL,
  `paper_work_completed` tinyint(1) DEFAULT NULL,
  `paper_work_completed_notes` varchar(255) NOT NULL,
  `independent_checks_accomplished` tinyint(1) DEFAULT NULL,
  `independent_checks_accomplished_notes` varchar(255) NOT NULL,
  `modification_report_completed` tinyint(1) DEFAULT NULL,
  `modification_report_completed_notes` varchar(255) NOT NULL,
  `aca_number` int(11) NOT NULL,
  `accomplishement_verification_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aircraft_id` (`aircraft_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_orders_manuals`
--

CREATE TABLE IF NOT EXISTS `work_orders_manuals` (
  `work_orders_id` int(11) unsigned NOT NULL,
  `manuals_id` int(11) unsigned NOT NULL,
  KEY `work_orders_id` (`work_orders_id`,`manuals_id`),
  KEY `manuals_id` (`manuals_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work_cards`
--
ALTER TABLE `work_cards`
  ADD CONSTRAINT `work_cards_ibfk_1` FOREIGN KEY (`work_order_id`) REFERENCES `work_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD CONSTRAINT `work_orders_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft` (`id`);

--
-- Constraints for table `work_orders_manuals`
--
ALTER TABLE `work_orders_manuals`
  ADD CONSTRAINT `work_orders_manuals_ibfk_1` FOREIGN KEY (`work_orders_id`) REFERENCES `work_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_orders_manuals_ibfk_2` FOREIGN KEY (`manuals_id`) REFERENCES `manuals` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
