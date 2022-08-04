<?php
namespace app\zhitougu\exception;

/**
 * Class UsersTypeException
 * @package app\zhitougu\exception
 */
class UsersExistenceException extends \Exception{
    protected $message = "用户身份解析失败，请重新访问";
    protected $code = 400;
    protected $error_code = 8020;
}