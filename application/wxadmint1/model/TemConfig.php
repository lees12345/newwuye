<?php
namespace app\wxadmint1\model;

use think\Model;

class TemConfig extends Model{

    public function getTypeAttr($value,$data)
    {
        $arr = ['addOrder'=>'新建维修推送','receive'=>'负责人接收推送','end'=>'维修任务结束推送','again'=>'负责人接收再次推送'];
        return $arr[$data['name']];
    }
    
}