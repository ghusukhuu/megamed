/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : megamed

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-01-23 16:12:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Default');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `intro` varchar(455) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1' COMMENT '1=active, 2=inactive',
  `created_user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', 'C-Bond', 'Гэрлийн хуванцар ломбоны материал наах цавуу', 'Гэрлийн хуванцар ломбоны материал наах цавуу', '45000', '9ac1cab94edf93bbdde9ae9a4cdd9dbba8b0d050.jpg', '1', '1', '2016-09-24 16:49:50');
INSERT INTO `product` VALUES ('2', '1', 'C-Cid Etching Gel', '37%-ийн фосфорын хүчил ', '37%-ийн фосфорын хүчил ', '18000', 'c-cid-etching-gel.jpg', '1', '1', '2016-09-24 16:49:50');
INSERT INTO `product` VALUES ('3', '1', 'C-Prime SE', 'Хамгийн сүүлийн үеийн өөртөө хүчил агуулсан нэг алхамт 7-р шатлалын усан суурьтай бондын систем.', 'Хамгийн сүүлийн үеийн өөртөө хүчил агуулсан нэг алхамт 7-р шатлалын усан суурьтай бондын систем.', '90000', 'c-prime-se.png', '1', '1', '2016-09-24 16:49:50');
INSERT INTO `product` VALUES ('4', '1', 'C-Prime S plus', 'Хамгийн сүүлийн үеийн өөртөө хүчил агуулсан нэг алхамт 7-р шатлалын спиртэн суурьтай бондын систем.', 'Хамгийн сүүлийн үеийн өөртөө хүчил агуулсан нэг алхамт 7-р шатлалын спиртэн суурьтай бондын систем.', '90000', 'c-prime-s-plus.png', '1', '1', '2016-09-24 16:49:50');
INSERT INTO `product` VALUES ('5', '1', 'Megacem /гласс иономерны цемент', 'Цооролын хөндийн 1,2,3,-р ангилалын цоорол , ховил битүүлэх,  сүүн шүд ломбодох ...', 'Цооролын хөндийн 1,2,3,-р ангилалын цоорол , ховил битүүлэх,  сүүн шүд ломбодох,  голонцор тогтоох зэрэгт хэрэглэхэд илүү тохиромжтой. Өөрөөсөө Ca болон  F  ялгаруулдаг.', '80000', 'c-cement-flow.png', '1', '1', '2016-09-24 16:49:50');
INSERT INTO `product` VALUES ('6', '1', 'Megafix /гласс иономерны цемент', 'Согог гажиг заслын практикт хэрэглэхэд илүү тохиромжтой.', 'Согог гажиг заслын практикт хэрэглэхэд илүү тохиромжтой. Бүрээс, гүүрэлсэн шүдэлбэр, инлей, нүүрэвч зэргийг наана. Шүдний практикт хэрэглэдэг бусад төрлийн наагч цементүүдийн боломжит зузаан 25мм болон түүнээс дээш зузаантай байдаг бол уг материалын хувьд   25мм-аас доош  буюу илүү нимгэн, бат бөх наалдах чадвартай. Мөн мөтериал нь паалан болон тугалмайтай сайтар наалдахаас гадна өөрөөсөө Ca, F -ийг ялгаруулдаг давуу талтай.                                          ', '80000', '1634.jpg', '1', '1', '2016-09-24 16:49:50');

-- ----------------------------
-- Table structure for product_detail
-- ----------------------------
DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_detail_type_id` int(11) NOT NULL,
  `val` varchar(155) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_detail
-- ----------------------------
INSERT INTO `product_detail` VALUES ('1', '1', '1', '5 мл');
INSERT INTO `product_detail` VALUES ('2', '2', '1', '3 гр');
INSERT INTO `product_detail` VALUES ('3', '3', '1', '5 мл');
INSERT INTO `product_detail` VALUES ('4', '4', '1', '5 мл');
INSERT INTO `product_detail` VALUES ('5', '5', '1', '20 гр нунтаг');
INSERT INTO `product_detail` VALUES ('6', '5', '1', '10 мл шингэн ');
INSERT INTO `product_detail` VALUES ('7', '5', '2', 'A1');
INSERT INTO `product_detail` VALUES ('8', '5', '2', 'A2');
INSERT INTO `product_detail` VALUES ('9', '5', '2', 'A3');
INSERT INTO `product_detail` VALUES ('10', '6', '2', 'A1');
INSERT INTO `product_detail` VALUES ('11', '6', '2', 'A2');
INSERT INTO `product_detail` VALUES ('12', '6', '2', 'A3');
INSERT INTO `product_detail` VALUES ('13', '6', '1', '20 гр нунтаг');
INSERT INTO `product_detail` VALUES ('14', '6', '1', '10 мл шингэн ');

-- ----------------------------
-- Table structure for product_detail_type
-- ----------------------------
DROP TABLE IF EXISTS `product_detail_type`;
CREATE TABLE `product_detail_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_detail_type
-- ----------------------------
INSERT INTO `product_detail_type` VALUES ('1', 'Өнгө');
INSERT INTO `product_detail_type` VALUES ('2', 'Савалгаа');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=system users, 2=normal users',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'usukhuu', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Manlaibaatar', 'Usukhbayar', 'm.usukhbayar@gmail.com', '1', '2016-10-18 08:44:57', '2016-09-30 16:59:52');
