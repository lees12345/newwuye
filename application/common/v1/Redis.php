<?php
/*
* Created by DevilKing
* Date: 2019- 07-15
*Time: 15:52:
*/

namespace app\common\v1;

class Redis
{
    /** @var \Redis $redis  */
    public $redis;

    /** @var static 定义单例模式的变量  */
    private static $_instance = null;


    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){}

    /**
     * 获取Redis句柄
     * @return \Redis
     * @throws \Exception
     */
    public static function getRedis(): \Redis
    {
        $self = static::getInstance();
        if (!isset($self->redis)){
            $self->setRedis();
        }
        return $self->redis;
    }


    public function setRedis()
    {
        $config = config('wx.redis');
        $redis = new \Redis();
        $res = $redis->connect($config['host'],$config['port']);
        $res = $redis->auth('devilking');
        if($res) {
            $this->redis = $redis;
        }else{
            throw new \Exception("redis 连接失败");
        }
    }

}