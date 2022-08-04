<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;

/**
 * Class Auction 电销系统传入
 * @package app\common\v1\queue\handle
 */
class Oa implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        $data = $data["data"];

        $url = "http://124.202.231.19:9000/OutService/import";
        $res["openid"] = "sz-358878c1-ad5b-4ab9-8488-403d88bc09db";
        try{
            //关联查一下平台的名字
            $source = \app\wxadmint1\model\Source::where("uid","=",$data["source_uid"])->field("title")->find();
            //推送给电销系统
            $datas[] = [
                "phone" => $data["mobile_tel"],
                "register_date" => $data["create_time"],
                "source" => $source["title"],
                "sucai" => $data["material"]
            ];
            //json处理一下
            $datas = json_encode($datas);
            $res["data"] = $datas;
            $res = http_build_query($res);
            $result = https_requests($url,$res);
            if(isset($result["code"]) && $result["code"] == 0){
                return true;
            }else{
                \app\wxadmint1\model\OaLog::errorMessage($data["mobile_tel"],$result["reason"]);
                return false;
            }
        }catch (\Exception $e){
            dump($e->getMessage());
        }
        return true;
    }

}
