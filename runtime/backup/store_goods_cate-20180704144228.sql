SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_goods_cate`;-- --
CREATE TABLE `store_goods_cate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned DEFAULT '0' COMMENT '上级分类编号',
  `brand_id` bigint(20) DEFAULT '0' COMMENT '品牌ID',
  `cate_title` varchar(255) DEFAULT '' COMMENT '商品分类名称',
  `cate_desc` text COMMENT '商品分类',
  `sort` bigint(20) unsigned DEFAULT '0' COMMENT '商品分类排序',
  `status` bigint(1) unsigned DEFAULT '1' COMMENT '商品状态(1有效,0无效)',
  `is_deleted` bigint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城商品分类';-- --
            