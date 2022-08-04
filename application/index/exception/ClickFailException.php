<?php
/**
 * Created by PhpStorm.
 * User: 奇奇
 * Date: 2020/5/28
 * Time: 10:13
 */
namespace app\zhitougu\exception;

class ClickFailException extends \Exception{
    protected $message = "信息不存在";
    protected $code = 404;
    protected $error_code = 8008;
}