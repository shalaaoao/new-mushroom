<?php
namespace App\Enum;


class LotteryEnum
{
    //用户抽奖次数限制
    const USER_GET_NUM_LIMIT = 10;

    //用户抽奖结果记录
    const LOTTERY_USER_GET_LOG = 'lottery_user_get_log_';

    //所有用户的总抽奖次数
    const LOTTERY_GET_COUNT = 'lottery_get_count';

    //奖品实时库存
    const LOTTERY_PRIZE_LAST_STORE = 'lottery_prize_last_store_';

    //安慰奖
    const LOTTERY_DEFAULT_PRIZE = 6;
}