<?php
/** Create By 旧梦与故人，Date 2020/4/11 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;
use app\index\model\UsersPlays as UsersPlaysModel;
class Service implements QueueHandle
{
    use QueueTool;

    public static function fire(array $data = [])
    {
        //存在则不添加
        try{
            $play = \app\index\model\UsersPlays::where('user_id','=',$data["data"]['user_id'])->where('s_id','=',$data["data"]['s_id'])->find();
            if(!$play){
                $plays = \app\index\model\UsersPlays::create($data["data"]);
            }
        }catch (\Exception $e){
            var_dump($e->getMessage());
        }

        return true;
    }
}
