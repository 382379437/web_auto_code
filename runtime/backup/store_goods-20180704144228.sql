SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_goods`;-- --
CREATE TABLE `store_goods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` bigint(20) unsigned DEFAULT '0' COMMENT '品牌ID',
  `cate_id` bigint(20) unsigned DEFAULT '0' COMMENT '商品分类id',
  `unit_id` bigint(20) DEFAULT NULL COMMENT '商品单位ID',
  `spec_id` bigint(20) unsigned DEFAULT '0' COMMENT '规格ID',
  `tags_id` varchar(255) DEFAULT '' COMMENT '商品标签ID',
  `is_code` bigint(1) DEFAULT '1' COMMENT '是否有码商品',
  `goods_title` varchar(255) DEFAULT '' COMMENT '商品标签',
  `goods_content` text COMMENT '商品内容',
  `goods_logo` varchar(255) DEFAULT '' COMMENT '商品LOGO',
  `goods_image` text COMMENT '商品图片地址',
  `goods_video` varchar(500) DEFAULT '' COMMENT '商品视频URL',
  `goods_desc` varchar(500) DEFAULT '' COMMENT '商品描述',
  `package_stock` bigint(20) unsigned DEFAULT '0' COMMENT '总库存数量',
  `package_sale` bigint(20) unsigned DEFAULT '0' COMMENT '已销售数量',
  `favorite_num` bigint(20) unsigned DEFAULT '0' COMMENT '收藏次数',
  `sort` bigint(20) unsigned DEFAULT '0' COMMENT '数据排序',
  `status` bigint(1) unsigned DEFAULT '1' COMMENT '商品状态(1有效,0无效)',
  `is_deleted` bigint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商城商品主表';-- --
            INSERT INTO `store_goods` VALUES(1,0,0,0,0,',,',1,'asas','&lt;p&gt;as&lt;/p&gt;','http://webautocode.com/static/upload/d975d3be0ca532c0/82ec4d83b824f9fe.png','','as','as',0,0,0,0,1,0,'2018-05-09 15:05:48');-- --
