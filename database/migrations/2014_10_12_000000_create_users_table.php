<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->string('register_id')->unique()->nullable();
            $table->string('second_register_id')->unique()->nullable();
            $table->string('full_adress');
            $table->string('adress_complement')->nullable();
            $table->string('adress_number');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('phone_number')->nullable();
            $table->tinyInteger('available_whatsapp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->Integer('bond_id')->unsigned();
            $table->Integer('role_id')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
