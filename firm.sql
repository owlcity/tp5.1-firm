/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : firm

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 06/09/2020 16:49:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `login_count` int(4) DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  `is_update` tinyint(4) NOT NULL DEFAULT '1',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', 12, 1599376106, 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
BEGIN;
INSERT INTO `banner` VALUES (1, '20200906/243425cd1d894f8ba5f47fc7ba54e11e.jpg', 'https://gitee.com/owl_city/wetool_person/invite_link?invite=2b9137c59904bf09eead47070b4037a99bc4307d065eab7fb7993663152babc5dc6fe59f0d05370c6121c5559972f7e3', 'banner1');
INSERT INTO `banner` VALUES (2, '20200906/8ba8bb8baefba75032e61a56419c5105.png', 'https://gitee.com/owl_city/wetool_person/invite_link?invite=2b9137c59904bf09eead47070b4037a99bc4307d065eab7fb7993663152babc5dc6fe59f0d05370c6121c5559972f7e3', 'banner2');
INSERT INTO `banner` VALUES (3, '20200906/fa601d9e9795c0ef5a3ae94e82129ace.png', 'https://gitee.com/owl_city/wetool_person/invite_link?invite=2b9137c59904bf09eead47070b4037a99bc4307d065eab7fb7993663152babc5dc6fe59f0d05370c6121c5559972f7e3', '3');
COMMIT;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(200) NOT NULL,
  `cate_order` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, '新闻', 1, 0);
INSERT INTO `category` VALUES (2, '产品', 2, 0);
INSERT INTO `category` VALUES (3, '公司新闻', 1, 1);
INSERT INTO `category` VALUES (4, '行业新闻', 2, 1);
INSERT INTO `category` VALUES (5, '家用', 4, 5);
INSERT INTO `category` VALUES (6, '商用', 2, 2);
COMMIT;

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `is_close` tinyint(2) NOT NULL COMMENT '是否关闭1：关闭0开',
  `is_update` tinyint(2) NOT NULL COMMENT '更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system
-- ----------------------------
BEGIN;
INSERT INTO `system` VALUES (1, 'Tp5.1学习1111', 'Tp5.1学习关键字', 'Tp5.1学习描述', 1, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
