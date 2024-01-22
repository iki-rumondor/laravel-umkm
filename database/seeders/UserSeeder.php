<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'phone' => '081234567890',
            'profile' => 'admin.png',
            'deskripsi' => 'Admin',
            'alamat' => 'Jl. Jalan',
            'status' => 'active',

        ]);
        $owner = User::create([
            'name' => 'owner',
            'email' => 'owner2@example.com',
            'password' => bcrypt('owner'),
            'role' => 'owner',
            'phone' => '081234567890',
            'profile' => 'owner.png',
            'alamat' => 'Jl. Jalan',
            'deskripsi' => 'owner',
            'status' => 'active',
        ]);
        $owner->shop()->create([
            'jenis_id' => 1,
            'nama_toko' => "Satu Toko",
            'alamat' => "Alamat Toko",
            'tahun_berdiri' => "2023",
        ]);
    }
}
