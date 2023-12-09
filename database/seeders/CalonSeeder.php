<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calon1 = Candidate::create([
            'no_kk'         =>  '3374101212056917',
            'nama'          =>  'Ampala Khoryanton',
            'visi_misi'     =>  'Visi Misi 1',
        ]);

        $calon2 = Candidate::create([
            'no_kk'         =>  '3374102311090005',
            'nama'          =>  'Nanok Riyawan, ST',
            'visi_misi'     =>  'Visi Misi 2',
        ]);

        $calon3 = Candidate::create([
            'no_kk'         =>  '3374101212056439',
            'nama'          =>  'Agung Jatmiko Saksono',
            'visi_misi'     =>  'Visi Misi 3',
        ]);

        $calon4 = Candidate::create([
            'no_kk'         =>  '3374100609120014',
            'nama'          =>  'Luhur Damar Sesongko',
            'visi_misi'     =>  'Visi Misi 4',
        ]);
    }
}
