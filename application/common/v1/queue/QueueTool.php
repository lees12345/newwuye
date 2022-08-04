<?php
/** Create By 旧梦与故人，Date 2020/4/12 */

namespace app\common\v1\queue;


use app\exception\v1\QueueException;
use think\Queue;

trait QueueTool
{
    /**
     * 数据入队操作
     * @param array $data
     */
    public static function push(array $data = [])
    {
        if ($data['expire'] > 0){
            Queue::later($data['expire'],'app\\common\\v1\\queue\\Consumer', $data, $data['type']);
        }else{
            Queue::push('app\\common\\v1\\queue\\Consumer', $data, $data['type']);
        }
//        Log::channel('queue')->info('['.$data['type'].'入队执行成功：]'.json_encode($data));
    }

    public static function fire(array $data = [])
    {

    }


    /**
     * 检查队列类型是否存在
     * @param string $type 用户选择的队列类型
     * @param array $mapping 已开通的队列类型组合
     * @return string
     * @throws QueueException
     */
    public static function checkQueueTypeIsExist(string $type, array $mapping = [])
    {
        if (!isset($mapping[$type])) {
            throw new \Exception("队列类型不存在");
        }

        if (!is_string($mapping[$type])){
            throw new \Exception("队列操作器异常");
        }

        return $mapping[$type];
    }
}
