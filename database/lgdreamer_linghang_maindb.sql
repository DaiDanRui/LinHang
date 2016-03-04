-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2016 at 03:52 PM
-- Server version: 5.5.40
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
-- Table structure for table `tbl_commodity`
--

CREATE TABLE IF NOT EXISTS `tbl_commodity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course_or_reward` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `publisher` bigint(20) NOT NULL,
  `price` float(7,3) NOT NULL,
  `place` varchar(100) NOT NULL,
  `release_date` datetime NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pic_path` varchar(100) NOT NULL,
  `commodity_state` tinyint(4) NOT NULL DEFAULT '0',
  `praise` int(11) NOT NULL DEFAULT '0',
  `communication_way` tinyint(4) NOT NULL,
  `communication_number` varchar(40) NOT NULL,
  `surf_time` int(11) NOT NULL DEFAULT '0',
  `leave_message_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_publisher` (`publisher`),
  KEY `index_type` (`type`),
  KEY `index_surf` (`surf_time`),
  KEY `index_praise` (`praise`),
  KEY `index_date` (`release_date`),
  KEY `index_course_or_reward` (`course_or_reward`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commodity_type`
--

CREATE TABLE IF NOT EXISTS `tbl_commodity_type` (
  `type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(12) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`),
  KEY `index_name` (`type_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluation`
--

CREATE TABLE IF NOT EXISTS `tbl_evaluation` (
  `evaluation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) NOT NULL,
  `is_payer` tinyint(4) NOT NULL,
  `evaluate_time` datetime NOT NULL,
  `evaluation` varchar(200) NOT NULL,
  `score1` float(4,3) NOT NULL,
  `score2` float(4,3) NOT NULL,
  `score3` float(4,3) NOT NULL,
  `score` float(4,3) NOT NULL,
  PRIMARY KEY (`evaluation_id`),
  KEY `index_transaction_id` (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_message`
--

CREATE TABLE IF NOT EXISTS `tbl_leave_message` (
  `message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `talker` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `index_commodity_id` (`commodity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_praise`
--

CREATE TABLE IF NOT EXISTS `tbl_praise` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `praiser_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `choosed_id` bigint(20) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `commodity_holder_id` bigint(20) NOT NULL,
  `commodity_buyer_id` bigint(20) NOT NULL,
  `price` float(7,3) NOT NULL,
  `date_choose` datetime NOT NULL,
  `date_confirm` datetime DEFAULT NULL,
  `pay_id` varchar(20) NOT NULL,
  `course_or_reward` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_commodity_holder_id` (`commodity_holder_id`),
  KEY `index_commodity_buyer_id` (`commodity_buyer_id`),
  KEY `index_date_choose` (`date_choose`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_seller` tinyint(4) NOT NULL,
  `log_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `legal_name` varchar(12) NOT NULL,
  `school` varchar(40) NOT NULL,
  `school_id` varchar(12) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nick_name` varchar(12) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `create_time` datetime DEFAULT NULL,
  `last_log` datetime NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `seller_credit` float(7,3) NOT NULL DEFAULT '5.000',
  `payer_credit` float(7,3) NOT NULL DEFAULT '5.000',
  `pic_path` varchar(40) NOT NULL,
  `income` float(7,3) NOT NULL DEFAULT '0.000',
  `pay` float(7,3) NOT NULL DEFAULT '0.000',
  `strongpoint` varchar(40) NOT NULL,
  `interest` varchar(40) NOT NULL,
  `count_publish_course` int(11) NOT NULL DEFAULT '0',
  `count_publish_reward` int(11) NOT NULL DEFAULT '0',
  `count_choose_course` int(11) NOT NULL DEFAULT '0',
  `count_choose_reward` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `log_name` (`log_name`),
  KEY `index_user_log_name` (`log_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
