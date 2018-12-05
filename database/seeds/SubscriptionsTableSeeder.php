<?php

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'user_id'=>'1',
            'activity_id'=>'1',
            'event_id'=>'1',
            'certificate'=>'1',
            'check_in'=>'1'
        ]);
    }
}
