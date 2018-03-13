<?php

namespace application\test\model;


use think\Model;

class Role extends Model{
    
    //定义数据的转化  
   protected $resultSetType = 'collection';
   
   
   public function user(){
//       belongsToMany(‘关联模型名’,’中间表名’,’外键名’,’当前模型关联键名’);
//        关联模型名： 
//            是指当前模型需要关联的其他模型，比如我们的当前模型是Student 摸行，去关联 Course 模型，那关联模型就需要填course。
//        中间表名： 
//              这个就不用说了，就是中间表名不用写前缀。
//
//        外键名： `
//              是中间表 user_role 中关联 user 表的外键id。
//
//        当前模型关联键名： 
//              是中间表 user_role 关联 role 表的关联键名。
       return $this->belongsToMany("User", "user_role", "user_id", "role_id");
   }
}
