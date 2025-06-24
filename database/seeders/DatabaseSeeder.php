<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CmsUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ShowcaseSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(AttributeValueSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ShowcaseProductSeeder::class);
    }
}
