<?php

namespace Database\Seeders;

use App\Models\JenisUmkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class JenisUmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisUmkm::create([
            'slug' => Str::slug('Umkm Mandiri'),
            'name' => 'Umkm Mandiri'
        ]);
        JenisUmkm::create([
            'slug' => Str::slug('Umkm Kelompok Masyarakat'),
            'name' => 'Umkm Kelompok Masyarakat'
        ]);
        JenisUmkm::create([
            'slug' => Str::slug('Umkm Badan Usaha Kecil'),
            'name' => 'Umkm Badan Usaha Kecil'
        ]);
    }
}
