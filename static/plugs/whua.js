/**
 * [公共]获取url参数，返回指定|所有参数
 * @param {Object} k 根据键获取值
 * @param {Object} v 修改键的值
 */
var getParam = function(k, v){
	var p = location.search;//参数带？
	var sp = p.substr(1, p.length).split('&');
	var arr_obj = {};
	for(var i=0; i<sp.length; i++){
		arr_obj[sp[i].split('=')[0]] = sp[i].split('=')[1];
	}
	if(k){
		if(v){
			arr_obj[k] = v;
		}else{
			return arr_obj[k];
		}
	}
	return arr_obj;	
};

/**
 * [公共]根据class获取元素
 * @param {Object} cls
 */
var getClass = function(cls){
	var o = document.getElementsByClassName(cls);
	if(o.length == 1){
		return o[0];
	}
	return o;
};
/**
 * 
 *添加：节点.classList.add("类名");
 * [公共]为元素添加class
 * @param {Object} cls
 * @param {Object} cn
 */
var addClass = function(cls,cn){
	var o = getClass(cls);
	if(o.length > 1){
		for(var i=0; i<o.length; i++){
			o[i].classList.add(cn);
		}
	}else{
		o.classList.add(cn);
	}
	return o;
};

/**
 * 
 * [公共]删除class：节点.classList.remove("类名");
 * @param {Object} cls
 * @param {Object} cn
 */
var delClass = function(cls, cn){
	var o = getClass(cls);
	if(o.length > 1){
		for(var i=0; i<o.length; i++){
			o[i].classList.remove(cn);
		}
	}else{
		o.classList.remove(cn);
	}
	return o;
};

/**
 * [公共]元素显示-(class)
 * @param {Object} cls
 */
var showIn = function(cls){
	var o = document.getElementsByClassName(cls);
	if(o.length > 1){
		for(var i=0; i<o.length; i++){
			o[0].style.display = 'inherit';
		}
	}else{
		o[0].style.display = 'inherit';
	}
	return o;
};
/**
 * [公共]元素隐藏-(class)
 * @param {Object} cls
 */
var showOut = function(cls){
	var o = document.getElementsByClassName(cls);
	if(o.length > 1){
		for(var i=0; i<o.length; i++){
			o[0].style.display = 'none';
		}
	}else{
		o[0].style.display = 'none';
	}
    return o;
};

