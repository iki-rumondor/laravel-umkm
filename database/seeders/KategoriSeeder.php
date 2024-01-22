<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => 'Makanan',
            'slug' => 'makanan',
            'image' => 'makanan'
        ]);
        Category::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => 'Minuman',
            'slug' => 'minuman',
            'image' => 'Minuman'
        ]);
    }
}
