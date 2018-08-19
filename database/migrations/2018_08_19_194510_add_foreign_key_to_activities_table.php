<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('schedule_id', 'activities_ibfk_1')->references('id')->on('schedules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('event_id', 'activities_ibfk_2')->references('id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('location_id', 'activities_ibfk_3')->references('id')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('room_id', 'activities_ibfk_4')->references('id')->on('rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('activities_ibfk_1');
            $table->dropForeign('activities_ibfk_2');
            $table->dropForeign('activities_ibfk_3');
            $table->dropForeign('activities_ibfk_4');
        });
    }
}
