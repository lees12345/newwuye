<?php

namespace app\wxadmint1\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Ucpaas;
use app\wxadmint1\model\Users as UsersModel;
use app\wxadmint1\model\MessagePushLog as MessagePushLogModel;
use think\PHPExcel;

class Users extends Base
{
    //用户列表
    public function index()
    {
        $request = Request::instance()->param();
        if (!empty($request['v'])) {
            //获取到日期范围

            // halt($request);
            if (!empty($request['start_date']) && !empty($request['end_date'])) {
                //  $start = strtotime($request['start_date']);
                //$end = strtotime($request['end_date']);
                if (!empty($request['type_time'])) {

                    if ($request['type_time'] == 1) {
                        $re['add_time'] = ['between time', [$request['start_date'], $request['end_date']]];

                    } else if ($request['type_time'] == 2) {
                        $re['out_time'] = ['between time', [$request['start_date'], $request['end_date']]];

                    } else {

                        $re['register_time'] = ['between time', [$request['start_date'], $request['end_date']]];
                    }
                } else {
                    $re['register_time'] = ['between time', [$request['start_date'], $request['end_date']]];
                }

                // print_R($re);die;


            }
            // 用户关注状态
            if (!empty($request['user_status'])) {
                if ($request['user_status'] == 1) {
                    $re['user_status'] = '1';
                } elseif ($request['user_status'] == 2) {
                    $re['user_status'] = '0';
                    $re['out_time'] = '0';
                } else {
                    $re['user_status'] = '0';
                    $re['out_time'] = array('>', '0');
                }
            }

            if (!empty($request['user_tel'])) {
                $re['user_tel'] = array('like', '%' . trim($request['user_tel']) . '%');
            }


            if (!empty($request['auth'])) {
                $re['auth'] = $request['auth'];
            }

            if (isset($request['type_id']) && $request['type_id'] != '') {
                $re['type_id'] = $request['type_id'];
            }
            $re['wx_id'] = '1';
            $list = UsersModel::AllUsersList($re, $this->newgroups);
        } else {
            $re['wx_id'] = '1';
            //查询用户信息
            $list = UsersModel::AllUsersList($re, $this->newgroups);
        }

        $arr = $list['data']->toArray();

        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();
        $page = $list['data']->render();
        $this->assign('adminid', $adminid);
        $this->assign('page', $page);
        $this->assign('data', $arr['data']);
        $this->assign('us', $list['count']);
        $this->assign('auth',config('wx.auth'));
        $this->assign('user_type',config('wx.user_type'));
        return $this->fetch();
    }


    //删除单个用户信息
    public function del()
    {
        $request = Request::instance()->param();

        $res = Db::name('users')->where('id', $request['user_id'])->delete();
        if ($res) {
            $this->redirect('wxadmint1/users/index');
        } else {
            $this->error('删除失败', 'wxadmint1/users/index');
        }
    }

    //修改用户信息页面
    public function upd()
    {
        //用户信息
        $request = Request::instance()->param();
        $data = \app\wxadmint1\model\Users::where('id', $request['user_id'])
            ->find();
        $type = $data->getData('auth');
        $type_id = $data->getData('type_id');
        $this->assign('user_id',$request['user_id']);
        $this->assign('data', $data);
        $this->assign('type',$type);
        $this->assign('type_id',$type_id);
        $this->assign('auth',config('wx.auth'));
        $this->assign('user_type',config('wx.user_type'));
        return $this->fetch();
    }

    //修改用户信息
    public function xiu()
    {
        //接受信息
        $request = Request::instance()->param();

        $request['update_time'] = time();
        $user = UsersModel::where("id", "=", $request["id"])->find();
        $data = $user->save($request);

        if ($data) {
            //更新缓存信息
            setRedis("users:openid:" . $user["openid"], json_encode($user), 3600);

            $this->success('修改成功', 'wxadmint1/users/index');
        } else {
            $this->error('修改失败', 'wxadmint1/users/index');
        }


    }

