<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'name',
        'department',
        'subject',
        'nuptk',
        'status',
        'image_path',
    ];
}
