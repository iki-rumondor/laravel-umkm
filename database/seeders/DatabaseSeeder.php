<?php

namespace Database\Seeders;

use App\Models\JenisUmkm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            KategoriSeeder::class,
            JenisUmkmSeeder::class
        ]);
    }
}
