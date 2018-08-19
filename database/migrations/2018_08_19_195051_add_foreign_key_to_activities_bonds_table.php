<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToActivitiesBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities_bonds', function (Blueprint $table) {
            $table->foreign('activity_id', 'activities_bonds_ibfk_1')->references('id')->on('activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bond_id', 'activities_bonds_ibfk_2')->references('id')->on('bonds')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities_bonds', function (Blueprint $table) {
            $table->dropForeign('activities_bonds_ibfk_1');
            $table->dropForeign('activities_bonds_ibfk_2');
        });
    }
}
