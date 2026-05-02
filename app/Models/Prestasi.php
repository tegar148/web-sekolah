<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'title',
        'category',
        'achievement',
        'location',
        'event_date',
        'image_path',
    ];
}
