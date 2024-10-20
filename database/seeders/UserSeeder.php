<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
    }
}

