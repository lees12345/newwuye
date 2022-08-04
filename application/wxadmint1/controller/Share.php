<?php
namespace app\wxadmint1\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use think\Ucpaas;
use think\Cache;
use app\wxadmint1\model\WelcomeQueue;

class Share extends Base
{
    public function index()
    {
        $list = WelcomeQueue::Order('time desc')->paginate(15);
        $page = $list -> render();

        $id=Session::get('adminid');
        $adminid=Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid',$id)
            ->find();

        $this->assign('adminid',$adminid);
        $this -> assign('page',$page);
        $this -> assign('data',$list);
        return $this -> fetch();
    }
}