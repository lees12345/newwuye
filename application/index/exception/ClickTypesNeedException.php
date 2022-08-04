<?php
namespace app\index\exception;

/**
 * Class ClickTypesException
 * @package app\zhitougu\exception
 */
class ClickTypesNeedException extends \Exception{
    protected $message = "点击需要";
    protected $code = 400;
    protected $error_code = 8014;
}