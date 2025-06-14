<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodAttributeValues = [
            1 => [
                'Red',
                'Blue',
                'Green',
            ],
            2 => [
                'Small',
                'Medium',
                'Large',
            ],
        ];


        foreach ($prodAttributeValues as $p => $pav) {
            foreach ($pav as $pa => $pavs) {
                DB::table('attribute_values')->insert([
                    "attribute_id" => $p,
                    "name" => $pavs,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
