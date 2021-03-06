<?php /*a:1:{s:92:"E:\whua\projects\web_auto_code_branch\web_auto_code/application/admin/view\tools\canvas.html";i:1531125917;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>canvas</title>
    <link href="/static/plugs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/static/plugs/layui/css/layui.css" rel="stylesheet">
    <style>
        .main{
            width: 90%;
            margin: 0 auto;
            /*margin-top: 20px;*/
            /*border: 1px solid;*/
            /*height: 650px;*/
            text-align: center;
        }
        .main canvas{
            float: left;
        }
        /*#canvas{*/
            /*border: 1px solid green;*/
            /*width: 100%;*/
            /*height: 100%;*/
        /*}*/
    </style>
</head>
<body>

<div class="main">

    <div>
        <div>
            <button onclick="complete(this)">完成</button>
            <button onclick="goon(this)">继续</button>
            <button onclick="cancel(this)">回退</button>
            <button onclick="clearDraw('drawing')">清空</button>
        </div>
        <div>
            <div>
                <select class="ul_tmp_save" onchange="showDrawingData(this,'drawing')">
                    <option value="">画布数据</option>
                </select>
            </div>
        </div>
        <br/>
        <canvas id="drawing" width="1600" height="400" style="border:1px solid #d3d3d3;" onclick="drowimg(this)" ondrag="toDrag(this)">
            Your browser does not support the HTML5 canvas tag.
        </canvas>

    </div>

    <canvas id="canvas" width="800" height="600" style="border:1px solid #d3d3d3;">
        Your browser does not support the HTML5 canvas tag.
    </canvas>
    <canvas id="xingxing" width="800" height="600" style="border:1px solid #d3d3d3;">
        Your browser does not support the HTML5 canvas tag.
    </canvas>
</div>
</body>
<script src="/static/plugs/jquery/jquery.min.js"></script>
<script src="/static/plugs/layui/layui.js"></script>
<script>
    $(function () {
        xing("xingxing");
        random_module("canvas", 10, 800, 600);
        // console.log(getMousePos());

    });

    var zuobiao = [];//搜集点击时鼠标相对于浏览器窗口的坐标
    var drowimg = function (obj) {
        var c = document.getElementById($(obj).attr('id')).getContext('2d');
        zuobiao.push(getMousePosEle(obj));

        // console.log(zuobiao);
        for (var i=0; i<zuobiao.length; i++){
            if(i == 0){
                c.moveTo(zuobiao[i][0],zuobiao[i][1]);
            }else {
                c.lineTo(zuobiao[i][0],zuobiao[i][1]);
            }
        }
        c.stroke();

    };
    //鼠标相对于浏览器窗口坐标
    function getMousePos(event) {
        var e = event || window.event;
        return [e.clientX, e.clientY];
    }
    //鼠标相对于元素坐标
    function getMousePosEle(ele,event) {
        var e = event || window.event;
        var offsetX = e.clientX - ele.clientLeft;
        var offsetY = e.clientY - ele.clientTop;
        offsetX = offsetX - $(ele).offset().left;
        offsetY = offsetY - $(ele).offset().top;
        return [offsetX, offsetY];
    }

    //临时保存画布数据
    var ul_tmp_save = [];
    var complete = function (obj) {
        btnBgcolor(obj);
        $(obj).parent().parent().find('canvas').attr('onclick', '');

        if(zuobiao.length>0)ul_tmp_save.push(zuobiao);
        zuobiao = [];//重置坐标数组，重新开始画图

        var c = document.getElementById($(obj).parent().parent().find('canvas').attr('id'));
        c.height = c.height;//清空画布1
        // var cxt = c.getContext('2d');//清空画布2
        // cxt.clearRect(0,0,c.width,c.height);
        //显示在列表中
        if(ul_tmp_save.length>0){
            $('.ul_tmp_save').append('<option value="'+ul_tmp_save.length+'">画布数据：'+ul_tmp_save.length+'</option>');
        }
        //这里提交到后台
        //todo...
    };
    var goon = function (obj) {
        btnBgcolor(obj);
        $(obj).parent().parent().find('canvas').attr('onclick', 'drowimg(this)');
    };

    var backup = zuobiao;//备份
    var cancel = function (obj) {
        btnBgcolor(obj);
        zuobiao.splice(zuobiao.length-1,1);
        // console.log(zuobiao);
    };

    //显示画布数据
    var showDrawingData = function (select,ele) {
        var num = $(select).val()-1;
        if(ul_tmp_save.length==0)return;
        var c = document.getElementById(ele).getContext('2d');
        for (var i=0; i<ul_tmp_save[num].length; i++){
            if(i == 0){
                c.moveTo(ul_tmp_save[num][i][0],ul_tmp_save[num][i][1]);
            }else {
                c.lineTo(ul_tmp_save[num][i][0],ul_tmp_save[num][i][1]);
            }
        }
        c.stroke();
    };

    //清空画布
    var clearDraw = function (ele) {
        var c = document.getElementById(ele);
        c.height = c.height;//清空画布1
        zuobiao = [];
    };
    //拖拽画布
    var toDrag = function (obj) {
        // var c = document.getElementById(ele).getContext('2d');
        // console.log(1);
    };
    //按钮改变背景色
    var btnBgcolor = function (obj) {
        $(obj).parent().find('button').css({'background-color':'gainsboro'});
        $(obj).css({'background-color':'red'})
    }
</script>

<script>
    //星星
    var xing = function (id) {
        var c = document.getElementById(id).getContext('2d');
        c.moveTo(400,350);
        c.lineTo(540,480);
        c.lineTo(500,300);
        c.lineTo(700,150);
        c.lineTo(460,200);
        c.lineTo(300,50);
        c.lineTo(330,250);
        c.lineTo(160,290);
        c.lineTo(320,340);
        c.lineTo(300,440);
        c.closePath();
        c.stroke();

    };

    //随机线形
    var random_module = function (id, times, fanwei_width,fanwei_height) {
        var c = document.getElementById(id).getContext('2d');

        var ar = [];
        for(var i=0 ; i<times; i++){
            var p1 = Math.ceil(Math.random()*fanwei_width);
            var p2 = Math.ceil(Math.random()*fanwei_height);

            ar[i]=[p1,p2];
        }
        for (var i=0; i<ar.length; i++){
            if(i == 0){
                c.moveTo(ar[i][0],ar[i][1]);
            }else {
                c.lineTo(ar[i][0],ar[i][1]);
            }
        }
        c.stroke();
        // console.log(ar);
    }
</script>
</html>