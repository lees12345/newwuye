<?php
namespace app\index\exception;

class BenefitException extends \Exception{
    protected $message = "用户已领取优惠券";
    protected $code = 500;
    protected $error_code = 7001;
}