# ************************************************************
# Sequel Pro SQL dump
# Version 5426
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.12)
# Database: mycms
# Generation Time: 2019-01-20 15:41:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table article
# ------------------------------------------------------------

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `content` text,
  `files` varchar(200) DEFAULT '',
  `create_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `title`, `content`, `files`, `create_time`, `user_id`) VALUES (1,'刷钻QQ会员找我','刷钻刷QQ会员找我，秒刷安全，扣扣加我，说明备注：刷钻，888888888.','','2019-03-05 00:00:00',2);


/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `create_time` datetime NOT NULL,
  `role` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0普通角色，1管理员',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0被禁用，1正常状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `password`, `create_time`, `role`, `status`) VALUES (1,'admin','70ab8a95c45a264744444444246a9eb6','1970-01-01 08:00:00',1,1),(2,'user','088b77dd76f4d75fec89c6afc36206a9','2019-01-05 00:00:00',0,1);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE USER 'xihu'@'%' identified by 'hy0bvMgq6j'; /*创建ctf用户*/
GRANT ALL PRIVILEGES ON mycms.* TO 'xihu'@'%';
flush privileges;

CREATE DATABASE flag;
USE flag;

DROP TABLE IF EXISTS `flag`;

CREATE TABLE `flag` (
  `flag` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `flag` WRITE;
/*!40000 ALTER TABLE `flag` DISABLE KEYS */;

INSERT INTO `flag` (`flag`)
VALUES
  ('ctf{84b7833717d6eddd1f8c2ba9c78e497f}');

/*!40000 ALTER TABLE `flag` ENABLE KEYS */;
UNLOCK TABLES;

GRANT SELECT ON flag.* TO 'xihu'@'%';
flush privileges;
