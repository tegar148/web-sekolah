<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSection extends Model
{
    protected $fillable = [
        'page', 'section_key', 'title', 'subtitle', 'content',
        'image', 'button_text', 'button_link', 'extra_data',
        'is_visible', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'extra_data' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    public function scopePage($query, string $page)
    {
        return $query->where('page', $page);
    }
}
