<?php

namespace app\common\lib;

//微信，小程序相关类库
use app\common\Base;

class Wechat extends Base
{

    //网页静默授权获取code
    public function getCode()
    {
        try {
            $wechat = new \WeChat\Oauth(config('wx.only'));//实例接口
            $result = $wechat->getOauthRedirect('http://estate.1yuaninfo.com/index/property/logins', '', 'snsapi_base');
            return $result;
        } catch (Exception $e) {
            return Shows::error($e->getMessage()); //异常处理
        }
    }

    //获取网页授权的access_token获取次数没有限制，因此不需要缓存access_token
    public function getOauthAccessToken($code = '')
    {
        try {
            $wechat = new \WeChat\Oauth(config('wx.only'));//实例接口
            $result = $wechat->getOauthAccessToken($code);//执行操作
            if (!empty($result['access_token'])) {//如果存在access_token，那么缓存access_token
                return $result;
            } else {
                return Shows::error('获取openid失败');
            }
        } catch (Exception $e) {
            return Shows::error($e->getMessage()); //异常处理
        }
    }


    //通过微信授权code获取微信用户信息
    public function getUserInfo($code)
    {
        //获取网页授权的access_token和openid
        $getOauthAccessToken = $this->getOauthAccessToken($code);
        try {
            $wechat = new \WeChat\Oauth(config('wx.only'));//实例接口
            //获取用户网页授权信息
            return $wechat->getUserInfo($getOauthAccessToken['access_token'], $getOauthAccessToken['openid'], 'zh_CN');
        } catch (Exception $e){
            return Shows::error($e->getMessage());//异常处理
        }
    }

    /*
     * TODO 发送模板消息
     * @param template_id 模板id
     * @param $data 参数
     */
    public function sendTemplate($data)
    {
        try {
            // 实例接口
            $wechat = new \WeChat\Template(config('wx.only'));

            // 执行操作
            $result = $wechat->send($data);

            return $result['errmsg'];
        } catch (Exception $e){
            // 异常处理
            return Shows::error($e->getMessage());
        }
    }


}