SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_goods_spec`;-- --
CREATE TABLE `store_goods_spec` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mch_id` bigint(20) unsigned DEFAULT '0' COMMENT '商户ID',
  `spec_title` varchar(255) DEFAULT '' COMMENT '商品规格名称',
  `spec_param` varchar(255) DEFAULT '' COMMENT '商品规格参数',
  `spec_desc` varchar(255) DEFAULT '' COMMENT '商品规格描述',
  `sort` bigint(20) unsigned DEFAULT '0' COMMENT '商品规格排序',
  `status` bigint(1) unsigned DEFAULT '1' COMMENT '商品状态(1有效,0无效)',
  `is_deleted` bigint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `index_store_goods_spec_mch_id` (`mch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城商品规格';-- --
            