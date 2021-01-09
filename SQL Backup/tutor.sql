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

/*Table structure for table `tutors` */

DROP TABLE IF EXISTS `tutors`;

CREATE TABLE `tutors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `path_ktp` varchar(255) NOT NULL,
  `path_foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tutors` */

insert  into `tutors`(`id`,`fullname`,`address`,`email`,`password`,`path_ktp`,`path_foto`) values 
(1,'Rafi Nizar Abiyyi','Serang','rafiniz@gmail.com','ac4d4b77085a483e6a691fbaa0f9c9b4','ktp-rafiniz@gmail.com.png','foto-rafiniz@gmail.com.png'),
(2,'Excel Deo','Nganjuk','masexcel@gmail.com','9758fcf028936db8866c4b082fb95b45','ktp-masexcel@gmail.com.png','foto-masexcel@gmail.com.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
