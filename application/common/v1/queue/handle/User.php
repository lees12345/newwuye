<?php
/**
 * Created by PhpStorm.
 * User: 奇奇
 * Date: 2020/4/19
 * Time: 2:35
 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;
use app\wxadmint1\model\Users as UsersModel;
/**
 * Class User
 * @package app\common\v1\queue\handle
 */
class User implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        dump($data["data"]);
        UsersModel::where("user_id","=",$data["data"]["user_id"])->update(["type_id"=>$data["data"]["type_id"]]);
    }

}