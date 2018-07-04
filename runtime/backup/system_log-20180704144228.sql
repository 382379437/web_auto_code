SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `system_log`;-- --
CREATE TABLE `system_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '操作者IP地址',
  `node` char(200) NOT NULL DEFAULT '' COMMENT '当前操作节点',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人用户名',
  `action` varchar(200) NOT NULL DEFAULT '' COMMENT '操作行为',
  `content` text NOT NULL COMMENT '操作内容描述',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='系统操作日志表';-- --
            INSERT INTO `system_log` VALUES(1,'127.0.0.1','admin/login/index','admin','系统管理','用户登录系统成功','2018-05-10 09:36:42');-- --
INSERT INTO `system_log` VALUES(2,'127.0.0.1','admin/config/index','admin','系统管理','系统参数配置成功','2018-05-10 17:19:24');-- --
INSERT INTO `system_log` VALUES(3,'127.0.0.1','admin/login/index','admin','系统管理','用户登录系统成功','2018-07-03 16:32:52');-- --
INSERT INTO `system_log` VALUES(4,'127.0.0.1','admin/login/index','admin','系统管理','用户登录系统成功','2018-07-04 09:28:28');-- --
INSERT INTO `system_log` VALUES(5,'127.0.0.1','admin/config/index','admin','系统管理','系统参数配置成功','2018-07-04 09:29:38');-- --
