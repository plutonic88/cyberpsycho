<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eyecords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('game_id');
            $table->integer('round');
            $table->integer('timer');
            $table->integer('eye_x');
            $table->integer('eye_y');
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
        Schema::dropIfExists('eyecords');
    }
}
