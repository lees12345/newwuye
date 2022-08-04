<?php
namespace app\index\model;

use think\exception\ValidateException;
use think\Model;
use think\Db;
use app\wxadmint1\model\QuestionImage;

/**
 * 订单表
 * Class Order
 * @package app\index\model
 */
class Order extends Model{

    public function getAddTimeAttr($value)
    {
        return date("Y-m-d H:i:s", $value);
    }


    public function getStartTimeAttr($value){
        return date("Y.m.d",$value);
    }
    /*
    * 结束时间*/
    public function getEndTimeAttr($value){
        return date("Y.m.d",$value);
    }

    public function getRemarkImageAttr($value)
    {
        $imgs = $value;
        $item = json_decode($imgs);
        if(empty($item))
        {
            return [];
        }else{
            $img = implode(',',$item);
            return QuestionImage::where('question_img_id','in',$img)->column('img_url');
        }
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