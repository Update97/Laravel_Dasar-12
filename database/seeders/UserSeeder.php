<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy 
        User::create (['name' => 'admin', 'email' => 'admin@gmail.com', 'role' => 'admin', 'status' => 'active', 'password' => 'admin']);        
        User::create (['name' => 'staff', 'email' => 'staff@gmail.com', 'role' => 'staff', 'status' => 'active', 'password' => 'staff']);
        User::create (['name' => 'customer', 'email' => 'customer@gmail.com', 'role' => 'customer', 'status' => 'active', 'password' => 'customer']);
    }
}
