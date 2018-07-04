<?php /*a:1:{s:69:"E:\whua\projects\web_auto_code/application/admin/view\test\index.html";i:1530594372;}*/ ?>

<style>
    .float-e-margins .btn{margin-bottom: 0px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>测试页</h5>
                </div>
                <div class="layui-form-item">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <!--<button type="button" class="layui-btn btn-primary" onClick="javascrtpt:window.location.href='<?php echo url('edit');?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>-->
                            <!--<button type="button" class="layui-btn btn-primary">排序&nbsp;<span class="glyphicon glyphicon-sort"></span></button>-->
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                 <!--<input type="text" placeholder="Ctrl+F搜索" class=" layui-input">-->
                                     <label class="layui-form-label">提示：Ctrl+F搜索</label>
                            </div>
                        </div>
                    </div>
                    <!--操作end-->
                    <div style="height:10px;"></div>
                    <!--搜索start-->


                    <!--搜索end-->
                    <div style="height:10px;"></div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                &nbsp;
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('dbmanage/index'); ?>')">EasyDBM&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <img src="/static/admin/img/a1.jpg">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('imgDeal'); ?>')">图片添加水印&nbsp;</button>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入正确的时间戳"  value="<?php echo time(); ?>" class=" layui-input timeToDate">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('timeToDate'); ?>')">时间戳转日期&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入正确的时间"  value="<?php echo date('Y-m-d H:i:s'); ?>" class=" layui-input dateToTime">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('dateToTime'); ?>')">日期转时间戳&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入链接地址"  value="www.baidu.com" class=" layui-input createErweima">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('createPhpQrcode'); ?>')">生成二维码&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入邮箱"  value="382379417@qq.com" class=" layui-input isEmail">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('isEmail'); ?>')">验证邮箱&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入手机号"  value="18290416011" class=" layui-input isMobile">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('isMobile'); ?>')">验证手机号&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder=""  value="http://hanghang666.com/xjmg/shot_spage_new/get?tid=1060" class=" layui-input ">
                            </div>
                            <div class="col-sm-3">
                                <a href="http://hanghang666.com/xjmg/shot_spage_new/get?tid=1060" target="_blank"><button type="button" class="layui-btn ">男人福利&nbsp;</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder=""  value="https://zhidao.baidu.com/liuyan/detail?id=6000" class=" layui-input ">
                            </div>
                            <div class="col-sm-3">
                                <a href="https://zhidao.baidu.com/liuyan/detail?id=6000" target="_blank"><button type="button" class="layui-btn ">真相问答机&nbsp;</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder=""  value="" class=" layui-input ">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn ">图片文字识别&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder=""  value="" class=" layui-input readBase64Img">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('readBase64Img'); ?>')">读取base64编码后的图片&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" placeholder="输入城市"  value="重庆" class=" layui-input weather">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="layui-btn " onclick="togo('<?php echo url('weather'); ?>')">天气预报&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var togo = function (url){
        url = url+'?timeToDate='+$('.timeToDate').val();
        url = url+'&dateToTime='+$('.dateToTime').val();
        url = url+'&createErweima='+$('.createErweima').val();
        url = url+'&isEmail='+$('.isEmail').val();
        url = url+'&isMobile='+$('.isMobile').val();
        url = url+'&readBase64Img='+$('.readBase64Img').val();
        url = url+'&weather='+$('.weather').val();

        window.open(url) ;
    }
</script>