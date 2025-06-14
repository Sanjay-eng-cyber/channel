<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::orderBy('id', 'asc')->pluck('id');
        $status = ['initial', 'completed', 'failed'];
        foreach ($users as $user) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('orders')->insert([
                    "user_id" => $user,
                    "api_order_id" => 'api_order_id_' . $i,
                    "sub_total" => 1392.8,
                    "discount_amount" => 90,
                    "total_amount" => 1302.8,
                    'status' => $faker->randomElement($status),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
