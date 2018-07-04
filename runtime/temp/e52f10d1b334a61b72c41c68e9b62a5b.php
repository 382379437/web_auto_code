<?php /*a:2:{s:69:"E:\whua\projects\web_auto_code/application/admin/view\user\index.html";i:1521427517;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加用户" class='layui-btn layui-btn-sm'>添加用户</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-danger'>删除用户</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<!-- 表单搜索 开始 -->
<form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户账号</label>
        <div class="layui-input-inline">
            <input name="username" value="<?php echo htmlentities((app('request')->get('username') ?: '')); ?>" placeholder="请输入用户名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">联系手机</label>
        <div class="layui-input-inline">
            <input name="phone" value="<?php echo htmlentities((app('request')->get('phone') ?: '')); ?>" placeholder="请输入联系手机" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">电子邮箱</label>
        <div class="layui-input-inline">
            <input name="mail" value="<?php echo htmlentities((app('request')->get('mail') ?: '')); ?>" placeholder="请输入电子邮箱" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">登录时间</label>
        <div class="layui-input-inline">
            <input name="date" id='range-date' value="<?php echo htmlentities((app('request')->get('date') ?: '')); ?>" placeholder="请选择登录时间" class="layui-input">
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
            <th class='text-left nowrap'>用户名</th>
            <th class='text-left nowrap'>手机号</th>
            <th class='text-left nowrap'>电子邮箱</th>
            <th class='text-left nowrap'>登录次数</th>
            <th class='text-left nowrap'>最后登录</th>
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
                <?php echo htmlentities($vo['username']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo (isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"<span class='color-desc'>还没有设置手机号</span>"); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo (isset($vo['mail']) && ($vo['mail'] !== '')?$vo['mail']:"<span class='color-desc'>还没有设置邮箱</span>"); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo (isset($vo['login_num']) && ($vo['login_num'] !== '')?$vo['login_num']:"<span class='color-desc'>从未登录</span>"); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo (format_datetime($vo['login_at']) ?: "<span class='color-desc'>从未登录</span>"); ?>
            </td>
            <td class='text-left nowrap'>
                <?php if($vo['status'] == 0): ?><span class="color-red">已禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">使用中</span><?php endif; ?>
            </td>
            <td class='text-left nowrap'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if(auth("$classuri/auth")): ?>
                <span class="text-explode">|</span>
                <a data-modal='<?php echo url("$classuri/auth"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>授权</a>
                <?php endif; if(auth("$classuri/pass")): ?>
                <span class="text-explode">|</span>
                <a data-modal='<?php echo url("$classuri/pass"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>密码</a>
                <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'>禁用</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>启用</a>
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