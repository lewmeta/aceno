<?php

namespace Database\Seeders\Frontend;

use App\Enums\UserType;
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
        // $user = new User();
        // $user->name = 'Test user';
        // $user->email = 'user@gmail.com';
        // $user->password = bcrypt('password');

        $user = User::create([
            'name' => "Test user",
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Vendor seeder;
        User::create([
            'name' => 'Vendor user',
            'email' => 'vendor@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => UserType::VENDOR->value,
        ]);
    }
}
