<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/3/18
 * Time: 14:06
 */
namespace app\index\lib;

use think\Exception;

class Account{
    // 第一步：用户同意授权，获取code
    private static $getCodeUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=snsapi_userinfo&state=state&connect_redirect=1#wechat_redirect';

    // 第二步：通过code换取网页授权access_token
    private static $getOpenIdUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code';

    // 第三步：拉取用户信息(需scope为 snsapi_userinfo)
    private static $getUserInfoUrl = 'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';

    // 第四步：拉取用户信息(普通access_token版)
    private static $getUserInfoUrlByToken = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';

    //获取access_token请求的url
    private static $accessUrl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s";
    //创建菜单请求url
    private static $menuUrl = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s";

    // 微信发送模板消息API
//    private static $setMsgUrl = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=ACCESS_TOKEN';

    //微信获取客服列表
    private static $serviceListUrl = 'https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=ACCESS_TOKEN';

    //客服发送接口
    private static $serviceSendUrl = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN";

    //微信获取素材列表
    private static $newsListUrl = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN';

    //获取access_token
    public static function get_access_token($config){

        if(!fredis()->get("wx_token_".$config["appId"])){
            $tokenUrl = sprintf(static::$accessUrl,$config["appId"],$config["AppSecret"]);
            $result = self::https_request($tokenUrl);
          //  print_r($result);die;
            if(array_key_exists("errcode",$result)){
                throw new Exception($result["errcode"]);
            }

            //存储到redis中
            fredis()->set("wx_token_".$config["appId"],$result["access_token"],7000);
            return $result["access_token"];
        }

        return fredis()->get("wx_token_".$config["appId"]);

    }

    /**
     * 主动发送模板消息
     * @inheritdoc 详细文档：https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1433751277
     * @param string $accessToken
     * @param string $pushTemplateId 模板ID
     * @param string $openid 用户openid
     * @param array $pushData 模板参数
     * @param string $url 模板消息链接
     * @param string $topColor 微信top颜色
     * @return array
     */
    public static function push(string $accessToken, string $pushTemplateId, string $openid, array $pushData = [],string $url = '', string $topColor = '#FF0000')
    {
        // 检测参数
        if (empty($pushData) or empty($openid) or empty($pushTemplateId)) {
            throw new \Exception('请设置正确的参数 $triggerTemplate or $value~ !');
        }

        // 准备数据
        $pushTemplate['template_id'] = $pushTemplateId;
        $pushTemplate['touser'] = $openid;
        $pushTemplate['url'] = empty($url) ? '' : $url;
        $pushTemplate['topcolor'] = empty($topColor) ? '' : $topColor;
        $pushTemplate['data'] = $pushData;
//        $send_url = str_replace('ACCESS_TOKEN', $accessToken, static::$setMsgUrl);
        // 发送请求，并返回
        $send_url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $accessToken;
        return self::https_request($send_url, json_encode($pushTemplate, JSON_UNESCAPED_UNICODE));
        //快速推送
//        return self::sendTemplate($accessToken,json_encode($pushTemplate, JSON_UNESCAPED_UNICODE));

    }

    /**
     * 获取用户信息
     * @param $name
     * @param $code
     * @return \think\response\Json
     * @throws \Exception
     */
    public static function getOpenid($name,$code,$type=false){
        $config = config("wx.".$name);
        //  print_R($config);die;
        if(!$config){
            throw new \Exception("无效参数");
        }
        if(!$code){
            Account::code($config);
        }
        //print_r($type);die;
        if($type){
            $user = Account::openid($code,$config["appId"],$config["AppSecret"],false);
        }else{
            //获取用户openid
            $user = Account::openid($code,$config["appId"],$config["AppSecret"],true);
        }
        return $user;
    }

