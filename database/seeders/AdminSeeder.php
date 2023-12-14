<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'kepala_keluarga'   =>  'admin',
            'no_kk'             =>  '9999999999999999',
            'password'          =>  bcrypt('vote-rt')
        ]);

        $admin->assignRole('admin');

        $admin1 = User::create([
            'kepala_keluarga'   =>  'admin1',
            'no_kk'             =>  '9999999999999998',
            'password'          =>  bcrypt('vote-rt')
        ]);

        $admin1->assignRole('admin');

        $admin2 = User::create([
            'kepala_keluarga'   =>  'admin2',
            'no_kk'             =>  '9999999999999997',
            'password'          =>  bcrypt('vote-rt')
        ]);

        $admin2->assignRole('admin');

        $admin3 = User::create([
            'kepala_keluarga'   =>  'admin3',
            'no_kk'             =>  '9999999999999996',
            'password'          =>  bcrypt('vote-rt')
        ]);

        $admin3->assignRole('admin');
    }
}
