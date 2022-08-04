<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use app\wxadmint1\service\Share as ShareService;
use app\wxadmint1\model\Share as ShareModel;

class Share extends Base
{
	public static function ModelTypeID($re,$type_id,$learn='')
	{
		// halt($modelId);
		// halt($re);
		// halt($type_id);

		// $modelld = $modelld;

		

		

			
	$result = ShareService::SendAll4($re,$type_id,$learn);
			

		return $result;
	}

	//进行类型和消息表一对一结合
	public function messagetype()
	{
    		return $this->hasOne('messagetype','mt_id','mt_id');
	}

	//进行联合
	public static function newstype()
	{
    		$banner = ShareModel::relation('messagetype');//要关联
    		return $banner;
	}
    /*
     * 查询平台服务记录列表*/
    public static function getSendList($time,$search='')
    {
        if(empty($search))
        {
            if($time>'1602432022')
            {
                $data = self::field('s_code,s_addtime,s_status,s_remark,s_updtime')->where('s_addtime','>',$time)->order('s_id desc')->select();
            }else{
                $data = self::field('s_code,s_addtime,s_status,s_remark,s_updtime')->where('s_addtime','>','1602432022')->order('s_id desc')->select();
            }
        }else{
            // return $search;die;

            if($time>'1602432022')
            {
                $data = self::field('s_code,s_addtime,s_status,s_remark,s_updtime')->where('s_addtime','>',$time)->where($search)->order('s_id desc')->select();
            }else{
                $data = self::field('s_code,s_addtime,s_status,s_remark,s_updtime')->where('s_addtime','>','1602432022')->where($search)->order('s_id desc')->select();
            }
        }


        return $data;
    }
}