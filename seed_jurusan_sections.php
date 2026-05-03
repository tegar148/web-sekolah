<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$data = [
    'jurusan-tkj' => [
        'prospek_karir' => [
            'title' => 'Prospek Karir Lulusan',
            'subtitle' => 'Setiap perusahaan, perkantoran, dan industri sangat membutuhkan kepiawaian pakar IT dan Jaringan.',
            'content' => [
                [
                    'title' => 'Network Engineer',
                    'desc' => 'Bertanggung jawab merancang arsitektur jaringan kantor secara dinamis, routing, switching skala kompleks, mengatasi latensi koneksi global server.',
                    'tags' => 'Infrastruktur, Analitik Web',
                    'type' => 'wide'
                ],
                [
                    'title' => 'Cyber Security Entry Analyst',
                    'desc' => 'Melakukan filtrasi *firewall*, penetrasi dini (pentest) celah sistem operasi, hingga pencegahan intrusi *malware* korporat.',
                    'type' => 'solid'
                ],
                [
                    'title' => 'IT Support & Maintenance',
                    'desc' => 'Memecahkan *troubleshoot* teknis perkakas klien, OS Windows/Linux, serta mengurusi garansi lisensi peranti.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Cloud System Admin',
                    'desc' => 'Mengoperasikan kontrol komputasi peladen web (AWS/Azure) demi menjaga layanan agar terus menyala tanpa putus.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Fiber Optic Technician',
                    'desc' => 'Kecekatan instalasi kawat tembaga/fiber, penyambungan kabel luar ruang, serta pembacaan reflektansi core.',
                    'type' => 'small'
                ]
            ]
        ],
        'fasilitas_jurusan' => [
            'title' => 'Fasilitas Pembelajaran IT',
            'subtitle' => 'Dilengkapi gawai berstrata industri teknologi guna akselerasi kemampuan kognitif digital.',
            'content' => [
                [
                    'title' => 'Laboratorium Jaringan Dasar',
                    'desc' => 'Kumpulan unit komputer workstation mumpuni terkoneksi full-router tipe mikrotik untuk berlatih crimping, subnetting dasar, dan OS simulasi.',
                    'tag' => 'HIGH SPEC LAB',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800&auto=format&fit=crop'
                ],
                [
                    'title' => 'Mini Data Center Server',
                    'desc' => 'Ruang khusus perakitan rak data center sesungguhnya. Eksperimen konfigurasi port dan penataan perkabelan backend telco/Switch core.',
                    'tag' => 'RACK SYSTEM',
                    'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&auto=format&fit=crop'
                ]
            ]
        ],
        'cta' => [
            'title' => 'Koneksikan Masa Depanmu Disini!',
            'subtitle' => 'Pendaftaran peserta didik baru jurusan TKJ 2024/2025 dengan kurikulum merdeka kini dibuka.',
            'button_text' => 'Daftar Sekarang'
        ]
    ],
    'jurusan-unggas' => [
        'prospek_karir' => [
            'title' => 'Prospek Karir Lulusan',
            'subtitle' => 'Lulusan memiliki kompetensi standar industri peternakan yang siap mengisi berbagai posisi strategis dan profesional.',
            'content' => [
                [
                    'title' => 'Poultry Specialist',
                    'desc' => 'Spesialis ahli dalam manajemen biosekuriti kandang, nutrisi hewan, dan pelaporan siklus reproduksi ayam sayur (broiler) dan layer.',
                    'tags' => 'Manajemen, Konsultan',
                    'type' => 'wide'
                ],
                [
                    'title' => 'Hatchery Technician',
                    'desc' => 'Menghandle inkubasi dan proses penetasan buatan, menyeleksi bibit unggul secara terstruktur (DOC).',
                    'type' => 'solid'
                ],
                [
                    'title' => 'Quality Control Specialist',
                    'desc' => 'Bertanggung jawab atas standar output produk unggas sejalan dengan regulasi pangan.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Agri-Entrepreneur',
                    'desc' => 'Merancang bisnis peternakan mandiri berdaya saing dengan efisiensi tinggi pada pakan.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Farm Supervisor',
                    'desc' => 'Memimpin rantai pasok lapangan dan SDM teknis untuk optimalisasi masa panen.',
                    'type' => 'small'
                ]
            ]
        ],
        'fasilitas_jurusan' => [
            'title' => 'Fasilitas Pembelajaran',
            'subtitle' => 'Infrastruktur lengkap guna menyokong simulasi kerja industri yang berstandar nasional.',
            'content' => [
                [
                    'title' => 'Automatic Feeding Systems',
                    'desc' => 'Eksplorasi utilitas alat pemberi pakan otomatis presisi dikomparasikan dengan efisiensi energi yang disalurkan melalui sistem pendingin closed-house.',
                    'tag' => 'SMART FARM',
                    'image' => 'https://images.unsplash.com/photo-1549468057-0801a61aa4db?q=80&w=800&auto=format&fit=crop'
                ],
                [
                    'title' => 'Poultry Diagnostics Lab',
                    'desc' => 'Pemeriksaan dan diagnosis kesehatan klinik hewan unggas, identifikasi patologi dasar serta aplikasi mikrobiologi peternakan sebagai mitigasi endemik.',
                    'tag' => 'WET LAB',
                    'image' => 'https://images.unsplash.com/photo-1628105741697-74291f0fcd6e?q=80&w=800&auto=format&fit=crop'
                ]
            ]
        ],
        'cta' => [
            'title' => 'Siap Menjadi Ahli Peternakan Modern?',
            'subtitle' => 'Pendaftaran peserta didik baru tahun ajaran 2024/2025 telah dibuka. Amankan karier masa depanmu di industri agroteknologi.',
            'button_text' => 'Daftar Sekarang'
        ]
    ],
    'jurusan-ruminansia' => [
        'prospek_karir' => [
            'title' => 'Prospek Karir Lulusan',
            'subtitle' => 'Bekal kemampuan agribisnis membuka pintu lebatnya lowongan profesional di sektor hulu-hilir industri daging dan susu sapi.',
            'content' => [
                [
                    'title' => 'Livestock Farm Manager',
                    'desc' => 'Merancang dan mengawasi jalannya peternakan besar, memastikan kesejahteraan ternak sesuai prosedur animal welfare, dan merencanakan pendistribusian.',
                    'tags' => 'Kepemimpinan, Bisnis Sapi',
                    'type' => 'wide'
                ],
                [
                    'title' => 'Inseminator Buatan (IB)',
                    'desc' => 'Melakukan teknik IB untuk memperbaiki mutu reproduksi dan populasi ras unggul sapi potong atau sapi perah.',
                    'type' => 'solid'
                ],
                [
                    'title' => 'Formulator Pakan',
                    'desc' => 'Orkestrasi gizi ransum dan asupan pakan ternak harian agar nutrisi serat dan protein harian tercukupi efektif.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Penyuluh Pertanian',
                    'desc' => 'Konsultan edukasi masyarakat tentang metode pemeliharaan pedet (anak sapi) atau teknologi pakan hijau.',
                    'type' => 'small'
                ],
                [
                    'title' => 'Mantri Hewan (Medis Ternak)',
                    'desc' => 'Bekerja di bawah dokter hewan memantau suhu, kesehatan kuku, pemberian vaksinasi, dan higienitas populasi sapi.',
                    'type' => 'small'
                ]
            ]
        ],
        'fasilitas_jurusan' => [
            'title' => 'Fasilitas Pembelajaran Khusus',
            'subtitle' => 'Lahan praktik yang siap mendekatkan siswa kepada realita dunia ruminansia sejati.',
            'content' => [
                [
                    'title' => 'Laboratorium Kandang Terbuka',
                    'desc' => 'Kandang edukasi skala industri yang luas, lengkap dengan ruang isolasi mandiri untuk karantina sapi yang terserang penyakit kaki dan mulut.',
                    'tag' => 'FARM TERPADU',
                    'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=800&auto=format&fit=crop'
                ],
                [
                    'title' => 'Unit Produksi Pakan Silase',
                    'desc' => 'Pabrik pakan berskala kecil untuk penelitian silase hijauan, pengolahan limbah kotoran menjadi biogas, dan manufaktur konsentrat.',
                    'tag' => 'PABRIK MINI',
                    'image' => 'https://images.unsplash.com/photo-1621217739502-d115e45a0b77?q=80&w=800&auto=format&fit=crop'
                ]
            ]
        ],
        'cta' => [
            'title' => 'Kembangkan Minat di Dunia Peternakan!',
            'subtitle' => 'Pendaftaran peserta didik baru Ruminansia tahun ajaran 2024/2025 telah dibuka. Amankan kursimu sekarang.',
            'button_text' => 'Daftar Sekarang'
        ]
    ]
];

foreach ($data as $page => $sections) {
    foreach ($sections as $key => $contentData) {
        $section = \App\Models\SiteSection::where('page', $page)->where('section_key', $key)->first();
        if ($section) {
            $section->title = $contentData['title'];
            $section->subtitle = $contentData['subtitle'];
            if (isset($contentData['button_text'])) {
                $section->button_text = $contentData['button_text'];
            }
            if (isset($contentData['content'])) {
                $section->content = json_encode($contentData['content']);
            }
            $section->save();
            echo "Updated $page - $key\n";
        }
    }
}
echo "Done!\n";
