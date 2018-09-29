<?php

namespace App\Http\Controllers;

use App\Enum\CommonEnum;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $cookie = null;
    const ERROR_FILE_NAME = 'error';

    /**
     * 返回接口错误信息
     * @param string $errno
     * @param array $data
     * @param string $errmsg
     * @return string
     */
    public static function error($errno, $data = [], $errmsg = '', $data_title = 'content')
    {
        $file_name = static::ERROR_FILE_NAME;

        if (!$errmsg) {
            $errmsg = self::errnoToString($errno, $file_name);
        }

        $return = self::response(CommonEnum::STATUS_ERROR, $errno, $errmsg, $data, $data_title);
        if ($file_name == 'internet') {
            Log::info('------出参:-----');
            Log::info($return);
        }
        return $return;
    }

    /**
     * 返回正确的接口数据
     * @param array $data
     * @return string
     */
    public static function success($data = [], $data_title = 'content', $is_log = CommonEnum::STATUS_OK)
    {
        $file_name = static::ERROR_FILE_NAME;

        $errno  = '0000';
        $errmsg = self::errnoToString($errno, $file_name);
        $return = self::response(CommonEnum::STATUS_OK, $errno, $errmsg, $data, $data_title);

        if ($file_name == 'internet' && $is_log == CommonEnum::STATUS_OK) {
            Log::info('------出参:-----');
            Log::info($return);
        }
        return $return;
    }

    /**
     * 响应信息
     * @param int $status
     * @param string $errno
     * @param string $errmsg
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response($status, $errno = '', $errmsg = '', $data = [])
    {
        $msgpack = [
            'status'  => $status,  //是否正确标准
            'code'    => $errno,   //错误编号
            'message' => $errmsg,  //错误信息
            'data'    => $data,    //数据

        ];

        if (!is_null(self::$cookie)) {
            return Response::json($msgpack)->withCookie(self::$cookie);
        }
        return Response::json($msgpack);
    }


    /**
     * 根据错误号获得错误信息
     * @param $errno
     * @param $file_name
     * @return mixed
     * @throws \Exception
     */
    public static function errnoToString($errno, $file_name = "error")
    {
        $error = Config::get("error::{$file_name}.{$errno}");
        //edit by lost
        //如果未取到定义从error.php中获取
        if ($file_name != "error" && empty($error)) {
            $error = Config::get("error::error.{$errno}");
        }
        if (empty($error)) {
            return $errno;
        }
        return $error;
    }

    /**
     * 设置页面变量
     * @param mixed $key
     * @param null $value
     */
    public function setData($key, $value = null)
    {
        if (is_array($key) && $value == null) {
            foreach ($key as $k => $v) {
                View::share($k, $v);
            }
        } else {
            View::share($key, $value);
        }
    }
}
