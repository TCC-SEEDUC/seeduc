<?php

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'name'=> 'Vespertino',
            'begin_at'=> '2018-11-23 19:00:00',
            'finish_at'=> '2018-11-23 20:00:00'
        ]);
    }
}
