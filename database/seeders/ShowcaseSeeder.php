<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showcase = [
            'Featured',
            'Best Seller',
        ];

        foreach ($showcase as $s) {
            DB::table('showcases')->insert([
                "name" => $s,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
