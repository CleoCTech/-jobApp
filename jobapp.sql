/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - jobapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jobapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jobapp`;

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `application_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Incomplete',
  `book_file` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `applications` */

insert  into `applications`(`application_id`,`created_at`,`updated_at`,`status`,`book_file`) values (1,'2020-07-15 01:18:31','2020-07-15 01:18:31','Complete','resume_1594796341.pdf'),(2,'2020-07-16 16:54:23','2020-07-20 00:00:00','Complete','resume.pdf'),(4,'2020-07-20 00:00:00','2020-07-23 00:00:00','Complete','Flows.pdf'),(5,'2020-07-23 00:00:00','2020-07-23 00:00:00','Incomplete',NULL);

/*Table structure for table `education_details` */

DROP TABLE IF EXISTS `education_details`;

CREATE TABLE `education_details` (
  `education_info_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `highschool_grade` varchar(255) DEFAULT NULL,
  `highschool_points` bigint(20) DEFAULT NULL,
  `college_qualification` varchar(20) DEFAULT NULL,
  `college_course` varchar(20) DEFAULT NULL,
  `year_of_graduation` bigint(20) DEFAULT NULL,
  `college_points` bigint(20) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`education_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `education_details` */

insert  into `education_details`(`education_info_id`,`highschool_grade`,`highschool_points`,`college_qualification`,`college_course`,`year_of_graduation`,`college_points`,`application_id`,`created_at`,`updated_at`) values (1,'B',63,'Degree','Bsc Computer Science',2019,70,1,'2020-07-22 07:31:07','2020-07-22 07:31:10'),(3,'B',63,'Degree','Bsc Computer Science',2021,70,2,'2020-07-19 00:00:00','2020-07-19 00:00:00'),(4,'A-',76,'Degree','Mass Media',2021,75,4,'2020-07-23 00:00:00','2020-07-23 00:00:00');

/*Table structure for table `interests` */

DROP TABLE IF EXISTS `interests`;

CREATE TABLE `interests` (
  `interest_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `a_address` varchar(20) DEFAULT NULL,
  `roles` varchar(200) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`interest_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `interests` */

insert  into `interests`(`interest_id`,`title`,`company_name`,`a_address`,`roles`,`application_id`,`created_at`,`updated_at`) values (1,'Member of group A','Group A','420, Bomet','Role 1',1,'2020-07-22 07:30:45','2020-07-22 07:30:48'),(2,'Member of AIESEC_KE in 2  years','AIESEC_KE','5888, Chuka','Role 6',4,'2020-07-23 00:00:00','2020-07-23 00:00:00');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_info` */

DROP TABLE IF EXISTS `personal_info`;

CREATE TABLE `personal_info` (
  `personal_info_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `ID_No` bigint(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personal_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personal_info` */

insert  into `personal_info`(`personal_info_id`,`fullname`,`email`,`phone`,`ID_No`,`gender`,`application_id`,`created_at`,`updated_at`) values (1,'Cleophas Omwenga','cleoctech@gmail.com',254727057310,3278428,'Male',1,'2020-07-19 13:39:16',NULL),(9,'Mathew Cabelos','mattcabelos@gmail.com',72475272,3388746565,'Male',2,'2020-07-19 00:00:00','2020-07-19 00:00:00'),(10,'Ken Keit','ken@gmail.com',7287596585,35796555,'Male',4,'2020-07-23 00:00:00','2020-07-23 00:00:00');

/*Table structure for table `referees` */

DROP TABLE IF EXISTS `referees`;

CREATE TABLE `referees` (
  `referee_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `r_address` varchar(45) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`referee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `referees` */

insert  into `referees`(`referee_id`,`fullname`,`company_name`,`position`,`r_address`,`phone`,`application_id`,`created_at`,`updated_at`) values (1,'Name A','Company A','Auditor','6014, Nairobi',7245889,1,'2020-07-22 07:29:25','2020-07-22 07:29:27'),(3,'Ann Muswa','Ink-Tech LTD.','Senior [GHHH]','916, Nairobi',726746336,4,'2020-07-23 00:00:00','2020-07-23 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `work_experience` */

DROP TABLE IF EXISTS `work_experience`;

CREATE TABLE `work_experience` (
  `work_exp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(45) DEFAULT NULL,
  `work_place` varchar(45) DEFAULT NULL,
  `w_address` varchar(45) DEFAULT NULL,
  `roles` varchar(200) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`work_exp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `work_experience` */

insert  into `work_experience`(`work_exp_id`,`job_title`,`work_place`,`w_address`,`roles`,`application_id`,`created_at`,`updated_at`) values (1,'Software Developer','DL Solutions','6014, Nairobi','Software developer\r\nDebbugger',1,NULL,NULL),(3,'Job A','Company B','814, Nakuru','Role 1 \r\nRole 2',4,'2020-07-23 00:00:00','2020-07-23 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
