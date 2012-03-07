
CREATE TABLE IF NOT EXISTS `nlp2` (
  `id` BIGINT UNSIGNED NOT NULL,
  `text` varchar(150) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` DATETIME NOT NULL,
  `state` varchar(2),
  `lng`  varchar(100),
  `lat`   varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

