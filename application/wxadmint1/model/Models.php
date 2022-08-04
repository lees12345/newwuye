<?php
namespace app\wxadmint1\model;

use think\Model;
use think\Db;
use think\Session;

class Models extends Base
{
	public static function GetModel()
	{
		if(!cache('access_token'))
		{
			
			$access_token = self::GetAccessToken();
		}

		$access_token = cache("access_token");
	
		$url = "https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=".$access_token;

		$result = https_request($url);
		return $result;
	}
}
