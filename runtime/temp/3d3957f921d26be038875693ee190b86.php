<?php /*a:1:{s:76:"E:\whua\projects\web_auto_code/application/admin/view\autocode\formview.html";i:1525927020;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="<?php echo request()->url(); ?>" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">所属表</label>
        <div class="layui-input-block">
            <select name="dbname" required="required">
                <option value="">请选择</option>
                <?php if(!(empty($fields_info) || (($fields_info instanceof \think\Collection || $fields_info instanceof \think\Paginator ) && $fields_info->isEmpty()))): if(is_array($fields_info) || $fields_info instanceof \think\Collection || $fields_info instanceof \think\Paginator): $i = 0; $__LIST__ = $fields_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($to['dbname']); ?>" <?php echo isset($vo['dbname'])&&$vo['dbname']==$to['dbname']?'selected':''; ?>><?php echo htmlentities($to['title']); ?>-<?php echo htmlentities($to['dbname']); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">字段注释</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' class="layui-input" placeholder="填写字段注释 ">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否在列表显示</label>
        <div class="layui-input-block">
            <select name="is_show">
                <option value="0" <?php echo isset($vo['is_show'])&&$vo['is_show']==0?'selected':''; ?>>否</option>
                <option value="1" <?php echo isset($vo['is_show'])&&$vo['is_show']==1?'selected':''; ?>>是</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否在表单显示</label>
        <div class="layui-input-block">
            <select name="is_form">
                <option value="1" <?php echo isset($vo['is_form'])&&$vo['is_form']==1?'selected':''; ?>>是</option>
                <option value="0" <?php echo isset($vo['is_form'])&&$vo['is_form']==0?'selected':''; ?>>否</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">英文字段名</label>
        <div class="layui-input-block">
            <input type="text" name="fields_name" value='<?php echo htmlentities((isset($vo['fields_name']) && ($vo['fields_name'] !== '')?$vo['fields_name']:"")); ?>' class="layui-input" placeholder="填写英文字段名 ">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">字段类型</label>
        <div class="layui-input-block">
            <select name="type" <?php $fileds_type = getFieldsType('',true);if(is_array($fileds_type) || $fileds_type instanceof \think\Collection || $fileds_type instanceof \think\Paginator): $i = 0; $__LIST__ = $fileds_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($v); ?>" <?php echo isset($vo['type'])&&$vo['type']==$v?'selected':''; ?>><?php echo htmlentities($v); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">长度</label>
        <div class="layui-input-block">
            <input type="text" name="size" value='<?php echo htmlentities((isset($vo['size']) && ($vo['size'] !== '')?$vo['size']:"")); ?>' class="layui-input" placeholder="填写长度 ">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">小数位</label>
        <div class="layui-input-block">
            <input type="number" name="decimals_size" value='<?php echo htmlentities((isset($vo['decimals_size']) && ($vo['decimals_size'] !== '')?$vo['decimals_size']:"0")); ?>' class="layui-input" placeholder="填写小数位数 ">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">默认值</label>
        <div class="layui-input-block">
            <select name="default">
                <option value="" <?php echo isset($vo['default'])&&$vo['default']==''?'selected':''; ?>>空字符</option>
                <option value="0" <?php echo isset($vo['default'])&&$vo['default']=='0'?'selected':''; ?>>0</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">表单类型</label>
        <div class="layui-input-block">
            <select name="form_type" <?php $form_type = getFormType('', true);?>>
                <option value="">请选择</option>
                <?php if(!(empty($form_type) || (($form_type instanceof \think\Collection || $form_type instanceof \think\Paginator ) && $form_type->isEmpty()))): if(is_array($form_type) || $form_type instanceof \think\Collection || $form_type instanceof \think\Paginator): $i = 0; $__LIST__ = $form_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($v); ?>" <?php echo isset($vo['form_type'])&&$vo['form_type']==$v?'selected':''; ?>><?php echo htmlentities($v); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">表单可选值</label>
        <div class="layui-input-block">
            <input type="text" name="form_value" value='<?php echo htmlentities((isset($vo['form_value']) && ($vo['form_value'] !== '')?$vo['form_value']:"")); ?>' class="layui-input" placeholder="select和radio eg：1:男,2:女 用英文,和:隔开。web_tablename,key-val:key-val:...... ">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">取值字段</label>
        <div class="layui-input-block">
            <input type="text" name="res_fields_name" value='<?php echo htmlentities((isset($vo['res_fields_name']) && ($vo['res_fields_name'] !== '')?$vo['res_fields_name']:"")); ?>' class="layui-input" placeholder="取值字段 对应可选值">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否多图</label>
        <div class="layui-input-block">
            单图<input type="radio" name="is_many_img" <?php echo isset($vo['is_many_img']) && $vo['is_many_img'] == 'one'?'checked':''; ?> value="one" style="opacity: 0.000001;">&nbsp;&nbsp;
            多图<input type="radio" name="is_many_img" <?php echo isset($vo['is_many_img']) && $vo['is_many_img'] == 'mut'?'checked':''; ?> value="mut" style="opacity: 0.000001;">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否自动提示</label>
        <div class="layui-input-block">
            <input type="text" name="is_auto_tips" value='<?php echo htmlentities((isset($vo['is_auto_tips']) && ($vo['is_auto_tips'] !== '')?$vo['is_auto_tips']:"")); ?>' class="layui-input" placeholder="自动提示参数 eg：/admin/label/getlabel-id,title">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否搜索</label>
        <div class="layui-input-block">
            <select name="is_search">
                <option value="0" <?php echo isset($vo['is_search'])&&$vo['is_search']==='0'?'selected':''; ?>>否</option>
                <option value="1" <?php echo isset($vo['is_search'])&&$vo['is_search']=='1'?'selected':''; ?>>是</option>
            </select>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">是否加入搜索引擎(扩展位)</label>
        <div class="layui-input-block">
            <select name="is_into_engine">
                <option value="0" <?php echo isset($vo['is_into_engine'])&&$vo['is_into_engine']==='0'?'selected':''; ?>>否</option>
                <option value="1" <?php echo isset($vo['is_into_engine'])&&$vo['is_into_engine']=='1'?'selected':''; ?>>是</option>
            </select>
        </div>
    </div>
    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取 消</button>
    </div>
    <script>window.form.render();</script>
</form>
