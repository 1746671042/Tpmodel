<?php

namespace application\test\controller;

use think\Controller;
use application\test\model\News;
use application\test\model\NewsDesc;
/**
 * 一对多
 */
class Many extends Controller{
    
    
    /**
     * 新增数据
     */
    public function add(){
/**********************第一种情况：两个表都新增数据*************************/
//略
        
/*********************第二种情况：news表中存在数据，新增关联表*********************/
        //首先查询主表中存在信息
        $data = News::get(2);
        //新增一条
//        $data->comment()->save(["comment"=>"第一条评论"]);
        //插入多条
        $result = $data->comment()->saveAll([
            ["comment"=>"第一条评论"],
            ["comment"=>"第二条评论"],
            ["comment"=>"第三条评论"],
            ["comment"=>"四条评论"],
        ]);
        var_dump($result);
    }
    
    /**
     * 关联查询
     */
    public function select(){
/*************************查询一条**************************/
//        $info = News::get(2);
//        var_dump($info->toArray());
        //获取附表中的全部数据
//        var_dump($info->comment->toArray());
        //按照条件检索附表中的数据
//        $data = $info->comment()->where("status",1)->select();
//        var_dump($data->toArray());
        
        
/****************************根据附表中条数检索主表信息***********************************/
        
//        $info = News::has("comment",">","2")->select();
//        var_dump($info->toArray());
        
        
/***************************根据附表中的条件检索主表的信息**************************************/
        $info = News::hasWhere("comment",["status"=>1])->where("title","like","%新增%")->select();
        var_dump($info->toArray());
/********************************查询多条*************************/
        
//        $list = News::all();
//        调用附表中的数据，必须是一条数据,必须是一维
//        foreach($list as $k=>$v){
//            var_dump($v->newsdesc->toArray());//获取附表中数据
//        }
//        
//        $this->assign("list",$list);
//        return $this->fetch("select");
        

    }
  
}