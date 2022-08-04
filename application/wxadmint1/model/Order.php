<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use think\exception\ValidateException;
use app\wxadmint1\model\Users;


class Order extends Base
{

    /*
   * 列表*/
    public static function AllOrderList($param, $conditions, $re, $page = "", $count = "")
    {
        //判断搜索条件是否存在
        if (!empty($param)) {
            $list = self::with('users')->where($param)->order('id desc');
            if ($conditions) {
                $list = $list->whereTime("add_time", "between", $conditions);
            }
            $data = $list->paginate($count, false, ['query' => request()->param()]);
            $data_count = self::where($param)->count();
        } else {
            if ($re) {
                $list = self::hasWhere('users', $re)->order('id desc');
            } else {
                $list = self::with('users')->order('id desc');
            }
            if ($conditions) {
                $list = $list->whereTime("add_time", "between", $conditions);
            }
            $data = $list->paginate($count, false, ['query' => request()->param()]);
            if ($re) {
                $data_count = self::hasWhere('users', $re)->count();
            } else {
                $data_count = self::with('users')->count();
            }
        }
        $datas['data'] = $data->each(function ($item) {
            $item->tel = fen_phone($item->user_tel);
            if($item->remark_image)
            {
                $item->remark_image = json_decode($item->remark_image);
                $img = implode(',',$item->remark_image);
                $item->remark_image = QuestionImage::where('question_img_id','in',$img)->column('img_url');
            }else{
                $item->remark_image = [];
            }
        });
        $datas['count'] = $data_count;
        return $datas;
    }


    /*
* 生成时间*/
    public function getAddTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }

    /** 接收时间*/
    public function getStartTimeAttr($value)
    {
        if($value)
        {
            return date("Y-m-d H:i:s", $value);
        }else{
            return '';
        }

    }

    /*
    * 结束时间*/
    public function getEndTimeAttr($value)
    {
        if($value)
        {
            return date("Y-m-d H:i:s", $value);
        }else{
            return '';
        };
    }


    /**
     * 订单状态
     */
    public function getOrderStatusAttr($value)
    {
        $status = [0 => '未接收', 1 => '处理中', 2 => '已完成'];
        return $status[$value];
    }


    /**
     * 服务类型
     */
    public function getTypeAttr($value)
    {
        $status = config('wx.type');
        return $status[$value];
    }

    /**
     * 服务类型
     */
    public function getReceiveAttr($value,$data)
    {
        $uid = $data['receive_uid'];
        $user = Users::where('id',$uid)->find();
        $name = empty($user['user_name'])?$user['user_tel']:$user['user_name'];
        return $name;
    }

    /**
     * 订单详情
     */
    public static function getOrderDetail($param)
    {
        //查询原订单
        $order = static::where('id', $param['order_id'])->find()->getData();
        if (!$order) {
            //订单不存在
            throw new \Exception("数据不存在");
        }
        return $order;
    }


    //搜索订单
    public static function getOrderList($re = '', $order = '')
    {
        if (!empty($re)) {
            $data = self::hasWhere('users,product', $re);
        } else {
            $data = self::hasWhere('users,product')->where($order);
        }
        //进行关联

        return $data;
    }

    //查询单个用户的所有订单
    public static function getOrderLists($re)
    {
        //进行关联
        $data = self::relation('product')->where('user_id', $re['user_id'])->where('order_status', '1')->select();
        return $data;
    }

    public function users()
    {
        return $this->hasOne("users", 'id', 'user_id')->field('id,user_name,user_tel,type_id');
    }

    public function product()
    {
        return $this->hasOne("product", 'product_id', 'product_id');
    }

    //订单入库
    public static function insertList($request)
    {
        $list = new Order($request);
// 过滤post数组中的非数据表字段数据
        $data = $list->allowField(true)->save();
        return $data;
    }

    /*
     * 接收任务并写日志
     */
    public static function postReceive($user_id,$id)
    {
        Db::startTrans();
        try{
            $data['receive_uid'] = $user_id;
            $data['start_time'] = time();
            $data['order_status'] = 1;
            $res = self::where('id',$id)->update($data);
            if(!$res)
            {
                throw new ValidateException('接收维修失败');
            }
            $res = self::addLog($id,$user_id,'接收维修');
            if(!$res)
            {
                throw new ValidateException('日志写入失败');
            }
            // 提交事务
            Db::commit();
            return ['code'=>1,'msg'=>$res];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return ['code'=>0,'msg'=>$e->getMessage()];
        }
    }

    /*
     * 完成任务并写日志
     */
    public static function postEnd($id)
    {
        Db::startTrans();
        try{
            $data['end_time'] = time();
            $data['order_status'] = 2;
            $res = self::where('id',$id)->update($data);
            if(!$res)
            {
                throw new ValidateException('完成失败');
            }
            $res = self::addLog($id,'','维修任务完成');
            if(!$res)
            {
                throw new ValidateException('日志写入失败');
            }
            // 提交事务
            Db::commit();
            return ['code'=>1,'msg'=>$res];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return ['code'=>0,'msg'=>$e->getMessage()];
        }
    }

    /*
     * 写入日志
     */
    public static function addLog($order_id,$user_id='',$log='',$desc='')
    {
        try{
            return OrderLog::create(['user_id'=>$user_id,'order_id'=>$order_id,'title'=>$log,'desc'=>$desc]);
        } catch (\Exception $e) {
            throw new ValidateException($e->getMessage());
        }
    }
}