<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use app\common\v1\Redis;
use think\Session;

// 应用公共文件
//字符串加密
function pass($password)
{
    //substr(字符串,截取开始位置,截取长度)
    //base64_encode()加密
    //MD5加密

    $password = base64_encode(substr(md5('t1' . $password), 6, 16));
    return $password;

}

function handleShareData($share)
{
    //判断是否存在什么样的括号
    if (strpos($share, "(")) {
        $left = "(";
    } else {
        $left = "（";
    }
    if (strpos($share, ")")) {
        $right = ")";
    } else {
        $right = "）";
    }
    $newname = explode($left, $share) ?? explode($left, $share);

    $names = explode($right, $newname[1]) ?? explode($right, $newname[1]);
    //得到数组
    $name = mb_substr($newname[0], 0, 3) . '***' . $left . "***" . mb_substr($names[0], -1) . $right;
    return $name;
}

//查询用户的信息
function getUserMessage($name, $code, $type = true)
{
    $user = \app\index\lib\Account::getOpenid($name, $code, $type);
    //查询用户的信息
//    $data = getRedis("users:openid:".$user["openid"]);
//    if(!$data){
    $data = \app\wxadmint1\model\Users::getUserMessage($user["openid"]);
//    }
    return $data;
}

//用来得到微信接口返回的数据

function https_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return json_decode($output, TRUE);
}

function opensslPassword($str, $type = "E")
{
    $key = 'cly123zhang58s@d';
    $iv = substr('0000000000000000', 0, 16);
    if ($type == "E") {
        return base64_encode(openssl_encrypt($str, 'AES-128-CBC', $key, false, $iv));
    } else {
        return openssl_decrypt(base64_decode($str), 'AES-128-CBC', $key, false, $iv);
    }

}

function https_requests($url, $data = null)
{
    $curl = curl_init();
//    $headers = array('Content-Type: application/x-www-form-urlencoded');
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
//    if (!empty($data)){
//        curl_setopt($curl, CURLOPT_POST, 1);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//    }
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    $output = curl_exec($curl);
//    curl_close($curl);
//    return $output;

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded",
            "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    return json_decode($response, true);
}

//token加密
function SetRulesToken($openid, $news_id = "")
{
    $token["openid"] = $openid . "#" . (time() + 86400 * 1) . "#" . $news_id;
    $token = authcode(json_encode($token), "E");
    return $token;
}

//RSA加密解密
function authcode($string, $operation = 'E', $type = false)
{
    $ssl_public = $type ? file_get_contents("/home/key/rsa_public_key.pem") : file_get_contents("/home/key/huachuang_panjiayuan_public.key");
    $ssl_private = file_get_contents("/home/key/cloud_pan_private.pem");
//    $ssl_public     = $type ? file_get_contents("/data/share/jyy/key/rsa_public_key.pem") : file_get_contents("/data/share/jyy/key/huachuang_panjiayuan_public.key");
//    $ssl_private    = file_get_contents("/data/share/jyy/key/cloud_pan_private.pem");
    $pi_key = openssl_pkey_get_private($ssl_private);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
    $pu_key = openssl_pkey_get_public($ssl_public);//这个函数可用来判断公钥是否是可用的
    if (false == ($pi_key || $pu_key)) return '证书错误';
    $data = "";
    if ($operation == 'D') {
        $string = str_replace(' ', '+', $string);
        openssl_private_decrypt(base64_decode($string), $data, $pi_key);//私钥解密
        $data = json_decode($data, true);
    } else {
        openssl_public_encrypt($string, $data, $pu_key);//公钥加密
        $data = base64_encode($data);
    }
    return $data;
}

//用来获取相应的openid

function UrlOpenid($code, $appid, $secret)
{

    $code = trim("$code");
    $appid = trim("$appid");

    $secret = trim("$secret");
    if (empty(Session::get('results'))) {

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid . "&secret=" . $secret . "&code=" . $code . "&grant_type=authorization_code";
//print_r($url);die;
        $result = https_request($url);
// halt($result);
// halt(Cache::get('code'));

        $ref = $result['refresh_token'];

        // halt($ref);
        Session::set('results', $ref);


    }
    $ref = Session::get('results');
    //halt($result);
    // halt($ref);
    $url = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=" . $appid . "&grant_type=refresh_token&refresh_token=" . $ref;
    $result = https_request($url);

    return $result;

}

function info($openid, $token)
{
    $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $token . "&openid=" . $openid . "&lang=zh_CN";
    $result = https_request($url);

    return $result;
}


function randCode($length)
{
    return substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 11), 1))), 0, $length);
}


function writeJson($code, $data, $msg = 'ok', $errorCode = 0)
{
    $data = [
        'error_code' => $errorCode,
        'result' => $data,
        'msg' => $msg
    ];
    return json($data, $code);
}

/**
 * 获取redis实例
 * @return \Redis
 * @throws Exception
 */
function redis()
{
    return Redis::getRedis();
}

//获取微信id
function getWxId($name)
{
    $config = config("wx." . $name);
    //查询出此微信是用的哪个wx_id
    $wx_id = redis()->get($config["appId"]);
    return $wx_id;
}

function fredis()
{
    return Redis::getRedis();
}

function setRedis($key, $value, $time)
{
    return fredis()->set($key, $value, $time);
}

function getRedis($key)
{
    return fredis()->get($key);
}

function fen_phone($user_tel)
{
    return substr_replace($user_tel, '****', 3, 4);
}





 
