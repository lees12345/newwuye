<?php

namespace app\index\lib\conceon;

use think\Db;

class Conceon
{

    public static function send($name, $openid, $config)
    {

        $job = "app\\index\\lib\\job\\Task@follow";
        $queue = 'welcome';//队列名
        $data = $config['welcom']['welcom1'];
        $data_lesson = $config['welcom']['welcom2'];
        $data9 = $config['welcom']['welcom9'];

        //关注推送介绍语
        if ($data) {
            $message = [
                "touser" => $openid,
                "msgtype" => "text",
                "text" => [
                    "content" => $data
                ]
            ];
            $res[] = \think\Queue::push($job, ["config" => $config, "data" => $message], $queue);
        }

        //关注推送课程
        if ($data_lesson) {
            $message_lesson = [
                "touser" => $openid,
                "msgtype" => "text",
                "text" => [
                    "content" => $data_lesson
                ],
                "customservice" => [
                    "kf_account" => 'kf2001@gsndd888'
                ]
            ];
            $res[] = \think\Queue::later(30, $job, ["config" => $config, "data" => $message_lesson], $queue);
        }


        //60s延迟平台声明
        if ($data9) {
            $message1 = [
                "touser" => $openid,
                "msgtype" => "text",
                "text" => [
                    "content" => $data9
                ],
                "customservice" => [
                    "kf_account" => 'kf2001@gsndd888'
                ]
            ];
            $res[] = \think\Queue::later(60, $job, ["config" => $config, "data" => $message1], $queue);
        }


        return $res;
    }

}