<?php
namespace app\wxadmint1\model;

use think\Model;
use think\Db;

class Auth_group extends Model
{
		public static function InsertAuthRule($data)
		{
			$res['title'] = trim($data['title']);
			$res['rules'] = implode(',', $data['rules']);
			$res['create_time'] =time();
			
			$result = Db::name('auth_group')->insert($res);
			return $result;
		}

		public static function UpdAuthRule($data)
		{
			$res['title'] = trim($data['title']);
			$res['rules'] = implode(',',$data['rules']);
			$res['id'] = trim($data['id']);
			// halt($res);
			$result = Db::name('Auth_group')->update($res);
			return $result;
		}

		
}