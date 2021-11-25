<?php

namespace Database\Seeders;

use App\Models\API\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'store_id' => 0,
            'name' => 'nome',
            'price' => rand(1, 40),
            'description' => '',
            'picture' => '...'
        ];

        Product::insert($products);
    }
}
