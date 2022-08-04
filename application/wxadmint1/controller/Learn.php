<?php
namespace app\wxadmint1\controller;

use app\wxadmint1\model\TemConfig;
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
use app\wxadmint1\model\UsersPlay as UsersPlayModel;
use app\common\lib\Aes;

class Learn extends Base

{
    //添加预约日期
    public function add()
    {
        return $this->fetch();
    }
    public function insert()
    {
        $re=Request::instance()->param();
       // print_R($re);
        $re['start_time']=strtotime($re['start_time']);
        $re['end_time']=strtotime($re['end_time']);
        //入库
        $insertdb=Db::name('learn')->insert($re);
        if($insertdb)
        {
            //入库成功查询id
            $newlearn = Db::name('learn')->order('learn_id desc')->limit(1)->find();
            //拼接url
          //  $learn['learn_url']="http://alternative.gszx77.com/index/learn/index?learn_id=$newlearn['learn_id']";
           // $resnews=md5(json_encode($newlearn));
           // print_R($resnews);die;

            /*$data=$newlearn['learn_id'];
            //进行加密字段
            $aes = new Aes();
            $res = $aes->encrypt(json_encode($data));
            $res = base64_encode($res);*/

            vendor( 'phpqrcode.phpqrcode');
            $errorCorrectionLevel = 'L';  //容错级别
            $matrixPointSize = 5;      //生成图片大小


                $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Findex%2Flogin.html?qdata=".$newlearn['learn_id']."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
             // print_R($url);die;
                //进行长链接转化为短连接
                $api_url = "https://api.weixin.qq.com/cgi-bin/shorturl?access_token=".cache("access_token");
                $date='{"action":"long2short","long_url":"'.$url.'"}';
                $result = https_request($api_url,$date);
                // halt($result);
                if($result['errcode'] == 0)
                {
                    $url = $result["short_url"];
                }

                $path = '/home/wwwroot/only.1yuaninfo.com/public/qrcode/';

                $name = rand(10000,99999).time().".png";
                $filename = $path.$name;

                $data = \QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
               //print_R($data);die;
                $QR = $filename;
                $QR = imagecreatefromstring(file_get_contents($QR));
                //print_R($QR);
                $learn['learn_pic']=$name;
                $learn['learn_addtime']=time();
                $learn['learn_url']=$url;
                $res=Db::name('learn')->where('learn_id',$newlearn['learn_id'])->update($learn);
                if($res)
                {
                    return $this->redirect('index');
                }else
                {
                    return $this->error('生成二维码失败');
                }
        }else{
            return $this->error('添加失败');
        }

    }
    //列表
    public function index()
    {
        $request = Request::instance() -> param();
        $where = ['status'=>1];

        if(isset($request['name']) && $request['name'])
        {
            $where['name'] = $request['name'];
        }

        $data = TemConfig::where($where)->paginate(15);
        $page = $data -> render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //删除
    public function del()
    {
        $request=Request::instance()->param();
       // print_R($request);
        $re=Db::name('learn')->delete($request);
        if($re)
        {
            return $this->redirect('index');
        }else
        {
            return $this->error('删除失败');
        }
    }

    public function edit(Request $request)
    {
        $res = TemConfig::update($request->param());
        if($res)
        {
            return $this->redirect('index');
        }else{
            return $this->error('修改失败');
        }
    }
    //预约记录
    public function lists()
    {
        $request=Request::instance()->param();
       // print_R($request);die;
        if(!empty($request['v']))
        {
            if(!empty($request['search']))
            {
                $re['u.user_tel|u.user_name|u.user_server_people']=array('like', '%' . trim($request['search']) . '%');
            }
            $data=Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.id')
                ->where('learn_id',$request['learn_id'])
                ->where($re)
                ->order('userlearn_addtime desc')
                -> paginate(20,false,['query' => request()->param()]);
            //print_R($data);die;
            $count=Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.id')
                ->where('learn_id',$request['learn_id'])
                ->where($re)
                ->order('userlearn_addtime desc')
                ->count();
        }else{
            $data=Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.id')
                ->where('learn_id',$request['learn_id'])
                ->order('userlearn_addtime desc')
                -> paginate(20,false,['query' => request()->param()]);
            //print_R($data);die;
            $count=Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.id')
                ->where('learn_id',$request['learn_id'])
                ->order('userlearn_addtime desc')
                ->count();
        }

        $page = $data -> render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        $this->assign('learn',$request['learn_id']);
        $this->assign('count',$count);
        return $this->fetch();
    }
    //修改用户接受信息状态
    public function upd()
    {
        $request=Request::instance()->param();
        //print_R($request);die;
        if($request['userlearn_status'] == '1')
        {
            $re['userlearn_status']='2';
        }elseif($request['userlearn_status'] == '2')
        {
            $re['userlearn_status']='1';
        }
        $re['userlearn_id']=$request['userlearn_id'];
        $data=Db::name('user_learn')->update($re);
        if($data)
        {
            $one=Db::name('user_learn')->where('userlearn_id',$request['userlearn_id'])->find();
            $status=$one['userlearn_status'];
            echo $status;
        }else{
            echo "3";
        }
    }
    //导出
    public function daochu()
    {
        $request=Request::instance()->param();
        if($request['status'] == 1)
        {
            $noneeds = Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.user_id')
                ->where('learn_id',$request['learn_id'])
                ->order('userlearn_sort asc')
                ->select();
        }else{
            $noneeds = Db::name('user_learn')
                ->alias('l')
                ->join('users u','l.user_id = u.user_id')
                ->where('users.user_status','=','0')
                ->where('learn_id',$request['learn_id'])
                ->order('userlearn_sort asc')
                ->select();
        }

        foreach($noneeds as $k=>$v) {
            //print_R($v['user_id']);
            //用户关注状态
            if($v['user_status']=='0')
            {
                $noneeds[$k]['is_status'] = '未关注';
            }else{
                $noneeds[$k]['is_status'] = '关注';
            }

        }
       // print_R($noneeds);die;
        $name='admins';
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
        foreach($noneeds as $k => $v){
            $num=$k+1;
            // print_r($v);die;
            $objPHPExcel->setActiveSheetIndex(0)
                //Excel的第A列，uid是你查出数组的键值，下面以此类推
                ->setCellValue('A'.($num+1),$v['user_id'])
                ->setCellValue('B'.($num+1), $v['user_name'])
                ->setCellValue('C'.($num+1), $v['user_tel'])
                ->setCellValue('D'.($num+1), $v['learn_tel'])
                ->setCellValue('E'.($num+1), date("Y-m-d H:i:s",$v['userlearn_addtime']))
                ->setCellValue('F'.($num+1), $v['userlearn_sort'])
                ->setCellValue('G'.($num+1), $v['is_status']);
        }
        $objPHPExcel->getActiveSheet()->setTitle('客户类型表');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', '用户id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', '名字');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', '电话号码');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', '预约电话');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', '预约时间');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', '预约顺序');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', '用户状态');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename = $name.'.xlsx';
        // halt($filename);
        ob_end_clean();
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-excel");
        header('Content-Disposition:inline;filename="'.$filename.'"');
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Pragma: no-cache");
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // halt($objWriter);
        // $res = $objWriter->save(ROOT_PATH . 'public' . DS . 'uploads/'.$filename);
        $res = $objWriter->save('php://output');


        return $this->fetch('xiazai');
    }
}
