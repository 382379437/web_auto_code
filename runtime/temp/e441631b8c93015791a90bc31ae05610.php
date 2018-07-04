<?php /*a:1:{s:68:"E:\whua\projects\web_auto_code/application/admin/view\menu\form.html";i:1521427517;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="<?php echo request()->url(); ?>" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">上级菜单</label>
        <div class="layui-input-block">
            <select name='pid' class='layui-select full-width' lay-ignore>
                <!--<?php foreach($menus as $menu): ?>-->
                <!--<?php if($menu['id'] == (isset($vo['pid']) && ($vo['pid'] !== '')?$vo['pid']:0)): ?>-->
                <option selected value='<?php echo htmlentities($menu['id']); ?>'><?php echo $menu['spl']; ?><?php echo htmlentities($menu['title']); ?></option>
                <!--<?php else: ?>-->
                <option value='<?php echo htmlentities($menu['id']); ?>'><?php echo $menu['spl']; ?><?php echo htmlentities($menu['title']); ?></option>
                <!--<?php endif; ?>-->
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' required="required" title="请输入菜单名称" placeholder="请输入菜单名称" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">菜单链接</label>
        <div class="layui-input-block">
            <input type="text" onblur="(this.value === '') && (this.value = '#')" name="url" autocomplete="off" required="required" title="请输入菜单链接" placeholder="请输入菜单链接" value="<?php echo htmlentities((isset($vo['url']) && ($vo['url'] !== '')?$vo['url']:'#')); ?>" class="layui-input typeahead">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">菜单图标</label>
        <div class="layui-input-inline" style='width:300px'>
            <input placeholder="请输入或选择图标" onchange="$('#icon-preview').get(0).className = this.value" type="text" name="icon" value='<?php echo htmlentities((isset($vo['icon']) && ($vo['icon'] !== '')?$vo['icon']:"")); ?>' class="layui-input">
        </div>
        <span class='layui-btn layui-btn-primary' style='padding:0 12px;min-width:45px'>
            <i id='icon-preview' style='font-size:1.2em' class='<?php echo htmlentities((isset($vo['icon']) && ($vo['icon'] !== '')?$vo['icon']:"")); ?>'></i>
        </span>
        <button data-icon='icon' type='button' class='layui-btn layui-btn-primary'>选择图标</button>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
    <script>
        require(['bootstrap.typeahead'], function () {
            var subjects = JSON.parse('<?php echo json_encode($nodes); ?>');
            $('.typeahead').typeahead({source: subjects, items: 5});
        });
    </script>

</form>
