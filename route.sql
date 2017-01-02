/*
Navicat MySQL Data Transfer

Source Server         : mysql_data
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : route

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-01-02 22:12:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES ('20', '1 Charles St, Woolloomooloo NSW 2011, Australia', '-33.871841', '151.219254', 'stop');
INSERT INTO `lokasi` VALUES ('21', '138 Oxford St, Darlinghurst NSW 2010, Australia', '-33.880676', '151.217545', 'stop');
INSERT INTO `lokasi` VALUES ('22', '38 Nobbs St, Surry Hills NSW 2010, Australia', '-33.889229', '151.216843', 'stop');
INSERT INTO `lokasi` VALUES ('23', '49 Shepherd St, Chippendale NSW 2008, Australia', '-33.885807', '151.195908', 'stop');
INSERT INTO `lokasi` VALUES ('24', '156 Forbes St, Darlinghurst NSW 2010, Australia', '-33.879822', '151.217545', 'break');
INSERT INTO `lokasi` VALUES ('25', '2 S Dowling St, Moore Park NSW 2021, Australia', '-33.902622', '151.214783', 'break');
