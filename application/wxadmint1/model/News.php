<?php

namespace app\wxadmint1\model;

use app\common\v1\queue\Producer;
use app\zhitougu\exception\NewsException;
use think\Db;
use think\Cache;
use app\wxadmint1\model\News as NewsModel;
use app\wxadmint1\model\Users as UsersModel;
use app\wxadmint1\model\UserLearn;
use app\common\business\Order as BusOrder;
use think\exception\ValidateException;

class News extends Base
{

    //推送信息
    public static function addNews($param)
    {
        if($param['time'] != '' && strtotime($param['time']) < time())
        {
            throw new ValidateException('请填写正确的时间');
        }
        $utype = isset($param['user_type'])?$param['user_type']:[];
        $uauth = isset($param['user_auth'])?$param['user_auth']:[];

        $news = self::create([
            "mt_name" => $param["mt_name"],
            "remark" => $param["remark"],
            "first" => $param["first"],
            "new_content" => $param["new_content"],
            "title" => $param["title"],
            "users_type" => json_encode($utype),
            "user_auth" => json_encode($uauth),
            "news_adstracts" => $param["news_adstracts"],
            "time" => $param['time'],
        ]);

        if (!$news->id) {
            throw new NewsException();
        }
        if($param['time'] != '')
        {
            $time = $param['time'];
        }else{
            $time = date('Y-m-d H:i:s',time());
        }
        $info = [
            "remark" => $param["remark"],
            "first" => $param["first"],
            "content" => $param["news_adstracts"],
            "title" => $param["title"],
            "time" => $time,
            'url'=> config('wx.infoConLink').$news->id,
        ];

        if(empty($uauth) && empty($utype))
        {
            throw new ValidateException('客户类型和客户身份不能同时为空！');
        }
        if(empty($uauth) && !empty($utype))
        {
            $utypemap['type_id'] = ['in',$utype];
//            $utypemap['auth'] = -1;
            $utypemap['auth'] = ['neq',4];
            $openid = UsersModel::where($utypemap)->order('id desc')->column('openid');
        }
        if(!empty($uauth) && empty($utype))
        {
            $uauth = str_replace('4','',$uauth);
            $uauth = str_replace(',4','',$uauth);
            $authwhere['auth'] = ['in',$uauth];
            $openid = UsersModel::where($authwhere)->order('id desc')->column('openid');
        }
        if(!empty($uauth) && !empty($utype))
        {
            $uauth = str_replace('4','',$uauth);
            $uauth = str_replace(',4','',$uauth);
            $authwhere['auth'] = ['in',$uauth];
            $utype = str_replace('1','',$utype);
            $utype = str_replace(',1','',$utype);
            $utypemap['type_id'] = ['in',$utype];
            $openid = UsersModel::where($utypemap)->whereOr($authwhere)->order('id desc')->column('openid');
        }


        $tmpadmin = BusOrder::getInstance()->pushNoticeData('',$info);
        if($param['time'])
        {
            if(!empty($openid))
            {
                foreach($openid as $v)
                {
                    if($v)
                    {
                        $tmpdata = BusOrder::getInstance()->pushNoticeData($v,$info);
                        $url = $tmpdata['url'];
                        $openid = $tmpdata['touser'];
                        $tmpdata['url'] = $url.'&openid='.$openid;
                        BusOrder::getInstance()->sendTimePush($tmpdata,$param['time']);
                    }
                }
            }
            BusOrder::getInstance()->sendTimePush($tmpadmin,$param['time'],true);
        }else{
            if(!empty($openid)) {
                foreach ($openid as $v) {
                    if ($v) {
                        $tmpdata = BusOrder::getInstance()->pushNoticeData($v, $info);
                        $url = $tmpdata['url'];
                        $openid = $tmpdata['touser'];
                        $tmpdata['url'] = $url . '&openid=' . $openid;
                        BusOrder::getInstance()->sendPush($tmpdata, false);
                    }
                }
            }
            BusOrder::getInstance()->sendAdmin($tmpadmin);
        }

        return ;
    }



