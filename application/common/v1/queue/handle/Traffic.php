<?php
/** Create By 旧梦与故人，Date 2020/4/11 */

namespace app\common\v1\queue\handle;


use app\common\v1\queue\QueueHandle;
use app\common\v1\queue\QueueTool;

class Traffic implements QueueHandle
{
    use QueueTool;

    public static function fire(array $data = [])
    {
        return false;
    }
}
