<?php
namespace app\index\exception;

class ClickTypesException extends \Exception{
    protected $message = "失效查看";
    protected $code = 400;
    protected $error_code = 8003;
}