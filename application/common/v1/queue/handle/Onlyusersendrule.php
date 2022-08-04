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
class Onlyusersendrule implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        try {
            $data = $data["data"];
            self::Send($data);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
        return true;
    }
    public static function send($data)
    {
        try{
            $user = \app\index\model\Users::where("openid","=",$data["openid"])->field("id")->find();
            $attension = \app\index\model\UsersAttentionLog::getAttension($user["id"],$type=2);
            if(!$attension || $attension['send_number']<5){
                Account::send_service($data["openid"],$data["data"]["text"]["content"],$data['access_token'],"kf2003@gh_22eb327183c3","text");
            }
            if(!$attension){
                \app\index\model\UsersAttentionLog::addAttension($user["id"],$type=2);
            }else{
                if($attension["send_number"] < 5){
                    \app\index\model\UsersAttentionLog::updateAttension($attension);
                }
            }




        }catch (\Exception $e){

            var_dump($e->getMessage());

        }
    }

}