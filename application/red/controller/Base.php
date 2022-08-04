<?php
/*
 * @thinkphp3.2.2  auth认证   php5.3以上
 * @Created on 2015/08/18
 * @Author  夏日不热(老屁)   757891022@qq.com
 * @如果需要公共控制器，就不要继承Auth，直接继承Controller
 */
namespace app\red\controller;
use think\Controller;
use think\Auth;
use think\Db;
use think\Validate;
use think\Session;
use think\Ucpaas;

//权限认证
class Base extends Controller{

		 public function _initialize()
    		{
    		       
		        // halt($action);
		        $auth = Auth::instance();
		        $admin_id = session::get('admin_id');
		        // halt($admin_id);
				//判断用户是否登录
				if(!Session::has('login')) 
				{  
					$this->redirect("red/login/login");  
				}  
		       
    		}




}





