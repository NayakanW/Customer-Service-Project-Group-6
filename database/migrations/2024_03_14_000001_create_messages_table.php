<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk membuat tabel messages
 * 
 * Fitur:
 * 1. Menyimpan pesan-pesan dalam percakapan
 * 2. Membedakan pesan dari pengguna dan asisten
 * 3. Menyimpan konten pesan dalam format JSON
 */
class CreateMessagesTable extends Migration
{
    /**
     * Membuat struktur tabel messages dengan kolom-kolom:
     * - id: Primary key
     * - conversation_id: Foreign key ke tabel conversations
     * - role: Peran pengirim pesan (user/assistant)
     * - content: Isi pesan dalam format JSON
     * - timestamps: Waktu pembuatan dan update
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['user', 'assistant']);
            $table->json('content');
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel messages jika rollback diperlukan
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
} 