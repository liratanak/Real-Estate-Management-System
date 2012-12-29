DROP DATABASE rems;
CREATE DATABASE rems
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
USE rems;

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

  `originalFileName` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
  `district` varchar(70) NOT NULL DEFAULT '',
  `quarter` varchar(70) NOT NULL DEFAULT '',
  `city` varchar(70) NOT NULL DEFAULT '',

  `longitude` int(11) unsigned NOT NULL DEFAULT '0',
  `latitude` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  
  FOREIGN KEY (`groupUid`) REFERENCES `groups`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`permissionsUid`) REFERENCES `permissions`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

  FOREIGN KEY (`groupUid`) REFERENCES `groups`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
  `imagePathJsonStringList` text NOT NULL,
  `otherInfo` text NOT NULL,

  `userUid` int(11) unsigned NOT NULL DEFAULT '0',
  `typeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `sizeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `addressUid` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`userUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`typeUid`) REFERENCES `house_types`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`sizeUid`) REFERENCES `sizes`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`addressUid`) REFERENCES `address`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

  FOREIGN KEY (`userUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`personalTypeUid`) REFERENCES `personal_types`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
  `imagePathJsonStringList` text NOT NULL,

  `sizeUid` int(11) unsigned NOT NULL DEFAULT '0',
  `houseUid` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`sizeUid`) REFERENCES `sizes`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`houseUid`) REFERENCES `houses`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comments` (
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

  `content` text NOT NULL,

  `userUid` int(11) unsigned NOT NULL DEFAULT '0',
  `houseUid` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`userUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`houseUid`) REFERENCES `houses`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rates` (
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

  `value` tinyint(1) unsigned NOT NULL DEFAULT '0',

  `userUid` int(11) unsigned NOT NULL DEFAULT '0',
  `houseUid` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`userUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`houseUid`) REFERENCES `houses`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `messages` (
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

  `content` tinyint(1) unsigned NOT NULL DEFAULT '0',

  `fromUserUid` int(11) unsigned NOT NULL DEFAULT '0',
  `toUserUid` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`fromUserUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`toUserUid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;