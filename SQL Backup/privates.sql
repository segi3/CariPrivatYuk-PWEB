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

/*Table structure for table `privates` */

DROP TABLE IF EXISTS `privates`;

CREATE TABLE `privates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `tutor_id` int(10) unsigned NOT NULL,
  `price_per_hour` int(11) NOT NULL,
  `pelaksanaan_online` int(11) NOT NULL,
  `pelaksanaan_offline` int(11) NOT NULL,
  `method` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `tutor_id` (`tutor_id`),
  CONSTRAINT `privates_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `privates_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `privates` */

insert  into `privates`(`id`,`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
(1,'Berenang',7,2,50000,0,1,'Privat dilakukan secara offline di kolam renang yang di setujui.  Tutor mengajarkan langsung praktik berenang mulai dari yang paling dasar di iringi penyampaian teori saat praktik berlangsung.'),
(2,'PWEB',5,2,100000,1,1,'Pengajaran Materi Dengan PPT dan Live Coding.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
