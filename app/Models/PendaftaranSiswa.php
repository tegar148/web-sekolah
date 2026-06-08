<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_siswas';

    protected $fillable = [
        'kode_pendaftaran',
        'nama',
        'jenis_kelamin',
        'sekolah_asal',
        'minat_jurusan',
        // Status
        'status',
        'step_terakhir',
        'submitted_at',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'submitted_at'  => 'datetime',
    ];

    /**
     * Generate a unique registration code.
     */
    public static function generateKode(): string
    {
        $year  = date('Y');
        $count = self::whereYear('created_at', $year)->count() + 1;
        return 'PPDB-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Status label in Indonesian.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft'       => 'Draft',
            'terkirim'    => 'Terkirim',
            'diverifikasi'=> 'Diverifikasi',
            'diterima'    => 'Diterima',
            'ditolak'     => 'Ditolak',
            default       => 'Tidak Diketahui',
        };
    }

    /**
     * Status badge color.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft'       => 'gray',
            'terkirim'    => 'blue',
            'diverifikasi'=> 'yellow',
            'diterima'    => 'green',
            'ditolak'     => 'red',
            default       => 'gray',
        };
    }
}
