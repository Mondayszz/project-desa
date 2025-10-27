<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'alamat' => 'Jl. Raya Pinaesaan No. 1, Desa Pinaesaan, Kecamatan Pinaesaan, Kabupaten Minahasa Utara',
            'telepon' => '(0431) 123456',
            'email' => 'info@desapinaesaan.go.id'
        ]);
    }
}
