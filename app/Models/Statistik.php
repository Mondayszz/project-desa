<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistik';
    protected $fillable = ['jumlah_penduduk', 'jenis_kelamin', 'pekerjaan', 'kelompok_umur', 'populasi_dusun'];

    protected $casts = [
        'jenis_kelamin' => 'array',
        'pekerjaan' => 'array',
        'kelompok_umur' => 'array',
        'populasi_dusun' => 'array',
    ];
}
