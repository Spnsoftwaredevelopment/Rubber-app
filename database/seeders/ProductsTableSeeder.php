<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'code' => 'EM', // Use a unique code for products
            'name' => 'Engine Mounting',
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
        ]);
    }
}
