SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_member`;-- --
CREATE TABLE `store_member` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) DEFAULT '' COMMENT '会员微信OPENID',
  `phone` varchar(16) DEFAULT '' COMMENT '会员手机号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码',
  `nickname` varchar(20) DEFAULT '' COMMENT '会员昵称',
  `headimg` varchar(500) DEFAULT '' COMMENT '会员头像',
  `sex` char(2) DEFAULT '' COMMENT '性别',
  `level` tinyint(2) unsigned DEFAULT '1' COMMENT '会员级别',
  `remark` varchar(500) DEFAULT '' COMMENT '会员个性签名',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '会员状态(1有效,0无效)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_store_member_openid` (`openid`) USING BTREE,
  KEY `index_store_member_phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城会员信息';-- --
            