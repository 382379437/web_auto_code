<?php /*a:2:{s:73:"E:\whua\projects\web_auto_code/application/admin/view\autocode\index.html";i:1523843377;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加一个控制器" class='layui-btn layui-btn-sm'>添加控制器</button>
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
            <input name="title" value="<?php echo htmlentities((app('request')->get('title') ?: '')); ?>" placeholder="请输入" class="layui-input">
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
            <th class='text-left nowrap'>控制器</th>
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
                <?php echo htmlentities($vo['title']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities($vo['controller']); ?>
            </td>

            <td class='text-left nowrap'>
                <?php if($vo['is_deleted'] == 0): ?><span class="color-red">使用中</span><?php elseif($vo['is_deleted'] == 1): ?><span class="color-green">已禁用</span><?php endif; ?>
            </td>
            <td class='text-right nowrap'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
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
</div>
</div>

<!-- 右则内容区域 结束 -->