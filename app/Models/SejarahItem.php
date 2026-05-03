<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'judul',
        'deskripsi',
    ];
}
