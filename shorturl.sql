CREATE TABLE `shorturl` (
  `url` varchar(255) NOT NULL,
  `shorttag` varchar(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `last_visited_at` datetime DEFAULT NULL,
  `visitors` int(11) DEFAULT 0 NOT NULL,
  PRIMARY KEY (`shorttag`),
  UNIQUE KEY `unique_shorttag` (`shorttag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
