<?php

namespace app\red\controller;

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
	//后台登录页面
	public function login()
	{
		return $this->fetch();
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
		if($request['admin_name'] != '红包red')
		{
			return $this -> error('无效的登录');
		}
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
						return $this->success('欢迎红包后台','red/index/index');
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
    			return $this -> success('退出红包后台，下次再见！','red/login/login');
		}else
		{
			return $this->error('退出失败');
		}
	}

}