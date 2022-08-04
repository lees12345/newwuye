<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 2021/12/30
 * Time: 11:18
 */
namespace app\index\job;

include __DIR__ ."/../../../vendor/WeChatDeveloper/include.php";

use think\Db;
use think\queue\Job;
use think\Log;
use app\wxadmint1\model\Users;
use app\index\model\Order;
use app\index\model\WelcomeQueue;

class TemplateLaterJob
{
    public function fire(Job $job,$data)
    {
        $job->delete();
        Log::info('模板消息推送：'.json_encode($data));
        $data = $data['data'];
        $order_id = isset($data['order_id'])?$data['order_id']:0;
        Log::info('order_id：'.$order_id);
        if($this->doJob($data,$order_id))
        {
            $job->delete();
        }else{
            $job->delete();
        }
    }

    private function doJob($data,$order_id=0)
    {
        if($order_id)
        {
            $order = Order::where('id',$order_id)->find();
            $order_status = $order['order_status'];
            Log::info('order_status:'.$order_status);
            if($order_status)
            {
                Log::info('不推送');
                return true;
                exit();
            }
        }
        $log_order_id = isset($data['log_order_id'])?$data['log_order_id']:0;
        if($log_order_id){
            unset($data['log_order_id']);
        }
        try {
            // 实例接口
            $wechat = new \WeChat\Template(config('wx.only'));

            // 执行操作
            $wechat->send($data);
            WelcomeQueue::create(['openid'=>$data['touser'],'desc'=>$data['data']['first']['value'],'status'=>1,'order_id'=>$log_order_id]);
            return true;
        } catch (Exception $e){
            WelcomeQueue::create(['openid'=>$data['touser'],'desc'=>$data['data']['first']['value'],'status'=>0,'order_id'=>$log_order_id]);
            // 异常处理
            Log::info($e->getMessage());
            return false;
        }
    }

    public function failed($data){
        Log::info('模板消息推送失败时间:'.date('Y-m-d H:i:s',time()));
        Log::info('模板消息推送失败:'.json_encode($data));
    }
}