    //修改用户信息页面
    public function services()
    {
        //用户信息
        $request = Request::instance()->param();
        $data = UsersModel::get($request);
        //查询所有的用户类型
        $this->assign('data', $data);
        return $this->fetch();
    }

    //修改用户信息
    public function kai()
    {
        //接受信息
        $request = Request::instance()->param();
        $request['update_time'] = time();
        $data = Db::name('users')->where('user_id', $request['user_id'])->update($request);
        if ($data) {
            $this->success('修改成功', 'wxadmint1/users/index');
        } else {
            $this->error('修改失败', 'wxadmint1/users/index');
        }


    }


    //修改用户次数
    public function numupd()
    {
        $request = Request::instance()->param();
        //print_R($request);
        $usernum = Db::name('users')
            ->where('id', $request['user_id'])
            ->find();
        if ($usernum['experience_num'] == '0') {
            $data = Db::name('user_apply')
                ->where('user_id', $request['user_id'])
                ->where('apply_status', '1')
                ->find();
            //	print_R($data);die;
            if (empty($data)) {
                $request['apply_addtime'] = time();
                $request['apply_status'] = '1';
                //print_R($request);die;
                $re = Db::name('user_apply')->insert($request);
                if ($re) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 4;
            }


        } else {
            echo 5;
        }


    }


    public function cstatus()
    {
        $data = UserModel::CStatus();
        halt($data);
    }

    //查询用户股票名称
    public function stock()
    {
        $request = Request::instance()->param();
        // 单独处理付费解锁
        $click_type = 0;
        if (!empty($request['click_type']) && $request['click_type'] == 8) {
            $click_type = 8;
            $request['click_type'] = 0;
        }
        //查询用户的id
        if (!empty($request['s_status'])) {
            //查询全部
            if ($request['s_status'] == '4') {
                if (!empty($request['click_type'])) {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('u.click_type', $request['click_type'])
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                } else {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                }

            } elseif ($request['s_status'] == '5') {
                if (!empty($request['click_type'])) {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('s.shares_status', '0')
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->where('u.click_type', $request['click_type'])
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                } else {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('s.shares_status', '0')
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                }
            } else {
                if (!empty($request['click_type'])) {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('s.shares_status', $request['s_status'])
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->where('u.click_type', $request['click_type'])
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                } else {
                    $res = Db::name('user_news_click')
                        ->alias('u')
                        ->Field('u.add_time as click_time,u.news_id,u.user_id,u.status,u.click_type,s.id,s.title,s.shares_status,s.add_time,s.news_code,s.remark,s.end_time,u.is_order')
                        ->join('news s', 'u.news_id = s.id')
                        ->where('u.user_id', $request['user_id'])
                        ->where('s.is_shares', '1')
                        ->where('s.wx_id', '1')
                        ->where('s.is_show', '1')
                        ->where('s.shares_status', $request['s_status'])
                        ->order('s.add_time desc');
                    if (isset($request['is_order'])) {
                        $res = $res->where('u.is_order', $request['is_order'])->select();
                    } else {
                        $res = $res->select();
                    }
                }


            }

        }

        // print_R($re);die;
        $count = 0;
        foreach ($res as $key => $v) {
            $res[$key]['user_name'] = $request['user_name'];
            // 统计个数
            if (empty($request['click_type'])) {
                $count++;
            } else {
                if ($v['click_type'] == $request['click_type']) {
                    $count++;
                }
            }
        }
        if ($click_type == 8) {
            $request['click_type'] = 8;
        }
        // print_R($res);die;
        $this->assign('re', $res);
        $this->assign('user_id', $request['user_id']);
        $this->assign('user_name', $request['user_name']);
        $this->assign('s_status', $request['s_status']);
        $this->assign('click_type', isset($request['click_type']) ? $request['click_type'] : 0);
        $this->assign('count', $count);
        return $this->fetch();

    }

