<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->integer('survey');
            $table->integer('instruction');
            $table->integer('instruction_qa');
            $table->integer('practicegame');
            $table->integer('game1');
            $table->integer('game2');
            $table->integer('game3');
            $table->integer('game4');
            $table->integer('game5');
            $table->integer('game6');
            $table->integer('endsurvey');
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
        Schema::dropIfExists('progresses');
    }
}
