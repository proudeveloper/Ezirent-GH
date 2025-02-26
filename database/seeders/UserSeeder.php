<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = UserRole::where('name', 'Super Admin')->first()->id ?? 1;
        $adminRole = UserRole::where('name', 'Admin')->first()->id ?? 2;
        $customerRole = UserRole::where('name', 'Customer')->first()->id ?? 3;

        // Create users
        User::insert([
            [
                'f_name' => 'Super',
                'l_name' => 'Admin',
                'email' => 'superadmin@example.com',
                'dob' => '1990-01-01',
                'home_town' => 'Accra',
                'phone' => '0542150898',
                'role_id' => $superAdminRole,
                'password' => Hash::make('password'),
                'user_img' => 'user_img.jpg',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'f_name' => 'Admin',
                'l_name' => 'User',
                'email' => 'admin@example.com',
                'dob' => '1992-05-15',
                'home_town' => 'Kumasi',
                'phone' => '0541111111',
                'role_id' => $adminRole,
                'password' => Hash::make('password'),
                'user_img' => 'user_img.jpg',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'f_name' => 'John',
                'l_name' => 'Doe',
                'email' => 'customer@example.com',
                'dob' => '1995-08-22',
                'home_town' => 'Takoradi',
                'phone' => '0542222222',
                'role_id' => $customerRole,
                'password' => Hash::make('password'),
                'user_img' => 'user_img.jpg',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
