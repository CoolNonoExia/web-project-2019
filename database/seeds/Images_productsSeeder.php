<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Images_productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our images_events table
        DB::table('images_products')->truncate();


        try{
            // Seed our events table
            DB::table('images_products')->insert([
                'title' => 'Piscine',
                'ext' => 'webp',

            ]);

            DB::table('images_products')->insert([
                'title' => 'Mug',
                'ext' => 'jpg',

            ]);

            DB::table('images_products')->insert([
                'title' => 'Sweat',
                'ext' => 'png',

            ]);

            DB::table('images_products')->insert([
                'title' => 'Black_edition',
                'ext' => 'jpg',

            ]);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
