<?php /*a:2:{s:77:"E:\whua\projects\web_auto_code/application/admin/view\autocode\indexview.html";i:1525682202;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/addview"); ?>' data-title="添加字段" class='layui-btn layui-btn-sm'>添加字段</button>
<!--<?php endif; ?>-->

<!--<?php if(auth("$classuri/createview")): ?>-->
<button data-modal='<?php echo url("$classuri/createview"); ?>' data-title="创建视图" class='layui-btn layui-btn-sm'>去创建视图</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<!-- 表单搜索 开始 -->
<form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">搜索标题</label>
        <div class="layui-input-inline">
            <input name="title" value="<?php echo htmlentities((app('request')->get('title') ?: '')); ?>" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">表名</label>
        <div class="layui-input-inline">
            <input name="dbname" value="<?php echo htmlentities((app('request')->get('dbname') ?: '')); ?>" placeholder="请输入表名" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>

</form>
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
            <th class='text-left nowrap'>标题</th>
            <th class='text-left nowrap'>所属表</th>
            <th class='text-left nowrap'>字段名</th>
            <th class='text-left nowrap'>类型</th>
            <th class='text-left nowrap'>长度</th>
            <th class='text-left nowrap'>默认值</th>
            <th class='text-left nowrap'>是否在列表显示</th>
            <th class='text-left nowrap'>是否在表单显示</th>
            <th class='text-left nowrap'>表单类型</th>
            <th class='text-left nowrap'>是否搜索</th>
            <th class='text-left nowrap'>字段是否存在</th>
            <th class='text-left nowrap'>状态</th>
            <th class='text-left nowrap'></th>
        </tr>
        </thead>
        <tbody>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <td class='list-table-check-td'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlspecialchars_decode($vo['title']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['dbname']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['fields_name']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['type']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['size']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['default']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo !empty($vo['is_show']) ? '显示' : '不显示'; ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo !empty($vo['is_form']) ? '显示' : '不显示'; ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo getFormType($vo['form_type']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo !empty($vo['is_search']) ? '是' : '否'; ?>
            </td>
            <td class='text-left nowrap'>
                <?php 
                $dbn = 'Web'.ucfirst($vo['dbname']);
                $dbn_tabl = 'web_'.$vo['dbname'];
                $sql = "show tables like '".$dbn_tabl."';";
                $arrinfo = [];
                if(\Db::query($sql)){
                    $arrinfo = \Db::name($dbn)->getTableFields();
                }
                 if(empty($arrinfo)): ?>
                <span style="color: orange;">该表不存在</span>
                <?php else: ?>
                <?php echo in_array($vo['fields_name'], $arrinfo)?'<span style="color: green">字段已创建</span>':'<span style="color: red;">字段可创建</span>'; endif; ?>
            </td>
            <td class='text-left nowrap'>
                <?php if($vo['is_deleted'] == 0): ?><span class="color-red">使用中</span><?php elseif($vo['is_deleted'] == 1): ?><span class="color-green">已禁用</span><?php endif; ?>
            </td>
            <td class='text-right nowrap'>

                <?php if(auth("$classuri/editview")): ?>
                <span class="text-explode">|</span>
                <a data-modal='<?php echo url("$classuri/editview"); ?>?id=<?php echo htmlentities($vo['id']); ?>' data-title="编辑字段">编辑</a>
                <?php endif; if(auth("$classuri/createtable")): ?>
                <span class="text-explode">|</span>
                <a href="JavaScript:;" onclick="toCreateTable(<?php echo htmlentities($vo['id']); ?>);" title="表存在则创建字段">创建表或字段</a>
                <?php endif; if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='delete' data-action='<?php echo url("$classuri/delview"); ?>'>删除</a>
                <?php endif; ?>

            </td>
        </tr>
        <!--<?php endforeach; ?>-->
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
    <!--<?php endif; ?>-->
</form>
<script>
    var toCreateTable = function (id) {
        if(!id)return;
        var t = confirm('创建表：该操作为严肃操作，是否继续？');
        if(t){
            $.post('<?php echo url("createtable"); ?>',{id:id}, function (res) {
                layer.msg(res.msg);
                if(res.code){
                    location.reload();
                }
            },'json');
        }

    }



</script>
</div>
</div>

<!-- 右则内容区域 结束 -->