<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Desa Pinaesaan',
            'email' => 'admin@desapinaesaan.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            PotensiSeeder::class,
            StatistikSeeder::class,
            ProfilSeeder::class,
            KontakSeeder::class,
            WilayahSeeder::class,
        ]);
    }
}
