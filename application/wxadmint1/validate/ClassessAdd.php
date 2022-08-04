<?php
namespace app\wxadmint1\validate;

use think\Validate;

class ClassessAdd extends BaseValidate
{
    //验证规则
    protected $rule = [
        ['class_title','require','课程标题必须存在'],
        ['class_type','require','课程类型必须存在']


    ];

}