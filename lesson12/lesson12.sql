-- テーブルの作成

CREATE TABLE `large_area` (
  `name` varchar(100) DEFAULT NULL,
  `prefecture_name` varchar(100) NOT NULL,
  `prefecture_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`prefecture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prefecture` (
  `prefecture_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  FOREIGN KEY (`prefecture_id`) REFERENCES large_area(`prefecture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `city` (
  `prefecture_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `citycode` varchar(50) NOT NULL,
  FOREIGN KEY (`prefecture_id`) REFERENCES prefecture(`prefecture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;