    /**
     * 群发
     */
    public static function send($param, $config, $id, $type = "")
    {
        //预约用户id集合
        $users_id = [];


        if ($type == '2') {
            $param['is_leading'] = 1;
            //推送的消息类型为跟踪
            // $param['mt_color'] = 1;
            $param['is_shares'] = 0;
            //查询用户
            $users = \app\wxadmint1\model\UserNewsClick::NewsClickList($param);
//            var_dump($users);exit;
            //    $data["url"] ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config["appId"]."&redirect_uri=". urlencode(sprintf(config("wx.html_track"),$param["name"],$id))."&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
        } else {
            //查询是否有预约的用户
            if (!empty($param["learn_id"]) && $param["learn_id"] != 0) {
                //查询所有预约用户并进行和现有用户的合并
                $users_id = UserLearn::getLearnIDUsers($param["learn_id"]);
            }
//            //查询是否有活动用户
//            if(!empty($param["activity_id"]) && $param["activity_id"] != 0){
//                //查询所有预约用户并进行和现有用户的合并
//                $users_id =  \app\wxadmint1\model\ActivityUsers::getActivityIDUsers($param["activity_id"]);
//            }
            // print_r($users_id);die;

            //查询相关类型用户
            if (empty($param["product_id"])) {
                $users = \app\wxadmint1\model\Users::searchUsersList($param["user_type"], $users_id);
            } else {
                //产品存在时
                $users = \app\wxadmint1\model\Users::searchUsersList($param["user_type"], $users_id);
            }
        }
        //  $users = \app\wxadmint1\model\CeshiUsers::where('wx_id','1')->select();

        //当推送用户不存在，直接返回
        if (!$users) {
            return false;
        }
        // 用户去重
//        $users = array_unique($users, SORT_REGULAR);

        //定义的job 和队列名(放config里)
        $job = config("wx.job_news");
        $queue = config("wx.queue_news");//队列名

        $data['template_id'] = $config['template_id'];
        $data["access_token"] = \app\index\lib\Account::get_access_token($config);
        if ($param['mt_color'] == '1') {
            $color = "#FF0000";
        } elseif ($param['mt_color'] == '2') {
            $color = "#173177";
        } else {
            $color = "#008000";
        }
        if ($param['is_shares'] == '1') {
            $colors = "#FF0000";
        } else {
            $colors = "#173177";
        }

        $up_users = [];
        foreach ($users as $v) {
            if (!in_array($v['id'], $up_users)) {
//            setRedis("users:openid:".$v["openid"],json_encode($v),3000);
                if (!empty($param['link_url'])) {
                    $data['url'] = $param['link_url'];
                } else {
                    if ($type == '2') {
                        $data['url'] = sprintf(config("wx.html_track"), $param["name"], $id, $v["openid"]);
                        //  $data["url"] = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config["appId"]."&redirect_uri=". urlencode(sprintf(config("wx.html_track"),$param["name"],$id))."&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
                    } else {
                        if ($param["is_url"] == 1) {
                            $data["url"] = sprintf(config("wx.html_news"), $param["name"], $id, $v["openid"]);
                        } else {
                            $data["url"] = "";
                        }
                    }
                }

                $data["openid"] = $v["openid"];
                $data["data"]["first"] = [
                    "value" => "尊敬的" . $v["wx_nickname"] . "，您好：",
                    "color" => "#FF0000"
                ];
                $data["data"]["keyword1"] = [
                    "value" => $v["wx_nickname"],
                    "color" => "#173177"
                ];
                $data["data"]["keyword2"] = [
                    "value" => $param["product_name"],
                    "color" => "#173177"
                ];
                $data["data"]["keyword3"] = [
                    "value" => date("Y-m-d H:i:s", time()),
                    "color" => "#173177"
                ];
                $data["data"]["keyword4"] = [
                    "value" => '【' . $param["mt_name"] . '】',
                    "color" => $color
                ];
                $data["data"]["remark"] = [
                    "value" => $param["news_adstracts"],
                    "color" => $colors
                ];
                $up_users[] = $v['id'];
                Producer::push(["type" => "onlysend", "expire" => 0, "data" => $data]);
//            \think\Queue::push($job,$data,$queue);
            }

        }
    }

