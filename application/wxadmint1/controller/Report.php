<?php
namespace app\wxadmint1\controller;
use app\wxadmint1\model\QuestionImage;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Cookie;
use think\Validate;
use app\wxadmint1\model\Question;

class Report extends Base
{
	public function index()
	{
		$list = Question::order('question_id desc')->paginate(15);
		foreach ($list as &$item) {
			if($item['question_img'])
			{
				$item['question_img'] = json_decode($item['question_img']);
				$img = implode(',',$item['question_img']);
				$item['question_img'] = QuestionImage::where('question_img_id','in',$img)->column('img_url');
			}
		}
		$page = $list -> render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}
}