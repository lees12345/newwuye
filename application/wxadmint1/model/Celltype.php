<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use think\Session;
use app\wxadmint1\model\Base as BaseModel;
use app\wxadmint1\model\Celltype as CelltypeModel;

class Celltype extends BaseModel
{
	protected $table = 'celltype';

	//进行信息和用户相关联
	public function types()
	{
		return $this ->hasOne('users','openid','openid'); 
	}

	//进行查询
	public static function infos()
	{
		$banner = CelltypeModel::relation('types')->order('x_id desc')->paginate(20);//要关联
		return $banner;
	}

	
}