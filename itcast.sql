-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 年 07 月 01 日 13:10
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `itcast`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `email`) VALUES
(1, '123456', 'b966c8647bad2562caa73abeb6c36e5b', '74db194c09077f5219bc9653eb22b075', '12213123@qq.com'),
(2, '1234567', '82fe63085090a7dbaa32a6db19c8dfb2', '68df4a8ee709c50d43b6c8a461dfddbc', '123@qq.com'),
(3, 'asdfgh', '40a5009a0cffc85c753062e7c0d1167c', '23fb8acd8535ca7ed4ce1bc498551729', '123@qq.com'),
(4, 'asdfghg', '1ed21d25a3f36c723d86632ec6c933ae', '2c3e522290b961df8aec17277ebad46d', '213@qqc.cc'),
(5, 'asdfghgg', '11c9cac3606dde385ebc65d268f5d479', '00927df0d883c957f6b3171d3d5823c5', '123@qq.com'),
(6, 'asdfghggg', '32c1c2929516ff34870262a4cf0109e5', '920b7bd80ccf4eebac3e4ef2beeab37e', 'sad@qq.cs'),
(7, 'qwer', '0acee9a26fb180c97f058a1de339bf5d', '50d55d06f94cccc484b689b6951ef8f2', '123@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`username`, `email`, `sex`, `count`) VALUES
('123456', '123@qq.com', '男', 14),
('1234567', 'null', 'nu', 7),
('qwer', '123@qq.com', '男', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
