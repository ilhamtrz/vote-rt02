<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'kepala_keluarga'   =>  'Satu',
            'no_kk'             =>  '5656565656565656'
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'kepala_keluarga'   =>  'Dua',
            'no_kk'             =>  '4545454545454545'
        ]);
        $user2->assignRole('user');

        $user3 = User::create([
            'kepala_keluarga'   =>  'Tiga',
            'no_kk'             =>  '3434343434343434'
        ]);
        $user3->assignRole('user');

        $user4 = User::create([
            'kepala_keluarga'   =>  'Empat',
            'no_kk'             =>  '2323232323232323'
        ]);
        $user4->assignRole('user');

        $user5 = User::create([
            'kepala_keluarga'   =>  'Lima',
            'no_kk'             =>  '1212121212121212'
        ]);
        $user5->assignRole('user');
    }
}
