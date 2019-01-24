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
        // $this->call(UsersTableSeeder::class);
        $this->call('EventsSeeder');
        $this->call('Images_eventsSeeder');
        $this->call('ProductsSeeder');
    }
}
