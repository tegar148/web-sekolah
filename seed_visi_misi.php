<?php
use App\Models\VisiMisiItem;

if (VisiMisiItem::count() === 0) {
    VisiMisiItem::insert([
        [
            'tipe' => 'visi',
            'judul' => 'Unggul',
            'deskripsi' => 'Memiliki kompetensi sikap, pengetahuan, ketrampilan sesuai yang diharapkan industri, berprestasi akademik dan non-akademik, dan berdaya saing global.',
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'visi',
            'judul' => 'Inovatif',
            'deskripsi' => 'Memiliki kemampuan bernalar kritis sehingga kreatif dalam menghasilkan inovasi berkelanjutan demi menjawab tantangan masa depan.',
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'visi',
            'judul' => 'Berkarakter',
            'deskripsi' => 'Mampu menunjukkan Profil Pelajar Pancasila sebagai landasan moral dan etika dalam bermasyarakat dan berkarya.',
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'misi',
            'judul' => 'Kultur & Akhlak',
            'deskripsi' => 'Mengembangkan kultur sekolah untuk memberdayakan peserta didik agar menjadi insan yang berakhlak mulia, berkarakter, kreatif, dan kompetitif.',
            'icon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'misi',
            'judul' => 'Kesiapan Kerja Global',
            'deskripsi' => 'Meningkatkan kompetensi peserta didik untuk memasuki dunia kerja, baik di tingkat nasional maupun internasional berdasarkan imtak dan iptek.',
            'icon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'misi',
            'judul' => 'Profesionalisme Pendidik',
            'deskripsi' => 'Meningkatkan mutu kompetensi pendidik dan tenaga kependidikan yang profesional untuk menjamin standar kualitas pendidikan tinggi.',
            'icon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'misi',
            'judul' => 'Nasionalisme & Disiplin',
            'deskripsi' => 'Menanamkan sikap disiplin, kepekaan sosial, semangat nasionalisme dan patriotisme kepada seluruh warga sekolah.',
            'icon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tipe' => 'misi',
            'judul' => 'Infrastruktur Modern',
            'deskripsi' => 'Meningkatkan sarana dan prasarana pendidikan untuk mendukung proses pembelajaran yang optimal dan berbasis teknologi.',
            'icon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    echo "Seeded VisiMisiItems successfully.\n";
} else {
    echo "Already seeded.\n";
}
