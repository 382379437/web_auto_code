<?php

use service\DataService;
use service\NodeService;
use think\Db;

/**
 * 打印输出数据到文件
 * @param mixed $data 输出的数据
 * @param bool $force 强制替换
 * @param string|null $file
 */
function p($data, $force = false, $file = null)
{
    is_null($file) && $file = env('runtime_path') . date('Ymd') . '.txt';
    $str = (is_string($data) ? $data : (is_array($data) || is_object($data)) ? print_r($data, true) : var_export($data, true)) . PHP_EOL;
    $force ? file_put_contents($file, $str) : file_put_contents($file, $str, FILE_APPEND);
}

/**
 * RBAC节点权限验证
 * @param string $node
 * @return bool
 */
function auth($node)
{
    return NodeService::checkAuthNode($node);
}

/**
 * 设备或配置系统参数
 * @param string $name 参数名称
 * @param bool $value 默认是null为获取值，否则为更新
 * @return string|bool
 * @throws \think\Exception
 * @throws \think\exception\PDOException
 */
function sysconf($name, $value = null)
{
    static $config = [];
    if ($value !== null) {
        list($config, $data) = [[], ['name' => $name, 'value' => $value]];
        return DataService::save('SystemConfig', $data, 'name');
    }
    if (empty($config)) {
        $config = Db::name('SystemConfig')->column('name,value');
    }
    return isset($config[$name]) ? $config[$name] : '';
}

/**
 * 日期格式标准输出
 * @param string $datetime 输入日期
 * @param string $format 输出格式
 * @return false|string
 */
function format_datetime($datetime, $format = 'Y年m月d日 H:i:s')
{
    return date($format, strtotime($datetime));
}

/**
 * UTF8字符串加密
 * @param string $string
 * @return string
 */
function encode($string)
{
    list($chars, $length) = ['', strlen($string = iconv('utf-8', 'gbk', $string))];
    for ($i = 0; $i < $length; $i++) {
        $chars .= str_pad(base_convert(ord($string[$i]), 10, 36), 2, 0, 0);
    }
    return $chars;
}

/**
 * UTF8字符串解密
 * @param string $string
 * @return string
 */
function decode($string)
{
    $chars = '';
    foreach (str_split($string, 2) as $char) {
        $chars .= chr(intval(base_convert($char, 36, 10)));
    }
    return iconv('gbk', 'utf-8', $chars);
}

/**
 * 下载远程文件到本地
 * @param string $url 远程图片地址
 * @return string
 */
function local_image($url)
{
    return \service\FileService::download($url)['url'];
}

/**
 * description：获取表字段
 * author：wanghua
 * @param $tablename
 * @return array
 */
function getTableFieldsByName($tablename){
    if(!$tablename){
        return [];
    }
    return Db::name(config('database.prefix').ucfirst($tablename))->getTableFields();
}
/**
 * description：换行输出
 * author：wanghua
 */
function brEcho($msg){
    echo '<br/>';
    echo $msg;
    echo '<br/>';
}

/**
 * description：表单类型 1 input 2 select 3 radio 4 textarea 5 textarea_editer 6 img
 * author：wanghua
 * @param string $type
 * @param bool|false $all
 * @return array|string
 */
function getFormType($type='', $all=false){
    $arr = ['','input','date','select','radio','textarea','textarea_editer', 'img'];
    if($type){
        if(is_numeric($type)){
            return isset($arr[$type])?$arr[$type]:$type;
        }else{
            return $type;
        }
    }
    if($all){
        return $arr;
    }
    return '';
}

/**
 * description：获取字段类型
 * author：wh
 */
function getFieldsType($type='', $all=false){
    $arr = ['','int','float','varchar','text','longtext'];

    if($type){
        return empty($arr[$type])?$type:$arr[$type];
    }
    if($all){
        return $arr;
    }
    return $type;
}

/**
 * description：网站菜单列表
 * author：wh
 * @param $type
 * @param string $all
 * @return array
 */
function getMenuType($type, $all=''){
    $arr = [
        1=>'首页',
        2=>'关于我们',
        3=>'课程设置',
        4=>'招生信息',
        5=>'师资队伍',
        6=>'优秀学生',
        7=>'新闻资讯',
        8=>'联系我们'
    ];
    if($type){
        return empty($arr[$type])?$type:$arr[$type];
    }
    if($all){
        return $arr;
    }
    return $type;
}

