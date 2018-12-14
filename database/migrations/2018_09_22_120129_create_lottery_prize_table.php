<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryPrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_prize', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prize_name', 20)->comment('奖品名称')->default('');
            $table->decimal('prize_rate', 5, 4)->commment('产品概率 最大1,4位小数')->default(0);
            $table->integer('prize_store')->comment('总存量')->default(0);
            $table->integer('prize_last_store')->index()->comment('剩余库存')->default(0);
            $table->integer('prize_min_get')->comment('抽取奖品的最低总抽取次数')->default(0);
            $table->tinyInteger('is_repeat_get')->comment('是否允许同一个用户反复中奖 0否 1是')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Model\LotteryPrize::insert([
            [
                'prize_name'       => 'iPhoneXS Max 512G',
                'prize_rate'       => 0.0001,
                'prize_store'      => 1,
                'prize_last_store' => 1,
                'prize_min_get'    => 50000,
                'is_repeat_get'    => 0
            ],
            [
                'prize_name'       => '大疆无人机 精灵4',
                'prize_rate'       => 0.0003,
                'prize_store'      => 2,
                'prize_last_store' => 2,
                'prize_min_get'    => 20000,
                'is_repeat_get'    => 0
            ]
            ,
            [
                'prize_name'       => 'Bose QC35',
                'prize_rate'       => 0.01,
                'prize_store'      => 10,
                'prize_last_store' => 10,
                'prize_min_get'    => 5000,
                'is_repeat_get'    => 0
            ],
            [
                'prize_name'       => 'iPad Mini 2',
                'prize_rate'       => 0.05,
                'prize_store'      => 20,
                'prize_last_store' => 20,
                'prize_min_get'    => 1000,
                'is_repeat_get'    => 0
            ],
            [
                'prize_name'       => '猫眼电影票',
                'prize_rate'       => 0.2,
                'prize_store'      => 100,
                'prize_last_store' => 100,
                'prize_min_get'    => 0,
                'is_repeat_get'    => 1
            ],
            [
                'prize_name'       => '发财树VIP 日卡',
                'prize_rate'       => 0.7396,
                'prize_store'      => 100000000,
                'prize_last_store' => 100000000,
                'prize_min_get'    => 0,
                'is_repeat_get'    => 1
            ]
        ]);

        $time = date('Y-m-d H:i:s', time());
        \App\Model\LotteryPrize::where([])->update(['created_at' => $time, 'updated_at' => $time]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_prize');
    }
}
