<?php /*a:1:{s:80:"E:\whua\projects\web_auto_code/application/admin/view\autocode\templateform.html";i:1525859854;}*/ ?>
<?php if(!(empty($edit_fields) || (($edit_fields instanceof \think\Collection || $edit_fields instanceof \think\Paginator ) && $edit_fields->isEmpty()))): ?>
<!-- 引入magicsuggest css,js，不一定使用 -->
<link href="/static/plugs/magicsuggest-2.0.0/magicsuggest-min.css" rel="stylesheet">
<script src="/static/plugs/magicsuggest-2.0.0/magicsuggest-min.js"></script>
<form onsubmit="return false;" action="<?php echo request()->url(); ?>" data-auto="true" method="post" id="ProductForm" class='form-horizontal layui-form padding-top-20'>
    <!-- 保存img name -->
    <?php  $namearr = []; if(is_array($edit_fields) || $edit_fields instanceof \think\Collection || $edit_fields instanceof \think\Paginator): $i = 0; $__LIST__ = $edit_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ef): $mod = ($i % 2 );++$i;?>
    <div class="form-group">
        <?php if($ef['is_form'] == 1): ?>
        <label class="col-sm-2 control-label"><?php echo htmlentities($ef['title']); ?></label>
        <div class="col-sm-8">
            <?php if($ef['form_type'] == 'input'): ?>
                <!-- 自动提示 -->
                <?php if($ef['is_auto_tips']): ?>
                <span style="z-index: 99999"><?php echo isset($vo[$ef['fields_name']])?$vo[$ef['fields_name']]:''; ?></span>
                <input type="hidden" class="<?php echo htmlentities($ef['fields_name']); ?><?php echo htmlentities($key); ?>" name="<?php echo htmlentities($ef['fields_name']); ?>">
                <input type="text" autofocus  id="<?php echo htmlentities($ef['fields_name']); ?><?php echo htmlentities($key); ?>" placeholder="请输入<?php echo htmlentities($ef['title']); ?>"  class="layui-input" value="">
                    <?php 
                        $exp_data = explode("-", $ef['is_auto_tips']);
                        $js_data_url = empty($exp_data)?'':$exp_data[0];

                        $valueField = $exp_data?explode(',', $exp_data[1]):[];
                        $valueField = $valueField?$valueField[0]:'id';

                        $displayField = $exp_data?explode(',', $exp_data[1]):[];
                        $displayField = $displayField?$displayField[1]:'';
                     ?>
                    <script>
                        //加载
                        var magicSuggest;
                        $(function () {
                            var js_data_url = '<?php echo htmlentities($js_data_url); ?>';
                            var valueField = '<?php echo htmlentities($valueField); ?>';
                            var displayField = "<?php echo htmlentities($displayField); ?>" ;
                            var magicSuggest_id = '<?php echo htmlentities($ef['fields_name']); ?><?php echo htmlentities($key); ?>';

                            if(js_data_url && valueField && displayField && magicSuggest_id){
                                //解析自动提示参数 eg：/admin/label/getlabel-id,title
                                magicSuggest = $('#'+magicSuggest_id).magicSuggest({
                                    data: js_data_url,
                                    //空间value值
                                    valueField:valueField,
                                    //在数据中用哪个字段名取得数据
                                    displayField:displayField,
                                    //允许选择的最大个数
                                    maxSelection:5,
                                    //查询参数 eg： url.html?str=
                                    queryParam:'<?php echo htmlentities($ef['fields_name']); ?>',
                                    //允许用户手动输入
                                    allowFreeEntries:false
                                });
                                //获取
                                $(magicSuggest).on('selectionchange', function(e, cb, s){
                                    var str = cb.getValue();
                                    $('.'+magicSuggest_id).val(str);
                                });
                            }
                        })
                    </script>
                <?php else: ?>
                <input type="<?php echo $ef['type']=='int' ? 'number' : 'text'; ?>" autofocus name="<?php echo htmlentities($ef['fields_name']); ?>" placeholder="请输入<?php echo htmlentities($ef['title']); ?>" value='<?php echo isset($vo[$ef['fields_name']])?$vo[$ef['fields_name']]:""; ?>' class="layui-input">
                <?php endif; elseif($ef['form_type'] == 'date'): ?>
            <input type="date" autofocus name="<?php echo htmlentities($ef['fields_name']); ?>" placeholder="请输入<?php echo htmlentities($ef['title']); ?>" value='<?php echo isset($vo[$ef['fields_name']])?$vo[$ef['fields_name']]:""; ?>' class="layui-input">
            <?php elseif($ef['form_type'] == 'select'): ?>
            <select name="<?php echo htmlentities($ef['fields_name']); ?>" <?php $r_list = dealFormValueList($ef['form_value'], $ef['res_fields_name']); ?> class='layui-select full-width'>
            <option value="">请选择</option>
            <?php if(!(empty($r_list) || (($r_list instanceof \think\Collection || $r_list instanceof \think\Paginator ) && $r_list->isEmpty()))): if(is_array($r_list) || $r_list instanceof \think\Collection || $r_list instanceof \think\Paginator): $i = 0; $__LIST__ = $r_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($uo['id']); ?>" <?php echo isset($vo[$ef['fields_name']])&&$vo[$ef['fields_name']]==$uo['id']?'selected':''; ?>><?php echo htmlentities($uo['title']); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
            <?php elseif($ef['form_type'] == 'radio'): ?>
            <span <?php $r_list = dealFormValueList($ef['form_value'], $ef['res_fields_name']);?>></span>
            <?php if(!(empty($r_list) || (($r_list instanceof \think\Collection || $r_list instanceof \think\Paginator ) && $r_list->isEmpty()))): if(is_array($r_list) || $r_list instanceof \think\Collection || $r_list instanceof \think\Paginator): $i = 0; $__LIST__ = $r_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?>
            <?php echo htmlentities($uo['title']); ?><input type="radio" style="opacity: 0.000001;" <?php echo isset($vo[$ef['fields_name']])&&$vo[$ef['fields_name']]==$uo['id']?'checked':''; ?> name="<?php echo htmlentities($ef['fields_name']); ?>" value="<?php echo htmlentities($uo['id']); ?>">&nbsp;&nbsp;
            <?php endforeach; endif; else: echo "" ;endif; endif; elseif($ef['form_type'] == 'textarea'): ?>
            <textarea name="<?php echo htmlentities($ef['fields_name']); ?>" class="" style="width: 100%;height: 90px;"><?php echo empty($vo[$ef['fields_name']])?'':$vo[$ef['fields_name']]; ?></textarea>
            <?php elseif($ef['form_type'] == 'textarea_editer'): ?>
            <script src="/static/plugs/ckeditor/ckeditor.js"></script>
            <input type="hidden" name="<?php echo htmlentities($ef['fields_name']); ?>" value="<?php echo empty($vo[$ef['fields_name']])?'':$vo[$ef['fields_name']]; ?>">
            <textarea id="editor_<?php echo htmlentities($ef['id']); ?>"></textarea>
            <script>
                $(function () {
                    CKEDITOR.replace('editor_<?php echo htmlentities($ef['id']); ?>');
                    CKEDITOR.instances.editor_<?php echo htmlentities($ef['id']); ?>.setData($('input[name="<?php echo htmlentities($ef['fields_name']); ?>"]').val());
                });
                function toGoIn(obj){
                    var content = CKEDITOR.instances.editor_<?php echo htmlentities($ef['id']); ?>.getData();
                    if(!content)return ;
                    $('input[name="<?php echo htmlentities($ef['fields_name']); ?>"]').val(content);
                    $(obj).parents('form').submit();
                }
            </script>
            <?php elseif($ef['form_type'] == 'img'): ?>
            <div class='col-sm-12'>
                <table class="layui-table background-item margin-none" lay-size="sm" lay-skin="nob">
                    <thead>
                    <tr>
                        <td><?php echo htmlentities($ef['title']); ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-top" style="width:100px">
                            <?php array_push($namearr,['name'=>$ef['fields_name'],'type'=>$ef['is_many_img']]); ?>
                            <input type="hidden" name="<?php echo htmlentities($ef['fields_name']); ?>" value="<?php echo empty($vo[$ef['fields_name']])?'':$vo[$ef['fields_name']]; ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <span <?php echo htmlentities($is_have_texarea_edit = 0); ?>></span>
        <?php $open_type = 'data-modal';if(is_array($edit_fields) || $edit_fields instanceof \think\Collection || $edit_fields instanceof \think\Paginator): $i = 0; $__LIST__ = $edit_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ef): $mod = ($i % 2 );++$i;if(in_array($ef['form_type'],['textarea_editer'])): $open_type='data-load';?>
        <span <?php echo htmlentities($is_have_texarea_edit = 1); ?>></span>
        <?php endif; endforeach; endif; else: echo "" ;endif; if($is_have_texarea_edit): ?>
        <button class="layui-btn" type='button' onclick="toGoIn(this)">保存</button>
        <?php else: ?>
        <button class="layui-btn" type='submit'>保存</button>
        <?php endif; ?>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-load="<?php echo url('index'); ?>">取消</button>
    </div>

</form>

<script>
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
        //window.createEditor('[name="goods_content"]', {height: 500});//创建编辑器
        var app = angular.module("ProductForm", []).run(callback);
        angular.bootstrap(document.getElementById(app.name), [app.name]);

        function callback($rootScope) {
            // 单图片上传处理
            //$('#ProductForm [name="goods_logo"]').uploadOneImage();
            // 多图片上传处理 默认
            console.log('数量：'+<?php echo count($namearr); ?>);
            <?php if(!(empty($namearr) || (($namearr instanceof \think\Collection || $namearr instanceof \think\Paginator ) && $namearr->isEmpty()))): if(is_array($namearr) || $namearr instanceof \think\Collection || $namearr instanceof \think\Paginator): $i = 0; $__LIST__ = $namearr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;if($to['type'] == 'one'): ?>
                $('#ProductForm [name="<?php echo htmlentities($to['name']); ?>"]').uploadOneImage();
            <?php else: ?>
                $('#ProductForm [name="<?php echo htmlentities($to['name']); ?>"]').uploadMultipleImage();
            <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
        };
    });
</script>
<style>

    .background-item {
        padding: 15px;
        background: #efefef;
    }

    .background-item thead tr {
        background: #e0e0e0
    }

</style>
<?php endif; ?>