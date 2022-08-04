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
class News implements QueueHandle
{

    use QueueTool;

    public static function fire(array $data = [])
    {
        //进行推送数据
        dump(1);
    }

}
