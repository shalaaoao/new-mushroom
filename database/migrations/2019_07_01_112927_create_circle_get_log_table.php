<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleGetLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_get_log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id',false, true)->comment('modegame表id')->index();
            $table->integer('circle_id',false, true)->comment('活动id');
            $table->integer('prize_id', false, true)->comment('prize表id')->index();
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
        Schema::dropIfExists('circle_get_log');
    }
}
