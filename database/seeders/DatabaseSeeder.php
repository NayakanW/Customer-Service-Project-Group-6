<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Database Seeder utama yang mengatur urutan seeding data
 * 
 * Fitur:
 * 1. Mengatur urutan eksekusi seeder
 * 2. Memastikan data awal tersedia sebelum aplikasi digunakan
 * 3. Memudahkan proses development dan testing
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan semua seeder yang diperlukan
     * Urutan seeding penting untuk menjaga integritas data
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class, // Menjalankan seeder untuk membuat data pengguna
        ]);
    }
}
