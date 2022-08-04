<?php
namespace app\index\exception;

class InformationException extends \Exception{
    protected $message = "用户信息不存在";
    protected $code = 404;
    protected $error_code = 2002;
}