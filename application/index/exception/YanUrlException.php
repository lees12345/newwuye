<?php
namespace app\index\exception;

class YanUrlException extends \Exception{
    protected $message = "研报链接不存在";
    protected $code = 404;
    protected $error_code = 4007;
}