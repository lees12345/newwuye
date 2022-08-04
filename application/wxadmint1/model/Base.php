<?php
namespace app\wxadmint1\model;

use app\common\lib\redis\Predis;
use think\Model;
use think\Db;
use think\Session;

class Base extends Model
{
	public static function GetAccessToken()
	{
		$appid = config('wx.appid');
		$appsecret = config('wx.app_secret'); 
		
		$url = sprintf(config('wx.tokenurl'),$appid,$appsecret);
		$output = https_request($url);

		$access_token = $output['access_token'];

		cache('access_token',$access_token,'7000');
		redis()->set("access_token_tin",$access_token,7000);

		return $access_token;
	}


}