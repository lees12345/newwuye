<?php

namespace app\common\lib;

//微信，小程序相关类库
use app\common\Base;

class Send extends Base
{

    //获取网页授权的access_token获取次数没有限制，因此不需要缓存access_token
    public function send($code = '')
    {
        try {
            Producer::push(["type" => "onlysend", "expire" => 0, "data" => $data]);
        } catch (Exception $e) {
            return Shows::error($e->getMessage()); //异常处理
        }
    }



}