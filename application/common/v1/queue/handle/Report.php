<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;

/**
 * Class Report
 * @package app\common\v1\queue\handle
 */
class Report implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        self::send($data["data"]);
        return true;
    }

    private static function send($v)
    {
        $v["news"] = str_replace('碰碰', base64_decode($v["wx_nickname"]),$v['news']);
        $access_token = redis()->get("access_token_tin");
        if(!$access_token){
            var_dump('缓存失效，重新请求');
            try{

                $access_token = \app\wxadmint1\model\Base::GetAccessToken();
            }catch(\Exception $e){
                var_dump($e->getMessage());
            }
        }
        $url = sprintf(config('wx.server_send'),$access_token);

        $data =[
            "touser" => trim($v["openid"]),
            "msgtype" => "text",

            "text" => [
                "content" => $v["news"]
            ],
            "customservice" => [
                "kf_account" => 'kf2001@gh_4f9d080429e0'
            ],

        ];
        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
        $result = https_request($url,$params);
        var_dump($result);

    }
}
