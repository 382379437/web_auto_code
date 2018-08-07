<?php
/*
 * ============================================
 * ==【please stick to finishing this thing】==
 * ============================================
 * filename：xxx.php
 * description： EasyDBM数据备份[如果需要修改源码，请尽量在你搞懂上下文之后再修改！]
 * 1 /admin/Dbmanage/back 数据备份;
 * 2 /admin/Dbmanage/backup/数据恢复
 * 使用说明：
 * 仅需要在页面调用该链接即可[post/get]
 * 执行失败可能是服务器目录权限问题，其它问题自行检查
 * author：wh
 * email：xxx@qq.com
 * createTime：{2018/5/10} {17:24} 
 */

namespace app\admin\Controller;


use think\Controller;
use think\Db;
use think\Request;

class Dbmanage extends Controller
{
    protected $backup_path = '';
    function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->backup_path = APP_PATH.'../runtime/backup/';
    }
    /**
     * description：备份网站数据库[windows/linux 通用]
     * author：wanghua
     * @return \think\response\Json
     */
    function backup(){
        //清空原有备份-根据项目自身情况设定是否删除
        if(config('app_debug')){
            if(!$this->deleteFile($this->backup_path)){
                return json(['code'=>201, 'msg'=> '备份结束：清空原备份文件失败']);
            }
        }

        //准备备份
        set_time_limit(0);
        $tables = getTables();

        $err = [];//保存写入失败的数据
        foreach($tables as $k=>$table_name){
            //建表sql
            $create_sql = Db::query('SHOW CREATE TABLE '.$table_name);
            //数据
            $data = Db::table($table_name)->select();
            $sql = '';
            foreach ($data as $d=>$r){
                $keys = '';
                foreach ($r as $a=>$b){
                    if(is_string($b)){
                        $keys.="'".$b."'";
                    }elseif (!isset($b)){
                        $keys.="'"."'";
                    }else{
                        $keys.=$b;
                    }
                    $keys.=',';
                }
                $keys = substr($keys, 0, strlen($keys)-1);
                $sql.="INSERT INTO `{$table_name}` VALUES({$keys});-- --
";
            }
            $backpath = $this->backup_path;
            if(!file_exists($backpath)){
                mkdir($backpath, 0777);
            }
            $backpath .= $table_name.'-'.date('Ymd').'.sql';

            $c_sql = "SET FOREIGN_KEY_CHECKS=0;-- --
DROP TABLE IF EXISTS `{$table_name}`;-- --"."
".$create_sql[0]['Create Table'].';-- --';
            //权限不足可能导致失败
            $res = file_put_contents($backpath,$c_sql."
            ".$sql, FILE_APPEND);
            if(!$res){
                array_push($err, $table_name);
            }
        }
        $err = $err?json_encode($err):'无';
        return json(['code'=>200, 'msg'=> '备份结束；缓存失败的数据：'.$err]);
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
    /**
     * description：数据恢复
     * author：wanghua
     * @return \think\response\Json
     */
    function reback(){
        set_time_limit(0);
        $backpath = $this->backup_path;
        $back_files = scandir($backpath);//备份文件数组
        foreach($back_files as $k => $data_file){
            if(!in_array($data_file, ['.', '..'])){
                $data_file_path = $backpath.$data_file;
                if(!file_exists($data_file_path)){
                    return json(['code'=>500, 'msg'=> '备份文件不存在:'.$data_file_path]);
                }

                //取得数据
                $sql = file_get_contents($data_file_path);

                $sql_arr = explode('-- --', $sql);

                foreach ($sql_arr as $key=>$val){
                    if(trim($val)){
                        Db::query($val);
                    }
                }
            }
        }
        return json(['code'=>200, 'msg'=> '恢复成功']);
    }

    /**
     * description：键名取得键名
     * author：wanghua
     * @param $res
     * @return array
     */
    protected function getKeyName($res){
        foreach ($res as $key=>$val){
            $arr = [];
            foreach ($val as $k=>$v){
                $arr[] = $k;
            }
            return $arr;
        }
    }

    /**
     * description：轻量型数据库管理工具-dbm
     * author：wanghua
     * @return mixed
     */
    function index(){
        try{
            $data = $this->paginate();
            $res = $data['data'];
            $kname = $this->getKeyName($res);
            $this->assign('kname', $kname);
            //分页
            $this->assign('render', $data['render']);
            $this->assign('count', $data['count']);
            $this->assign('sql', $data['sql']);
            $this->assign('his_sql', $data['his_sql']);

        }catch (\Exception $e){
            $res = $e->getMessage();
        }
        $this->assign('info', $res);
        return $this->fetch('', ['title' => 'db管理']);
    }

    /**
     * description：分页
     * author：wanghua
     * @return array
     * @throws \Exception
     */
    protected function paginate(){
        $current = empty(input('current'))?10:input('current');//页容量
        $page = empty(input('page'))?1:input('page');//当前页
        $page = $page*1 < 1 ?1:$page*1;
        $sql = input('sql');
        //存储历史sql并返回
        $his_sql = $this->saveHis($sql);

        if(false !== strpos($sql, ';')){
            $sql = substr($sql, 0, strlen($sql)-1);
        }
        $p = '';
        if(input('up'))$p = $page-1;
        if(input('down'))$p = $page-1;
        $p = $p==''?0:$p;
        $count = $this->getCount($sql);//查询总条数

        if(strpos($sql, 'limit')){
            if(false === strpos($sql,';'))$sql = $sql.';';
            $sql_ = substr($sql, 0, strpos($sql, 'limit'));
            $p = $p*$current;
            $sql = trim($sql_)." limit $p,$current;";

        }else{
            //默认不增加分页查询参数
            if(false !== strpos($sql, 'select')){
                $p = $p*$current;
                $sql = trim($sql) ." limit {$p},$current;";
            }
        }
        //安全提醒
        if(false !== strpos($sql, 'delete')){
            if(false === strpos($sql, 'where'))throw new \Exception($sql.' this is a not safe sql！');
        }

        $data = Db::query($sql);

        $arr = ['data'=>$data];
        $act = request()->controller().'/'.request()->action();
        //分页html
        $url = url($act).'?'.'current='.$current;
        $render = '<div style="margin: 5px;border: 0;">
        <a href="'.$url.'&up=1&page='.($page*1-1).'&sql='.$sql.'">上一页</a> | 
        <a href="'.$url.'&down=1&page='.($page*1+1).'&sql='.$sql.'">下一页</a>
        </div>';
        $arr['render'] = $render;
        $arr['sql'] = $sql;
        $arr['count'] = $count;
        $arr['his_sql'] = $his_sql;
        return $arr;
    }

    //历史记录
    protected function saveHis($sql){
        $sql_his_arr = cookie('sql_his_arr')?cookie('sql_his_arr'):'{}';
        $sql_his_arr = json_decode($sql_his_arr, true);
        array_push($sql_his_arr, $sql);
        cookie('sql_his_arr', json_encode($sql_his_arr));
        //去重
        $sql_his_arr = array_unique($sql_his_arr);
        //排序
        krsort($sql_his_arr);
        //截取
        return array_slice($sql_his_arr,0, 10);
    }
    //数据总数
    protected function getCount($sql){
        $sql_ = strtolower($sql);

        if(strpos($sql, '*')){
            //没有字段
            $sql_ = str_replace('*','count(*) as dbm_count',$sql_);
        }else if(strpos($sql, ',')){
            //有字段
            $field = substr($sql_, strlen('select'), strpos($sql_, 'from')-strlen(' from '));

            $arr = explode(',', $field);
            $field = $arr[0];

            $sql_ = str_replace('select','select count('.$field.') as dbm_count,',$sql_);
        }
        else{
            $sql_ = str_replace('select','select count(*) as dbm_count,',$sql_);
        }
        $data = Db::query($sql_);
        return $data[0]['dbm_count'];
    }
}