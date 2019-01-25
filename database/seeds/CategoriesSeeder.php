<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('categories')->truncate();


        try{
            // Seed our events table
            DB::table('categories')->insert([
                'name' => 'Informatique',
            ]);

            DB::table('categories')->insert([
                'name' => 'Vêtement',
            ]);

            DB::table('categories')->insert([
                'name' => 'Autre',
            ]);

        } catch (Exception $e) {
            echo $e;
        }
    }
}
