<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use think\Session;

class WelcomeQueue extends Base
{
    // 添加延迟队列推送内容
    public static function sendMessage($openid)
    {
        $res[] = \app\wxadmint1\model\WelcomeQueue::create([
            'openid' => $openid,
            'time' => (time() + 300),
            'type' => 1
        ]);
        $res[] = \app\wxadmint1\model\WelcomeQueue::create([
            'openid' => $openid,
            'time' => (time() + 600),
            'type' => 2
        ]);


        return $res;
    }

    public function getStatusAttr($values)
    {
        $arr = [0=>'未推送',1=>'已推送'];

        return $arr[$values];
    }

    public function getContentAttr($value,$data)
    {
        $order_id = $data['order_id'];
        return Order::where('id',$order_id)->value('order_remark');
    }

    public function getUsertelAttr($value,$data)
    {
        $openid = $data['openid'];
        return Users::where('openid',$openid)->value('user_tel');
    }
}