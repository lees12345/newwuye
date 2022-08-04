<?php
namespace app\wxadmint1\controller;
use app\common\lib\redis\Predis;
use think\Controller;
use think\Auth;
use think\Db;
use think\Request;
use app\wxadmint1\model\Auth_rule as Auth_ruleModel;
use app\wxadmint1\model\Auth_group as Auth_groupModel;
use app\wxadmint1\model\Admin as AdminModel;
use app\wxadmint1\validate\AdminAdd;
use app\wxadmint1\validate\AdminEdit;
use app\wxadmint1\model\CustomerMessage;
use app\wxadmint1\model\UsersType;

class Admin extends Base
{
    public function auth_add()
    {
        $auth = Db::name('auth_rule') -> where('pid','0') -> select();
        $this -> assign('auth',$auth);
        return $this -> fetch();

    }

    public function auth_insert()
    {
        $request = Request::instance();
        $data = $request->post();



        $auth_add = Auth_ruleModel::InsertAuthRule($data);
        if($auth_add)
        {
            $this->success('添加成功','wxadmint1/admin/auth_index');
        }else{
            $this->error('添加失败');
        }
    }


    public function auth_index()
    {
        $auth0 = Db::name('auth_rule')->order('id asc')->paginate(10);

        $page = $auth0->render();


        $this->assign('page',$page);
        $this -> assign('auth0',$auth0);
        return $this->fetch();
        // halt($auth0);
    }

    //用户组
    public function rule_add()
    {
        $auth1 = Auth_ruleModel::IndexAuthRule();

        $this -> assign('auth1',$auth1);
        // halt($auth1);
        return $this->fetch();

    }

    //用户组添加
    public function rule_insert()
    {
        $request = Request::instance();
        $data = $request -> post();
        $result = Auth_groupModel::InsertAuthRule($data);

        if($result)
        {
            $this->success('添加成功','wxadmint1/admin/rule_index');
        }else{
            $this->error('添加失败');
        }
    }

    public function rule_index()
    {
        $res = Db::name('auth_group') -> order('id asc') -> select();
        $this -> assign('res',$res);
        return $this -> fetch();




    }

    //修改
    public function rule_edit($id)
    {

        $res = Db::name('auth_group')->where('id',trim($id))->find();
        $res['rules'] = explode(',', $res['rules']);
        $auth1 = Auth_ruleModel::IndexAuthRule();
        $this -> assign('auth1',$auth1);
        $this->assign('res',$res);
        return $this->fetch();

    }

    //修改用户组
    public function rule_upd()
    {
        $request = Request::instance();
        $data = $request->param();

        $result = Auth_groupModel::UpdAuthRule($data);
        if($result)
        {
            $this->success('修改成功','wxadmint1/admin/rule_index');
        }else{
            $this->error('修改失败');
        }


    }

    public function rule_del($id)
    {
        //删除用户组 并且删除group_access
        $num = Db::name('auth_group_access') ->where('group_id',$id)->count();
        if($num)
        {
            $this->error('用户组下有相关用户无法清除');
        }else{
            Db::name('auth_group') ->where('id',$id)->delete();
            $this->success('删除成功','wxadmint1/admin/rule_index');
        }
    }

    //添加管理员
    public function admin_add()
    {
        $auth = Db::name('Auth_group') -> order('id asc') -> select();
        $this->assign('auth',$auth);
        return $this -> fetch();
    }

    //添加数据
    public function admin_insert()
    {
        $request = Request::instance();
        $data = $request->post();
        $error = (new AdminAdd())->gocheck($data);
        if(is_string($error))
        {
            return $this->error($error);
        }


        $result = AdminModel::InsertAdminID($data);

        $group['uid'] = $result;
        $group['group_id'] = trim($data['id']);
        $acc = Db::name('auth_group_access')->insert($group);
        if($acc)
        {
            $this -> success('添加成功','wxadmint1/admin/admin_index');
        }else{
            $this -> error('添加失败');
        }

    }

