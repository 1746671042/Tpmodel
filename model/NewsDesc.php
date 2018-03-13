<?php

namespace application\test\model;


use think\Model;

class NewsDesc extends Model{
    
    
    public function news(){
        return $this->belongsTo('News', "news_id","id");
    }
}
