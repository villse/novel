-- CREATE DATABASE `novel` ;

-- USE `novel`;

-- 网站详细表
DROP TABLE IF EXISTS `novel_site` ;
CREATE TABLE `novel_site`(
	`name` varchar(50) NOT NULL,
  	`domain` char(255) DEFAULT '',
  	`site_title` char(255) DEFAULT '',
  	`keywords` char(255) DEFAULT '',
  	`description` char(255) DEFAULT ''
)ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

-- 管理员
DROP TABLE IF EXISTS `novel_admin` ;
CREATE TABLE `novel_admin`(
	`userid` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(20) NOT NULL,
	`password` varchar(32) NOT NULL,
	`salt` varchar(5) NOT NULL,
	`name` varchar(20) NOT NULL,
	`lastloginip` varchar(15) NOT NULL,
	`lastlogintime` int(10) unsigned NOT NULL,
	PRIMARY KEY (`userid`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

DROP TABLE IF EXISTS `novel_admin_log`;
CREATE TABLE `novel_admin_log`(
	`id` int(30) unsigned NOT NULL AUTO_INCREMENT,
	`userid` TINYINT(2) NOT NULL,
	`loginip` VARCHAR(15) NOT NULL,
	`lastlogintime` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

-- 频道表
DROP TABLE IF EXISTS `novel_category`;
CREATE TABLE `novel_category` ( 
	`catid` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
	`catname` varchar(30) NOT NULL,
	`parentid` tinyint(2) unsigned NOT NULL DEFAULT '0',
	`url` varchar(100) NOT NULL,
	`keyword` varchar(100) NOT NULL,
	`description` mediumtext NOT NULL,
	`catdir` varchar(30) NOT NULL,
	`hits` int(10) unsigned NOT NULL DEFAULT '0',
	`isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',
	`listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
	`letter` varchar(50) NOT NULL,
	PRIMARY KEY (`catid`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 ;


-- 书名表
DROP TABLE IF EXISTS `novel_books`;
CREATE TABLE `novel_books` (
	`bid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	`catid` smallint(4) unsigned NOT NULL,
	`title` varchar(30) NOT NULL,
	`bookname` varchar(30) NOT NULL,
	`author` varchar(30) NOT NULL,
	`keyword` varchar(100) NOT NULL,
	`description` mediumtext NOT NULL,
	`ispos` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',
	`listorder` smallint(5) unsigned NOT NULL,
	`image` varchar(100) NOT NULL,
	PRIMARY KEY (`bid`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 章节 
DROP TABLE IF EXISTS `novel_content_1`;
create table `novel_content_1` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`bid` smallint(5) unsigned NOT NULL,
	`title` varchar(50) NOT NULL,
	`keyword` varchar(100) NOT NULL,
	`description` mediumtext NOT NULL,
	`content` text NOT NULL,
	`url` varchar(100) NOT NULL,
	`addtime` varchar(11) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;










