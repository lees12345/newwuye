<?php
namespace app\index\exception;

class TelException extends \Exception{
    protected $message = "手机号已注册";
    protected $code = 400;
    protected $error_code = 6002;
}