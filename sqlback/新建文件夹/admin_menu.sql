# Host: localhost  (Version: 5.7.26)
# Date: 2019-11-18 15:03:39
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin_menu"
#

DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_menu"
#

/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (2,0,2,'管理员','fa-tasks','',NULL,NULL,NULL),(3,2,3,'用户','fa-users','auth/users',NULL,NULL,NULL),(4,2,4,'角色','fa-user','auth/roles',NULL,NULL,NULL),(5,2,5,'权限','fa-ban','auth/permissions',NULL,NULL,NULL),(6,2,6,'菜单','fa-bars','auth/menu',NULL,NULL,NULL),(7,2,7,'操作历史','fa-history','auth/logs',NULL,NULL,NULL),(8,0,0,'公测免单','fa-bars',NULL,NULL,'2019-11-12 01:07:35','2019-11-12 01:07:35'),(9,0,0,'发圈','fa-bars',NULL,NULL,'2019-11-12 01:08:47','2019-11-12 01:08:47'),(10,9,0,'分类','fa-bars','market-cates','faquan','2019-11-12 01:20:08','2019-11-12 01:41:31'),(11,9,0,'发圈内容','fa-bars','markets','faquan','2019-11-12 06:12:41','2019-11-12 09:31:42'),(12,9,0,'发布人管理','fa-bars','market-users','faquan','2019-11-12 09:32:15','2019-11-12 09:32:15'),(13,8,0,'免单列表','fa-bars','frees',NULL,'2019-11-18 06:30:51','2019-11-18 06:30:51'),(14,8,0,'设置','fa-bars','free-settings',NULL,'2019-11-18 06:31:39','2019-11-18 06:31:39'),(15,8,0,'商品列表','fa-bars','coupons',NULL,'2019-11-18 06:32:12','2019-11-18 06:32:12');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
