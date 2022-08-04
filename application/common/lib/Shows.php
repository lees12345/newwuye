<?php

namespace app\common\lib;

class Shows
{
    /**
     * @param array $data
     * @param string $message
     * @return \think\response\Json
     */
    //定义静态方法，这样就不用实例化，直接调用静态方法
    public static function success($data = [], $message = "OK",$httpStatus=200)
    {
        $result = [
            "status" => 200,
            "message" => $message,
            "result" => $data
        ];

        return json($result,$httpStatus);
    }


    /**
     * @param array $data
     * @param string $message
     * @param int $status
     * @return \think\response\Json
     */
    //为什么这里写 $status ?因为失败的时候大部分是0，当然可能有其他情况，如：-1表示没有登录等待代表不同的逻辑，有可能前端根据我们失败的status状态场景做一些处理，如：跳转，弹层等，所以$status默认是0，如果有其他情况，直接传递即可
    public static function error($message = "error", $status = 0, $data = [],$httpStatus=200)
    {
        $result = [
            "status" => $status,
            "message" => $message,
            "result" => $data
        ];

        return json($result,$httpStatus);
    }

}