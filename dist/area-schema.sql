/*
Navicat MySQL Data Transfer

Source Server         : localhost_phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : gaode_area

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-14 11:11:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for area
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `ad_code` int(11) NOT NULL COMMENT '地区编号',
  `city_code` varchar(6) DEFAULT NULL COMMENT '城市编码（邮编）',
  `pinyin` varchar(50) DEFAULT NULL COMMENT '拼音',
  `level` smallint(6) NOT NULL COMMENT '层级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_ad_code_uindex` (`ad_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地区表';
