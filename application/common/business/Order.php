<?php

namespace app\common\business;

use app\common\Base;
use app\common\lib\Tem;
use app\common\lib\Upload;
use app\index\model\Users as UsersModel;
use app\index\model\Order as OrderModel;
use app\index\model\OrderLog as OrderLogModel;
use app\index\model\UsersGrade;
use think\Log;
use think\Queue;
use think\Db;

class Order extends Base
{
    private $OrderModel;
    private $UsersModel;
    private $OrderLogModel;
    public function __construct()
    {
        $this->OrderModel = new OrderModel();
        $this->UsersModel = new UsersModel();
        $this->OrderLogModel = new OrderLogModel();
    }

    /*
     * 消息推送队列
     */
    public function sendPush($data,$is_admin=true)
    {

        $jobDate['data'] = $data;

        if($is_admin)
        {
            $this->sendAdmin($data);
        }

        $res = Queue::later(2,config('wx.jobClassName'),$jobDate,config('wx.jobQueueName'));

        return $res;
    }

    /*
     * 消息推送给管理员
     */
    public function sendAdmin($data,$orderid=0)
    {
        if($orderid)
        {

            $openid = UsersModel::where('auth',4)->column('openid');
            if($openid)
            {
                foreach($openid as $v)
                {
                    $newData = $data;
                    $newData['touser'] = $v;
                    if($newData['url'])
                    {
                        $newData['url'] =  $newData['url'].'&openid='.$v;
                    }
                    $jobNewDate['data'] = $newData;
                    $jobNewDate['order_id'] = $orderid;
                    Queue::later(600,config('wx.jobClassName'),$jobNewDate,config('wx.jobQueueName'));
                }
            }

        }else{
            $openid = UsersModel::where('auth',4)->column('openid');
            if($openid)
            {
                foreach($openid as $v)
                {
                    $newData = $data;
                    $newData['touser'] = $v;
                    if($newData['url'])
                    {
                        $newData['url'] =  $newData['url'].'&openid='.$v;
                    }
                    $jobNewDate['data'] = $newData;
                    Queue::push(config('wx.jobClassName'),$jobNewDate,config('wx.jobQueueName'));
                }
            }
        }
        return;
    }

    /*
     * 消息延迟推送队列
     */
    public function sendLaterPush($data,$order_id,$is_admin=true)
    {
        $jobDate['data'] = $data;
        $jobDate['order_id'] = $order_id;

        if($is_admin)
        {
            $this->sendAdmin($data,$order_id);
        }

        $res = Queue::later(600,config('wx.jobClassName'),$jobDate,config('wx.jobQueueName'));
        $res = Queue::later(3600,config('wx.jobClassName'),$jobDate,config('wx.jobQueueName'));
        $res = Queue::later(7200,config('wx.jobClassName'),$jobDate,config('wx.jobQueueName'));

        return $res;
    }

    /*
     * 消息按时间延迟推送队列
     */
    public function sendTimePush($data,$time,$is_admin=false,$order_id=0)
    {
        $jobNewDate['order_id'] = $order_id;
        $jobNewDate['data'] = $data;
        $time = strtotime($time)-time();
        if($time>0)
        {
            if($is_admin)
            {
                $openid = UsersModel::where('auth',4)->column('openid');
                if($openid)
                {
                    foreach($openid as $v)
                    {
                        $newData = $data;
                        $newData['touser'] = $v;
                        $jobNewDate['data'] = $newData;
                        $res = Queue::later($time,config('wx.jobClassName'),$jobNewDate,config('wx.jobQueueName'));
                    }
                }else{
                    return false;
                }
            }else{
                $res = Queue::later($time,config('wx.jobClassName'),$jobNewDate,config('wx.jobQueueName'));
            }

            return $res;
        }else{
            return false;
        }
    }

    public function getAuth($data,$user_id)
    {
        $user = UsersModel::where('id',$user_id)->find();
        if($user['auth'] < 1)
        {
            $type_id = $user['type_id'];
            if(!$type_id ||  $type_id == 3  || ($type_id == 1 && $data['type'] != 3) || ($type_id == 2 &&  $data['type'] == 3))
            {
                return ['code'=>0,'msg'=>'抱歉您暂时没有权限！'];
            }
        }
        return ['code'=>1,'msg'=>'通过！'];
    }

