<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class JinYController extends Controller
{
    // love circle
    public function act_20190520()
    {
        return view('jiny.20190520');
    }

    // birthday circle
    public function act_20190727()
    {
        $plugins_root = '/plugins/birthday_circle/';
        $img_src      = $plugins_root . 'img/';
        $css_src      = $plugins_root . 'css/';
        $js_src       = $plugins_root . 'js/';
        $music_src    = $plugins_root . 'music/';

        $data = [
            'img_src'   => $img_src,
            'css_src'   => $css_src,
            'js_src'    => $js_src,
            'music_src' => $music_src,
        ];

        return view('jiny.20190727', $data);
    }

}
