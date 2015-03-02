/*
Navicat MySQL Data Transfer

Source Server         : local_machine
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : m2m

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-02-27 10:50:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for keyappsensor
-- ----------------------------
DROP TABLE IF EXISTS `keyappsensor`;
CREATE TABLE `keyappsensor` (
  `identifier` int(255) NOT NULL AUTO_INCREMENT,
  `date_time` datetime DEFAULT NULL,
  `temperature` int(2) DEFAULT NULL,
  `battery` int(6) DEFAULT NULL,
  `device_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of keyappsensor
-- ----------------------------
INSERT INTO `keyappsensor` VALUES ('1', '2015-02-25 15:27:58', '22', '3120', '16941');
INSERT INTO `keyappsensor` VALUES ('2', '2015-02-25 15:28:40', '21', '3120', '16941');
INSERT INTO `keyappsensor` VALUES ('3', '2015-02-25 15:56:36', '20', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('4', '2015-02-25 15:57:03', '21', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('5', '2015-02-26 12:08:35', '21', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('6', '2015-02-26 12:09:54', '23', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('7', '2015-02-26 12:14:15', '21', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('8', '2015-02-26 12:15:06', '37', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('9', '2015-02-26 12:15:20', '18', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('10', '2015-02-26 12:22:18', '21', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('11', '2015-02-26 12:53:02', '25', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('12', '2015-02-26 12:54:02', '17', '3170', '16941');
INSERT INTO `keyappsensor` VALUES ('13', '2015-02-26 13:10:34', '24', '3173', '16941');
INSERT INTO `keyappsensor` VALUES ('14', '2015-02-26 13:17:09', '20', '3173', '16941');
INSERT INTO `keyappsensor` VALUES ('15', '2015-02-27 09:16:10', '24', '3170', '16941');
