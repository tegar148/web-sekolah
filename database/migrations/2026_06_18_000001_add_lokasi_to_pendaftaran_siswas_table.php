<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->string('kota_kabupaten')->nullable()->after('sekolah_asal');
            $table->string('kelurahan_desa')->nullable()->after('kota_kabupaten');
            // kolom alamat_lengkap sudah ada (dari migration awal), pastikan nullable
            $table->text('alamat_lengkap')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->dropColumn(['kota_kabupaten', 'kelurahan_desa']);
        });
    }
};
