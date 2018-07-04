<?php /*a:2:{s:68:"E:\whua\projects\web_auto_code/application/admin/view\log\index.html";i:1521427517;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-danger'>删除日志</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<!-- 表单搜索 开始 -->
<form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">操作账号</label>
        <div class="layui-input-inline">
            <input name="username" value="<?php echo htmlentities((app('request')->get('username') ?: '')); ?>" placeholder="请输入操作者" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">操作行为</label>
        <div class="layui-input-inline">
            <select name='action' class='layui-select' lay-search="">
                <option value=''> - 所有记录 -</option>
                <!--<?php foreach($actions as $action): ?>-->
                <!--<?php if($action===app('request')->get('action')): ?>-->
                <option selected="selected" value='<?php echo htmlentities($action); ?>'><?php echo htmlentities($action); ?></option>
                <!--<?php else: ?>-->
                <option value='<?php echo htmlentities($action); ?>'><?php echo htmlentities($action); ?></option>
                <!--<?php endif; ?>-->
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">操作内容</label>
        <div class="layui-input-inline">
            <input name="content" value="<?php echo htmlentities((app('request')->get('content') ?: '')); ?>" placeholder="请输入操作内容" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">操作时间</label>
        <div class="layui-input-inline">
            <input name="create_at" id='create_at' value="<?php echo htmlentities((app('request')->get('create_at') ?: '')); ?>" placeholder="请选择操作时间" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>

</form>
<script>
    window.form.render();
    window.laydate.render({range: true, elem: '#create_at'});
</script>
<!-- 表单搜索 结束 -->

<form onsubmit="return false;" data-auto="true" method="post">
    <input type="hidden" value="resort" name="action">
    <table class="layui-table" lay-skin="line">
        <thead>
        <tr>
            <th class='list-table-check-td'>
                <input data-auto-none="" data-check-target='.list-check-box' type='checkbox'>
            </th>
            <th class='text-left nowrap'>操作账号</th>
            <th class='text-left nowrap'>权限节点</th>
            <th class='text-left nowrap'>操作行为</th>
            <th class='text-left nowrap'>操作内容</th>
            <th class='text-left nowrap'>操作位置</th>
            <th class='text-left nowrap'>操作时间</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <td class='list-table-check-td'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'>
            </td>
            <td class='text-left nowrap'><?php echo htmlentities($vo['username']); ?></td>
            <td class='text-left nowrap'><?php echo htmlentities($vo['node']); ?></td>
            <td class='text-left nowrap'><?php echo htmlentities($vo['action']); ?></td>
            <td class='text-left nowrap'><?php echo htmlentities($vo['content']); ?></td>
            <td class='text-left nowrap'><?php echo htmlentities((isset($vo['isp']) && ($vo['isp'] !== '')?$vo['isp']:$vo['ip'])); ?></td>
            <td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td>
        </tr>
        <!--<?php endforeach; ?>-->
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
</form>
</div>
</div>

<!-- 右则内容区域 结束 -->