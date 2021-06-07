<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::insert([
            ['name' => 'iphone', 'description' => 'smart phone', 'price' => 100],
            ['name' => 'book', 'description' => 'very useful book', 'price' => 200],
            ['name' => 'M4A1', 'description' => 'machine gun', 'price' => 4000],
        ]);
    }
}
