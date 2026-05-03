<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visi_misi_items', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['visi', 'misi']);
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visi_misi_items');
    }
};
