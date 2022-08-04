<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use Firebase\JWT\JWT;
use think\Request;

class Header extends Controller
{
    private $key = 'dfadsgd12dfd45dfd1fd';
    protected $openid;
    protected $user_id;

    public function _initialize()
    {
        parent::_initialize();
        $authInfo = $this->checkToken();
        $this->openid = $authInfo['openId'];
        $this->user_id = $authInfo['user_id'];
    }

    public function checkToken()
    {
        $header = Request::instance()->header();
        if (!isset($header['authorization']) || $header['authorization'] == 'null'){
            echo json_encode([
                'status' => 1002,
                'message' => 'Token不存在,拒绝访问',
                "result" => []
            ],JSON_UNESCAPED_UNICODE);
            exit;
        }else{
            $tok = fredis()->get($header['authorization']);
            if(!$tok)
            {
                echo json_encode([
                    'status' => 1002,
                    'message' => 'Token不存在,拒绝访问',
                    "result" => []
                ],JSON_UNESCAPED_UNICODE);exit;
            }
            $checkJwtToken = $this->verifyJwt($tok);
            if ($checkJwtToken['status'] == 1001) {
                return $checkJwtToken['msg'];
            }else{
                echo json_encode( [
                    "status" => 1002,
                    "message" => $checkJwtToken['msg'],
                    "result" => []
                ],JSON_UNESCAPED_UNICODE);exit();
            }
        }
    }

    protected function verifyJwt($jwt)
    {
        $key = md5($this->key);
        try {
            $jwtAuth = json_encode(JWT::decode($jwt, $key, array('HS256')));
            if(!$jwtAuth)
            {
                echo json_encode([
                    'status' => 1002,
                    'message' => 'Token错误，非法访问',
                    "result" => []
                ],JSON_UNESCAPED_UNICODE);exit();
            }
            $authInfo = json_decode($jwtAuth, true);
            $msg = [];
            if (!empty($authInfo['user_id'])) {
                $msg = [
                    'status' => 1001,
                    'msg' => $authInfo
                ];
            } else {
                echo json_encode([
                    'status' => 1002,
                    'msg' => 'Token验证不通过'
                ],JSON_UNESCAPED_UNICODE);
                exit;
            }
            return $msg;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            echo json_encode([
                'status' => 1002,
                'msg' => 'Token无效'
            ],JSON_UNESCAPED_UNICODE);
            exit;
        } catch (\Firebase\JWT\ExpiredException $e) {
            echo json_encode([
                'status' => 1002,
                'msg' => 'Token过期'
            ],JSON_UNESCAPED_UNICODE);
            exit;
        } catch (Exception $e) {
            return $e;
        }
    }
}


