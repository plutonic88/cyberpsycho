<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndsurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endsurveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('gender');
            $table->string('age');
            $table->string('country');
            $table->string('race');
            $table->string('education');
            $table->string('income');
            $table->string('device');
            $table->string('comment');
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
        Schema::dropIfExists('endsurveys');
    }
}
