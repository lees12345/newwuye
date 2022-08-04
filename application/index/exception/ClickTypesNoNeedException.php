<?php
namespace app\index\exception;

class ClickTypesNoNeedException extends \Exception{
    protected $message = "点击不需要";
    protected $code = 400;
    protected $error_code = 8005;
}