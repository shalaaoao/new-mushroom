<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclePrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_prize', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('circle_id', false, true)->comment('circle_act表id')->index();
            $table->string('name', 50)->comment('奖品名称');
            $table->tinyInteger('type')->comment('奖品类型 1背包礼物 2狗粮 3VIP装扮 4实物 5倍数 6积分');
            $table->integer('gift_id', false, true)->comment('对应的礼物id')->index();
            $table->string('icon')->comment('图片');
            $table->integer('num', false, true)->comment('奖品数量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_prize');
    }
}
