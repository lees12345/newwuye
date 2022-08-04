<?php

namespace app\wxadmint1\validate;

use think\Validate;

class Login extends BaseValidate
{
	//验证规则
	protected $rule = [
		['admin_name','require|chsDash|token:__hash__','用户名必须存在|用户名只能是汉字、字母、数字和下划线_及破折号-|表单请勿非法提交'],
		['admin_password','require','密码必须存在'],
		
	];
}