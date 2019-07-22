<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('circle_id',false, true)->comment('活动id');
            $table->integer('user_id', false, true)->comment('modegame表id')->index();
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
        Schema::dropIfExists('circle_user');
    }
}
