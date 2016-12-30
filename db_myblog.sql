/*
Navicat MySQL Data Transfer

Source Server         : DL
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : db_myblog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-12-30 17:12:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rain_admin
-- ----------------------------
DROP TABLE IF EXISTS `rain_admin`;
CREATE TABLE `rain_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '登录用户ID',
  `aname` varchar(50) DEFAULT NULL COMMENT '后台用户',
  `password` varchar(32) DEFAULT NULL COMMENT '后台登录密码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:禁用 1:启用 ',
  `ip` varchar(20) DEFAULT NULL COMMENT '登录IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_admin
-- ----------------------------

-- ----------------------------
-- Table structure for rain_article
-- ----------------------------
DROP TABLE IF EXISTS `rain_article`;
CREATE TABLE `rain_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章标识',
  `title` varchar(50) DEFAULT NULL COMMENT '文章标题',
  `author` varchar(20) DEFAULT NULL COMMENT '文章作者',
  `cate_id` int(10) DEFAULT NULL COMMENT '文章类别id',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '1:启用；0：禁用',
  `hit` int(10) DEFAULT NULL COMMENT '点击数',
  `content` text COMMENT '文章内容',
  `add_time` int(11) DEFAULT NULL COMMENT '文章添加时间',
  `is_top` tinyint(1) DEFAULT '0' COMMENT '1:置顶 0：正常',
  `pic` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `is_delete` tinyint(1) DEFAULT '1' COMMENT '1:未删除 0：删除',
  `keyword` varchar(50) DEFAULT NULL COMMENT '文章关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_article
-- ----------------------------

-- ----------------------------
-- Table structure for rain_author
-- ----------------------------
DROP TABLE IF EXISTS `rain_author`;
CREATE TABLE `rain_author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_author
-- ----------------------------

-- ----------------------------
-- Table structure for rain_category
-- ----------------------------
DROP TABLE IF EXISTS `rain_category`;
CREATE TABLE `rain_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_category
-- ----------------------------
