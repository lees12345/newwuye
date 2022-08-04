<?php
namespace app\index\exception;

/**
 * Class UsersTypeException
 * @package app\zhitougu\exception
 */
class UsersTypeException extends \Exception{
    protected $message = "非签约用户，暂无权限查看详情，请您联系服务人员";
    protected $code = 400;
    protected $error_code = 8001;
}