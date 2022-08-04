<?php

namespace app\wxadmint1\service;

use app\common\lib\redis\Predis;
use app\common\v1\queue\Producer;
use think\Db;
use app\wxadmint1\model\Base as BaseModel;
use think\cache\driver\Redis;
use think\Cache;
use app\wxadmint1\model\Share as ShareModel;
use app\wxadmint1\model\UserLearn as UserLearnModel;
use app\wxadmint1\model\Users as UsersModel;

class Share 
{
	public static function SendAll4($re,$type_id,$learn='')
    {
        $idea = ShareModel::get($re);
        redis()->set('dayshare' . $idea['s_id'], json_encode($idea), 86400);
        if ($idea['mt_id'] == 3) {
            $idea['s_code'] = '【上午分享】';
        } elseif ($idea['mt_id'] == 12) {
            $idea['s_code'] = '【体验股发布】';

        } else {
            $idea['s_code'] = '【下午分享】';
        }

        //推送信息
        $count = redis()->lLen("userPushList2020");
        if ($count > 0) {

            for ($i = 0; $i < $count; $i++) {
                $v = redis()->lPop('userPushList2020');
                $v = json_decode($v, true);
                $v1['shares'] = $idea;
                $v1['users'] = $v;
                //缓存用户信息到redis
                Producer::push(["type" => "share", "expire" => 0, "data" => $v1]);
            }
        } else {
            $learnUsers = array();
            //查询预约客户
            if (!empty($learn)) {
                $userIds = UserLearnModel::where('learn_id', '=', $learn['learn'])->where('userlearn_status', '=', 1)->select();
                //提起出user_id
                if ($userIds) {
                    $userIds = array_column($userIds, 'user_id');
                    $conlearn['user_id'] = array('in', $userIds);
                    $conlearn['user_status'] = '1';
                    $conlearn['type_id'] = array('not in', [1, 2, 10, 8, 7, 17, 6, 18, 20]);

                    //查询出用户信息
                    $learnUsers = UsersModel::all($conlearn);
//                //再次合并
//                $result = array_merge($result,$learnUsers);
                }

            } else {
                $learnUsers = array();
            }

            $ress = Db::name('users')->field(['user_id', 'openid', 'wx_nickname', 'type_id', 'user_holdnum', 'user_num'])->where('type_id', 'in', $type_id)->where('user_status', '1')->where("state", "=", 2)->order('user_id desc')->select();

            if (isset($learnUsers)) {
                $ress = array_merge($ress, $learnUsers);
            }


            //通道推送
            foreach ($ress as $k => $v) {
                redis()->set($v["openid"], json_encode($v), 7200);
                $v['shares'] = $idea;
                //缓存用户信息到redis
                Producer::push(["type" => "share", "expire" => 0, "data" => $v]);
            }


        }
        return true;
    }


}