<?php

namespace app\common;

/**
 * Notes:单例模式基类
 * User: yaoyong
 * Class BaseServices
 * @package app\api\logic
 */
class Base
{
//单例最关键的地方是就是静态变量和静态方法，静态方法和静态变量也被称为类方法和类变量，是跟随着类被加载到内存中，所以只会被加载一次，所以这个实例也就会跟随着类全局只有一份，所以可以使用这个方式来进行单例的实现，那么这样写就完美吗?其实还不是，我们的服务可能有很多，不仅仅有QRcode，有可能有User等等，那么每次都需要在服务层，例如：不仅仅有QRcode和User等等服务里面写下面一堆单例模式代码也挺烦的，我们可以使用继承来做，把下面单例模式都放到基类里面，然后继承它父类，那么子类就有了一样的能力
    protected static $instance;

    public static function getInstance()
    {
        if (!empty(static::$instance[static::class]) && ((static::$instance[static::class] ?: null) instanceof static)) {
            //echo 'util没有被new<br/>';
            return static::$instance[static::class];
        }
        //echo 'util首次被new<br/>';
        return static::$instance[static::class] = new static();
    }


    private function __construct()
    {
    }

    private function __clone()
    {

    }


}