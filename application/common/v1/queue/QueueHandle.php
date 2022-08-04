<?php
/** Create By 旧梦与故人，Date 2020/4/11 */

namespace app\common\v1\queue;


interface QueueHandle
{
    # 出队操作
    public static function fire(array $data = []);

    # 入队操作
    public static function push(array $data = []);
}
