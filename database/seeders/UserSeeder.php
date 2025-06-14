<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "first_name" => 'Testing',
            "last_name" => 'User',
            "email" => 'user@test.com',
            "phone" => '1234567890',
            "password" => bcrypt('password'),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        for ($i = 1; $i <= 9; $i++) {
            DB::table('users')->insert([
                "first_name" => 'Testing-' . $i,
                "last_name" => 'User-' . $i,
                "email" => 'user' . $i . '@test.com',
                "phone" => '123456789' . $i,
                "password" => bcrypt('password'),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
