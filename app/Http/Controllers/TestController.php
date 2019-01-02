<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use App\Model\User;
use App\Model\UserInfo;
use Faker\Generator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use SwooleTW\Http\Server\Facades\Server;
use SwooleTW\Http\Table\Facades\SwooleTable;
use Faker\Generator as Faker;

class TestController extends Controller
{
    public function test(\Illuminate\Http\Request $request)
    {
        echo 1;


    }

    public function test2()
    {

    }
}
