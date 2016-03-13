-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2016 at 04:36 PM
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
-- Table structure for table `tbl_evaluation`
--

CREATE TABLE IF NOT EXISTS `tbl_evaluation` (
  `evaluation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `is_payer` tinyint(4) NOT NULL,
  `evaluate_time` datetime NOT NULL,
  `evaluation` varchar(200) NOT NULL,
  `valuator` bigint(20) NOT NULL,
  `valuated` bigint(20) NOT NULL,
  `score1` tinyint(4) NOT NULL,
  `score2` tinyint(4) NOT NULL,
  `score3` tinyint(4) NOT NULL,
  `score` tinyint(4) NOT NULL,
  PRIMARY KEY (`evaluation_id`),
  KEY `index_commodity_id` (`commodity_id`),
  KEY `index_evaluator` (`valuator`),
  KEY `index_valuated` (`valuated`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_evaluation`
--

INSERT INTO `tbl_evaluation` (`evaluation_id`, `commodity_id`, `is_payer`, `evaluate_time`, `evaluation`, `valuator`, `valuated`, `score1`, `score2`, `score3`, `score`) VALUES
(1, 1, 1, '2016-03-01 00:00:00', '值值值，非常值。', 1, 2, 90, 92, 87, 10),
(2, 2, 0, '2016-03-10 00:00:00', '还行', 2, 1, 70, 80, 100, 10),
(3, 3, 1, '2016-03-01 00:00:00', '值值值，非常值。', 1, 2, 90, 92, 87, 10),
(4, 4, 0, '2016-03-10 00:00:00', '还行', 2, 1, 70, 80, 100, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
