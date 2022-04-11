<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        User::factory(20)->create()->each(function($user){
            Product::factory(rand(1,3))->create()
            ->each(function ($produit){
                Order::factory(rand(1,2))->create([
                    'product_id'=>$produit->id,
                ]);
            });
        });
    }
}
