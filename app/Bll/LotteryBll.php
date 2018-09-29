<?php

namespace App\Bll;

use App\Enum\CacheEnum;
use App\Enum\LotteryEnum;
use App\Model\LotteryGetLog;
use App\Model\LotteryPrize;
use App\Model\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class LotteryBll extends BaseBll
{
    //获取奖品概率分布
    public static function getLotteryRate()
    {
        return LotteryPrize::select('prize_rate', 'id')->get()->toArray();
    }

    //更新奖品剩余存量
    public static function updatePrizeLastStore($prize_id, $prize_last_store)
    {
        return LotteryPrize::where('id', $prize_id)->update(['prize_last_store' => $prize_last_store]);
    }

    //获取奖品基本信息
    public static function getPrizeInfo($prize_id)
    {
        $cache_name = CacheEnum::LOTTERY_PRIZE_INFO.$prize_id;

        if (Cache::has($cache_name)) {
            return Cache::get(Cache::get($cache_name));
        }

        $query = LotteryPrize::where('id', $prize_id)->select([
            'prize_name',
            'prize_rate',
            'prize_min_get',
            'prize_last_store',
            'is_repeat_get',
        ])->first()->toArray();
        Cache::put($cache_name, $query, 60);

        return $query;
    }

    //随机获取抽奖结果 - 奖品id
    public static function calcPrizeRes()
    {
        $res = 0;

        $rand_num = mt_rand(1, 10000);

        $cache_name = CacheEnum::LOTTERY_PRIZE_RATE;
        if (Cache::has($cache_name)) {
            $prize_rate = Cache::get($cache_name);
        } else {
            $prize_rate = self::getLotteryRate();
            Cache::put($cache_name, $prize_rate, 60);
        }

        $auto_count = 1;
        foreach ($prize_rate as $val) {
            $prize_id   = $val['id'];
            $prize_rate = $val['prize_rate'];

            $num_min = $auto_count;
            $num_max = 10000 * $prize_rate + $num_min - 1;

            //中奖
            if ($rand_num >= $num_min && $rand_num <= $num_max) {
                $res = $prize_id;
                break;
            }

            $auto_count = $num_max + 1;
        }

        return $res;
    }

    //领取奖品
    public static function addLotteryGetLog($user_id,$prize_id)
    {
        return LotteryGetLog::create(['user_id' => $user_id, 'lottery_prize_id' => $prize_id]);
    }

    //redis层过滤prize_id
    public static function filterPrizeInRedis($prize_id, $user_id)
    {
        //奖品信息
        $prize_info = LotteryBll::getPrizeInfo($prize_id);

        //判断所有用户总抽奖次数
        $lottery_get_count = Redis::get(LotteryEnum::LOTTERY_GET_COUNT);
        if ($lottery_get_count < $prize_info['prize_min_get']) {

            //抽奖总次数未触发 - 奖品设为默认
            return $prize_id = LotteryEnum::LOTTERY_DEFAULT_PRIZE;
        }

        //判断奖品库存
        $prize_store_redis_name = LotteryEnum::LOTTERY_PRIZE_LAST_STORE.$prize_id;
        if (!Redis::exists($prize_store_redis_name)) {

            //新增库存至redis
            Redis::set($prize_store_redis_name, $prize_info['prize_last_store']);
        }

        if (Redis::get($prize_store_redis_name) <= 0) {

            //奖品已售完 - 奖品设为默认
            return $prize_id = LotteryEnum::LOTTERY_DEFAULT_PRIZE;
        } else {

            //减少奖品库存！！
            Redis::decr(LotteryEnum::LOTTERY_PRIZE_LAST_STORE . $prize_id);
        }

        //判断奖品是有净值否反复抽取 限制
        if ($prize_info['is_repeat_get']) {

            $redis_user_info_key = LotteryEnum::LOTTERY_USER_GET_LOG .$user_id;

            //判断用户是否曾经获取过
            $get_list = Redis::lRange($redis_user_info_key,0, LotteryEnum::USER_GET_NUM_LIMIT);
            if (in_array($prize_id, $get_list)) {
                return $prize_id = LotteryEnum::LOTTERY_DEFAULT_PRIZE;
            }
        }

        return $prize_id;
    }
}
