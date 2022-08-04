<?php
namespace app\wxadmint1\controller;

use app\wxadmint1\model\OrderLog;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use think\Ucpaas;
use app\wxadmint1\model\Users as UsersModel;
use app\common\business\Order as BusOrder;

class Order extends Base
{
    public function index()
    {
        $request = Request::instance();
        $re = [];
        $condition = [];
        $conditions = [];
        $param = $request->except(["page"]);
        $page = $request->get("page");
        $count = array_key_exists("count", $param) ? $param["count"] : 10;

        if (array_key_exists("user_tel", $param) && $param["user_tel"]) {
            $condition["user_tel"] = ["like", '%' . trim($param['user_tel']) . '%'];
        }
        if (array_key_exists("order_status", $param) && $param["order_status"] !== '') {
            $condition['order_status'] = $param["order_status"];
        }
        if (array_key_exists("order_no", $param) && $param["order_no"] != "") {
            $condition["order_no"] = $param["order_no"];
        }
        if (array_key_exists("type", $param) && $param["type"] != "") {
            $condition["type"] = $param['type'];
        }

        //时间
        if (array_key_exists("end_order_time", $param) && $param["end_order_time"] && array_key_exists("end_order_time", $param) && $param["end_order_time"]) {
            $conditions = [strtotime($param['end_order_time']), strtotime($param['end_order_time'])];
        }
        $list = \app\wxadmint1\model\Order::AllOrderList($condition, $conditions, $re, $page, $count);

        $page = $list['data']->render();
        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();

        return $this->fetch('', [
            'data' => $list['data'],
            "adminid" => $adminid["group_id"],
            "page" => $page,
            "type" => config('wx.type'),
            "count" => $list['count']
        ]);
    }

    public function typeone()
    {
        $request = Request::instance();
        $re = [];
        $condition = [];
        $conditions = [];
        $param = $request->except(["page"]);
        $page = $request->get("page");
        $count = array_key_exists("count", $param) ? $param["count"] : 10;

        if (array_key_exists("user_tel", $param) && $param["user_tel"]) {
            $condition["user_tel"] = ["like", '%' . trim($param['user_tel']) . '%'];
        }
        if (array_key_exists("order_status", $param) && $param["order_status"] !== '') {
            $condition['order_status'] = $param["order_status"];
        }
        if (array_key_exists("order_no", $param) && $param["order_no"] != "") {
            $condition["order_no"] = $param["order_no"];
        }
        $condition["type"] = 1;
        //时间
        if (array_key_exists("end_order_time", $param) && $param["end_order_time"] && array_key_exists("end_order_time", $param) && $param["end_order_time"]) {
            $conditions = [strtotime($param['end_order_time']), strtotime($param['end_order_time'])];
        }
        $list = \app\wxadmint1\model\Order::AllOrderList($condition, $conditions, $re, $page, $count);

        $page = $list['data']->render();
        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();

        return $this->fetch('', [
            'data' => $list['data'],
            "adminid" => $adminid["group_id"],
            "page" => $page,
            "type" => config('wx.type'),
            "count" => $list['count']
        ]);
    }

    public function typetwo()
    {
        $request = Request::instance();
        $re = [];
        $condition = [];
        $conditions = [];
        $param = $request->except(["page"]);
        $page = $request->get("page");
        $count = array_key_exists("count", $param) ? $param["count"] : 10;

        if (array_key_exists("user_tel", $param) && $param["user_tel"]) {
            $condition["user_tel"] = ["like", '%' . trim($param['user_tel']) . '%'];
        }
        if (array_key_exists("order_status", $param) && $param["order_status"] !== '') {
            $condition['order_status'] = $param["order_status"];
        }
        if (array_key_exists("order_no", $param) && $param["order_no"] != "") {
            $condition["order_no"] = $param["order_no"];
        }
        $condition["type"] = 2;
        //时间
        if (array_key_exists("end_order_time", $param) && $param["end_order_time"] && array_key_exists("end_order_time", $param) && $param["end_order_time"]) {
            $conditions = [strtotime($param['end_order_time']), strtotime($param['end_order_time'])];
        }
        $list = \app\wxadmint1\model\Order::AllOrderList($condition, $conditions, $re, $page, $count);

        $page = $list['data']->render();
        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();

        return $this->fetch('', [
            'data' => $list['data'],
            "adminid" => $adminid["group_id"],
            "page" => $page,
            "type" => config('wx.type'),
            "count" => $list['count']
        ]);
    }

