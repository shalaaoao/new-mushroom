<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    // index
    public function index()
    {
        $url = request()->getUri();
        if ($url == 'http://julyjiny.shalaaoao.com') {
            return redirect(route('jiny.20190520'));
        }

        return view('welcome');
    }
}
