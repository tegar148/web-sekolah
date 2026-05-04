<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

DB::table('site_sections')->insert([
    [
        'page' => 'info-ppdb',
        'section_key' => 'persyaratan',
        'title' => 'Persyaratan Umum',
        'subtitle' => 'Kelola daftar persyaratan PPDB.',
        'content' => '',
        'is_visible' => true,
        'sort_order' => 3
    ],
    [
        'page' => 'info-ppdb',
        'section_key' => 'jadwal',
        'title' => 'Jadwal Pelaksanaan',
        'subtitle' => 'Catat tanggal penting agar tidak terlewatkan momen berharga Anda.',
        'content' => '',
        'is_visible' => true,
        'sort_order' => 4
    ],
    [
        'page' => 'info-ppdb',
        'section_key' => 'langkah',
        'title' => 'Langkah Pendaftaran',
        'subtitle' => 'Panduan mudah untuk mendaftar di SMK Negeri 1 Maesan.',
        'content' => '',
        'is_visible' => true,
        'sort_order' => 5
    ]
]);

echo "Restored sections\n";
