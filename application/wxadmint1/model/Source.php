<?php

namespace app\wxadmint1\model;


class Source extends \think\Model
{

    // 设置当前模型的数据库连接
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '39.106.76.253',
        // 数据库名
        'database'    => 'wx_extension',
        // 数据库用户名
        'username'    => 'devil',
        // 数据库密码
        'password'    => 'DevilQiqi',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => '',
        // 数据库调试模式
        'debug'       => false,
    ];

}