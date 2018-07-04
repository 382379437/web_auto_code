SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `system_node`;-- --
CREATE TABLE `system_node` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node` varchar(100) DEFAULT NULL COMMENT '节点代码',
  `title` varchar(500) DEFAULT NULL COMMENT '节点标题',
  `is_menu` tinyint(1) unsigned DEFAULT '0' COMMENT '是否可设置为菜单',
  `is_auth` tinyint(1) unsigned DEFAULT '1' COMMENT '是否启动RBAC权限控制',
  `is_login` tinyint(1) unsigned DEFAULT '1' COMMENT '是否启动登录控制',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `index_system_node_node` (`node`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COMMENT='系统节点表';-- --
            INSERT INTO `system_node` VALUES(13,'admin','系统设置',0,1,1,'2018-05-04 11:02:34');-- --
INSERT INTO `system_node` VALUES(14,'admin/auth','权限管理',0,1,1,'2018-05-04 11:06:55');-- --
INSERT INTO `system_node` VALUES(15,'admin/auth/index','权限列表',1,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(16,'admin/auth/apply','权限配置',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(17,'admin/auth/add','添加权限',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(18,'admin/auth/edit','编辑权限',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(19,'admin/auth/forbid','禁用权限',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(20,'admin/auth/resume','启用权限',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(21,'admin/auth/del','删除权限',0,1,1,'2018-05-04 11:06:56');-- --
INSERT INTO `system_node` VALUES(22,'admin/config','系统配置',0,1,1,'2018-05-04 11:08:18');-- --
INSERT INTO `system_node` VALUES(23,'admin/config/index','系统参数',1,1,1,'2018-05-04 11:08:25');-- --
INSERT INTO `system_node` VALUES(24,'admin/config/file','文件存储',1,1,1,'2018-05-04 11:08:27');-- --
INSERT INTO `system_node` VALUES(25,'admin/log','日志管理',0,1,1,'2018-05-04 11:08:43');-- --
INSERT INTO `system_node` VALUES(26,'admin/log/index','日志管理',1,1,1,'2018-05-04 11:08:43');-- --
INSERT INTO `system_node` VALUES(28,'admin/log/del','日志删除',0,1,1,'2018-05-04 11:08:43');-- --
INSERT INTO `system_node` VALUES(29,'admin/menu','系统菜单',0,1,1,'2018-05-04 11:09:54');-- --
INSERT INTO `system_node` VALUES(30,'admin/menu/index','菜单列表',1,1,1,'2018-05-04 11:09:54');-- --
INSERT INTO `system_node` VALUES(31,'admin/menu/add','添加菜单',0,1,1,'2018-05-04 11:09:55');-- --
INSERT INTO `system_node` VALUES(32,'admin/menu/edit','编辑菜单',0,1,1,'2018-05-04 11:09:55');-- --
INSERT INTO `system_node` VALUES(33,'admin/menu/del','删除菜单',0,1,1,'2018-05-04 11:09:55');-- --
INSERT INTO `system_node` VALUES(34,'admin/menu/forbid','禁用菜单',0,1,1,'2018-05-04 11:09:55');-- --
INSERT INTO `system_node` VALUES(35,'admin/menu/resume','启用菜单',0,1,1,'2018-05-04 11:09:55');-- --
INSERT INTO `system_node` VALUES(36,'admin/node','节点管理',0,1,1,'2018-05-04 11:10:20');-- --
INSERT INTO `system_node` VALUES(37,'admin/node/index','节点列表',1,1,1,'2018-05-04 11:10:20');-- --
INSERT INTO `system_node` VALUES(38,'admin/node/clear','清理节点',0,1,1,'2018-05-04 11:10:21');-- --
INSERT INTO `system_node` VALUES(39,'admin/node/save','更新节点',0,1,1,'2018-05-04 11:10:21');-- --
INSERT INTO `system_node` VALUES(40,'admin/user','系统用户',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(41,'admin/user/index','用户列表',1,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(42,'admin/user/auth','用户授权',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(43,'admin/user/add','添加用户',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(44,'admin/user/edit','编辑用户',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(45,'admin/user/pass','修改密码',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(46,'admin/user/del','删除用户',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(47,'admin/user/forbid','禁用启用',0,1,1,'2018-05-04 11:10:43');-- --
INSERT INTO `system_node` VALUES(48,'admin/user/resume','启用用户',0,1,1,'2018-05-04 11:10:44');-- --
INSERT INTO `system_node` VALUES(145,'admin/dbmanage/backup','',0,1,1,'2018-07-04 09:56:26');-- --
INSERT INTO `system_node` VALUES(146,'admin/dbmanage/deletefile','',0,1,1,'2018-07-04 09:56:27');-- --
INSERT INTO `system_node` VALUES(147,'admin/dbmanage/reback','',0,1,1,'2018-07-04 09:56:27');-- --
INSERT INTO `system_node` VALUES(148,'admin/dbmanage/index','',1,1,1,'2018-07-04 09:56:27');-- --
INSERT INTO `system_node` VALUES(149,'admin/autocode/edit','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(150,'admin/autocode/add','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(151,'admin/autocode/index','',1,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(152,'admin/autocode/addview','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(153,'admin/autocode/editview','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(154,'admin/autocode/delview','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(155,'admin/autocode/createtable','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(156,'admin/autocode/createview','',0,1,1,'2018-07-04 09:56:48');-- --
INSERT INTO `system_node` VALUES(157,'admin/autocode/getfields','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(158,'admin/autocode/nowtogocreate','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(159,'admin/autocode/toviewfiletemp','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(160,'admin/autocode/del','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(161,'admin/autocode/createcontrollercode','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(162,'admin/autocode/indexview','',0,1,1,'2018-07-04 09:56:49');-- --
INSERT INTO `system_node` VALUES(163,'admin/member/index','',1,1,1,'2018-07-04 14:31:40');-- --
INSERT INTO `system_node` VALUES(164,'admin/member/add','',0,1,1,'2018-07-04 14:31:43');-- --
INSERT INTO `system_node` VALUES(165,'admin/member/edit','',0,1,1,'2018-07-04 14:31:43');-- --
INSERT INTO `system_node` VALUES(166,'admin/member/del','',0,1,1,'2018-07-04 14:31:43');-- --
