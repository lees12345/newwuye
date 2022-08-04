<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 2022/1/5
 * Time: 11:17
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Property extends Controller
{

    public function logins()
    {
        return $this->fetch();
    }

    public function index()
    {
        return $this->fetch();
    }

    public function myself()
    {
        return $this->fetch();
    }

    public function mine()
    {
        return $this->fetch();
    }

    public function propertyproject()
    {
        return $this->fetch();
    }

    public function query()
    {
        return $this->fetch();
    }

    public function report()
    {
        return $this->fetch();
    }

    public function service(Request $request)
    {
        $id = $request->param('id',0);
        $this->assign('id',$id);
        return $this->fetch();
    }

    public function work()
    {
        return $this->fetch();
    }

    public function question()
    {
        return $this->fetch();
    }

    public function pdetail(Request $request)
    {
        $param = $request->param();
        $id = $param['id'];
        $openid = $param['openid'];
        $moring = db('news')->where('id',$id)->find();
        $data['news_id'] = $id;
        $data['openid'] = $openid;
        if(db('user_news_click')->where($data)->count())
        {
            db('user_news_click')->where($data)->setInc('number');
        }else{
            $data['number'] = 1;
            db('user_news_click')->where($data)->insertGetId($data);
            db('news')->where('id',$id)->setInc('number');
        }
        $moring['time'] = $moring['addtime'];
        $this->assign('moring',$moring);
        return $this->fetch();
    }
}