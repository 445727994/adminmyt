# Host: localhost  (Version: 5.7.26)
# Date: 2019-12-07 17:31:53
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_menu"
#

/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (2,0,17,'管理员','fa-tasks','',NULL,NULL,'2019-12-05 03:15:31'),(3,2,18,'用户','fa-users','auth/users',NULL,NULL,'2019-12-05 03:15:31'),(4,2,19,'角色','fa-user','auth/roles',NULL,NULL,'2019-12-05 03:15:31'),(5,2,20,'权限','fa-ban','auth/permissions',NULL,NULL,'2019-12-05 03:15:31'),(6,2,21,'菜单','fa-bars','auth/menu',NULL,NULL,'2019-12-05 03:15:31'),(7,2,22,'操作历史','fa-history','auth/logs',NULL,NULL,'2019-12-05 03:15:31'),(8,0,1,'公测免单','fa-bars',NULL,NULL,'2019-11-12 01:07:35','2019-12-05 03:15:31'),(9,0,5,'发圈','fa-bars',NULL,NULL,'2019-11-12 01:08:47','2019-12-05 03:15:31'),(10,9,6,'分类','fa-bars','market-cates','faquan','2019-11-12 01:20:08','2019-12-05 03:15:31'),(11,9,7,'发圈内容','fa-bars','markets','faquan','2019-11-12 06:12:41','2019-12-05 03:15:31'),(12,9,8,'发布人管理','fa-bars','market-users','faquan','2019-11-12 09:32:15','2019-12-05 03:15:31'),(13,8,3,'免单列表','fa-bars','frees',NULL,'2019-11-18 06:30:51','2019-12-05 03:15:31'),(14,8,4,'设置','fa-bars','free-settings',NULL,'2019-11-18 06:31:39','2019-12-05 03:15:31'),(15,8,2,'商品列表','fa-bars','coupons',NULL,'2019-11-18 06:32:12','2019-12-05 03:15:31'),(16,9,9,'营销内容','fa-bars','markets-list',NULL,'2019-11-18 10:25:30','2019-12-05 03:15:31'),(17,9,10,'麦芽学院','fa-bars','markets-school',NULL,'2019-11-19 07:29:49','2019-12-05 03:15:31'),(18,0,11,'用户','fa-bars',NULL,NULL,'2019-11-19 09:00:39','2019-12-05 03:15:31'),(19,18,12,'用户等级','fa-bars','levels',NULL,'2019-11-19 09:01:01','2019-12-05 03:15:31'),(20,0,13,'商城','fa-bars',NULL,NULL,'2019-12-05 03:13:14','2019-12-05 03:15:31'),(21,20,14,'商品','fa-bars','shop-goods',NULL,'2019-12-05 03:14:29','2019-12-05 03:15:31'),(22,20,15,'商品分类','fa-bars','shop-categories',NULL,'2019-12-05 03:14:53','2019-12-05 03:15:31'),(23,20,16,'商品订单','fa-bars','shop-orders',NULL,'2019-12-05 03:15:17','2019-12-05 03:15:31');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
