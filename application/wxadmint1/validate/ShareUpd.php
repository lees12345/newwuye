<?php

namespace app\wxadmint1\validate;

use think\Validate;

class ShareUpd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['s_status','require|token:__hash__','消息类型必须存在|表单请勿非法提交'],
		
	];
}