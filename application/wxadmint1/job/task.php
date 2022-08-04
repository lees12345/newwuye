<?php
namespace app\wxadmint1\job;

use think\queue\Job;

class Task{

public function fire(Job $job,$data){
//任务失败（重复）3次以上，删除该任务

            $data = ['touser' => ''.$data['user']["openid"].'', 'template_id' => ''.config("wx.tongzhi").'', 'url' => ''.sprintf(config("wx.shares"),base64_encode($data['user']["openid"]),base64_encode($data['idea']->s_id)).'', 'data' => ['first' => ['value' => '尊敬的会员'.base64_decode($data['user']["wx_nickname"]).'，您好:', 'color' => '#FF0000'], 'keyword1' => ['value' => ''.$data['idea']->s_code.'', 'color' => '#FF0000'], 'keyword2' => ['value' => '' . date("Y-m-d H:i:s",$data['idea']->s_addtime) . '' , 'color' => '#173177'],'keyword3' => ['value' => '' . $data['idea']->share_people . '' , 'color' => '#173177'],'remark' => ['value' => '' . $data['idea']->s_reason . '', 'color' => '#173177']]];
            // $data = ['touser' => ''.$openid["openid"].'', 'template_id' => 'sMWjBgIMtfnH0VQe5Ns7jL0xnhrbdiniOMFT4bQvG4U', 'url' => '' . $result["link_url"] . '', 'data' => ['first' => ['value' => '尊敬的'.base64_decode($openid["wx_nickname"]).'，您好:', 'color' => '#FF0000'], 'keyword1' => ['value' => '【'.$result["mt_name"].'】', 'color' => '#FF0000'], 'keyword2' => ['value' => '' . date("Y-m-d H:i:s",$result["add_time"]) . '' , 'color' => '#173177'],'remark' => ['value' => '' . $result["news_adstracts"] . '', 'color' => '#173177']]];

            $params = json_encode($data, JSON_UNESCAPED_UNICODE);


            $fp = fsockopen('api.weixin.qq.com', 80, $error, $errstr, 10);
            $http = "POST /cgi-bin/message/template/send?access_token={$data['access_token']} HTTP/1.1\r\nHost: api.weixin.qq.com\r\nContent-type: application/x-www-form-urlencoded\r\nContent-Length: " . strlen($params) . "\r\nConnection:close\r\n\r\n$params\r\n\r\n";

            fwrite($fp, $http);
            fclose($fp);


                        //成功之后
                        $job->delete();

            }
    
}
