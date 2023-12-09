<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vote::create([
            'deskripsi'   =>  'Pemilihan RT02 RW12',
            'periode'     =>  '2024-2029',
            'status'      =>  '1'
        ]);
    }
}
