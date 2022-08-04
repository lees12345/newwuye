<?php
namespace app\wxadmint1\validate;

use think\Validate;

class AdminAdd extends BaseValidate
{
	//验证规则
	protected $rule = [
		['admin_name','require','管理员必须存在'],
		['admin_password','require|min:6|max:16','密码必须存在|密码最少6位|密码最大16位']
		
		
	];

}