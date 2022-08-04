<?php

namespace app\wxadmint1\model;

use app\common\lib\redis\Predis;
use think\Db;
use think\Model;
use think\Session;
use app\wxadmint1\model\Base as BaseModel;
use app\wxadmint1\model\Users as UsersModel;
use app\wxadmint1\model\ActivityLog as ActivityLogModel;


class Stastics extends Model
{
    /**
     * 查询数据
     */
    public static function getAllData($param, $conditions)
    {
        //print_r($conditions);die;
        $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where($param);
        if ($conditions) {
            $list = $list->whereTime("create_time", "between", $conditions);
        } else {
            $list = $list->whereTime('create_time', '-1 month');
        }
        $tuiguang = $list->select();
        // print_r($tuiguang);die;
        $material = array_column($tuiguang, 'material');
        //  print_r($material);die;
        $arr = [];
        foreach ($material as $key) {
            if (!empty($key)) {
                if (filter_var($key, FILTER_VALIDATE_URL) !== false) {
                    $arr[] = $key;
                } else {
                    //$source_arr = strrchr($key,'');
                    //print_r($source_arr);
                    $arr[] = self::getSourceData(substr($key, 1));
                }
            }

        }
        //   print_r($arr);die;
        //素材数组
        $arr_merial = array_filter(array_unique($arr));
        $test = [];
        $data = [];
        //    print_r($arr_merial);die;
        foreach ($arr_merial as $k) {
            $data[$k] = self::getArrMerial($tuiguang, 'material', $k);
        }
        //print_R($data);die;
        foreach ($data as $kk => $vv) {
            // print_r($vv);die;
            $test[$kk]['start_count'] = count($vv);
            if (empty($vv)) {
                $all_count = [];
            } else {
                $all_count = \app\wxadmint1\model\Users::field('id,type_id')->where('user_tel', 'in', array_unique($vv))->where('wx_id', '1')->select();
            }
            //  $all_count = $all_counts->select();
            $test[$kk]['register_count'] = self::getUsersCount($all_count, 'type_id', '2');
            $test[$kk]['deal_count'] = self::getUsersCount($all_count, 'type_id', '3');
            $test[$kk]['end_count'] = self::getUsersCount($all_count, 'type_id', '4');
            $test[$kk]['end_experience_count'] = self::getUsersCount($all_count, 'type_id', '16');
            $test[$kk]['apply_count'] = self::getUsersCount($all_count, 'type_id', '25');
            $test[$kk]['black_count'] = self::getUsersCount($all_count, 'type_id', '8');
            $test[$kk]['not_write_count'] = self::getUsersCount($all_count, 'type_id', '11');
            $test[$kk]['timeout_count'] = self::getUsersCount($all_count, 'type_id', '26');
            $test[$kk]['will_count'] = self::getUsersCount($all_count, 'type_id', '24');
            $test[$kk]['all_count'] = count($all_count);
            if ($test[$kk]['all_count'] == 0) {
                $test[$kk]['flavor'] = '0';
            } else {
                $test[$kk]['flavor'] = empty($test[$kk]['all_count']) ? '0.00' : number_format(($test[$kk]['deal_count'] + $test[$kk]['end_count']) / $test[$kk]['all_count'] * 100, 2);
            }
        }
//        redis()->set('register_count',array_column($test,'register_count'),900);
//        redis()->set('deal_count',array_column($test,'deal_count'),900);
        $column['xAxis']['data'] = $arr_merial;
        $column['series'] = [
            [
                'name' => '进线人数',
                'data' => array_column($test, 'start_count')
            ], [
                'name' => '总注册',
                'data' => array_column($test, 'all_count')
            ], [
                'name' => '签约人数',
                'data' => array_column($test, 'deal_count')
            ],
            [
                'name' => '成单比',
                'data' => array_column($test, 'flavor')
            ]
        ];
        $column['legend']['data'] = ['进线人数', '总注册', '签约人数', '成单比'];
        $all_counts = self::getCountUsers($test, 10);
        $start_counts = self::getCountUsers($test, 1);
        $deal_counts = self::getCountUsers($test, 3);
        $end_counts = self::getCountUsers($test, 4);
        $deal_flavor = empty($all_counts) ? '0.00' : number_format(($deal_counts + $end_counts) / $all_counts * 100, 2);

        $column['show']['data'] = [
            'start_count' => $start_counts,
            'all_count' => $all_counts,
            'register_count' => self::getCountUsers($test, 2),
            'deal_count' => $deal_counts,
            'end_count' => $end_counts,
            'end_experience_count' => self::getCountUsers($test, 16),
            'apply_count' => self::getCountUsers($test, 25),
            'black_count' => self::getCountUsers($test, 8),
            'not_write_count' => self::getCountUsers($test, 11),
            'timeout_count' => self::getCountUsers($test, 26),
            'will_count' => self::getCountUsers($test, 24),
            'flavor' => empty($start_counts) ? '0.00' : number_format($all_counts / $start_counts * 100, 2),
            'deal_flavor' => $deal_flavor,
        ];
        //记录缓存

        return $column;
    }

