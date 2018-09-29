<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use App\Model\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function test()
    {
        $raw_str = encrypt('Laravel学院');
        $decrypted_str = decrypt($raw_str);
        dd(['after_encryt' => $raw_str, 'after_decrypt' => $decrypted_str]);

        die;
        $end = microtime(true);
        echo $end - LARAVEL_START;

        die;
        $query = LotteryPrize::groupBy('user_id')->select();
        die;


        $start = microtime(true);
        $a = new LotteryController();

        $i = 0;
        while($i<1000) {
            $a->getLotteryPrizeCalc();
            $i++;
        }

        $end = microtime(true);


        $a->samePrizeStore();

        echo $end-$start;


    }
}
