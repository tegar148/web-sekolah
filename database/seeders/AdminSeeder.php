<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SiteSection;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Default Admin User ─────────────────────────────
        User::updateOrCreate(
            ['email' => 'admin@smkn1maesan.sch.id'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('admin123'),
                'role'     => 'super_admin',
            ]
        );

        // ─── GLOBAL (TOPBAR/NAVBAR) ─────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'global', 'section_key' => 'topbar'],
            [
                'title'    => 'SMK Negeri 1 MAESAN',
                'subtitle' => 'Kreatif, Inovatif, & Berkarakter',
                'is_visible' => true,
                'sort_order' => 1,
            ]
        );

        // ─── GLOBAL (FOOTER) ─────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'global', 'section_key' => 'footer'],
            [
                'title'    => 'SMK Negeri 1 MAESAN',
                'subtitle' => 'Lembaga pendidikan vokasional terpadu yang berorientasi pada masa depan, menggabungkan pendidikan vokasi dengan kebutuhan kekinian di industri.',
                'content'  => json_encode([
                    'address' => 'Jl. Pendidikan Blok No.1, Kab. Bondowoso, Jawa Timur.',
                    'phone' => '+62 (823) 5600 0100',
                    'email' => 'info@smkn1maesan.sch.id',
                    'facebook' => 'https://facebook.com',
                    'instagram' => 'https://instagram.com',
                    'youtube' => 'https://youtube.com',
                ]),
                'is_visible' => true,
                'sort_order' => 2,
            ]
        );

        // ─── WELCOME PAGE ─────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'welcome', 'section_key' => 'hero'],
            [
                'title'       => 'Nurturing Potential into Professional Mastery',
                'subtitle'    => 'A sanctuary for technical innovation and academic rigor, SMK Negeri 1 Maesan bridges the gap between traditional learning and modern industry demands.',
                'button_text' => 'DIGITAL & PREMIUM EXPERIENCE',
                'is_visible'  => true,
                'sort_order'  => 1,
            ]
        );

        SiteSection::updateOrCreate(
            ['page' => 'welcome', 'section_key' => 'sambutan'],
            [
                'title'    => 'Sambutan Kepala Sekolah',
                'subtitle' => 'Selamat datang di portal resmi SMK Negeri 1 Maesan',
                'content'  => 'Selamat datang di portal resmi SMK Negeri 1 Maesan. Kami berkomitmen untuk mencetak generasi yang Unggul, Inovatif, dan Berkarakter melalui pendidikan vokasional berkualitas.',
                'is_visible' => true,
                'sort_order' => 2,
            ]
        );

        SiteSection::updateOrCreate(
            ['page' => 'welcome', 'section_key' => 'berita'],
            [
                'title'    => 'Berita',
                'subtitle' => 'HAPPENINGS AT MAESAN',
                'content'  => json_encode([
                    [
                        'category'    => 'ACADEMIC PENCAPAIAN',
                        'date'        => '12 SEPT 2024',
                        'title'       => 'Integrasi Robotika dalam Olimpiade Sains Nasional',
                        'excerpt'     => 'Pencapaian luar biasa tim robotika dalam mengimplementasikan AI pada unit mikrokontroler...',
                        'image'       => 'https://images.unsplash.com/photo-1535223289827-42f1e9919769?q=80&w=600&auto=format&fit=crop',
                    ],
                    [
                        'category'    => 'FORUM & SUMMIT',
                        'date'        => '10 SEPT 2024',
                        'title'       => 'Kolaborasi Strategis dengan Tech Giant Global',
                        'excerpt'     => 'Mempersiapkan siswa dari program sertifikasi industri tingkat internasional dengan partner perusahaan global...',
                        'image'       => null,
                    ],
                    [
                        'category'    => 'PRAKTIKUM',
                        'date'        => '08 SEPT 2024',
                        'title'       => 'Laboratorium Agroteknologi Berbasis IoT',
                        'excerpt'     => 'Penerapan sensor smart system pada kebun irigasi di area kampus praktikum jurusan agribisnis...',
                        'image'       => null,
                    ],
                ]),
                'is_visible' => true,
                'sort_order' => 3,
            ]
        );

        SiteSection::updateOrCreate(
            ['page' => 'welcome', 'section_key' => 'mitra_alumni'],
            [
                'title'    => 'Mitra Kerja & Alumni',
                'subtitle' => 'Keberhasilan institusi diukur dari kualitas alumni dan kepercayaan yang diberikan oleh mitra industri kami.',
                'content'  => json_encode([
                    ['name' => 'Aris Software', 'role' => 'SENIOR ENGINEER, PT ASTER INDONESIA', 'quote' => 'Top talent teknis yang dihasilkan di SMK Maesan Digital menjadi modal utama kami dalam men-develop TIM engineering.'],
                    ['name' => 'Riza Arifin', 'role' => 'PRODUCT MANAGER, TECH GLOBAL', 'quote' => 'Pendidikan vokasi di sini sangat relevan dengan dinamika industri digital yang sangat cepat.'],
                    ['name' => 'Budi Santoso', 'role' => 'FOUNDER & CEO, EDU TECH INOVA', 'quote' => 'Fasilitas yang disediakan memberikan pengalaman nyata sebelum kami terjun ke dunia kerja.'],
                ]),
                'is_visible' => true,
                'sort_order' => 4,
            ]
        );

        SiteSection::updateOrCreate(
            ['page' => 'welcome', 'section_key' => 'stats'],
            [
                'title'    => 'Membangun Fondasi Peradaban Melalui Keahlian',
                'subtitle' => 'SMK Negeri 1 MAESAN menggagas model pembelajaran \'Advanced Digital\' di mana kelas kolaboratif klasik bertemu dengan referensi teknologi modern.',
                'content'  => json_encode([
                    ['value' => '25+', 'label' => 'TAHUN DEDIKASI', 'sub' => 'Pengalaman Edukasi'],
                    ['value' => '1.2K', 'label' => 'SISWA AKTIF', 'sub' => 'Duta Vokasi'],
                    ['value' => '4.5K', 'label' => 'ALUMNI SUKSES', 'sub' => 'Tersebar di Industri'],
                    ['value' => '85+', 'label' => 'PENGHARGAAN', 'sub' => 'Prestasi Nasional'],
                ]),
                'is_visible' => true,
                'sort_order' => 5,
            ]
        );

        // ─── SEJARAH PAGE ────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'sejarah', 'section_key' => 'hero'],
            [
                'title'    => 'Sejarah',
                'subtitle' => 'Menelusuri jejak langkah dan dedikasi SMK Negeri 1 Maesan dalam mencetak generasi unggul sejak tahun 2004.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'sejarah', 'section_key' => 'content'],
            [
                'title'   => 'Membangun Fondasi Masa Depan Sejak Awal Milenium.',
                'subtitle' => 'ESTABLISHED 2004',
                'content' => 'SMK Negeri 1 MAESAN lahir dari visi luhur untuk menyediakan akses pendidikan vokasi berkualitas di wilayah Bondowoso. Dimulai dengan fasilitas terbatas, semangat kami tak pernah padam untuk mencetak generasi yang Unggul, Inovatif, dan Berkarakter.',
                'is_visible' => true, 'sort_order' => 2,
            ]
        );

        // ─── VISI MISI PAGE ───────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'visi-misi', 'section_key' => 'hero'],
            [
                'title'    => 'Visi & Misi',
                'subtitle' => 'Landasan filosofis dan tujuan strategis institusi pendidikan kami.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'visi-misi', 'section_key' => 'content'],
            [
                'title'   => 'Visi & Misi Sekolah',
                'content' => 'Mewujudkan lembaga pendidikan vokasi yang unggul, inovatif, dan berkarakter serta berwawasan lingkungan.',
                'is_visible' => true, 'sort_order' => 2,
            ]
        );

        // ─── PRESTASI PAGE ───────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'prestasi', 'section_key' => 'hero'],
            [
                'title'    => 'Prestasi',
                'subtitle' => 'Catatan pencapaian gemilang siswa dan institusi kami di berbagai kompetisi.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'prestasi', 'section_key' => 'content'],
            [
                'title'   => 'Daftar Prestasi',
                'content' => 'Koleksi penghargaan dan pencapaian dari tingkat kabupaten hingga nasional.',
                'is_visible' => true, 'sort_order' => 2,
            ]
        );

        // ─── GURU PAGE ──────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'guru', 'section_key' => 'hero'],
            [
                'title'    => 'Guru',
                'subtitle' => 'Daftar tenaga pendidik profesional SMK Negeri 1 Maesan yang berkomitmen mencetak generasi UNIK.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'guru', 'section_key' => 'content'],
            [
                'title'   => 'Daftar Guru & Staff',
                'content' => json_encode([
                    ['name' => 'Ahmad Sulaiman, S.Kom', 'role' => 'HEAD OF TKJ DEPARTMENT', 'dept' => 'TKJ', 'bio' => 'Dedicated to bridging the gap between networking theory and industrial application.'],
                    ['name' => 'Siti Nurhaliza, M.T', 'role' => 'NETWORK ADMINISTRATION', 'dept' => 'TKJ', 'bio' => 'Specializing in cloud infrastructure and cybersecurity management for modern enterprise.'],
                    ['name' => 'Budi Santoso, S.Pt', 'role' => 'TERNAK RUMINANSIA', 'dept' => 'Agribisnis', 'bio' => 'Leading sustainable livestock management programs since 2012.'],
                    ['name' => 'Dewi Lestari, M.Si', 'role' => 'TERNAK UNGGAS', 'dept' => 'Agribisnis', 'bio' => 'Expert in poultry health and industrial-scale production.'],
                    ['name' => 'Hendra Wijaya, S.E', 'role' => 'AGRIBUSINESS ECONOMY', 'dept' => 'Agribisnis', 'bio' => 'Empowering students with entrepreneurial skills in modern agriculture.'],
                    ['name' => 'Rizky Pratama, S.Pt', 'role' => 'ANIMAL NUTRITION', 'dept' => 'Agribisnis', 'bio' => 'Innovating organic feed solutions for livestock sustainability.'],
                    ['name' => 'Drs. Mulyadi', 'role' => 'INDONESIAN LANGUAGE', 'dept' => 'Umum', 'bio' => 'Bahasa adalah jendela dunia. 25+ tahun pengalaman mengajar.'],
                    ['name' => 'Anita Wijaya, S.Pd', 'role' => 'MATHEMATICS', 'dept' => 'Umum', 'bio' => 'Making math logic accessible to everyone.'],
                    ['name' => 'Yusuf Mansur, S.S', 'role' => 'ENGLISH LITERATURE', 'dept' => 'Umum', 'bio' => 'Global communication for future leaders.'],
                    ['name' => 'Ratna Sari, S.Pd', 'role' => 'CIVICS & HISTORY', 'dept' => 'Umum', 'bio' => 'Understanding our roots to build the future.'],
                    ['name' => 'Eko Prasetyo, S.Psi', 'role' => 'COUNSELING (BK)', 'dept' => 'Umum', 'bio' => 'Guiding potential, fostering character.'],
                ]),
                'is_visible' => true, 'sort_order' => 2,
            ]
        );

        // ─── GALERI PAGE ─────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'galeri', 'section_key' => 'hero'],
            [
                'title'    => 'Galeri Foto',
                'subtitle' => 'Dokumentasi kegiatan dan momen berharga sekolah.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'galeri', 'section_key' => 'content'],
            ['title' => 'Koleksi Galeri', 'content' => 'Koleksi visual dokumentasi kegiatan sekolah.', 'is_visible' => true, 'sort_order' => 2]
        );

        // ─── FASILITAS PAGE ──────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'fasilitas', 'section_key' => 'hero'],
            [
                'title'    => 'Fasilitas Sekolah',
                'subtitle' => 'Infrastruktur dan sarana prasarana terbaik untuk menunjang proses pembelajaran.',
                'is_visible' => true, 'sort_order' => 1,
            ]
        );
        SiteSection::updateOrCreate(
            ['page' => 'fasilitas', 'section_key' => 'content'],
            ['title' => 'Daftar Fasilitas', 'content' => 'Lab komputer, lab agribisnis, perpustakaan digital, lapangan olahraga, dan masjid.', 'is_visible' => true, 'sort_order' => 2]
        );

        // ─── JURUSAN PAGES ───────────────────────────────
        $jurusanData = [
            ['page' => 'jurusan-ruminansia', 'title' => 'Agribisnis Ternak Ruminansia', 'subtitle' => 'Program keahlian peternakan sapi, kambing, dan domba berbasis teknologi modern.'],
            ['page' => 'jurusan-unggas', 'title' => 'Agribisnis Ternak Unggas', 'subtitle' => 'Program keahlian peternakan ayam, bebek, dan burung puyuh untuk skala industri.'],
            ['page' => 'jurusan-tkj', 'title' => 'Teknik Komputer & Jaringan', 'subtitle' => 'Program keahlian jaringan komputer, cloud computing, dan keamanan siber.'],
        ];

        foreach ($jurusanData as $j) {
            SiteSection::updateOrCreate(
                ['page' => $j['page'], 'section_key' => 'hero'],
                ['title' => $j['title'], 'subtitle' => $j['subtitle'], 'is_visible' => true, 'sort_order' => 1]
            );
            SiteSection::updateOrCreate(
                ['page' => $j['page'], 'section_key' => 'content'],
                ['title' => 'Detail ' . $j['title'], 'content' => 'Konten detail program keahlian.', 'is_visible' => true, 'sort_order' => 2]
            );
        }

        // ─── BKK PAGES ──────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'bkk-profile', 'section_key' => 'hero'],
            ['title' => 'Profil BKK Skama', 'subtitle' => 'Bursa Kerja Khusus SMK Negeri 1 Maesan — menjembatani lulusan dengan dunia industri.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'bkk-profile', 'section_key' => 'content'],
            ['title' => 'Layanan & Kemitraan BKK', 'content' => 'BKK Skama melayani penempatan kerja, pelatihan, dan kemitraan industri.', 'is_visible' => true, 'sort_order' => 2]
        );

        SiteSection::updateOrCreate(
            ['page' => 'bkk-lowongan', 'section_key' => 'hero'],
            ['title' => 'Info Lowongan Kerja', 'subtitle' => 'Menjembatani lulusan SMK Negeri 1 Maesan dengan industri terkemuka.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'bkk-lowongan', 'section_key' => 'content'],
            ['title' => 'Daftar Lowongan', 'content' => json_encode([
                ['title' => 'Junior Web Developer', 'company' => 'PT. Teknologi Nusantara Abadi', 'location' => 'Bondowoso, Jawa Timur', 'deadline' => '30 Nov 2024', 'salary' => 'IDR 3.5M - 5M', 'badge' => 'URGENT'],
                ['title' => 'Mekanik Otomotif (Senior)', 'company' => 'Auto Solutions Service Center', 'location' => 'Situbondo, Jawa Timur', 'deadline' => '15 Des 2024', 'salary' => null, 'badge' => null],
                ['title' => 'Staff Administrasi & Keuangan', 'company' => 'Mitra Makmur Sejahtera, CV', 'location' => 'Jember, Jawa Timur', 'deadline' => '20 Des 2024', 'salary' => null, 'badge' => 'NEW'],
            ]), 'is_visible' => true, 'sort_order' => 2]
        );

        // ─── SISWA PAGES ─────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'siswa-organisasi', 'section_key' => 'hero'],
            ['title' => 'Organisasi Siswa', 'subtitle' => 'Membangun karakter, kepemimpinan, dan inovasi melalui wadah aspirasi yang dinamis di lingkungan SMK Negeri 1 Maesan.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'siswa-organisasi', 'section_key' => 'content'],
            ['title' => 'OSIS & MPK', 'content' => 'Organisasi Intra Sekolah dan Majelis Perwakilan Kelas.', 'is_visible' => true, 'sort_order' => 2]
        );

        SiteSection::updateOrCreate(
            ['page' => 'siswa-ekstrakurikuler', 'section_key' => 'hero'],
            ['title' => 'Ekstrakurikuler', 'subtitle' => 'Wadah eksplorasi diri untuk membentuk karakter unggul melalui berbagai bidang minat dan bakat di SMK Negeri 1 Maesan.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'siswa-ekstrakurikuler', 'section_key' => 'content'],
            ['title' => 'Daftar Ekstrakurikuler', 'content' => json_encode([
                ['name' => 'Pramuka', 'type' => 'WAJIB', 'desc' => 'Pengembangan kedisiplinan, kepemimpinan, dan kemandirian.'],
                ['name' => 'PMR', 'type' => 'Kesehatan', 'desc' => 'Relawan muda dengan misi kemanusiaan.'],
                ['name' => 'Olahraga', 'type' => 'Sport', 'desc' => 'Futsal, Basket, dan Voli.'],
                ['name' => 'Seni & Budaya', 'type' => 'KREATIF', 'desc' => 'Tari Tradisional, Paduan Suara, dan Teater.'],
                ['name' => 'ROHIS', 'type' => 'Keagamaan', 'desc' => 'Pembinaan karakter religius dan akhlak mulia.'],
                ['name' => 'English Club', 'type' => 'Akademik', 'desc' => 'Master public speaking, debating, and creative writing.'],
            ]), 'is_visible' => true, 'sort_order' => 2]
        );

        SiteSection::updateOrCreate(
            ['page' => 'siswa-kalender', 'section_key' => 'hero'],
            ['title' => 'Kalender Pendidikan', 'subtitle' => 'Panduan resmi jadwal akademik, kegiatan sekolah, dan hari libur nasional untuk komunitas SMK Negeri 1 Maesan.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'siswa-kalender', 'section_key' => 'content'],
            ['title' => 'Unduh Dokumen Kalender', 'content' => 'Dapatkan salinan PDF kalender akademik lengkap dengan rincian jadwal ujian, libur, dan agenda penting sekolah lainnya.', 'is_visible' => true, 'sort_order' => 2]
        );

        // ─── INFO PPDB PAGE ─────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'hero'],
            ['title' => 'Info PPDB', 'subtitle' => 'Membangun masa depan kompeten melalui pendidikan vokasi berkualitas di SMK Negeri 1 MAESAN.', 'button_text' => 'PENERIMAAN PESERTA DIDIK BARU 2024/2025', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'persyaratan'],
            ['title' => 'Persyaratan Umum', 'content' => json_encode([
                'Lulusan SMP/MTs/Sederajat atau Paket B tahun berjalan atau sebelumnya.',
                'Usia maksimal 21 tahun pada tanggal 1 Juli 2024.',
                'Memiliki Ijazah/Surat Keterangan Lulus (SKL) yang sah.',
                'Sehat jasmani dan rohani (beberapa prodi mewajibkan tidak buta warna).',
            ]), 'is_visible' => true, 'sort_order' => 2]
        );
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'jadwal'],
            ['title' => 'Jadwal Pelaksanaan', 'content' => json_encode([
                ['date' => '1 - 15 JUNI 2024', 'title' => 'Sosialisasi & Pra-Pendaftaran', 'desc' => 'Pengenalan jurusan dan pengambilan PIN pendaftaran di sekolah asal atau SMKN 1 Maesan.'],
                ['date' => '20 - 25 JUNI 2024', 'title' => 'Pendaftaran Jalur Afirmasi', 'desc' => 'Khusus untuk jalur afirmasi, perpindahan tugas orang tua, dan prestasi hasil lomba.'],
                ['date' => '27 - 28 JUNI 2024', 'title' => 'Pendaftaran Jalur Reguler', 'desc' => 'Pendaftaran terbuka untuk semua calon siswa berdasarkan nilai akademik.'],
                ['date' => '2 JULI 2024', 'title' => 'Pengumuman & Daftar Ulang', 'desc' => 'Pengumuman hasil seleksi dan proses verifikasi dokumen fisik bagi siswa yang diterima.'],
            ]), 'is_visible' => true, 'sort_order' => 3]
        );
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'langkah'],
            ['title' => 'Langkah Pendaftaran', 'subtitle' => 'Panduan mudah untuk mendaftar di SMK Negeri 1 Maesan.', 'is_visible' => true, 'sort_order' => 4]
        );
        SiteSection::updateOrCreate(
            ['page' => 'info-ppdb', 'section_key' => 'cta'],
            ['title' => 'Siap Bergabung dengan Keluarga Besar UNIK?', 'button_text' => 'Daftar Online Sekarang', 'is_visible' => true, 'sort_order' => 5]
        );

        // ─── BERITA PAGE ─────────────────────────────────
        SiteSection::updateOrCreate(
            ['page' => 'berita', 'section_key' => 'hero'],
            ['title' => 'Berita & Informasi', 'subtitle' => 'Pusat informasi resmi seputar kegiatan, pencapaian akademik, serta berbagai momen penting di lingkungan SMK Negeri 1 Maesan.', 'is_visible' => true, 'sort_order' => 1]
        );
        SiteSection::updateOrCreate(
            ['page' => 'berita', 'section_key' => 'content'],
            ['title' => 'Daftar Berita', 'content' => 'Halaman berita utama.', 'is_visible' => true, 'sort_order' => 2]
        );
    }
}
