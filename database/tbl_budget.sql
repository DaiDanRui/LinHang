-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2016 at 02:33 PM
-- Server version: 5.5.47
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lgdreamer_linghang_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_budget` (
  `budget_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) NOT NULL,
  `pay_date` datetime NOT NULL,
  `commodity_id` bigint(20) NOT NULL,
  `payer_id` bigint(20) NOT NULL,
  `holder_id` bigint(20) NOT NULL,
  PRIMARY KEY (`budget_id`),
  KEY `index_transaction_id` (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_budget`
--

INSERT INTO `tbl_budget` (`budget_id`, `transaction_id`, `pay_date`, `commodity_id`, `payer_id`, `holder_id`) VALUES
(1, 1, '2016-03-09 00:00:00', 1, 1, 2),
(2, 2, '2016-03-14 00:00:00', 2, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
