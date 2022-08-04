<?php

namespace app\wxadmint1\validate;

use think\Validate;

class Userupd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['user_name','token:__hash__','表单请勿非法提交'],
	
		
	];
}