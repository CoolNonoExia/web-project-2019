<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('products')->delete();

        try{
            // Seed our events table
            DB::table('products')->insert([
                'name' => 'Piscine',
                'description' => 'Piscine de Yoyo, parfait pur les enfants de 3 à 6 ans !',
                'price' => '35000',
                'in_stock' => 1,
                'id_categories' => 12,
                'id_images_products' => 1
            ]);

            DB::table('products')->insert([
                'name' => 'Mug',
                'description' => 'Mug élégant et léger. Soutenez votre BDE même lorsque vous buvez !',
                'price' => '25',
                'in_stock' => 1,
                'id_categories' => 10,
                'id_images_products' => 2
            ]);

            DB::table('products')->insert([
                'name' => 'Sweat',
                'description' => 'Design, confortable hésiter plus et jetez vous sur ce superbe sweat !',
                'price' => '55',
                'in_stock' => 1,
                'id_categories' => 1,
                'id_images_products' => 3
            ]);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
