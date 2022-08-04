<?php
namespace app\index\exception;

class ApplyException extends \Exception{
    protected $message = "体验次数不为0";
    protected $code = 500;
    protected $error_code = 5001;
}