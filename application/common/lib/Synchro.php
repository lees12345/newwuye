<?php
namespace app\common\lib;

class Synchro
{

    /**
     * 发送数据id 过来 进行查询数据库
     */
    public static function searchNewsByID($id){

        //获取当前配置环境
        $envir = config("sychro.default");
        $config = config("sychro.".$envir);

        $res = \app\wxadmint1\model\News::where("id","=",$id)->find();
        if($res){
            return self::sendMessage($config,$res);
        }
        return false;
    }

    /**
     * 拼接同步信息 并发送数据
     * @param $config
     * @param $data
     */
    public static function sendMessage($config,$data){
        if(in_array(trim($data["mt_name"]),["午评","收评","早评"])){
            $condition["ISVIP"] = 0;
        }else{
            $condition["ISVIP"] = 1;
            $condition["GROUPID"] = $config["GROUPID"];
        }
        $condition["TITLE"] = $data["mt_name"];
        $condition["CONTENT"] = self::cutstr_html($data["new_content"]);
       // var_dump($condition);die;
        $condition["CELEID"] = $config["CELEID"];
        $url = $config["host"].$config["url"];

        return self::https_requests($config,$url,$condition);
    }

    /**
     * 拼接头部信息
     * @param $config
     * @param $url
     * @param $data
     * @return mixed
     */
    public static function https_requests($config,$url,$data){
        $rand = rand(111111,999999);
        $CURTIME = date("YmdHis",time());
        $header[] = 'Accept:application/json';
        $header[] = 'Content-type:multipart/form-data;charset=UTF-8';
        $header[] ="CLIENT:".$config["header"]['CLIENT'];
        $header[] ="APPID:".$config["header"]["APPID"];
        $header[] = "NONCE:".$rand;
        $header[] ="CURTIME:".$CURTIME;
        $header[] ="OPENKEY:".md5($config["header"]["APPID"].$rand.$CURTIME.$config["header"]["OPENKEY"]);
        $header[] = "USERID:".$config["header"]["USERID"];

        return self::suri_api($url,$header,$data);

    }


    /**
     * 发送
     * @param $url
     * @param $http
     * @param $data
     * @param string $method
     * @return mixed
     */
    public static function suri_api($url,$http, $data, $method = 'POST')
    {
        $opts = array(
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => $http,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_POSTFIELDS => $data
        );

        $curl = curl_init();
        curl_setopt_array($curl, $opts);
        $return = curl_exec($curl);
        curl_close($curl);
        return json_decode($return, TRUE);
    }

    public static function cutstr_html($string,$encoding = 'utf-8',$ellipsis = ""){
        $string = strip_tags($string);
        $string = trim($string);
        $string = mb_ereg_replace("\t","",$string);
        $string = mb_ereg_replace("\r\n","",$string);
        $string = mb_ereg_replace("\r","",$string);
        $string = mb_ereg_replace("\n","",$string);
        $string = mb_ereg_replace("&nbsp;","",$string);
        return trim($string).$ellipsis;
    }

}