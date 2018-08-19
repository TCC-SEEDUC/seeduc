<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('professor')->default(0);
            $table->tinyInteger('need_libras_interpreter')->default(0);
            $table->tinyInteger('know_technology')->default(0);
            $table->tinyInteger('used_to_sites')->default(0);
            $table->tinyInteger('adept_qr_code')->default(0);
            $table->tinyInteger('smartphone')->default(0);
            $table->string('kind_professor')->nullable();
            $table->string('professor_work_at')->nullable();
            $table->string('city_professor_work_at')->nullable();
            $table->Integer('bond_id')->unsigned();
            $table->Integer('user_id')->unsigned();
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
        Schema::dropIfExists('quizzes');
    }
}
