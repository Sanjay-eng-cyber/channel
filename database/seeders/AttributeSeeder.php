<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Color',
            'Size',
        ];
        foreach ($name as $n) {
            DB::table('attributes')->insert([
                "name" => $n,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
