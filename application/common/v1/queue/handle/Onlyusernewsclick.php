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
class Onlyusernewsclick implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {

            $data = $data["data"];
            $re = self::Send($data);
            return true;
    }
    public static function send($data)
    {
        try{
            if(!\app\index\model\UserNewsClick::where("news_id","=",$data["id"])->where("user_id","=",$data["user_id"])->field("id")->find()){
                $result = \app\index\model\UserNewsClick::create([
                    "news_id"=>$data["id"],
                    "user_id"=>$data["user_id"],
                    "add_time"=>$data['time'],
                    "status"=>$data["status"],
                    "click_type"=>$data["click_type"],
                ]);
//                if($data["click_type"] == 1 || $data["click_type"] == 2){
//                    \app\index\model\UserNewsClick::addSendRule($data["user_id"]);
//                }
                return $result;
                //var_dump($result);
            }


        }catch (\Exception $e){

            var_dump($e->getMessage());

        }
    }

}