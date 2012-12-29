DROP DATABASE rems;
CREATE DATABASE rems
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
USE rems;

CREATE TABLE IF NOT EXISTS `image` (
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

CREATE TABLE IF NOT EXISTS `group` (
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

  `title` varchar(64) NOT NULL DEFAULT '',

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `permission` (
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

CREATE TABLE IF NOT EXISTS `group_permission` (
  `group` int(11) unsigned NOT NULL DEFAULT '0',
  `permission` int(11) unsigned NOT NULL DEFAULT '0',
  
  FOREIGN KEY (`group`) REFERENCES `group`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`permission`) REFERENCES `permission`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(`group`, `permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
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

  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `lastLoginTime` int(11) unsigned NOT NULL DEFAULT '0',

  `group` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`group`) REFERENCES `group`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `house_type` (
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

CREATE TABLE IF NOT EXISTS `size` (
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

CREATE TABLE IF NOT EXISTS `house` (
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

  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `type` int(11) unsigned NOT NULL DEFAULT '0',
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `address` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`type`) REFERENCES `house_type`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`size`) REFERENCES `size`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`address`) REFERENCES `address`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `personal_type` (
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

CREATE TABLE IF NOT EXISTS `personal_detail` (
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

  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `type` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`type`) REFERENCES `personal_type`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `room` (
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

  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `house` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`size`) REFERENCES `size`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`house`) REFERENCES `house`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comment` (
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

  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `house` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`house`) REFERENCES `house`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rate` (
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

  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `house` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`house`) REFERENCES `house`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `message` (
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

  `fromUser` int(11) unsigned NOT NULL DEFAULT '0',
  `toUser` int(11) unsigned NOT NULL DEFAULT '0',

  FOREIGN KEY (`fromUser`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`toUser`) REFERENCES `user`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,

  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;