/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.42 : Database - crud_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crud_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `crud_system`;

/*Table structure for table `grades` */

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `grades` */

insert  into `grades`(`grade_id`,`grade`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'10A','2025-06-08 16:11:15','2025-06-08 16:11:15',NULL),
(2,'10B','2025-06-08 16:11:19','2025-06-08 16:11:19',NULL),
(3,'10C','2025-06-08 16:11:24','2025-06-08 16:11:24',NULL),
(4,'11A','2025-06-08 16:11:27','2025-06-08 16:11:27',NULL),
(5,'11B','2025-06-08 16:11:38','2025-06-08 16:11:38',NULL),
(6,'11C','2025-06-08 16:11:47','2025-06-08 16:11:47',NULL),
(7,'12A','2025-06-08 20:13:45','2025-06-08 20:13:45',NULL),
(8,'12B','2025-06-08 20:13:53','2025-06-08 20:13:53',NULL);

/*Table structure for table `hobbies` */

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hobbies` */

insert  into `hobbies`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Reading','2025-06-08 16:31:10','2025-06-08 16:31:10',NULL),
(2,'Traveling','2025-06-08 16:31:10','2025-06-08 16:31:10',NULL),
(3,'Sports','2025-06-08 16:31:10','2025-06-08 16:31:10',NULL),
(4,'Music','2025-06-08 16:31:10','2025-06-08 16:31:10',NULL),
(5,'Art','2025-06-08 16:31:10','2025-06-08 16:31:10',NULL);

/*Table structure for table `hobby_student` */

DROP TABLE IF EXISTS `hobby_student`;

CREATE TABLE `hobby_student` (
  `stu_id` int DEFAULT NULL,
  `hob_id` int DEFAULT NULL,
  UNIQUE KEY `stu_id` (`stu_id`,`hob_id`),
  KEY `hob_id` (`hob_id`),
  CONSTRAINT `hobby_student_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hobby_student_ibfk_2` FOREIGN KEY (`hob_id`) REFERENCES `hobbies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hobby_student` */

insert  into `hobby_student`(`stu_id`,`hob_id`) values 
(1,2),
(1,3),
(2,2),
(5,4),
(5,5),
(7,1),
(7,3),
(7,5);

/*Table structure for table `login_user` */

DROP TABLE IF EXISTS `login_user`;

CREATE TABLE `login_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `login_user` */

insert  into `login_user`(`id`,`user_name`,`password`,`user_type`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'admin','admin','admin','2025-06-04 11:13:15','2025-06-04 11:13:15',NULL),
(2,'user','user','user','2025-06-04 11:16:45','2025-06-04 11:16:45',NULL);

/*Table structure for table `student_subject` */

DROP TABLE IF EXISTS `student_subject`;

CREATE TABLE `student_subject` (
  `stu_id` int DEFAULT NULL,
  `sub_id` int DEFAULT NULL,
  UNIQUE KEY `UNIQUE` (`stu_id`,`sub_id`),
  KEY `sub_id` (`sub_id`),
  CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `student_subject` */

insert  into `student_subject`(`stu_id`,`sub_id`) values 
(1,3),
(2,1),
(2,3),
(2,5),
(5,4),
(5,5),
(7,1),
(7,3),
(7,5);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admission_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`admission_no`,`first_name`,`last_name`,`gender`,`grade_id`,`address`,`email`,`phone_no`,`nic`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'YIT001','Kayal','Arjun','Female',3,'Azerbajan','kayal@gmail.com','1234567890','123456789V','2025-06-12 09:46:44','2025-06-12 09:46:44',NULL),
(2,'YIT002','Arjun','Argun','Male',2,'Azerbajan','arjun@gmail.com','1234567899','987654321V','2025-06-12 10:04:37','2025-06-12 10:04:37',NULL),
(5,'YIT003','Ranga Nayakkar','Shakthi Vel','Male',4,'India','ranga@gmail.com','0774281479','234567890V','2025-06-13 09:46:19','2025-06-13 09:46:19',NULL),
(7,'122','Jyothika','Surya','Female',1,'India','jo@gmail.com','1234567890','20000300033','2025-06-19 11:33:00','2025-06-19 11:33:00',NULL);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`subject`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Maths','2025-06-08 16:22:44','2025-06-08 16:22:44',NULL),
(2,'Science','2025-06-08 16:22:51','2025-06-08 16:22:51',NULL),
(3,'English','2025-06-08 16:22:57','2025-06-08 16:22:57',NULL),
(4,'Tamil','2025-06-08 16:23:00','2025-06-08 16:23:00',NULL),
(5,'IT','2025-06-08 16:23:03','2025-06-08 16:23:03',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
