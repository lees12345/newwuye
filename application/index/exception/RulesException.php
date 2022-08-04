<?php
namespace app\index\exception;

class RulesException extends \Exception{
    protected $message = "token验证失败";
    protected $code = 400;
    protected $error_code = 66666;
}