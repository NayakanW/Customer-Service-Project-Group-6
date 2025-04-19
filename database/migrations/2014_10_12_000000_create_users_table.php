<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk membuat tabel users
 * 
 * Fitur:
 * 1. Menyimpan informasi pengguna sistem
 * 2. Mendukung autentikasi multi-bahasa
 * 3. Mengelola hak akses pengguna
 */
class CreateUsersTable extends Migration
{
    /**
     * Membuat struktur tabel users dengan kolom-kolom:
     * - id: Primary key
     * - name: Nama lengkap pengguna
     * - email: Alamat email unik
     * - password: Password terenkripsi
     * - is_admin: Status admin
     * - is_assistant: Status asisten
     * - locale: Pengaturan bahasa
     * - timestamps: Waktu pembuatan dan update
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_assistant')->default(false);
            $table->string('locale')->default('id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel users jika rollback diperlukan
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
} 