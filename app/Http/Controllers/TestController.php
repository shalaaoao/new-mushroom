<?php

namespace App\Http\Controllers;


use App\Model\CircleGetLog;
use App\Model\CirclePrize;
use App\Model\TurnCardBetOrder;
use App\Model\TurnCardGetLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test()
    {
        echo 'c';
    }
}
