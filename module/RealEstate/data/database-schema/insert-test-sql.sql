INSERT INTO `user_role` (`role_id`, `default`, `parent`) VALUES
('admin', 0, 'user'),
('guest', 1, NULL),
('user', 0, 'guest');