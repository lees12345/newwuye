<?php
namespace app\index\lib\job;

use app\index\lib\Account;
use think\queue\Job;
/**
 * queue队列消费者
* Class Task
 * @package app\index\lib\job
 */
class Task{
    /**
     * 消费者
     */
    public function zhitougu(Job $job,$data){
        if($job->attempts() > 3){
            //TODO
            //删除
            $job->delete();
        }else{
            try{
                $this->send($data);
            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
//                fredis()->zAdd('error_huachuang_pjy',time(),$e->getMessage());
                //重新发布该任务
                $job->release($delay);
            }
            $job->delete();
        }

    }

    public function qunfa(Job $job,$data){
        if($job->attempts() > 3){
            //TODO
            //删除
            $job->delete();
        }else{
            try{
                $this->qunfasend($data);
            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
                var_dump($e->getMessage());
                //重新发布该任务
                $job->release($delay);
            }
            $job->delete();
        }

    }

    /**
     * 发送模板消息
     * @param $data
     * @return mixed
     */
    public function qunfasend($data){

        foreach($data["users"] as $k => $v){
            $result = ['touser' => ''.$v["openid"].'', 'template_id' => ''.$data['template_id'].'', 'url' => ''.$data[$v["openid"]]["url"].'', 'data' => ['first' => ['value' => '尊敬的会员'.$v["wx_nickname"].'，您好:', 'color' => '#FF0000'],'keyword1' => ['value' => ''.$v["wx_nickname"] .'', 'color' => '#173177'], 'keyword2' => ['value' => '' . $data["param"]["product_name"] . '', 'color' => '#173177'], 'keyword3' => ['value' => '' .date("Y-m-d H:i:s",time()) . '' , 'color' => '#173177'],'keyword4' => ['value' => '' . $data["param"]["mt_name"]. '' , 'color' => ''.$data["color"].''],'remark' => ['value' => '' . $data["param"]["news_adstracts"] . '', 'color' => '#FF0000']]];
            $param[$k] = [
                'url' =>"https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $data["access_token"],
                'data' => $result,
            ];
        }
        $ac = new \app\common\lib\CurlMuti();
        $ac->set_param($param);
        $ac->send();

//        $data["data"]["keyword2"]=[
//            "value"=>$param["product_name"],
//            "color"=>"#173177"
//        ];
//        $data["data"]["keyword3"]=[
//            "value"=>date("Y-m-d H:i:s",time()),
//            "color"=>"#173177"
//        ];
//        $data["data"]["keyword4"]=[
//            "value"=>'【'.$param["mt_name"].'】',
//            "color"=>$color
//        ];
//        $data["data"]["remark"]=[
//            "value"=>$param["news_adstracts"],
//            "color"=>"#FF0000"
//        ];
//        $data["openid"] = $v["openid"];
//        $data["data"]["first"] = [
//            "value"=>"尊敬的".$v["wx_nickname"]."，您好：",
//            "color"=>"#FF0000"
//        ];
//        $data["data"]["keyword1"]=[
//            "value"=>$v["wx_nickname"],
//            "color"=>"#173177"
//        ];

    }

    //进行添加队列
    public function addUserNewsClick(Job $job,$data){
        if($job->attempts() > 3){
            $job->delete();
        }else{
            try{
                if(!\app\admin\model\UserNewsClick::where("news_id","=",$data["id"])->where("user_id","=",$data["user_id"])->field("id")->find()){
                    $result = \app\admin\model\UserNewsClick::create([
                        "news_id"=>$data["id"],
                        "user_id"=>$data["user_id"],
                        "add_time"=>time(),
                        "status"=>$data["status"],
                        "click_type"=>$data["click_type"],
                    ]);
                }

            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
                var_dump($e->getMessage());
                $job->release($delay);
            }
            $job->delete();
        }

    }

    //修改用户信息
    public function UserUpdate(Job $job,$data){
        if($job->attempts() > 3){
            $job->delete();
        }else{
            isset($data["type_id"]) ? $condition["type_id"]=$data["type_id"] : "";
            isset($data["experience_num"]) ? $condition["experience_num"]=$data["experience_num"] : "";
            try{
                if(!\app\admin\model\UserNewsClick::where("news_id","=",$data["news_id"])->where("user_id","=",$data["id"])->field("id")->find()){
                    \app\admin\model\Users::where("id","=",$data["id"])->update($condition);
                    \app\zhitougu\model\UserNewsClick::addSendRule($data['id']);
                }

            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
                $job->release($delay);
            }
            $job->delete();
        }
    }

    //进行修改队列
    public function updateUserNewsClick(Job $job,$data){
        if($job->attempts() > 3){
            $job->delete();
        }else{
            try{
                \app\admin\model\UserNewsClick::where("id","=",$data["id"])->update([
                    "click_type"=>$data["click_type"],
                ]);
            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
                $job->release($delay);
            }
            $job->delete();
        }

    }

