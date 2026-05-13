<?php

namespace Database\Seeders;

use App\Models\SejarahItem;
use Illuminate\Database\Seeder;

class SejarahSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'tahun' => '2004',
                'judul' => 'Peletakan Batu Pertama',
                'deskripsi' => 'Peresmian pendirian sekolah oleh pemerintah daerah dengan komitmen menyediakan pendidikan kejuruan yang relevan dengan kebutuhan industri lokal.',
            ],
            [
                'tahun' => '2010',
                'judul' => 'Ekspansi Konsentrasi',
                'deskripsi' => 'Penambahan program keahlian baru di bidang teknologi informasi dan otomotif guna menyambut era digitalisasi industri di Indonesia.',
            ],
            [
                'tahun' => '2018',
                'judul' => 'Sertifikasi & Akreditasi A',
                'deskripsi' => "Pencapaian standar nasional tertinggi melalui akreditasi 'A', mengukuhkan SMK Negeri 1 MAESAN sebagai sekolah rujukan di wilayahnya.",
            ],
            [
                'tahun' => '2024',
                'judul' => 'Digital Atheneum Transformation',
                'deskripsi' => 'Transformasi menjadi sekolah berbasis digital sepenuhnya dengan implementasi smart classroom dan kemitraan industri global.',
            ],
        ];

        foreach ($items as $item) {
            SejarahItem::updateOrCreate(
                [
                    'tahun' => $item['tahun'],
                    'judul' => $item['judul'],
                ],
                [
                    'deskripsi' => $item['deskripsi'],
                ]
            );
        }
    }
}
