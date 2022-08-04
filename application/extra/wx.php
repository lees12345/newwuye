<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/3/18
 * Time: 10:48
 */
return [
    "redis"=>[
        "host"=>'127.0.0.1',
        "port"=>6379,
        "password" => ''
    ],
    "only"=>[
        "appId" => "wxd9aed62de2979296",
        "AppSecret" => "4595f3456e39d1833c7c02cf07216b07",
        "Token"=>"wy236id5s6xwy",
        'token'          => 'wy236id5s6xwy',
        'appid'          => 'wxd9aed62de2979296',
        'appsecret'      => '4595f3456e39d1833c7c02cf07216b07',
        "encodingKey"=>"ujxT9PUo4DtwFfVcbYU7VwSe5J2KAQBAWVB9pk58TXY",
        // 配置商户支付参数（可选，在使用支付功能时需要）
        'mch_id'         => "1235704602",
        'mch_key'        => 'IKI4kpHjU94ji3oqre5zYaQMwLHuZPmj',
        // 配置商户支付双向证书目录（可选，在使用退款|打款|红包时需要）
        'ssl_key'        => '',
        'ssl_cer'        => '',
        // 缓存目录配置（可选，需拥有读写权限）
        'cache_path'     => '',
        "custom_service"=>"kf2001@gh_68778bd754d5",
        "template_id"=>"KzAoXA9SvQo8T7GvSXA6venBKKGped2mbRo2H6fXX0A",
        "wxpay" => [
            "app" => "app_1W1Ga554e5SC08CW"
        ],
        "price" =>1,
        "subject"=>"天信诚文化",
        "body"=>"天信诚文化",
        "welcom"=>[
            "welcom1" => "第一段",

            "welcom2" => "第二段",

            "welcom9"=>"第三段",
            ]
        ],


    "job_news"=>"app\\index\\lib\\job\\Task@zhitougu",
    "job_news_push"=>"app\\index\\lib\\job\\Task@sendphones",
    "job_news_click"=>"app\\index\\lib\\job\\Task@addUserNewsClick",
    "job_user_update"=>"app\\index\\lib\\job\\Task@UserUpdate",
    "job_send_customer"=>"app\\index\\lib\\job\\Task@sendguide",
    "queue_news"=>"group2",
    "queue_news_push" => "group2",
    "html_news"=>"http://only.1yuaninfo.com/index/news/index?name=%s&id=%s&openid=%s",
    "html_track"=>"http://only.1yuaninfo.com/index/news/track?name=%s&id=%s&openid=%s",
    "html_apply"=>"http://only.1yuaninfo.com/Underthegeneral/pages/details/notice.html?name=%s&num=%s&time=%s",
    "html_order"=>"http://only.1yuaninfo.com/thousands/pages/details/prompt.html?name=%s&time=%s",
    "server_send"=>"https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=%s",
    "html_pay_success"=>"http://only.1yuaninfo.com/Underthegeneral/pages/details/prompt.html?name=%s&time=%s",
    "ping" => [
        "apikey"=>"sk_live_jv18aLHeLGGGj5yLm5S4Cqz1",
        "keypath"=>"/data/share/jyy/key/huachuang.pem",
    ],
    "rule"=>[
        0 => "https://wjgzhgl.hczq.com/huachuangrules/begin/index.html?token=%s&reset=1",
        2 => "https://wjgzhgl.hczq.com/huachuangrules/question/index.html?token=%s&reset=1",
        3 => "https://wjgzhgl.hczq.com/huachuangrules/atyle/risk_type.html?type=%s&token=%s&reset=1",
        4 => "https://wjgzh.hczq.com/thousands/pages/compliance/risk.html?token=%s&reset=1",
    ],
    'template_array' =>[
        'addOrder' => 'hnoKEWUJlC6MUOnkTpOJ5TCxbl3aOSCR6tej8gWCaRw',
        'receive' => 'wiDa-BmnMuwit4K77-ai31_vMUJ2BL39yYEn2iM0HnU',
        'again' => 'hnoKEWUJlC6MUOnkTpOJ5TCxbl3aOSCR6tej8gWCaRw',
        'agains' => 'oNMNJcMfYf90ovo_eqZwcbFrSBpy5pAJxZ19hE1cA2Y',
        'end' => '05-uJgLXuJZSa6gSfA7w54T1emBuLQCug3qG58jefuM',
        'notice'=>'DKgH6jPOZM3uuKodF7HWw5TP-wWSqt8SS5bZDIwN5OA',
        'change'=>'coqrxt9zAHGuKNSTDDLKQHNrnovSZuQGeHHe8foOGEs',
    ],
    'jobClassName' => 'app\index\job\TemplateJob',
    'jobLaterClassName' => 'app\index\job\TemplateLaterJob',
    'jobQueueName' => 'NewTemplateJob',
    'type' => [1 => '物业维修',2 => '工程维修',3=>'公司事务'],
    'typeLink' => ['typeone'=> '物业维修申请','typetwo'=> '工程维修申请','typethr'=>'公司事务申请'],
    'auth' => [-1=>'无',0=>'员工',1=>'物业负责人',2=>'工程维负责人',3=>'事务负责人 ',4=>'企业管理员',5=>'企业BOSS'],
    'user_type' => [1=>'企业',2=>'商户',0=>'访客',3=>'游客'],
    'infoConLink' => 'http://estate.1yuaninfo.com/index/property/pdetail?id=',
    'user_picture' =>[
        '3'=>'http://estate.1yuaninfo.com/public/static/property_project/img/tourists.png',
        '2'=>'http://estate.1yuaninfo.com/public/static/property_project/img/merchants.png',
        '1'=>'http://estate.1yuaninfo.com/public/static/property_project/img/enterprise.png',
        '0'=>'http://estate.1yuaninfo.com/public/static/property_project/img/tourists.png',
    ],
];