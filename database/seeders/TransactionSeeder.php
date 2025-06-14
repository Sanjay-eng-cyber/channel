<?php

namespace Database\Seeders;

use App\Models\Order;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach ( Order::orderBy('id', 'asc')->get() as $order ) {
            DB::table('transactions')->insert([
                "order_id" => $order->id,
                "pg_status" => 'captured',
                "payment_type" => 'card',
                "amount" => $faker->numberBetween(200, 500),
                "status" => $order->status,
                "transaction_date" => now(),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
