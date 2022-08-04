<?php
namespace app\zhitougu\exception;

/**
 * Class ClickTypeException
 * @package app\zhitougu\exception
 */
class ClickTypeException extends \Exception{
    protected $message = "超时查看";
    protected $code = 400;
    protected $error_code = 8002;
}