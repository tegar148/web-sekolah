<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\Illuminate\Support\Facades\DB::table('site_sections')
    ->where('page', 'info-ppdb')
    ->whereIn('section_key', ['persyaratan', 'jadwal', 'langkah'])
    ->delete();

echo "Deleted obsolete sections\n";
