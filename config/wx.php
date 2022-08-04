<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/3/18
 * Time: 10:48
 */
return [
    "only" => [
        "appId" => "wxd9aed62de2979296",
        "AppSecret" => "4595f3456e39d1833c7c02cf07216b07",
        "Token" => "wy236id5s6xwy",
        'token'          => 'wy236id5s6xwy',
        'appid'          => 'wxd9aed62de2979296',
        'appsecret'      => '4595f3456e39d1833c7c02cf07216b07',
        "encodingKey" => "ujxT9PUo4DtwFfVcbYU7VwSe5J2KAQBAWVB9pk58TXY",
        "custom_service" => "kf2001@gh_68778bd754d5",
        "template_id" => "KzAoXA9SvQo8T7GvSXA6venBKKGped2mbRo2H6fXX0A",
//        "wxpay" => [
//            "app" => "app_1W1Ga554e5SC08CW"
//        ],
        "price" => 1,
        "subject"=>"天信诚文化",
        "body"=>"天信诚文化",
        "welcom"=>[
            "welcom1" => "第一段",

            "welcom2" => "第二段?",

            "welcom9"=>"第三段",
        ]
    ],

    "job_news" => "app\\index\\lib\\job\\Task@zhitougu",
    "job_news_push" => "app\\index\\lib\\job\\Task@sendphones",
    "job_news_click" => "app\\index\\lib\\job\\Task@addUserNewsClick",
    "job_user_update" => "app\\index\\lib\\job\\Task@UserUpdate",
    "job_send_customer" => "app\\index\\lib\\job\\Task@sendguide",
    "job_send_rule" => "app\\index\\lib\\job\\Task@sendrule",
    "queue_news" => "group2",
    "queue_news_push" => "group2",
    "html_news" => "http://zztong.admin.gszx77.com/index/news/index?name=%s&id=%s&openid=%s",
    "html_track" => "http://zztong.1yuaninfo.com/Underthegeneral/pages/details/tracking.html?name=%s&id=%s",
    "html_apply" => "http://zztong.1yuaninfo.com/Underthegeneral/pages/details/notice.html?name=%s&num=%s&time=%s",
    "html_order" => "http://zztong.1yuaninfo.com/thousands/pages/details/prompt.html?name=%s&time=%s",
    "server_send" => "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=%s",
    "html_pay_success" => "http://zztong.1yuaninfo.com/Underthegeneral/pages/details/prompt.html?name=%s&time=%s",
    "ping" => [
        "apikey" => "sk_live_jv18aLHeLGGGj5yLm5S4Cqz1",
        "keypath" => "/data/share/jyy/key/huachuang.pem",
    ],
    "rule" => [
        0 => "https://wjgzhgl.hczq.com/huachuangrules/begin/index.html?token=%s&reset=1",
        2 => "https://wjgzhgl.hczq.com/huachuangrules/question/index.html?token=%s&reset=1",
        3 => "https://wjgzhgl.hczq.com/huachuangrules/atyle/risk_type.html?type=%s&token=%s&reset=1",
        4 => "https://wjgzh.hczq.com/thousands/pages/compliance/risk.html?token=%s&reset=1",
    ]
];