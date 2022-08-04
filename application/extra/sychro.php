<?php

return [
    "default"=>"pro",
    "dev"=>[
        "host" => "http://61.190.32.52:8003/",
        "url"=>"kura-service/kelai/LiveAdd/",
        "CELEID"=>30300,
        "GROUPID"=>401,
        "header"=>[
            "CLIENT" => "web",
            "APPID" => "web-1493969815",
            "NONCE" => "%s",
            "CURTIME"=>"%s",
            "OPENKEY"=>"9bf74e4ff355f6a0ac83296411858ebb",//MD5(APPID+NONCE+CURTIME+SECRET)
            'USERID'=>0,
            "method"=>"post",
        ],
    ],
    "pro"=>[
        "host" => "http://php.api.guba.com/",
        "url"=>"kura-service/kelai/LiveAdd/",
        "CELEID"=>39459,
        "GROUPID"=>251,
        "header"=>[
            "CLIENT" => "web",
            "APPID" => "web-799993",
            "NONCE" => "%s",
            "CURTIME"=>"%s",
            "OPENKEY"=>"3902e2bc9b77e919f70281fc1436c5b3",//MD5(APPID+NONCE+CURTIME+SECRET)
            'USERID'=>0,
            "method"=>"post",

        ],
    ],
];