<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('events')->truncate();


        try{
            // Seed our events table
            DB::table('events')->insert([
                'title' => 'Piscine',
                'description' => 'Piscine avec BBQ chez yoyo, ca va etre dejante !',
                'events_date' => new DateTime('2019-01-28'),
                'post_date' => new DateTime(),
                'is_recurrent' => false,
                'is_free' => false,
                'likes_number' => 8,
                'comments_number' => 12,
                'id_images_events' => 1
            ]);

            DB::table('events')->insert([
                'title' => 'CCTL',
                'description' => 'On en chie sur l\'automatique, normal',
                'events_date' => new DateTime('2019-01-24'),
                'post_date' => new DateTime(),
                'is_recurrent' => true,
                'is_free' => true,
                'likes_number' => 0,
                'comments_number' => 30,
                'id_images_events' => 2
            ]);

            DB::table('events')->insert([
                'title' => 'Intelligence de Paul',
                'description' => 'C\'est fini, trop dommage',
                'events_date' => new DateTime('2002-05-23'),
                'post_date' => new DateTime(),
                'is_recurrent' => false,
                'is_free' => true,
                'likes_number' => 67,
                'comments_number' => 21,
                'id_images_events' => 3
            ]);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
