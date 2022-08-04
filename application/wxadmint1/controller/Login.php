<?php

namespace app\wxadmint1\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use think\Ucpaas;
use app\wxadmint1\model\Admin as AdminModel;
use app\wxadmint1\validate\Login as LoginValidate;

class Login extends Controller
{
	public function login()
	{
		//进行ip段限制
		$https = $_SERVER['REMOTE_ADDR'];
// // halt($https);
	//ip字段
//	$ips = ['124.65.171.248','124.65.171.249','124.65.171.250','124.65.171.251','124.65.171.252','124.65.171.253','124.65.171.254','124.65.171.255'];
//        $ipss = ["124.65.171.*"];
//        $ipregexp = implode('|', str_replace( array('*','.'), array('\d+','\.') ,$ipss) );
//
//
//        // if(in_array($https,$ips) || preg_match("/^(".$ipregexp.")$/", $https))
//        // {
//        //     return $this->fetch();
//        // }
//        // return '您的登录地址不在常用范围，请联系管理员';
//        return $this->fetch();
        $ips = ['110.251.106.109','111.192.155.101','119.251.34.253','124.65.97.193','124.65.97.194','124.65.97.195',
            '114.252.74.179','124.65.97.197','124.65.97.198','124.65.97.199','222.129.251.186','114.252.69.185',
            '111.192.204.45','222.130.18.1','123.123.4.137','124.202.231.18','124.202.231.19','124.202.231.20',
            '124.202.231.21','114.252.67.43','124.193.151.12','111.192.152.209','111.192.154.148','114.252.75.243',
            '114.252.69.55','113.5.6.55','114.252.68.10','114.252.75.170','114.252.86.159','114.252.91.225','124.65.171.248',
            '124.65.171.249','124.65.171.250','124.65.171.251','124.65.171.252','124.65.171.253','124.65.171.254',
            '124.65.171.255','123.112.17.89'];
        $ipss = ["124.65.171.*",'124.202.231.*'];
        $ipregexp = implode('|', str_replace( array('*','.'), array('\d+','\.') ,$ipss) );


        if(in_array($https,$ips) || preg_match("/^(".$ipregexp.")$/", $https))
        {
            return $this->fetch();
        }
		return $this->fetch();
//        return '您的登录地址不在常用范围，请联系管理员';
	}
	//接受登录信息
	public function deng()
	{
		//获取登录数据，并且进行表单验证
		$request = Request::instance() -> post();

		//进行表单验证及token验证
		$error = (new LoginValidate())->gocheck($request);
		if(is_string($error))
		{
			return $this->error($error);
		}

		//查出输入的用户名是否存在
		$re = AdminModel::get(['admin_name'=>$request['admin_name']]);

		if($re)
		{
			$re_password=pass(trim($request['admin_password']));

			if($re_password==$re['admin_password'])
			{
				//存储session
				Session::set('login','yes');
    				Session::set('admin_name',$request['admin_name']);
    				Session::set('admin_id',$re['admin_id']);

    				//登录次数加1
    				$res['admin_id'] = $re['admin_id']; 
    				$res['admin_num'] = $re['admin_num']+1;
				$res['admin_time']=time();
    				$data = AdminModel::update($res);

					if($data)
					{
						Session::set('adminid',$re['admin_id']);
						return $this->success('欢迎登陆天信诚后台管理系统','wxadmint1/index/index');
					}else
					{
						return $this->error('登录出现未知错误');
					}
			}else
			{
				return $this->error('密码不正确');
			}
		}else
		{
			return $this->error('用户不存在或者已经登录');
		}
	}


	//退出登录
	public function loginout()
	{
		$admin_id = Session::get('admin_id');
		if(!empty($admin_id))
		{
			//清除session退出
			Session::clear();
    			return $this -> success('退出天信诚后台管理系统成功，下次再见！','wxadmint1/login/login');
		}else
		{
			return $this->error('退出失败');
		}
	}

}
