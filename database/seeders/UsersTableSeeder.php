<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Apirak',
            'email' => 'pong@st',
            'password' => Hash::make('1212312121'),
            'role_as' => 1, // Assuming 1 represents an admin role
            'department_id' => 1, // Set the department ID accordingly
        ]);

        // Create regular user
    }
}
