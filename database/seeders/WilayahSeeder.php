<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wilayah::create([
            'deskripsi' => 'Desa Pinaesaan terletak di wilayah dataran tinggi dengan luas wilayah sekitar 15 km². Desa ini terdiri dari 3 dusun utama dengan topografi berbukit-bukit dan memiliki sungai yang melintasi wilayahnya. Aksesibilitas ke desa cukup baik dengan jalan utama yang telah diaspal.',
            'gambar' => 'wilayah.jpg'
        ]);
    }
}
