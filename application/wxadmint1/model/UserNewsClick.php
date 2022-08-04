<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use think\Session;
use app\wxadmint1\model\Base as BaseModel;

class UserNewsClick extends BaseModel
{




    /*
     * 查询消息点击记录**/
    public static function NewsClickList($param,array $condition=[],array $conditions=[])
    {

            $list = self::alias('un')->join('users u','un.openid = u.openid');

                if(!empty($condition)){
                    $condition['news_id'] = $param['news_id'];
                    $data =$list->where('news_id',$param['news_id'])->where($condition)->order('un.addtime desc')->paginate(20,false,['query' => request()->param()])->each(function($item, $key){
                        return $item;
                    });


                }else{

                    $data = $list->where('news_id',$param['news_id'])->order('un.addtime desc')->paginate(20,false,['query' => request()->param()])->each(function($item, $key){
                        return $item;
                    });

                }
        return $data;
    }


}