<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('votes')->truncate();


        try{
            // Seed our events table
            DB::table('votes')->insert([
                'id_user' => 7,
                'id_suggestion_box' => 1,
                'vote' => true,
            ]);

            DB::table('votes')->insert([
                'id_user' => 5,
                'id_suggestion_box' => 1,
                'vote' => false,
            ]);




        } catch (Exception $e) {
            echo $e;
        }
    }
}
