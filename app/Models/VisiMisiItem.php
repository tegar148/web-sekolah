<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
        'judul',
        'deskripsi',
        'icon',
    ];
}
