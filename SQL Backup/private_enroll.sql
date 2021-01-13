/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.17-MariaDB : Database - pweb_fp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pweb_fp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pweb_fp`;

/*Table structure for table `private_enrolls` */

DROP TABLE IF EXISTS `private_enrolls`;

CREATE TABLE `private_enrolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `private_id` int(10) unsigned NOT NULL,
  `total_hours` int(11) NOT NULL,
  `hours_done` int(11) NOT NULL,
  `approval_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `completion_status` int(11) NOT NULL,
  `pelaksanaan_online` int(11) NOT NULL,
  `pelaksanaan_offline` int(11) NOT NULL,
  `bukti_pembayaran` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `private_id` (`private_id`),
  CONSTRAINT `private_enrolls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `private_enrolls_ibfk_2` FOREIGN KEY (`private_id`) REFERENCES `privates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `private_enrolls` */

insert  into `private_enrolls`(`id`,`user_id`,`private_id`,`total_hours`,`hours_done`,`approval_status`,`payment_status`,`completion_status`,`pelaksanaan_online`,`pelaksanaan_offline`,`bukti_pembayaran`) values 
(1,2,3,10,0,2,2,2,1,0,NULL),
(2,2,2,12,0,2,2,2,1,0,NULL),
(3,2,1,24,0,2,2,2,0,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
