<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleActTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_act', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 50)->comment('活动名称');
            $table->integer('start_time')->comment('活动开始时间戳');
            $table->integer('end_time')->comment('活动结束时间戳');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_act');
    }
}
