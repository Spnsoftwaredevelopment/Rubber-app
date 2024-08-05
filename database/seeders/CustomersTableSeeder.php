<?php

namespace Database\Seeders;

use App\Models\Customers;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'code' => 'STR',
            'name' => 'STRubber',
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
        ]);
    }
}
