-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 建立日期: 2017 年 07 月 28 日 09:10
-- 伺服器版本: 5.5.54-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `FinalProject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) DEFAULT NULL,
  `allday` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(20) DEFAULT NULL,
  `mID` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- 資料表的匯出資料 `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `starttime`, `endtime`, `allday`, `color`, `mID`) VALUES
(22, '燒酒雞', 1500393600, 1500404400, 0, '#06c', 1),
(13, '花生豆花', 1499040000, 1499041800, 0, '#f30', 1),
(26, '木瓜牛奶', 1501113600, 0, 1, '#f30', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `foodList`
--

CREATE TABLE IF NOT EXISTS `foodList` (
  `fName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fNo` int(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fNo`),
  UNIQUE KEY `fName` (`fName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `foodList`
--

INSERT INTO `foodList` (`fName`, `fNo`) VALUES
('披薩', 5),
('滷肉飯', 3),
('牛肉麵', 1),
('豚骨拉麵', 4),
('豬肉便當', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` char(10) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `mID` int(10) NOT NULL,
  PRIMARY KEY (`mID`),
  KEY `mID` (`mID`),
  KEY `mID_2` (`mID`),
  KEY `mID_3` (`mID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `password`, `mID`) VALUES
('derek', '27743a8ff8380775c9bc4a6d550688b6', 1),
('jeremy', 'c93169f1eb9be7246f990690b5e66b2d', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
