-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 12 日 11:04
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lgdreamer_linghang_maindb`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_commodity`
--

CREATE TABLE IF NOT EXISTS `tbl_commodity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course_or_reward` tinyint(4) DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `publisher` bigint(20) NOT NULL,
  `price` float(7,3) DEFAULT '0.000',
  `release_date` datetime NOT NULL,
  `deleted_date` datetime NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `commodity_state` tinyint(4) DEFAULT '0',
  `praise` int(11) DEFAULT '0',
  `communication_number` varchar(20) DEFAULT NULL,
  `surf_time` int(11) DEFAULT '0',
  `leave_message_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_publisher` (`publisher`),
  KEY `index_type` (`type`),
  KEY `index_surf` (`surf_time`),
  KEY `index_praise` (`praise`),
  KEY `index_date` (`release_date`),
  KEY `index_course_or_reward` (`course_or_reward`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tbl_commodity`
--

INSERT INTO `tbl_commodity` (`id`, `course_or_reward`, `type`, `publisher`, `price`, `release_date`, `deleted_date`, `title`, `description`, `commodity_state`, `praise`, `communication_number`, `surf_time`, `leave_message_time`) VALUES
(1, 1, '其他', 0, 10.000, '2016-03-05 13:37:58', '2016-03-05 13:37:58', 'PS', 'ps三小时速成。', 1, 3, '1879585678', 0, 2),
(2, 2, '其他', 0, 50.000, '2016-03-05 13:40:28', '2016-03-05 13:40:28', 'PS', 'ps三小时速成', 0, 0, '1879585678', 0, 0),
(3, 2, '其他', 0, 0.000, '2016-03-05 13:41:17', '2016-03-05 13:41:17', 'PS', 'PS 三小时速成', 0, 0, '18795855867', 0, 0),
(4, 1, '其他', 1, 20.000, '2016-03-05 13:42:05', '2016-03-05 13:42:05', 'PS', 'PS三小时速成', 0, 0, '18795855867', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_commodity_type`
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
-- 表的结构 `tbl_evaluation`
--

CREATE TABLE IF NOT EXISTS `tbl_evaluation` (
  `evaluation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `is_payer` tinyint(4) NOT NULL,
  `evaluate_time` datetime NOT NULL,
  `evaluation` varchar(200) NOT NULL,
  `valuator` bigint(20) NOT NULL,
  `valuated` bigint(20) NOT NULL,
  `score1` float(4,3) NOT NULL,
  `score2` float(4,3) NOT NULL,
  `score3` float(4,3) NOT NULL,
  `score` float(4,3) NOT NULL,
  PRIMARY KEY (`evaluation_id`),
  KEY `index_commodity_id` (`commodity_id`),
  KEY `index_evaluator` (`valuator`),
  KEY `index_valuated` (`valuated`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_leave_message`
--

CREATE TABLE IF NOT EXISTS `tbl_leave_message` (
  `message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `talker` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `index_commodity_id` (`commodity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tbl_leave_message`
--

INSERT INTO `tbl_leave_message` (`message_id`, `commodity_id`, `talker`, `time`, `content`) VALUES
(1, 1, '1', '2016-03-05 22:34:32', 'tooexpensive'),
(2, 1, '1', '2016-03-05 22:35:44', 'tooexpensive');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_praise`
--

CREATE TABLE IF NOT EXISTS `tbl_praise` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `commodity_id` bigint(20) NOT NULL,
  `praiser_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tbl_praise`
--

INSERT INTO `tbl_praise` (`id`, `commodity_id`, `praiser_id`) VALUES
(1, 0, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_transaction`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `choosed_id`, `state`, `commodity_holder_id`, `commodity_buyer_id`, `price`, `date_choose`, `date_confirm`, `pay_id`, `course_or_reward`) VALUES
(1, 1, 1, 1, 0, 20.000, '2016-03-05 21:30:07', '1970-01-01 08:00:00', '696a1ea5', 0),
(2, 0, 1, 1, 0, 0.000, '2016-03-05 23:16:53', '1970-01-01 08:00:00', '4c134b3e', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_seller` tinyint(4) DEFAULT '1',
  `log_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `legal_name` varchar(12) DEFAULT NULL,
  `school` varchar(40) DEFAULT NULL,
  `school_id` varchar(12) DEFAULT NULL,
  `phone_number` char(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nick_name` varchar(12) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `create_time` datetime DEFAULT NULL,
  `last_log` datetime DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `seller_credit` float(7,3) DEFAULT '5.000',
  `payer_credit` float(7,3) DEFAULT '5.000',
  `pic_path` varchar(40) DEFAULT NULL,
  `income` float(7,3) DEFAULT '0.000',
  `pay` float(7,3) DEFAULT '0.000',
  `strongpoint` varchar(40) DEFAULT NULL,
  `interest` varchar(40) DEFAULT NULL,
  `autograph` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `log_name` (`log_name`),
  KEY `index_user_log_name` (`log_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `is_seller`, `log_name`, `password`, `legal_name`, `school`, `school_id`, `phone_number`, `email`, `nick_name`, `birthday`, `is_active`, `create_time`, `last_log`, `sex`, `seller_credit`, `payer_credit`, `pic_path`, `income`, `pay`, `strongpoint`, `interest`, `autograph`) VALUES
(1, 1, 'daixinyan', 'daixinyan', NULL, NULL, NULL, '18795855867', NULL, NULL, NULL, 1, '2016-03-05 00:01:44', '2016-03-05 00:01:44', NULL, 5.000, 5.000, NULL, 0.000, 0.000, NULL, NULL, NULL),
(2, 1, 'chen', 'chen', NULL, NULL, NULL, '18795855867', NULL, NULL, NULL, 1, '2016-03-07 19:05:44', '2016-03-07 19:05:44', NULL, 5.000, 5.000, NULL, 0.000, 0.000, NULL, NULL, NULL),
(3, 1, 'RE', 'RUI', NULL, NULL, NULL, '12345678911', NULL, NULL, NULL, 1, '2016-03-12 09:29:57', '2016-03-12 09:29:57', NULL, 5.000, 5.000, NULL, 0.000, 0.000, NULL, NULL, NULL),
(4, 1, 'register', 'qwER', NULL, NULL, NULL, '18795858586', NULL, NULL, NULL, 1, '2016-03-12 10:33:16', '2016-03-12 10:33:16', NULL, 5.000, 5.000, NULL, 0.000, 0.000, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
