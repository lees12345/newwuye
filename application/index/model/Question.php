<?php

namespace app\index\model;

use think\Db;
use think\exception\ValidateException;
use think\Model;
use app\index\model\Question as QuestionModel;

class Question extends Model
{
	public static function postQuertion($data)
	{
		Db::startTrans();
		try{
			$image = $data['image'];
			unset($data['image']);
			if(!is_array($image))
			{
				$image = json_decode($image);
			}
			$img = [];
			foreach ($image as $item) {
				if($item)
				{
					$img[] = Db::table('question_image')->insertGetId(['img_url'=>$item]);
				}
			}
			$data['question_img'] = json_encode($img);
			$id = Db::table('question')->insertGetId($data);
			// 提交事务
			Db::commit();

			return $id;
		} catch (\Exception $e) {
			throw new ValidateException($e->getMessage());
			// 回滚事务
			Db::rollback();
		}
	}
	
	//问题和用户关联
	public static function questionIndexs()
	{
		//进行关联
		$data = QuestionModel::relation('users');
		return $data;
	}

	public function users()
	{
		return $this -> belongsTo("users",'user_id','user_id')->field('user_id,user_name,user_tel');
	}

	//问题和图片关联
	public static function getImageDatas()
	{
		$data = QuestionModel::relation("images");
		return $data;
	}
	
	public function images()
	{
		return $this -> hasMany('images','question_id','question_id');
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
	public static function replys()
	{
		$data=QuestionModel::with(['reply'=>function($query){
			$query->where('reply_status','=',1);
		}]);
		return $data;
	}

}