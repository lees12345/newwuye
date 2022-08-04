<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use think\facade\Queue;

/**
 * Class Auction 竞拍过期队列
 * @package app\common\v1\queue\handle
 */
class Popularize implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        $data = $data["data"];
        try{
            $res = \app\wxadmint1\model\Users::where("user_tel","=",$data["mobile_tel"])->find();
            //组装数据
            $condition["source_type"] = $data["source_type"];
            $condition["material"] = $data["material"];
            $condition["source_uid"] = $data["source_uid"];
            $condition["generalize_time"] = $data["create_time"];

            //当手机号不存在的时候  新增
            if(!$res){
                //新增
                $condition["user_tel"] = $data["mobile_tel"];
                $condition["type_id"] = 25;
                $condition["user_status"] = 0;
                $res = \app\wxadmint1\model\Users::create($condition);
                //记录日志
//                \app\wxadmint1\model\UserPopularize::create([
//                    "user_id" => $res["user_id"],
//                    "create_time" => time(),
//                    "phone" => $res["user_tel"]
//                ]);
            }else{
                //当手机号存在的时候 修改
                $res->save($condition);
                //记录日志
//                \app\wxadmint1\model\UserPopularize::create([
//                    "user_id" => $res["user_id"],
//                    "create_time" => time(),
//                    "phone" => $res["user_tel"]
//                ]);
            }
        }catch (\Exception $e){
            dump($e->getMessage());
        }
        return true;
    }

}
