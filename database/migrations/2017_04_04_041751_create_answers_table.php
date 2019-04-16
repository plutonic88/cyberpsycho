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
            $table->integer('Question_1');
            $table->integer('Question_2');
            $table->integer('Question_3');
            $table->integer('Question_4');
            $table->integer('Question_5');
            $table->integer('Question_6');
            $table->integer('Question_7');
            $table->integer('Question_8');
            $table->integer('Question_9');
            $table->integer('Question_10');
            $table->integer('Question_11');
            $table->integer('Question_12');
            $table->integer('Question_13');
            $table->integer('Question_14');
            $table->integer('Question_15');
            $table->integer('Question_16');
            $table->integer('Question_17');
            $table->integer('Question_18');
            $table->integer('Question_19');
            $table->integer('Question_20');
            $table->integer('Question_21');
            $table->integer('Question_22');
            $table->integer('Question_23');
            $table->integer('Question_24');
            $table->integer('Question_25');
            $table->integer('Question_26');
            $table->integer('Question_27');
            $table->integer('Question_28');
            $table->integer('Question_29');
            $table->integer('Question_30');
            $table->integer('Question_31');
            $table->integer('Question_32');
            $table->integer('Question_33');
            $table->integer('Question_34');
            $table->integer('Question_35');
            $table->integer('Question_36');
            $table->integer('Question_37');
            $table->integer('Question_38');
            $table->integer('Question_39');
            $table->integer('Question_40');
            $table->integer('Question_41');
            $table->integer('Question_42');
            $table->integer('Question_43');
            $table->integer('Question_44');
            $table->integer('Question_45');
            $table->integer('Question_46');
            $table->integer('Question_47');
            $table->integer('Question_48');
            $table->integer('Question_49');
            $table->integer('Question_50');
            $table->integer('Question_51');
            $table->integer('Question_52');
            $table->integer('Question_53');
            $table->integer('Question_54');
            $table->integer('Question_55');
            $table->integer('Question_56');
            $table->integer('Question_57');
            $table->integer('Question_58');
            $table->integer('Question_59');
            $table->integer('Question_60');
            $table->integer('Question_61');
            $table->integer('Question_62');
            
            



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
