<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SpeakersTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(BondsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
    }
}
