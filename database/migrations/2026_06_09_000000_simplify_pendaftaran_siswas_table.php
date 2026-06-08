<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->renameColumn('nama_lengkap', 'nama');
            $table->renameColumn('pilihan_jurusan_1', 'minat_jurusan');
            
            // Mengubah kolom-kolom lama menjadi nullable agar tidak error saat insert data baru
            // tanpa harus menghapus (drop) datanya.
            $table->string('nik', 16)->nullable()->change();
            $table->string('tempat_lahir')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->text('alamat_lengkap')->nullable()->change();
            
            $table->string('nama_ayah')->nullable()->change();
            $table->string('nama_ibu')->nullable()->change();
            $table->string('pekerjaan_ayah')->nullable()->change();
            $table->string('pekerjaan_ibu')->nullable()->change();
            $table->string('no_hp_wali')->nullable()->change();
            $table->string('email_wali')->nullable()->change();
            
            $table->string('pilihan_jurusan_2')->nullable()->change();
            $table->text('alasan_memilih')->nullable()->change();
            
            $table->string('foto_ijazah')->nullable()->change();
            $table->string('foto_kk')->nullable()->change();
            $table->string('foto_akta')->nullable()->change();
            $table->string('foto_pas')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_lengkap');
            $table->renameColumn('minat_jurusan', 'pilihan_jurusan_1');
            
            // Revert them to non-nullable if they were previously strictly required
            // (Assumed behavior, adjust as necessary depending on original schema)
        });
    }
};
