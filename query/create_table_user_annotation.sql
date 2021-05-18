CREATE TABLE `user_annotation` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `annotation_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`annotation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
