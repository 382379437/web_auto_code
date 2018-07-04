<?php /*a:2:{s:72:"E:\whua\projects\web_auto_code/application/wechat/view\config\index.html";i:1525429418;s:73:"E:\whua\projects\web_auto_code/application/admin\view\public\content.html";i:1521427517;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15 nowrap"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form onsubmit="return false;" action="<?php echo request()->url(); ?>" data-auto="true" method="post" class='form-horizontal layui-form padding-top-20'>

    <div class="form-group">
        <label class="col-sm-2 control-label label-required">Mode<br><span class="nowrap color-desc">接口模式</span></label>
        <div class="col-sm-8">
            <?php 
            $wechat_type=sysconf('wechat_type')?sysconf('wechat_type'):'api';
            $wechat_type=request()->get('appkey')?'thr':$wechat_type;
             foreach(['api'=>'普通接口参数','thr'=>'第三方授权对接'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($wechat_type == $k): ?>-->
                <input checked type="radio" value="<?php echo htmlentities($k); ?>" name="wechat_type">
                <!--<?php else: ?>-->
                <input type="radio" value="<?php echo htmlentities($k); ?>" name="wechat_type">
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">如果使用第三方授权对接，需要 <a target="_blank" href="https://github.com/zoujingli/ThinkService">ThinkService</a> 项目的支持。</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="row">
        <div class="col-sm-2 control-label">WxTest<br><span class="nowrap color-desc">功能测试</span></div>
        <div class="col-sm-10">
            <div class="pull-left padding-right-15 notselect">
                <img class="notselect" data-tips-image src="<?php echo url('@wechat/api.tools/oauth_qrc'); ?>" style="width:80px;margin-left:-4px">
                <p class="text-center" style="margin-left:-10px">网页授权</p>
            </div>
            <div class="pull-left padding-left-0 padding-right-15">
                <img class="notselect" data-tips-image src="<?php echo url('@wechat/api.tools/jssdk_qrc'); ?>" style="width:80px;">
                <p class="text-center">JSSDK签名</p>
            </div>
            <div class="pull-left padding-left-0 padding-right-15">
                <img class="notselect" data-tips-image src="<?php echo url('@wx-demo-jsapiqrc'); ?>" style="width:80px;">
                <p class="text-center">JSAPI支付</p>
            </div>
            <div class="pull-left padding-left-0 padding-right-15">
                <img class="notselect" data-tips-image src="<?php echo url('@wx-demo-scanoneqrc'); ?>" style="width:80px;">
                <p class="text-center">扫码支付①</p>
            </div>
            <div class="pull-left padding-left-0">
                <img class="notselect" data-tips-image src="<?php echo url('@wx-demo-scanqrc'); ?>" style="width:80px;">
                <p class="text-center">扫码支付②</p>
            </div>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div data-api-type="api" class="hide">
        <div class="row form-group">
            <label class="col-sm-2 control-label">Token<br><span class="nowrap color-desc">验证令牌</span></label>
            <div class="col-sm-8">
                <input type="text" name="wechat_token" required="required" title="请输入接口Token(令牌)" placeholder="Token（令牌）" value="<?php echo sysconf('wechat_token'); ?>" class="layui-input">
                <p class="help-block">公众号平台与系统对接认证Token，请优先填写此参数并保存，然后再在微信公众号平台操作对接。</p>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">AppId<br><span class="nowrap color-desc">公众号标识</span></label>
            <div class="col-sm-8">
                <input type="text" name="wechat_appid" title="请输入以wx开头的18位公众号APPID" placeholder="公众号APPID（必填）" pattern="^wx[0-9a-z]{16}$" maxlength="18" required="required" value="<?php echo sysconf('wechat_appid'); ?>" class="layui-input">
                <p class="help-block">公众号应用ID是所有接口必要参数，可以在公众号平台 [ 开发 > 基本配置 ] 页面获取。</p>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">AppSecret<br><span class="nowrap color-desc">公众号密钥</span></label>
            <div class="col-sm-8">
                <input type="text" name="wechat_appsecret" required="required" title="请输入32位公众号AppSecret" placeholder="公众号AppSecret（必填）" value="<?php echo sysconf('wechat_appsecret'); ?>" maxlength="32" pattern="^[0-9a-z]{32}$" class="layui-input">
                <p class="help-block">公众号应用密钥是所有接口必要参数，可以在公众号平台 [ 开发 > 基本配置 ] 页面授权后获取。</p>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">EncodingAESKey<br><span class="nowrap color-desc">消息加密密钥</span></label>
            <div class="col-sm-8">
                <input type="text" name="wechat_encodingaeskey" title="请输入43位消息加密密钥" placeholder="消息加密密钥，若开启了消息加密时必需填写（可选）" value="<?php echo sysconf('wechat_encodingaeskey'); ?>" maxlength="43" class="layui-input">
                <p class="help-block">公众号平台接口设置为加密模式，消息加密密钥必需填写并保持与公众号平台一致。</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">AppUri<br><span class="nowrap color-desc">消息推送接口</span></label>
            <div class='col-sm-8'>
                <input type="text" name="wechat_appurl" required value="<?php echo url('@wechat/api.push/notify','',true,true); ?>" title="请输入公众号接口通知URL" placeholder="公众号接口通知URL（必填）" class="layui-input layui-bg-gray">
                <p class="help-block">公众号服务平台接口通知URL, 公众号消息接收与回复等。</p>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
    </div>


    <div data-api-type="thr" class="hide">
        <!--<?php if(!empty($wechat)): ?>-->
        <div class="row">
            <div class="col-sm-2 control-label">QRCode<br><span class="nowrap color-desc">公众号二维码</span></div>
            <div class="col-sm-10">
                <div class="pull-left notselect">
                    <img data-tips-image src="<?php echo htmlentities(local_image($wechat['qrcode_url'])); ?>" style="width:95px;margin-left:-10px">
                </div>
                <div class="pull-left padding-left-10">
                    <p class="margin-bottom-2 nowrap">微信昵称：<?php echo htmlentities($wechat['nick_name']); ?></p>
                    <p class="margin-bottom-2 nowrap">微信类型：<?php echo $wechat['service_type_info']==2 ? '服务号'  :  '订阅号'; ?> /
                        <?php echo $wechat['verify_type_info']==-1 ? '未认证'  :  '<span class="color-green">已认证</span>'; ?></p>
                    <p class="margin-bottom-2 nowrap">注册公司：<?php echo htmlentities($wechat['principal_name']); ?></p>
                    <p class=" nowrap">授权绑定：<?php echo htmlentities(format_datetime($wechat['create_at'])); ?></p>
                </div>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <!--<?php endif; ?>-->
        <div class="row form-group">
            <label class="col-sm-2 control-label">Authorize<br><span class="nowrap color-desc">公众号授权绑定</span></label>
            <div class="col-sm-8">
                <button type="button" data-href='<?php echo htmlentities($authurl); ?>' class='layui-btn layui-btn-primary'><?php echo !empty($wechat) ? '重新绑定公众号' : '立即绑定公众号'; ?></button>
                <p class="help-block">点击连接将跳转到微信第三方平台进行公众号授权。</p>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">AppId<br><span class="nowrap color-desc">公众号服务标识</span></label>
            <div class='col-sm-8'>
                <input type="text" name="wechat_thr_appid" required value="<?php echo htmlentities($appid); ?>" title="请输入以wx开头的18位公众号APPID" placeholder="公众号APPID（必填）" pattern="^wx[0-9a-z]{16}$" maxlength="18" class="layui-input">
                <p class="help-block">公众号 appid 通过微信第三方授权自动获取. 若没有值请进行微信第三方授权。</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">AppKey<br><span class="nowrap color-desc">第三方服务密钥</span></label>
            <div class='col-sm-8'>
                <input type="text" name="wechat_thr_appkey" required value="<?php echo htmlentities($appkey); ?>" title="请输入32位公众号AppSecret" placeholder="公众号AppSecret（必填）" maxlength="32" pattern="^[0-9a-z]{32}$" class="layui-input">
                <p class="help-block">公众号服务平台接口密钥, 通过微信第三方授权自动获取, 若没有值请进行微信第三方授权。</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">AppUri<br><span class="nowrap color-desc">第三方推送接口</span></label>
            <div class='col-sm-8'>
                <input type="text" name="wechat_thr_appurl" required value="<?php echo url('@wechat/api.push', '', true, true); ?>" title="请输入公众号接口通知URL" placeholder="公众号接口通知URL（必填）" class="layui-input layui-bg-gray">
                <p class="help-block">公众号服务平台接口通知URL, 公众号消息接收与回复等。</p>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
    </div>

    <div class="col-sm-6 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>

<script>
    $(function () {
        updateViwe();
        $('[name="wechat_type"]').on('click', updateViwe);

        function updateViwe() {
            var type = $('[name="wechat_type"]:checked').val();
            $('[data-api-type]').not($('[data-api-type="' + type + '"]').removeClass('hide')).addClass('hide');
        }
    });
</script>

</div>
</div>

<!-- 右则内容区域 结束 -->