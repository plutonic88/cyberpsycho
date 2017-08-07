<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMousecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mousecords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('game_id');
            $table->integer('round');
            $table->integer('timer');
            $table->integer('mouse_x');
            $table->integer('mouse_y');
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
        Schema::dropIfExists('mousecords');
    }
}
