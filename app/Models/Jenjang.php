<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jenjang',
        // tambahkan kolom lain yang diperlukan
    ];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }
}
