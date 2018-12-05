<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'id'=>'1',
            'name'=> 'Sala 9 bloco 3',
            'description'=> 'Sala de aula padrão da fatec',            
            'capacity'=> '50',
            'available_video_projector'=> '1',
            'available_AC'=> '0',
            'available_seats'=> '1',
            'seats_type'=> 'Cadeira de Madeira',
            'location_id'=> '1'
        ]);
    }
}
