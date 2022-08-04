<?php
namespace app\Index\validate;

use think\Validate;

class LearnValidate extends Validate
{
    protected $rule = [
        ['user_tel','require|number|chsDash','手机号必须存在|必须为数字'],
        ['yanzhengma','require','验证码必须存在']

    ];
}