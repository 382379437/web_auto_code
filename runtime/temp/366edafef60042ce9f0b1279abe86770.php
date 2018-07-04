<?php /*a:1:{s:73:"E:\whua\projects\web_auto_code/application/admin/view\dbmanage\index.html";i:1530685049;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EasyDBM</title>
    <link href="/static/plugs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/static/plugs/layui/css/layui.css" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
            border: 0;
        }
        .main{
            /*min-width: 80%;*/
            width: 80%;
            margin: 0 auto;
            border: 1px solid green;
            min-height: 900px;
            /*display:inline-block*/
        }
        .main div {
            border: 1px grey solid;
        }
        .top{
            min-height: 160px;
            text-align: center;
        }
        .top .middle-txt-code{
            width: 60%;
            min-height: 100px;
            margin-top: 5px;
        }
        .middle{
            height: 30px;
            line-height:30px;
            color:grey;
            text-align: center;
            border: 0;
            background-color: ghostwhite;
        }
        .middle div{border: 0}
        .bottom{
            min-height: 646px;
            text-align: center;
        }
        table{
            border-radius: 3px;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        table td,th{
            text-align: center;
        }
        table th{color: grey;}
        .foot{
            height: 50px;line-height: 50px;
        }
        .backtop{
            font-size: 22px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            position: absolute;
            right: 10%;
            text-align: center;
            bottom: 100px;
            background-color: rgb(150,150,150);
            color: white;
            border-radius: 28px;
        }
        .backtop:hover{
            background-color: rgb(248,248,255);
            color: grey;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="top" >
            <br/>
            <form onsubmit="return checkForm(this)">
                <input type="text" style="display: none;">
                <input type="button" sql="show databases;" value="查看数据库" onclick="quickKey(this, 1)" title="查看有哪些数据库">
                <input type="button" sql="show tables;" value="所有表" onclick="quickKey(this, 1)" title="查询当前数据库所有表名称">
                <input type="button" sql="select * from tables ;" value="查看某表" onclick="quickKey(this, 0)" title="记得把sql中的tables换成你需要的表名">
                <br/>
                <textarea autofocus  class="middle-txt-code" name="sql"><?php echo !empty($sql) ? htmlentities($sql) : 'show databases;'; ?></textarea>
                <br/>
                <input type="submit" value="查 询" accesskey="s" title="alt+s 快捷提交"> &nbsp;&nbsp;|&nbsp;&nbsp;
                <select name="current">
                    <option value="10" <?php echo input('current')==10?'selected':''; ?>>10</option>
                    <option value="20" <?php echo input('current')==20?'selected':''; ?>>20</option>
                    <option value="50" <?php echo input('current')==50?'selected':''; ?>>50</option>
                    <option value="100" <?php echo input('current')==100?'selected':''; ?>>100</option>
                    <option value="200" <?php echo input('current')==200?'selected':''; ?>>200</option>
                    <option value="500" <?php echo input('current')==500?'selected':''; ?>>500</option>
                </select>
            </form>
        </div>
        <div class="middle">
            <div style="width: 30%;float: left;">[now database: <?php echo config('database.database'); ?>]</div>
            <div style="width: 69%;float: left;text-align: right;">
                【总条数：<?php echo !empty($count) ? htmlentities($count) :  0; ?>】
                【<a href="JavaScript:;" onclick="toBackUp(1)" title="备份目录需要读写权限才能正常备份">备份</a>】
                【<a href="JavaScript:;" onclick="toBackUp(0)">恢复</a>】
                【EasyDBM】
            </div>
        </div>
        <div class="bottom">
            <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if(is_array($info)): ?>
            <table border="1">
                <tr>
                    <?php foreach($kname as $kn): ?>
                    <th><?php echo htmlentities($kn); ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <?php foreach($vo as $val): ?>
                        <td><?php echo htmlentities($val); ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php else: ?>
            <div style="text-align: center">
                <?php echo htmlentities($info); ?>
            </div>
            <?php endif; else: ?>
            no info
            <?php endif; ?>
            <div style="margin: 0 auto;border: 0;">
                <?php echo !empty($render) ? htmlspecialchars_decode($render) : ''; ?>
            </div>
        </div>
        <div class="foot" style="text-align: center;">&nbsp;没有内容了</div>
    </div>
<div class="backtop">顶</div>
</body>
<script src="/static/plugs/jquery/jquery.min.js"></script>
<script src="/static/plugs/layui/layui.js"></script>
<script>
    var layer;
    $(function () {
        layui.use(['layer', 'form'], function(){
            layer = layui.layer
                ,form = layui.form;

        });

    });

    var quickKey = function (obj, isSub) {
        $('.middle-txt-code').val($(obj).attr('sql'));
        if(isSub){
            $('input[type="submit"]').click();
        }
    }

    //提交检查
    var checkForm = function (obj) {
        var val = $(obj).find('.middle-txt-code').val();

        if(-1 === val.indexOf('select')){
            if(-1 === val.indexOf('where')){
                if(confirm('常规查询需要指定查询条件，是否继续？')){
                    return true;
                }else{
                    return false;
                }
            }
        }

    }

    var toBackUp = function (type) {
        if(!confirm('确认继续？')){
            return false;
        }
        var i = layer.load(1);
        layer.msg('请稍等...');
        if(type){
            $.post('<?php echo url("Dbmanage/backup"); ?>',{},function (res) {
                layer.close(i);
                layer.msg(res.msg);
            },'json');
        }else{
            $.post('<?php echo url("Dbmanage/reback"); ?>',{},function (res) {
                layer.close(i);
                layer.msg(res.msg);
            },'json');
        }
    }
</script>

<script>
    //scrollTop
    $(function () {
        $(window).scroll(function () {
            var s = $('.backtop');
            var none = $(s).css('display');
            if(none != 'none'){
                var top = $(window).scrollTop();
                $('.backtop').css({
                    'top':top+window.innerHeight-150+'px'
                });
            }
        });
    });

    //回到顶部
    $('.backtop').on('click',function () {
        $(window).scrollTop(0);
    });

</script>
</html>