SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `web_member`;-- --
CREATE TABLE `web_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_deleted` int(2) DEFAULT '0',
  `name` varchar(50) DEFAULT '' COMMENT '会员名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;-- --
            INSERT INTO `web_member` VALUES(1,0,'张三');-- --
INSERT INTO `web_member` VALUES(2,0,'李四');-- --
