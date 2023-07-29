/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 5.6.17 : Database - Blood_donation_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `Blood_donation_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `Blood_donation_database`;

/*Table structure for table `blood_contact` */

DROP TABLE IF EXISTS `blood_contact`;

CREATE TABLE `blood_contact` (
  `blood_contact_id` int(100) NOT NULL AUTO_INCREMENT,
  `contact_fk` int(100) DEFAULT NULL,
  `blood_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`blood_contact_id`),
  KEY `contact_fk` (`contact_fk`),
  KEY `blood_fk` (`blood_fk`),
  CONSTRAINT `blood_contact_ibfk_1` FOREIGN KEY (`contact_fk`) REFERENCES `contact` (`contact_id`) ON UPDATE CASCADE,
  CONSTRAINT `blood_contact_ibfk_2` FOREIGN KEY (`blood_fk`) REFERENCES `blood_group` (`blood_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blood_contact` */

/*Table structure for table `blood_donor_group` */

DROP TABLE IF EXISTS `blood_donor_group`;

CREATE TABLE `blood_donor_group` (
  `blood_donor_group_id` int(100) NOT NULL AUTO_INCREMENT,
  `donor_fk` int(100) DEFAULT NULL,
  `blood_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`blood_donor_group_id`),
  KEY `donor_fk` (`donor_fk`),
  KEY `blood_fk` (`blood_fk`),
  CONSTRAINT `blood_donor_group_ibfk_1` FOREIGN KEY (`donor_fk`) REFERENCES `donor` (`donor_id`) ON UPDATE CASCADE,
  CONSTRAINT `blood_donor_group_ibfk_2` FOREIGN KEY (`blood_fk`) REFERENCES `blood_group` (`blood_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blood_donor_group` */

/*Table structure for table `blood_group` */

DROP TABLE IF EXISTS `blood_group`;

CREATE TABLE `blood_group` (
  `blood_id` int(100) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `blood_group` */

INSERT INTO `blood_group` (`blood_id`, `blood_group`) VALUES 
(3, 'sd'),
(5, 'D#');

/*Table structure for table `blood_request_group` */

DROP TABLE IF EXISTS `blood_request_group`;

CREATE TABLE `blood_request_group` (
  `blood_request_group_id` int(100) NOT NULL AUTO_INCREMENT,
  `blood_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`blood_request_group_id`),
  KEY `blood_fk` (`blood_fk`),
  CONSTRAINT `blood_request_group_ibfk_2` FOREIGN KEY (`blood_fk`) REFERENCES `blood_group` (`blood_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blood_request_group` */

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_id` int(100) NOT NULL AUTO_INCREMENT,
  `city_code` varchar(100) DEFAULT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `donor_fk` int(100) DEFAULT NULL,
  `state_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `donor_fk` (`donor_fk`),
  KEY `state_fk` (`state_fk`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`donor_fk`) REFERENCES `donor` (`donor_id`) ON UPDATE CASCADE,
  CONSTRAINT `city_ibfk_3` FOREIGN KEY (`state_fk`) REFERENCES `state` (`state_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `city` */

INSERT INTO `city` (`city_id`, `city_code`, `city_name`, `description`, `donor_fk`, `state_fk`) VALUES 
(1, 'Msa', 'Mombasa', 'City', NULL, 1),
(2, 'Nrb', 'Nairobi', 'City', NULL, 2);

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `contact_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `member_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `member_fk` (`member_fk`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`member_fk`) REFERENCES `users` (`member_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

/*Table structure for table `donor` */

DROP TABLE IF EXISTS `donor`;

CREATE TABLE `donor` (
  `donor_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `datepicker` varchar(100) DEFAULT NULL,
  `body_weight` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `blood_group` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username_fk` varchar(100) NOT NULL,
  `status` int(12) DEFAULT NULL,
  `pends` int(12) DEFAULT 0,
  PRIMARY KEY (`donor_id`,`username_fk`),
  KEY `users` (`username_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Table structure for table `email_subs` */

DROP TABLE IF EXISTS `email_subs`;

CREATE TABLE `email_subs` (
  `subscribe_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(160) DEFAULT NULL,
  `member_fk` int(100) DEFAULT NULL,
  PRIMARY KEY (`subscribe_id`),
  KEY `member_fk` (`member_fk`),
  CONSTRAINT `email_subs_ibfk_1` FOREIGN KEY (`member_fk`) REFERENCES `users` (`member_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `email_subs` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `member_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `profile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`member_id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

INSERT INTO `users` (`member_id`, `name`, `username`, `password`, `email`, `phone`, `address`, `usertype`, `profile`) VALUES 
(1, 'Admin', 'admin', 'admin', NULL, NULL, NULL, 'admin', 'upload/3_1521639658.jpg'),
(2, 'Donor', 'donor', 'donor', NULL, NULL, NULL, 'donor', 'upload/vehicle_1521645370.png');

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_id` int(100) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(100) DEFAULT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `state` */

INSERT INTO `state` (`state_id`, `state_code`, `state_name`, `description`) VALUES 
(1, 'Cst', 'Coast', 'Province'),
(2, 'Ctr', 'Central', 'Province');

/*Table structure for table `stats` */

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `stats_id` int(100) NOT NULL AUTO_INCREMENT,
  `pending_req` int(100) NOT NULL,
  `approved_req` int(100) NOT NULL,
  `visits` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `users` (`member_id`) ON UPDATE CASCADE,
  PRIMARY KEY (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stats` (`pending_req`, `approved_req`, `visits`, `member_id`)
VALUES (0, 0, 0, 2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
