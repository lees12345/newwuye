<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use app\wxadmint1\model\Question as QuestionModel;

class Question extends Base
{
	
	//问题和用户关联
	public static function questionIndexs()
	{
		//进行关联
		$data = QuestionModel::relation('users');
		return $data;
	}

	public function users()
	{
		return $this -> belongsTo("users",'user_id','id')->field('id,user_name,user_tel,type_id');
	}

	public function images()
	{
		return $this -> hasMany('question_image','question_img_id','question_img');
	}

	//问题和回复 图片关联
	public static function getImageReplyDatas(){
		$data = QuestionModel::relation(["images","reply"]);
		return $data;
	}

	public function reply()
	{
		return $this -> hasMany('reply','question_id','question_id');
	}

}