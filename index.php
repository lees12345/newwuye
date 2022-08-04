<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header("Access-Control-Allow-Origin:zztong.1yuaninfo.com");
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding,authorization");

// [ 应用入口文件 ]
include __DIR__ ."/./vendor/WeChatDeveloper/include.php";
require __DIR__ . '/./vendor/Firebase/JWT/BeforeValidException.php';
require __DIR__ . '/./vendor/Firebase/JWT/ExpiredException.php';
require __DIR__ . '/./vendor/Firebase/JWT/JWT.php';
require __DIR__ . '/./vendor/Firebase/JWT/JWK.php';
require __DIR__ . '/./vendor/Firebase/JWT/Key.php';
require __DIR__ . '/./vendor/Firebase/JWT/SignatureInvalidException.php';

require __DIR__ . '/./vendor/Qiniu/autoload.php';
// 定义应用目录
define('APP_PATH', __DIR__ . '/./application/');
// 加载框架引导文件
require __DIR__ . '/./thinkphp/start.php';
set_time_limit(0);
