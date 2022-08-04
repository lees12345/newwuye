<?php
namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use app\common\lib\redis\Predis;
use app\wxadmint1\model\Base as BaseModel;
use app\wxadmint1\model\Users as UsersModel;

class Tuhui extends Model
{

	public static function IndexCha()
	{
		$result = Db::name('tuwen')->order('tu_id desc')->limit(1)->select();
		foreach($result as $k=>$result)
		{

		$content[$k]['Title'] = $result['tu_title'];
		$content[$k]['Description'] = '嘿，XX，等你很久咯，这里是到短线T+1服务平台。<br/>盘中快讯，实时分享，不做马后炮！<br/>高效、便捷、及时，您的财富专属小秘书！<br/>君子爱财，投资有道！<br/><a href="www.baidu.com">戳此，抓住机会</a>';
		$content[$k]['PicUrl'] = '';
		$content[$k]['Url'] = '';
		}

		// halt($content);

		return $content; 
	}

	public static function send($openid,$num,$wx_nickname,$userupd_id)
	{
		// return $openid;
		// return $num;

        $access_token = \app\index\lib\Account::get_access_token(config("wx.experience"));


       // $access_token = Predis::getInstance()->get("access_token_tin");
        $data = ['touser' => '' . $openid . '', 'template_id' => '0ICQMq98W89reMWPcl2-zBHXX8-p_2VxE7sXZe9b79w', 'url' => 'http://zztong.admin.gszx77.com/index/news/apply.html?openid='.$openid .'&num='.$num . '&userupd_id=' . $userupd_id, 'data' => ['first' => ['value' => '尊敬的会员'.$wx_nickname.'，您好:', 'color' => ''],'keyword1' => ['value' => ''.$wx_nickname.'', 'color' => '#FF0000'], 'keyword2' => ['value' => '【充值成功】', 'color' => '#FF0000'], 'keyword3' => ['value' => '' . date("Y-m-d H:i:s",time()) . '','color' => ''],'keyword4' => ['value' => '充值成功提醒','color' => ''],'remark' => ['value' => '体验机会充值成功，点击查看详情...', 'color' => '#FF0000']]];

		//   $data = ['touser' => ''.$openid.'', 'template_id' => ''.config("wx.tongzhi").'', 'url' => `http:://day.1yuaninfo.com/index/news/apply.html?openid={$openid}&num={$num}`, 'data' => ['first' => ['value' => '尊敬的'.base64_decode($wx_nickname).'，您好:', 'color' => '#FF0000'], 'keyword1' => ['value' => '【即时通知】', 'color' => '#FF0000'], 'keyword2' => ['value' => '' . date("Y-m-d H:i:s",time()) . '' , 'color' => '#173177'],'keyword3' => ['value' => '日新月溢' , 'color' => '#173177'],'remark' => ['value' => '体验机会充值成功，点击查看详情', 'color' => '#FF0000']]];
        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token;

        $result = https_request($url,$params);
        return $result;
	}

    public static function register($openid,$wx_nickname)
    {
        // return $openid;
        // return $num;
        $access_token = Predis::getInstance()->get("access_token_tin");
        if(!$access_token)
        {
            $access_token = BaseModel::GetAccessToken();
        }

        //$access_token = Predis::getInstance()->get("access_token_tin");
        $data = ['touser' => '' . $openid . '', 'template_id' => ''.config("wx.caozuo").'', 'url' => 'http://tin.1yuaninfo.com/index/news/register.html?openid='.$openid, 'data' => ['first' => ['value' => '尊敬的会员'.$wx_nickname.'，您好:', 'color' => ''], 'keyword1' => ['value' => ''.$wx_nickname.'', 'color' => '#FF0000'],'keyword2' => ['value' => '【注册成功】', 'color' => '#FF0000'], 'keyword3' => ['value' => '' . date("Y-m-d H:i:s",time()) . '','color' => ''],'keyword4' => ['value' => '注册成功提醒','color' => ''],'remark' => ['value' => '恭喜您获得5次体验机会（价值199元/次），点击查阅详情...', 'color' => '#FF0000']]];

        //   $data = ['touser' => ''.$openid.'', 'template_id' => ''.config("wx.tongzhi").'', 'url' => `http:://day.1yuaninfo.com/index/news/apply.html?openid={$openid}&num={$num}`, 'data' => ['first' => ['value' => '尊敬的'.base64_decode($wx_nickname).'，您好:', 'color' => '#FF0000'], 'keyword1' => ['value' => '【即时通知】', 'color' => '#FF0000'], 'keyword2' => ['value' => '' . date("Y-m-d H:i:s",time()) . '' , 'color' => '#173177'],'keyword3' => ['value' => '日新月溢' , 'color' => '#173177'],'remark' => ['value' => '体验机会充值成功，点击查看详情', 'color' => '#FF0000']]];

        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
        $start_time = microtime(true);

        $fp = fsockopen('api.weixin.qq.com', 80, $error, $errstr, 1);
        $http = "POST /cgi-bin/message/template/send?access_token={$access_token} HTTP/1.1\r\nHost: api.weixin.qq.com\r\nContent-type: application/x-www-form-urlencoded\r\nContent-Length: " . strlen($params) . "\r\nConnection:close\r\n\r\n$params\r\n\r\n";

        fwrite($fp, $http);

        fclose($fp);

        return (microtime(true) - $start_time);
    }

    public static function apply_send($openid,$wx_nickname)
    {
        // return $openid;
        // return $num;
       // print_r($openid);die;
        $access_token = redis()->get('access_token_tin');
        if(!$access_token){
            $access_token = \app\wxadmint1\model\Base::GetAccessToken();
        }
        try{

            $data = ['touser' => ''.$openid.'', 'template_id' => ''.config("wx.tongzhi").'', 'url' => 'http://tin.1yuaninfo.com/index/news/awaiting.html?date='.time(), 'data' => ['first' => ['value' => '尊敬的会员'.$wx_nickname.'，您好:', 'color' => '#173177'],'keyword1' => ['value' => ''.$wx_nickname.'', 'color' => '#173177'], 'keyword2' => ['value' => '积少成多', 'color' => '#173177'], 'keyword3' => ['value' => '' . date("Y-m-d H:i:s",time()) . '' , 'color' => '#173177'],'keyword4' => ['value' => '【申请追加体验次数】' , 'color' => '#FF0000'],'remark' => ['value' => '您的追加体验次数申请已提交，查看进度详情......', 'color' => '#FF0000']]];
//            var_dump($data);
        }catch(\Exception $e){
            var_dump($e->getMessage());

        }

        $params = json_encode($data, JSON_UNESCAPED_UNICODE);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token;

        $result = https_request($url,$params);
        return $result;
    }



}