/**
 * Migration untuk membuat tabel conversations
 * 
 * Fitur:
 * 1. Menyimpan riwayat percakapan antara pengguna dan asisten
 * 2. Mengelola status percakapan (aktif/selesai)
 * 3. Menyimpan pengaturan bahasa untuk setiap percakapan
 */
class CreateConversationsTable extends Migration
{
    /**
     * Membuat struktur tabel conversations dengan kolom-kolom:
     * - id: Primary key
     * - user_id: Foreign key ke tabel users
     * - title: Judul percakapan
     * - status: Status percakapan (active/closed)
     * - locale: Bahasa yang digunakan dalam percakapan
     * - timestamps: Waktu pembuatan dan update
     */
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->string('locale')->default('id');
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel conversations jika rollback diperlukan
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
} 