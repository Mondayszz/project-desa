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
        // Update existing records to set kategori based on nama
        DB::table('potensi')->where('nama', 'like', '%Pertanian%')->update(['kategori' => 'pertanian']);
        DB::table('potensi')->where('nama', 'like', '%Peternakan%')->update(['kategori' => 'peternakan']);
        DB::table('potensi')->where('nama', 'like', '%Kerajinan%')->update(['kategori' => 'kerajinan']);
        // Others remain as 'lainnya' (default)
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse, as kategori is just updated
    }
};
