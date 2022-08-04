<?php
/**
 * Created by PhpStorm.
 * User: 奇奇
 * Date: 2020/7/31
 * Time: 20:13
 */
namespace app\index\exception;

/**
 * Class UsersTypeException
 * @package app\zhitougu\exception
 */
class ShareNumberException extends \Exception{
    protected $message = "剩余次数不足，请您联系服务人员";
    protected $code = 400;
    protected $error_code = 8009;
}