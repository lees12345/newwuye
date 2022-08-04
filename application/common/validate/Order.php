<?php
namespace app\Common\validate;

use think\Validate;

class Order extends Validate
{
    protected $rule = [
        'type'  =>  'require',
        'user_name'  =>  'require',
        'contact'  =>  'require',
        'area'  =>  'require',
        'address'  =>  'require',
        'end_order_time'  =>  'require',
        'id'  =>  'require',
        'title'  =>  'require',
        'desc'  =>  'require',
    ];

    protected $message = [
        'type.require'  =>  '服务类型必须填写',
        'user_name.require'  =>  '报修人必须填写',
        'contact.require'  =>  '联系人必须填写',
        'area.require'  =>  '所在区域必须填写',
        'address.require'  =>  '维修地址必须填写',
        'end_order_time.require'  =>  '预约时间必须填写',
        'id.require'  =>  '订单id必须填写',
        'title.require'  =>  '标题必须填写',
        'desc.require'  =>  '描述必须填写',
    ];

    protected $scene = [
        'PostOrder'  =>  ['type','user_name','contact','area','address','end_order_time'],
        'addOrderLog' => ['id','title','desc'],
    ];
}