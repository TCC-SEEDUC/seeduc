<?php

use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::create([
            'id'=>'1',
            'name'=>'Rodrigo Garcia Topan Moreira',
            'type'=>'Professor',
            'small_desc'=>'Palestra sobre angular 7'
        ]);
    }
}
