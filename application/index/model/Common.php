<?php

namespace app\index\model;

use think\Model;
use think\Request;
use think\Session;
class Common extends Model
{
	public static function common()
	{
	    $config = config('wx.only');
		$appid = $config['appId'];
		$secret =$config['AppSecret'];

        $code['code'] = Session::get('code');
		$openid = UrlOpenid($code['code'],$appid,$secret);

		return $openid;
	}


}