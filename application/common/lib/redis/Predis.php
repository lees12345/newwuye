<?php
/*
* Created by DevilKing
* Date: 2019- 07-15
*Time: 15:52:
*/

namespace app\common\lib\redis;
class Predis{
    public $redis = "";
    /*
     * 定义单例模式的变量
     * */

    private static $_instance = null;

    public static function getInstance()
    {
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    private function __construct()
    {
        //重启  先获取数据key是否存在 有值先删除掉
        $this->redis = new \Redis();
//        $result = $this ->redis->connect(config('redis.host'),config('redis.port'),config('redis.timeOut'));
       $result = $this ->redis->connect('127.0.0.1','6379',5);
        $result = $this->redis->auth('devilking');
        if($result === false)
        {
            throw new \Exception('redis connect error');
        }
    }

    public function set($key, $value, $time=0)
    {
        if(!$key){
            return '';
        }
        if(is_array($value)){
            $value = json_encode($value);
        }
        if(!$time){
            return $this->redis->set($key,$value);
        }

        return $this->redis->setex($key,$time,$value);
    }

    public function get($key){
        if(!$key){
            return '';
        }

        return $this -> redis -> get($key);
    }

    public function del($key){
        if(!$key){
            return '';
        }

        return $this -> redis -> del($key);
    }

    /**
     * zset 添加数据
     * @param $name
     * @param $key
     * @param $value
     * @return int|string
     */
    public function zAdd($name,$key,$value)
    {
        if(!$name){
            return '';
        }
        return $this -> redis -> zAdd($name,$key,$value);
    }

    /**
     * zset 读取相应的数据
     * @param $name
     * @param int $start
     * @param int $end
     * @return array|string
     */
    public function zRange($name,$start=0,$end=-1,$type='')
    {
        if(!$name){
            return '';
        }
        return $this->redis->zRange($name,$start,$end,$type);
    }

    /**
     * 倒叙分页取值
     * @param $name
     * @param int $start
     * @param int $end
     * @param bool $withscore
     * @return array|string
     */
    public function zRevRange($name,$start=0,$end=-1,$withscore=false){
        if(!$name){
            return '';
        }
        return $this->redis->zRevRange($name,$start,$end,$withscore);
    }

    /**
     * 根据score 来删除
     */
    public function zRemRangeByScore($name,$start,$end){
        if(!$name){
            return '';
        }
        return $this->redis->zRemRangeByScore($name,$start,$end);
    }

    /**
     * zset 获取一个缓存的长度
     * @param $name
     * @return int|string
     */
    public function zCard($name){
        if(!$name){
            return '';
        }
        return $this -> redis -> zCard($name);
    }

    /**
     * zset 删除缓存中一个数据
     * @param $name
     * @param $value
     * @return int|string
     */
    public function zRem($name,$value){
        if(!$name){
            return '';
        }
        return $this -> redis -> zRem($name,$value);
    }

    /**
     * hash 结构 增加 缓存
     * @param $name
     * @param $key
     * @param $value
     * @return bool|int
     */
    public function hSet($name,$key,$value){
        return $this -> redis -> hSet($name,$key,$value);
    }

    /**
     * hash 结构 获取具体key
     * @param $name
     * @param $key
     * @return string
     */
    public function hGet($name,$key){
        return $this -> redis -> hGet($name,$key);
    }

    /**
     * 获取全部的键值对
     * @param $key
     * @return array
     */
    public function hGetAll($name){
        return $this->redis->hGetAll($name);
    }

    /**
     * 获取所有的键
     * @param $key
     * @return array
     */
    public function hKeys($name){
        return $this -> redis -> hKeys($name);
    }

    /**
     * 获取所有的值
     * @param $name
     * @return array
     */
    public function hVals($name){
        return $this -> redis -> hVals($name);
    }

    /**
     * 删除指定的key 的 值
     * @param $name
     * @param $key
     * @return bool|int
     */
    public function hDel($name,$key){
        return $this->redis->hDel($name,$key);
    }

    /**
     * 判断是否存在对应的key的值
     * @param $key
     * @return array
     */
    public function hExists($name,$key)
    {
        return $this->redis->hExists($name,$key);
    }

    /*
     * @param $key
     * @param $value
     * @param $mixed
     * */
    public function sAdd($key,$value)
    {
        return $this -> redis->sAdd($key,$value);
    }

    /*
     * 删除有序集合
     * */
    public function sRem($key,$value)
    {
        return $this->redis->sRem($key,$value);
    }

    /**
     * 查询出所有成员
     * @param $key
     * @return array
     */
    public function sMembers($key){
        return $this->redis->sMembers($key);
    }

    public function sIsMember($key,$value){
        return $this->redis->sIsMember($key,$value);
    }

    /**
     * 查询指定多个值的数据
     */
    public function hMGet($key,$values){
        //数组拼装
        return $this->redis->hMGet($key,$values);
    }



    /**
     * 返回set集合的成员数
     * @param $key
     * @return int
     */
    public function sCard($key){
        return $this->redis->sCard($key);
    }

    /**
     * 列表list添加 右插入
     * @param $key
     * @param $value
     */
    public function rPush($key,$value){
        return $this->redis->rPush($key,$value);
    }

    /**
     * 获取列表的长度
     * @param $key
     * @return int
     */
    public function lLen($key){
        return $this->redis->lLen($key);
    }

    /**
     * 左出
     */
    public function lPop($key){
        return $this->redis->lPop($key);
    }

    /**
     * 移除指定的元素
     * @param $key
     * @param $value
     * @param $count
     * @return int
     */
    public function lRem($key,$value,$count){
        return $this->redis->lRem($key,$value,$count);
    }

    /*
     * 基础类库编写 魔术方法
     * */
    public function __call($name,$arguments){

        if(count($arguments) != 2){
            return '';
        }
        halt($name);
        $this->redis->$name($arguments[0],$arguments[1]);
//        return [];
    }
}