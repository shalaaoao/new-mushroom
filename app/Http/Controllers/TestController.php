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

        dd(123);
        $s   = 0;
        $bbt = 0;
        $user_n = [];
        $error_num = 0;

        $prize_id_list = CircleGetLog::query()->where('id','>',1)->select('id', 'prize_id', 'user_id', 'created_at')->get()->toArray();
        foreach ($prize_id_list as $v) {
            $get_log_id   = $v['id'];
            $prize_id     = $v['prize_id'];
            $user_id      = $v['user_id'];
            $created_time = strtotime($v['created_at']);
            if (!$user_id) {
                dd($v);
            }

            $low_created_time = $created_time - 2;
            $low_created_at   = date('Y-m-d H:i:s', $low_created_time);

            $high_created_time = $created_time + 2;
            $high_created_at   = date('Y-m-d H:i:s', $high_created_time);

            // 判断是不是垃圾数据
            $last_get_log = CircleGetLog::where(['user_id' => $user_id])->where('id', '<', $get_log_id)->select('created_at')->orderBy('id', 'desc')->first();
            if (!$last_get_log) {
                continue;
            }

            $last_created_time = strtotime($last_get_log->created_at);
            if ($created_time - $last_created_time >= 2) {
                continue;
            }

            //垃圾数据
            $error_num++;

            $prize = CirclePrize::where('id', $prize_id)->select('type', 'cnst')->first();
            $type  = $prize['type'];
            $cnst  = $prize['cnst'];

            if ($type == 1) {
                $bbt += 1;
                continue;
            }


            $turn_log = TurnCardGetLog::query()->where(['user_id' => $user_id])->whereBetween('created_at',
                [$low_created_at, $high_created_at])->select('order_id')->first();
            if (!$turn_log) {
                var_dump('error_turn_log_' . $user_id . '...' . $get_log_id);
                var_dump($v);

                die;
            }
            $bet_id = $turn_log->order_id;

            $bet = TurnCardBetOrder::where('id', $bet_id)->select('gouliang_num')->first();
            if (!$bet) {
                dd('error_bet_id...' . $bet_id);
            }

            $send_gouliang = $bet->gouliang_num * $cnst;
            $s             += $send_gouliang;

            if (isset($user_n[$user_id])) {
                $user_n[$user_id] += $send_gouliang;
            } else {
                $user_n[$user_id] = $send_gouliang;
            }
        }

        var_dump('bbt:'.$bbt);
        var_dump('狗粮总数:'.$s);
        var_dump('用户:'.count($user_n));
        var_dump('垃圾条数:'.$error_num);
        var_export($user_n);
    }
}
