<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statistik;

class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statistik::create([
            'jumlah_penduduk' => 2500,
            'jenis_kelamin' => [
                'laki_laki' => 1250,
                'perempuan' => 1250
            ],
            'pekerjaan' => [
                'petani' => 800,
                'pedagang' => 300,
                'pegawai' => 200,
                'lainnya' => 1200
            ],
            'kelompok_umur' => [
                '0-17' => 600,
                '18-40' => 1000,
                '41-60' => 700,
                '60+' => 200
            ],
            'populasi_dusun' => [
                'Jaga 1' => ['Laki-laki' => 420, 'Perempuan' => 380, 'Anak-anak' => 250, 'Kepala Keluarga' => 120],
                'Jaga 2' => ['Laki-laki' => 380, 'Perempuan' => 360, 'Anak-anak' => 280, 'Kepala Keluarga' => 110],
            ]
        ]);
    }
}
