<?php
/**
 * Created by PhpStorm.
 * User: Chen Jiaao
 * Date: 2018/9/20
 * Time: 下午10:22
 */

namespace App\Library;

use Illuminate\Support\Facades\Request;

class MyHelper
{
    public static function getCurrentUrl()
    {
        $url = Request::getUri();

        return urlencode($url);
    }
}