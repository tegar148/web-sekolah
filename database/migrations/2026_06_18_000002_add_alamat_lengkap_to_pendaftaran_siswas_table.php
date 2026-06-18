<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftaran_siswas', 'alamat_lengkap')) {
                $table->text('alamat_lengkap')->nullable()->after('kelurahan_desa');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            if (Schema::hasColumn('pendaftaran_siswas', 'alamat_lengkap')) {
                $table->dropColumn('alamat_lengkap');
            }
        });
    }
};
