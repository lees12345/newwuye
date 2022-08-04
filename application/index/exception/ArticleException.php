<?php
namespace app\zhitougu\exception;

/**
 * Class ArticleException
 * @package app\zhitougu\exception
 */
class ArticleException extends \Exception{
    protected $message = "令牌鉴权错误";
    protected $code = 400;
    protected $error_code = 80009;
}