    public function postOrder($data,$user_id)
    {
        $user = UsersModel::where('id',$user_id)->find();
        if($user['auth'] < 1)
        {
            $type_id = $user['type_id'];
            if(!$type_id ||  $type_id == 3 || ($type_id == 1 && $data['type'] != 3) || ($type_id == 2 && $data['type'] == 3))
            {
                return ['code'=>0,'msg'=>'抱歉您暂时没有权限！'];
            }
        }
        $strs = md5(mt_rand().time().$user_id.mt_rand());
        $order_no = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),10);
        $data['user_id'] = $user_id;
        $data['add_time'] = time();
        $data['order_no'] = $order_no;
        //图片
        $image = $data['image'];
        unset($data['image']);
        if(!is_array($image))
        {
            $image = json_decode($image);
        }
        $img = [];
        foreach ($image as $item) {
            if($item)
            {
                $img[] = Db::table('question_image')->insertGetId(['img_url'=>$item]);
            }
        }
        $data['remark_image'] = json_encode($img);

        $number = OrderModel::create($data);
        if($number)
        {
            //推送给负责人消息
            $openid = UsersModel::where('auth',$data['type'])->column('openid');
            Log::info('Openid:'.json_encode($openid));
            $tmpdata = $this->pushDate('',$number['id']);
            $this->sendAdmin($tmpdata);
            $tmpdata = $this->pushDate('',$number['id'],'again');
            $this->sendAdmin($tmpdata,$number['id']);
            if($openid)
            {
                foreach($openid as $v)
                {
                    if($v)
                    {
                        $tmpdata = $this->pushDate($v,$number['id']);
                        $this->sendPush($tmpdata,false);
                        $tmpdata = $this->pushDate($v,$number['id'],'again');
                        $this->sendLaterPush($tmpdata,$number['id'],false);
                    }
                }

            }
        }
        return ['code'=>1,'msg'=>$number];
    }

    public function pushDate($openid,$order_id,$tem='addOrder')
    {
        $data['touser'] = $openid;
        $data['url'] = '';
        $template = config('wx.template_array');
        $data['template_id'] = $template[$tem];
        $data = Tem::getInstance()->$tem($data,$order_id);
        $data['log_order_id'] = $order_id;
        return $data;
    }

    public function pushNoticeData($openid,$info,$tem='notice')
    {
        $data['touser'] = $openid;
        $template = config('wx.template_array');
        $data['template_id'] = $template[$tem];
        $data = Tem::getInstance()->$tem($data,$info);
        return $data;
    }

    public function getUserInfo($openid)
    {
        $info = UsersModel::where('openid',$openid)->field('id,user_tel,openid,user_name,type_id,auth,user_picture,wx_nickname')->find();
        if(!$info['user_picture'])
        {
            $picturearr = config('wx.user_picture');
            $info['user_picture'] = $picturearr[$info['type_id']];
        }
        if(!$info['user_tel'])
        {
            $arr = ['code'=>0,'msg'=>'用户信息缺失，请重新登录！'];
        }else{
            $arr = ['code'=>1,'msg'=>$info];
        }
        return $arr;
    }

    public function getOrderNum($user_id)
    {
        $where = [];
        $user = UsersModel::where('id',$user_id)->find();
        if(!$user['auth'] || $user['auth'] < 4) {
            $where['user_id'] = $user_id;
        }

        $number = OrderModel::where($where)->field('count(order_status) as num,order_status')->group('order_status')->select();
        $number = collection($number)->toArray();
        $num = array_column($number,'num','order_status');
        $arr = ['0','1','2'];
        foreach($arr as $v)
        {
            if(!isset($num[$v]))
            {
                $num[$v] = 0;
            }
        }
        $num['total'] = OrderModel::where($where)->count();

        $where['look'] = ['not like','%'.$user_id.'%'];
        $number = OrderModel::where($where)->field('count(type) as num,type')->group('type')->select();
        $numbers = collection($number)->toArray();
        $number = array_column($numbers,'num','type');
        $arr = [1,2,3];
        foreach($arr as $v)
        {
            if(!isset($number[$v]))
            {
                $number[$v] = 0;
            }
        }
        if(in_array($user['auth'],$arr))
        {
            $map['type'] = $user['auth'];
            $map['look'] = ['not like','%'.$user_id.'%'];
            $n = OrderModel::where($map)->count();
            $number[$user['auth']] = $n;
        }
        $num['type'] = $number;

        $status = OrderModel::where($where)->field('count(order_status) as num,order_status')->group('order_status')->select();
        $status = collection($status)->toArray();
        $status = array_column($status,'num','order_status');
        $arr = [0,1,2];
        $lstatus = [];
        foreach($arr as $v)
        {
            if(!isset($status[$v]))
            {
                $status[$v] = 0;
            }
            $lstatus[$v+1] = $status[$v];

        }
        $num['status'] = $lstatus;
        return $num;
    }

    public function getOrderList($user_id,$data)
    {

        $auth = UsersModel::where('id',$user_id)->value('auth');
        $where = [];
        if(isset($data['type']) && $data['type'] > 0)
        {
            if($data['type'] != $auth)
            {
                if($auth < 4) //不是负责人 负责人类型和查询类型不一致 负责人类型不是总负责人
                {
                    $where['user_id'] = $user_id;
                }
            }
            $where['type'] = $data['type']*1;
        }else{
            if($auth < 4)
            {
                $where['user_id'] = $user_id;
            }
        }

        if(isset($data['order_status']) && is_numeric($data['order_status']))
        {
            $where['order_status'] = $data['order_status'];
        }

        $list = OrderModel::all($where);

        if($list)
        {
            foreach ($list as $k=>$v) {
                if(($v['type'] == $auth || $auth == 4) && $v['order_status'] == 0)
                {
                    $v['is_auth'] = 1;
                }else{
                    $v['is_auth'] = 0;
                }
                $v['auth'] = $auth;
                $list[$k] = $v;
            }
        }
        return $list;
    }

    public function postReceive($user_id,$id)
    {
        $auth = UsersModel::where('id',$user_id)->value('auth');
        $order = db('order')->where('id',$id)->find();

        $order_status = $order['order_status'];

        if($order_status)
        {
            return ['code'=>0,'msg'=>'订单在处理中或完成状态！'];
        }

        $type = $order['type'];

//        if($auth != 4)
//        {
        if($auth != $type)
        {
            return ['code'=>0,'msg'=>'没有权限！'];
        }
//        }

        $info = OrderModel::postReceive($user_id,$id);

        if($info['code'])
        {
            //推送给用户消息
            $openid = UsersModel::where('id',$order['user_id'])->value('openid');
            Log::info('接收任务！');
            $tmpdata = $this->pushDate($openid,$id,'receive');
            $this->sendPush($tmpdata);
        }

        return $info;
    }

    public function addOrderLog($user_id,$data)
    {
        return OrderModel::addLog($data['id'],$user_id,$data['title'],$data['desc']);
    }

    public function getOrderLogList($user_id,$id)
    {
        $user = UsersModel::where('id',$user_id)->field('id,user_tel,openid,user_name,type_id,auth,user_picture,wx_nickname')->find();

        $user['order_remark'] = OrderModel::where('id',$id)->value('order_remark');

        $list = OrderLogModel::where('order_id',$id)->order('id desc')->select();

        $user['list'] = $list;

        return $user;
    }

    public function getOrderInfo($user_id,$id)
    {
        $info = OrderModel::where('id',$id)->find();

        $auth = UsersModel::where('id',$user_id)->value('auth');
        if(($info['type'] == $auth || $auth == 4) && $info['order_status'] == 0)
        {
            $info['is_auth'] = 1;
        }else{
            $info['is_auth'] = 0;
        }

        if(!$info)
        {
            return ['code'=>0,'msg'=>'未找到任务信息！'];
        }

        return ['code'=>1,'msg'=>$info];

    }

    public function postEnd($id)
    {
        $order = db('order')->where('id',$id)->find();

        $order_status = $order['order_status'];

        if($order_status == 2)
        {
            return ['code'=>0,'msg'=>'订单已经完成！'];
        }

        $info = OrderModel::postEnd($id);

        if($info['code'])
        {
            //推送给用户消息
            $openid = UsersModel::where('id',$order['user_id'])->value('openid');
            $tmpdata = $this->pushDate($openid,$id,'end');
            $this->sendPush($tmpdata);
        }

        return $info;
    }

    public function editUserInfo($data,$user_id)
    {
        return UsersModel::where('id',$user_id)->update($data);
    }

    public function files($data)
    {
        //得到文件对象
        $base64_image_content = $data['file'];
        $addName = rand();
        $str = $this->upload($base64_image_content,$addName);

        if($str['code']){
            return array(
                'code'=>1,
                'msg'=>$str['msg']
            );
        } else {
            return array(
                'code'=>0,
                'msg'=>$str['msg']
            );
        }
    }

    public function upload($base64_image_content,$addName)
    {
        $base64_image_content = trim($base64_image_content);
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = "./uploads/".date('Ymd',time());
            if(!file_exists($new_file))
            {
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0777);
            }
            $new_file = $new_file.'/'.md5($addName).".{$type}";
            //解码图片
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                //调用七牛云上传
                $res = Upload::getInstance()->qinius($new_file,md5($addName));
                if($res['code']){
                    unlink($new_file);
                    return ['code'=>1,'msg'=>$res['key']];
                } else {
                    // 上传失败获取错误信息
                    return ['code'=>0,'msg'=>$res['msg']];
                }
            }else{
                unlink($new_file);
                return ['code'=>0,'msg'=>'图片保存本地失败'];
            }
        }
    }

    public function getToken()
    {
        return Upload::getInstance()->getToken();
    }

    public function postLook($data,$uid)
    {
        $look = db('order')->where('id',$data['id'])->value('look');
        if($look)
        {
            if(strstr($look,$uid.'') == false)
            {
                $look = $look.','.$uid;
                return db('order')->where('id',$data['id'])->update(['look'=>$look]);
            }
        }else{
            $look = $uid;
            return db('order')->where('id',$data['id'])->update(['look'=>$look]);
        }

        return '';
    }

    public function postGrade($data,$uid)
    {
        $data['uid'] = $uid;
        //图片
        $image = $data['image'];
        unset($data['image']);
        if(!is_array($image))
        {
            $image = json_decode($image);
        }
        $img = [];
        foreach ($image as $item) {
            if($item)
            {
                $img[] = Db::table('question_image')->insertGetId(['img_url'=>$item]);
            }
        }
        $data['image'] = json_encode($img);
        return db('users_grade')->insertGetId($data);
    }

    public function getGradeList($data)
    {
        $where['oid'] = $data['oid'];
        return UsersGrade::where($where)->select();
    }

    public function getGradeInfo($data)
    {
        $where['id'] = $data['id'];
        return UsersGrade::where($where)->find();
    }
}