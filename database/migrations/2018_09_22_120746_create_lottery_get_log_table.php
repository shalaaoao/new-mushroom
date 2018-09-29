<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryGetLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_get_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->comment('user表id')->default(0);
            $table->integer('lottery_prize_id')->index()->comment('lottery_prize表id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_get_log');
    }
}
