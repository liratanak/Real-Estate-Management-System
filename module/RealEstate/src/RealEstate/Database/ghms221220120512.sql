-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2012 at 10:09 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ghms`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `house` varchar(64) NOT NULL DEFAULT '',
  `street` varchar(64) NOT NULL DEFAULT '',
  `vilage` varchar(70) NOT NULL DEFAULT '',
  `longitude` int(11) unsigned NOT NULL DEFAULT '0',
  `latitude` int(11) unsigned NOT NULL DEFAULT '0',
  `district` varchar(70) NOT NULL DEFAULT '',
  `quarter` varchar(70) NOT NULL DEFAULT '',
  `city` varchar(70) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `house`, `street`, `vilage`, `longitude`, `latitude`, `district`, `quarter`, `city`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '415', '907', 'tsk', 105, 12, 'tsk', 'rsk', 'pp'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '538', '217', 'rs', 105, 11, 'smj', 'mj', 'pp');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `title` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups_permissions`
--

CREATE TABLE IF NOT EXISTS `groups_permissions` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `groupUid` int(11) unsigned NOT NULL DEFAULT '0',
  `permissionsUid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `isRoomRent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `otherInfo` text NOT NULL,
  `userUid` int(11) unsigned NOT NULL DEFAULT '0',
  `typeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `sizeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `addressUid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `isRoomRent`, `cost`, `available`, `otherInfo`, `userUid`, `typeUid`, `sizeUid`, `addressUid`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, '', 1, 1, 1, 1),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 1, '', 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `house_types`
--

CREATE TABLE IF NOT EXISTS `house_types` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `house_types`
--

INSERT INTO `house_types` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `title`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'flat'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'room'),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'room');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `title` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE IF NOT EXISTS `personal_details` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `gender` char(1) NOT NULL DEFAULT '',
  `job` varchar(50) NOT NULL DEFAULT '',
  `age` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phoneNumber1` varchar(50) NOT NULL DEFAULT '',
  `phoneNumber2` varchar(50) NOT NULL DEFAULT '',
  `others` text NOT NULL,
  `userUid` int(11) unsigned NOT NULL DEFAULT '0',
  `personalTypeUid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `firstname`, `lastname`, `gender`, `job`, `age`, `email`, `phoneNumber1`, `phoneNumber2`, `others`, `userUid`, `personalTypeUid`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'cn', 'pisit', 'm', 'student', 25, 'cnpisit@gmail.com', '01234567', '013456789', '', 1, 1),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fan', 'boya', 'M', 'student', 33, 'fanboya@yahoo.com', '014567890', '011234567', '', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_types`
--

CREATE TABLE IF NOT EXISTS `personal_types` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `roomNumber` int(11) unsigned NOT NULL DEFAULT '0',
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `toilet` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `kitchen` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sizeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `houseUid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `roomNumber`, `cost`, `toilet`, `kitchen`, `available`, `sizeUid`, `houseUid`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 50, 1, 1, 1, 1, 1),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 50, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `width` int(11) unsigned NOT NULL DEFAULT '0',
  `height` int(11) unsigned NOT NULL DEFAULT '0',
  `length` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `width`, `height`, `length`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 6, 30),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdTime` int(11) unsigned NOT NULL DEFAULT '0',
  `createdUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedTime` int(11) unsigned NOT NULL DEFAULT '0',
  `lastModifiedUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeStart` int(11) unsigned NOT NULL DEFAULT '0',
  `validTimeEnd` int(11) unsigned NOT NULL DEFAULT '0',
  `userName` varchar(50) NOT NULL DEFAULT '',
  `passWord` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `lastLoginTime` int(11) unsigned NOT NULL DEFAULT '0',
  `groupUid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pid`, `hidden`, `disabled`, `deleted`, `createdTime`, `createdUserUid`, `lastModifiedTime`, `lastModifiedUserUid`, `validTimeStart`, `validTimeEnd`, `userName`, `passWord`, `email`, `lastLoginTime`, `groupUid`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'cnpisit', '1234', 'cnpisit@gmail.com', 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fanboya', '1234', 'fanboya@yahoo.com', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
