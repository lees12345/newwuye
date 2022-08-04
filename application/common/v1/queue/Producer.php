<?php
/** Create By 嗝嗝与故人，Date 2020/3/30 */

namespace app\common\v1\queue;


class Producer
{

    protected static $struct = [
        'type' => 'sms', # 队列类型
        'expire' => 0, # 过期/延时时间，单位秒
        'data' => [] # 用户数据
    ];

    /**
     * 消息入队列
     * @param array $data
     * @return mixed
     * @throws QueueException
     */
    public static function push(array $data = [])
    {
        $fitter = static::check($data);
        $config = config('queue');
        $namespace = static::checkQueueTypeIsExist($fitter['type'], $config['mapping']);
        try {
            return call_user_func_array([$namespace, $config['push_method']], [$fitter]);
        }catch (\Exception $exception){
            throw new \Exception("入队失败");
        }

    }

    /**
     * 检验数据格式
     * @param array $data
     * @return array
     * @throws QueueException
     */
    private static function check(array $data = [])
    {
        if (!empty(array_diff_key(static::$struct, $data))) {
            throw new \Exception("数据异常");
        }
        return array_intersect_key($data,static::$struct);
    }

    private static function checkQueueTypeIsExist(string $type, array $mapping = []){
        return QueueTool::checkQueueTypeIsExist($type,$mapping);
    }
}
