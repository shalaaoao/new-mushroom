<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleErrorLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_error_log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id',false, true)->comment('modegame表id')->index();
            $table->integer('circle_id',false, true)->comment('活动id');
            $table->integer('prize_id', false, true)->comment('prize表id');
            $table->integer('prize_num', false, true)->comment('奖品数量');
            $table->string('return_data')->comment('api接口返回值');
            $table->string('desc')->comment('异常描述');
            $table->index(['circle_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_error_log');
    }
}
