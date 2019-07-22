<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_idx', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('int_a');
            $table->integer('int_b');
            $table->integer('int_c');
            $table->string('string_a', 10);
            $table->string('string_b', 10);
            $table->string('string_c', 10);
            $table->index(['int_a', 'int_b', 'int_c']);
            $table->index(['string_a', 'string_b', 'string_c']);
            $table->index(['int_a', 'string_b', 'string_c']);
            $table->index(['string_a', 'int_b', 'int_c`']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('test_idx');
    }
}
