<?php
namespace app\index\exception;

class UserException extends \Exception{
    protected $message = "游客";
    protected $code = 200;
    protected $error_code = 2001;
}