<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';
    protected $fillable = ['nama', 'jabatan', 'foto', 'atasan_id'];

    // Relasi ke atasan
    public function atasan()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'atasan_id');
    }

    // Relasi ke bawahan
    public function bawahan()
    {
        return $this->hasMany(StrukturOrganisasi::class, 'atasan_id');
    }
}
