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
class Adminsend implements QueueHandle
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
        try{
            $datas = ['touser' => ''.$data["openid"].'', 'template_id' => ''.$data['template_id'].'', 'url' => ''.$data["url"].'', 'data' => $data["data"]];
            $params = json_encode($datas, JSON_UNESCAPED_UNICODE);
            $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $data["access_token"];
//

            $re = https_request($url,$params);
            var_dump($re);
            var_dump(date("Y-m-d H:i:s",time())."-".$data["openid"]);
        }catch(\Exception $e){
            var_dump('error:'.$e->getMessage());
        }

//        var_dump($result);
//        foreach($data as $k => $v){
//        $data[$k]["url"] = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config["appId"]."&redirect_uri=". urlencode(sprintf(config("wx.html_news"),param["name"],$id,$res[0]["openid"]))."&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
////        $job=config("wx.job_news");
////        $queue=config("wx.queue_news");//队列名
//        $data[$k]['template_id'] = $config['template_id'];
//        $data[$k]["access_token"] = \app\index\lib\Account::get_access_token($config);
//        $data[$k]['param'] = $param;
//
//        $data[$k]["openid"] = $v["openid"];
//        $data[$k]["data"]["first"] = [
//            "value"=>"尊敬的".$v["wx_nickname"]."，您好：",
//            "color"=>"#FF0000"
//        ];
//        $data[$k]["data"]["keyword1"]=[
//            "value"=>$v["wx_nickname"],
//            "color"=>"#173177"
//        ];
//        $data[$k]["data"]["keyword2"]=[
//            "value"=>$param["product_name"],
//            "color"=>"#173177"
//        ];
//        $data[$k]["data"]["keyword3"]=[
//            "value"=>date("Y-m-d H:i:s",time()),
//            "color"=>"#173177"
//        ];
//        $data[$k]["data"]["keyword4"]=[
//            "value"=>$param["mt_name"],
//            "color"=>$color
//        ];
//        $data[$k]["data"]["remark"]=[
//            "value"=>$param["news_adstracts"],
//            "color"=>"#173177"
//        ];
//        //进行群发
//
//            $data = ['touser' => ''.$v["openid"].'', 'template_id' => ''.$v["template_id"].'', 'url' => ''.$v["url"].'', 'data' => $v["data"]];
//            $param[$k] = [
//                'url' =>"https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $v["access_token"],
//                'data' => $data,
//            ];
//            var_dump(date("Y-m-d H:i:s",time())."-".$v["openid"]);
//        }
//        $ac = new \app\common\lib\CurlMuti();
//        $ac->set_param($param);
//        $ac->send();
    }

}
