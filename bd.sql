/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.29-MariaDB : Database - consultorio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`consultorio` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `consultorio`;

/*Table structure for table `citas` */

DROP TABLE IF EXISTS `citas`;

CREATE TABLE `citas` (
  `idConsultas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diaConsulta` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaConsulta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombrePaciente` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaciente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idConsultas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `citas` */

insert  into `citas`(`idConsultas`,`diaConsulta`,`horaConsulta`,`nombrePaciente`,`apellidoPaciente`,`fechaNacimiento`,`created_at`,`updated_at`) values (1,'Lunes','12:00 pm - 01:00 pm','Vinicio','Martínez','1998-11-30',NULL,'2019-03-13 04:32:03'),(3,'Lunes','01:00 pm - 02:00 pm','Marcos','Joto','1997-08-02','2019-03-07 15:59:34','2019-03-12 16:26:59'),(4,'Miércoles','02:00 pm - 03:00 pm','Erick','Medina','1998-04-03','2019-03-07 16:00:05','2019-03-07 16:00:05'),(5,'Jueves','04:00 pm - 05:00 pm','Vinicio','Martínez','1998-11-30','2019-03-13 04:37:21','2019-03-13 04:37:21'),(6,'Miércoles','11:00 am - 12:00 pm','asdasd','alskdasd','2001-08-13','2019-03-13 04:38:22','2019-03-13 04:38:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