    /**
     * code 重载http,获取微信授权
     * @param string $appid 微信公众号APPID
     * @header 重载链接获取code
     */
    public static function code($config)
    {
        //当前域名
        $service_url = urlencode( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

        static::$getCodeUrl = str_replace('APPID',$config["appId"],static::$getCodeUrl);
        static::$getCodeUrl = str_replace('REDIRECT_URI',$service_url,static::$getCodeUrl);
        self::header(static::$getCodeUrl);
    }

    /**
     * 获取用户 OPENID
     * @param string $code     微信授权CODE
     * @param string $appid    微信appid
     * @param string $appSecret    微信appSecret
     * @param bool $type    true:获取用户信息 | false:用户openid
     * @return array    用户信息|用户openid
     */
    public static function openid(string $code, string $appid,string $appSecret,bool $type = false)
    {
        //验证参数
        (empty($appid) or empty($appSecret)) && self::error('请设置管理端微信公众号开发者APPID 和 APPSECRET~ !');
        empty($code) && self::error('请验证是否传了正确的参数 code ~ !');

        //获取用户数据
        static::$getOpenIdUrl = str_replace('APPID',$appid,static::$getOpenIdUrl);
        static::$getOpenIdUrl = str_replace('SECRET',$appSecret,static::$getOpenIdUrl);
        static::$getOpenIdUrl = str_replace('CODE',$code,static::$getOpenIdUrl);

        $result = self::https_request(static::$getOpenIdUrl);
        // return $result;die;
        if(array_key_exists('errcode',$result))
        {
            throw new Exception($result["errcode"]);
        }
        return $type == false ? $result : self::userInfo( $result["access_token"], $result['openid']);
    }

    /**
     * 获取用户信息(通过code换取网页授权access_token版)
     * @param string $access_token 授权获取用户关键参数：access_token
     * @param string $openid   用户openid
     * @return array
     */
    public static function userInfo(string $access_token, string $openid)
    {
        (empty($access_token) or empty($openid)) && self::error('getOpenid()方法设置参数~ !');

        static::$getUserInfoUrl = str_replace('ACCESS_TOKEN',$access_token,static::$getUserInfoUrl);
        static::$getUserInfoUrl = str_replace('OPENID',$openid,static::$getUserInfoUrl);

        return self::https_request(static::$getUserInfoUrl);
    }

    /**
     * 获取用户信息(普通ACCESS_TOKEN获取版)
     * @param string $access_token 普通access_token
     * @param string $openid   用户openid
     * @return array
     */
    public static function newUserInfo(string $access_token,string $openid)
    {
        (empty($access_token) or empty($openid)) && self::error('getOpenid()方法设置参数~ !');

        static::$getUserInfoUrlByToken = str_replace('ACCESS_TOKEN',$access_token,static::$getUserInfoUrlByToken);
        static::$getUserInfoUrlByToken = str_replace('OPENID',$openid,static::$getUserInfoUrlByToken);
        return self::https_request(static::$getUserInfoUrlByToken);
    }

    /**
     * 客服列表
     * @param $config
     */
    public static function custom_service($config){
        $access_token = static::get_access_token($config);
        $send_url = str_replace('ACCESS_TOKEN', $access_token, static::$serviceListUrl);
        return static::https_request($send_url);
    }
    /**
     * 素材列表
     * @param $config
     */
    public static function news_service($config){
        $access_token = static::get_access_token($config);
        $send_url = str_replace('ACCESS_TOKEN', $access_token, static::$newsListUrl);
        $data = ["type"=>"image","offset"=>0,"count"=>10];
        return static::https_request($send_url,json_encode($data,JSON_UNESCAPED_UNICODE));
    }

    /**
     * 关注语推送客服消息
     * @param $config
     * @param $data
     * @return mixed
     */
    public static function send_service_follow($config,$data){
        //通过config获取 access_token
        $access_token = self::get_access_token($config);
        $serviceSendUrl = str_replace("ACCESS_TOKEN",$access_token,static::$serviceSendUrl);
        return self::https_request($serviceSendUrl,json_encode($data,JSON_UNESCAPED_UNICODE));
    }
    
    /**
     * 推送客服信息
     * @param string $account
     */
    public static function send_service(string $openid,string $data,string $access_token,string $account,string $type){
        if(empty($openid) || empty($data) || empty($access_token)){
            throw new \Exception("缺失参数");
        }
        switch ($type){
            case "text":
                $list = static::send_text_custom($account,$openid,$data);
                break;
        }
        $serviceSendUrl = str_replace("ACCESS_TOKEN",$access_token,static::$serviceSendUrl);
        return self::https_request($serviceSendUrl,json_encode($list,JSON_UNESCAPED_UNICODE));
    }

    /**
     * 封装推送客服数据(文字)
     * @param $account
     * @param $openid
     * @param $data
     * @return mixed
     */
    public static function send_text_custom($account,$openid,$data){
        $template["touser"] = $openid;
        $template["msgtype"] = "text";
        $template["text"] = ["content"=>$data];
        $template["customservice"] = ["kf_account"=>$account];
        return $template;
    }

    /**
     * 重载路由
     * @param string $url
     * @param array $params
     */
    public static function header(string $url, array $params = []): void
    {
        self::headers($url, $params);
    }

    /**
     * 发送 header 请求
     * @param string $url 请求链接
     * @param array $params 请求参数
     */
    public static function headers(string $url,array $params = []):void
    {
        if (!empty($params)) $url .= static::ToUrlParams($params);
        header('Location: '  . $url);
        exit();
    }

    /**
     *
     * 拼接签名字符串
     * @param array $urlObj
     *
     * @return 返回已经拼接好的字符串
     */
    public static function ToUrlParams($urlObj)
    {
        $buff = "?";
        foreach ($urlObj as $k => $v) {
            if ($k != "sign") {
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        return $buff;
    }


    //创建菜单
    public static function create_menu($access_token,$menu_data){
        $menu_url = sprintf(static::$menuUrl,$access_token);
        $result = self::https_request($menu_url,$menu_data);
        return $result;
    }


    //封装curl get post 请求方法
    public static function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return  json_decode($output,true);
    }

    //封装curl post put delete请求方法
    public static function https_method_request($url,$data,$method="PUT"){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($method == "PUT"){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"PUT"); //设置请求方式
        }elseif($method == "DELETE"){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"DELETE"); //设置请求方式
        }
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);//设置提交的字符串
        $output = curl_exec($curl);
        curl_close($curl);
        return  json_decode($output,true);
    }

    //发送模板消息
    public static function sendTemplate($access_token,$params){
        $fp = fsockopen('api.weixin.qq.com', 80, $error, $errstr, 30);
        $http = "POST /cgi-bin/message/template/send?access_token={$access_token} HTTP/1.1\r\nHost: api.weixin.qq.com\r\nContent-type: application/x-www-form-urlencoded\r\nContent-Length: " . strlen($params) . "\r\nConnection:close\r\n\r\n$params\r\n\r\n";
        // halt($http);
        fwrite($fp, $http);
        fclose($fp);
        dump($params);
    }

}