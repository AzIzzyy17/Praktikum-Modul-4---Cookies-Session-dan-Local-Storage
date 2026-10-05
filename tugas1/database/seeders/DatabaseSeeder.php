<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Ikhwan',
            'password' => Hash::make('ikhwan1190'),
            'nama_lengkap' => 'Ikhwan Syahid Azizy',
        ]);

        User::create([
            'username' => 'Supardi',
            'password' => Hash::make('password123'),
            'nama_lengkap' => 'Supardi Nasir',
        ]);
    }
}