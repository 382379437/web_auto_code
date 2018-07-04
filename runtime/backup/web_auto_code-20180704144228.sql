SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `web_auto_code`;-- --
CREATE TABLE `web_auto_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '备注',
  `controller` varchar(255) DEFAULT '' COMMENT '控制器',
  `dbname` varchar(255) DEFAULT '' COMMENT '表名',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='代码自动生成';-- --
            INSERT INTO `web_auto_code` VALUES(33,'会员管理','Member','member',0);-- --
