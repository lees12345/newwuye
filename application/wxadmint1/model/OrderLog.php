<?php
namespace app\wxadmint1\model;

use think\Model;

class OrderLog extends Model{

    public function users()
    {
        return $this->belongsTo('Users','user_id','id')->field('id,user_name,user_tel');
    }
    
}