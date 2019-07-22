<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('circle_id', false, true)->comment('活动id');
            $table->integer('prize_id', false, true)->comment('奖品id');
            $table->integer('rate', false, true)->comment('概率 1=1%');
            $table->integer('stock', false, true)->comment('库存');
            $table->index(['circle_id', 'prize_id'], 'circle_prize_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_plan');
    }
}
