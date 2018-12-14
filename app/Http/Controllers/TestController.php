<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use SwooleTW\Http\Server\Facades\Server;
use SwooleTW\Http\Table\Facades\SwooleTable;

class TestController extends Controller
{
    public function test()
    {
        $users = factory(User::class, 1)->make();
        print_r($users);

        echo str_random(5);
    }

    public function test2()
    {
//        DB::beginTransaction();
        $a = User::lockForUpdate()->get();

        var_dump($a->toArray());
//        DB::commit();
    }
}