    /**
     * 新查询数据
     */
    public static function newGetAllData($param, $conditions)
    {
        $getActivityStatus = 0;
        $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel,create_time')->where($param);
        if ($conditions) {
            $list = $list->whereTime("create_time", "between", $conditions);
        } else {
            $list = $list->whereTime('create_time', '-1 month');
            // 最新注册&最新签约，没有时间获取所有的
            $getActivityStatus = 1;
        }
        $tuiguang = $list->select();

        // 获取数据数组
        $arr = [];
        foreach ($tuiguang as $key) {
            $arr[] = [
                'mobile_tel' => $key['mobile_tel'],
                'create_time' => strtotime($key['create_time'])
            ];
        }
        // 查询时间段转换为小时
//        $time = self::newGetTimeData($conditions);
        $all = [];
        $newTime = [];
        $time = self::newGetTimeData();
        // 转换为固定格式
        foreach ($time as $v) {
            $newTime[$v] = [];
        }
        // 以小时为单位组装手机号数组
        foreach ($arr as $k) {
            $t = date('H', $k['create_time']);
            $newTime[$t][] = $k['mobile_tel'];
            $all[] = $k['mobile_tel'];
        }
        $arr_merial = array_keys($newTime);
        foreach ($arr_merial as &$mv) {
            $mv = $mv . '时';
        }
        $test = [];
        foreach ($newTime as $kk => $vv) {
            $test[$kk]['start_count'] = count($vv);
            if (empty($vv)) {
                $all_count = [];
            } else {
                $all_count = DB::table('users')->field('id,type_id')->where('user_tel', 'in', array_unique($vv))->where('wx_id', '1')->select();
            }
            $test[$kk]['register_count'] = self::getUsersCount($all_count, 'type_id', '2');//体验中
            $test[$kk]['deal_count'] = self::getUsersCount($all_count, 'type_id', '3') + self::getUsersCount($all_count, 'type_id', '4') + self::getUsersCount($all_count, 'type_id', '11');//签约人数
            $test[$kk]['end_count'] = self::getUsersCount($all_count, 'type_id', '4');//结束人数
            $test[$kk]['end_experience_count'] = self::getUsersCount($all_count, 'type_id', '16');//体验结束
            $test[$kk]['apply_count'] = self::getUsersCount($all_count, 'type_id', '25');//待申请
            $test[$kk]['black_count'] = self::getUsersCount($all_count, 'type_id', '8');//黑名单
            $test[$kk]['not_write_count'] = self::getUsersCount($all_count, 'type_id', '11');//未签协议
            $test[$kk]['timeout_count'] = self::getUsersCount($all_count, 'type_id', '26');//暂停推荐
            $test[$kk]['will_count'] = self::getUsersCount($all_count, 'type_id', '24');//即将成交
            $test[$kk]['all_count'] = count($all_count);//总注册
            if ($test[$kk]['all_count'] == 0) {
                $test[$kk]['flavor'] = '0';//注册比
            } else {
                $test[$kk]['flavor'] = empty($test[$kk]['all_count']) ? '0.00' : number_format(($test[$kk]['deal_count'] + $test[$kk]['end_count']) / $test[$kk]['start_count'] * 100, 2);
            }
        }
        $column['xAxis']['data'] = $arr_merial;
        $column['series'] = [
            [
                'name' => '进线人数',
                'data' => array_column($test, 'start_count')
            ], [
                'name' => '总注册',
                'data' => array_column($test, 'all_count')
            ], [
                'name' => '签约人数',
                'data' => array_column($test, 'deal_count')
            ],
            [
                'name' => '成单比',
                'data' => array_column($test, 'flavor')
            ]
        ];
        $column['legend']['data'] = ['进线人数', '总注册', '签约人数', '成单比'];
        $all_counts = self::getCountUsers($test, 10);
        $start_counts = self::getCountUsers($test, 1);
        $deal_counts = self::getCountUsers($test, 3);
        $end_counts = self::getCountUsers($test, 4);
        $not_write_count = self::getCountUsers($test, 11);
        $deal_flavor = empty($all_counts) ? '0.00' : number_format($deal_counts / $start_counts * 100, 2);//成单比

        $column['show']['data'] = [
            'start_count' => $start_counts,
            'all_count' => $all_counts,
            'register_count' => self::getCountUsers($test, 2),
            'deal_count' => $deal_counts,
            'end_count' => $end_counts,
            'end_experience_count' => self::getCountUsers($test, 16),
            'apply_count' => self::getCountUsers($test, 25),
            'black_count' => self::getCountUsers($test, 8),
            'not_write_count' => self::getCountUsers($test, 11),
            'timeout_count' => self::getCountUsers($test, 26),
            'will_count' => self::getCountUsers($test, 24),
            'flavor' => empty($start_counts) ? '0.00' : number_format($all_counts / $start_counts * 100, 2),
            'deal_flavor' => $deal_flavor,
            'register' => self::getNewActivity($all, 0, $getActivityStatus),
            'sign' => self::getNewActivity($all, 1, $getActivityStatus)
        ];

        return $column;
    }

