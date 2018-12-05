<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'id' => '1',
            'name' => 'Fatec Praia Grande',
            'full_adress' => 'Rua 19 de janeiro',
            'adress_complement' => 'Prédio',
            'adress_number' => '370',
            'district' => 'SP',
            'city' => 'SP',
            'state' => 'SP',
            'postal_code' => '11700-780',
            'reference_point' => 'Malu',
            'work_days' => '6',
            'open_hours' => '08:00:00',
            'close_hour' => '22:00:00',
            'manager_name' => 'Luciana',
            'manager_phone_number' => '11994213400',
            'manager_email' => 'luciana@fatecpg.gov.br'     
        ]);
    }
}
