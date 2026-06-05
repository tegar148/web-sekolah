<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendaftaran')->unique()->nullable(); // Auto-generated registration code

            // === STEP 1: DATA PRIBADI ===
            $table->string('nama_lengkap');
            $table->string('nik', 16)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->text('alamat_lengkap')->nullable();

            // === STEP 2: DATA WALI/ORANG TUA MURID ===
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('no_hp_wali')->nullable();
            $table->string('email_wali')->nullable();

            // === STEP 3: PILIHAN JURUSAN ===
            $table->string('pilihan_jurusan_1')->nullable();
            $table->string('pilihan_jurusan_2')->nullable();
            $table->text('alasan_memilih')->nullable();

            // === STEP 4: DOKUMEN ===
            $table->string('foto_ijazah')->nullable();    // file path
            $table->string('foto_kk')->nullable();        // Kartu Keluarga
            $table->string('foto_akta')->nullable();      // Akta Kelahiran
            $table->string('foto_pas')->nullable();       // Pas foto

            // === STATUS ===
            $table->enum('status', ['draft', 'terkirim', 'diverifikasi', 'diterima', 'ditolak'])->default('draft');
            $table->integer('step_terakhir')->default(1); // Track which step was last completed
            $table->timestamp('submitted_at')->nullable();
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_siswas');
    }
};
