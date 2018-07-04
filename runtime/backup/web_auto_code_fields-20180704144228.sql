SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `web_auto_code_fields`;-- --
CREATE TABLE `web_auto_code_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbname` varchar(30) DEFAULT '' COMMENT '表名',
  `fields_name` varchar(255) DEFAULT '' COMMENT '字段名',
  `type` varchar(20) DEFAULT '' COMMENT '字段类型 int  varchar',
  `size` int(11) DEFAULT NULL COMMENT '字段长度',
  `decimals_size` int(11) DEFAULT '0' COMMENT '小数位数',
  `is_show` int(11) DEFAULT '0' COMMENT '是否出现在列表中 1 是 0否',
  `is_form` int(2) DEFAULT '1' COMMENT '是否出现在表单中 1 是 0 否',
  `title` varchar(255) DEFAULT '' COMMENT '字段备注（注释）',
  `default` varchar(255) DEFAULT '' COMMENT '默认值',
  `is_search` int(11) DEFAULT '0' COMMENT '是否设置为搜索项',
  `form_type` varchar(20) DEFAULT '' COMMENT '表单类型  input date select  radio  textarea  textarea_editer  img',
  `form_value` varchar(200) DEFAULT '' COMMENT '表单可选值 select和radio等 eg：1:男,2:女 ;用英文逗号隔开。',
  `res_fields_name` varchar(200) DEFAULT '' COMMENT '要取值的字段名',
  `is_deleted` int(11) DEFAULT '0',
  `is_into_engine` int(11) DEFAULT '0' COMMENT '是否加入搜索引擎(留以后扩展) 1是 0否',
  `is_many_img` varchar(10) DEFAULT '' COMMENT '是否多图上传 one 单图；mut 多图',
  `is_auto_tips` varchar(200) DEFAULT '0' COMMENT '是否自动提示: 0 或空 否，其它 是，且为数据访问url eg：/admin/label/getlabel-id,title',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='自动创建表字段';-- --
            INSERT INTO `web_auto_code_fields` VALUES(47,'member','name','varchar',50,0,1,1,'会员名称','',1,'input','','',0,0,'','');-- --
