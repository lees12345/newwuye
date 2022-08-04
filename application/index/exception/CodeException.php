<?php
namespace app\index\exception;

class CodeException extends \Exception{
    protected $message = "验证码错误";
    protected $code = 400;
    protected $error_code = 6001;
}