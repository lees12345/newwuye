<?php
namespace app\wxadmint1\model;

use think\Model;
use think\Db;

class Admin extends Model
{
	public static function InsertAdminID($data)
	{
		$res['admin_name'] = trim($data['admin_name']);
		$res['admin_password'] = pass(trim($data['admin_password']));
		$res['admin_ctime'] = time();
		$result = Db::name('admin')->insertGetId($res);
		return $result;


	}

	public static function IndexAdmin($data)
	{
		if(!empty($data['v']))
		{
			if(!empty($data['admin_name']))
			{
				$condition['a.admin_name'] = $data['admin_name'];
			}
			
			if(!empty($data['id']))
			{
				$condition['u.id'] = $data['id'];
			}
			
			$list = Db::name('admin')->alias('a')->join('auth_group_access g','a.admin_id=g.uid')->join('auth_group u','u.id=g.group_id')->where($condition)->order('a.admin_id desc')->paginate(10,false,['query' => request()->param()]);
		}else{
			$list = Db::name('admin')->alias('a')->join('auth_group_access g','a.admin_id=g.uid')->join('auth_group u','u.id=g.group_id')->order('a.admin_id desc')->paginate(10);
		}

		return $list;
	}
}