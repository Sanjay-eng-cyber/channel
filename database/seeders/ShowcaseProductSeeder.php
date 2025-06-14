<?php

namespace Database\Seeders;

use App\Models\Showcase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowcaseProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showcases = Showcase::get();
        foreach ($showcases as $showcase) {
            for ($i = 0; $i <= 7; $i++) {
                DB::table('showcase_products')->insert([
                    "showcase_id" => $showcase->id,
                    "product_id" => random_int(1,19),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
