<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama_lengkap' => 'Administrator',
            'username'     => 'admin', 
            'email'        => 'admin@toko.com',
            'password'     => Hash::make('password'),
            'role'         => 'admin',
            'id_user'       => 1,
            'no_hp'        => '081234567893',
            'alamat'       => 'Jl. Admin No. 1, Kota Admin',
        ]);

        User::create([
            'nama_lengkap' => 'Pelanggan Setia',
            'username'     => 'customer', 
            'email'        => 'customer@toko.com',
            'password'     => Hash::make('password'),
            'role'         => 'customer',
            'id_user'       => 2,
            'no_hp'        => '081234567891',
            'alamat'       => 'Jl. Pelanggan No. 2, Kota Pelanggan',
        ]);
        
        User::create([
            'nama_lengkap' => 'Staff Toko',
            'username'     => 'staff', 
            'email'        => 'staff@toko.com',
            'password'     => Hash::make('password'),
            'role'         => 'staff',
            'id_user'       => 3,
            'no_hp'        => '081234567890',
            'alamat'       => 'Jl. Staff No. 3, Kota Staff',
        ]);
    }
}