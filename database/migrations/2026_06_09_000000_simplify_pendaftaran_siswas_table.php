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
            
            $table->dropColumn([
                'nik',
                'tempat_lahir',
                'tanggal_lahir',
                'alamat_lengkap',
                'nama_ayah',
                'nama_ibu',
                'pekerjaan_ayah',
                'pekerjaan_ibu',
                'no_hp_wali',
                'email_wali',
                'pilihan_jurusan_2',
                'alasan_memilih',
                'foto_ijazah',
                'foto_kk',
                'foto_akta',
                'foto_pas',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_lengkap');
            $table->renameColumn('minat_jurusan', 'pilihan_jurusan_1');
            
            $table->string('nik', 16)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat_lengkap')->nullable();
            
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('no_hp_wali')->nullable();
            $table->string('email_wali')->nullable();
            
            $table->string('pilihan_jurusan_2')->nullable();
            $table->text('alasan_memilih')->nullable();
            
            $table->string('foto_ijazah')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_akta')->nullable();
            $table->string('foto_pas')->nullable();
        });
    }
};
