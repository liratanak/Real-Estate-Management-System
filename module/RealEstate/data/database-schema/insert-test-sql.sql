INSERT INTO `group` (`id`, `pid`, `hidden`, `disabled`, `deleted`, `created_time`, `created_user`, `last_modified_time`, `last_modified_user`, `valid_time_start`, `valid_time_end`, `title`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'admin');

INSERT INTO `user` (`id`, `pid`, `hidden`, `disabled`, `deleted`, `created_time`, `created_user`, `last_modified_time`, `last_modified_user`, `valid_time_start`, `valid_time_end`, `username`, `password`, `email`, `last_login_time`, `group`) VALUES
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'speeder', 'speeder', 'speeder.nfh@gmail.com', 0, 1),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'nfh', 'nfh', 'nfh@gmail.com', 0, 1);