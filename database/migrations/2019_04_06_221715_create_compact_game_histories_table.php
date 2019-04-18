<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompactGameHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compact_game_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('game_id');
            $table->integer('game_id_instance');
            $table->integer('game_type');
            $table->integer('def_type'); // new or old
            $table->integer('def_order');
            $table->integer('cur_round');
            $table->integer('a1')->nullable();
            $table->integer('a2')->nullable();
            $table->integer('a3')->nullable();
            $table->integer('a4')->nullable();
            $table->integer('a5')->nullable();
            $table->integer('d1')->nullable();
            $table->integer('d2')->nullable();
            $table->integer('d3')->nullable();
            $table->integer('d4')->nullable();
            $table->integer('d5')->nullable();
            $table->integer('defender_cur_points');
            $table->integer('attacker_cur_points');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compact_game_histories');
    }
}
