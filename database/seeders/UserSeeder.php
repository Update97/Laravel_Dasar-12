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
        User::create (['name' => 'Yoga', 'email' => 'Yoga@gmail.com', 'role' => 'admin', 'status' => 'active', 'password' => '123456']);        
        User::create (['name' => 'Indah', 'email' => 'Indah@gmail.com', 'role' => 'staff', 'status' => 'active', 'password' => '123456']);
        User::create (['name' => 'Tari', 'email' => 'Tari@gmail.com', 'role' => 'customer', 'status' => 'active', 'password' => '123456']);
    }
}
