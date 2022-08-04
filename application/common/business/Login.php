<?php

namespace app\common\business;

use app\common\Base;
use app\common\v1\queue\handle\User;
use app\index\model\Question;
use app\wxadmint1\model\Users as UsersModel;
use app\index\controller\Smssong;
use app\index\model\Phones;
use app\common\lib\Wechat;
use app\wxadmint1\model\Order as OrderModel;
use Firebase\JWT\JWT;
use Qiniu\Auth as Auth;

class Login extends Base
{

    public function postSend($userTel)
    {
        $data = UsersModel::where('user_tel', trim($userTel))->find();
        if (!empty($data)) {
            return ['code'=>0,'msg'=>'手机号已经注册！'];
        }
        $code = randCode(4);
        $pho['phone'] = trim($userTel);
        $pho['codes'] = trim($code);
        $pho['pho_time'] = time();

        $pp = Phones::get(['phone'=>$userTel]);

        if($pp){
            $pho['pho_id'] = $pp['pho_id'];
            $updates = new Phones;
            $updates->isUpdate(true)->save($pho);
        }else{
            Phones::create($pho);
        }
        fredis()->set($userTel, $code, 600);
        $sms = new Smssong();
        //测试模式
        $status = $sms->send_verify($userTel, $code);
        if (!$status) {
            return ['code'=>1,'msg'=>$sms->error];
        }
    }

    public function Login($data)
    {
        if(!isset($data['user_tel']) || !$data['user_tel'])
        {
            return ['msg'=>'参数错误','code'=>0];
        }

        if(!isset($data['openid']) || !$data['openid'])
        {
            return ['msg'=>'请传入openid','code'=>0];
        }
        $phone = fredis()->get($data['user_tel']);
        //判断验证码是否正确
        if(!$phone || $phone != $data["codes"]){
            return ['msg'=>'验证码错误','code'=>0];
        }
        if(UsersModel::where('user_tel',$data['user_tel'])->count())
        {
            return ['msg'=>'电话号码已被绑定','code'=>0];
        }
        if(UsersModel::where('openid',$data['openid'])->count() < 1)
        {
            return ['msg'=>'请确认已经关注公众号','code'=>0];
        }
        if($data['type'] == 1)
        {
            $data['auth'] = 0;
        }else{
            $data['auth'] = -1;
        }
        UsersModel::where('openid',$data['openid'])->update(['user_tel'=>$data['user_tel'],'register_time'=>time(),'type_id'=>$data['type'],'auth'=>$data['auth']]);
        $uid =  UsersModel::where('openid',$data['openid'])->value('id');
        fredis()->del($data["user_tel"]);
        $token = $this->createJwt($uid,$data['openid']);
        return ['msg'=>$token,'code'=>1];
    }

    public function getLogin($data)
    {
        $wxcode = isset($data['code'])?$data['code']:'';
        if(!$wxcode)
        {
            $getcode = Wechat::getInstance()->getCode();
            header("Location:".$getcode);exit();
        }else{
            $getOauthAccessToken = Wechat::getInstance()->getOauthAccessToken($wxcode);
            $openid = $getOauthAccessToken['openid'];
            if(!$openid)
            {
                return ['msg'=>'获取openid错误','code'=>0];
            }
        }
        $res = UsersModel::where('openid',$openid)->find();
        if($res)
        {
            if(isset($res['user_tel']) && $res['user_tel'])
            {
                $token = $this->createJwt($res['id'],$openid);
                return ['msg'=>$token,'code'=>1];
            }else{
                return ['msg'=>$openid,'code'=>-1];
            }
        }else{
            UsersModel::insertGetId(["openid"=>$openid, "add_time"=>time()]);
            return ['msg'=>$openid,'code'=>-1];
        }
    }

    public function createJwt($userId,$openId)
    {
        $key = md5('dfadsgd12dfd45dfd1fd'); //jwt的签发密钥，验证token的时候需要用到
        $time = time(); //签发时间
        $expire = $time + 86400; //过期时间
        $token = array(
            "user_id" => $userId,
            "openId" => $openId,
            "iss" => "txcwy",//签发组织
            "aud" => "lee", //签发作者
            "iat" => $time,
            "nbf" => $time,
            "exp" => $expire
        );
        $jwt = JWT::encode($token, $key);
        $token = rand().time().rand().rand().rand();
        fredis()->set($token,$jwt);
        return $token;
    }

    public function postIdea($data)
    {
        $data['question_addtime'] = time();
        return Question::postQuertion($data);
    }
}