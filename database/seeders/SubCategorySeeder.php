<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $subcategory = [
            1 => [
                'Face wash',
                'Face Scrub',
                'Face Moisturiser',
                'Sheet Mask',
                'Face Serum',
                'Suncreen',
                'Face Mist',
            ],
            2 => [
                'Shower Gel',
                'Body Scrub',
                'Body Lotion',
                'Hand Cream',
                'Foot Cream',
                'Body Butter',
                'Soaps',
                'Hand wash',
            ],
            3  => [
                'Shampoo',
                'Conditoner',
                'Hair mask',
                'Hair serum',
                'Hair Oil',
                'Straigthner',
                'Dryer',
                'Curler',
                'Trimmers',
            ],
            4  => [
                'Men',
                'Women',
            ],
            5  => [
                ' School Stationery',
                'Bobble Heads',
                'Action Figures',
                'Keychains',
            ],
            6 => [
                'Windchime',
                'Wall décor',
                'Wall Clock',
                'Table Piece',
                'Table Clock',
                'Planters',
                'Key Holders',

            ],
            7  => [
                'Diwali',
                'Raksha Bandhan',
                'Valentine',
            ],
        ];


        foreach ($subcategory as $s => $sc) {
            foreach ($sc as $scg => $scgs) {
                DB::table('sub_categories')->insert([
                    "category_id" => $s,
                    "name" => $scgs,
                    "slug" => Str::slug($scgs),
                    "image" => $faker->imageUrl,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
