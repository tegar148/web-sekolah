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
        $pages = ['jurusan-tkj', 'jurusan-unggas', 'jurusan-ruminansia'];

        foreach ($pages as $page) {
            // Prospek Karir
            \App\Models\SiteSection::firstOrCreate(
                ['page' => $page, 'section_key' => 'prospek_karir'],
                [
                    'title' => 'Prospek Karir Lulusan',
                    'subtitle' => 'Peluang karir terbaik untuk lulusan kami.',
                    'sort_order' => 4,
                    'is_visible' => true,
                    'content' => json_encode([
                        [
                            'title' => 'Top Role 1',
                            'desc' => 'Deskripsi untuk Top Role 1',
                            'tags' => 'Manajemen, Konsultan',
                            'type' => 'wide'
                        ],
                        [
                            'title' => 'Top Role 2',
                            'desc' => 'Deskripsi untuk Top Role 2',
                            'type' => 'solid'
                        ],
                        [
                            'title' => 'Role 3',
                            'desc' => 'Deskripsi Role 3',
                            'type' => 'small'
                        ],
                        [
                            'title' => 'Role 4',
                            'desc' => 'Deskripsi Role 4',
                            'type' => 'small'
                        ],
                        [
                            'title' => 'Role 5',
                            'desc' => 'Deskripsi Role 5',
                            'type' => 'small'
                        ]
                    ])
                ]
            );

            // Fasilitas Pembelajaran
            \App\Models\SiteSection::firstOrCreate(
                ['page' => $page, 'section_key' => 'fasilitas_jurusan'],
                [
                    'title' => 'Fasilitas Pembelajaran',
                    'subtitle' => 'Infrastruktur lengkap guna menyokong simulasi kerja.',
                    'sort_order' => 5,
                    'is_visible' => true,
                    'content' => json_encode([
                        [
                            'title' => 'Fasilitas 1',
                            'desc' => 'Deskripsi Fasilitas 1',
                            'tag' => 'LAB',
                            'image' => ''
                        ],
                        [
                            'title' => 'Fasilitas 2',
                            'desc' => 'Deskripsi Fasilitas 2',
                            'tag' => 'PRAKTIK',
                            'image' => ''
                        ]
                    ])
                ]
            );

            // CTA
            \App\Models\SiteSection::firstOrCreate(
                ['page' => $page, 'section_key' => 'cta'],
                [
                    'title' => 'Siap Menjadi Ahli?',
                    'subtitle' => 'Pendaftaran peserta didik baru kini dibuka.',
                    'button_text' => 'Daftar Sekarang',
                    'button_link' => '#',
                    'sort_order' => 6,
                    'is_visible' => true,
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $pages = ['jurusan-tkj', 'jurusan-unggas', 'jurusan-ruminansia'];
        \App\Models\SiteSection::whereIn('page', $pages)
            ->whereIn('section_key', ['prospek_karir', 'fasilitas_jurusan', 'cta'])
            ->delete();
    }
};
