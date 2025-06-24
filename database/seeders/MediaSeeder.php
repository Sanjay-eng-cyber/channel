<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::get();
        foreach ($products as $product) {
            DB::table('media')->insert([
                'Model_id' => $product->id,
                'model_type' => Product::class,
                'mime_type' => 'image',
                'file_name' => $product['thumbnail_image'],
            ]);
            try {
                File::copy(public_path('frontend/images/seeders/products_new/' . $product['thumbnail_image']), storage_path('app/public/images/products/' . $product['thumbnail_image']));
            } catch (\Throwable $th) {
                //Log::info("file" . $eas->image);
            }
        }
    }
}
