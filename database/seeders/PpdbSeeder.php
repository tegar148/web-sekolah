<?php

namespace Database\Seeders;

use App\Models\PpdbRequirement;
use App\Models\PpdbStep;
use App\Models\PpdbTimeline;
use App\Models\SiteSection;
use Illuminate\Database\Seeder;

class PpdbSeeder extends Seeder
{
    public function run(): void
    {
        $requirements = [
            'Lulusan SMP/MTs/Sederajat atau Paket B tahun berjalan atau sebelumnya.',
            'Usia maksimal 21 tahun pada tanggal 1 Juli 2024.',
            'Memiliki Ijazah/Surat Keterangan Lulus (SKL) yang sah.',
            'Sehat jasmani dan rohani (beberapa prodi mewajibkan tidak buta warna).',
        ];

        foreach ($requirements as $description) {
            PpdbRequirement::updateOrCreate(
                ['description' => $description],
                []
            );
        }

        $timelines = [
            [
                'date_label' => '1 - 15 JUNI 2024',
                'title' => 'Sosialisasi & Pra-Pendaftaran',
                'description' => 'Pengenalan jurusan dan pengambilan PIN pendaftaran di sekolah asal atau SMKN 1 Maesan.',
            ],
            [
                'date_label' => '20 - 25 JUNI 2024',
                'title' => 'Pendaftaran Jalur Afirmasi',
                'description' => 'Khusus untuk jalur afirmasi, perpindahan tugas orang tua, dan prestasi hasil lomba.',
            ],
            [
                'date_label' => '27 - 28 JUNI 2024',
                'title' => 'Pendaftaran Jalur Reguler',
                'description' => 'Pendaftaran terbuka untuk semua calon siswa berdasarkan nilai akademik.',
            ],
            [
                'date_label' => '2 JULI 2024',
                'title' => 'Pengumuman & Daftar Ulang',
                'description' => 'Pengumuman hasil seleksi dan proses verifikasi dokumen fisik bagi siswa yang diterima.',
            ],
        ];

        foreach ($timelines as $timeline) {
            PpdbTimeline::updateOrCreate(
                [
                    'date_label' => $timeline['date_label'],
                    'title' => $timeline['title'],
                ],
                [
                    'description' => $timeline['description'],
                ]
            );
        }

        $steps = [
            [
                'title' => '01. Akses Portal',
                'description' => 'Kunjungi website resmi ppdb.jatimprov.go.id atau portal internal sekolah kami.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>',
            ],
            [
                'title' => '02. Isi Formulir',
                'description' => 'Lengkapi data diri dan unggah dokumen persyaratan dalam format digital (PDF/JPG).',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
            ],
            [
                'title' => '03. Pilih Jurusan',
                'description' => 'Pilih konsentrasi keahlian yang sesuai dengan minat dan bakat Anda.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m-14-4V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 13h-4m2-2v4"></path></svg>',
            ],
            [
                'title' => '04. Verifikasi',
                'description' => 'Pantau status pendaftaran secara berkala hingga pengumuman akhir.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            ],
        ];

        foreach ($steps as $step) {
            PpdbStep::updateOrCreate(
                ['title' => $step['title']],
                [
                    'description' => $step['description'],
                    'icon' => $step['icon'],
                ]
            );
        }

        // Additional sections used by the PPDB info page
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'bantuan'],
            [
                'title' => 'Butuh Bantuan?',
                'subtitle' => 'Tim panitia kami siap membantu proses pendaftaran Anda setiap hari kerja pukul 08:00 - 15:00 WIB.',
                'extra_data' => [
                    'phone' => '+62 812-3456-7890',
                    'email' => 'ppdb@smkn1maesan.sch.id',
                ],
                'is_visible' => true,
                'sort_order' => 2,
            ]
        );

        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'cta'],
            [
                'title' => 'Siap Bergabung dengan Keluarga Besar UNIK?',
                'subtitle' => '',
                // NOTE: views typically call Storage::url(image) when image is set.
                // Using null avoids treating an external URL as a storage path.
                'image' => null,
                'extra_data' => [
                    'button_primary_text' => 'Daftar Online Sekarang',
                    'button_primary_link' => '#',
                    'button_secondary_text' => 'Unduh Brosur (PDF)',
                    'button_secondary_link' => '#',
                    'info_text' => 'Pendaftaran gelombang pertama tersisa 5 hari lagi.',
                ],
                'is_visible' => true,
                'sort_order' => 5,
            ]
        );
    }
}
