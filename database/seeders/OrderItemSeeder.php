<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $orders = DB::table('orders')->select('id', 'total_amount', 'discount_amount')->get();
        $products = Product::pluck('id')->toArray();
        foreach ($orders as $order) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('order_items')->insert([
                    "order_id" => $order->id,
                    "product_id" => $faker->randomElement($products),
                    "amount" => 1499 * (100 / (100 + config('app.cgst') + config('app.sgst'))),
                    "taxable_amount" => 0,
                    'cgst_percent' => config('app.cgst'),
                    'cgst' => 0,
                    'sgst_percent' => config('app.sgst'),
                    'sgst' => 0,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
