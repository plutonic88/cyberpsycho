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
            $table->integer('a1');
            $table->integer('a2');
            $table->integer('a3');
            $table->integer('a4');
            $table->integer('a5');
            $table->integer('d1');
            $table->integer('d2');
            $table->integer('d3');
            $table->integer('d4');
            $table->integer('d5');
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
