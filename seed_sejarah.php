<?php
use App\Models\SejarahItem;

if (SejarahItem::count() === 0) {
    SejarahItem::insert([
        [
            'tahun' => '2004',
            'judul' => 'Peletakan Batu Pertama',
            'deskripsi' => 'Peresmian pendirian sekolah oleh pemerintah daerah dengan komitmen menyediakan pendidikan kejuruan yang relevan dengan kebutuhan industri lokal.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tahun' => '2010',
            'judul' => 'Ekspansi Konsentrasi',
            'deskripsi' => 'Penambahan program keahlian baru di bidang teknologi informasi dan otomotif guna menyambut era digitalisasi industri di Indonesia.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tahun' => '2018',
            'judul' => 'Sertifikasi & Akreditasi A',
            'deskripsi' => "Pencapaian standar nasional tertinggi melalui akreditasi 'A', mengukuhkan SMK Negeri 1 MAESAN sebagai sekolah rujukan di wilayahnya.",
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'tahun' => '2024',
            'judul' => 'Digital Atheneum Transformation',
            'deskripsi' => 'Transformasi menjadi sekolah berbasis digital sepenuhnya dengan implementasi smart classroom dan kemitraan industri global.',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    echo "Seeded SejarahItems successfully.\n";
} else {
    echo "Already seeded.\n";
}
