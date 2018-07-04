<?php /*a:2:{s:81:"E:\whua\projects\web_auto_code/application/admin/view\autocode\templateindex.html";i:1525853520;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/add")): ?>-->
<?php $modal_type = 'data-modal';if(!(empty($infofields) || (($infofields instanceof \think\Collection || $infofields instanceof \think\Paginator ) && $infofields->isEmpty()))): if(is_array($infofields) || $infofields instanceof \think\Collection || $infofields instanceof \think\Paginator): $i = 0; $__LIST__ = $infofields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;if(getFormType($to['form_type']) == 'textarea_editer'): $modal_type = 'data-load';endif; endforeach; endif; else: echo "" ;endif; endif; ?>
<button <?php echo htmlentities($modal_type); ?>='<?php echo url("$classuri/add"); ?>' data-title="添加<?php echo isset($title)?$title:''; ?>" class='layui-btn layui-btn-sm'>添加<?php echo isset($title)?$title:''; ?></button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-danger'>一键删除</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<!-- 表单搜索 开始 -->
<?php if(!(empty($search_fields) || (($search_fields instanceof \think\Collection || $search_fields instanceof \think\Paginator ) && $search_fields->isEmpty()))): ?>
<form class=" layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">
    <?php if(is_array($search_fields) || $search_fields instanceof \think\Collection || $search_fields instanceof \think\Paginator): $i = 0; $__LIST__ = $search_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <div class="layui-form-item layui-inline">
        <?php if(getFormType($v['form_type']) == 'input'): ?>
        <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
        <div class="layui-input-inline">
            <input type="text" name="<?php echo htmlentities($v['fields_name']); ?>" value="<?php echo empty($input[$v['fields_name']])?'':$input[$v['fields_name']]; ?>" placeholder="请输入<?php echo htmlentities($v['title']); ?>" class="layui-input">
        </div>
        <?php elseif($v['form_type'] == 'date'): ?>
        <?php echo htmlentities($v['title']); ?>：<input type="date" name="<?php echo htmlentities($v['fields_name']); ?>_start" value="<?php echo isset($input[$v['fields_name'].'_start'])?$input[$v['fields_name'].'_start']:''; ?>" placeholder="请输入<?php echo htmlentities($v['title']); ?>" title="请输入<?php echo htmlentities($v['title']); ?>开始" class="layui-timeline">
        -<input type="date" name="<?php echo htmlentities($v['fields_name']); ?>_end" value="<?php echo isset($input[$v['fields_name'].'_end'])?$input[$v['fields_name'].'_end']:''; ?>" placeholder="请输入<?php echo htmlentities($v['title']); ?>" title="请输入<?php echo htmlentities($v['title']); ?>结束" class="layui-timeline">
        <?php elseif(in_array(getFormType($v['form_type']), ['select', 'radio'])): ?>
        <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
        <div class="layui-input-inline">
            <select name="<?php echo htmlentities($v['fields_name']); ?>" <?php $r_list = dealFormValueList($v['form_value'], $v['res_fields_name']); ?>>
            <option value="">请选择</option>
            <?php if(!(empty($r_list) || (($r_list instanceof \think\Collection || $r_list instanceof \think\Paginator ) && $r_list->isEmpty()))): if(is_array($r_list) || $r_list instanceof \think\Collection || $r_list instanceof \think\Paginator): $i = 0; $__LIST__ = $r_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($uo['id']); ?>" <?php echo isset($input[$v['fields_name']])&&$input[$v['fields_name']]==$uo['id']?'selected':''; ?>><?php echo htmlentities($uo['title']); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>
</form>
<?php endif; ?>
<script>
    window.laydate.render({range: true, elem: '#range-date'});
</script>
<!-- 表单搜索 结束 -->

<form onsubmit="return false;" data-auto="true" method="post">
    <!--<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>-->
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <!--<?php else: ?>-->
    <input type="hidden" value="resort" name="action">
    <table class="layui-table" lay-skin="line">
        <thead>
        <tr>
            <th class='list-table-check-td'>
                <input data-auto-none="" data-check-target='.list-check-box' type='checkbox'>
            </th>
            <?php if(!(empty($infofields) || (($infofields instanceof \think\Collection || $infofields instanceof \think\Paginator ) && $infofields->isEmpty()))): if(is_array($infofields) || $infofields instanceof \think\Collection || $infofields instanceof \think\Paginator): $i = 0; $__LIST__ = $infofields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;if(!empty($to['is_show'])): ?>
            <th class='text-left nowrap'><?php echo htmlentities($to['title']); ?></th>
            <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            <th class='text-left nowrap'></th>
        </tr>
        </thead>
        <tbody>
        <!-- 编辑页面打开方式，1 data-modal  2 data-load 3 data-open -->
        <span <?php $open_type = 'data-modal';?>></span>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <td class='list-table-check-td'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'>
            </td>
            <?php if(!(empty($infofields) || (($infofields instanceof \think\Collection || $infofields instanceof \think\Paginator ) && $infofields->isEmpty()))): if(is_array($infofields) || $infofields instanceof \think\Collection || $infofields instanceof \think\Paginator): $i = 0; $__LIST__ = $infofields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;if(!empty($to['is_show'])): if($to['fields_name'] == 'is_deleted'): ?>
                    <td class='text-left nowrap'>
                        <?php if($vo['is_deleted'] == 1): ?><span class="color-red">已禁用</span><?php else: ?><span class="color-green">使用中</span><?php endif; ?>
                    </td>
                <?php elseif($to['fields_name'] == 'sex'): ?>
                    <td class='text-left nowrap'><?php echo $vo[$to['fields_name']]==1 ? 'GG' : 'MM'; ?></td>
                <?php elseif(getFormType($to['form_type']) == 'img'): ?>
                    <td class='text-left nowrap'>
                        <?php if(!(empty($vo[$to['fields_name']]) || (($vo[$to['fields_name']] instanceof \think\Collection || $vo[$to['fields_name']] instanceof \think\Paginator ) && $vo[$to['fields_name']]->isEmpty()))): ?>
                        <img src="<?php echo htmlentities($vo[$to['fields_name']]); ?>" onclick="magnifyImg(this)">
                        <?php endif; ?>
                    </td>
                    <script>
                        //layer.open查看大图 待扩展
                        var magnifyImg = function (o) {
                            $('#hid_show_img_div').children('img').attr('src',$(o).attr('src')).show();
                        }
                    </script>
                <?php elseif(in_array(getFormType($to['form_type']), ['select', 'radio']) and false == empty($to['form_value'])): ?>
                    <span <?php $r_list = dealFormValueList($to['form_value'], $to['res_fields_name']);?>></span>
                    <!-- 如果 fields_name 与 id 不相等则需要留一个单元格 td-->
                    <span <?php $is_eq = false;?>></span>
                    <?php if(!(empty($r_list) || (($r_list instanceof \think\Collection || $r_list instanceof \think\Paginator ) && $r_list->isEmpty()))): if(is_array($r_list) || $r_list instanceof \think\Collection || $r_list instanceof \think\Paginator): $i = 0; $__LIST__ = $r_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($i % 2 );++$i;if($vo[$to['fields_name']] == $fo['id']): $is_eq=true;?>
                        <td class='text-left nowrap' ><?php echo htmlentities($fo['title']); ?></td>
                        <?php endif; endforeach; endif; else: echo "" ;endif; endif; if($is_eq == false): ?>
                        <td class='text-left nowrap' ></td>
                    <?php endif; else: ?>
                    <td class='text-left nowrap'><?php echo htmlspecialchars_decode($vo[$to['fields_name']]); ?></td>
                <?php endif; elseif(getFormType($to['form_type']) == 'textarea_editer'): $open_type = 'data-load';endif; endforeach; endif; else: echo "" ;endif; endif; ?>

            <td class='text-right nowrap'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a <?php echo htmlentities($open_type); ?>='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'>删除</a>
                <?php endif; ?>

            </td>
        </tr>
        <!--<?php endforeach; ?>-->
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
    <!--<?php endif; ?>-->
</form>
<div class="hid_show_img_div" style="display: none;text-align: center;
    /*background-color: #fff;*/
    border-radius: 20px;
    /*width: 300px;*/
    /*height: 350px;*/
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;">
    <img>
</div>
</div>
</div>

<!-- 右则内容区域 结束 -->