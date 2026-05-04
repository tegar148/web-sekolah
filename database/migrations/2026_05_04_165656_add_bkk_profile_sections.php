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
        $page = 'bkk-profile';

        // Hero
        \App\Models\SiteSection::firstOrCreate(
            ['page' => $page, 'section_key' => 'hero'],
            [
                'title' => 'Profil BKK Skama',
                'subtitle' => 'Menjembatani transisi dunia pendidikan ke dunia industri. Kami berkomitmen memfasilitasi penempatan kerja siswa dan pengembangan karir alumni secara profesional.',
                'sort_order' => 1,
                'is_visible' => true,
            ]
        );

        // Tentang BKK
        \App\Models\SiteSection::firstOrCreate(
            ['page' => $page, 'section_key' => 'tentang_bkk'],
            [
                'title' => 'Tentang BKK',
                'subtitle' => '',
                'sort_order' => 2,
                'is_visible' => true,
                'content' => json_encode([
                    'text_1' => 'Bursa Kerja Khusus (BKK) SMK Negeri 1 MAESAN adalah lembaga yang dibentuk sebagai perantara antara sekolah dengan dunia industri untuk kepentingan penempatan tamatan.',
                    'text_2' => 'Kami berfungsi sebagai pusat informasi lowongan kerja, konseling karir, dan wadah kerjasama industri yang berkelanjutan. Fokus utama kami adalah memastikan setiap lulusan memiliki kompetensi yang relevan dan akses langsung ke peluang karir impian mereka.',
                    'stats' => [
                        [
                            'value' => '50+',
                            'label' => 'MITRA INDUSTRI'
                        ],
                        [
                            'value' => '90%',
                            'label' => 'TINGKAT PENYERAPAN'
                        ]
                    ],
                    'image' => ''
                ])
            ]
        );

        // Layanan Unggulan
        \App\Models\SiteSection::firstOrCreate(
            ['page' => $page, 'section_key' => 'layanan'],
            [
                'title' => 'Layanan Unggulan Kami',
                'subtitle' => 'Memberikan dukungan komprehensif bagi siswa dan alumni melalui ekosistem karir digital yang terintegrasi.',
                'sort_order' => 3,
                'is_visible' => true,
                'content' => json_encode([
                    [
                        'title' => 'Career Counseling',
                        'desc' => 'Bimbingan karir personal untuk membantu siswa mengenali potensi dan minat bakat dalam memilih jalur karir yang tepat.',
                        'tag' => 'PREMIUM SERVICE',
                        'style' => 'wide_white' // mapped to card 1
                    ],
                    [
                        'title' => 'Job Placement',
                        'desc' => 'Penyaluran tenaga kerja langsung ke perusahaan mitra terpilih.',
                        'tag' => '',
                        'style' => 'dark_teal' // mapped to card 2
                    ],
                    [
                        'title' => 'Industrial Partnerships',
                        'desc' => 'Kerjasama strategis kurikulum dan pelatihan dengan industri global.',
                        'tag' => '',
                        'style' => 'light_blue' // mapped to card 3
                    ],
                    [
                        'title' => 'Alumni Networking',
                        'desc' => 'Membangun komunitas alumni yang kuat untuk saling mendukung dan berbagi peluang profesional di berbagai sektor industri.',
                        'tag' => '',
                        'style' => 'wide_white_2' // mapped to card 4
                    ]
                ])
            ]
        );

        // CTA
        \App\Models\SiteSection::firstOrCreate(
            ['page' => $page, 'section_key' => 'cta'],
            [
                'title' => 'Siap Melangkah ke Dunia Kerja?',
                'subtitle' => 'Daftarkan dirimu sekarang untuk mendapatkan informasi lowongan kerja terbaru dan bimbingan karir dari tim ahli kami.',
                'button_text' => 'Hubungi BKK Skama',
                'button_link' => '#',
                'sort_order' => 4,
                'is_visible' => true,
                'content' => json_encode([
                    'button_2_text' => 'Info Lowongan Kerja',
                    'button_2_link' => '#'
                ])
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\SiteSection::where('page', 'bkk-profile')->delete();
    }
};
