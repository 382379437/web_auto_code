SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `system_menu`;-- --
CREATE TABLE `system_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `node` varchar(200) NOT NULL DEFAULT '' COMMENT '节点代码',
  `icon` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单图标',
  `url` varchar(400) NOT NULL DEFAULT '' COMMENT '链接',
  `params` varchar(500) DEFAULT '' COMMENT '链接参数',
  `target` varchar(20) NOT NULL DEFAULT '_self' COMMENT '链接打开方式',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '菜单排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态(0:禁用,1:启用)',
  `create_by` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '创建人',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `index_system_menu_node` (`node`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='系统菜单表';-- --
            INSERT INTO `system_menu` VALUES(1,0,'系统设置','','','#','','_self',9000,1,10000,'2018-01-19 15:27:00');-- --
INSERT INTO `system_menu` VALUES(2,10,'后台菜单','','fa fa-leaf','admin/menu/index','','_self',10,1,10000,'2018-01-19 15:27:17');-- --
INSERT INTO `system_menu` VALUES(3,10,'系统参数','','fa fa-modx','admin/config/index','','_self',20,1,10000,'2018-01-19 15:27:57');-- --
INSERT INTO `system_menu` VALUES(4,11,'访问授权','','fa fa-group','admin/auth/index','','_self',20,1,10000,'2018-01-22 11:13:02');-- --
INSERT INTO `system_menu` VALUES(5,11,'用户管理','','fa fa-user','admin/user/index','','_self',10,1,0,'2018-01-23 12:15:12');-- --
INSERT INTO `system_menu` VALUES(6,11,'访问节点','','fa fa-fort-awesome','admin/node/index','','_self',30,1,0,'2018-01-23 12:36:54');-- --
INSERT INTO `system_menu` VALUES(7,0,'后台首页','','','admin/index/main','','_self',1000,1,0,'2018-01-23 13:42:30');-- --
INSERT INTO `system_menu` VALUES(8,16,'系统日志','','fa fa-code','admin/log/index','','_self',10,1,0,'2018-01-24 13:52:58');-- --
INSERT INTO `system_menu` VALUES(9,10,'文件存储','','fa fa-stop-circle','admin/config/file','','_self',30,1,0,'2018-01-25 10:54:28');-- --
INSERT INTO `system_menu` VALUES(10,1,'系统管理','','','#','','_self',200,1,0,'2018-01-25 18:14:28');-- --
INSERT INTO `system_menu` VALUES(11,1,'访问权限','','','#','','_self',300,1,0,'2018-01-25 18:15:08');-- --
INSERT INTO `system_menu` VALUES(16,1,'日志管理','','','#','','_self',400,1,0,'2018-02-10 16:31:15');-- --
INSERT INTO `system_menu` VALUES(43,0,'网站管理','','','#','','_self',0,1,0,'2018-05-09 15:59:34');-- --
INSERT INTO `system_menu` VALUES(44,43,'自动生成配置','','','#','','_self',0,1,0,'2018-05-09 15:59:52');-- --
INSERT INTO `system_menu` VALUES(45,44,'测试','','','admin/test/index','','_self',0,0,0,'2018-05-09 16:00:33');-- --
INSERT INTO `system_menu` VALUES(46,44,'AutocodeController','','','admin/Autocode/index','','_self',0,1,0,'2018-05-09 16:01:11');-- --
INSERT INTO `system_menu` VALUES(47,44,'AutocodeView','','','admin/Autocode/indexview','','_self',0,1,0,'2018-05-09 16:01:53');-- --
INSERT INTO `system_menu` VALUES(50,43,'会员管理','','','#','','_self',0,1,0,'2018-07-04 14:30:43');-- --
INSERT INTO `system_menu` VALUES(51,50,'会员列表','','','admin/member/index','','_self',0,1,0,'2018-07-04 14:31:07');-- --