window.wh = {
    test:function (o) {
        console.log(o);
    },
    /**
     * [公共]元素隐藏-(class)
     * @param {Object} cls
     */
    showOut:function(cls){
        var o = document.getElementsByClassName(cls);
        if(o.length > 1){
            for(var i=0; i<o.length; i++){
                o[0].style.display = 'none';
            }
        }else{
            o[0].style.display = 'none';
        }
        return o;
    },
    /**
     * [公共]元素显示-(class)
     * @param {Object} cls
     */
    showIn : function(cls){
        var o = document.getElementsByClassName(cls);
        if(o.length > 1){
            for(var i=0; i<o.length; i++){
                o[0].style.display = 'inherit';
            }
        }else{
            o[0].style.display = 'inherit';
        }
        return o;
    },
    /**
     * [公共]删除class：节点.classList.remove("类名");
     * @param {Object} cls
     * @param {Object} cn
     */
    delClass : function(cls, cn){
        var o = getClass(cls);
        if(o.length > 1){
            for(var i=0; i<o.length; i++){
                o[i].classList.remove(cn);
            }
        }else{
            o.classList.remove(cn);
        }
        return o;
    },
    /**
     *
     *添加：节点.classList.add("类名");
     * [公共]为元素添加class
     * @param {Object} cls
     * @param {Object} cn
     */
    addClass : function(cls,cn){
        var o = getClass(cls);
        if(o.length > 1){
            for(var i=0; i<o.length; i++){
                o[i].classList.add(cn);
            }
        }else{
            o.classList.add(cn);
        }
        return o;
    },
    /**
     * [公共]根据class获取元素
     * @param {Object} cls
     */
    getEleCls : function(ele){
        var o = document.getElementsByClassName(ele);
        if(o.length == 1){
            return o[0];
        }
        return o;
    },
    /**
	 * [公共]根据 id 获取元素
     * @param cls
     * @returns {*}
     */
    getEleId : function(ele){
        var o = document.getElementById(ele);
        if(o.length == 1){
            return o[0];
        }
        return o;
    },
    /**
     * [公共]获取url参数，返回指定|所有参数
     * @param {Object} k 根据键获取值
     * @param {Object} v 修改键的值
     */
    getParam : function(k, v){
        var p = location.search;//参数带？
        var sp = p.substr(1, p.length).split('&');
        var arr_obj = {};
        for(var i=0; i<sp.length; i++){
            arr_obj[sp[i].split('=')[0]] = sp[i].split('=')[1];
        }
        if(k){
            if(v){
                arr_obj[k] = v;
            }else{
                return arr_obj[k];
            }
        }
        return arr_obj;
    },
    /**
     * 消息提示
     * @param ele
     * @param msg
     * @param fadein_time
     * @param is_open
     */
    message: function (ele, msg, fadein_time, is_open) {
        var html = '<style>.msgdrag{\n' +
            '            display: none;\n' +
            '            margin: 0 auto;\n' +
            '            width: 300px;\n' +
            '            height: 50px;\n' +
            '            line-height: 50px;\n' +
            '            color: green;\n' +
            '            background-color: gainsboro;\n' +
            '            position: fixed;\n' +
            '            top: 20px;\n' +
            '            text-align: center;\n' +
            '            left: 45%;\n' +
            '        }</style><div class="msgdrag" >\n' +
            '\n' +
            '</div>';
        $('body').append(html);
        $(ele).html(msg);
        $(ele).fadeIn(fadein_time);
        if(!is_open)
            setTimeout(function (args) {
                $(ele).fadeOut(500)
            }, 2000);
    },
    msg:function (msg, options) {
        if(options){

        }
        else{

        }
        //背景弹层
        var msgdivbg = '<div class="msgdivbg" style="display:none; opacity: 0.8;position: fixed;top:0;width: 100%;height: 100%;background-color: rgb(102,103,114);"></div>';

        var msgdiv = '<div class="msgdiv" style="width: 70%;height: 80px;position: fixed;top: 35%;background-color: white;">' +
            '<div>提示</div>' +
            '<div style="width: 100%;text-align: center;">'+msg+'</div>'+
            '</div>';

        var doc = document.querySelector('body');
        doc.appendChild(msgdivbg);
        doc.appendChild(msgdiv);

    },
    /**
     * Created by Administrator on 2018/4/26.
     */
    /**
     * 验证身份证
     * @param card
     * @returns {boolean}
     */
    isCardNo : function(card) {
        var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
        return pattern.test(card);
    },
    /**
     * 验证手机
     * @param mobile
     * @returns {*|boolean}
     */
    isMobile:function(mobile){
        var mobreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
        return mobreg.test(mobile)
    },
    /**
     * 回车键按下确认
     */
    enterKeydown: function(ele){
        if (event.keyCode == 13){
            $(ele).submit();
        }
    },
    /**
     * 判断是否获得焦点
     */
    foucsLogin : function(){
        var act = document.activeElement.id;
        if(act=="checked_code_login" ){
            alert("获取焦点了");
        }
        else{
            alert("没有获取焦点");
        }
    },
    /**
     * 加载生日组件 默认加载生日组件 注意：控件页面元素class 需要在select元素上定义,且与该控件参数一致（一共需要定义3个class）
     *
     * 使用方法：
     * 默认加载生日组件 注意：控件页面元素class 需要在select元素上定义,且与该控件参数一致（一共需要定义3个class）
     * loadBirthday('.jedate-year', '.jedate-month', '.jedate-day');
     * $('.jedate-month').on('change', function () {
 *            loadBirthday('.jedate-year', '.jedate-month', '.jedate-day');
 *        })
     * @param eleyear
     * @param elemonth
     * @param eleday
     */
    loadBirthday : function(eleyear, elemonth, eleday){
        //一起加载
        getyear(eleyear);

        getmonth(elemonth);

        getday(eleday, $(eleyear).val(), $(elemonth).val());
    },
    /**
     * 年份-前60年【可扩展】-自制时间控件-时间级联
     * @param ele
     * @returns {*[]}
     */
    getyear : function (ele) {
        var d = new Date();
        var y = d.getFullYear() ;
        var arr = [y];
        //未来年份
        //for (var i=0; i<10; i++){
        //    arr.unshift(y+=1);
        //}

        //历史年份
        y = d.getFullYear() ;
        for (var i=0; i<70; i++){
            arr.push(y-=1);
        }

        var str = '';
        for (var i=0; i<arr.length; i++){

            str+='<option value="'+arr[i]+'">'+arr[i]+'</option>';
        }

        if(ele){
            $(ele).append(str);
        }
        return arr;
    },
    /**
     * 月份
     * @param ele
     * @returns {Array}
     */
    getmonth : function(ele){

        var arr = [];
        for (var i=1; i<=12; i++){
            arr.push(i);
        }

        var str = '';
        for (var i=0; i<arr.length; i++){
            str+='<option value="'+arr[i]+'">'+arr[i]+'</option>';
        }

        if(ele){
            $(ele).append(str);
        }
        return arr;
    },
    /**
     * 天
     * @param ele
     * @param y
     * @param m
     * @returns {Array}
     */
    getday : function(ele, y, m){
        var sj = 31;
        if(y && m){
            var day = new Date(y, m,0);
            sj = day.getDate();//一月最大天数
        }
        var arr = [];
        for (var i=1; i<=sj; i++){
            arr.push(i);
        }

        var str = '';
        for (var i=0; i<arr.length; i++){
            str+='<option value="'+arr[i]+'">'+arr[i]+'</option>';
        }

        if(ele){
            $(ele).append(str);
        }
        return arr;
    },
    /**
     * 表单提交前检查生日(获取三个select的值，检查是否合法，然后验证检查结果)
     * @param eleyear
     * @param elemonth
     * @param eleday
     * @returns {boolean}
     */
    checkBirthday : function(eleyear, elemonth, eleday){
        var y = $(eleyear).val();
        var m = $(elemonth).val();
        var d = $(eleday).val();
        if(y && m && d){
            var day = new Date(y, m,0);
            day = day.getDate();//一月最大天数
            if(d > day){
                layer.msg(m+'月不能大于'+day+'天');
                return false;
            }
        }
        return true;
    },
    /**
     * [公共搜索] 参数用 / 替换 eg：/index/user/login/id/6/name/andy
     * @param obj
     * @param name
     * @param url
     */
    pubSearch : function (obj, name, url) {
        var txt = $(obj).parent().children('.search').val();
        location.href = url+"/"+name+"/"+txt;
    },
    /**
     * 按钮显示倒计时60s并动态计时
     * @param obj
     */
    countDown : function(obj){
        var num = 60;
        $(obj).attr('oldtxt', $(obj).val());//保存按钮原文本

        $(obj).attr('disabled',true);
        var index = setInterval(function () {
            if(num <= 0){
                clearInterval(index);
                $(obj).removeAttr('disabled');
                $(obj).attr('oldtxt', $(obj).attr('oldtxt'));
                return;
            }
            num -= 1;
            $(obj).val(num+'s');
        },1000)
    },
    /**
     * 加载省市区
     * @param url
     */
    loadProv : function(url){
        $.get(url,{}, function (res) {
            if(res){
                var str = '<option value="">--请选择--</option>';
                for (var i=0; i<res.length; i++){
                    str+='<option value="'+res[i]['area_id']+'">'+res[i]['area_name']+'</option>';
                }
                $('select[name="province"]').html('');
                $('select[name="province"]').html(str);
            }
        },'json');
    },
    /**
     * 加载市
     * @param url
     */
    getCity : function(url){
        var id = $('select[name="province"]').val();
        $.get(url,{id:id}, function (res) {
            if(res){
                var str = '<option value="">--请选择--</option>';
                for (var i=0; i<res.length; i++){
                    str+='<option value="'+res[i]['area_id']+'">'+res[i]['area_name']+'</option>';
                }
                $('select[name="city"]').html('');
                $('select[name="city"]').html(str);
            }
        },'json');
    },
    /**
     * 加载区
     * @param url
     */
    getArea : function(url){
        var id = $('select[name="city"]').val();
        $.get(url,{id:id}, function (res) {
            if(res){
                var str = '<option value="">--请选择--</option>';
                for (var i=0; i<res.length; i++){
                    str+='<option value="'+res[i]['area_id']+'">'+res[i]['area_name']+'</option>';
                }
                $('select[name="area"]').html('');
                $('select[name="area"]').html(str);
            }
        },'json');
    },
    /**
     * 公共表单提交 - 依赖H-ui.js
     * @param formObj form对象
     * @param flushType 刷新方式
     * @param url 跳转
     */
    commonFormSubmit : function(formObj, flushType, url){
        $(formObj).ajaxSubmit(function (res) {
            layer.msg(res.msg,{}, function () {
                if(flushType == 1){
                    //刷新当前页
                    location.reload();return;
                }
                if(flushType == 2){
                    //父级窗口连带刷新
                    window.parent.location.reload();return;
                }
                if(flushType == 3){
                    //跳转url
                    location.href = url;
                }
            });
        });
    },
    /**
	 * [公共]表单验证
     * @param form
     * @returns {boolean}
     */
	validate:function (form) {
	    var r = true;
        $(form).find('*').each(function (k, o) {
            var ele_val = $(o).val();
            var attr = $(o).attr('data-validate');
            if(attr){
                $(o).addClass('tips_'+k);//临时class
                var ele = '.tips_'+k;
                if(attr == 'require'){
                    if(ele_val == ''){
                        wh.tips('这里必须哦', ele);//根据临时class处理后续css逻辑
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;//退出循环
                    }
                }else if(attr == 'mobile'){
                    if(false === wh.isMobile(ele_val)){
                        wh.tips('这里是手机号哦', ele);
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;
                    }

                }else if(attr == 'number'){
                    if(false === /^\d*$/.test(ele_val)){
                        wh.tips('这里是数字哦', ele);
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;
                    }
                }else if(attr == 'birthday'){
                    //todo ...

                }else if(attr == 'date'){
					//验证日期格式
					//todo...

                }else if(attr == 'email'){
                    if(false === wh.isEmail(ele_val)){
                        wh.tips('这里是邮箱哦', ele);
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;
                    }
                }else if(attr == 'txtnum'){
                    //字母+数字
                    if(false === wh.isTxtNum(ele_val)){
                        wh.tips('这里是字母和（或）数字哦', ele);
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;
                    }
                }else if(attr == 'card'){
                    if(false === wh.isCardNo(ele_val)){
                        wh.tips('这里是身份证哦', ele);
                        wh.blur(o, ele);
                        r = false;//指定返回结果
                        return false;
                    }
                }
            }
        });
        return r;
    },
    /**
     * 自写验证邮箱
     * @param p
     * @returns {*|boolean}
     */
    isEmail:function (p) {
        return /^([A-Z|a-z|0-9|\D]*)@([a-z|A-Z|0-9]*).[a-z|A-Z]*$/.test(p);
    },
    /**
     * 检查是否是字母或（和）数字
     * @param p
     * @param type 为 true 则包含特殊字符 否则不包含
     * @returns {*|boolean}
     */
    isTxtNum:function (p, type) {

        return type?/^[A-Z|a-z|0-9]|[.~@#%&_-]+$/.test(p):/^([A-Z|a-z|0-9])+$/.test(p);
    },
    //提示
	tips:function (msg, ele) {
        layer.tips(msg, ele);
        $(ele).css({'border':'1px solid red'});
    },
    //失去焦点提示
    blur:function (o, ele) {
        $(o).bind('blur',function () {
            //元素警告样式
            if($(ele).val()!='')$(ele).css({'border':0});
            else {
                wh.tips('这里必须哦', ele);
                $(ele).css({'border':'1px solid red'});
            }
        });
    },
    /**
     * 设置cookie
     **/
    setCookie : function(key, val){
        document.cookie = key+'='+encodeURIComponent(val);
        return true;
    },
    /**
     * 将
     * key=val;key1=val1
     * key=val&key1=val1
     * 格式的字符串转换为二维数组
     **/
    changeUri : function(uri, str){
        if(!str)str = ';';//拆分符号
        var spl_arr = uri.split(str);

        var res_arr = [];//存储结果
        for(var i=0; i<spl_arr.length; i++){
            var tmparr = spl_arr[i].split('=');
            res_arr[i] = tmparr;
        }
        return res_arr;
    },
    /**
     * 获取cookie[仅返回有效数据]
     **/
    getCookie : function(key){
        //假设存储格式是：key=val;key1=val1
        var cook_arr = document.cookie.split(';');

        //验证一下,没有值就返回false，不进入下一个流程
        if(!cook_arr)return false;

        var res_arr = [];//存储解析结果
        for(var i=0; i<cook_arr.length; i++){
            //这里要再解析一次
            var arr = cook_arr[i].split('=');
            //这里表示满足key=val格式
            if(arr && arr.length==2)res_arr.push ([arr[0].trim(),decodeURIComponent(arr[1].trim())]);//存储
        }
        if(key){
            for(var j=0; j<res_arr.length; j++){
                if(key == res_arr[j][0])return res_arr[j][1];//返回正确val
            }
        }else{
            return res_arr;//key不存在就返回所有，有时候还是想看看所有的值
        }
        //默认返回false 表示没有取到值
        return false;
    }
};