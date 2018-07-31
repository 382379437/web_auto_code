/**
 * Created by Administrator on 2018/4/26.
 */
/**
 * 验证身份证
 * @param card
 * @returns {boolean}
 */
function isCardNo(card) {
    var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    return pattern.test(card);
}

/**
 * 回车键按下确认
 */
function enterKeydown(ele_id){
    if (event.keyCode==13){
        document.getElementById(ele_id).click();
    }
}
/**
 * 判断是否获得焦点
 */
var foucsLogin = function(){
    var act = document.activeElement.id;
    if(act=="checked_code_login" ){
        alert("获取焦点了");
    }
    else{
        alert("没有获取焦点");
    }
}
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
var loadBirthday = function(eleyear, elemonth, eleday){
    //一起加载
    getyear(eleyear);

    getmonth(elemonth);

    getday(eleday, $(eleyear).val(), $(elemonth).val());
}


/**
 * 年份-前60年【可扩展】-自制时间控件-时间级联
 * @param ele
 * @returns {*[]}
 */
var getyear = function (ele) {
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
}
/**
 * 月份
 * @param ele
 * @returns {Array}
 */
var getmonth = function(ele){

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
}

/**
 * 天
 * @param ele
 * @param y
 * @param m
 * @returns {Array}
 */
var getday = function(ele, y, m){
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
}

/**
 * 表单提交前检查生日(获取三个select的值，检查是否合法，然后验证检查结果)
 * @param eleyear
 * @param elemonth
 * @param eleday
 * @returns {boolean}
 */
var checkBirthday = function(eleyear, elemonth, eleday){
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
}

/**
 * 简单身份证验证
 * @param card
 * @returns {boolean}
 */
var isCardNo = function (card) {
    var pattern = /(^\d{15}$)|(^\d{17}([0-9]|X|x)$)/;
    return pattern.test(card);
}


//时间控件
Date.prototype.pattern=function(fmt) {
    var o = {
        "M+" : this.getMonth()+1, //月份
        "d+" : this.getDate(), //日
        "h+" : this.getHours()%12 == 0 ? 12 : this.getHours()%12, //小时
        "H+" : this.getHours(), //小时
        "m+" : this.getMinutes(), //分
        "s+" : this.getSeconds(), //秒
        "q+" : Math.floor((this.getMonth()+3)/3), //季度
        "S" : this.getMilliseconds() //毫秒
    };
    var week = {
        "0" : "/u65e5",
        "1" : "/u4e00",
        "2" : "/u4e8c",
        "3" : "/u4e09",
        "4" : "/u56db",
        "5" : "/u4e94",
        "6" : "/u516d"
    };
    if(/(y+)/.test(fmt)){
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));
    }
    if(/(E+)/.test(fmt)){
        fmt=fmt.replace(RegExp.$1, ((RegExp.$1.length>1) ? (RegExp.$1.length>2 ? "/u661f/u671f" : "/u5468") : "")+week[this.getDay()+""]);
    }
    for(var k in o){
        if(new RegExp("("+ k +")").test(fmt)){
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));
        }
    }
    return fmt;
}



//公共搜索
var toSearchInfo = function (obj, url) {
    var txt = $(obj).parent().children('.search').val()
    location.href = url+"/title/"+txt;
}

//验证手机
function isMobile(mobile){
    var mobreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
    return mobreg.test(mobile)
}

//按钮或label显示倒计时60s并动态计时
var oldtxt = '';
function countDown(obj){
    var num = 60;
    oldtxt = $(obj).val();
    $(obj).attr('disabled',true);
    var index = setInterval(function () {
        if(num <= 0){
            clearInterval(index);
            $(obj).removeAttr('disabled');
            $(obj).val(oldtxt);
            return;
        }
        num -= 1;
        $(obj).val(num+'s');
    },1000)
}

//加载省市区
function loadProv(url){
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
}

function getCity(url){
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
}

function getArea(url){
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
}

/**
 * 公共表单提交 - 依赖H-ui.js
 * @param formObj form对象
 * @param flushType 刷新方式
 * @param url 跳转
 */
function commonFormSubmit(formObj, flushType, url){
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
}