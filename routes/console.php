<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('lottery:api {function_name}', function ($function_name) {
    $obj = new \App\Http\Controllers\LotteryController();
    if (method_exists($obj, $function_name)) {
        $obj->$function_name();
    }
})->describe('抽奖方法');