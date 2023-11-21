<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga; // Pastikan untuk mengimpor model Warga

class Wargas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warga::create([
            'nama' => 'supri',
            'NoKK' => '101010',
            // tambahkan kolom lainnya di sini jika ada
        ]);
    }
}
