<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'deadline',
        'salary_range',
        'type',
        'status_label',
        'link',
        'logo_path',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];
}
