<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = \App\Models\User::orderBy('id', 'asc')->get();
        foreach ( $users as $user ) {
            \DB::table('user_addresses')->insert([
                "user_id" => $user->id,
                "type" => 'primary',
                "street_address" => $faker->address,
                "country" => 'India',
                "city" => $faker->city,
                "state" => $faker->state,
                "postal_code" => $faker->numberBetween(400010, 400100),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
