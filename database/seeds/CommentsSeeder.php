<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('comments')->truncate();


        try{
            // Seed our events table
            DB::table('comments')->insert([
                'id_user' => '2',
                'id_events'=> '3',
                'comment' => '#Paul est trop un idiot !',
            ]);

            DB::table('comments')->insert([
                'id_user' => '1',
                'id_events'=> '2',
                'comment' => 'L\'automaque c\'est fantastique !',
            ]);

            DB::table('comments')->insert([
                'id_user' => '4',
                'id_events'=> '1',
                'comment' => 'Y avait pas de piscine ni de barbec, manquait plus que Victor pour être un désastre'
            ]);

        } catch (Exception $e) {
            echo $e;
        }
    }
}
