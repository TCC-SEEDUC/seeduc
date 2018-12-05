<?php

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' =>  'Aprendendo Java',
            'description' =>  'Você irá aprender conceitos básicos da linguagem Java',
            'beginning_date' =>  '2018-12-01 13:00:00',
            'minimum_quorum' =>  '0',
            'maximum_capacity' =>  '30',
            'schedule_id' =>  '1',
            'event_id' =>  '1',
            'location_id' => '1',
            'room_id' => '1'
        ]);
    }
}