/**
 * description：读取base64编码后的图片并保存到path
 * author：wh
 * @param $base64_image_content
 * @param $path
 * @return bool|string
 */
function base64_image_content($base64_image_content,$path){
    //匹配出图片的格式
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        $type = $result[2];
        $new_file = $path."/".date('Ymd',time())."/";
        if(!file_exists($new_file)){
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0777);
        }
        $new_file = $new_file.time().".{$type}";
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
            return '/'.$new_file;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/**
 * 验证手机号是否正确
 * @author wanghua
 */
function is_mobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,3,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}

/**
 * description：查询当前数据库所有的表名
 * author：wh
 * @return mixed
 */
function getTables(){
    return array_column(Db::query('SHOW TABLES;'), 'Tables_in_'.config('database.database'));
}

/**
 * description：根据表名获取数据
 * author：wh
 * @param $fieldsname 要查询的字段名， 切记必须 有as ID 和 as title字段
 * @param $param web_goods:参数1-1,参数2-2,...
 * @return array
 */
function getDataByTbName($form_val, $fieldsname=''){
    if(!$form_val){
        return [];
    }
    $valarr = explode(',', $form_val);
    if(empty($valarr[0]))return [];
    $tablename = $valarr[0];
    if(empty($valarr[1])){
        return [];
    }
    $param = $valarr[1];
    if(in_array($tablename, getTables())){
        $arr = explode(':', $param);
        if(empty($arr)){
            throw new \think\Exception('params parsed error by ":" 。');
        }
        $condition = [];
        foreach($arr as $k=>$v){
            $t = explode('-', $v);
            if(empty($t))continue;
            if(empty($t[0]))throw new \think\Exception('params parsed error by "-" 。');
            $condition[$t[0]] = $t[1];
        }
        try{
            return DB::name($tablename)->field($fieldsname)->where($condition)->select();
        }catch (\Exception $e){
            throw new \think\Exception($e.';'.$tablename.';'.json_encode($condition));
        }
    }
    return [];
}

/**
 * description：处理 form_value 字段为数组
 * author：wh
 */
function dealFormValueList($form_val, $fieldsname='id, title'){
    if(!$form_val){
        return [];
    }
    $valarr = explode(',', $form_val);
    if(empty($valarr[0]))return [];
    if(in_array($valarr[0], getTables())){

        return getDataByTbName($form_val, $fieldsname);
    }else{
        $r = [];
        foreach($valarr as $k => $v){
            $temp = [];
            $t = explode(':', $v);

            $temp['id'] = $t[0];
            $temp['title'] = $t[1];
            array_push($r, $temp);
        }
        return $r;
    }
}

function is_email($email){
   return preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)?true:false;
}

/**
 * description：删除目录下的文件：权限不足可能导致失败
 * author：wanghua
 * @param $backpath
 * @return bool
 */
function deleteFile($backpath=''){
    if(!$backpath || !file_exists($backpath))return false;
    $files = scandir($backpath);
    if($files){
        foreach ($files as $key => $val){
            if(!in_array($val, ['.', '..'])){
                unlink($backpath.$val);
            }
        }
        return true;
    }else{
        return false;
    }
}

if(!function_exists('log_to_write_txt')){
    /**
     * 记录日志到文本-日志文件可即时删除
     * wanghua
     * @param string $data
     * @param string $filepath
     */
    function log_to_write_txt($data = 'test', $filepath = '/runtime/log.txt'){
        //IP白名单-正式运营后可开启
        //$white_ips = [
        //    '183.67.48.137'
        //];
        //if(in_array(get_client_ip(), $white_ips)){
        $filepath = get_root_path().$filepath;
        $str = '';
        file_put_contents($filepath, is_object($data)||is_array($data)?$str.json_encode($data)."\n":$str.$data."\n", FILE_APPEND);
        //}else{
        //    file_put_contents($filepath, 'white_ips have not check success '."\n", FILE_APPEND);
        //}
    }
}
/**
 * description：二维对象数组转换为数组
 * author：wanghua
 */

if (!function_exists('objToArray')) {
    function objToArray($peoples){
        $tmp = [];
        foreach ($peoples as $k=>$v){
            $tmp[$k] = is_object($v)?$v->toArray():$v;
        }
        return $tmp;
    }
}

