<?php

namespace app\wxadmint1\validate;

use think\Validate;

class GueUpd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['gu_id','require|token:__hash__','竞猜期数必须存在|表单请勿非法提交']
		
		
	];
}