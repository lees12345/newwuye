<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\common\lib\Shows;
use app\common\business\Order as OrderBuss;

/*
 * 维修任务等页面
 * @auther lee
 * @datetime 2021/12/28
 */
class Order extends Header
{
    private $validate;
    public $request;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->validate = validate('Order');
        $this->request = $request;
    }

    /*
     * TODO 提交维修任务
     * @param type 1物业维修 2工程维修 3事务维修
     * @param order_remark 描述
     * @param user_name 报修人
     * @param contact 联系人
     * @param area 所在地区
     * @param address 维修地址
     * @param user_tel 手机号
     * @param phone 电话
     * @param end_order_time 预约时间
     */
    public function postOrder()
    {
        $param = $this->request->param();

        if(!$this->validate->scene('PostOrder')->check($param)){
            return Shows::error($this->validate->getError());
        };

        $res = OrderBuss::getInstance()->postOrder($param,$this->user_id);

        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg']);
        }

    }

    /*
    * TODO 获取个人信息
    * @return json array userinfo 如果type_id 为0 则三种维修都无法提交 如果为1则提交事务维修 如果为2则提交企业维修和工程维修
    */
    public function getUserInfo()
    {
        $res = OrderBuss::getInstance()->getUserInfo($this->openid);
        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg'],1002);
        }
    }

    /*
     * TODO 获取任务总数
     *  @param type 1物业维修 2工程维修 3事务维修
     */
    public function getOrderNum()
    {

        $res = OrderBuss::getInstance()->getOrderNum($this->user_id);

        return Shows::success($res);
    }

    /*
     * TODO 接收任务
     * @param id 任务id
     */
    public function postReceive()
    {
        $id = $this->request->param('id');

        if(!$id)
        {
            return Shows::error('请输入参数');
        }

        $res = OrderBuss::getInstance()->postReceive($this->user_id,$id);

        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * TODO 填写任务进度
     * @param id 订单
     * @param title 标题
     * @param desc 描述
     * @return json array
     */
    public function addOrderLog()
    {
        $param = $this->request->param();

        if(!$this->validate->scene('addOrderLog')->check($param)){
            return Shows::error($this->validate->getError());
        };

        $res = OrderBuss::getInstance()->addOrderLog($this->user_id,$param);

        return Shows::success($res,'成功');
    }

    /*
     * TODO 进度查询
     * @param id 订单id
     */
    public function getOrderLogList()
    {
        $id = $this->request->param('id');

        if(!$id)
        {
            return Shows::error('请输入参数');
        }

        $res = OrderBuss::getInstance()->getOrderLogList($this->user_id,$id);

        return Shows::success($res,'成功');
    }


    /*
     * TODO 任务详情
     * @param id 订单id
     */
    public function getOrderInfo()
    {
        $id = $this->request->param('id');

        if(!$id)
        {
            return Shows::error('请输入参数');
        }

        $res = OrderBuss::getInstance()->getOrderInfo($this->user_id,$id);

        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * TODO 获取订单列表
     * @param type 1企业维修 2工程维修 3事务维修
     * @param order_status 0未接收 1处理中 2已完成
     */
    public function getOrderList()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->getOrderList($this->user_id,$param);

        if(empty($res))
        {
            return Shows::error('列表为空！');
        }
        return Shows::success($res);
    }

    /*
     * TODO 结束维修任务
     * @param $id 订单id
     */
    public function postEnd()
    {
        $id = $this->request->param('id');

        if(!$id)
        {
            return Shows::error('请输入参数');
        }

        $res = OrderBuss::getInstance()->postEnd($id);

        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * TODO 保存个人信息
     * @param user_name 昵称
     * @param user_picture 头像
     */
    public function editUserInfo()
    {
        $param = $this->request->param();

        if(isset($param['file']) && $param['file'] && (!isset($param['user_picture']) || !$param['user_picture']))
        {
            $res = OrderBuss::getInstance()->files($param);

            if($res['code']){
                $param['user_picture'] = $res['msg'];
                unset($param['file']);
            }else{
                return Shows::error($res['msg']);
            }
        }
        unset($param['file']);
        OrderBuss::getInstance()->editUserInfo($param,$this->user_id);

        if(isset($param['user_picture']) && $param['user_picture'])
        {
            return Shows::success($param['user_picture'],'成功');
        }else{
            return Shows::success('成功');
        }

    }

    /*
     * TODO 获取当前是否有权限
     * @param type  type 1企业维修 2工程维修 3事务维修
     */
    public function getAuth()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->getAuth($param,$this->user_id);

        if($res['code'])
        {
            return Shows::success($res['msg'],'通过');
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * TODO 获取上传图片token
     * @param
     */
    public function getToken()
    {

        $res = OrderBuss::getInstance()->getToken();

        return Shows::success($res,'成功');
    }

    /*
     * TODO 上传图片
     * @param $id orderid
     */
    public function getPicUrl()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->files($param);

        if($res['code']){
            return Shows::success($res['msg']);
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * TODO 确认查看信息
     * @param
     */
    public function postLook()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->postLook($param,$this->user_id);

        return Shows::success($res);

    }

    /*
     * TODO 结束后服务评价
     * @param $oid 订单id
     * @param $num 分数
     * @param $content 评价内容
     */
    public function postGrade()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->postGrade($param,$this->user_id);

        return Shows::success($res);

    }

    /*
     * TODO 服务评价列表
     * @param $oid 订单id
     */
    public function getGradeList()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->getGradeList($param,$this->user_id);

        return Shows::success($res);

    }

    /*
     * TODO 服务评价详细
     * @param $id 服务评价列表id
     */
    public function getGradeInfo()
    {
        $param = $this->request->param();

        $res = OrderBuss::getInstance()->getGradeInfo($param,$this->user_id);

        return Shows::success($res);

    }
}
