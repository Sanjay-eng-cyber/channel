<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders =
            [
                [
                    'type' => 'middle slider',
                    'title' => 'Love Your Hair',
                    'descriptions' => 'Treat Yourself With The Best In Haircare.',
                    'link' => route('frontend.cat.show', 'hair-care'),
                    'image' => 'ix2.png',
                ],
                [
                    'type' => 'left slider',
                    'title' => 'Love Your Skin',
                    'descriptions' => 'Treat Yourself With The Best In Skincare.',
                    'link' => route('frontend.cat.show', 'skin'),
                    'image' => 'ix1.png',
                ],
                [
                    'type' => 'right slider',
                    'title' => 'Luxe Fragrances',
                    'descriptions' => 'Indulge In Premium Perfumes',
                    'link' => route('frontend.cat.show', 'fragrances'),
                    'image' => 'ix4.jpg',
                ],
                [
                    'type' => 'right slider',
                    'title' => 'Home Decor',
                    'descriptions' => 'My Love Language.',
                    'link' => route('frontend.cat.show', 'home-decor'),
                    'image' => 'ix3.jpg',
                ]
            ];
        foreach ($sliders as $slider) {
            DB::table('sliders')->insert([
                'type' => $slider['type'],
                'title' => $slider['title'],
                'descriptions' => $slider['descriptions'],
                'link' => $slider['link'],
                'image' => $slider['image'],
            ]);
            try {
                File::copy(public_path('frontend/images/seeders/sliders/' . $slider['image']), storage_path('app/public/images/sliders/' . $slider['image']));
            } catch (\Throwable $th) {
                //Log::info("file" . $eas->image);
            }
        }
    }
}
