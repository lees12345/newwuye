<?php

namespace app\wxadmint1\service;

use think\Db;
use app\wxadmint1\model\Base as BaseModel;

class WxUserrods  
{
	

	public static function SendIdea($v,$idea)
	{
			if(!cache("access_token"))
		{
			$access_token = BaseModel::GetAccessToken();
		}

			$access_token = cache("access_token");

		    //这里是在模板里修改相应的变量
		    $formwork = '{
		           "touser":"' . $v["openid"] . '",
		           "template_id":"7qjX8XEkE3O83DEKhehxHMXM-BP1wrrrhlydkyd7k-A",
		           "url":"' . $idea["mlink_url"] . '",            
		           "data":{
		                   "first": {
		                       "value":"尊敬的'. $v["wx_nickname"] .'，您好:",
		                       "color":"#FF0000"
		                   },
		                   "keyword1":{
		                       "value":"'.$idea["s_name"].'",
		                       "color":""
		                   },
		                   "keyword2": {
		                       "value":"' . $idea["s_code"] . '",
		                       "color":""
		                   },
		                    "keyword3": {
		                       "value":"' . $idea["s_endprice"] . '元",
		                       "color":"#FF0000"
		                   },
		                   "remark": {
		                       "value":"' . $idea["s_mreason"] . '",
		                       "color":"#FF0000"
		                   }
		           }
		       }';

		      
		    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token."";
		    
		    $data = https_request($url,$formwork);
		    return $data;
}






}