    //展示管理员列表
    public function admin_index()
    {
        $request = Request::instance();
        $data = $request->get();
        // halt($data);
        $list = AdminModel::IndexAdmin($data);
        //paginate(8,false,['query' => request()->param()]);
        // halt($list);

        $tt = Db::name('auth_group')->select();
        $page = $list->render();

        $this->assign('tt',$tt);
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    //修改管理员列表
    public function admin_edit($admin_id)
    {
        // halt($admin_id);
        $res = AdminModel::get(trim($admin_id));
        // halt($res);
        $zz = Db::name('auth_group_access') ->where('uid',$admin_id)->find();
        // halt($zz);
        $tt = Auth_groupModel::all();
        // halt($tt);

        $this->assign('zz',$zz);
        $this->assign('res',$res);
        $this->assign('tt',$tt);
        return $this->fetch();

    }

    //管理员修改
    public function admin_upd()
    {
        $request = Request::instance();
        $data = $request->post();

        $error = (new AdminEdit())->gocheck($data);
        if(is_string($error))
        {
            return $this->error($error);
        }


        if($data['tid'] != $data['id'])
        {
            $where['uid'] = $data['admin_id'];
            $res['group_id'] = $data['id'];
            $group = Db::name('auth_group_access')->where($where)->update($res);
            if(!$group)
            {
                return $this->error('修改分组失败');
            }

        }

        $condition['admin_id'] = $data['admin_id'];
        $condition['admin_password'] = pass(trim($data['admin_ypassword']));

        $admins = Db::name('admin')->where($condition)->find();
        if(!$admins)
        {
            return $this->error('修改密码失败');
        }

        $admin['admin_password'] = pass(trim($data['admin_password']));
        $admin['admin_name'] = $data['admin_name'];
        $admin['admin_id'] = $data['admin_id'];

        $upd = Db::name('admin')->update($admin);
        if($upd)
        {
            return $this->success('修改成功','wxadmint1/admin/admin_index');
        }else{
            return $this->error('修改失败');
        }



    }

    //删除管理员列表
    public function admin_del($admin_id)
    {
        $res = Db::name('auth_group_access')->where('uid',trim($admin_id))->delete();
        if($res){
            $dd = Db::name('admin')->delete(trim($admin_id));
            return $this->success('修改成功','wxadmint1/admin/admin_index');
        }
        return $this->error('修改失败');
    }

    //设置客服页面
    public function addCustomerService(){
        return $this->fetch();
    }

    //设置客服
    public function setCustomerService(){
        $param = Request::instance()->post();
        $data = [
            "kf_account" => $param["kf_account"],
            "nickname" => $param["nickname"],
            "password" => $param["password"]
        ];
        $file = Request::instance()->file('admin_name');
//        halt($file);
        $data = json_encode($data);
        $access_token = cache('access_token');
        $url = sprintf(config('wx.add_customer'),$access_token);
        $result = https_request($url,$data);
        if($result['errcode'] == 0){
            $urls =sprintf(config('wx.add_curstomer_img'),$access_token,$param["kf_account"]);
            $mime = $file->getInfo('type');
            $fileName =$file->getInfo('name');
//              $ext = pathinfo($file->getInfo['name'])['extension'];
//              var_dump($mime,$fileName);
//            //curl 上传头像
            $postData = [
                'file' => new \CURLFile(realpath($file->getPathname()), $mime, $fileName),
            ];
            $data = $this->curlUploadFile($urls,$postData);
            $data = json_decode($data,true);
            if($data['errorcode'] == 0){
                return $this->success('成功','ListCustomerService');
            }
        }
        return $this->error($result["errcode"]);
    }

    //上传头像
    private function curlUploadFile($url, $data)
    {
        $curl = curl_init();
        if (class_exists('\CURLFile')) {
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
            //$data = array('file' => new \CURLFile(realpath($path)));//>=5.5
        } else {
            if (defined('CURLOPT_SAFE_UPLOAD')) {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
            }
            //$data = array('file' => '@' . realpath($path));//<=5.5
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1 );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return $result;
    }

    //客服列表
    public function ListCustomerService(){
        $access_token = cache('access_token');
        $url = sprintf(config('wx.curstomer_list'),$access_token);
        $result = https_request($url);
//        halt($result);
        return $this->fetch('',[
            'list'=>$result["kf_list"]
        ]);
    }

    //设置消息推送页面
    public function addMessage(){
        $learn=Db::name('learn')->order('learn_id desc')->select();
        $this->assign('learn',$learn);
        //查出有几类的客户
        $user_type = UsersType::all();
        //查询消息类型
        //快讯标题
        return $this->fetch('',[
//            'learn' => $learn,
            'type' => $user_type
        ]);
    }

    //入库
    public function setMessage(){
        $param = Request::instance()->post();
        //拼接数据入库
        $data = [
            "type" =>$param["wx_type"],
            "content" => $param["news_adstracts"],
            "send_time" => $param["send_time"],
            "user_type" => json_encode($param["type"])
        ];
        \app\common\lib\redis\Predis::getInstance()->set("customer_".$param['order'],json_encode($data));
        return $this->success('success','listMessage');
    }

    //消息列表
    public function listMessage(){

        $url = [];
        $data = [
            Predis::getInstance()->get('customer_1'),
            Predis::getInstance()->get('customer_2'),
            Predis::getInstance()->get('customer_3'),
            Predis::getInstance()->get('customer_4'),
        ];
        foreach($data as $k => &$v){
            $v = json_decode($v,true);
            $v['id'] = $k+1;
            $v["type"] = $this->gettypeMessage($v['user_type']);

        }
//        $url = CustomerMessage::order("id desc")->select();
//       foreach($url as $k=>&$v){
//           $v["type"] = $this->gettypeMessage($v['type']);
//       }

        return $this->fetch('',[
            'data' => $data
        ]);
    }

    //修改
    public function updateMessage($id){
        $data = Predis::getInstance()->get('customer_'.$id);
        $user_type = UsersType::all();
        $data = json_decode($data,true);
        return $this->fetch('',[
            'data' => $data,
            "type" => $user_type
        ]);
    }
    public function editMessage(){
        $data = Predis::getInstance()->get('customer_1');
        halt($data);
    }

    private function gettypeMessage($type){
        $type = json_decode($type,true);
        $type = Db::name('users_type')->where('type_id','in',$type)->select();
        return $type;
    }



    //素材列表
    public function getMaterialList($page=1){
        $access_token = redis()->get('access_token_tin');
        // print_r($access_token);die;
        $url = sprintf(config('wx.source_list'),$access_token);
        $offset = ($page-1)*20;
        $data = [
            "type" => "image",
            "offset" => $offset,
            "count" => 20
        ];

        $data = json_encode($data);
        halt(https_request($url,$data));
    }
}