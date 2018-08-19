<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUsersFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_feedbacks', function (Blueprint $table) {
            $table->foreign('user_id', 'users_feedbacks_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('feedback_id', 'users_feedbacks_ibfk_2')->references('id')->on('feedback_quizzes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'users_feedbacks_ibfk_3')->references('id')->on('activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_feedbacks', function (Blueprint $table) {
            $table->dropForeign('users_feedbacks_ibfk_1');
            $table->dropForeign('users_feedbacks_ibfk_2');
            $table->dropForeign('users_feedbacks_ibfk_3');
        });
    }
}
