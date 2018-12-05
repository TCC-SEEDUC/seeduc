<?php

use Illuminate\Database\Seeder;
use App\Models\Bond;

class BondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bond::create([
            'id'=>1,
            'name'=>'Professor'
        ]);
    }
}
