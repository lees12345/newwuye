<?php
namespace app\wxadmint1\model;

use think\Model;
use think\Db;

class Auth_rule extends Model
{
		public static function InsertAuthRule($data)
		{
			if(!empty($data['pid']))
			{
				$res['pid'] = trim($data['pid']);
			}else{
				$res['pid'] = '0';
			}

			$res['name'] = $data['name'];
			$res['title'] = $data['title'];

			$auth_add = Db::name('auth_rule') -> insert($res);
			return $auth_add;
		}

		public static function IndexAuthRule()
		{
			$auth1 = Db::name('auth_rule') -> where('pid','0')->where('status',1)->select();

			foreach($auth1 as $k=>$v)
			{
				$auth1[$k]['zi'] = Db::name('auth_rule') -> where('pid',$v['id'])->where('status',1)->select();


			}

			return $auth1;
		}
}