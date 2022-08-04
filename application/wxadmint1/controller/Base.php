<?php
/*
 * @thinkphp3.2.2  auth认证   php5.3以上
 * @Created on 2015/08/18
 * @Author  夏日不热(老屁)   757891022@qq.com
 * @如果需要公共控制器，就不要继承Auth，直接继承Controller
 */
namespace app\wxadmint1\controller;
use think\Controller;
use think\Auth;
use think\Db;
use think\Validate;
use think\Session;
use think\Ucpaas;

//权限认证
class Base extends Controller{

    protected $newgroups;
		 public function _initialize()
    		{
    		       
			$module = request() -> module();
		        $controller = request()->controller();
		        $action = request()->action();
		        // halt($action);
		        $auth = Auth::instance();
		        $admin_id = session::get('admin_id');
		        // halt($admin_id);

				//判断用户是否登录
				if(!Session::has('login'))
				{  
					$this->redirect("wxadmint1/login/login");  
				}  
		        $group = Db::name('auth_group_access')->where('uid',$admin_id)->find();
                $login = Db::name('auth_group')->where('status','2')->where('id',"=",$group["group_id"])->find();
                if($login){
                    $this->redirect("wxadmint1/login/login");

                }
		        if(!$auth->check($module. '/' .$controller . '/' . $action,$admin_id)){
		             $this->error('你没有权限访问');

		        }
		        // halt(!$auth->check($module. '/' .$controller . '/' . $action,'1'));


			// halt($group);
				 $this->assign('group',$group);
                $this->newgroups = $group["group_id"];
    		}




}





