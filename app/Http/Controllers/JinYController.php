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
}
