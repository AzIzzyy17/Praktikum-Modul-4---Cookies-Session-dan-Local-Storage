<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@toko.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@toko.com'],
            [
                'name' => 'Staff Toko',
                'password' => Hash::make('password'),
                'role' => 'staff',
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@toko.com'],
            [
                'name' => 'Pelanggan Setia',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ]
        );
    }
}