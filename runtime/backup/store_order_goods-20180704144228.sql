SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_order_goods`;-- --
CREATE TABLE `store_order_goods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` bigint(20) unsigned DEFAULT '0' COMMENT '会员ID',
  `order_no` char(10) DEFAULT '' COMMENT '订单编号',
  `goods_id` bigint(20) DEFAULT '0' COMMENT '商品ID',
  `goods_title` varchar(255) DEFAULT '' COMMENT '商品标签',
  `goods_spec` varchar(255) DEFAULT '' COMMENT '商品规格',
  `goods_logo` varchar(255) DEFAULT '' COMMENT '商品LOGO',
  `goods_image` text COMMENT '商品图片地址',
  `market_price` decimal(20,2) unsigned DEFAULT '0.00' COMMENT '市场价格',
  `selling_price` decimal(20,2) unsigned DEFAULT '0.00' COMMENT '商品销售价格',
  `price_field` varchar(20) DEFAULT 'selling_price' COMMENT '计价字段',
  `number` bigint(20) unsigned DEFAULT '0' COMMENT '订单商品数量',
  `status` bigint(1) unsigned DEFAULT '1' COMMENT '商品状态(1有效,0无效)',
  `is_deleted` bigint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `index_store_order_list_order_no` (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城订单关联商品';-- --
            