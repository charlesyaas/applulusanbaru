<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        // tambahkan kolom lain yang diperlukan
    ];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }
}
