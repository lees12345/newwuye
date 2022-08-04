<?php
namespace app\wxadmint1\controller;

use think\Db;
use think\Controller;

class Menu extends Controller
{
	public function menu()
	{
	    $config = config('wx.only');
		$appid = $config['appId'];
		$appsecret = $config['AppSecret'];
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
		$output = https_request($url);
		$jsoninfo = $output;

		$access_token = $jsoninfo['access_token'];

		$jsonmenu = ' {
			 "button":[
			{
				   "name":"通告",
				  "sub_button":[
						{
					   "type":"view",
					   "name":"公司简介",
					   "url":"https://mp.weixin.qq.com/s?__biz=Mzg4NDY3MzY0MA==&mid=2247483678&idx=1&sn=c4fa289e4b4c27b4bb1b527804db6dbd&chksm=cfb5dc19f8c2550fd3c4ad41954f573518dd0f2c2614244a3a41fac98003afb724798d7739ba#rd"
					 }
				  ]
			  },
			   {
				  "name":"项目",
				  "sub_button":[
				   {
					"type":"view",
					"name":"物业维修",
					"url":"http://estate.1yuaninfo.com/index/property/service?id=1"
				  },{
					"type":"view",
					"name":"工程维修",
					"url":"http://estate.1yuaninfo.com/index/property/service?id=2"
				  }, {
						 "type":"view",
					   "name":"公司事务",
					   "url":"http://estate.1yuaninfo.com/index/property/service?id=3"

					 }]
			   },
				{
				   "name":"我的",
				   "sub_button":[
				   {
					  "type":"view",
					  "name":"个人中心",
					  "url":"http://estate.1yuaninfo.com/index/property/index"
					},
					{
					  "type":"view",
					  "name":"意见反馈",
					  "url":"http://estate.1yuaninfo.com/index/property/question"
					}
					]
			   }]
		 }';

		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;

		$result = https_request($url, $jsonmenu);
		var_dump($result);
	}
}