<?php

namespace app\admin\controller;


use controller\BasicAdmin;
use service\DataService;
use think\Db;
use think\Exception;


class Autocode extends BasicAdmin
{
    public $table = 'WebAutoCode';//指定当前数据表
    protected $defFix = 'web_';//默认前缀
    protected $defModule = 'websit';//默认模块 eg: admin、goods 不能与现有模块重复
    protected $defControlDir = 'controller';//默认控制器目录 eg：home

    /**
     * description：列表
     * author：wanghua
     * @return array|string
     */
    function index(){
        $this->title = '添加控制器数据';
        list($get, $db) = [$this->request->get(), Db::name($this->table)];
        foreach (['title', 'phone', 'mail'] as $key) {
            (isset($get[$key]) && $get[$key] !== '') && $db->whereLike($key, "%{$get[$key]}%");
        }

        return parent::_list($db->order('id desc')->where(['is_deleted' => '0']));
    }
    /**
     * 仅添加控制器数据
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function add()
    {

        return $this->_form($this->table, 'form');
    }

    /**
     * 编辑（更新控制器数据且创建控制器文件）
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function edit()
    {
        if(request()->post()){
            $c = input('controller');
            $title = input('title');
            $dbname = input('dbname');
            if(!$c || !$title || !$dbname){
                $this->error('参数错误');
            }
            $this->createControllerCode($c, $title, $dbname);
        }
        return $this->_form($this->table, 'form');
    }
    /**
     * 删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (in_array('10000', explode(',', $this->request->post('id')))) {
            $this->error('系统超级账号禁止删除！');
        }
        if (DataService::update($this->table)) {
            $this->success("删除成功！提示：需手动删除类、视图文件和表字段", '', '',10);
        }
        $this->error("删除失败，请稍候再试！");
    }

    /**
     * description：处理表名
     * author：wanghua
     * @param $dbname
     */
    protected function dealdbname($dbname){
        $arr = explode('_', $dbname);
        $str = '';
        foreach ($arr as $k=>$v){
            $str.=ucfirst($v);
        }
        return $str;
    }

