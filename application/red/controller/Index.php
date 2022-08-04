<?php

namespace app\red\controller;

use think\Controller;

use think\Validate;
use think\Session;
use think\Ucpaas;
use think\Db;
use think\Request;
use app\index\controller\Wxpay as WxpayController;

class Index extends Base
{
	public function index()
	{
		//查询出参加红包总人数 
		//-> paginate(20,false,['query' => request()->param()]);
		$datas = Db::name('users_red')->order('no_money desc')->select();
		$us = count($datas);

		$request = Request::instance()->get();
		if(array_key_exists('type',$request) && $request['type'] == 1)
		{
		$data = DB::name('users_red')->order('moneys desc')->paginate(20);

		}else{

		$data = DB::name('users_red')->order('no_money desc')->paginate(20);
		}

		$page = $data -> render();
		$this -> assign('page',$page);
		$this -> assign('data',$data);
		$this -> assign('us',$us);
		return $this->fetch();
	}

/*

Array
(
    [return_code] => SUCCESS
    [return_msg] => 发放成功
    [result_code] => SUCCESS
    [err_code] => SUCCESS
    [err_code_des] => 发放成功
    [mch_billno] => 14932147221901118888886182
    [mch_id] => 1493214722
    [wxappid] => wxbb0d257a6c052e86
    [re_openid] => oNgOI0Sg6hE4XYSd4qA9bw2qpQIY
    [total_amount] => 100
    [send_listid] => 1000041701201901113000077625416
)


 */

	//发放红包
	public function send_red()
	{
		//查询出所有的拥有当前红包数量的人
		$users = Db::name('users_red')->where('no_money','<>',0)->select();
		
		foreach($users as $k=>$v)
		{
			Db::startTrans();
			try{
				$wxpay = new WxpayController();
				$data =  $wxpay -> weixin_red_packet($v['openid'],$v['no_money']);

				if($data['return_code']=="SUCCESS" && $data['result_code']=="SUCCESS"){ 
				//修改当前这个人的no_money
					$condition['users_id'] = $v['users_id'];
					$condition['no_money'] = 0;
					Db::name('users_red')->update($condition);

					$conditions['status'] = 1;
				}else{
					$conditions['status'] = 2;
				}
					$conditions['users_id'] = $v['users_id'];
					$conditions['addtime'] = time();
					$conditions['msg'] = $data['err_code_des'];
					$conditions['users_money'] = $v['no_money'];
				//记录发送结果
				Db::name('users_fa') -> insert($conditions);

				 // 提交事务
				    Db::commit();    
				} catch (\Exception $e) {
				    // 回滚事务
				    Db::rollback();
				    halt($e);
				}


		}

		return $this -> success('发送成功');

		

	}

	//开启红包雨
	public function open()
	{
		
		//添加数据库 记录
		$data = Db::name('users_time')->find();
		$this-> assign('data',$data);
	
			return $this -> fetch();
		
	}

	//开启红包雨时间
	public function open_time()
	{
		Db::startTrans();
		try{
			$condition['money_status'] = 1;
			$res = Db::name('users_money')->where('money_id','=',1)->update($condition);

			$conditions['red_addtime'] = time();
				$conditions['red_open'] = 1;
				$id = Db::name('users_red_down')->insertGetId($conditions);
			

			 // 提交事务
				    Db::commit();    
			} catch (\Exception $e) {
				// 回滚事务
				Db::rollback();
				halt($e);
				}
			$status['id'] = $id;
			return $status;
	}

	//ajax请求
	public function downs($id)
	{

		$condition['red_open'] = 2;
		$condition['red_updatetime'] = time();
		$res = Db::name('users_red_down')->where('red_id',$id)->update($condition);
		if($res)
		{
			return 1;
		}else{
			halt('修改失败');
		}
	}

	//关闭红包雨
	public function down()
	{
		$condition['money_status'] = 2;
		$res = Db::name('users_money')->where('money_id','=',1)->update($condition);
		if($res)
		{
			return $this -> success('红包雨关闭成功','index');
		}else{
			return $this -> error('红包雨已关闭');
		}
	}

	//红包发放记录
	public function report()
	{
		//关联查询
		$res = Db::name('users_fa')->alias('f')
		->join('users_red u','u.users_id = f.users_id')
		->order('addtime desc')
		-> select();

		//查询所有发放的金额
		$money = array_column($res,"users_money");
		$moneys = array_sum($money);
		$this -> assign('moneys',$moneys);
		$this -> assign('res',$res);
		return $this -> fetch();
	}

	public function time_report()
	{
		$data = Db::name('users_red_down')->order('red_id desc')->select();
		$this -> assign('data',$data);
		return $this -> fetch();
	}

	//红包发放时间控制
	public function time()
	{
		$data = Db::name('users_time')->find();
		$this-> assign('data',$data);
		return $this -> fetch();
	}

	public function time_update()
	{
		$request = Request::instance()->post();
		$data['users_time'] = $request['users_time'];
		$res = Db::name('users_time')->where('time_id','=',1)->update($data);
		if($res)
		{
			return $this -> success('修改成功','index');
		}else{
			return $this -> error('修改失败');
		}
	}
}