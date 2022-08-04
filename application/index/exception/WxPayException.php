<?php
namespace app\zhitougu\exception;

/**
 * Class UsersTypeException
 * @package app\zhitougu\exception
 */
class WxPayException extends \Exception{
    protected $message = "微信支付失败";
    protected $code = 400;
    protected $error_code = 8021;
}