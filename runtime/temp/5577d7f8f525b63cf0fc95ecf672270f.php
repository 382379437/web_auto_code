<?php /*a:1:{s:72:"E:\whua\projects\web_auto_code/application/admin/view\autocode\form.html";i:1524121873;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="<?php echo request()->url(); ?>" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">控制器名称</label>
        <div class="layui-input-block">
            <input type="text" autofocus name="title" placeholder="eg：代码自动生成" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制器</label>
        <div class="layui-input-block">
            <input type="text" autofocus name="controller" placeholder="填写控制器：User ;不能与已有的文件名重复，否则造成不可预知的情况" value='<?php echo htmlentities((isset($vo['controller']) && ($vo['controller'] !== '')?$vo['controller']:"")); ?>' class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">表名</label>
        <div class="layui-input-block">
            <input type="text" autofocus name="dbname" placeholder="eg：数据表名称 member 最后结果是 前缀web_+输入的名称" value='<?php echo htmlentities((isset($vo['dbname']) && ($vo['dbname'] !== '')?$vo['dbname']:"")); ?>' class="layui-input">
        </div>
    </div>



    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>创建控制器</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消</button>
    </div>
    <script>window.form.render();</script>
</form>
