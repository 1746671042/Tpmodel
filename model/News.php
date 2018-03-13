<?php

namespace application\test\model;


use think\Model;

class News extends Model{
    
    //定义数据的转化  
   protected $resultSetType = 'collection';
    /**
     * 建立一对一关联(主表中)
     * 方法的名字随便定义，建议写成关联表的表名
     */
    public function newsdesc(){
        
//        外键名：关联表中，主表id的字段,如果外键名为当前的“表名_id”组成，可以省略
//        主键名：当前模型的主键，如果是id，也可以省略
//         return $this->hasOne("关联表的模型",'外键名','主键名');
         return $this->hasOne("NewsDesc", "news_id","id")->bind("content,time");
    }
    
    /**
     * 建立一对多的管理
     */
    public function comment(){
//        外键名：关联表中，主表id的字段,如果外键名为当前的“表名_id”组成，可以省略
//        主键名：当前模型的主键，如果是id，也可以省略
        return $this->hasMany('Comment','news_id','id');
    }
    
}
