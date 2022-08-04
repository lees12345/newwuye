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
class Resources implements QueueHandle
{

    use QueueTool;
    public static function fire(array $data = [])
    {
        self::Send($data["data"]);
        return true;
    }


    public static function Send($data)
    {
        try{
            //查询是否存在，不存在则添加

            if(!\app\wxadmint1\model\UsersSource::where("tel","=",$data["tel"])->where('type','=',$data['type'])->where('source','=',$data['source'])->find()){
                \app\wxadmint1\model\UsersSource::create($data);
            }

        }catch (\Exception $e){
            dump($e->getMessage());
        }
        return true;
    }

}
