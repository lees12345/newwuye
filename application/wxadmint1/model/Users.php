<?php

namespace app\wxadmint1\model;

use app\common\lib\redis\Predis;
use think\Db;
use think\Model;
use think\Session;
use app\wxadmint1\model\Base as BaseModel;
use app\wxadmint1\model\Users as UsersModel;

class Users extends Model
{
    /**
     * 根据类型平台查询全部信息
     * @param $type_id
     * @param $wx_id
     */
    public static function searchUsersList($type_id, $wx_id, $users_id = [])
    {
        if (empty($users_id)) {
            //  $users = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->order('id desc')->select();
//            $users_two = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id", "in", $type_id)->where("user_status", "=", 1)->where('is_agree', 1)->order('id desc')->select();
            $users_two = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id", "in", $type_id)->where("user_status", "=", 1)->order('id desc')->select();

        } else {
            //查询勾选类型的用户
//            $users = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->where('add_time','<','1622649600')->order('id desc')->select();
//            $users_two = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->where('add_time','>','1622649600')->where('is_agree',1)->order('id desc')->select();
//            $data = array_merge($users,$users_two);
//            $users_three = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where('id','in',$users_id)->select();
//            return array_unique(array_diff($data,$users_three));
            //print_r($users_id);die;
            //  $users = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->where('add_time','<','1622649600')->whereOr("id","in",$users_id)->order('id desc')->select();
//            $users_two = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id", "in", $type_id)->where("user_status", "=", 1)->where('is_agree', 1)->whereOr("id", "in", $users_id)->order('id desc')->select();
            $users_two = static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id", "in", $type_id)->where("user_status", "=", 1)->whereOr("id", "in", $users_id)->order('id desc')->select();

        }
        return array_unique($users_two);

    }
//    public static function searchUsersList($type_id,$wx_id,$users_id=[]){
//        if(empty($users_id)){
//            return static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->select();
//        }else{
//            return static::field("id,openid,wx_nickname,type_id,wx_id,user_status,experience_num,user_tel")->where("type_id","in",$type_id)->where("wx_id","=",$wx_id)->where("user_status","=",1)->whereOr("user_id","in",$users_id)->select();
//        }
//
//    }
    //查询用户信息
    public static function AllUsersList($re = '', $groupId)
    {

        if (empty($re)) {
            $data = self::with(['types'])
                ->order('add_time desc')
                ->paginate(8, false, ['query' => request()->param()])->each(function ($item) {
                    $item->tuiguang = \app\wxadmint1\model\UserTuiGuang::where("mobile_tel", "=", $item->user_tel)->field("mobile_tel,create_time,source_uid")->find();
                    $item->tel = !empty($item->user_tel) ? substr_replace($item->user_tel, '******', 3, 6) : "";
                    $item->name = !empty($item->user_name) ? substr_replace($item->user_name, '**', 2) : "";
                });
            $count = self::with('types')
                ->count();
        } else {
            // 声明查询条件：2：注册点击声明；3：推送点击声明
            if (!empty($re['is_agree']) && in_array($re['is_agree'], [2, 3])) {
                // SELECT u.id,u.user_tel,m.id as mid,m.user_id FROM users u LEFT JOIN message_push_log m ON m.user_id = u.id WHERE m.id IS NOT NULL;
                // 注册点击
                if ($re['is_agree'] == 2) {
                    $re['is_agree'] = 1;
                    $data = self::alias('u')
                        ->join('message_push_log m', 'm.user_id=u.id', 'LEFT')
                        ->where($re)
                        ->whereNull('m.id')
                        ->order('u.add_time desc')
                        ->paginate(10, false, ['query' => request()->param()])->each(function ($item) {
                            $item->tel = !empty($item->user_tel) ? substr_replace($item->user_tel, '******', 3, 6) : "";
                            $item->name = !empty($item->user_name) ? substr_replace($item->user_name, '**', 2) : "";
                        });
                    $count = self::with('types')
                        ->alias('u')
                        ->join('message_push_log m', 'm.user_id=u.id', 'LEFT')
                        ->where($re)
                        ->whereNull('m.id')
                        ->count();
                } elseif (($re['is_agree'] == 3)) {
                    // 推送点击
                    $re['is_agree'] = 1;
                    $data = self::with(['types'])
                        ->alias('u')
                        ->join('message_push_log m', 'm.user_id=u.id', 'LEFT')
                        ->whereNotNull('m.id')
                        ->where('m.is_click', 1)
                        ->where($re)
                        ->order('u.add_time desc')
                        ->paginate(10, false, ['query' => request()->param()])->each(function ($item) {
                            $item->tel = !empty($item->user_tel) ? substr_replace($item->user_tel, '******', 3, 6) : "";
                            $item->name = !empty($item->user_name) ? substr_replace($item->user_name, '**', 2) : "";
                        });
                    $count = self::with('types')
                        ->alias('u')
                        ->join('message_push_log m', 'm.user_id=u.id', 'LEFT')
                        ->whereNotNull('m.id')
                        ->where('m.is_click', 1)
                        ->where($re)
                        ->count();
                }
            } else {
                // 正常查询点击、未点击声明用户列表
                $data = self::where($re)
                    ->order('add_time desc')
                    ->paginate(10, false, ['query' => request()->param()])->each(function ($item) {

                        $item->tel = !empty($item->user_tel) ? substr_replace($item->user_tel, '******', 3, 6) : "";
                        $item->name = !empty($item->user_name) ? substr_replace($item->user_name, '**', 2) : "";
                    });
                $count = self::where($re)
                    ->count();
            }

        }


        //print_r('1');die;
        $list['data'] = $data;
        $list['count'] = $count;
        return $list;
    }

    // 获取用户信息
    public static function getUserMessage($openid)
    {
        $users = self::where('openid',$openid)->find()->toArray();
        return $users;
    }


    //微信昵称
    public function getWxNicknameAttr($value)
    {
        return base64_decode($value);

    }
    public function getTypeIdAttr($value)
    {
        $status = config('wx.user_type');
        return $status[$value];
    }

    public function getAuthAttr($value)
    {
        $status = config('wx.auth');
        return $status[$value];
    }

    /*
     * 批量更改*/
    public static function updateDatas($list)
    {
        $user = new Users;
        $user->saveAll($list);
        return true;
    }

    /**
     * 查询未关注用户
     */
    public static function getNotAttentionUsers()
    {
        $data = self::where('user_status', 0)->select();
        return $data;
    }

}