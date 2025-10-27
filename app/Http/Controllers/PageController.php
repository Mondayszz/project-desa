<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Potensi;
use App\Models\Statistik;
use App\Models\Profil;
use App\Models\Kontak;
use App\Models\Wilayah;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function profil()
    {
        $profil = Profil::first();

        // Default data jika belum ada di database
        $sejarah = $profil ? $profil->sejarah : "Desa Pinaesaan berdiri sejak tahun 1970 sebagai desa yang dikenal dengan tenunan dan tradisi kudanya.
        Visi desa adalah menjadi desa mandiri, maju, dan berbudaya.";

        $visi = $profil ? $profil->visi : "Menjadi desa mandiri, maju, dan berbudaya.";
        $misi = $profil ? $profil->misi : "Meningkatkan kesejahteraan masyarakat melalui pengembangan potensi lokal.";

        // Struktur organisasi desa (tetap statis karena tidak ada model untuk ini)
        $struktur = [
            (object)[
                'nama' => 'Rizky Akbar Mokolanot',
                'jabatan' => 'Kepala Desa',
                'bawahan' => [
                    (object)['nama' => 'Kristi Viske Mokodompit', 'jabatan' => 'Sekretaris Desa'],
                    (object)['nama' => 'Psalmodia Tirsa Mokoagow', 'jabatan' => 'Kaur Keuangan'],
                    (object)['nama' => 'Betaria Klara Siallagan', 'jabatan' => 'Kaur Umum'],
                ]
            ],
            (object)[
                'nama' => 'Andi Salim',
                'jabatan' => 'Kepala Dusun',
                'bawahan' => [
                    (object)['nama' => 'Budi Santoso', 'jabatan' => 'RT 01'],
                    (object)['nama' => 'Sinta Marpaung', 'jabatan' => 'RT 02'],
                ]
            ]
        ];

        // Data lembaga desa (tetap statis)
        $lembaga = [
            ['nama' => 'Badan Permusyawaratan Desa (BPD)', 'ketua' => 'Yohanes Londa'],
            ['nama' => 'Lembaga Pemberdayaan Masyarakat (LPM)', 'ketua' => 'Maria Runtu'],
            ['nama' => 'Karang Taruna', 'ketua' => 'Jefri Mandagi'],
            ['nama' => 'PKK Desa', 'ketua' => 'Lidya Moniaga'],
            ['nama' => 'Kelompok Tani "Makmur Bersama"', 'ketua' => 'Samuel Mamahit'],
        ];

        return view('pages.profil', compact('sejarah', 'visi', 'misi', 'struktur', 'lembaga'));
    }

    public function statistik()
    {
        $statistik = Statistik::first();

        // Default data jika belum ada di database
        $data['jumlah_penduduk'] = $statistik ? $statistik->jumlah_penduduk : 0;
        $data['jenis_kelamin'] = $statistik ? $statistik->jenis_kelamin : ['laki_laki' => 0, 'perempuan' => 0];
        $data['pekerjaan'] = $statistik ? $statistik->pekerjaan : [
            'petani' => 0,
            'nelayan' => 0,
            'pedagang' => 0,
            'pegawai' => 0,
            'lainnya' => 0,
        ];
        $data['kelompok_umur'] = [
            '0-17' => (int) ($statistik->kelompok_umur['0-17'] ?? 0),
            '18-40' => (int) ($statistik->kelompok_umur['18-40'] ?? 0),
            '41-60' => (int) ($statistik->kelompok_umur['41-60'] ?? 0),
            '60+' => (int) ($statistik->kelompok_umur['60+'] ?? 0),
        ];
        $data['populasi_dusun'] = $statistik->populasi_dusun;
        // Cast values to int
        foreach ($data['populasi_dusun'] as $dusun => $pop) {
            foreach ($pop as $key => $val) {
                $data['populasi_dusun'][$dusun][$key] = (int) $val;
            }
        }

        return view('pages.statistik', compact('data'));
    }

    public function potensi()
    {
        $potensi = Potensi::all();

        // Default data jika belum ada di database
        if ($potensi->isEmpty()) {
            $potensi = [
                ['nama' => 'Pertanian Jagung', 'deskripsi' => 'Hasil utama desa berasal dari pertanian jagung unggul.', 'gambar' => 'jagung.jpg', 'kategori' => 'pertanian'],
                ['nama' => 'Peternakan Kuda', 'deskripsi' => 'Kuda menjadi simbol budaya sekaligus potensi wisata lokal.', 'gambar' => 'kuda.jpg', 'kategori' => 'peternakan'],
                ['nama' => 'Kerajinan Tenun', 'deskripsi' => 'Tenunan khas Desa Pinaesaan terkenal hingga luar daerah.', 'gambar' => 'tenun.jpg', 'kategori' => 'kerajinan'],
            ];
        }

        return view('pages.potensi', compact('potensi'));
    }

    public function wilayah()
    {
        $wilayah = Wilayah::first();

        // Default data jika belum ada di database
        $info = $wilayah ? $wilayah->deskripsi : "Desa Pinaesaan memiliki luas 1.200 hektar, dengan batas wilayah meliputi:
        Utara: Desa A
        Selatan: Desa B
        Timur: Desa C
        Barat: Desa D.";

        $gambar = $wilayah ? $wilayah->gambar : null;
        $link_gmaps = $wilayah ? $wilayah->link_gmaps : null;

        return view('pages.wilayah', compact('info', 'gambar', 'link_gmaps'));
    }

    public function kontak()
    {
        $kontakData = Kontak::first();

        // Default data jika belum ada di database
        $kontak = [
            'alamat' => $kontakData ? $kontakData->alamat : 'Kantor Desa Pinaesaan, Kecamatan XYZ, Kabupaten ABC',
            'telepon' => $kontakData ? $kontakData->telepon : '(0431) 123456',
            'email' => $kontakData ? $kontakData->email : 'desapinaesaan@gmail.com',
        ];

        return view('pages.kontak', compact('kontak'));
    }
}