    public function typethr()
    {
        $request = Request::instance();
        $re = [];
        $condition = [];
        $conditions = [];
        $param = $request->except(["page"]);
        $page = $request->get("page");
        $count = array_key_exists("count", $param) ? $param["count"] : 10;

        if (array_key_exists("user_tel", $param) && $param["user_tel"]) {
            $condition["user_tel"] = ["like", '%' . trim($param['user_tel']) . '%'];
        }
        if (array_key_exists("order_status", $param) && $param["order_status"] !== '') {
            $condition['order_status'] = $param["order_status"];
        }
        if (array_key_exists("order_no", $param) && $param["order_no"] != "") {
            $condition["order_no"] = $param["order_no"];
        }
        $condition["type"] = 3;
        //时间
        if (array_key_exists("end_order_time", $param) && $param["end_order_time"] && array_key_exists("end_order_time", $param) && $param["end_order_time"]) {
            $conditions = [strtotime($param['end_order_time']), strtotime($param['end_order_time'])];
        }
        $list = \app\wxadmint1\model\Order::AllOrderList($condition, $conditions, $re, $page, $count);

        $page = $list['data']->render();
        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();

        return $this->fetch('', [
            'data' => $list['data'],
            "adminid" => $adminid["group_id"],
            "page" => $page,
            "type" => config('wx.type'),
            "count" => $list['count']
        ]);
    }

    /*
     * 进度详情*/
    public function detail()
    {
        $request = Request::instance()->param();
        $order_id = $request['order_id'];

        $share = OrderLog::with('users')->where('order_id',$order_id)->select();

        $this->assign('share', $share);
        return $this->fetch();

    }

    //增加订单
    public function add()
    {
        //查询产品
        $product = \app\wxadmint1\model\Product::order("id desc")->select();
        return $this->fetch('', [
            "product" => $product
        ]);
    }

    public function insert()
    {
        $param = Request::instance()->param();
        if (array_key_exists('name', $param)) {
            $param['wx_id'] = 1;
        }
        //添加入库
        \app\wxadmint1\model\Order::AddOrderList($param);
        $this->success('成功', 'wxadmint1/order/index');
    }

    //修改页面
    public function upd()
    {
        $param = Request::instance()->get();

        $data = \app\wxadmint1\model\Order::getOrderDetail($param);
        $this->assign('data', $data);
        $this->assign('type',config('wx.type'));
        return $this->fetch();
    }

    //处理修改
    public function upd_pro()
    {
        //接受信息
        $request = Request::instance()->post();
        $res = db('order')->where('id',$request['id'])->update(['type'=>$request['type']]);
        if($res)
        {
            $type = config('wx.type');
            $info = [
                'url'=>'http://estate.1yuaninfo.com/index/property/work?id='.$request['id'],
                'title'=>$type[$request['type']],
                'time'=>date('Y-m-d H:i:s',time()),
                'first'=>'您的服务类型已变更！',
                'remark'=>'如有疑问欢迎联系物业人员。',
            ];

            $user_id = db('order')->where('id',$request['id'])->value('user_id');
            $openid = db('users')->where('id',$user_id)->value('openid');

            $tmpdata = BusOrder::getInstance()->pushNoticeData($openid,$info,'change');
            BusOrder::getInstance()->sendPush($tmpdata);

            $openid = [];
            //推送给负责人消息
            $openid = UsersModel::where('auth',$request['type'])->column('openid');
            if($openid)
            {
                foreach($openid as $v)
                {
                    if($v)
                    {
                        $tmpdata = BusOrder::getInstance()->pushDate($v,$request['id']);
                        BusOrder::getInstance()->sendPush($tmpdata);
//                        $tmpdata = BusOrder::getInstance()->pushDate($v,$request['id'],'again');
//                        BusOrder::getInstance()->sendLaterPush($tmpdata,$request['id']);
                    }
                }
            }
        }
        return $this->success('修改成功', 'wxadmint1/order/index');

    }

    public function del()
    {
        //删除单个模板信息
        $request = Request::instance()->param();
        //print_R($request);die;
        $res = \app\wxadmint1\model\Order::where('id', $request['order_id'])->delete();
        if ($res) {
            $this->success('删除成功', 'wxadmint1/order/index');
        } else {
            $this->error('删除失败');
        }
    }

    // 用户生日性别分析统计
    public function show()
    {
        $data = \app\wxadmint1\model\Order::showData();
        $this->assign('data', $data);
        return $this->fetch();
    }

}