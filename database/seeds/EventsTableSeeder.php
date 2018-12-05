<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Event::create([
    		'name' => '30º Semana da Educação de Santos',
    		'description' => 'Evento anual da educação pública de santos que conta com diversos especialistas palestrando sobre os mais diversos temas',
    		'beginning_date' => '2018-12-01',
    		'end_date' => '2018-12-08'
    	]);
    }
}
