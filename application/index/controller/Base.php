<?php

namespace app\index\controller;

use think\Controller;
use think\Auth;
use think\Db;
use think\Validate;
use think\Session;
use think\Ucpaas;
use think\Request;
use think\Cache;
use app\index\model\Common;
use app\wxadmint1\model\Users as UsersModel;

class Base extends Controller
{
    public function __construct()
    {
        $web = "zztong.1yuaninfo.com";
        header("Access-Control-Request-Method:GET,POST");
        header("Access-Control-Allow-Credentials:true");
        header("Access-Control-Allow-Origin:".$web);
    }

    public function index()
    {
        $data = Request::instance()->param();
        if (!isset($data['from'])) {
            if (!empty($data['code'])) {
                Session::set('code', $data['code']);

            }
            if (empty(Session::get('code'))) {
                // halt($data);
                Session::set('code', $data['code']);
            }
            if (empty(session::get('openid'))) {

                $openid = Common::common();

                // halt($openid);

                // if(is_array($openid))
                // {
                // 	return $openid;
                // 	return $this->error($openid['msg']);
                // }

                session::set('openid', $openid['openid']);

            }
            $openids = session::get('openid');
            //查询数据库信息
            $controller = request()->controller();
            if ($controller != 'Index') {
                $re = UsersModel::get(['openid' => $openids]);

                if ($re['type_id'] == '1') {
                    // halt('xx');
                    return $this->redirect('Index/register/index');
                }
            }
        }
    }
}


