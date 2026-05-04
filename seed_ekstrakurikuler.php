


DB::table('site_sections')->updateOrInsert(
    ['page' => 'siswa-ekstrakurikuler', 'section_key' => 'pramuka'],
    [
        'title' => 'Pramuka',
        'subtitle' => 'Pengembangan kedisiplinan, kepemimpinan, dan kemandirian melalui kegiatan kepramukaan yang dinamis.',
        'image' => 'https://images.unsplash.com/photo-1506506450630-f421f1d16712?q=80&w=800&auto=format&fit=crop',
        'extra_data' => json_encode([
            'badge' => 'WAJIB',
            'schedule' => 'Jumat, 14:00 WIB',
            'achievement' => 'Juara Umum Kwarran 2023',
        ]),
        'is_visible' => true,
        'sort_order' => 1,
    ]
);

DB::table('site_sections')->updateOrInsert(
    ['page' => 'siswa-ekstrakurikuler', 'section_key' => 'pmr'],
    [
        'title' => 'PMR',
        'subtitle' => 'Relawan muda dengan misi kemanusiaan dan pelayanan kesehatan sekolah.',
        'extra_data' => json_encode([
            'icon' => '<svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m-14-4V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 0v2m0-2h2m-2 0H10"></path></svg>',
            'schedule' => 'Sabtu, 08:00 WIB',
            'link' => '#',
        ]),
        'is_visible' => true,
        'sort_order' => 2,
    ]
);

\App\Models\Ekstrakurikuler::insert([
    [
        'title' => 'ROHIS',
        'description' => 'Pembinaan karakter religius dan akhlak mulia melalui kajian dan kegiatan syiar Islam.',
        'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
        'icon_color' => 'teal',
        'schedule_label' => 'HARI',
        'schedule_value' => 'Kamis Sore',
        'info_label' => 'LOKASI',
        'info_value' => 'Masjid Al-Ilmi',
    ],
    [
        'title' => 'English Club',
        'description' => 'Master public speaking, debating, and creative writing in an English-only environment.',
        'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>',
        'icon_color' => 'indigo',
        'schedule_label' => 'DAY',
        'schedule_value' => 'Wednesday',
        'info_label' => 'ACHIEVEMENTS',
        'info_value' => 'Regency Finalist',
    ]
]);
