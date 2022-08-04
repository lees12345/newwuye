<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;

/**
 * Class Share
 * @package app\common\v1\queue\handle
 */
class Share implements QueueHandle
{

    use QueueTool;
    public static function fire(array $data = [])
    {
        self::Send($data["data"]["users"],$data["data"]["shares"]);
        return true;
    }


    public static function Send($datas,$share)
    {
        $access_token = redis()->get('access_token_tin');
        if(!$access_token){
            $access_token = \app\wxadmint1\model\Base::GetAccessToken();
        }

        foreach($datas as $k => $v){
            $data = ['touser' => ''.$v["openid"].'', 'template_id' => ''.config("wx.tongzhi").'', 'url' => ''.sprintf(config("wx.shares"),base64_encode($share["s_id"]),base64_encode($v["openid"])).'', 'data' => ['first' => ['value' => '尊敬的会员'.$v["wx_nickname"].'，您好:', 'color' => '#173177'],'keyword1' => ['value' => ''.$v["wx_nickname"].'', 'color' => '#173177'], 'keyword2' => ['value' => '积少成多', 'color' => '#173177'], 'keyword3' => ['value' => '' . date("Y-m-d H:i:s",$share["s_addtime"]) . '' , 'color' => '#173177'],'keyword4' => ['value' => '' . $share["s_code"] . '' , 'color' => '#FF0000'],'remark' => ['value' => '' . $share["s_reason"] . '', 'color' => '#FF0000']]];
            $param[$k] = [
                'url' =>"https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token,
                'data' => $data,
            ];
            var_dump('share_id'.$share["s_id"].'-'.$v["openid"]);
        }
        $ac = new \app\common\lib\CurlMuti();
        $ac->set_param($param);
        $ac->send();



//        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
//        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token;
//
//        $result = https_request($url,$params);

    }

}