    public static function sendAll($param, $config, $id, $type = "")
    {
        //预约用户id集合
        $users_id = [];

        if ($type == '2') {
            $param['is_leading'] = 1;
            //推送的消息类型为跟踪
            $param['mt_color'] = 1;
            //查询用户
            $users = \app\wxadmint1\model\UserNewsClick::NewsClickList($param);
//            $data["url"] ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config["appId"]."&redirect_uri=". urlencode(sprintf(config("wx.html_track"),$param["name"],$id))."&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
        } else {
            //查询是否有预约的用户
            if (!empty($param["learn_id"]) && $param["learn_id"] != 0) {
                //查询所有预约用户并进行和现有用户的合并
                $users_id = UserLearn::getLearnIDUsers($param["learn_id"]);
            }
            //查询相关类型用户
            if (empty($param["product_id"])) {
                $users = \app\wxadmint1\model\Users::searchUsersList($param["user_type"], $param["wx_id"], $users_id);
            } else {
                //产品存在时
                $users = \app\wxadmint1\model\Users::searchUsersList($param["user_type"], $param["wx_id"], $users_id);
            }
        }
//          $users = Db::name("users_test_push")->where('wx_id','1')->select();

        //当推送用户不存在，直接返回
        if (!$users) {
            return false;
        }
        if ($param['mt_color'] == '1') {
            $color = "#FF0000";
        } else {
            $color = "#008000";
        }
        //对用户分组
        $users = array_chunk($users, 60);

        //得到60个为一组的用户数据。
        $data["config"] = $config;
        $data["access_token"] = \app\index\lib\Account::get_access_token($config);
        $data["param"] = $param;
        $data["id"] = $id;
        $data["color"] = $color;
        $data["type"] = $type;
        foreach ($users as $v) {
            //需要传过去的有config color $param $v的数据
            $data["user"] = $v;
            Producer::push(["type" => "onlysend", "expire" => 0, "data" => $data]);
        }

//        $data['template_id'] = $config['template_id'];
//        $data["access_token"] = \app\index\lib\Account::get_access_token($config);
//
//
//        foreach($users as $v){
////            setRedis("users:openid:".$v["openid"],json_encode($v),3000);
//            if($type == '2') {
//                $data["url"] = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config["appId"]."&redirect_uri=". urlencode(sprintf(config("wx.html_track"),$param["name"],$id))."&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
//            }else{
//                if ($param["is_url"] == 1) {
//                    $data["url"] = sprintf(config("wx.html_news"), $param["name"], $id, $v["openid"]);
//                } else {
//                    $data["url"] = "";
//                }
//            }
//
//            $data["openid"] = $v["openid"];
//            $data["data"]["first"] = [
//                "value"=>"尊敬的".$v["wx_nickname"]."，您好：",
//                "color"=>"#FF0000"
//            ];
//            $data["data"]["keyword1"]=[
//                "value"=>$v["wx_nickname"],
//                "color"=>"#173177"
//            ];
//            $data["data"]["keyword2"]=[
//                "value"=>$param["product_name"],
//                "color"=>"#173177"
//            ];
//            $data["data"]["keyword3"]=[
//                "value"=>date("Y-m-d H:i:s",time()),
//                "color"=>"#173177"
//            ];
//            $data["data"]["keyword4"]=[
//                "value"=>$param["mt_name"],
//                "color"=>$color
//            ];
//            $data["data"]["remark"]=[
//                "value"=>$param["news_adstracts"],
//                "color"=>"#173177"
//            ];
//
//            \think\Queue::push($job,$data,$queue);
//        }
    }

    /*
    * 推送跟踪消息*/
    public static function addTrack($param, $cofig)
    {
        //print_R($param);die;
        //验证平台是否一致
        $is_news = static::where('id', $param['news_id'])->find();
        if (empty($is_news)) {
            throw new \app\admin\exception\NewsSearchException();
        }

        $news = \app\wxadmint1\model\NewsTrack::create([
            "news_id" => $param["news_id"],
            "mt_name" => $param["mt_name"],
            "product_name" => $param["product_name"],
            "news_adstracts" => $param["news_adstracts"],
            "news_content" => $param["news_content"],
            "add_time" => time(),
        ]);
        if (!$news->id) {
            echo "跟踪发送失败";
            die;
        }
        $type = '2';
        static::send($param, $cofig, $news->id, $type);
//        static::sendAll($param,$config,$news->id,$type);

    }


    /**
     * 详情
     * @param $id
     * @param string $wx_id
     * @return mixed
     */
    public static function newsDetail($id, $wx_id = "1")
    {
        $news = static::with(["information"])->where("id", "=", $id)->where("wx_id", "=", $wx_id)->find();
        if (!$news) {
            echo "信息不存在";
            die;
        }
        return $news;
    }

    /**
     * 信息修改
     * @param $param
     * @param $wx_id
     */
    public static function newsEdit($param)
    {
        //相关联
        try {
            static::where('id',$param['id'])->update(['new_content' => $param["new_content"]]);
        } catch (\Exception $e) {
            halt($e->getMessage());
        }
        return true;
    }

    /**
     * 展示列表
     */
    public static function listNews()
    {
        $where['is_show'] = 1;
        $list = static::where($where)->order('id desc');
        return $list->paginate(20, false, ['query' => request()->param()])->each(function ($item) {

            $item->users_type = json_decode($item->users_type,true);
            $item->user_auth = json_decode($item->user_auth,true);
            if(!empty($item->users_type))
            {
                $item->users_type = \app\wxadmint1\model\UsersType::where("type_id", "in", $item->users_type)->column("type_name");
                $item->users_type = implode('|',$item->users_type);
            }else{
                $item->users_type = '';
            }
            if(!empty($item->user_auth))
            {
                $item->user_auth = \app\wxadmint1\model\UsersType::where("type", "in", $item->user_auth)->column("type_name");
                $item->user_auth = implode('|',$item->user_auth);
            }else{
                $item->user_auth = '';
            }
        });
    }

    /*
   * 查询平台服务记录列表*/
    public static function getSendList($search = [])
    {
        if (empty($search)) {
            $data = Db::name('news')->field('id,news_code,add_time,shares_status,remark,end_time')->where('is_shares', '1')->order('id desc')->select();
        } else {
            $data = Db::name('news')->field('id,news_code,add_time,shares_status,remark,end_time')->where('is_shares', '1')->where($search)->order('id desc')->select();
        }


        return $data;
    }
}