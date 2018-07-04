<?php /*a:1:{s:78:"E:\whua\projects\web_auto_code/application/admin/view\autocode\createview.html";i:1525342778;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">视图名</label>
        <div class="layui-input-block">
            <select name="dbname" lay-filter="demo1" >
                <option value="">请选择</option>
                <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($to['dbname']); ?>"><?php echo htmlentities($to['title']); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">要在视图中显示的字段</label>
        <div class="layui-input-block">
            <table class="thisismytable table">

            </table>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            列表视图:<input type="radio" style="opacity:0.0001;z-index: -999;" class="radio" value="1" name="type">
            编辑视图<input type="radio" name="type" value="2" style="opacity:0.0001;z-index: -999;">
        </div>
    </div>
    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <button class="layui-btn " type='submit' lay-submit lay-filter="nowTogoCreate">生成视图</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取 消</button>
    </div>
    <script>
        var tbna = '';
        form.on('select(demo1)', function (o) {
            var dbname = $(o.elem).val();
            if(!dbname)return;
            tbna = dbname;
            $.post('<?php echo url("getFields"); ?>',{dbname:dbname}, function (res) {
                layer.msg(res.msg);
                if(res.code){

                    var d = res.data;
                    if(d){
                        var str = '<tr><td>注释</td><td>字段名</td><td>是否在表单显示</td><td>类型</td><td>长度</td><td>默认值</td></tr>';
                        for (var i=0; i< d.length; i++){
                            str+= '<tr><td>'+d[i].title+'</td><td>'+d[i].fields_name+'</td><td>'+d[i].is_show+'</td><td>'+d[i].type+'</td><td>'+d[i].size+'</td><td>'+d[i].default+'</td></tr>';
                        }
                        $('.thisismytable').html('');
                        $('.thisismytable').html(str);
                    }
                }
            },'json');

        });

        form.on('submit(nowTogoCreate)', function (o) {

            //获取视图类型
            var view_type = $('input[name="type"]:checked').val();
            if(!view_type){
                layer.msg('视图类型不存在');return false;//一定要返回FALSE
            }
            var data = $(o.elem).parents('form').serialize();

            $(o.elem).attr('disabled', 'disabled');
            $.post("<?php echo url('nowtogocreate'); ?>",{data:data}, function (res) {

                if(res.code == 0){
                    //报错
                    layer.msg(res.msg);
                }else{
                    //页面组装成功，等待创建视图文件
                    layer.msg('页面组装成功，等待创建视图文件...', function () {
                        var html_str = res;
                        $.post('<?php echo url("toviewfiletemp"); ?>', {html_str:html_str, view_name:tbna, view_type:view_type}, function (res) {
                            layer.msg(res.msg);
                            $(o.elem).removeAttr('disabled');
                        }, 'json');

                    });
                }

            },'json');


            return false;
        });
    </script>
    <script>window.form.render();</script>

</form>
