<?php
namespace app\index\exception;

class WxException extends \Exception{
    protected $message = "不存在相关微信配置";
    protected $code = 404;
    protected $error_code = 10002;
}