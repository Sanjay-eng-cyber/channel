<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Brand 1',
            'Brand 2',
            'Brand 3',
            'Brand 4',
            'Brand 5',
        ];
        $faker = Faker::create();
        foreach ($name as $n) {
            DB::table('brands')->insert([
                "name" => $n,
                "slug" => Str::slug($n),
                "image" => $faker->randomElement([ 'image1.png','image2.png', 'image3.png', 'image4.png', 'image5.png',]),
                "descriptions" => $faker->paragraph,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
