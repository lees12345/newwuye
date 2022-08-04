<?php
namespace app\wxadmint1\controller;
use think\Controller;
use app\wxadmint1\service\WxToken;
use think\Log;
use think\Request;
class Wx extends Controller{

    public function wx(){
        Log::info('关注测试信息');
        $request = Request::instance();
        $config = config("wx.only");

        Log::info('微信信息1：'.var_export($request->isGet()));
        if($request->isGet()){
            WxToken::valid($config); //公众号验证
        }else{
            Log::info('微信信息：'.var_export($config));
            WxToken::responseMsg($config);//验证成功打开
        }
        echo "SUCCESS";die;


    }

}

