<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'kabkota_id',
        'jenjang_id',
        'npsn',
        'nama_sekolah',
        'orang_tua',
        'nama_peserta',
        'tempat_tanggal_lahir',
        'tahun_lulus',
        'nomor_ujian',
        'nomor_ijazah',
        'nisn',
    ];

    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
