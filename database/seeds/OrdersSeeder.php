<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear our events table
        DB::table('orders')->truncate();


        try{
            // Seed our events table
            DB::table('orders')->insert([
                'id_users' => '1',
                'quantity' => '4',
                'paypal' => false,
                'id_products' => 2,
            ]);

            DB::table('orders')->insert([
                'id_users' => '2',
                'quantity' => '9',
                'paypal' => false,
                'id_products' => 3,
            ]);

            DB::table('orders')->insert([
                'id_users' => '1',
                'quantity' => '1',
                'paypal' => true,
                'id_products' => 1,
            ]);

            DB::table('orders')->insert([
                'id_users' => '5',
                'quantity' => '2',
                'paypal' => false,
                'id_products' => 4,
            ]);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
