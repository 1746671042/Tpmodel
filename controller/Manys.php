<?php

namespace application\test\controller;

use think\Controller;
use application\test\model\Role;
use application\test\model\User;
/**
 * 多对多
 */
class Manys extends Controller{
    
    
    /**
     * 新增数据
     */
    public function add(){
/**********************第一种情况：三张表的数据都是新增*************************/
//        $user = new User();
//        $user->name = "张三丰";
//        $user->save();
//        //添加相关表中的数据
//        $user->role()->save(["name"=>"教师"]);
        
        
/*********************第二种情况：user表中存在数据，新增关联表*********************/
//        $user = new User();
//        $data = $user->find(1);
//        $data->role()->save(["name"=>"工人"]);
        
/************************第三种情况：只有中间关联表需要新增******************************/
        $user = User::get(2);
        $role = Role::get(3);
        
        $user->role()->attach($role);
        
    }
    
    /**
     * 关联查询
     */
    public function select(){
/*************************第一种情况：已知用户，去查询用户的角色*************************************/
//        $user = User::get(2);
//        
//        var_dump($user->role->toArray());
        
/******************************第二种：已知角色，去查找角色对应的用户*************************************************/        
//        $role = Role::get(2);
//        
//        var_dump($role->user->toArray());
        
/*************************第三种：查看所有记录*****************************/
        
        $user = User::all();
        
        foreach($user as $k=>$v){
            echo "<br/>";
            echo $v->name."<br/>";
            var_dump($v->role->toArray());
        }
        
    }
    
    
}