CREATE TABLE `shorturl` (
  `url` varchar(255) NOT NULL,
  `short` varchar(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `last_visited_at` datetime DEFAULT NULL,
  `visitors` int(11) DEFAULT 0 NOT NULL,
  PRIMARY KEY (`short`),
  UNIQUE KEY `unique_short` (`short`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;