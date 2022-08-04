<?php

namespace app\wxadmint1\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use think\Ucpaas;
use app\wxadmint1\model\News as NewsModel;
use think\Cache;
use app\wxadmint1\model\Messagetype;
use app\wxadmint1\model\UsersType;
use app\wxadmint1\validate\NewsAdd;
use think\cache\driver\Redis;
use app\wxadmint1\model\Users as UsersModel;
use app\wxadmint1\model\Selected as SelectedModel;
use app\index\model\NewsUser;

class News extends Base
{
    //消息列表
    public function index()
    {
        $param = Request::instance()->get();
        $list = \app\wxadmint1\model\News::listNews();

        $page = $list->render();

        $this->assign('data',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }


    //消息添加列表
    public function add()
    {
        //  print_r(config("wx.html_news"));die;

        //客户类型
        $user_type = UsersType::where('type',-1)->order('order asc')->select();
        $this->assign('utype', $user_type);

        //客户身份
        $user_auth = UsersType::where('type','>',-1)->order('order asc')->select();
        $this->assign('uauth', $user_auth);
        return $this->fetch('', [
            "utype" => $user_type
        ]);
    }


//消息添加入库
    public function insert()
    {
        $param = Request::instance()->post();
        try {
            $data = \app\wxadmint1\model\News::addNews($param);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            exit;
        }
        return $this->success('发送成功', 'wxadmint1/news/index');
    }

    //消息删除
    public function del()
    {
        //删除单个模板信息
        $request = Request::instance()->param();
        $res = NewsModel::destroy($request['news_id']);
        if ($res) {
            $this->success('删除成功', 'wxadmint1/news/index');
        } else {
            $this->error('删除失败');
        }
    }

    //消息修改页面
    public function upd()
    {
        $request = Request::instance()->param();
        //进行消息查询
        $data = \app\wxadmint1\model\News::where('id', $request['news_id'])->value('new_content');
        return $this->fetch('', [
            'data' => $data,
            'id' => $request['news_id']
        ]);
    }

    //消息修改
    public function xiu()
    {
        //接受信息
        $param = Request::instance()->param();
        $data = NewsModel::newsEdit($param);
        if ($data) {
            $this->success('修改成功', 'wxadmint1/news/index');
        } else {
            $this->error('修改失败');
        }
    }

    //添加快讯
    public function flash_add()
    {
        return $this->fetch();
    }

    //处理
    public function flash_insert()
    {
        $request = Request::instance()->param();
        // halt($request);
        $request['kx_addtime'] = time();
        $re = Db::name('news_type')->insert($request);
        if ($re) {
            $this->success('添加成功', 'wxadmint1/news/flash_index');
        } else {
            $this->error('添加失败');
        }
    }

    //快讯列表
    public function flash_index()
    {
        $list = Db::name('news_type')->order('kx_id desc')->paginate(7);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function flash_del()
    {
        // return $this->fetch();
        $request = Request::instance();
        $params = $request->get();
        $list = Db::name('news_type')->delete(['kx_id' => $params['kx_id']]);
        if ($list) {
            return $this->success('删除成功', 'news/flash_index');
        } else {
            return $this->error('删除失败');
        }
    }

    //进行查看列表展示
//	public function flash_watchs()
//	{
    //进行查看列表展示
    public function flash_watchs()
    {
        $request = Request::instance()->param();
        //print_r($request);die;
        //查询点击快讯的用户信息
        $data = \app\wxadmint1\model\NewsTypeClick::getUsersClickList($request['kx_id']);
        // print_r($data);die;
        $arr = $data->toArray();
        foreach ($arr['data'] as $k => &$v) {
            //查询用户类型
            $type = \app\wxadmint1\model\UsersType::where('type_id', $v['type_id'])->find();
            $v['type_name'] = $type['type_name'];
            $v['tel'] = substr_replace($v['user_tel'], '******', 3, 6);
        }
        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();

        // print_r($data);
        $page = $data->render();
        $this->assign('list', $arr['data']);
        $this->assign('page', $page);
        $this->assign('kxid', $request['kx_id']);
        $this->assign('adminid', $adminid);
        return $this->fetch();
    }

//	}

    //进行查看列表展示
    public function recods()
    {

        //利用传过来的id查看列表
        $request = Request::instance();

        //查询消息类型
        $condition = [];
        $conditions = [];
        $param = $request->get();


        if (array_key_exists("user_tel", $param) && $param['user_tel']) {
            $condition["user_tel"] = ["like", "%" . $param["user_tel"] . "%"];
        }

        $list = \app\wxadmint1\model\UserNewsClick::NewsClickList($param, $condition, $conditions);
        $count = $list->total();
        $page = $list->render();
        $list = $list->toArray()['data'];
//        foreach ($list as $k => &$v) {
//            $list[$k]['user_tels'] = substr_replace($v['user_tel'], '****', 3, 6);
//        }


        $id = Session::get('adminid');
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();
        return $this->fetch('', [
            "count" => $count,
            "adminid" => $adminid,
            "kxid" => $param['news_id'],
            "page" => $page,
            "list" => $list,
        ]);
    }


    //导出sssss
    public function ddus()
    {
        //利用传过来的id查看列表
        $request = Request::instance();
        $params = $request->get();

        $list = \app\wxadmint1\model\UserNewsClick::downloadNewsClickList($params);
        $type = \app\wxadmint1\model\UsersType::select();
        foreach ($type as $v) {
            $types[$v["type_id"]] = $v["type_name"];
        }
        if (!$list) {
            return $this->error("暂无");
        }

        $id = Session::get('adminid');
        //print_r($id);die;
        $adminid = Db::name('auth_group_access')
            ->field('group_id')
            ->where('uid', $id)
            ->find();
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
        foreach ($list as $k => $v) {
            $v['user_tels'] = substr_replace($v['user_tel'], '**', 3, 4);
            if ($v['click_type'] == '1') {
                $v['click_type'] = '交易时段查看';
            } elseif ($v['click_type'] == '2') {
                $v['click_type'] = '超时';
            } elseif ($v['click_type'] == '3') {
                $v['click_type'] = '失效';
            } elseif ($v['click_type'] == '4') {
                $v['click_type'] = '点击需要';
            } elseif ($v['click_type'] == '6') {
                $v['click_type'] = '点击不需要';
            }
            $num = $k + 1;
            if ($adminid['group_id'] == 39) {

                $objPHPExcel->setActiveSheetIndex(0)
                    //Excel的第A列，uid是你查出数组的键值，下面以此类推
                    ->setCellValue('A' . ($num + 1), $v['user_name'])
                    ->setCellValue('B' . ($num + 1), $v['user_tel'])
                    ->setCellValue('C' . ($num + 1), date('Y-m-d H:i:s', $v['add_time']))
                    ->setCellValue('D' . ($num + 1), $v['user_first_people'])
                    ->setCellValue('E' . ($num + 1), $v['user_develop_people'])
                    ->setCellValue('F' . ($num + 1), $v['user_remark'])
                    ->setCellValue('G' . ($num + 1), isset($types[$v['type_id']]) ? $types[$v['type_id']] : $v["type_id"])
                    ->setCellValue('H' . ($num + 1), $v['click_type']);

            } else if ($adminid['group_id'] == 56) {
                $objPHPExcel->setActiveSheetIndex(0)
                    //Excel的第A列，uid是你查出数组的键值，下面以此类推
                    ->setCellValue('A' . ($num + 1), $v['user_name'])
                    ->setCellValue('B' . ($num + 1), $v['user_tel'])
                    ->setCellValue('C' . ($num + 1), date('Y-m-d H:i:s', $v['add_time']))
                    ->setCellValue('D' . ($num + 1), $v['user_first_people'])
                    ->setCellValue('E' . ($num + 1), $v['user_develop_people'])
                    ->setCellValue('F' . ($num + 1), $v['user_remark'])
                    ->setCellValue('G' . ($num + 1), isset($types[$v['type_id']]) ? $types[$v['type_id']] : $v["type_id"])
                    ->setCellValue('H' . ($num + 1), $v['click_type']);
            } else if ($adminid['group_id'] == 47) {
                $objPHPExcel->setActiveSheetIndex(0)
                    //Excel的第A列，uid是你查出数组的键值，下面以此类推
                    ->setCellValue('A' . ($num + 1), $v['user_name'])
                    ->setCellValue('B' . ($num + 1), $v['user_tel'])
                    ->setCellValue('C' . ($num + 1), date('Y-m-d H:i:s', $v['add_time']))
                    ->setCellValue('D' . ($num + 1), $v['user_first_people'])
                    ->setCellValue('E' . ($num + 1), $v['user_develop_people'])
                    ->setCellValue('F' . ($num + 1), $v['user_remark'])
                    ->setCellValue('G' . ($num + 1), $types[$v['type_id']])
                    ->setCellValue('H' . ($num + 1), $v['click_type']);
            } else {
                $objPHPExcel->setActiveSheetIndex(0)
                    //Excel的第A列，uid是你查出数组的键值，下面以此类推
                    ->setCellValue('A' . ($num + 1), $v['user_name'])
                    ->setCellValue('B' . ($num + 1), $v['user_tels'])
                    ->setCellValue('C' . ($num + 1), date('Y-m-d H:i:s', $v['add_time']))
                    ->setCellValue('D' . ($num + 1), $v['user_first_people'])
                    ->setCellValue('E' . ($num + 1), $v['user_develop_people'])
                    ->setCellValue('F' . ($num + 1), $v['user_remark'])
                    ->setCellValue('G' . ($num + 1), isset($types[$v['type_id']]) ? $types[$v['type_id']] : $v["type_id"])
                    ->setCellValue('H' . ($num + 1), $v['click_type']);
            }

            // print_r($v);die;

        }
        $objPHPExcel->getActiveSheet()->setTitle('客户类型表');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', '用户姓名');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', '电话号码');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', '查看时间');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', '新单人员');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', '开发人员');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', '备注');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', '类型');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', '查看类型');

        $objPHPExcel->setActiveSheetIndex(0);
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

    //卖出
    public function sell($news_id)
    {
        $new = NewsModel::get($news_id);
        return $this->fetch('', [
            'data' => $new
        ]);
    }

    //卖出
    public function sell_update()
    {
        $data = Request::instance()->post();
        $condition['shares_status'] = $data['shares_status'];
        $condition['end_time'] = strtotime($data['end_time']);
        //  print_R($condition);die;
        NewsModel::where('id', '=', $data['news_id'])->update($condition);
        $this->success('修改成功', 'wxadmint1/news/index');
    }

    /**
     * 跟踪推送
     * @param $news_id
     * @return mixed
     */
    public function tishi($news_id)
    {
        //查询股票名称
        $news = \app\wxadmint1\model\News::field('id,news_code')->where('id', $news_id)->find();
        return $this->fetch('', [
            'news_id' => $news_id,
            'news_code' => $news['news_code']
        ]);
    }

    public function tishi_insert()
    {
        $param = Request::instance()->post();
        $param["wx_id"] = getWxId($param["name"]);
        \app\wxadmint1\model\News::addTrack($param, config("wx." . $param["name"]));
        return $this->success('发送成功', 'wxadmint1/news/index');
    }

    //推送客服消息
    public function send_customer()
    {
        return $this->error('新功能暂未上线，请耐心等待哦~~');
        $learn = Db::name('learn')->order('learn_id desc')->select();
        $this->assign('learn', $learn);
        //查出有几类的客户
        $user_type = UsersType::all();
        //查询消息类型
        //快讯标题
        return $this->fetch('', [
            'learn' => $learn,
            'type' => $user_type
        ]);
    }

    //群发
    public function send_message()
    {
        $param = Request::instance()->post();
        $file = Request::instance()->file('file');
        //如果文件存在
        if ($file) {

        }
        if ($param['wx_type'] != 1) {
            return $this->error('新功能暂未上线，请耐心等待哦~~');
        }
        NewsModel::sendMessageCustomer($param);
        return $this->success('发送成功');
    }


    /*展示股票卖出详情*/
    public function maichu($id = 0)
    {
        //查询
        // $user = \app\wxadmint1\model\UsersPlay::where("user_id","=",17104)->select();

        // $news_id = array_column($user,"s_id");

        // //模型查出
        // $ti = \app\wxadmint1\model\Tishi::where("mt_name","not in",["盘后总结","回顾","信息提示","跟踪提示","温馨提醒","提醒","即时通知","回顾","服务提示","跟踪"])->where("news_typeid","in",$news_id)->select();

        // $data = Db::name('news')->alias('n')->join('messagetype t','n.mt_id = t.mt_id')->where('n.add_time','between',[1567094400,1585756800])->order('n.news_id desc')->select();

        $data = Db::name('share')->where('s_addtime', 'between', [1567094400, 1585756800])->order('s_id desc')->select();
        // print_r($data);die;
        // $data = Db::name('news')->where('add_time','between',[1567094400,1585756800])->order('news_id desc')->select();
        $this->assign('tishi', $data);
        return $this->fetch();
    }

    /*展示股票详情 给个人中心*/
    public function contents($id = 0)
    {
        $data = Db::name('share')->where('s_id', '=', $id)->find();

        $this->assign('content', $data['s_content']);
        return $this->fetch();
    }

    //同步 测试接口链接：http://zztong.admin.gszx77.com/wxadmint1/zstatusss/test
    public function synchro($id)
    {
        $data = \app\common\lib\Synchro::searchNewsByID($id);
        // print_R($data);die;
        if (isset($data["result"]["code"]) && $data["result"]["code"] == 100) {
            return $this->success('同步成功', 'wxadmint1/news/index');
        } else if (isset($data["result"]["msg"])) {
            return $this->error($data["result"]["msg"]);
        } else {
            return $this->error("同步失败，请联系管理员");
        }
    }

}