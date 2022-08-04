<?php
/**
 * Created by PhpStorm.
 * User: 奇奇
 * Date: 2020/5/28
 * Time: 9:17
 */
namespace app\zhitougu\exception;

class NewsException extends \Exception{
    protected $message = "信息不存在";
    protected $code = 404;
    protected $error_code = 8008;
}