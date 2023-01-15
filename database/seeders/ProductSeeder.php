<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "name" => "Test 1",
            "price" => 2.56,
            "photo" => "logo.png",
            "observation" => "falta",
            "size" => "L"
        ]);
    }
}
