<?php
namespace app\wxadmint1\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use think\Cache;
use app\index\model\Phones as PhonesModel;


class Phones extends Base

{
	//验证码存储列表
	public function index()
	{
		$request = Request::instance() -> except('page');

		if(!empty($request['phone'])){
			$sss['phone'] = array('like', '%' . $request['phone'] . '%');
			$res = new PhonesModel;
			$data = $res->where($sss)
				->order('pho_id desc')
				-> paginate(20,false,['query' => request()->param()]);
			$search = $request['phone'];
		}else{
			$data = PhonesModel::order('pho_id desc')->paginate(20);
			$search = '';
		}
        $id=Session::get('adminid');
        $adminid=Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid',$id)
            ->find();
        foreach($data as &$v){
            if(!in_array($adminid["group_id"],[39,53,54])){
               $v["phone"] = fen_phone($v["phone"]);
            }
        }

		$page = $data->render();
		$this->assign('search',$search);
		$this->assign('page',$page);
		$this->assign('data',$data);
		return $this -> fetch();
	}
	
}