<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Idea_boxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('suggestion_box')->truncate();


        try{
            // Seed our events table
            DB::table('suggestion_box')->insert([
                'title' => 'KArting',
                'description' => 'Venez on se fait une aprem course !!!',
                'post_date' => new DateTime(),
                'votes_number' => 23,
                'id_images_events' => 9,
                'id_user' => 7,
            ]);

            DB::table('suggestion_box')->insert([
                'title' => 'Weekend au Sky',
                'description' => 'Un weekend au Sky ! Génial non ?!',
                'post_date' => new DateTime(),
                'votes_number' => 999,
                'id_images_events' => 10,
                'id_user' =>5,
            ]);

            DB::table('suggestion_box')->insert([
                'title' => 'Discothèque',
                'description' => 'Ce soir va être une pure soirée ! ',
                'post_date' => new DateTime(),
                'votes_number' => 5,
                'id_images_events' => 14,
                'id_user' => 2,
            ]);

        } catch (Exception $e) {
            echo $e;
        }
    }
}
