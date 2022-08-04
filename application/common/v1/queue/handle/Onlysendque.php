<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue\handle;

use app\index\lib\Account;
use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;

/**
 * Class Share
 * @package app\common\v1\queue\handle
 */
class Onlysendque implements QueueHandle
{

    use QueueTool;
    public static function fire(array $data = [])
    {
        try{
            $data = $data["data"];
//            $param = $data["data"]["param"]
            self::Send($data);
//            $result = self::SendAll($data["access_token"],$data['config'],$data["param"],$data["id"],$data["color"],$data["user"],$data["type"]);
//            $send_url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . ;
//            https_request($send_url, json_encode($pushTemplate, JSON_UNESCAPED_UNICODE));
        }catch(\Exception $e){
            var_dump($e->getMessage());
        }
        return true;
    }


    public static function Send($data)
    {
        //判断用户推送次数
        $record = \app\index\model\UsersAttentionLog::where('user_id',$data['id'])->where('type',4)->find();
        if(empty($record) || $record['send_number']<3)
        {
            try{
                $datas = ['touser' => ''.$data["openid"].'', 'template_id' => ''.$data['template_id'].'', 'url' => ''.$data["url"].'', 'data' => $data["data"]];
            }catch(\Exception $e){
                var_dump('error:'.$e->getMessage());
            }
            $params = json_encode($datas, JSON_UNESCAPED_UNICODE);
            $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $data["access_token"];
//
            var_dump(date("Y-m-d H:i:s",time())."-".$data["openid"]);
            https_request($url,$params);
        }

        if(empty($record)){
            \app\index\model\UsersAttentionLog::addAttension($data["id"],$type=4);
        }else{
            if($record["send_number"] < 3){
                \app\index\model\UsersAttentionLog::updateAttension($record);
            }
        }


    }

}
