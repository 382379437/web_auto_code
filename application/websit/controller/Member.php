<?php

namespace app\websit\controller;

use controller\BasicAdmin;
use service\DataService;
use think\Db;

class Member extends BasicAdmin
{
    /**
     * 指定当前数据表
     */
    public $table = 'WebMember';

    /**
     * description：自动提示
     * @return array|\PDOStatement|string|\think\Collection
     */
    function getarea(){
        $data = Db::name('web_area')->field('area_id,area_name')->where(['parentid'=>0])->select();
        return $data;
    }
    /**
     * description：列表
     */
    function index(){

        $this->title = "会员管理";
        list($get, $db) = [$this->request->get(), Db::name($this->table)];
        foreach (explode(",","name,provice,nickname") as $key) {
            if(isset($get[$key."_start"]) && $get[$key."_start"] !== ''){
                $db->where($key, ">=", $get["{$key}_start"]);
                $db->where($key, "<=", $get["{$key}_end"]);
            }else{
                (isset($get[$key]) && $get[$key] !== '') && $db->whereLike($key, "%{$get[$key]}%");
            }
        }
        $info = Db::name('WebAutoCodeFields')->where(['dbname'=>"member", 'is_deleted'=>0])->select();
        $this->assign('infofields', $info);

        $search_fields = Db::name('WebAutoCodeFields')->where(['dbname'=>"member", 'is_search'=>1, 'is_deleted'=>0])->select();
        $this->assign('search_fields', $search_fields);
        $this->assign('input', input());
        return parent::_list($db->where(['is_deleted' => '0']));
        
    }
    /**
     * 添加
     */
    public function add()
    {
        //根据ID排序，先添加的显示在前
        $edit_fields = Db::name('WebAutoCodeFields')->order("id asc")->where(['dbname'=>"member", 'is_deleted'=>0])->select();
        $this->assign('edit_fields', $edit_fields);
        return $this->_form($this->table, 'form');
    }

    /**
     * 编辑
     */
    public function edit()
    {
        //根据ID排序，先添加的显示在前
        $edit_fields = Db::name("WebAutoCodeFields")->order("id asc")->where(["dbname"=>"member", "is_deleted"=>0])->select();
        $this->assign("edit_fields", $edit_fields);

        return $this->_form($this->table, 'form');
    }
    /**
     * 删除
     */
    public function del()
    {
        
        if (in_array('10000', explode(',', $this->request->post('id')))) {
            $this->error('系统超级账号禁止删除！');
        }
        if (DataService::update($this->table)) {
            $this->success('删除成功！', '');
        }
        $this->error('删除失败，请稍候再试！');
        
    }
}