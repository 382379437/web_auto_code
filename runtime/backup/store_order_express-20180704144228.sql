SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `store_order_express`;-- --
CREATE TABLE `store_order_express` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` bigint(20) unsigned DEFAULT '0' COMMENT '会员ID',
  `type` tinyint(1) unsigned DEFAULT '0' COMMENT '快递类型(0.订单快递,1.退货快递)',
  `order_no` char(10) DEFAULT '' COMMENT '订单编号',
  `company_title` varchar(50) DEFAULT '' COMMENT '物流公司名称',
  `company_code` varchar(50) DEFAULT '' COMMENT '物流公司编码',
  `username` varchar(20) DEFAULT '' COMMENT '收货人姓名',
  `phone` varchar(16) DEFAULT '' COMMENT '收货手机号',
  `province` varchar(50) DEFAULT NULL COMMENT '收货地址省份',
  `city` varchar(50) DEFAULT '' COMMENT '收货地址城市',
  `area` varchar(255) DEFAULT '' COMMENT '收货地址区域',
  `address` varchar(255) DEFAULT '' COMMENT '收货详细地址',
  `send_no` varchar(50) DEFAULT '' COMMENT '实际物流公司单号',
  `send_company_title` varchar(50) DEFAULT '' COMMENT '实际发货快递公司',
  `send_company_code` varchar(50) DEFAULT '' COMMENT '实际发货快递代码',
  `send_username` varchar(255) DEFAULT '' COMMENT '寄件人名称',
  `send_phone` varchar(16) DEFAULT '' COMMENT '寄件人手机号',
  `send_province` varchar(50) DEFAULT '' COMMENT '寄件人地址省份',
  `send_city` varchar(50) DEFAULT '' COMMENT '寄件人地址城市',
  `send_area` varchar(255) DEFAULT '' COMMENT '寄件人地址区域',
  `send_address` varchar(255) DEFAULT '' COMMENT '寄件人详细地址',
  `send_at` datetime DEFAULT NULL COMMENT '快递发货时间',
  `desc` text COMMENT '发货描述',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态(0.无效,1.新快递,2.已签收,3.签收失败)',
  `is_deleted` bigint(1) unsigned DEFAULT '0' COMMENT '删除状态(1删除,0未删除)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城订单快递';-- --
            