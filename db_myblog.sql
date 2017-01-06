/*
Navicat MySQL Data Transfer

Source Server         : DL
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : db_myblog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-06 14:17:10
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
  `author_id` int(10) DEFAULT NULL COMMENT '文章作者id',
  `cate_id` int(10) DEFAULT NULL COMMENT '文章类别id',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '1:启用；0：禁用',
  `hit` int(10) DEFAULT '0' COMMENT '点击数',
  `content` text COMMENT '文章内容',
  `add_time` int(11) DEFAULT NULL COMMENT '文章添加时间',
  `is_top` tinyint(1) DEFAULT '0' COMMENT '1:置顶 0：正常',
  `pic` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `is_delete` tinyint(1) DEFAULT '1' COMMENT '1:未删除 0：删除',
  `keyword` varchar(50) DEFAULT NULL COMMENT '文章关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_article
-- ----------------------------
INSERT INTO `rain_article` VALUES ('42', '1111111111', '1', '1', '1', '2', '1111111111111', '1483604471', '0', 'upload/1.jpg', '1', null);
INSERT INTO `rain_article` VALUES ('43', '第二篇文章', '2', '2', '1', '4', '<p><span>1月6日至8日，十八届中央纪委七次全会将召开。1月4日，中国社科院第六部《反腐倡廉蓝皮书》在京发布，聚焦党风廉政建设新成效。中共十八大以来，以习近平同志为核心的党中央作出全面从严治党的战略抉择。这其中，反腐败是全面从严治党的重要内容。党中央坚持铁腕反腐，“打虎拍蝇”，坚决遏制腐败现象蔓延势头，着力构建不敢腐、不能腐、不想腐的体制机制。经过4年的努力，全面从严治党取得重要阶段性成果。</span><span>1月6日至8日，十八届中央纪委七次全会将召开。1月4日，中国社科院第六部《反腐倡廉蓝皮书》在京发布，聚焦党风廉政建设新成效。中共十八大以来，以习近平同志为核心的党中央作出全面从严治党的战略抉择。这其中，反腐败是全面从严治党的重要内容。党中央坚持铁腕反腐，“打虎拍蝇”，坚决遏制腐败现象蔓延势头，着力构建不敢腐、不能腐、不想腐的体制机制。经过4年的努力，全面从严治党取得重要阶段性成果。</span><span>1月6日至8日，十八届中央纪委七次全会将召开。1月4日，中国社科院第六部《反腐倡廉蓝皮书》在京发布，聚焦党风廉政建设新成效。中共十八大以来，以习近平同志为核心的党中央作出全面从严治党的战略抉择。这其中，反腐败是全面从严治党的重要内容。党中央坚持铁腕反腐，“打虎拍蝇”，坚决遏制腐败现象蔓延势头，着力构建不敢腐、不能腐、不想腐的体制机制。经过4年的努力，全面从严治党取得重要阶段性成果。</span><span>1月6日至8日，十八届中央纪委七次全会将召开。1月4日，中国社科院第六部《反腐倡廉蓝皮书》在京发布，聚焦党风廉政建设新成效。中共十八大以来，以习近平同志为核心的党中央作出全面从严治党的战略抉择。这其中，反腐败是全面从严治党的重要内容。党中央坚持铁腕反腐，“打虎拍蝇”，坚决遏制腐败现象蔓延势头，着力构建不敢腐、不能腐、不想腐的体制机制。经过4年的努力，全面从严治党取得重要阶段性成果。</span></p>', '1483672057', '0', 'upload/43.jpg', '1', null);
INSERT INTO `rain_article` VALUES ('44', '第三篇文章', '2', '4', '1', '0', '<p>一定要下决心清理不规范的中介服务，特别要坚决整治‘红顶中介’！”李克强总理在1月4日的常务会议上强调。</p><p>　　此前的国务院常务会议上，在部署消除行政审批“灰色地带”时，李克强曾形象指出，要警惕一些审批事项换个“马甲”，由政府职能转到与政府关联的“红顶中介”，要彻查“红顶中介”代替行政收费等现象。1月4日的常务会议上，总理重申道，本届中央政府成立以来，已经取消了许多行政审批和行政许可，但仍然存在许多不规范的中介服务事项，必须进一步加大清理力度。</p><p>　　“许多收费的中介服务是和行政机关暗中连在一起的。企业不经过这些中介服务，就别想拿到必要的行政审批和行政许可。这就给企业造成了直接的负担。”总理严厉说道。</p><p>　　当天会议决定，再取消与法律职业资格认定、铁路运输基础设备生产企业审批等有关的20项中介服务事项。积极探索将与行政审批相关的中介服务逐步改为政府购买。切实降低企业制度性交易成本。</p>', '1483673401', '0', 'upload/44.jpg', '1', null);
INSERT INTO `rain_article` VALUES ('45', '第四篇文章', '2', '1', '1', '0', '<p><span>近几天，三起和枪有关的事件，也赚足了中国小伙伴的眼球：第一件，某51岁女子在天津街头摆射击摊，因6支所用的枪达到了公安部门认定“枪支”的直接标准，而被法院以非法持有枪支罪判处有期徒刑3年半；第二件，河南新县人民法院，通过淘宝网在司法拍卖15支塑料玩具枪，遭到舆论质疑；第三件，则是一起血案：四川省攀枝花市国土资源局局长陈忠恕，持枪冲进一个会场，向市委书记、市长连开数枪，然后自杀身亡。经抢救，书记、市长“没有生命危险”。</span><span>近几天，三起和枪有关的事件，也赚足了中国小伙伴的眼球：第一件，某51岁女子在天津街头摆射击摊，因6支所用的枪达到了公安部门认定“枪支”的直接标准，而被法院以非法持有枪支罪判处有期徒刑3年半；第二件，河南新县人民法院，通过淘宝网在司法拍卖15支塑料玩具枪，遭到舆论质疑；第三件，则是一起血案：四川省攀枝花市国土资源局局长陈忠恕，持枪冲进一个会场，向市委书记、市长连开数枪，然后自杀身亡。经抢救，书记、市长“没有生命危险”。</span></p>', '1483682390', '0', 'upload/45.jpg', '1', null);

-- ----------------------------
-- Table structure for rain_author
-- ----------------------------
DROP TABLE IF EXISTS `rain_author`;
CREATE TABLE `rain_author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态（1：启用；0：禁用）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_author
-- ----------------------------
INSERT INTO `rain_author` VALUES ('1', '一号作家', '1');
INSERT INTO `rain_author` VALUES ('2', '二号作家', '1');

-- ----------------------------
-- Table structure for rain_category
-- ----------------------------
DROP TABLE IF EXISTS `rain_category`;
CREATE TABLE `rain_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_category
-- ----------------------------
INSERT INTO `rain_category` VALUES ('1', 'PHP');
INSERT INTO `rain_category` VALUES ('2', 'Jacascript');
INSERT INTO `rain_category` VALUES ('3', 'Git');
INSERT INTO `rain_category` VALUES ('4', 'Laravel');

-- ----------------------------
-- Table structure for rain_tag
-- ----------------------------
DROP TABLE IF EXISTS `rain_tag`;
CREATE TABLE `rain_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL COMMENT '标签',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态（1：启用；0：禁用）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rain_tag
-- ----------------------------
INSERT INTO `rain_tag` VALUES ('2', 'jquery', '1');
INSERT INTO `rain_tag` VALUES ('3', 'thinkphp', '1');
