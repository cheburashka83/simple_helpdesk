SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `abonents`;
CREATE TABLE `abonents` (
  `abId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `secName` text NOT NULL,
  `surName` text NOT NULL,
  `passport` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `id` (`abId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abId` int(11) NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime DEFAULT NULL,
  `comment` longtext NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `abId` (`abId`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`abId`) REFERENCES `abonents` (`abId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `swcomment`;
CREATE TABLE `swcomment` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `swname` varchar(24) NOT NULL,
  `swport` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  UNIQUE KEY `commentid` (`commentid`),
  KEY `swname` (`swname`),
  CONSTRAINT `swcomment_ibfk_1` FOREIGN KEY (`swname`) REFERENCES `switch` (`swname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `switch`;
CREATE TABLE `switch` (
  `swname` varchar(24) NOT NULL,
  `swip` text NOT NULL,
  `swmodel` text NOT NULL,
  `swaddress` text NOT NULL,
  `swports` int(11) NOT NULL,
  `swcommunity` text NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`swname`),
  UNIQUE KEY `swname` (`swname`),
  KEY `swname_2` (`swname`),
  KEY `swname_3` (`swname`),
  KEY `swname_4` (`swname`),
  KEY `swname_5` (`swname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
