<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        $kepala = StrukturOrganisasi::create([
            'nama' => 'John Doe',
            'jabatan' => 'Kepala Desa'
        ]);

        $sekretaris = StrukturOrganisasi::create([
            'nama' => 'Maria Sondakh',
            'jabatan' => 'Sekretaris Desa',
            'atasan_id' => $kepala->id
        ]);

        StrukturOrganisasi::insert([
            ['nama' => 'Andi Pontoh', 'jabatan' => 'Kaur Keuangan', 'atasan_id' => $sekretaris->id],
            ['nama' => 'Rizky Akbar Mokolanot', 'jabatan' => 'Kaur Perencanaan', 'atasan_id' => $sekretaris->id],
            ['nama' => 'Tirsa Mokoagow', 'jabatan' => 'Kepala Dusun 1', 'atasan_id' => $sekretaris->id],
            ['nama' => 'Kristi Mokodompit', 'jabatan' => 'Kepala Dusun 2', 'atasan_id' => $sekretaris->id],
        ]);
    }
}
