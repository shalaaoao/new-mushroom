<?php
namespace App\Bll;

use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;

class BaseBll
{
    const STATUS_OK    = 1; //成功
    const STATUS_ERROR = 0; //失败

    /*
    * 返回信息状态
    * */
    public static function returnData($status, $data = null)
    {
        return ['status' => $status, 'data' => $data];
    }

    //生成随机密码
    public static function makeSecret($length = 16)
    {

        // 密码字符集，可任意添加你需要的字符
        $chars    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $password;
    }

    //格式化金额
    public static function formatMoney($money, $unit = 0)
    {
        if($money < 0){
            $money = doubleval( substr($money,1, strlen($money) - 1 ) );
            $format =  '-'.number_format($money,2,'.',',');
        }else{
            $format =  number_format(doubleval($money),2,'.',',');

            if ($unit) {
                $format = '￥'.$format;
            }
        }

        return $format;
    }

    /**
     * @param $queueName
     * @param $sendTime
     * @return mixed
     */
    public static function pushQueue($queueName, $data, $sendTime)
    {
        if ($sendTime != 0) {
            if(is_numeric($sendTime)){
                return Queue::later($sendTime, $queueName, $data);
            }else{
                $timeArr = explode(":", $sendTime);
                $hour    = $timeArr[0];
                $minute  = isset($timeArr[1]) ? $timeArr[1] : 0;
                $second  = isset($timeArr[2]) ? $timeArr[2] : 0;
                $runTime = Carbon::createFromTime($hour, $minute, $second);
                return Queue::later($runTime, $queueName, $data);
            }
        }
        return Queue::push($queueName, $data);
    }
}