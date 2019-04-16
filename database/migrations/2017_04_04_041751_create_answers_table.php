<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
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
            $table->integer('Question_14')->nullable();
            $table->integer('Question_15')->nullable();
            $table->integer('Question_16')->nullable();
            $table->integer('Question_17')->nullable();
            $table->integer('Question_18')->nullable();
            $table->integer('Question_19')->nullable();
            $table->integer('Question_20')->nullable();
            $table->integer('Question_21')->nullable();
            $table->integer('Question_22')->nullable();
            $table->integer('Question_23')->nullable();
            $table->integer('Question_24')->nullable();
            $table->integer('Question_25')->nullable();
            $table->integer('Question_26')->nullable();
            $table->integer('Question_27')->nullable();
            $table->integer('Question_28')->nullable();
            $table->integer('Question_29')->nullable();
            $table->integer('Question_30')->nullable();
            $table->integer('Question_31')->nullable();
            $table->integer('Question_32')->nullable();
            $table->integer('Question_33')->nullable();
            $table->integer('Question_34')->nullable();
            $table->integer('Question_35')->nullable();
            $table->integer('Question_36')->nullable();
            $table->integer('Question_37')->nullable();
            $table->integer('Question_38')->nullable();
            $table->integer('Question_39')->nullable();
            $table->integer('Question_40')->nullable();
            $table->integer('Question_41')->nullable();
            $table->integer('Question_42')->nullable();
            $table->integer('Question_43')->nullable();
            $table->integer('Question_44')->nullable();
            $table->integer('Question_45')->nullable();
            $table->integer('Question_46')->nullable();
            $table->integer('Question_47')->nullable();
            $table->integer('Question_48')->nullable();
            $table->integer('Question_49')->nullable();
            $table->integer('Question_50')->nullable();
            $table->integer('Question_51')->nullable();
            $table->integer('Question_52')->nullable();
            $table->integer('Question_53')->nullable();
            $table->integer('Question_54')->nullable();
            $table->integer('Question_55')->nullable();
            $table->integer('Question_56')->nullable();
            $table->integer('Question_57')->nullable();
            $table->integer('Question_58')->nullable();
            $table->integer('Question_59')->nullable();
            $table->integer('Question_60')->nullable();
            $table->integer('Question_61')->nullable();
            $table->integer('Question_62')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