    /**
     * 查询时间段转数组
     */
    public static function newGetTimeData()
    {
        $time = [];
        for ($i = 0; $i <= 23; $i++) {
            $time[$i] = str_pad($i, 2, "0", STR_PAD_LEFT);
        }
        return $time;
    }

    /**
     * @param array $data
     * @param string $field
     * @param $value
     * @return array
     */
    public static function getUsersCount(array $data, string $field, $value)
    {
        $data = array_filter($data, function ($row) use ($field, $value) {
            if (isset($row[$field])) {
                return $row[$field] == $value;
            }
        });
        return count($data);
    }

    /**
     * 新注册数据、新签约人数
     * @param $tels array
     * @param $type string
     * @param $getActivityStatus string
     */
    public static function getNewActivity($tels, $type, $getActivityStatus)
    {
        if ($type == 0) {
            // 注册
            $lists = DB::table('activity_log')->alias('a')
                ->join('users u', 'u.id=a.user_id', 'left')
                ->where('a.see_register', 0);
            if ($getActivityStatus == 0) {
                $lists = $lists->where('u.user_tel', 'in', $tels);
            }

            $lists = $lists->count();
        } else {
            // 签约
            $lists = DB::table('activity_log')->alias('a')
                ->join('users u', 'u.id=a.user_id', 'left')
                ->join('order o', 'o.user_tel=u.user_tel', 'left')
                ->where('a.see_sign', 0);
            if ($getActivityStatus == 0) {
                $lists = $lists->where('u.user_tel', 'in', $tels);
            }
            $lists = $lists->whereNotNull('o.id')
                ->where('o.pay_status', 1)
                ->where('o.order_type', 1)
                ->group('a.user_id')
                ->count();
        }

        return $lists;
    }

    /*
     * 根据素材查询数组中的手机号*/
    public static function getArrMerial(array $data, string $field, $value)
    {
        $res = [];
        foreach ($data as $v) {
            if (strpos($v["material"], $value)) {
                $res[] = $v["mobile_tel"];
            }

        }
        return $res;
    }

