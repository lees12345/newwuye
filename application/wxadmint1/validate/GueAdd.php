<?php

namespace app\wxadmint1\validate;

use think\Validate;

class GueAdd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['gu_periods','require|token:__hash__','竞猜期数必须存在|表单请勿非法提交']
		
		
	];
}