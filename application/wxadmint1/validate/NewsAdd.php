<?php

namespace app\wxadmint1\validate;

use think\Validate;

class NewsAdd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['mt_id','require|token:__hash__','消息类型必须存在|表单请勿非法提交'],
		
	];
}