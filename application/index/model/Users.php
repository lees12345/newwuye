<?php

namespace app\index\model;

use think\Model;
use think\Db;

class Users extends Model
{
    //获取用户openid 并获取详细信息入库
    public static function addUserMessage($openid,$config){
        //获取用户的信息 并入库
        $userInfo = self::getUserMessage($openid,$config);


        //redis查询属于哪个配置 通过appid查
      //  $wx_id =redis()->get($config["appId"]);
        //查询是否存在
        $user = self::field("id,openid,update_time,user_status,user_picture,add_time")->where("openid","=",$openid)->find();

        if(!$user){
            $where = [
                "openid"=>$openid,
//                "wx_nickname"=>base64_encode(isset($userInfo["nickname"])?$userInfo["nickname"]:''),
//                "user_picture"=>isset($userInfo["headimgurl"])?$userInfo["headimgurl"]:'',
                "add_time"=>time(),
              //  "wx_id"=>$wx_id
            ];
            $where["id"] = self::insertGetId($where);

            return $userInfo["nickname"];
        }
        $message = [
//            "wx_nickname"=>base64_encode(isset($userInfo["nickname"])?$userInfo["nickname"]:''),
//            "user_picture"=>isset($userInfo["headimgurl"])?$userInfo["headimgurl"]:'',
            "user_status"=>1,
            "update_time"=>time(),
            "add_time"=>$user["add_time"]
        ];
        self::where("id","=",$user["id"])->update($message);
        return $userInfo["nickname"];
    }

    //取消关注用户
    public static function UpdateOppenID($openid){
        $user = self::field("id,openid,update_time,user_status,user_picture,out_num,type_id")->where("openid","=",$openid)->find();
        $out_num = $user['out_num']+1;
        if($user){
            self::where("id","=",$user["id"])->update([
                "user_status"=>0,
                "out_time"=>time(),
                "out_num"=>$out_num,
            ]);
        }
    }

    //获取用户详细信息
    public static function getUserMessage($openid,$config){
        $access_token = \app\index\lib\Account::get_access_token($config);
        return \app\index\lib\Account::newUserInfo($access_token,$openid);
    }

    /*
   * 添加用户信息*/
    public static function InsertUsersInfo($userInfo)
    {
        $users = new Users();
        $users->openid = $userInfo['openid'];
        $users->wx_nickname = base64_encode($userInfo['nickname']);
        $users->user_status = '0';
        $users->user_picture =  $userInfo['headimgurl'];
        $users->save();
        return true;
    }
}