    //查询用户关注后推送过的股票记录
    public function push()
    {
        $request = Request::instance()->param();
        $users = Db::table('users')->where('id', $request['user_id'])->find();
        $data = Db::name('news')
            ->where('add_time', '>', $users['add_time'])
            ->where('wx_id', '1')
            ->where('is_shares', '1')
            ->order('add_time desc')
            ->select();
        $this->assign('re', $data);
        return $this->fetch();
    }

    // 平台声明推送记录
    public function state_list()
    {
        $request = Request::instance()->param();
        $data = MessagePushLogModel::where('user_id', $request['user_id'])->where('type', 5)->order('id desc')->select();

        //  print_r($data);die;
        $this->assign('data', $data);
        return $this->fetch();
    }

    //取消关注用户导出
    public function qxuser()
    {
        set_time_limit(0);
        ini_set("memory_limit", "512M");

        $noneeds = Db::name('users')->where('user_status', '0')->where('type_id', '<>', 1)->select();
        foreach ($noneeds as $k => $v) {
            //查询用户总次数
            $a = Db::table('users_play')
                ->field('end_ids')
                ->where('openid', $noneeds[$k]['openid'])
                ->find();
            $a['end_ids'] = explode(',', $a['end_ids']);
            if (count($a['end_ids']) == 1) {
                $noneeds['count'] = 0;
            } else {
                $noneeds[$k]['count'] = count($a['end_ids']) - 2;
            }
            //查询用户成功次数
            $success = Db::table('users_play')
                ->field('s_ids')
                ->where('openid', $noneeds[$k]['openid'])
                ->find();
            //$sussess['s_ids']=explode(',', $success['s_ids']);
            $noneeds[$k]['success_num'] = Db::table('share')
                ->where("s_status='1'")
                ->where(['s_id' => ['in', $success['s_ids']]])
                ->count();

            //查询用户失败次数
            $success = Db::table('users_play')
                ->field('s_ids')
                ->where('openid', $noneeds[$k]['openid'])
                ->find();
            // $sussess['s_ids']=explode(',', $success['s_ids']);
            $error = array('2', '3');
            $noneeds[$k]['error_num'] = Db::table('share')
                ->where(['s_status' => ['in', $error]])
                ->where(['s_id' => ['in', $success['s_ids']]])
                ->count();
            $percent = $noneeds[$k]['success_num'] + $noneeds[$k]['error_num'];
            if ($percent > 0) {
                $noneeds[$k]['success_percent'] = round($noneeds[$k]['success_num'] / $percent * 100, 2) . "％";
            } else {
                $noneeds[$k]['success_percent'] = 0;
            }
        }
        $name = 'admins';
        $objPHPExcel = new \PHPExcel();
        /*以下是一些设置 ，什么作者  标题啊之类的*/
        $objPHPExcel->getProperties()->setCreator("转弯的阳光")
            ->setLastModifiedBy("转弯的阳光")
            ->setTitle("数据EXCEL导出")
            ->setSubject("数据EXCEL导出")
            ->setDescription("备份数据")
            ->setKeywords("excel")
            ->setCategory("result file");
        /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        foreach ($noneeds as $k => $v) {
            $num = $k + 1;
            // print_r($v);die;
            $objPHPExcel->setActiveSheetIndex(0)
                //Excel的第A列，uid是你查出数组的键值，下面以此类推
                ->setCellValue('A' . ($num + 1), date("Y-m-d H:i:s", $v['add_time']))
                ->setCellValue('B' . ($num + 1), $v['user_name'])
                ->setCellValue('C' . ($num + 1), $v['user_tel'])
                ->setCellValue('D' . ($num + 1), '取关用户')
                ->setCellValue('E' . ($num + 1), $v['user_server_people'])
                ->setCellValue('F' . ($num + 1), $v['user_develop_people'])
                ->setCellValue('H' . ($num + 1), $v['user_remark'])
                ->setCellValue('I' . ($num + 1), $v['user_num'])
                ->setCellValue('J' . ($num + 1), $v['user_holdnum'])
                ->setCellValue('K' . ($num + 1), $v['success_num'])
                ->setCellValue('L' . ($num + 1), $v['error_num'])
                ->setCellValue('M' . ($num + 1), $v['success_percent']);
        }
        $objPHPExcel->getActiveSheet()->setTitle('客户类型表');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', '注册时间');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', '名字');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', '电话号码');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', '类型');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', '服务人员');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', '开发人员');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', '注册人员');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', '备注');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', '剩余');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', '持股');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', '成功');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', '失败');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', '成功率');

        $objPHPExcel->setActiveSheetIndex(0);
        $filename = $name . '.xlsx';
        $filename = $name . '.xlsx';
        // halt($filename);
        ob_end_clean();
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-excel");
        header('Content-Disposition:inline;filename="' . $filename . '"');
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Pragma: no-cache");
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // halt($objWriter);
        // $res = $objWriter->save(ROOT_PATH . 'public' . DS . 'uploads/'.$filename);
        $res = $objWriter->save('php://output');
        return $this->fetch('xiazai');
    }

    //竞猜答对用户申请次数添加
    public function comp()
    {
        $re = Request::instance()->param();
        //print_R($re);
        //查询用户类型
        $data = Db::name('users')->where('user_id', $re['user_id'])->find();
        //print_R($data);die;
        //内部员工
        if ($data['type_id'] == '6') {
            return 1;
        } else if ($data['type_id'] == '1') {
            return 2;
        } else if ($data['type_id'] == '2') {
            //体验用户增加次数
            $upd['user_num'] = $data['user_num'] + 1;
            //print_R($upd);die;
            $one = Db::name('users')->where('user_id', $data['user_id'])->update($upd);
            if ($one) {
                $com['admin_id'] = Session::get('admin_id');
                $com['user_id'] = $data['user_id'];
                $com['com_time'] = time();
                $complete = Db::name('complete')->insert($com);
                if ($complete) {
                    //发送数据
                    $res = UsersModel::SendTure($data);
                    // halt($data);
                    return 3;
                } else {
                    return 4;
                }
            } else {
                return 4;
            }
        } else if ($data['type_id'] == '4') {
            //结束用户更改状态增加次数
            $type['type_id'] = '2';
            $type['user_num'] = $data['user_num'] + 1;
            $two_type = Db::name('users')->where('user_id', $data['user_id'])->update($type);
            if ($two_type) {
                $com['admin_id'] = Session::get('admin_id');
                $com['user_id'] = $data['user_id'];
                $com['com_time'] = time();
                $complete = Db::name('complete')->insert($com);
                if ($complete) {
                    //发送数据
                    $res = UsersModel::SendTure($data);
                    return 5;
                } else {
                    return 4;
                }
            } else {
                return 4;
            }
        }
    }

    //竞猜答错
    public function come()
    {
        $request = Request::instance()->post();

        $users = UsersModel::get(['user_id' => $request['user_id']]);
        $res = UsersModel::SendFalse($users);
        // halt($users);
        return '1';
    }

    /*
  @新增用户表加导出类型的
  @黑名单 公海客户 即将成交 待激活
  @author :Devil King
   */
    public function daochus()
    {
        $condition = [];
        $request = Request::instance();
        if (!$request->isGet()) {
            return $this->error('访问方式错误，请勿非法操作');
        }

        $data = $request->get();

        //查询用户类型 进行判断
        if ($data['type'] == 8) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '8')->where('user_status', '1')->where("wx_id", '1')->select();
        } else if ($data['type'] == 24) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '24')->where('user_status', '1')->where("wx_id", '1')->select();
        } else if ($data['type'] == 11) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '11')->where('user_status', '1')->where("wx_id", '1')->select();
        } else if ($data['type'] == 16) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '16')->where('user_status', '1')->where("wx_id", '1')->select();
        } else if ($data['type'] == 23) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '23')->where("wx_id", '1')->select();
        } else if ($data['type'] == 25) {
            $noneeds = Db::name('users')->field('id,user_tel,out_time,user_name,user_remark,type_id,add_time,register_time,user_status,user_server_people,user_develop_people,user_activate_people,user_first_people,user_renew_people,user_activate_people,user_upgrade_people')->where('type_id', '25')->where("wx_id", '1')->select();
        } else if ($data['type'] == 1116) {
            $noneeds = UsersModel::where('user_status', '=', 1)
                ->select();

        } else if ($data['type'] == 1117) {
            $noneeds = \app\wxadmint1\model\Users::getNotAttentionUsers();
        } elseif ($data['type'] == 1118) {
            $noneeds = UsersModel::where('user_status', 0)
                ->where('out_time', '>', 0)
                ->select();
        }

        /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        foreach ($noneeds as $k => $v) {
            if ($v['user_status'] == 1) {
                $v['user_status'] = '关注';
            } else {
                if ($v['out_time'] > 0) {
                    $v['user_status'] = '取消关注';
                } else {
                    $v['user_status'] = '未关注';
                }
            }

            $condition[$k]['id'] = $v['id'];
            $condition[$k]['user_tel'] = $v['user_tel'];
            $condition[$k]['user_remark'] = $v['user_remark'];
            $condition[$k]['user_status'] = $v['user_status'];
            $condition[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
            $condition[$k]['register_time'] = date('Y-m-d H:i:s', $v['register_time']);
            $condition[$k]['user_name'] = $v['user_name'];
            $condition[$k]['type_id'] = $v['type_id'];
            $condition[$k]['auth'] = $v['auth'];
        }
        $this->downloads($condition);
    }

    protected function downloads($noneeds)
    {
        $fileName = '用户表' . date('Ymd_His') . '.csv';
        $filePath = dirname(dirname(dirname(dirname(__FILE__)))).'/public/excel/' . $fileName;
        $index = 0;
        $fp = fopen($filePath, 'w'); //生成临时文件
        chmod($filePath, 0777);//修改可执行权限
        // 将数据通过fputcsv写到文件句柄

        $header = array('id', '手机号', '备注', '用户关注状态', '关注时间', '注册时间', '用户姓名','用户类型', '用户身份');//设置表头
        fputcsv($fp, $header);


        //处理导出数据
        foreach ($noneeds as $key => &$val) {
            foreach ($val as $k => $v) {
                $val[$k] = $v . "\t";
                if ($index == 2000) { //每次写入2000条数据清除内存
                    $index = 0;
                    ob_flush();//清除内存
                    flush();
                }
                $index++;
            }
            fputcsv($fp, $val);
        }
        ob_flush();
        fclose($fp);  //关闭句柄
        header("Cache-Control: max-age=0");
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header("Content-Description: File Transfer");
        header('Content-disposition: attachment; filename=' . basename($fileName));
        header("Content-Type: text/csv");
        header("Content-Transfer-Encoding: binary");
        header('Content-Length: ' . filesize($filePath));
        @readfile($filePath);//输出文件;
        unlink($filePath); //删除压缩包临时文件
//        echo $filePath;
        return;
    }

    /*
     * 客服推送记录列表*/
    public function customer_list()
    {
        $request = Request::instance()->param();
        //print_r($request);
        if (array_key_exists('type', $request) && $request['type'] == 2) {
            $data = \app\wxadmint1\model\UsersAttentionLog::where('user_id', $request['user_id'])->where('type', 2)->select();
        } else {
            $data = \app\wxadmint1\model\UsersAttentionLog::where('user_id', $request['user_id'])->where('type', 1)->select();
        }

        //  print_r($data);die;
        $this->assign('data', $data);
        return $this->fetch();
    }
}