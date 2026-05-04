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
        Schema::create('ppdb_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('ppdb_timelines', function (Blueprint $table) {
            $table->id();
            $table->string('date_label');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('ppdb_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_steps');
        Schema::dropIfExists('ppdb_timelines');
        Schema::dropIfExists('ppdb_requirements');
    }
};
