#Guest House Management System

DROP DATABASE ghms;
CREATE DATABASE ghms
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE ghms;

DROP TABLE `users`;
CREATE TABLE `users` (
	`uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`pid`  int(11) UNSIGNED NOT NULL DEFAULT '0',
	`hidden` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
	`disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
	`deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
	`createdTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
	`createdUserUid` int(11) UNSIGNED NOT NULL DEFAULT '0',
	`lastModifiedTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
	`lastModifiedUserUid` int(11) UNSIGNED NOT NULL DEFAULT '0',
	`validTimeStart` int(11) UNSIGNED NOT NULL DEFAULT '0',
	`validTimeEnd` int(11) UNSIGNED NOT NULL DEFAULT '0',

	`username` varchar(50) NOT NULL DEFAULT '',
	`password` varchar(50) NOT NULL DEFAULT '',
	`email` varchar(50) NOT NULL DEFAULT '',
	`lastLoginTime` int(11) UNSIGNED NOT NULL DEFAULT '0',

	`firstname` varchar(50) NOT NULL DEFAULT '',
	`lastname` varchar(50) NOT NULL DEFAULT '',

	PRIMARY KEY (`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
