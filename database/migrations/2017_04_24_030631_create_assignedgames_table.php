<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignedgames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->integer('game_type'); // 1: no indo, 2: fullinfo ... n: 
            $table->integer('pick_def_order'); // how you want to choose among defenders? randomly ? ASC ? DESC?
            $table->integer('game_played');
            $table->integer('random_defender_type');
            $table->integer('max_defender_type');
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
        Schema::dropIfExists('assignedgames');
    }
}
