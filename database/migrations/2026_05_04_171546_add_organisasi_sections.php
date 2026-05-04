<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // OSIS Section
        DB::table('site_sections')->updateOrInsert(
            ['page' => 'siswa-organisasi', 'section_key' => 'osis'],
            [
                'title' => 'OSIS',
                'subtitle' => 'Organisasi Intra Sekolah sebagai pilar utama kegiatan kesiswaan. Fokus pada pengembangan kepemimpinan, pengabdian sosial, dan manajemen acara sekolah yang inklusif.',
                'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800&auto=format&fit=crop', // Background image
                'extra_data' => json_encode([
                    'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&auto=format&fit=crop',
                    'avatar_role' => 'KETUA UMUM',
                    'avatar_name' => 'Aditya Pratama',
                    'badge_text' => 'LIVE SESSION',
                    'badge_title' => 'Rapat Kerja Program UNIK 2024'
                ]),
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Minat Bakat Header Section
        DB::table('site_sections')->updateOrInsert(
            ['page' => 'siswa-organisasi', 'section_key' => 'minat_bakat_header'],
            [
                'title' => 'Kelompok Minat & Bakat',
                'subtitle' => 'Temukan komunitasmu, asah potensimu, dan jadilah versi terbaik dirimu di SMK Negeri 1 Maesan.',
                'extra_data' => json_encode([
                    'tag' => 'EXTRACURRICULAR'
                ]),
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    public function down(): void
    {
        DB::table('site_sections')
            ->where('page', 'siswa-organisasi')
            ->whereIn('section_key', ['osis', 'minat_bakat_header'])
            ->delete();
    }
};
