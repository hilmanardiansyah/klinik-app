<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat admin
        $admin = User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Petugas pendaftaran
        $pendaftar = User::create([
            'name' => 'Petugas Daftar',
            'email' => 'daftar@klinik.com',
            'password' => Hash::make('password'),
        ]);
        $pendaftar->assignRole('petugas_pendaftaran');

        // Dokter
        $dokter = User::create([
            'name' => 'Dokter Umum',
            'email' => 'dokter@klinik.com',
            'password' => Hash::make('password'),
        ]);
        $dokter->assignRole('dokter');

        // Kasir
        $kasir = User::create([
            'name' => 'Kasir Klinik',
            'email' => 'kasir@klinik.com',
            'password' => Hash::make('password'),
        ]);
        $kasir->assignRole('kasir');
    }
}

