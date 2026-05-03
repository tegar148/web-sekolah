<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'detail_label',
        'detail_value',
        'image_path',
    ];
}
