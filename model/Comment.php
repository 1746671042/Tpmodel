<?php

namespace application\test\model;


use think\Model;

class Comment extends Model{
    
    //定义数据的转化  
   protected $resultSetType = 'collection';
   
    public function news(){
        return $this->belongsTo('News', "news_id","id");
    }
}
