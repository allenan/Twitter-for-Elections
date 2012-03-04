
CREATE TABLE IF NOT EXISTS `nlp` (
  `id` BIGINT UNSIGNED NOT NULL,
  `text` varchar(150) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` DATETIME NOT NULL,
  `state` varchar(2) NOT NULL,
  'lng'  varchar(100) NOT NULL,
  'lat'   varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

