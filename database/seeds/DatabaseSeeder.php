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
        $this->call('CategoriesSeeder');
        $this->call('Images_productsSeeder');
        $this->call('OrdersSeeder');
        $this->call('CommentsSeeder');
        $this->call('Idea_boxSeeder');
        $this->call('VotesSeeder');
    }
}
