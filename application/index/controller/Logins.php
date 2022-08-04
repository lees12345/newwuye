<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\common\lib\Shows;
use app\common\business\Login as LoginBuss;

/*
 * 登录注册页面相关
 * @auther lee
 * @datetime 2021/12/27
 */
class Logins extends Base
{
    /*
     *  获取验证码
     *  @param user_tel 手机号
     */
    public function postSend(Request $request)
    {
        $userTel = $request->param('user_tel');

        if(!$userTel)
        {
            return Shows::error('手机号不能为空！');
        }

        $res = LoginBuss::getInstance()->postSend($userTel);

        if($res['code'])
        {
            return Shows::success([],$res['msg']);
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * 注册登录
     * @param user_tel 手机号
     * @param codes 手机号验证码
     * @param openid openid
     * @param type_id 用户类型 0 其他 1企业 2商户
     * @return Json boolean
     */
    public function Login(Request $request)
    {
        $param = $request->param();

        $res = LoginBuss::getInstance()->Login($param);

        if($res['code'])
        {
            return Shows::success($res['msg'],'成功');
        }else{
            return Shows::error($res['msg']);
        }
    }

    /*
     * 自动登录并判断用户是否需要注册
     * @param wxcode 微信code
     * @return json 如果status为-1则需要用户去注册绑定手机号 如果为1则直接登录成功
     */
    public function zdLogin(Request $request)
    {
        $param = $request->param();

        $res = LoginBuss::getInstance()->getLogin($param);

        if($res['code'] == 1)
        {
            return Shows::success($res['msg'],'登录成功！');
        }else if($res['code'] < 0){
            return Shows::error($res['msg'],-1,204);//请绑定手机号
        }else{
            return Shows::error($res['msg'],-2,206);//未关注公众号 或者 关注推送保存出错
        }
    }

    /*
     * TODO 提交意见反馈
     * @param question_content string 标题
     * @param image array 图片
     */
    public function postIdea(Request $request)
    {
        $param = $request->param();

        $res = LoginBuss::getInstance()->postIdea($param);

        return Shows::success($res,'成功');
    }

}
