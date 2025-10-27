<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profil::create([
            'sejarah' => 'Desa Pinaesaan merupakan desa yang memiliki sejarah panjang dalam bidang pertanian dan budaya. Didirikan pada tahun 1950-an, desa ini telah berkembang menjadi salah satu desa maju di wilayahnya.',
            'visi' => 'Menjadi desa yang maju, mandiri, dan sejahtera melalui pengembangan potensi lokal dan pemberdayaan masyarakat.',
            'misi' => '1. Mengembangkan sektor pertanian dan peternakan. 2. Meningkatkan kualitas pendidikan dan kesehatan. 3. Melestarikan budaya dan tradisi lokal. 4. Meningkatkan infrastruktur desa.'
        ]);
    }
}
