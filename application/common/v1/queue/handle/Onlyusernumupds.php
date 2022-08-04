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
class Onlyusernumupds implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
            $data = $data["data"];
           // var_dump($data);
            $re = self::Send($data);
      var_dump($re);
    }
    public static function send($data)
    {

        try{
            isset($data["type_id"]) ? $condition["type_id"]=$data["type_id"] : "";
            isset($data["experience_num"]) ? $condition["experience_num"]=$data["experience_num"] : "";
           // return $data;die;
            $re = \app\index\model\Users::where("id","=",$data["id"])->update($condition);
            if($re)
            {
                $result = \app\index\model\UserNewsClick::addSendRule($data["id"]);
            }

            //    }
            return $result;



        }catch (\Exception $e){

            var_dump($e->getMessage());

        }
    }

}