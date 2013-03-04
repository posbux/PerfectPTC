CREATE TABLE `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `imdb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `movie` VALUES 
    (1,'V for Vendetta',2006,'http://www.imdb.com/title/tt0434409/'),
    (2,'The Matrix',1999,'http://www.imdb.com/title/tt0133093/'),
    (3,'WALL-E',2008,'http://www.imdb.com/title/tt0910970/');

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `dvd` VALUES
    (1,2,'20397728'),
    (2,1,'20397729'),
    (3,1,'20397730');

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `customer` VALUES 
    (1,'John Smith'),
    (2,'Peter Taylor');

CREATE TABLE `rental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `dvd_id` int(11) DEFAULT NULL,
  `date_rented` varchar(255) DEFAULT NULL,
  `date_returned` varchar(255) DEFAULT NULL,
  `is_returned` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `rental` VALUES 
    (1,1,1,'2011-08-21','','N'),
    (2,1,2,'2011-08-18','2011-08-21','Y');

