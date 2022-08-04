<?php

namespace app\common\lib;

//模板配置类库相关接口

use app\common\Base;
use app\wxadmint1\model\Order;
use app\wxadmint1\model\Users;


class Tem extends Base
{
    private $url = "http://estate.1yuaninfo.com/index/property/work?id=";

    private function getOrder($order_id)
    {
        $info = Order::where('id',$order_id)->find();
        $info['order_remark'] = mb_substr($info['order_remark'],0,12,'utf-8');
        return $info;
    }

    private function getDate($name)
    {
        $info = db('tem_config')->where('name',$name)->find();
        $first = explode('|',$info['first']);
        $info['first']  = [];
        $info['first']['value'] = $first['0'];
        $info['first']['color'] = isset($first['1'])?$first['1']:'';
        $remark = explode('|',$info['remark']);
        $info['remark'] = [];
        $info['remark']['value'] = $remark['0'];
        $info['remark']['color'] = isset($remark['1'])?$remark['1']:'';
        return $info;
    }

    public function addOrder($data,$order_id)
    {
        $info = $this->getOrder($order_id);
        $getdate = $this->getDate('addOrder');
        if($getdate['url'])
        {
            $data['url'] = $this->url.$order_id;
        }
        $first = $getdate['first'];
        $remark = $getdate['remark'];
        $data['data']['first'] = [
            'value'=>isset($first['value'])?$first['value']:'您好，您有新的维修任务！',
            'color'=>isset($first['color'])?$first['color']:'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['contact'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>empty($info['user_tel'])?$info['phone']:$info['user_tel'],
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>$info['end_order_time'],
            'color'=>'#173177'
        ];
        $data['data']['keyword4'] = [
            'value'=>$info['order_remark'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($remark['value'])?$remark['value']:'请您登录公众号尽快处理！',
            'color'=>isset($remark['color'])?$remark['color']:'#173177'
        ];
        return $data;
    }

    public function receive($data,$order_id)
    {
        $info = $this->getOrder($order_id);
        $user = Users::where('id',$info['receive_uid'])->find();
        $getdate = $this->getDate('receive');
        if($getdate['url'])
        {
            $data['url'] = $this->url.$order_id;
        }
        $first = $getdate['first'];
        $remark = $getdate['remark'];
        $data['data']['first'] = [
            'value'=>isset($first['value'])?$first['value']:'您的报修已分配维修人员处理！',
            'color'=>isset($first['color'])?$first['color']:'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['order_no'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>$info['address'].$info['area'],
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>$info['order_remark'],
            'color'=>'#173177'
        ];
        $data['data']['keyword4'] = [
            'value'=>empty($user['user_name'])?$user['user_tel']:$user['user_name'].'('.$user['user_tel'].')',
            'color'=>'#173177'
        ];
        $data['data']['keyword5'] = [
            'value'=>$info['type'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($remark['value'])?$remark['value']:'我们服务人员会及时与您联系并上门服务。感谢您的支持，如有疑问，请拨打物业电话或到物业服务中心咨询!！',
            'color'=>isset($remark['color'])?$remark['color']:'#173177'
        ];
        return $data;
    }


    public function again($data,$order_id)
    {
        $info = $this->getOrder($order_id);
        $getdate = $this->getDate('again');
        if($getdate['url'])
        {
            $data['url'] = $this->url.$order_id;
        }
        $first = $getdate['first'];
        $remark = $getdate['remark'];
        $data['data']['first'] = [
            'value'=>isset($first['value'])?$first['value']:'您好，有一条新的报修还未处理！',
            'color'=>isset($first['color'])?$first['color']:'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['contact'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>empty($info['user_tel'])?$info['phone']:$info['user_tel'],
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>$info['end_order_time'],
            'color'=>'#173177'
        ];
        $data['data']['keyword4'] = [
            'value'=>$info['order_remark'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($remark['value'])?$remark['value']:'请您登录公众号尽快处理！',
            'color'=>isset($remark['color'])?$remark['color']:'#173177'
        ];
        return $data;
    }

    /*
     * 报修小区：{{keyword1.DATA}}
     * 负责客服：{{keyword2.DATA}}
     * 报修时间：{{keyword3.DATA}}
     * 报修内容：{{keyword4.DATA}}
     */
    public function agains($data,$order_id)
    {
        $info = $this->getOrder($order_id);
        $getdate = $this->getDate('again');
        if($getdate['url'])
        {
            $data['url'] = $this->url.$order_id;
        }
        $first = $getdate['first'];
        $remark = $getdate['remark'];
        $data['data']['first'] = [
            'value'=>isset($first['value'])?$first['value']:'有一条新的报修还未处理，业主需要您的帮助！',
            'color'=>isset($first['color'])?$first['color']:'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>'李女士',
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>'13888888888',
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>date('Y-m-d H:i:s',time()),
            'color'=>'#173177'
        ];
        $data['data']['keyword4'] = [
            'value'=>'测试任务',
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($remark['value'])?$remark['value']:'感谢您的关注！',
            'color'=>isset($remark['color'])?$remark['color']:'#173177'
        ];
        return $data;
    }

    /*
     * 报修位置：{{keyword1.DATA}}
     * 报修主题：{{keyword2.DATA}}
     * 维保人员：{{keyword3.DATA}}
     * 完成日期：{{keyword4.DATA}}
     */
    public function end($data,$order_id)
    {
        $info = $this->getOrder($order_id);
        $user = Users::where('id',$info['receive_uid'])->find();
        $tel = empty($info['user_tel'])?$info['phone']:$info['user_tel'];
        $getdate = $this->getDate('end');
        if($getdate['url'])
        {
            $data['url'] = $this->url.$order_id;
        }
        $first = $getdate['first'];
        $remark = $getdate['remark'];
        $data['data']['first'] = [
            'value'=>isset($first['value'])?$first['value']:'您的报修问题，已经为您处理完毕！',
            'color'=>isset($first['color'])?$first['color']:'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['address'].$info['area'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>$info['type'],
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>empty($user['user_name'])?$tel:$user['user_name'].'('.$tel.')',
            'color'=>'#173177'
        ];
        $data['data']['keyword4'] = [
            'value'=>$info['end_time'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>$info['order_remark'],
            'color'=>isset($remark['color'])?$remark['color']:'#173177'
        ];
        return $data;
    }

    /*
     * 标题：{{keyword1.DATA}}
     * 发布时间：{{keyword2.DATA}}
     * 内容：{{keyword3.DATA}}
     */
    public function notice($data,$info)
    {
        $data['url'] = isset($info['url'])?$info['url']:'';
        $data['data']['first'] = [
            'value'=>isset($info['first'])?$info['first']:'',
            'color'=>'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['title'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>$info['time'],
            'color'=>'#173177'
        ];
        $data['data']['keyword3'] = [
            'value'=>$info['content'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($info['remark'])?$info['remark']:'',
            'color'=>'#173177'
        ];
        return $data;
    }


    /*
    * 变更类型：{{keyword1.DATA}}
    * 变更时间：{{keyword2.DATA}}
    */
    public function change($data,$info)
    {
        $data['url'] = isset($info['url'])?$info['url']:'';
        $data['data']['first'] = [
            'value'=>isset($info['first'])?$info['first']:'',
            'color'=>'#173177'
        ];
        $data['data']['keyword1'] = [
            'value'=>$info['title'],
            'color'=>'#173177'
        ];
        $data['data']['keyword2'] = [
            'value'=>$info['time'],
            'color'=>'#173177'
        ];
        $data['data']['remark'] = [
            'value'=>isset($info['remark'])?$info['remark']:'',
            'color'=>'#173177'
        ];
        return $data;
    }

}