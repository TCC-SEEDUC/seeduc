<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('full_adress');
            $table->string('adress_complement')->nullable();
            $table->string('adress_number');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('reference_point');
            $table->string('work_days');
            $table->time('open_hours');
            $table->time('close_hour');
            $table->string('manager_name');
            $table->string('manager_phone_number');
            $table->string('manager_email');
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
        Schema::dropIfExists('locations');
    }
}
