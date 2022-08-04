<?php

namespace app\index\model;

use think\Model;
use think\Db;

class Share extends Model
{
    /**
     * 柱状图
     */
    public static function getSharesChart($number)
    {
        switch ($number)
        {
            case 1;
            $data[0]['全部'] = self::whereTime('s_addtime','last month')->count();
            $data[0]['止盈'] = self::where('s_status','1')->whereTime('s_addtime','last month')->count();
            $data[0]['持股'] = self::where('s_status','0')->whereTime('s_addtime','last month')->count();
            $data[0]['止损'] = self::where('s_status','in',[2,3,4])->whereTime('s_addtime','last month')->count();
            $data[0]["product"] = date('m', strtotime(date('Y-m') . " - 1 month")).'月';
            break;

            case 3;
                $months = [
                    date('Y-m', strtotime(date('Y-m') . " - 2 month"))."-01",
                    date('Y-m', strtotime(date('Y-m') . " - 1 month"))."-01",
                    date('Y-m', strtotime(date('Y-m') ))."-01",
                    date('Y-m', strtotime(date('Y-m') . " + 1 month"))."-01",
                ];
                $data = static::getTimeSharesChart($months);
                break;

                case 6;
                    $months = [
                        date('Y-m', strtotime(date('Y-m') . " - 5 month"))."-01",
                        date('Y-m', strtotime(date('Y-m') . " - 4 month"))."-01",
                        date('Y-m', strtotime(date('Y-m') . " - 3 month"))."-01",
                        date('Y-m', strtotime(date('Y-m') . " - 2 month"))."-01",
                        date('Y-m', strtotime(date('Y-m') . " - 1 month"))."-01",
                        date('Y-m', strtotime(date('Y-m') ))."-01",
                        date('Y-m', strtotime(date('Y-m') . " + 1 month"))."-01",
                    ];
                    $data = static::getTimeSharesChart($months);
                    break;

                    case 12;
                        $months = [
                            date('Y-m', strtotime(date('Y-m') . " - 11 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 10 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 9 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 8 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 7 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 6 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 5 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 4 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 3 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 2 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') . " - 1 month"))."-01",
                            date('Y-m', strtotime(date('Y-m') ))."-01",
                            date('Y-m', strtotime(date('Y-m') . " + 1 month"))."-01",
                        ];
                        $data = static::getTimeSharesChart($months);
                        break;

            default:
                $data[0]['全部'] = self::whereTime('s_addtime','month')->count();
                $data[0]['止盈'] = self::where('s_status','1')->whereTime('s_addtime','month')->count();
                $data[0]['持股'] = self::where('s_status','0')->whereTime('s_addtime','month')->count();
                $data[0]['止损'] = self::where('s_status','in',[2,3,4])->whereTime('s_addtime','month')->count();
                $data[0]["product"] = date('m', strtotime(date('Y-m') )).'月';
                break;
        }

        return $data;
    }
    /*
     * 计算最近几个月每个月的柱状图展示情况*/
    public static function getTimeSharesChart($time)
    {
        //print_r($time);
        foreach ($time as $k=>$v)
        {
            if(!isset($time[$k+1]))
            {
                break;
            }
            $data[$k]['全部'] = self::whereTime('s_addtime','between',[$time[$k],$time[$k+1]])->count();
            $data[$k]['止盈'] = self::where('s_status','1')->whereTime('s_addtime','between',[$time[$k],$time[$k+1]])->count();
            $data[$k]['持股'] = self::where('s_status','0')->whereTime('s_addtime','between',[$time[$k],$time[$k+1]])->count();
            $data[$k]['止损'] = self::where('s_status','in',[2,3,4])->whereTime('s_addtime','between',[$time[$k],$time[$k+1]])->count();
            $data[$k]["product"] = date('m', strtotime(date($time[$k]) )).'月';
            //print_r($time[$k+1]);die;
        }
        return $data;
    }
    /**
     * 股票列表
     */
    public static function allSharesList()
    {
        $data = self::field('s_id,s_name,s_code,s_nowprice,s_addtime,s_remark,today_show,all_benefit')->order('s_id desc')->paginate(10);
        return $data;
    }

}