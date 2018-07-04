SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_goods_brand`;-- --
CREATE TABLE `store_goods_brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_logo` varchar(1024) DEFAULT '' COMMENT '品牌logo',
  `brand_cover` varchar(1024) DEFAULT '' COMMENT '品牌封面',
  `brand_title` varchar(255) DEFAULT '' COMMENT '商品品牌名称',
  `brand_desc` text COMMENT '商品品牌描述',
  `brand_detail` text COMMENT '品牌图文信息',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '商品分类排序',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '商品状态(1有效,0无效)',
  `is_deleted` tinyint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='产品品牌';-- --
            INSERT INTO `store_goods_brand` VALUES(1,'http://webautocode.com/static/upload/86d4ac4d269d11ef/1573dc776f23ec82.jpg','http://webautocode.com/static/upload/135672b1c4dbe849/046d893ca7ab8100.png','sss','sdf','&lt;p&gt;sdf&lt;/p&gt;',0,1,0,'2018-05-09 15:08:01');-- --
INSERT INTO `store_goods_brand` VALUES(2,'http://webautocode.com/static/upload/d975d3be0ca532c0/82ec4d83b824f9fe.png','http://webautocode.com/static/upload/cded2a6eaad1c51d/8db4097a4d4a5b42.png','sdf','sdf','&lt;p&gt;sdf&lt;/p&gt;',0,1,0,'2018-05-09 15:09:18');-- --
