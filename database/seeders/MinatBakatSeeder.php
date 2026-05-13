<?php

namespace Database\Seeders;

use App\Models\MinatBakat;
use Illuminate\Database\Seeder;

class MinatBakatSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category' => 'STEM',
                'title' => 'Robotics & IoT Club',
                'description' => 'Eksplorasi teknologi masa depan melalui pemrograman mikrokontroler dan perakitan robotika industri.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>',
                'detail_link' => null,
            ],
            [
                'category' => 'ARTS',
                'title' => 'Cinema & Multimedia',
                'description' => 'Wadah bagi para konten kreator, videografer, dan editor muda untuk berkarya di era digital.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>',
                'detail_link' => null,
            ],
            [
                'category' => 'NATURE',
                'title' => 'Green Ambassadors',
                'description' => 'Aksi nyata pelestarian lingkungan sekolah melalui program zero waste dan hidroponik mandiri.',
                'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                'detail_link' => null,
            ],
        ];

        foreach ($items as $item) {
            MinatBakat::updateOrCreate(
                [
                    'category' => $item['category'],
                    'title' => $item['title'],
                ],
                [
                    'description' => $item['description'],
                    'icon' => $item['icon'],
                    'detail_link' => $item['detail_link'],
                ]
            );
        }
    }
}