//将XML字符串转为array
if (!function_exists('xmlStrToArray')) {
    function xmlStrToArray($xml){
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }
}

/**
 * description：订单号
 * author：wanghua
 */
if (!function_exists('getOrderNo')) {
    function getOrderNo(){
        return time().session('user.userid').rand(10000,99999);
    }
}

/**
 * 输出xml字符
 * @throws WxPayException
 **/
if (!function_exists('toXml')) {
    function toXml($data){
        if(!is_array($data) || count($data) <= 0){
            throw new WxPayException("数组数据异常！");
        }

        $xml = "<xml>";
        foreach ($data as $key=>$val){
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
}
/**
 * description：返回xml 对象
 * author：wanghua
 * @param bool $res
 * @return string
 */
if (!function_exists('xmlResReturn')) {
    function xmlResReturn($res = true){
        $tmp_suc = $res?'SUCCESS':'FAIL';
        $tmp_ok = $res?'OK':'ERR';
        $xml = "<xml>
                      <return_code><![CDATA[{$tmp_suc}]]></return_code>
                      <return_msg><![CDATA[{$tmp_ok}]]></return_msg>
                    </xml>";

        return simplexml_load_string($xml);
    }
}

/**
 * XML编码
 * @param mixed $data 数据
 * @param string $encoding 数据编码
 * @param string $root 根节点名
 * @return string
 */
if (!function_exists('xml_encode')) {
    function xml_encode($data, $encoding='utf-8', $root='xml') {
        $xml    = '<?xml version="1.0" encoding="' . $encoding . '"?>';
        $xml   .= '<' . $root . '>';
        $xml   .= data_to_xml($data);
        $xml   .= '</' . $root . '>';
        return $xml;
    }
}

/**
 * 数据XML编码
 * @param mixed $data 数据
 * @return string
 */
if (!function_exists('data_to_xml')) {
    function data_to_xml($data) {
        $xml = '';
        foreach ($data as $key => $val) {
            is_numeric($key) && $key = "item id=\"$key\"";
            $xml    .=  "<$key>";
            $xml    .=  ( is_array($val) || is_object($val)) ? data_to_xml($val) : $val;
            list($key, ) = explode(' ', $key);
            $xml    .=  "</$key>";
        }
        return $xml;
    }
}

/**
 * description：设置结果
 * author：wanghua
 * @param int $code
 * @param string $msg
 * @param array $data
 * @param bool $is_return_json 是否返回json
 * @return array|string
 */
if (!function_exists('set_res')) {
    function set_res($code = 0, $msg = '', $data = [], $is_return_json = false){
        $r = ['code' => $code, 'msg' => $msg, 'data'=>$data];
        return $is_return_json?json_encode($r):$r;
    }
}

/**
 * description：curl请求（整理至微信jsapi）
 * author：wanghua
 * @param $url
 * @return mixed
 */
if (!function_exists('req_url')) {
    function req_url($url){
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);//$this->curl_timeout
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //使用代理抓取内容
        //if(\WxPayConfig::CURL_PROXY_HOST != "0.0.0.0"
        //    && \WxPayConfig::CURL_PROXY_PORT != 0){
        //    curl_setopt($ch,CURLOPT_PROXY, '0.0.0.0');
        //    curl_setopt($ch,CURLOPT_PROXYPORT, 0);
        //}
        //运行curl，结果以jason形式返回
        $res = curl_exec($ch);
        curl_close($ch);
        //取出openid
        return json_decode($res,true);
    }
}

if (!function_exists('rand_str')) {
    /**
     * 生成随机字符串
     * @param int $length 生成长度
     * @param int $type 生成类型：0-小写字母+数字，1-小写字母，2-大写字母，
     * 3-数字，4-小写+大写字母，5-小写+大写+数字
     * @return string
     */
    function rand_str($length = 8, $type = 0) {
        $a = 'abcdefghijklmnopqrstuvwxyz';
        $A = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $n = '0123456789';

        switch ($type) {
            case 1: $chars = $a; break;
            case 2: $chars = $A; break;
            case 3: $chars = $n; break;
            case 4: $chars = $a.$A; break;
            case 5: $chars = $a.$A.$n; break;
            default: $chars = $a.$n;
        }

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $str;
    }
}