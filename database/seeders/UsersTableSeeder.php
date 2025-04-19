<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder untuk membuat data pengguna awal dalam sistem
 * 
 * Fitur-fitur yang diimplementasikan:
 * 1. Pembuatan user admin dengan akses penuh
 * 2. Pembuatan user asisten untuk membantu admin
 * 3. Pembuatan user regular untuk pengguna umum
 * 
 * Setiap user memiliki:
 * - Nama lengkap
 * - Email unik
 * - Password yang di-hash
 * - Status admin/assistant
 * - Pengaturan bahasa (locale)
 */
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat user admin dengan akses penuh ke sistem
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'admin' => true,
            'assistant' => false,
            'locale' => 'en'
        ]);

        // Membuat user asisten untuk membantu tugas admin
        User::create([
            'name' => 'Assistant User',
            'email' => 'assistant@example.com',
            'password' => Hash::make('password'),
            'admin' => false,
            'assistant' => true,
            'locale' => 'en'
        ]);

        // Membuat user regular untuk pengguna umum
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'admin' => false,
            'assistant' => false,
            'locale' => 'en'
        ]);
    }
} 