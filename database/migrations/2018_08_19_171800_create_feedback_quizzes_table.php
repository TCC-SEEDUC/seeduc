<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('A1');
            $table->string('B1');
            $table->string('C1');
            $table->string('D1');
            $table->string('A2');
            $table->string('users_comment')->nullable();
            $table->string('A3');
            $table->string('B3');
            $table->string('justify_B3_answer')->nullable();
            $table->string('C3');
            $table->string('justify_C3_answer')->nullable();
            $table->string('users_praise')->nullable();
            $table->string('users_criticism')->nullable();
            $table->string('users_suggestions')->nullable();
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
        Schema::dropIfExists('feedback_quizzes');
    }
}