    /*
     * 查询素材列表
     */
    public static function getAllMaterial()
    {
        $where['create_time'] = array('>', '1614268800');
        $where['source_uid'] = array('in', ['h51612368000028476297', 'h51595347200235089922']);
        $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where($where);
        //   $list = $list->whereTime('create_time','-2 month');
        $tuiguang = $list->select();
        // print_r($tuiguang);die;
        $material = array_column($tuiguang, 'material');
        $arr = [];
        foreach ($material as $key) {
            if (filter_var($key, FILTER_VALIDATE_URL) !== false) {
                $arr[] = $key;
            } else {
                $arr[] = substr($key, 8, strpos($key, '&'));
            }
        }
        //素材数组
        $arr_merial['data'] = array_filter(array_unique($arr));
        return $arr_merial;
    }

    /**
     * 查询用户总数
     */
    public static function getCountUsers($test, $type)
    {
        $count = 0;
        foreach ($test as $k => $v) {
            if ($type == 1) {
                $count += $v['start_count'];
            } elseif ($type == 2) {
                $count += $v['register_count'];
            } elseif ($type == 3) {
                $count += $v['deal_count'];
            } elseif ($type == 4) {
                $count += $v['end_count'];

            } elseif ($type == 16) {
                $count += $v['end_experience_count'];

            } elseif ($type == 25) {
                $count += $v['apply_count'];

            } elseif ($type == 8) {
                $count += $v['black_count'];

            } elseif ($type == 11) {
                $count += $v['not_write_count'];

            } elseif ($type == 26) {
                $count += $v['timeout_count'];

            } elseif ($type == 24) {
                $count += $v['will_count'];

            } elseif ($type == 10) {
                $count += $v['all_count'];

            }

        }
        return $count;
    }

    /*
     * 查询用户列表*/
    public static function getUsersList($request, $conditions)
    {
        $where['material'] = array('like', '%' . $request['material'] . '%');
//        $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where($where);
//     //   print_r($list);die;
//        if($conditions){
//            $list = $list->whereTime("create_time","between",$conditions);
//        }else{
//            $list = $list->whereTime('create_time','-1 month');
//        }
//        $tuiguang = $list->select();
//        print_r($tuiguang);die;
        $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where($where);
        if ($conditions) {
            $list = $list->whereTime("create_time", "between", $conditions);
        } else {
            $list = $list->whereTime('create_time', '-1 month');
        }
        $lists = $list->select();
        //  print_r($lists);die;
        // $where['material'] = array('like','%'.$request['material'].'%');
        // $list = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where($where)->select();
        $tel = array_column($lists, 'mobile_tel');

        // $data = \app\wxadmint1\model\Users::field('id,user_tel,user_remark,type_id,register_time,user_server_people,user_develop_people')->where('user_tel','in',$tel)->where('type_id',$request['type']) ->paginate(10,false,['query' => request()->param()]);

        return $tel;
    }

    /*
     * 新查询用户手机号列表*/
    public static function newGetUsersList($time, $start_time, $end_time)
    {
        $lists = \app\wxadmint1\model\UserTuiGuang::field('material,mobile_tel')->where("FROM_UNIXTIME(create_time,'%H') = " . $time)->where("create_time", ">=", $start_time)->where("create_time", '<=', $end_time)->select();
        $tel = array_column($lists, 'mobile_tel');
        return array_unique($tel);
    }

    /**
     * 获取素材来源
     *
     */
    public static function getSourceData($data)
    {
        parse_str($data, $query_arr);
        return $query_arr['source'];
    }

    /**
     * 根据时间段查询数据
     */
    public static function getTimeData($date, $time)
    {
        //$data = [];
        $times = array_column($time, 'time');
        // print_r($times);die;
        foreach ($time as $k => $v) {
            $data[$k] = array_walk($date, function ($val, $key) {
                return $val;
            });
        }

        print_r($data);
        //$column['xAxis']['data'] = $time;
    }

    public static function test($date)
    {
        $time = self::getTimeFromRange();
        foreach ($time as $k => $v) {
            $dates[$k] = $date . $k;
        }
        return $dates;
    }

    public static function getTimeFromRange()
    {
        $Time_arr = [];
        for ($i = 0; $i < 24; $i++) {
            $key = date($i . ':00');
            $Time_arr[$key] = [
                'time' => $key,
            ];
        }
        return $Time_arr;
    }

}