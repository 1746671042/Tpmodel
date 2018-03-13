<?php

namespace application\test\controller;

use think\Controller;
use application\test\model\News;
use application\test\model\NewsDesc;
/**
 * 一对一
 */
class One extends Controller{
    
    
    /**
     * 新增数据
     */
    public function add(){
/**********************第一种情况：两个表都新增数据*************************/
//        $news = new News();
//        $news->title = "同时新增";
//        $news->image = "11";
//        $news->author = "11";
//        $news->save();
//        
//        //新增关联表
//        $news->newsdesc()->save(["content"=>"附表同时新增数据"]);
        
/*********************第二种情况：news表中存在数据，新增关联表*********************/
        //首先查询主表中存在信息
//        $data = News::get(3);
//        //新增
//        $data->newsdesc()->save(["content"=>"单独"]);
        
        
        /****************************together一起写入********************************************/
        $news = new News();
        $news->title="together插入";
        $newsDesc = new NewsDesc();
        $newsDesc->content = "1111111111";
        $news->newsdesc = $newsDesc;
        $news->together("newsdesc")->save();
    }
    
    /**
     * 关联查询
     */
    public function select(){
/*************************查询一条**************************/
//        $info = News::get(3);
//        var_dump($info->toArray());
        //获取附表中的全部数据
//        var_dump($info->newsdesc->toArray());
        //获取单独的某一条数据
//        var_dump($info->newsdesc->content);
/********************************查询多条*************************/
        
//        $list = News::all();
//        调用附表中的数据，必须是一条数据,必须是一维
//        foreach($list as $k=>$v){
//            var_dump($v->newsdesc->toArray());//获取附表中数据
//        }
//        
//        $this->assign("list",$list);
//        return $this->fetch("select");
        
        /******************绑定之后的读取******************/
//        $info = News::get(3, "newsdesc");
//        var_dump($info->toArray());
    }
    
    /**
     *更新
     */
    public function update(){
        $data = News::get(3);
        //修改（修改和新增相比，newsdesc调用时没有括号）
        $data->newsdesc->save(["content"=>"单"]);
    }
    
    /**
     * 删除
     */
    public function delete(){
        $data = News::get(4);
        //将两个表中的数据全部删除
        var_dump($data->together("newsdesc")->delete());
    }
}