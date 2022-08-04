<?php

namespace app\wxadmint1\service;

use app\wxadmint1\model\User as UserModel;
use app\wxadmint1\model\Tuhui as TuhuiModel;
use app\wxadmint1\model\WelcomeQueue as WelcomeQueueModel;
use app\wxadmint1\controller\Zstatusss;
use think\Log;

class WxToken
{
    public static function valid($config = "")
    {
        $echoStr = $_GET["echostr"];
        if (self::checkSignature($config)) {
            echo $echoStr;
            exit;
        }
    }

    public static function responseMsg($config = "")
    {
        $postStr = file_get_contents("php://input");

        if (!empty($postStr)) {
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
            switch ($RX_TYPE) {
                case "text":
                    $resultStr = "success";
                    break;
                case "event":
                    $resultStr = self::handleEvent($postObj, $config);
                    break;
                case "image":
                    $resultStr = "success";
                    break;
                default:
                    $resultStr = "success";
                    break;

            }
//            echo $resultStr;
            Log::info('微信信息：'.var_export($resultStr));
            return $resultStr;
        } else {
            return "success";
        }
    }

    //发送图片
    public static function handleImage($postObj, $config = '')
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $time = time();
        $MsgType = 'transfer_customer_service';
        $MediaId = $postObj->MediaId;//图片消息媒体id，可以调用多媒体文件下载接口拉取数据。
        $imageTpl = "<xml>  
                                    <ToUserName><![CDATA[%s]]></ToUserName>  
                                    <FromUserName><![CDATA[%s]]></FromUserName>  
                                    <CreateTime>%s</CreateTime>  
                                    <MsgType><![CDATA[%s]]></MsgType>  
                                    <Image>  
                                    <MediaId><![CDATA[%s]]></MediaId>  
                                    </Image>  
                                    </xml>";
        $resultStr = sprintf($imageTpl, $fromUsername, $toUsername, $time, $MsgType, $MediaId);
        $result = self::transmitKefu($postObj, $config);
        echo $resultStr;
    }


    public static function handleText($postObj, $config = '')
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";
        if (!empty($keyword)) {
            $result = self::transmitKefu($postObj, $config);
            return $result;
        } else {
            echo "Input something...";
        }
    }

    //客服
    private static function transmitKefu($object, $config = '')
    {
        $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[transfer_customer_service]]></MsgType>
        </xml>";
        $result = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time());
        //发送客服信息
        self::send3($object->FromUserName, $config);
        return $result;
    }

//用户发送消息自动回复
    public static function send3($openid, $config)
    {
        $access_token = \app\index\lib\Account::get_access_token($config);
        file_put_contents('/home/wwwroot/only.1yuaninfo.com/log/test.log', $access_token);
        $url = sprintf(config('wx.server_send'), $access_token);
        $data = [
            "touser" => trim($openid),
            "msgtype" => "image",
            "image" => [
                "media_id" => "Eb4TOdsRXAiJCZ8WV8PiFTVpFnSPqKuMHC5KzHUkx8APBgx4eRQdNLpHFqgQUDJ3"
            ],
            "customservice" => [
                "kf_account" => 'kf2001@gsndd888'
            ],
        ];

        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
        $result = \app\index\lib\Account::https_request($url, $params);

        return $result;
    }


//关注和取消关注插入数据库状态
    public static function handleEvent($object, $config)
    {
        $contentStr = "欢迎关注天信诚文化传媒有限公司";
        $resultStr = "success";
        Log::info('object'.var_export($object));
        switch ($object->Event) {
            case "subscribe":
                $oppenid = $object->FromUserName;
//                print_r($oppenid);die;
                Log::info('openid'.var_export($oppenid));
                $name = \app\index\model\Users::addUserMessage(trim($oppenid), $config);
                //增加关注日志
                Log::info('name'.var_export($name));
//                (new Zstatusss())->sendMessage($name,$oppenid);
//                \app\index\lib\conceon\Conceon::send($name, trim($oppenid), $config);
//                WelcomeQueueModel::sendMessage(trim($oppenid));
                $resultStr = self::responseText($object, $contentStr);
                break;
            case "unsubscribe":
                $oppenid = $object->FromUserName;
                \app\index\model\Users::UpdateOppenID(trim($oppenid));
                $resultStr = self::responseText($object, $contentStr);
                break;

        }

        return $resultStr;
    }

    public static function responseText($object, $content, $flag = 0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    public static function responseTuwen($object, $content, $flag = 0)
    {
        $resultStr = "";
        if (!is_array($content)) {
            return;
        }
        $itemTpl = "    <item>
                                    <Title><![CDATA[%s]]></Title>
                                    <Description><![CDATA[%s]]></Description>
                                    <PicUrl><![CDATA[%s]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                </item>
                            ";
        $item_str = "";
        foreach ($content as $item) {
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[news]]></MsgType>
                                <ArticleCount>%s</ArticleCount>
                                <Articles>
                                $item_str</Articles>
                                </xml>";

//        $resultStr = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
        return $resultStr;
    }


    private static function checkSignature($config)
    {
        // you must define TOKEN by yourself
        if (!array_key_exists("Token", $config)) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = $config["Token"];
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

}
