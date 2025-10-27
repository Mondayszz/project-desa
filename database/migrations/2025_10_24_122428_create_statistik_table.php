<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistik', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_penduduk');
            $table->json('jenis_kelamin'); // {'Laki-laki': 800, 'Perempuan': 740}
            $table->json('pekerjaan'); // {'Petani': 500, 'Nelayan': 200, ...}
            $table->json('kelompok_umur'); // {'0-14': 400, '15-24': 300, ...}
            $table->json('populasi_dusun'); // {'Jaga 1': {'Laki-laki': 420, ...}, 'Jaga 2': {...}}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik');
    }
};
