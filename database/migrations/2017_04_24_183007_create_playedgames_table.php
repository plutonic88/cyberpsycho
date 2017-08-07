<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayedgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playedgames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->integer('game_type');
            $table->integer('game_played');
            $table->integer('defender_type'); // 0 or 1
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
        Schema::dropIfExists('playedgames');
    }
}
