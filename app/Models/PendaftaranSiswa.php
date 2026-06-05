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
        // Step 1 - Data Pribadi
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'sekolah_asal',
        'alamat_lengkap',
        // Step 2 - Data Wali
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_hp_wali',
        'email_wali',
        // Step 3 - Pilihan Jurusan
        'pilihan_jurusan_1',
        'pilihan_jurusan_2',
        'alasan_memilih',
        // Step 4 - Dokumen
        'foto_ijazah',
        'foto_kk',
        'foto_akta',
        'foto_pas',
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
