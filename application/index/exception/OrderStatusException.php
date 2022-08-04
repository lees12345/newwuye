<?php
namespace app\zhitougu\exception;

/**
 * Class OrderStatusException
 * @package app\zhitougu\exception
 */
class OrderStatusException extends \Exception{
    protected $message = "您的订单余额不足";
    protected $code = 400;
    protected $error_code = 8004;
}