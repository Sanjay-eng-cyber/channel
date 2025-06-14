<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = ['Skin', 'Personal Care', 'Hair Care', 'Fragrances', 'Gift', 'Home Decor', 'Occasion'];

        for ($i = 0; $i < count($categories); $i++) {
            DB::table('categories')->insert([
                "name" => $categories[$i],
                "slug" => Str::slug($categories[$i]),
                "image" => $faker->imageUrl,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
