<?php
namespace app\index\model;

use think\exception\ValidateException;
use think\Model;
use think\Db;
use app\wxadmint1\model\QuestionImage;

/**
 * 订单表
 * Class Order
 * @package app\index\model
 */
class UsersGrade extends Model{


    public function getImageAttr($value)
    {
        $imgs = $value;
        $item = json_decode($imgs);
        if(empty($item))
        {
            return [];
        }else{
            $img = implode(',',$item);
            return QuestionImage::where('question_img_id','in',$img)->column('img_url');
        }
    }
}