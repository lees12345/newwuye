<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use think\Session;
use app\wxadmint1\model\Base as BaseModel;

class UsersType extends BaseModel
{
	protected $table = 'users_type';
	public function Users()
	{
		return $this->hasMany('Users','user_id','type_id'); 
	}
}