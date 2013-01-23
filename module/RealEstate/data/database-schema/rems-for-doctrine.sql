DROP DATABASE rems;
CREATE DATABASE rems
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
USE rems;

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',

  `username` varchar(64) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `display_name` VARCHAR(50) DEFAULT '',
  `gender` CHAR(10) DEFAULT NULL,
  `email` varchar(64) DEFAULT '',
  `last_login_time` int(11) unsigned DEFAULT '0',
  `state` SMALLINT,

  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` varchar(255)  ,
  `default` tinyint(1)  ,
  `parent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(11) unsigned  ,
  `role_id` varchar(255)  ,
  PRIMARY KEY (`user_id`,`role_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `original_file_name` varchar(255) DEFAULT '',
  `path` varchar(255) DEFAULT '',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `house` varchar(64) DEFAULT '',
  `street` varchar(64) DEFAULT '',
  `vilege` varchar(70) DEFAULT '',
  `district` varchar(70) DEFAULT '',
  `quarter` varchar(70) DEFAULT '',
  `city` varchar(70) DEFAULT '',

  `longitude` REAL(11,6) unsigned DEFAULT '0',
  `latitude` REAL(11,6) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `house_type` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `title` varchar(50) DEFAULT '',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `width` REAL(11,6) unsigned DEFAULT '0',
  `height` REAL(11,6) unsigned DEFAULT '0',
  `length` REAL(11,6) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `house` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `is_room_rent` tinyint(1) unsigned DEFAULT '0',
  `cost` int(11) unsigned DEFAULT '0',
  `available` tinyint(1) unsigned DEFAULT '0',
  `image_path_as_json_string_list` text  ,
  `other_info` text  ,

  `user` int(11) unsigned DEFAULT '0',
  `type` int(11) unsigned DEFAULT '0',
  `size` int(11) unsigned DEFAULT '0',
  `address` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`type`) REFERENCES `house_type`(`id`) ,
  FOREIGN KEY (`size`) REFERENCES `size`(`id`) ,
  FOREIGN KEY (`address`) REFERENCES `address`(`id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `personal_type` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `title` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `personal_detail` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `firstname` varchar(50) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `gender` char(1) DEFAULT '',
  `job` varchar(50) DEFAULT '',
  `age` tinyint(2) unsigned DEFAULT '0',
  `email` varchar(50) DEFAULT '',
  `phone_number_1` varchar(50) DEFAULT '',
  `phone_number_2` varchar(50) DEFAULT '',
  `others` text  ,

  `user` int(11) unsigned DEFAULT '0',
  `type` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`type`) REFERENCES `personal_type`(`id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `room_number` int(11) unsigned DEFAULT '0',
  `cost` int(11) unsigned DEFAULT '0',
  `toilet` tinyint(1) unsigned DEFAULT '0',
  `kitchen` tinyint(1) unsigned DEFAULT '0',
  `available` tinyint(1) unsigned DEFAULT '0',
  `image_path_as_json_string_list` text  ,

  `size` int(11) unsigned DEFAULT '0',
  `house` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`size`) REFERENCES `size`(`id`) ,
  FOREIGN KEY (`house`) REFERENCES `house`(`id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `content` text  ,

  `user` int(11) unsigned DEFAULT '0',
  `house` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`house`) REFERENCES `house`(`id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `value` tinyint(1) unsigned DEFAULT '0',

  `user` int(11) unsigned DEFAULT '0',
  `house` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`house`) REFERENCES `house`(`id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `hidden` tinyint(1) unsigned DEFAULT '0',
  `disabled` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  `created_time` int(11) unsigned DEFAULT '0',
  `created_user` int(11) unsigned DEFAULT '0',
  `last_modified_time` int(11) unsigned DEFAULT '0',
  `last_modified_user` int(11) unsigned DEFAULT '0',
  `valid_time_start` int(11) unsigned DEFAULT '0',
  `valid_time_end` int(11) unsigned DEFAULT '0',
  FOREIGN KEY (`created_user`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`last_modified_user`) REFERENCES `user` (`user_id`) ,

  `content` tinyint(1) unsigned DEFAULT '0',
  `unread` tinyint(1) unsigned DEFAULT '1',

  `fromUser` int(11) unsigned DEFAULT '0',
  `toUser` int(11) unsigned DEFAULT '0',

  FOREIGN KEY (`fromUser`) REFERENCES `user` (`user_id`) ,
  FOREIGN KEY (`toUser`) REFERENCES `user` (`user_id`) ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;