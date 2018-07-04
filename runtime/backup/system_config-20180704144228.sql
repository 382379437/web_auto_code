SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `system_config`;-- --
CREATE TABLE `system_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '配置编码',
  `value` varchar(500) DEFAULT NULL COMMENT '配置值',
  PRIMARY KEY (`id`),
  KEY `index_system_config_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='系统参数配置';-- --
            INSERT INTO `system_config` VALUES(1,'app_name','web_auto_code');-- --
INSERT INTO `system_config` VALUES(2,'site_name','web_auto_code');-- --
INSERT INTO `system_config` VALUES(3,'app_version','1.2.2 dev');-- --
INSERT INTO `system_config` VALUES(4,'site_copy','&copy;版权所有 2014-2018 wanghua');-- --
INSERT INTO `system_config` VALUES(5,'browser_icon','http://localhost/ThinkAdmin/static/upload/f47b8fe06e38ae99/08e8398da45583b9.png');-- --
INSERT INTO `system_config` VALUES(6,'tongji_baidu_key','');-- --
INSERT INTO `system_config` VALUES(7,'miitbeian','备16005642号-2');-- --
INSERT INTO `system_config` VALUES(8,'storage_type','local');-- --
INSERT INTO `system_config` VALUES(9,'storage_local_exts','png,jpg,rar,doc,icon,mp4');-- --
INSERT INTO `system_config` VALUES(10,'storage_qiniu_bucket','');-- --
INSERT INTO `system_config` VALUES(11,'storage_qiniu_domain','');-- --
INSERT INTO `system_config` VALUES(12,'storage_qiniu_access_key','');-- --
INSERT INTO `system_config` VALUES(13,'storage_qiniu_secret_key','');-- --
INSERT INTO `system_config` VALUES(14,'storage_oss_bucket','cuci');-- --
INSERT INTO `system_config` VALUES(15,'storage_oss_endpoint','oss-cn-beijing.aliyuncs.com');-- --
INSERT INTO `system_config` VALUES(16,'storage_oss_domain','cuci.oss-cn-beijing.aliyuncs.com');-- --
INSERT INTO `system_config` VALUES(17,'storage_oss_keyid','用你自己的吧');-- --
INSERT INTO `system_config` VALUES(18,'storage_oss_secret','用你自己的吧');-- --
INSERT INTO `system_config` VALUES(34,'wechat_appid','wx60a43dd8161666d4');-- --
INSERT INTO `system_config` VALUES(35,'wechat_appkey','9890a0d7c91801a609d151099e95b61a');-- --
INSERT INTO `system_config` VALUES(36,'storage_oss_is_https','http');-- --
INSERT INTO `system_config` VALUES(37,'wechat_type','thr');-- --
INSERT INTO `system_config` VALUES(38,'wechat_token','test');-- --
INSERT INTO `system_config` VALUES(39,'wechat_appsecret','a041bec98ed015d52b99acea5c6a16ef');-- --
INSERT INTO `system_config` VALUES(40,'wechat_encodingaeskey','BJIUzE0gqlWy0GxfPp4J1oPTBmOrNDIGPNav1YFH5Z5');-- --
INSERT INTO `system_config` VALUES(41,'wechat_thr_appid','wx60a43dd8161666d4');-- --
INSERT INTO `system_config` VALUES(42,'wechat_thr_appkey','05db2aa335382c66ab56d69b1a9ad0ee');-- --
