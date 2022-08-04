<?php
namespace app\zhitougu\exception;

/**
 * Class OrderStatusException
 * @package app\zhitougu\exception
 */
class OrderStateException extends \Exception{
    protected $message = "参数错误";
    protected $code = 400;
    protected $error_code = 9001;
}