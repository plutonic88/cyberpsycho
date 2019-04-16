<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManiAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mani_answers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('user_id');
            $table->integer('Question_1')->nullable();
            $table->integer('Question_2')->nullable();
            $table->integer('Question_3')->nullable();
            $table->integer('Question_4')->nullable();
            $table->integer('Question_5')->nullable();
            $table->integer('Question_6')->nullable();
            $table->integer('Question_7')->nullable();
            $table->integer('Question_8')->nullable();
            $table->integer('Question_9')->nullable();
            $table->integer('Question_10')->nullable();
            $table->integer('Question_11')->nullable();
            $table->integer('Question_12')->nullable();
            $table->integer('Question_13')->nullable();
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
        Schema::dropIfExists('mani_answers');
    }
}