    /**
     * description：创建默认模块目录
     * author：wanghua
     */
    protected function createModuleDir(){
        if($this->defModule != 'admin' || $this->defControlDir != 'controller'){
            $file = ROOT_PATH_PRO.'/application/'.$this->defModule.'/'.$this->defControlDir;
            if(!file_exists($file))mkdir($file,0777,true);
        }
    }
    /**
     * description：创建控制器文件
     * author：wanghua
     * @param $control
     * @param $title
     * @param $dbname
     */
    function createControllerCode($control, $title, $dbname){
        //处理默认前缀
        $fix = substr(ucfirst($this->defFix), 0, strlen(ucfirst($this->defFix))-1);
        //默认指定表名
        $mytable = $fix.$this->dealdbname($dbname);
        //处理控制器名
        $control = ucfirst($control);
        //检测并创建默认模块和控制器
        $this->createModuleDir();
        //搜索项
        $search_fields = Db::name('WebAutoCodeFields')->where(['dbname'=>$dbname, 'is_search'=>1,'is_deleted'=>0])->select();
        if(!$search_fields){$search_fields=[];}
        else{$search_fields = array_column($search_fields, 'fields_name');}

        $str = "<?php

namespace app\\{$this->defModule}\\{$this->defControlDir};

use controller\\BasicAdmin;
use service\\DataService;
use think\\Db;

class $control extends BasicAdmin
{
    /**
     * 指定当前数据表
     */".'
    public $table '."= '$mytable';

    /**
     * description：列表
     */
    function index(){

        ".'$this->title = "'.$title.'";
        list($get, $db) = [$this->request->get(), Db::name($this->table)];
        foreach (explode(",","'.implode(',', $search_fields).'") as $key) {
            if(isset($get[$key."_start"]) && $get[$key."_start"] !== \'\'){
                $db->where($key, ">=", $get["{$key}_start"]);
                $db->where($key, "<=", $get["{$key}_end"]);
            }else{
                (isset($get[$key]) && $get[$key] !== \'\') && $db->whereLike($key, "%{$get[$key]}%");
            }
        }
        $info = Db::name(\'WebAutoCodeFields\')->where([\'dbname\'=>"'.$dbname.'", \'is_deleted\'=>0])->select();
        $this->assign(\'infofields\', $info);

        $search_fields = Db::name(\'WebAutoCodeFields\')->where([\'dbname\'=>"'.$dbname.'", \'is_search\'=>1, \'is_deleted\'=>0])->select();
        $this->assign(\'search_fields\', $search_fields);
        $this->assign(\'input\', input());
        return parent::_list($db->where([\'is_deleted\' => \'0\']));
        '.'
    }
    /**
     * 添加
     */
    public function add()
    {
        //根据ID排序，先添加的显示在前
        $edit_fields = Db::name(\'WebAutoCodeFields\')->order("id asc")->where([\'dbname\'=>"'.$dbname.'", \'is_deleted\'=>0])->select();
        $this->assign(\'edit_fields\', $edit_fields);
        '.'return $this->_form($this->table, \'form\');'.'
    }

    /**
     * 编辑
     */
    public function edit()
    {
        //根据ID排序，先添加的显示在前
        $edit_fields = Db::name("WebAutoCodeFields")->order("id asc")->where(["dbname"=>"'.$dbname.'", "is_deleted"=>0])->select();
        $this->assign("edit_fields", $edit_fields);
        '.'return $this->_form($this->table, \'form\');'."
    }
    /**
     * 删除
     */
    public function del()
    {
        ".'
        if (in_array(\'10000\', explode(\',\', $this->request->post(\'id\')))) {
            $this->error(\'系统超级账号禁止删除！\');
        }
        if (DataService::update($this->table)) {
            $this->success(\'删除成功！\', \'\');
        }
        $this->error(\'删除失败，请稍候再试！\');
        '."
    }
}";

        $file = ROOT_PATH_PRO.'/application/'.$this->defModule.'/'.$this->defControlDir;

        if(!file_exists($file)){
            mkdir($file,0777,true);
        }
        if(!file_exists($file)){
            $this->error('文件夹创建失败');
        }
        $file = $file.'/'.ucfirst($control).'.php';

        file_put_contents($file, $str);
    }

//===================================我是分割线=========================================

    //字段表管理
    function indexview(){
        $table = 'WebAutoCodeFields';
        $this->title = '创建表和字段';

        list($get, $db) = [$this->request->get(), Db::name($table)];

        foreach (['title', 'dbname', 'mail'] as $key) {
            (isset($get[$key]) && $get[$key] !== '') && $db->whereLike($key, "%{$get[$key]}%");
        }
        return parent::_list($db->order('id desc')->where(['is_deleted' => '0']));
    }


    function addview(){
        $table = 'WebAutoCodeFields';
        $fields_info = Db::name('WebAutoCode')->order('id desc')->where(['is_deleted'=>0])->select();
        $this->assign('fields_info', $fields_info);
        return $this->_form($table, 'formview');
    }
    public function editview(){
        $table = 'WebAutoCodeFields';
        $fields_info = Db::name('WebAutoCode')->order('id desc')->where(['is_deleted'=>0])->select();
        $this->assign('fields_info', $fields_info);

        //编辑字段时要同步更新对应表字段
        if(request()->isPost()){
            $post = input();
            $tbl_fields = Db::name('Web'.ucfirst(input('dbname')))->getTableFields();

            //更新
            $def = $post['default'];
            if($post['default'] === "" || is_null($post['default'])){
                $def = "'"."'";
            }
            if($def === "0"){
                $def == $def;
            }
            if($def === "0" && in_array(strtolower($post['type']), ['int', 'bigint', 'tinyint', 'smallint',
                    'mediumint', 'integer', 'double', 'float', 'decimal', 'numeric', 'date', 'time'
                ])){
                $def = 0;
            }
            $tb = 'web_'.input('dbname');

            if(in_array($post['fields_name'], $tbl_fields)){
                $sql = "ALTER TABLE {$tb} MODIFY COLUMN {$post['fields_name']} {$post['type']} ({$post['size']}) DEFAULT {$def} COMMENT '{$post['title']}';";
            }else{
                //添加
                $sql = "ALTER TABLE {$tb} ADD COLUMN {$post['fields_name']} {$post['type']} ({$post['size']}) DEFAULT {$def} COMMENT '{$post['title']}';";
            }
            try{
                Db::execute($sql);
            }catch (\Exception $e){
                $this->error('alter table had an err ,错误:'.$sql.','.$e->getMessage());
            }
        }

        return $this->_form($table, 'formview');
    }
    public function delview()
    {
        $table = 'WebAutoCodeFields';
        if (in_array('10000', explode(',', $this->request->post('id')))) {
            $this->error('系统超级账号禁止删除！');
        }
        if (DataService::update($table)) {
            $this->success("删除成功！", '');
        }
        $this->error("删除失败，请稍候再试！");
    }

    /**
     * description：创建表
     * 提示：当创建完新的字段之后需要自动再次更新控制器，以便于完成搜索等功能的实现
     * author：wanghua
     */
    function createtable(){
        $id = input('id/d');
        if(!$id){
            $this->error('id错误');
        }
        $table = Db::name('WebAutoCodeFields')->where(['id'=>$id])->find();
        $table_name = $table['dbname'];
        $control_name = ucfirst($table_name);
        if(empty($table_name)){
            $this->error('表名空');
        }
        //处理名字
        $table_name = $this->defFix.$table_name;
        //验证表存在
        //$exits_table = "show tables like '{$table_name}";
        //if(Db::query($exits_table)){
        //    $this->error('表已存在，不需再次创建');
        //}
        //创建
        $sql = "CREATE TABLE IF NOT EXISTS {$table_name}(
		id int(11) NOT NULL AUTO_INCREMENT,is_deleted int(2) DEFAULT 0,
		PRIMARY key(id))";
        if(false === Db::name('WebAutoCodeFields')->execute($sql)){
            echo $sql;
            $this->error('表名创建失败', '', '', 60);
        }

        //新增字段
        $dec_num = '';
        if(in_array(strtoupper($table['type']), ['TINYINT','SMALLINT','MEDIUMINT','INT','BIGINT','FLOAT','DOUBLE','DECIMAL'])){
            $table['default'] = '0';//整型默认值 浮点类型自动转为0.00
            if(in_array(strtoupper($table['type']), ['FLOAT','DOUBLE','DECIMAL'])){
                $dec_num = ','.$table['decimals_size'];//浮点类型小数位位数
            }
        }else{
            $table['default'] = '""';
        }
        //验证字段是否存在
        $f = Db::name($table_name)->getTableFields();
       if(in_array($table['fields_name'], $f)){
           $sql2 = "alter table {$table_name} MODIFY COLUMN {$table['fields_name']} {$table['type']}(".$table['size'].$dec_num.") DEFAULT {$table['default']} COMMENT '{$table['title']}';";
       }else{
           $sql2 = "alter table {$table_name} add COLUMN {$table['fields_name']} {$table['type']}(".$table['size'].$dec_num.") DEFAULT {$table['default']} COMMENT '{$table['title']}';";
       }

        Db::name('WebAutoCodeFields')->execute($sql2);

        //更新控制器
        $control_title = Db::name('WebAutoCode')->field('title')->where(['is_deleted'=>0, 'controller'=>$control_name])->find();
        if(!$control_title){
            $this->error('控制器名称不存在');
        }
        $this->createControllerCode($control_name, $control_title['title'], $table['dbname']);
        $this->success('ok');
    }

    /**
     * description：准备创建视图
     * author：wanghua
     * @return mixed
     */
    function createview(){
        $table = 'WebAutoCode';

        //查询需要创建的表(控制器)对应的视图
        $info = Db::name($table)->order('id desc')->where(['is_deleted'=>0])->select();

        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * description：获取字段信息
     * author：wanghua
     */
    function getFields(){
        $dbname = input('dbname');
        if(!$dbname){
            $this->error('错误');
        }
        $info = Db::name('WebAutoCodeFields')->where(['dbname'=>$dbname,'is_deleted'=>0])->select();
        $this->success('ok','',$info);
    }

    /**
     * description：立即生成视图
     * author：wanghua
     * @return mixed
     */
    function nowtogocreate(){
        if(!input('data')){
            $this->error('错误');
        }
        $data = explode('&',input('data'));
        $d = [];
        foreach($data as $k=>$v){
            $temp = explode('=', $v);
            $d[$temp[0]] = $temp[1];
        }
        if(empty($d['dbname']) || empty($d['type'])){
            $this->error('参数不完整');
        }
        $dbname = $d['dbname'];
        $type = $d['type'];
        if(!$dbname || !$type)$this->error('错误');
        $this->assign('title', Db::name('WebAutoCode')->where(['dbname'=>$dbname, 'is_deleted'=>0])->find()['title']);
        $this->assign('type',$type);

        if($type == 1){
            return $this->fetch('templateindex');
        }else{
            return $this->fetch('templateform');
        }
    }

    /**
     * description：生成视图模板文件
     * author：wanghua
     */
    function toviewfiletemp(){

        $view_name = input('view_name');
        $view_type = input('view_type');

        if(!$view_name || !$view_type)$this->error('参数错误');

        //创建视图位置
        $path = ROOT_PATH_PRO.'/application/'.$this->defModule.'/view/'.$view_name;
        //公共模板位置
        $temp_index_path = ROOT_PATH_PRO.'/application/admin/view/autocode/templateindex.html';
        $temp_form_path = ROOT_PATH_PRO.'/application/admin/view/autocode/templateform.html';

        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $path_form = $path.'/form.html';
        $path_index = $path.'/index.html';

        if($view_type == 1){
            if(file_exists($path_index))$this->error('列表视图文件已存在，系统拒绝覆盖历史文件');
            //列表
            $html_str = file_get_contents($temp_index_path);
            file_put_contents($path_index, $html_str);
        }elseif($view_type == 2){
            if(file_exists($path_form))$this->error('编辑视图文件已存在，系统拒绝覆盖历史文件');
            //编辑
            $html_str = file_get_contents($temp_form_path);
            file_put_contents($path_form, $html_str);
        }else{
            $this->error('视图类型错误');
        }
        $this->success('视图文件创建已完成');
    }
}