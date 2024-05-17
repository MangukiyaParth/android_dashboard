/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - db_android
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_adx` */

DROP TABLE IF EXISTS `tbl_adx`;

CREATE TABLE `tbl_adx` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_adx` */

insert  into `tbl_adx`(`id`,`name`,`entry_uid`,`entry_date`,`update_uid`,`update_date`) values ('17128327-9266-1036-73d7-310de75d4c9b','Main ADX','17019352-1247-1172-9a37-27852d564b27','2024-04-11 16:23:12',NULL,NULL);

/*Table structure for table `tbl_app_ad_settings` */

DROP TABLE IF EXISTS `tbl_app_ad_settings`;

CREATE TABLE `tbl_app_ad_settings` (
  `id` varchar(50) NOT NULL,
  `app_id` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `is_bifurcate` tinyint(4) DEFAULT 0,
  `bifurcate_location` longtext DEFAULT NULL,
  `app_color` varchar(10) DEFAULT NULL,
  `app_background_color` varchar(10) DEFAULT NULL,
  `native_loading` varchar(10) DEFAULT NULL,
  `bottom_banner` varchar(10) DEFAULT NULL,
  `all_screen_native` varchar(10) DEFAULT NULL,
  `list_native` varchar(10) DEFAULT NULL,
  `list_native_cnt` int(11) DEFAULT NULL,
  `exit_dialoge_native` varchar(10) DEFAULT NULL,
  `native_btn` varchar(10) DEFAULT NULL,
  `native_btn_text` varchar(15) DEFAULT NULL,
  `native_background_color` varchar(10) DEFAULT NULL,
  `native_text_color` varchar(10) DEFAULT NULL,
  `native_button_background_color` varchar(10) DEFAULT NULL,
  `native_button_text_color` varchar(10) DEFAULT NULL,
  `alternate_with_appopen` varchar(10) DEFAULT NULL,
  `inter_loading` varchar(10) DEFAULT NULL,
  `inter_interval` int(11) DEFAULT NULL,
  `back_click_inter` int(11) DEFAULT NULL,
  `app_open_loading` varchar(10) DEFAULT NULL,
  `splash_ads` varchar(10) DEFAULT NULL,
  `app_open` varchar(10) DEFAULT NULL,
  `all_ads` varchar(10) DEFAULT NULL,
  `fullscreen` varchar(10) DEFAULT NULL,
  `adblock_version` varchar(15) DEFAULT NULL,
  `continue_screen` varchar(10) DEFAULT NULL,
  `lets_start_screen` varchar(10) DEFAULT NULL,
  `age_screen` varchar(10) DEFAULT NULL,
  `next_screen` varchar(10) DEFAULT NULL,
  `next_inner_screen` varchar(10) DEFAULT NULL,
  `contact_screen` varchar(10) DEFAULT NULL,
  `start_screen` varchar(10) DEFAULT NULL,
  `real_casting_flow` varchar(10) DEFAULT NULL,
  `app_stop` varchar(10) DEFAULT NULL,
  `additional_fields` longtext DEFAULT NULL,
  `vpn` varchar(10) DEFAULT NULL,
  `vpn_dialog` varchar(10) DEFAULT NULL,
  `vpn_dialog_open` varchar(10) DEFAULT NULL,
  `vpn_country` longtext DEFAULT NULL,
  `vpn_url` varchar(300) DEFAULT NULL,
  `vpn_carrier_id` varchar(50) DEFAULT NULL,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `bifurcate_location` (`bifurcate_location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_app_ad_settings` */

insert  into `tbl_app_ad_settings`(`id`,`app_id`,`type`,`is_bifurcate`,`bifurcate_location`,`app_color`,`app_background_color`,`native_loading`,`bottom_banner`,`all_screen_native`,`list_native`,`list_native_cnt`,`exit_dialoge_native`,`native_btn`,`native_btn_text`,`native_background_color`,`native_text_color`,`native_button_background_color`,`native_button_text_color`,`alternate_with_appopen`,`inter_loading`,`inter_interval`,`back_click_inter`,`app_open_loading`,`splash_ads`,`app_open`,`all_ads`,`fullscreen`,`adblock_version`,`continue_screen`,`lets_start_screen`,`age_screen`,`next_screen`,`next_inner_screen`,`contact_screen`,`start_screen`,`real_casting_flow`,`app_stop`,`additional_fields`,`vpn`,`vpn_dialog`,`vpn_dialog_open`,`vpn_country`,`vpn_url`,`vpn_carrier_id`,`entry_uid`,`entry_date`,`update_uid`,`update_date`) values ('17019352-1247-1172-9a37-27852d564b27','17137879-9287-8269-df0c-06222d4c49a1',1,1,'gujarat,Gujarat,Surat,surat','#000000','#FFFFFF','onload','banner','hide','hide',0,'hide','default','','#FFFEFF','#808080','#4285F4','#FFFEFF','hide','onload',2,2,'onload','hide','onetime','hide','hide','','hide','hide','hide','hide','hide','hide','hide','hide','hide','[]','hide','hide','hide','[]','','','17019352-1247-1172-9a37-27852d564b27','2024-04-24 10:37:18','17019352-1247-1172-9a37-27852d564b27','2024-04-24 10:39:15'),('17135007-0679-1356-3993-d30362c84f1d','17128887-3017-7352-897e-c7c144174289',1,0,'','#F58F00','#999CFF','onload','banner','show','show',0,'hide','manual','Test','#61D0FF','#EB0000','#0542A3','#FF6BFF','show','preload',1,1,'onload','openads','everytime','show','hide','123','hide','show','show','hide','hide','show','show','show','hide','[]',NULL,NULL,NULL,NULL,NULL,NULL,'17019352-1247-1172-9a37-27852d564b27','2024-04-19 09:55:06','17019352-1247-1172-9a37-27852d564b27','2024-04-23 15:17:18'),('17135232-9163-5369-713a-c4819cdf414d','17128887-3017-7352-897e-c7c144174289',1,1,'ind,IN,Surat','#000000','#FFFFFF','onload','native','hide','hide',0,'hide','default','','#FFFEFF','#808080','#4285F4','#FFFEFF','hide','onload',0,0,'onload','hide','onetime',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'17019352-1247-1172-9a37-27852d564b27','2024-04-19 16:11:31',NULL,NULL);

/*Table structure for table `tbl_app_users` */

DROP TABLE IF EXISTS `tbl_app_users`;

CREATE TABLE `tbl_app_users` (
  `id` varchar(50) NOT NULL,
  `package` varchar(150) DEFAULT NULL,
  `as` varchar(150) DEFAULT NULL,
  `asname` varchar(100) DEFAULT NULL,
  `callingCode` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `continent` varchar(50) DEFAULT NULL,
  `continentCode` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `countryCode` varchar(10) DEFAULT NULL,
  `countryCode3` varchar(10) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `currentTime` varchar(20) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `hosting` varchar(10) DEFAULT NULL,
  `isp` varchar(50) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `org` varchar(50) DEFAULT NULL,
  `proxy` varchar(10) DEFAULT NULL,
  `query` varchar(10) DEFAULT NULL,
  `region` varchar(10) DEFAULT NULL,
  `regionName` varchar(50) DEFAULT NULL,
  `reverse` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `timezone` varchar(20) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `device_id` varchar(20) DEFAULT NULL,
  `retention` varchar(10) DEFAULT NULL,
  `installerinfo` varchar(10) DEFAULT NULL,
  `installerurl` varchar(250) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_app_users` */

insert  into `tbl_app_users`(`id`,`package`,`as`,`asname`,`callingCode`,`city`,`continent`,`continentCode`,`country`,`countryCode`,`countryCode3`,`currency`,`currentTime`,`district`,`hosting`,`isp`,`lat`,`lon`,`mobile`,`offset`,`org`,`proxy`,`query`,`region`,`regionName`,`reverse`,`status`,`timezone`,`zip`,`device_id`,`retention`,`installerinfo`,`installerurl`,`entry_date`) values ('17136051-0439-0071-2f06-79eaed4f4e7d','ldqloanemicalc.loanemitools.loanemicalculator.tssipcalculator','AS24560 Bharti Airtel Ltd., Telemedia Services','AIRTELBROADBAND-AS-AP','91','Ahmedabad','Asia','AS','India','IN','IND','INR','2023-07-25T16:14:55+','','false','Bharti Airtel Limited',23.0276,72.5871,'true',19800,'BHARTI','false','171.50.187','GJ','Gujarat','','success','Asia/Kolkata','380006','69bca4780574c969','false','false','utm_source=google-play&utm_medium=organic','2024-04-20 15:08:33'),('17138515-7643-7755-319d-e0cf8b164a19','ldqloanemicalc.loanemitools.loanemicalculator.tssipcalculator','AS24560 Bharti Airtel Ltd., Telemedia Services','AIRTELBROADBAND-AS-AP','91','Ahmedabad','Asia','AS','India','IN','IND','INR','2023-07-25T16:14:55+','','false','Bharti Airtel Limited',23.0276,72.5871,'true',19800,'BHARTI','false','171.50.187','GJ','Gujarat','','success','Asia/Kolkata','380006','69bca4780574c969','false','false','utm_source=google-play&utm_medium=organic','2024-04-23 11:22:56'),('17139338-5394-7213-445b-0cd8e0a14b35','ldqloanemicalc.loanemitools.loanemicalculator.tssipcalculator','AS24560 Bharti Airtel Ltd., Telemedia Services','AIRTELBROADBAND-AS-AP','91','Ahmedabad','Asia','AS','India','IN','IND','INR','2023-07-25T16:14:55+','','false','Bharti Airtel Limited',23.0276,72.5871,'true',19800,'BHARTI','false','171.50.187','GJ','Gujarat','','success','Asia/Kolkata','380006','69bca4780574c969','false','false','utm_source=google-play&utm_medium=organic','2024-04-24 10:14:13');

/*Table structure for table `tbl_apps` */

DROP TABLE IF EXISTS `tbl_apps`;

CREATE TABLE `tbl_apps` (
  `id` varchar(50) NOT NULL,
  `playstore` varchar(100) DEFAULT NULL,
  `adx` varchar(100) DEFAULT NULL,
  `app_code` varchar(50) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `web_url` varchar(100) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `file` longtext DEFAULT NULL,
  `file_data` longtext DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_apps` */

insert  into `tbl_apps`(`id`,`playstore`,`adx`,`app_code`,`app_name`,`package_name`,`web_url`,`notes`,`status`,`file`,`file_data`,`is_deleted`,`entry_uid`,`entry_date`,`update_uid`,`update_date`) values ('17128887-3017-7352-897e-c7c144174289','17128160-3311-2597-5cb4-f07cb4164d21','17128327-9266-1036-73d7-310de75d4c9b','12345','Test 123','ldqloanemicalc.loanemitools.loanemicalculator.tssipcalculator','www.test.com','test',4,'upload/images/app/17128887-3017-7352-897e-c7c144174289/Screenshot 2024-03-19 101809.png','[{\"uuid\":\"88fd32ac-c8c8-4e2a-a53b-69af029c57b3\",\"name\":\"Screenshot 2024-03-19 101809.png\",\"filename\":\"Screenshot 2024-03-19 101809.png\",\"size\":386970,\"total\":386970,\"bytesSent\":386970,\"url\":\"upload/images/app/17128887-3017-7352-897e-c7c144174289/Screenshot 2024-03-19 101809.png\"}]',0,'17019352-1247-1172-9a37-27852d564b27','2024-04-12 07:55:30','17019352-1247-1172-9a37-27852d564b27','2024-04-23 10:51:44'),('17137879-9287-8269-df0c-06222d4c49a1','','','','sdfsdf','','','',1,'upload/images/app/17137879-9287-8269-df0c-06222d4c49a1/images.png','[{\"uuid\":\"ec47ffb9-93dd-49c3-963f-b7e0696ce650\",\"name\":\"images.png\",\"filename\":\"images.png\",\"size\":3475,\"total\":3475,\"bytesSent\":3475,\"url\":\"upload/images/app/17137879-9287-8269-df0c-06222d4c49a1/images.png\"}]',0,'17019352-1247-1172-9a37-27852d564b27','2024-04-22 17:43:12','17019352-1247-1172-9a37-27852d564b27','2024-04-22 17:51:28');

/*Table structure for table `tbl_apps_settings` */

DROP TABLE IF EXISTS `tbl_apps_settings`;

CREATE TABLE `tbl_apps_settings` (
  `id` varchar(50) NOT NULL,
  `app_id` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `g1_percentage` varchar(20) DEFAULT NULL,
  `g2_percentage` varchar(20) DEFAULT NULL,
  `g3_percentage` varchar(20) DEFAULT NULL,
  `g1_account_name` varchar(100) DEFAULT NULL,
  `g2_account_name` varchar(100) DEFAULT NULL,
  `g3_account_name` varchar(100) DEFAULT NULL,
  `g1_banner` varchar(150) DEFAULT NULL,
  `g2_banner` varchar(150) DEFAULT NULL,
  `g3_banner` varchar(150) DEFAULT NULL,
  `g1_inter` varchar(150) DEFAULT NULL,
  `g2_inter` varchar(150) DEFAULT NULL,
  `g3_inter` varchar(150) DEFAULT NULL,
  `g1_native` varchar(150) DEFAULT NULL,
  `g2_native` varchar(150) DEFAULT NULL,
  `g3_native` varchar(150) DEFAULT NULL,
  `g1_native2` varchar(150) DEFAULT NULL,
  `g2_native2` varchar(150) DEFAULT NULL,
  `g3_native2` varchar(150) DEFAULT NULL,
  `g1_appopen` varchar(150) DEFAULT NULL,
  `g2_appopen` varchar(150) DEFAULT NULL,
  `g3_appopen` varchar(150) DEFAULT NULL,
  `g1_appid` varchar(150) DEFAULT NULL,
  `g2_appid` varchar(150) DEFAULT NULL,
  `g3_appid` varchar(150) DEFAULT NULL,
  `app_remove_flag` varchar(10) DEFAULT NULL,
  `app_version` varchar(10) DEFAULT NULL,
  `app_remove_title` varchar(100) DEFAULT NULL,
  `app_remove_description` longtext DEFAULT NULL,
  `app_remove_url` varchar(250) DEFAULT NULL,
  `app_remove_button_name` varchar(50) DEFAULT NULL,
  `app_remove_skip_button_name` varchar(50) DEFAULT NULL,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_apps_settings` */

insert  into `tbl_apps_settings`(`id`,`app_id`,`type`,`g1_percentage`,`g2_percentage`,`g3_percentage`,`g1_account_name`,`g2_account_name`,`g3_account_name`,`g1_banner`,`g2_banner`,`g3_banner`,`g1_inter`,`g2_inter`,`g3_inter`,`g1_native`,`g2_native`,`g3_native`,`g1_native2`,`g2_native2`,`g3_native2`,`g1_appopen`,`g2_appopen`,`g3_appopen`,`g1_appid`,`g2_appid`,`g3_appid`,`app_remove_flag`,`app_version`,`app_remove_title`,`app_remove_description`,`app_remove_url`,`app_remove_button_name`,`app_remove_skip_button_name`,`entry_uid`,`entry_date`,`update_uid`,`update_date`) values ('17131726-0794-7250-5395-19dbeda042b8','17128887-3017-7352-897e-c7c144174289',1,'75','25','','Test','Test 2','','ca-app-pub-3940256099942544/630097811','ca-app-pub-3940256099942544/630097811','ca-app-pub-3940256099942544/630097811','ca-app-pub-3940256099942544/1033173712','ca-app-pub-3940256099942544/1033173712','ca-app-pub-3940256099942544/1033173712','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/2247696110','ca-app-pub-3940256099942544/3419835294','ca-app-pub-3940256099942544/3419835294','ca-app-pub-3940256099942544/3419835294','qwe','','','move_app','1.0.0','Title','This is title','www.google.com','Update','Skip','17019352-1247-1172-9a37-27852d564b27','2024-04-15 14:46:47','17019352-1247-1172-9a37-27852d564b27','2024-04-20 13:39:56');

/*Table structure for table `tbl_audit_logs` */

DROP TABLE IF EXISTS `tbl_audit_logs`;

CREATE TABLE `tbl_audit_logs` (
  `id` varchar(50) NOT NULL,
  `record_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  `from` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `custom_text` longtext DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_audit_logs` */

insert  into `tbl_audit_logs`(`id`,`record_id`,`user_id`,`action`,`operation`,`from`,`status`,`date_added`,`date_modified`,`custom_text`,`is_deleted`,`ip_address`) values ('',0,NULL,'Login','login_user','panel',1,'2024-04-11 11:17:38','2024-04-11 11:17:38','',NULL,'::1');

/*Table structure for table `tbl_menumaster` */

DROP TABLE IF EXISTS `tbl_menumaster`;

CREATE TABLE `tbl_menumaster` (
  `id` varchar(50) DEFAULT NULL,
  `menuname` varchar(50) DEFAULT NULL,
  `pagename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_menumaster` */

insert  into `tbl_menumaster`(`id`,`menuname`,`pagename`) values ('17024612-6799-0841-dfbc-c6f078474330','Apps','manage_apps'),('17024613-1815-4677-e481-26bd85c4440c','Removed Apps','manage_removed_apps'),('17024613-2381-8465-ffdf-d46967d64445','Play Store','manage_play_store'),('17024613-2714-6516-4c0c-e0ea67124fe1','ADX','manage_adx'),('17138720-3655-8054-8401-cf9d19ca438f','Notification','manage_notification');

/*Table structure for table `tbl_notification` */

DROP TABLE IF EXISTS `tbl_notification`;

CREATE TABLE `tbl_notification` (
  `id` varchar(50) NOT NULL,
  `app_id` varchar(50) DEFAULT NULL,
  `app_name` varchar(150) DEFAULT NULL,
  `app_package` varchar(150) DEFAULT NULL,
  `app_logo` longtext DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `is_read` tinyint(4) DEFAULT 0,
  `entry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_notification` */

insert  into `tbl_notification`(`id`,`app_id`,`app_name`,`app_package`,`app_logo`,`type`,`is_read`,`entry_date`) values ('17138719-8128-6958-270e-ea4b04a14437','17128887-3017-7352-897e-c7c144174289','Test 123','ldqloanemicalc.loanemitools.loanemicalculator.tssipcalculator','upload/images/app/17128887-3017-7352-897e-c7c144174289/Screenshot 2024-03-19 101809.png',2,0,'2024-04-23 17:03:01');

/*Table structure for table `tbl_play_store` */

DROP TABLE IF EXISTS `tbl_play_store`;

CREATE TABLE `tbl_play_store` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `device_owner` varchar(100) DEFAULT NULL,
  `service_number` varchar(50) DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_play_store` */

insert  into `tbl_play_store`(`id`,`name`,`device_owner`,`service_number`,`remark`,`status`,`entry_uid`,`entry_date`,`update_uid`,`update_date`) values ('17128160-3311-2597-5cb4-f07cb4164d21','Main Account','Parth','12345','Not',3,'17019352-1247-1172-9a37-27852d564b27','2024-04-11 11:43:53','17019352-1247-1172-9a37-27852d564b27','2024-04-11 12:00:36');

/*Table structure for table `tbl_roles` */

DROP TABLE IF EXISTS `tbl_roles`;

CREATE TABLE `tbl_roles` (
  `id` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_roles` */

insert  into `tbl_roles`(`id`,`role`) values ('17019350-1059-3172-f8de-9c507e9e4901','Admin');

/*Table structure for table `tbl_slidermaster` */

DROP TABLE IF EXISTS `tbl_slidermaster`;

CREATE TABLE `tbl_slidermaster` (
  `id` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `btntext` varchar(50) DEFAULT NULL,
  `orderno` int(11) NOT NULL,
  `isactive` int(11) DEFAULT 1,
  `entry_uid` varchar(50) NOT NULL,
  `entry_by` varchar(100) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(100) DEFAULT NULL,
  `update_uid` varchar(50) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `file_data` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_by` (`entry_by`),
  KEY `entry_date` (`entry_date`),
  KEY `entry_uid` (`entry_uid`),
  KEY `isactive` (`isactive`),
  KEY `orderno` (`orderno`),
  KEY `title` (`title`(3072)),
  KEY `update_by` (`update_by`),
  KEY `update_date` (`update_date`),
  KEY `update_uid` (`update_uid`),
  KEY `btntext` (`btntext`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_slidermaster` */

insert  into `tbl_slidermaster`(`id`,`title`,`description`,`btntext`,`orderno`,`isactive`,`entry_uid`,`entry_by`,`entry_date`,`update_date`,`update_by`,`update_uid`,`file`,`file_data`) values ('17062652-2929-9561-e724-306b4f9640e4','The best car for both world','The best car of the year','Buy Now',2,1,'17019352-1247-1172-9a37-27852d564b27',NULL,'2024-01-26 16:03:49','2024-04-09 11:41:26',NULL,'17019352-1247-1172-9a37-27852d564b27','upload/images/slider/17062652-2929-9561-e724-306b4f9640e4/bgimage1.png','[{\"uuid\":\"cf85462b-9925-47aa-81ef-04ee09c7e303\",\"name\":\"bgimage1.png\",\"filename\":\"bgimage1.png\",\"size\":889552,\"total\":889552,\"bytesSent\":889552,\"url\":\"upload/images/slider/17062652-2929-9561-e724-306b4f9640e4/bgimage1.png\"}]'),('17101311-9531-7531-04e2-bbbe2f354f53','','','Buy Now',1,1,'17019352-1247-1172-9a37-27852d564b27',NULL,'2024-03-11 09:56:35',NULL,NULL,NULL,'upload/images/slider/17101311-9531-7531-04e2-bbbe2f354f53/pexels-mike-bird-3729464.jpg','[{\"uuid\":\"94930ee1-952b-4db5-bb42-10c4c86e2943\",\"name\":\"pexels-mike-bird-3729464.jpg\",\"filename\":\"pexels-mike-bird-3729464.jpg\",\"size\":2875735,\"total\":2875735,\"bytesSent\":2875735,\"url\":\"upload/images/slider/17101311-9531-7531-04e2-bbbe2f354f53/pexels-mike-bird-3729464.jpg\"}]');

/*Table structure for table `tbl_user_cmp` */

DROP TABLE IF EXISTS `tbl_user_cmp`;

CREATE TABLE `tbl_user_cmp` (
  `id` varchar(50) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `cmpid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user_cmp` */

/*Table structure for table `tbl_userrights` */

DROP TABLE IF EXISTS `tbl_userrights`;

CREATE TABLE `tbl_userrights` (
  `id` varchar(50) NOT NULL,
  `roleid` varchar(50) DEFAULT NULL,
  `personid` varchar(50) DEFAULT NULL,
  `menuid` varchar(50) DEFAULT NULL,
  `viewright` tinyint(4) DEFAULT 0,
  `addright` tinyint(4) DEFAULT 0,
  `editright` tinyint(4) DEFAULT 0,
  `deleteright` tinyint(4) DEFAULT 0,
  `entry_uid` varchar(50) DEFAULT NULL,
  `entry_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_userrights` */

/*Table structure for table `tbl_userrole` */

DROP TABLE IF EXISTS `tbl_userrole`;

CREATE TABLE `tbl_userrole` (
  `id` varchar(50) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `roleid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_userrole` */

insert  into `tbl_userrole`(`id`,`userid`,`roleid`) values ('17016828-1780-0914-937a-ab8435db4a4d','17019352-1247-1172-9a37-27852d564b27','92212996-3bce-4dc3-9a33-63b6490be21f');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` varchar(50) DEFAULT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `last_login_offset` varchar(50) DEFAULT NULL,
  `insert_at` datetime DEFAULT current_timestamp(),
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`name`,`username`,`password`,`role_id`,`last_logged_in`,`last_login_offset`,`insert_at`,`phone`,`email`,`token`,`otp`) values ('17019352-1247-1172-9a37-27852d564b27','Admin','a','0cc175b9c0f1b6a831c399e269772661','17019350-1059-3172-f8de-9c507e9e4901','2024-04-22 17:14:05','330','2023-02-01 11:49:50',NULL,'admin@admin.com','',386110);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
