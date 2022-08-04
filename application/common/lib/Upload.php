<?php

namespace app\common\lib;

//七牛云上传图片类库相关接口

use app\common\Base;
use Qiniu\Auth as Auth;
use Qiniu\Storage\UploadManager;


class Upload extends Base
{
    private $accessKey = 'ZawMyTtjm2LmYJmKV66LLiTCHmKzr32O3PhhVmDa';
    private $secretKey = 'iKMSf60_eon4Y6EuqFoK-IrkHJ6fqRIX6tp_YkpY';
    private $bucket = 'junhuicaijing';
    private $domain =  'http://qiniu.1yuaninfo.com';

    public function qinius($filePath,$filename)
    {
        // 上传到七牛后保存的文件名
        $key = $filename;
        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);

        $token = $auth->uploadToken($this->bucket);
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            return ["code"=>0,"msg"=>$err,"data"=>""];
        } else {
            //返回图片的完整文件名称
            $ret['key'] = $this->domain . '/' . $ret['key'];
            $ret['code'] = 1;
            return $ret;
        }
    }

    public function getToken()
    {
        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);
        // 要上传的空间
        $token = $auth->uploadToken($this->bucket);
        return $token;
    }
}