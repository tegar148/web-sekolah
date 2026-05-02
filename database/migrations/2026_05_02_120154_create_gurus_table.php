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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department'); // Agribisnis Ruminasia, Agribisnis Ternak Unggas, Teknik Komputer & Jaringan, Umum (General Education)
            $table->string('subject'); // e.g., HEAD OF TKJ DEPARTMENT, MATHEMATICS
            $table->string('nuptk')->nullable();
            $table->string('status')->nullable(); // PNS, PPPK, GTT
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
