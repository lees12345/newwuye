<?php
/** Create By 嗝嗝与故人，Date 2020/3/30 */

namespace app\common\v1\queue;

use think\queue\Job;

class Consumer
{

    public function fire(Job $job, $data){

        // TODO : 如果处理失败，并且轮回次数大于3次
        if ($job->attempts() > 3) {
            $this->failed($data);
            $job->delete();
            return;
        }

        // TODO : 执行队列数据处理
        $config = config('queue');
        $namespace = static::checkQueueTypeIsExist($data['type'], $config['mapping']);
        if (method_exists($namespace,$config['fire_method'])){
            $res = call_user_func_array([$namespace, $config['fire_method']], [$data]);
            if (!$res){
//                $job->release();
                return;
            }
//            Log::channel('queue')->info('['.$data['type'].'出队执行成功：]'.json_encode($data));
        }else{
//            Log::channel('queue')->warning('['.$data['type'].'操作文件方法异常：]'.json_encode($data));
        }
        $job->delete();
    }

    public function failed($data){
        // ...任务达到最大重试次数后，失败了
//        Log::channel('queue')->error('['.$data['type'].'错误：]'.json_encode($data));
    }


    private static function checkQueueTypeIsExist(string $type, array $mapping = []){
        return QueueTool::checkQueueTypeIsExist($type,$mapping);
    }
}