    /**
     * 关注语推送客服
     */
    public function follow(Job $job,$data){
        if($job->attempts() > 3){
            //TODO
            //删除
            $job->delete();
        }else{
            try{
                $this->send_custom_follow($data);
                //处理数据库
            }catch (\Exception $e){
                fredis()->zAdd('error_huachuang_pjy',time(),$e->getMessage());
                $job->delete();
            }
            $job->delete();
        }
    }

    //关注语推送客服
    public function send_custom_follow($data){
       $result = Account::send_service_follow($data["config"],$data["data"]);
       return $result;
    }



    /**
     * 主动推送客服
     * @param Job $job
     * @param $data
     */
    public function custom(Job $job,$data){
        if($job->attempts() > 3){
            //TODO
            //删除
            $job->delete();
        }else{
            try{
                $this->send_custom($data);
            }catch (\Exception $e){
                $delay = 3;//$delay为延迟时间
                //重新发布该任务
                fredis()->zAdd('error_huachuang_pjy',time(),$e->getMessage());
                $job->release($delay);
            }
            $job->delete();
        }
    }

    /**
     *发送客服
     */
    public function send_custom($data){
        $result = Account::send_service($data["openid"],$data["content"],$data["access_token"],$data["account"],$data["type"]);
        return $result;
    }
    /**
     * 发送模板消息
     * @param $data
     * @return mixed
     */
    public function send($data){
        //发送模板消息
       $result = Account::push($data["access_token"],$data['template_id'],$data["openid"],$data["data"],$data["url"]);
       return $result;
    }

    /**
     * 关注语推送客服
     */
    public function resource(Job $job,$data){
        if($job->attempts() > 3){
            //TODO
            //删除
            $job->delete();
        }else{
            try{
                $this->add_resource($data["data"]);
                //处理数据库
            }catch (\Exception $e){
                dump($e->getMessage());
                $job->delete();
            }
            $job->delete();
        }
    }

    //
    public function add_resource($data){
        //查询是否 存在 手机号码 存在 全部 修改。
        //不存在则新增
        try{
        $user = \app\index\model\Users::where("user_tel","=",$data["mobile"])->find();

        $condition["resource_time"] = $data["create_time"];
        $condition["resource_remark"] = $data["remark"];
        $condition["user_name"] = $data["name"];
        $condition["account_time"] = $data["account_time"];
        $condition["birth_date"] = $data["birth_date"];
        $condition["risk"] = $data["risk"];
        $condition["funds"] = $data["funds"];


            if(!$user){
                $condition["type_id"] = 18;
                $condition["user_tel"] = $data["mobile"];
                $condition["user_status"] = 0;
                $condition["wx_id"] = 0;
                $condition["source"] = 0;
                $condition["experience_num"] = 0;
                \app\index\model\Users::create($condition);
            }else{
                \app\index\model\Users::where("user_tel","=",$data["mobile"])->update($condition);
            }

        }catch(\Exception $e){
            //错误入库
            fredis()->zAdd('error_huachuang_pjy',time(),$e->getMessage());
            return false;
        }




        return true;
    }
    /*
     * 注册后发送视频地址*/
    public function sendguide(Job $job,$data)
    {
        if($job->attempts() > 3){
            //TODO
            $job->delete();
        }else{
            try{
                $user = \app\index\model\Users::where("openid","=",$data["openid"])->field("id")->find();
                $attension = \app\index\model\UsersAttentionLog::getAttension($user["id"],$type=1);
                if(!$attension || $attension["is_click"] != 1){
                    Account::send_service($data["openid"],$data["data"]["text"]["content"],$data['access_token'],"kf2003@gh_22eb327183c3","text");
                }
            }catch(\Exception $e)
            {
                var_dump($e->getMessage());
            }

            //查询用户id 查询是否存在
            $delay = 18000;//$delay为延迟时间

            if(!$attension){
                \app\index\model\UsersAttentionLog::addAttension($user["id"],$type=1);
                $job->release($delay);
            }else{
                if($attension["is_click"] == 0 && $attension["send_number"] < 3){
                    $job->release($delay);
                    \app\index\model\UsersAttentionLog::updateAttension($attension);
                }
            }
            $job->delete();
        }
    }
    /*
    * 查看后发送视频地址*/
    public function sendrule(Job $job,$data)
    {
        if($job->attempts() > 3){
            //TODO
            $job->delete();
        }else{
            try{
                $user = \app\index\model\Users::where("openid","=",$data["openid"])->field("id")->find();
                $attension = \app\index\model\UsersAttentionLog::getAttension($user["id"],$type=2);
                if(!$attension || $attension['send_number']<5){
                    Account::send_service($data["openid"],$data["data"]["text"]["content"],$data['access_token'],"kf2003@gh_22eb327183c3","text");
                }
            }catch(\Exception $e)
            {
                var_dump($e->getMessage());
            }


            if(!$attension){
                \app\index\model\UsersAttentionLog::addAttension($user["id"],$type=2);
            }else{
                if($attension["send_number"] < 5){
                    \app\index\model\UsersAttentionLog::updateAttension($attension);
                }
            }
            $job->delete();
        }
    }

}