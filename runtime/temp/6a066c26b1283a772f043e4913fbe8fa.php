<?php /*a:2:{s:75:"E:\whua\projects\web_auto_code/application/store/view\goods_cate\index.html";i:1525429418;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("@$classuri/add"); ?>' data-title="添加分类" class='layui-btn layui-btn-sm layui-btn-primary'>添加分类</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update="" data-field='delete' data-action='<?php echo url("@$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>删除分类</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form onsubmit="return false;" data-auto="true" method="post">
    <!--<?php if(empty($list)): ?>-->
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <!--<?php else: ?>-->
    <input type="hidden" value="resort" name="action">
    <table class="layui-table" lay-skin="line">
        <thead>
        <tr>
            <th class='list-table-check-td'>
                <input data-auto-none="none" data-check-target='.list-check-box' type='checkbox'>
            </th>
            <th class='list-table-sort-td'>
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-xs">排 序</button>
            </th>
            <th class='text-left nowrap'>商品分类</th>
            <th class='text-left nowrap'>分类描述</th>
            <th class='text-left nowrap'>添加时间</th>
            <th class='text-center nowrap'>分类状态</th>
            <th class='text-center'></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class='list-table-check-td'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['ids']); ?>' type='checkbox'>
            </td>
            <td class='list-table-sort-td'>
                <input name="_<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['sort']); ?>" class="list-sort-input">
            </td>
            <td class='text-left nowrap'>
                <span class="color-desc"><?php echo $vo['spl']; ?></span> <?php echo htmlentities($vo['cate_title']); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo (isset($vo['cate_desc']) && ($vo['cate_desc'] !== '')?$vo['cate_desc']:'<span class="color-desc">未设置分类描述</span>'); ?>
            </td>
            <td class='text-left nowrap'>
                <?php echo htmlentities(format_datetime($vo['create_at'])); ?>
            </td>
            <td class='text-center nowrap'>
                <?php if($vo['status'] == 0): ?><span>已禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">使用中</span><?php endif; ?>
            </td>
            <td class='text-center nowrap'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-title="编辑分类" data-modal='<?php echo url("@$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['ids']); ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'>禁用</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['ids']); ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>启用</a>
                <?php endif; if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['ids']); ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'>删除</a>
                <?php endif; ?>

            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
    <!--<?php endif; ?>-->
</form>
</div>
</div>

<!-- 右则内容区域 结束 -->