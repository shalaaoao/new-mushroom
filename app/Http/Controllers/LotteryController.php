<?php

namespace App\Http\Controllers;

use App\Bll\LotteryBll;
use App\Enum\LotteryEnum;
use App\Model\LotteryPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LotteryController extends Controller
{
    //抽奖算法
    public function getLotteryPrizeCalc()
    {
//        $user_id = $request->input('user_id', rand(1,100000000));
//        if (!$user_id) {
//            return self::error('no_user');
//        }

        $user_id = rand(1, 100000);

        //每个用户最多抽奖10次
        $redis_user_info_key = LotteryEnum::LOTTERY_USER_GET_LOG . $user_id;
        $user_get_num        = Redis::lLen($redis_user_info_key);
        if ($user_get_num >= LotteryEnum::USER_GET_NUM_LIMIT) {
            return self::error('get_record_num_max');
        }

        //抽奖 - 获取结果
        $prize_id = LotteryBll::calcPrizeRes();

        //redis层过滤prize_id
        $prize_id = LotteryBll::filterPrizeInRedis($prize_id, $user_id);

        //顺利通过Redis过滤
        //sql层面再次进行校验


        //领取奖品
        $insert_res = LotteryBll::addLotteryGetLog($user_id, $prize_id);
        if (!$insert_res) {

            //DB插入失败
            return self::error('network_error');
        }

        //更新Redis信息 总抽奖人数、奖品库存、用户抽奖结果
        Redis::incr(LotteryEnum::LOTTERY_GET_COUNT);
        Redis::rPush($redis_user_info_key, $prize_id);

        return self::success(['prize_id' => $prize_id]);
    }

    //从redis中同步库存
    public function samePrizeStore()
    {
        $prize_list = LotteryPrize::select(['id'])->get()->toArray();
        foreach ($prize_list as $v) {
            $prize_id = $v['id'];

            $redis_name = LotteryEnum::LOTTERY_PRIZE_LAST_STORE . $prize_id;
            if (Redis::exists($redis_name)) {

                $prize_last_store = Redis::get($redis_name);
                LotteryBll::updatePrizeLastStore($prize_id, $prize_last_store);
            }
        }

        var_dump('execute success');
    }
}
