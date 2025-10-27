<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Potensi;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Potensi::create([
            'nama' => 'Pertanian',
            'deskripsi' => 'Desa Pinaesaan memiliki potensi pertanian yang melimpah dengan lahan subur dan hasil panen yang berkualitas.',
            'gambar' => 'pertanian.jpg'
        ]);

        Potensi::create([
            'nama' => 'Wisata Alam',
            'deskripsi' => 'Keindahan alam desa yang masih asri menjadikannya destinasi wisata yang menarik bagi pengunjung.',
            'gambar' => 'wisata.jpg'
        ]);

        Potensi::create([
            'nama' => 'Kerajinan Tangan',
            'deskripsi' => 'Masyarakat desa memiliki keterampilan dalam membuat kerajinan tangan yang unik dan bernilai seni tinggi.',
            'gambar' => 'kerajinan.jpg'
        ]);
    }
}
