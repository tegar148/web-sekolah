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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // vokasi, akademik, non-akademik
            $table->string('achievement'); // Medali Emas, Juara 1, dst
            $table->string('location'); // Jawa Timur, Nasional, dst
            $table->string('event_date'); // e.g. Oktober 2023
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
